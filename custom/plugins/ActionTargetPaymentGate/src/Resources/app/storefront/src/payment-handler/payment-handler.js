/**
 * Payment Handler
 * 
 * Main payment handling logic for checkout
 */
export default class PaymentHandler {
    constructor() {
        this.form = null;
        this.submitButton = null;
        this.paymentMethodInputs = null;
    }

    init() {
        this.form = document.querySelector('#confirmOrderForm');
        if (!this.form) return;

        this.submitButton = this.form.querySelector('[type="submit"]');
        this.paymentMethodInputs = this.form.querySelectorAll('input[name="paymentMethodId"]');

        this.registerEvents();
    }

    registerEvents() {
        // Listen for payment method changes
        this.paymentMethodInputs.forEach(input => {
            input.addEventListener('change', this.onPaymentMethodChange.bind(this));
        });

        // Intercept form submission for validation
        this.form.addEventListener('submit', this.onFormSubmit.bind(this));
    }

    onPaymentMethodChange(event) {
        const selectedMethod = event.target;
        const paymentHandler = selectedMethod.dataset.handler;

        // Show/hide payment-specific forms
        this.togglePaymentForms(paymentHandler);

        // Validate payment method
        this.validatePaymentMethod(paymentHandler);
    }

    togglePaymentForms(handler) {
        // Hide all payment forms
        document.querySelectorAll('[data-payment-form]').forEach(form => {
            form.style.display = 'none';
        });

        // Show selected payment form
        const selectedForm = document.querySelector(`[data-payment-form="${handler}"]`);
        if (selectedForm) {
            selectedForm.style.display = 'block';
        }
    }

    async validatePaymentMethod(handler) {
        try {
            const response = await fetch('/action-target/payment/validate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    paymentMethod: handler
                })
            });

            const data = await response.json();

            if (!data.success) {
                this.showError(data.error);
                this.disableSubmit();
            } else {
                this.hideError();
                this.enableSubmit();
            }
        } catch (error) {
            console.error('Payment validation error:', error);
        }
    }

    async onFormSubmit(event) {
        const selectedMethod = this.form.querySelector('input[name="paymentMethodId"]:checked');
        if (!selectedMethod) return;

        const handler = selectedMethod.dataset.handler;

        // Special handling for credit card
        if (handler === 'CreditCardHandler') {
            const cardToken = this.form.querySelector('[data-card-token]');
            if (!cardToken || !cardToken.value) {
                event.preventDefault();
                this.showError('Please enter your card details');
                return false;
            }
        }

        // Special handling for Net 30
        if (handler === 'Net30Handler') {
            const confirmed = await this.confirmNet30Terms();
            if (!confirmed) {
                event.preventDefault();
                return false;
            }
        }

        return true;
    }

    async confirmNet30Terms() {
        return confirm('By proceeding, you agree to pay the full amount within 30 days of the invoice date.');
    }

    showError(message) {
        let errorContainer = this.form.querySelector('[data-payment-error]');
        if (!errorContainer) {
            errorContainer = document.createElement('div');
            errorContainer.className = 'alert alert-danger';
            errorContainer.setAttribute('data-payment-error', '');
            this.form.insertBefore(errorContainer, this.form.firstChild);
        }
        errorContainer.textContent = message;
        errorContainer.style.display = 'block';
    }

    hideError() {
        const errorContainer = this.form.querySelector('[data-payment-error]');
        if (errorContainer) {
            errorContainer.style.display = 'none';
        }
    }

    disableSubmit() {
        if (this.submitButton) {
            this.submitButton.disabled = true;
        }
    }

    enableSubmit() {
        if (this.submitButton) {
            this.submitButton.disabled = false;
        }
    }
}

// @Author Moustafa M S