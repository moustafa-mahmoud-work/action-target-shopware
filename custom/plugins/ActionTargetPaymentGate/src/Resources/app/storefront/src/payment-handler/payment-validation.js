/**
 * Payment Validation
 * 
 * Client-side payment validation logic
 */
export default class PaymentValidation {
    constructor() {
        this.validators = {
            'CreditCardHandler': this.validateCreditCard.bind(this),
            'Net30Handler': this.validateNet30.bind(this),
            'WireTransferHandler': this.validateWireTransfer.bind(this)
        };
    }

    init() {
        this.registerValidationEvents();
    }

    registerValidationEvents() {
        const form = document.querySelector('#confirmOrderForm');
        if (!form) return;

        // Validate on payment method change
        const paymentInputs = form.querySelectorAll('input[name="paymentMethodId"]');
        paymentInputs.forEach(input => {
            input.addEventListener('change', () => {
                this.validateSelectedPayment(input.dataset.handler);
            });
        });

        // Validate on form submission
        form.addEventListener('submit', (event) => {
            const selectedPayment = form.querySelector('input[name="paymentMethodId"]:checked');
            if (selectedPayment) {
                const isValid = this.validateSelectedPayment(selectedPayment.dataset.handler);
                if (!isValid) {
                    event.preventDefault();
                }
            }
        });
    }

    validateSelectedPayment(handler) {
        const validator = this.validators[handler];
        if (validator) {
            return validator();
        }
        return true; // Default to valid if no specific validator
    }

    validateCreditCard() {
        const cardToken = document.querySelector('[data-card-token]');
        const savedCardSelect = document.querySelector('[data-saved-card-select]');

        // Check if using saved card
        if (savedCardSelect && savedCardSelect.value) {
            return true;
        }

        // Check if new card token exists
        if (!cardToken || !cardToken.value) {
            this.showValidationError('Please enter your card details');
            return false;
        }

        // Validate cardholder name
        const cardholderName = document.querySelector('[data-cardholder-name]');
        if (cardholderName && !cardholderName.value.trim()) {
            this.showValidationError('Please enter the cardholder name');
            cardholderName.focus();
            return false;
        }

        this.hideValidationError();
        return true;
    }

    validateNet30() {
        // Net 30 validation is primarily server-side
        // Client-side just ensures customer understands terms
        
        const termsAccepted = confirm(
            'By proceeding with Net 30 payment terms, you agree to pay the full invoice amount within 30 days. ' +
            'Late payments may incur additional fees. Do you accept these terms?'
        );

        if (!termsAccepted) {
            this.showValidationError('You must accept the Net 30 payment terms to continue');
            return false;
        }

        this.hideValidationError();
        return true;
    }

    validateWireTransfer() {
        // Wire transfer is always valid for logged-in customers
        // Instructions will be provided after order placement
        this.hideValidationError();
        return true;
    }

    showValidationError(message) {
        let errorContainer = document.querySelector('[data-payment-validation-error]');
        
        if (!errorContainer) {
            errorContainer = document.createElement('div');
            errorContainer.className = 'alert alert-danger mt-3';
            errorContainer.setAttribute('data-payment-validation-error', '');
            errorContainer.setAttribute('role', 'alert');
            
            const form = document.querySelector('#confirmOrderForm');
            if (form) {
                form.insertBefore(errorContainer, form.firstChild);
            }
        }

        errorContainer.innerHTML = `
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Payment Error:</strong> ${message}
        `;
        errorContainer.style.display = 'block';

        // Scroll to error
        errorContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    hideValidationError() {
        const errorContainer = document.querySelector('[data-payment-validation-error]');
        if (errorContainer) {
            errorContainer.style.display = 'none';
        }
    }

    // Utility validation methods
    static validateCardNumber(number) {
        // Luhn algorithm
        const digits = number.replace(/\D/g, '');
        if (digits.length < 13 || digits.length > 19) {
            return false;
        }

        let sum = 0;
        let isEven = false;

        for (let i = digits.length - 1; i >= 0; i--) {
            let digit = parseInt(digits[i], 10);

            if (isEven) {
                digit *= 2;
                if (digit > 9) {
                    digit -= 9;
                }
            }

            sum += digit;
            isEven = !isEven;
        }

        return sum % 10 === 0;
    }

    static validateExpiry(month, year) {
        const now = new Date();
        const currentYear = now.getFullYear();
        const currentMonth = now.getMonth() + 1;

        const expMonth = parseInt(month, 10);
        const expYear = parseInt(year, 10);

        if (expMonth < 1 || expMonth > 12) {
            return false;
        }

        if (expYear < currentYear) {
            return false;
        }

        if (expYear === currentYear && expMonth < currentMonth) {
            return false;
        }

        return true;
    }

    static validateCVV(cvv, cardType = 'visa') {
        const cvvLength = cvv.replace(/\D/g, '').length;
        
        // Amex uses 4-digit CVV, others use 3
        if (cardType === 'amex') {
            return cvvLength === 4;
        }
        
        return cvvLength === 3;
    }
}

// @Author Moustafa M S