<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Payment;
use App\Services\StripeService;
use App\Services\JazzCashService;
use App\Services\EasyPaisaService;

class PaymentController extends Controller
{
    protected $stripeService;
    protected $jazzCashService;
    protected $easyPaisaService;
    
    public function __construct(
        StripeService $stripeService,
        JazzCashService $jazzCashService,
        EasyPaisaService $easyPaisaService
    ) {
        $this->stripeService = $stripeService;
        $this->jazzCashService = $jazzCashService;
        $this->easyPaisaService = $easyPaisaService;
    }
    
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:stripe,jazzcash,easypaisa',
            'amount' => 'required|numeric|min:3',
            'product' => 'required|string',
        ]);
        
        $method = $validated['payment_method'];
        
        switch ($method) {
            case 'stripe':
                return $this->processStripePayment($request);
            case 'jazzcash':
                return $this->processJazzCashPayment($request);
            case 'easypaisa':
                return $this->processEasyPaisaPayment($request);
            default:
                return redirect()->back()->with('error', 'Invalid payment method selected.');
        }
    }
    
    public function processStripePayment(Request $request)
    {
        try {
            $paymentIntent = $this->stripeService->createPaymentIntent([
                'amount' => $request->amount * 100, // Convert to cents
                'currency' => 'usd',
                'metadata' => [
                    'product' => $request->product,
                    'customer_email' => $request->email,
                ]
            ]);
            
            // Save payment record
            $payment = Payment::create([
                'payment_id' => $paymentIntent->id,
                'payment_method' => 'stripe',
                'amount' => $request->amount,
                'currency' => 'usd',
                'status' => 'pending',
                'customer_info' => json_encode([
                    'email' => $request->email,
                    'name' => $request->name,
                ]),
            ]);
            
            return view('payment.stripe', [
                'clientSecret' => $paymentIntent->client_secret,
                'payment' => $payment,
            ]);
            
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }
    
    public function processJazzCashPayment(Request $request)
    {
        try {
            $paymentData = $this->jazzCashService->initiatePayment([
                'amount' => $request->amount,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'product' => $request->product,
            ]);
            
            // Save payment record
            $payment = Payment::create([
                'payment_id' => $paymentData['payment_id'],
                'payment_method' => 'jazzcash',
                'amount' => $request->amount,
                'currency' => 'pkr',
                'status' => 'pending',
                'customer_info' => json_encode([
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]),
            ]);
            
            return redirect()->away($paymentData['payment_url']);
            
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }
    
    public function processEasyPaisaPayment(Request $request)
    {
        try {
            $paymentData = $this->easyPaisaService->initiatePayment([
                'amount' => $request->amount,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'product' => $request->product,
            ]);
            
            // Save payment record
            $payment = Payment::create([
                'payment_id' => $paymentData['payment_id'],
                'payment_method' => 'easypaisa',
                'amount' => $request->amount,
                'currency' => 'pkr',
                'status' => 'pending',
                'customer_info' => json_encode([
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]),
            ]);
            
            return redirect()->away($paymentData['payment_url']);
            
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }
    
    public function paymentSuccess(Request $request)
    {
        $paymentId = $request->query('payment_id');
        $payment = Payment::where('payment_id', $paymentId)->firstOrFail();
        
        return view('payment.success', compact('payment'));
    }
    
    public function paymentFailed()
    {
        return view('payment.failed');
    }
    
    public function paymentCancel()
    {
        return view('payment.cancel');
    }
    
    // Webhook handlers
    public function handleStripeWebhook(Request $request)
    {
        return $this->stripeService->handleWebhook($request);
    }
    
    public function handleJazzCashWebhook(Request $request)
    {
        return $this->jazzCashService->handleWebhook($request);
    }
    
    public function handleEasyPaisaWebhook(Request $request)
    {
        return $this->easyPaisaService->handleWebhook($request);
    }
}
=======

class PaymentController extends Controller
{
    // Fake Payment Logic
    public function processPayment(Request $request)
    {
        $user = $request->user();

        // ✅ Mark user as paid
        $user->is_paid = 1;
        $user->save();

        // ✅ Redirect to Thank You page
        return redirect()->route('thankyou');
    }
    // Thank You Page
    public function thankYou()
    {
        return view('thank-you');
    }
}
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
