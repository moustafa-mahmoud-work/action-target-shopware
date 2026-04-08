<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

/**
 * Action Target PaymentGate Plugin
 * 
 * Main plugin class for PaymentGate integration supporting:
 * - Multiple payment methods (credit card, Net 30, wire transfer, ACH)
 * - Authorization-first, capture-later workflow
 * - Sage ERP integration
 * - Multi-shipment and partial capture support
 * - B2B payment routing
 * - PCI-compliant saved payment methods
 */
class ActionTargetPaymentGate extends Plugin
{
    /**
     * Plugin installation
     * 
     * Creates database tables and registers payment methods
     */
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);
        
        // Database migrations will be executed automatically
        // Payment methods will be registered via services.xml
    }

    /**
     * Plugin update
     * 
     * Handles version upgrades and data migrations
     */
    public function update(UpdateContext $updateContext): void
    {
        parent::update($updateContext);
        
        // Handle version-specific updates if needed
    }

    /**
     * Plugin activation
     * 
     * Activates payment methods and enables functionality
     */
    public function activate(ActivateContext $activateContext): void
    {
        parent::activate($activateContext);
        
        // Activate payment methods
        // Enable webhooks
        // Initialize configuration
    }

    /**
     * Plugin deactivation
     * 
     * Deactivates payment methods but preserves data
     */
    public function deactivate(DeactivateContext $deactivateContext): void
    {
        parent::deactivate($deactivateContext);
        
        // Deactivate payment methods
        // Disable webhooks
        // Keep configuration and transaction data
    }

    /**
     * Plugin uninstallation
     * 
     * Removes plugin data if keepUserData is false
     */
    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);
        
        if ($uninstallContext->keepUserData()) {
            return;
        }
        
        // Remove custom tables
        // Remove payment methods
        // Clean up configuration
    }

    /**
     * Execute post-install tasks
     */
    public function postInstall(InstallContext $installContext): void
    {
        parent::postInstall($installContext);
    }

    /**
     * Execute post-update tasks
     */
    public function postUpdate(UpdateContext $updateContext): void
    {
        parent::postUpdate($updateContext);
    }
}

// @Author Moustafa M S
