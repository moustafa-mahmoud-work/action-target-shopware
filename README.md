# ActionTargetOpenGate Payment Plugin for Shopware 6

ActionTargetOpenGate is a high-performance, open-source payment integration for Shopware 6. Designed specifically for high-volume merchants, it bridges the gap between Shopware's storefront and external ERP systems like **Sage**. 

The plugin establishes the ERP as the "Source of Truth" while ensuring a seamless, PCI-compliant checkout experience.

## 🚀 Strategic Overview
*   **Scope:** Unified payment integration for Storefront and Administration.
*   **Payment Model:** **Pre-Authorization Only**. Funds are authorized during checkout and captured externally in the ERP (Sage) upon physical shipment.
*   **Security:** Full PCI compliance via hosted iFrame tokenization.

## 🏗️ Technical Architecture

### Payment Handling
- **Synchronous Flow:** Implements `AbstractPaymentHandler`.
- **Inline Authorization:** Utilizes `open_payment_token` from the secure iframe; no external redirects required.
- **Pre-Auth Logic:** The `pay()` method executes API calls with `capture: false` to reserve funds without immediate withdrawal.

### Data & State Management
- **Persistence:** Stores `open_payment_auth_id` in `OrderTransaction.customFields`.
- **State Machine:** Automatically transitions transactions to the `Authorized` state via `OrderTransactionStateHandler`.
- **ERP Integration:** `SageExportService` (via `OrderStateSubscriber`) handles the hand-off of Order data and Auth IDs to Sage.

## 🔄 End-to-End Workflow

1.  **Checkout:** Card tokenization occurs via the OpenGate hosted iframe.
2.  **Placement:** `OpenPaymentHandler` executes Pre-Auth.
3.  **Post-Order:** Order and Auth ID are exported to Sage/ERP.
4.  **Fulfillment:** Shipment triggered in Sage initiates the Capture API call.
5.  **Finalization:** A webhook notifies Shopware to update the transaction status to `Paid`.

## 🛠️ Core Business Rules

*   **LTL Freight Block:** Integrated `CartValidator` monitors total weight. If a cart exceeds **400 lbs**, a `CartError` is injected to block order finalization.
*   **Customer Eligibility:** 
    *   **Account Holds:** Automatically blocks/warns users based on the `sage_account_hold` flag.
    *   **Net 30 Terms:** Dynamically hides "Net 30" options unless the `sage_net30_eligible` flag is active.
*   **Headless Ready:** Full support for `/store-api/handle-payment`.

## 🧪 Simulation Layer: OpenERP
The plugin includes **OpenERP**, a dedicated mock service used to simulate:
*   API Success/Decline scenarios.
*   Timeout handling.
*   End-to-end testing of 400 lbs LTL block logic.
*   Sage export synchronization.

## 📁 Implementation Components
- `OpenPayment.php`: Lifecycle management & Custom Field installation.
- `OpenPaymentHandler.php`: Core synchronous authorize-only logic.
- `OpenPaymentClient.php`: API client for OpenGate and OpenERP mocks.
- `config.xml`: Secure configuration for API keys and environment toggles.

---
*Developed for high-volume enterprise commerce.*
