<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
