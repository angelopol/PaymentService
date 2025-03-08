# PaymentService

PaymentService is a Laravel-based application that provides a comprehensive API for managing payments, refunds, and payment gateways. This document outlines the API structure, model structure, and provides examples of API requests.

## API Structure

### Payment Routes

- **Create a new payment**
  - `POST /api/payments`
  - Request Body: `{ "email": "user@example.com", "amount": 100.00, "currency": "USD", "status": "pending", "gateway": "Stripe", "transaction_id": "txn_12345" }`

- **Update an existing payment**
  - `PUT /api/payments/{id}`
  - Request Body: `{ "status": "completed" }`

- **Delete a payment**
  - `DELETE /api/payments/{id}`

- **Get all payments**
  - `GET /api/payments`

- **Get a specific payment by ID**
  - `GET /api/payments/{id}`

- **Get payments by email**
  - `GET /api/payments/email/{email}`

- **Get payments by status**
  - `GET /api/payments/status/{status}`

### Refund Routes

- **Create a new refund for a payment**
  - `POST /api/payments/{id}/refund`
  - Request Body: `{ "amount": 50.00, "reason": "Product returned", "status": "pending" }`

- **Update an existing refund**
  - `PUT /api/refunds/{id}`
  - Request Body: `{ "status": "completed" }`

- **Delete a refund**
  - `DELETE /api/refunds/{id}`

### Gateway Routes

- **Get all gateways**
  - `GET /api/gateways`

- **Get a specific gateway by ID**
  - `GET /api/gateways/{id}`

- **Create a new gateway**
  - `POST /api/gateways`
  - Request Body: `{ "gateway": "Stripe", "api_key": "...", "secret_key": "...", "other_configuration": "..." }`

- **Update an existing gateway**
  - `PUT /api/gateways/{id}`
  - Request Body: `{ "api_key": "new_api_key" }`

- **Delete a gateway**
  - `DELETE /api/gateways/{id}`

## Model Structure

### Payment Model

- **Fields:**
  - `id`: Primary key
  - `email`: Email of the payer
  - `amount`: Payment amount
  - `currency`: Currency code (e.g., USD)
  - `status`: Payment status (pending, completed, failed)
  - `gateway`: Payment gateway used (e.g., Stripe, PayPal)
  - `transaction_id`: Unique transaction ID from the payment gateway
  - `created_at`: Timestamp when the payment was created
  - `updated_at`: Timestamp when the payment was last updated

### Refund Model

- **Fields:**
  - `id`: Primary key
  - `payment_id`: Foreign key referencing the payment
  - `amount`: Refund amount
  - `reason`: Reason for the refund
  - `status`: Refund status (pending, completed, failed)
  - `created_at`: Timestamp when the refund was created
  - `updated_at`: Timestamp when the refund was last updated

### Gateway Model

- **Fields:**
  - `id`: Primary key
  - `gateway`: Name of the payment gateway (e.g., Stripe, PayPal)
  - `api_key`: API key for the gateway
  - `secret_key`: Secret key for the gateway
  - `other_configuration`: Additional configuration for the gateway
  - `created_at`: Timestamp when the gateway was created
  - `updated_at`: Timestamp when the gateway was last updated

## Examples of API Requests

### Create a Payment

```bash
curl -X POST http://localhost:8000/api/payments \
-H "Content-Type: application/json" \
-d '{
  "email": "user@example.com",
  "amount": 100.00,
  "currency": "USD",
  "status": "pending",
  "gateway": "Stripe",
  "transaction_id": "txn_12345"
}'
```

### Update a Payment

```bash
curl -X PUT http://localhost:8000/api/payments/1 \
-H "Content-Type: application/json" \
-d '{
  "status": "completed"
}'
```

### Get Payments by Email

```bash
curl http://localhost:8000/api/payments/email/user@example.com
```

### Create a Refund

```bash
curl -X POST http://localhost:8000/api/payments/1/refund \
-H "Content-Type: application/json" \
-d '{
  "amount": 50.00,
  "reason": "Product returned",
  "status": "pending"
}'
```

### Create a Gateway

```bash
curl -X POST http://localhost:8000/api/gateways \
-H "Content-Type: application/json" \
-d '{
  "gateway": "Stripe",
  "api_key": "...",
  "secret_key": "...",
  "other_configuration": "..."
}'
```

## Other Important Information

- **Database Migrations:** The database migrations for creating the `payments`, `refunds`, and `gateways` tables are located in the `database/migrations` directory.
- **Controllers:** The business logic for handling API requests is implemented in the `PaymentController`, `RefundController`, and `GatewayController` located in the `app/Http/Controllers` directory.
- **Models:** The Eloquent models representing the `Payment`, `Refund`, and `Gateway` entities are located in the `app/Models` directory.
