<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Storefront\Controller;

use ActionTarget\PaymentGate\Service\PaymentGate\PaymentGateClient;
use ActionTarget\PaymentGate\Service\SavedPaymentMethod\SavedPaymentMethodService;
use ActionTarget\PaymentGate\Service\Transaction\TransactionService;
use Shopware\Core\Framework\Validation\DataBag\RequestDataBag;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Payment Controller
 * 
 * Handles payment-related AJAX requests from storefront
 */
#[Route(defaults: ['_routeScope' => ['storefront']])]
class PaymentController extends StorefrontController
{
    private PaymentGateClient $paymentGateClient;
    private SavedPaymentMethodService $savedPaymentMethodService;
    private TransactionService $transactionService;

    public function __construct(
        PaymentGateClient $paymentGateClient,
        SavedPaymentMethodService $savedPaymentMethodService,
        TransactionService $transactionService
    ) {
        $this->paymentGateClient = $paymentGateClient;
        $this->savedPaymentMethodService = $savedPaymentMethodService;
        $this->transactionService = $transactionService;
    }

    /**
     * Validate payment method before checkout
     */
    #[Route(
        path: '/action-target/payment/validate',
        name: 'frontend.action_target.payment.validate',
        methods: ['POST'],
        defaults: ['XmlHttpRequest' => true]
    )]
    public function validatePayment(
        Request $request,
        RequestDataBag $data,
        SalesChannelContext $context
    ): JsonResponse {
        try {
            $paymentMethod = $data->get('paymentMethod');
            $customer = $context->getCustomer();

            if (!$customer) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Customer not logged in',
                ], 401);
            }

            // Validate based on payment method
            $validation = match ($paymentMethod) {
                'credit_card' => $this->validateCreditCard($data, $customer, $context),
                'net30' => $this->validateNet30($customer, $context),
                'wire_transfer' => $this->validateWireTransfer($customer, $context),
                default => ['valid' => false, 'error' => 'Unknown payment method'],
            };

            return new JsonResponse([
                'success' => $validation['valid'],
                'error' => $validation['error'] ?? null,
                'data' => $validation['data'] ?? null,
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get card token from iframe
     */
    #[Route(
        path: '/action-target/payment/tokenize',
        name: 'frontend.action_target.payment.tokenize',
        methods: ['POST'],
        defaults: ['XmlHttpRequest' => true]
    )]
    public function tokenizeCard(
        Request $request,
        RequestDataBag $data,
        SalesChannelContext $context
    ): JsonResponse {
        try {
            $cardData = [
                'number' => $data->get('cardNumber'),
                'exp_month' => $data->get('expMonth'),
                'exp_year' => $data->get('expYear'),
                'cvv' => $data->get('cvv'),
                'name' => $data->get('cardholderName'),
            ];

            // In production, this would call PaymentGate tokenization API
            // For now, return mock token
            $token = 'tok_' . bin2hex(random_bytes(16));

            return new JsonResponse([
                'success' => true,
                'token' => $token,
                'last4' => substr($cardData['number'], -4),
                'brand' => $this->detectCardBrand($cardData['number']),
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Save payment method for future use
     */
    #[Route(
        path: '/action-target/payment/save-method',
        name: 'frontend.action_target.payment.save_method',
        methods: ['POST'],
        defaults: ['XmlHttpRequest' => true]
    )]
    public function savePaymentMethod(
        Request $request,
        RequestDataBag $data,
        SalesChannelContext $context
    ): JsonResponse {
        try {
            $customer = $context->getCustomer();

            if (!$customer) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Customer not logged in',
                ], 401);
            }

            $paymentMethodData = [
                'type' => $data->get('type'),
                'token' => $data->get('token'),
                'last4' => $data->get('last4'),
                'brand' => $data->get('brand'),
                'exp_month' => $data->get('expMonth'),
                'exp_year' => $data->get('expYear'),
            ];

            $result = $this->savedPaymentMethodService->savePaymentMethod(
                $customer->getId(),
                $paymentMethodData,
                $context->getContext()
            );

            return new JsonResponse([
                'success' => true,
                'paymentMethodId' => $result['id'],
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete saved payment method
     */
    #[Route(
        path: '/action-target/payment/delete-method/{id}',
        name: 'frontend.action_target.payment.delete_method',
        methods: ['DELETE'],
        defaults: ['XmlHttpRequest' => true]
    )]
    public function deletePaymentMethod(
        string $id,
        SalesChannelContext $context
    ): JsonResponse {
        try {
            $customer = $context->getCustomer();

            if (!$customer) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Customer not logged in',
                ], 401);
            }

            $this->savedPaymentMethodService->deletePaymentMethod(
                $id,
                $customer->getId(),
                $context->getContext()
            );

            return new JsonResponse(['success' => true]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Validate credit card payment
     */
    private function validateCreditCard(RequestDataBag $data, $customer, SalesChannelContext $context): array
    {
        $cardToken = $data->get('cardToken');
        $saveCard = $data->getBoolean('saveCard', false);

        if (!$cardToken) {
            return ['valid' => false, 'error' => 'Card token is required'];
        }

        return [
            'valid' => true,
            'data' => [
                'cardToken' => $cardToken,
                'saveCard' => $saveCard,
            ],
        ];
    }

    /**
     * Validate Net 30 eligibility
     */
    private function validateNet30($customer, SalesChannelContext $context): array
    {
        // TODO: Implement actual eligibility check
        // Check credit limit, payment history, etc.
        
        $isEligible = true; // Mock for now

        if (!$isEligible) {
            return [
                'valid' => false,
                'error' => 'Customer is not eligible for Net 30 terms',
            ];
        }

        return ['valid' => true];
    }

    /**
     * Validate wire transfer
     */
    private function validateWireTransfer($customer, SalesChannelContext $context): array
    {
        // Wire transfer is always valid for logged-in customers
        return ['valid' => true];
    }

    /**
     * Detect card brand from number
     */
    private function detectCardBrand(string $cardNumber): string
    {
        $cardNumber = preg_replace('/\s+/', '', $cardNumber);

        if (preg_match('/^4/', $cardNumber)) {
            return 'visa';
        }
        if (preg_match('/^5[1-5]/', $cardNumber)) {
            return 'mastercard';
        }
        if (preg_match('/^3[47]/', $cardNumber)) {
            return 'amex';
        }
        if (preg_match('/^6(?:011|5)/', $cardNumber)) {
            return 'discover';
        }

        return 'unknown';
    }
}

// @Author Moustafa M S