/**
 * Card Iframe Handler
 * 
 * Handles secure card entry via iframe communication
 */
export default class CardIframeHandler {
    constructor() {
        this.iframe = null;
        this.tokenInput = null;
        this.isReady = false;
    }

    init() {
        this.iframe = document.querySelector('[data-card-iframe]');
        if (!this.iframe) return;

        this.tokenInput = document.querySelector('[data-card-token]');
        
        this.registerMessageListener();
        this.registerFormInterceptor();
    }

    registerMessageListener() {
        window.addEventListener('message', (event) => {
            // In production, verify origin
            // if (event.origin !== 'https://secure.paymentgate.com') return;

            const data = event.data;

            switch (data.type) {
                case 'cardReady':
                    this.onIframeReady();
                    break;
                case 'cardToken':
                    this.onTokenReceived(data);
                    break;
                case 'cardError':
                    this.onCardError(data);
                    break;
                case 'cardValidation':
                    this.onCardValidation(data);
                    break;
            }
        });
    }

    registerFormInterceptor() {
        const form = document.querySelector('#confirmOrderForm');
        if (!form) return;

        form.addEventListener('submit', (event) => {
            const selectedPayment = form.querySelector('input[name="paymentMethodId"]:checked');
            
            if (selectedPayment && selectedPayment.dataset.handler === 'CreditCardHandler') {
                if (!this.tokenInput || !this.tokenInput.value) {
                    event.preventDefault();
                    this.requestTokenization();
                }
            }
        });
    }

    onIframeReady() {
        this.isReady = true;
        console.log('Card entry iframe ready');
        
        // Send configuration to iframe
        this.sendMessage({
            type: 'configure',
            config: {
                theme: 'light',
                locale: document.documentElement.lang || 'en'
            }
        });
    }

    onTokenReceived(data) {
        if (this.tokenInput) {
            this.tokenInput.value = data.token;
        }

        // Hide loading indicator
        this.hideLoader();

        // Store card details for display
        this.storeCardDetails(data);

        // Submit form
        const form = document.querySelector('#confirmOrderForm');
        if (form) {
            form.submit();
        }
    }

    onCardError(data) {
        this.hideLoader();
        this.showError(data.message || 'Card validation failed');
    }

    onCardValidation(data) {
        if (data.valid) {
            this.hideError();
        } else {
            this.showError(data.message);
        }
    }

    requestTokenization() {
        if (!this.isReady) {
            this.showError('Payment system is not ready. Please try again.');
            return;
        }

        this.showLoader();
        this.hideError();

        // Request tokenization from iframe
        this.sendMessage({
            type: 'tokenize',
            data: {
                saveCard: document.querySelector('[data-save-card]')?.checked || false
            }
        });
    }

    sendMessage(message) {
        if (this.iframe && this.iframe.contentWindow) {
            this.iframe.contentWindow.postMessage(message, '*');
        }
    }

    storeCardDetails(data) {
        // Store for display purposes (non-sensitive data only)
        if (data.last4) {
            sessionStorage.setItem('cardLast4', data.last4);
        }
        if (data.brand) {
            sessionStorage.setItem('cardBrand', data.brand);
        }
    }

    showLoader() {
        const loader = document.querySelector('[data-processing-loader]');
        if (loader) {
            loader.classList.remove('d-none');
        }
    }

    hideLoader() {
        const loader = document.querySelector('[data-processing-loader]');
        if (loader) {
            loader.classList.add('d-none');
        }
    }

    showError(message) {
        const errorDisplay = document.querySelector('[data-card-error]');
        if (errorDisplay) {
            errorDisplay.textContent = message;
            errorDisplay.classList.remove('d-none');
        }
    }

    hideError() {
        const errorDisplay = document.querySelector('[data-card-error]');
        if (errorDisplay) {
            errorDisplay.classList.add('d-none');
        }
    }
}

// @Author Moustafa M S