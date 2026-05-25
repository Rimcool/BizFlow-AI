<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createPaymentIntent(array $data)
    {
        try {
            return PaymentIntent::create([
                'amount' => $data['amount'],
                'currency' => $data['currency'] ?? 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                'metadata' => $data['metadata'] ?? [],
            ]);
        } catch (ApiErrorException $e) {
            throw new \Exception('Stripe payment error: ' . $e->getMessage());
        }
    }

    public function handleWebhook($request)
    {
        // Webhook handling logic
        return response()->json(['status' => 'success']);
    }
}