/**
 * Action Target PaymentGate - Storefront JavaScript
 * 
 * Handles payment method interactions and validation
 */

import PaymentHandler from './payment-handler/payment-handler';
import CardIframeHandler from './payment-handler/card-iframe-handler';
import PaymentValidation from './payment-handler/payment-validation';

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize payment handler
    const paymentHandler = new PaymentHandler();
    paymentHandler.init();
    
    // Initialize card iframe handler
    const cardIframeHandler = new CardIframeHandler();
    cardIframeHandler.init();
    
    // Initialize payment validation
    const paymentValidation = new PaymentValidation();
    paymentValidation.init();
});

// @Author Moustafa M S