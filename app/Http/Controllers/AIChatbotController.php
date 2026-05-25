<?php
<<<<<<< HEAD
=======
// app/Http/Controllers/AIChatbotController.php
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

class AIChatbotController extends Controller
{
=======
use Illuminate\Support\Facades\Http;

class AIChatbotController extends Controller
{
    private $pythonApiUrl;
    
    public function __construct()
    {
        $this->pythonApiUrl = env('PYTHON_API_URL', 'http://localhost:5000');
    }
    
    /**
     * Show the chat interface
     */
    public function showChatInterface()
    {
        return view('chatbot.chat');
    }
    
    /**
     * Show the package page
     */
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
    public function showPackagePage()
    {
        return view('ai-chatbot-package');
    }
    
<<<<<<< HEAD
    public function showSupport()
    {
        return view('support');
    }
    
    public function submitSupportRequest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        // Process support request (send email, save to database, etc.)
        
        return redirect()->back()->with('success', 'Your support request has been submitted successfully!');
=======
    /**
     * Process chat messages
     */
    public function processChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
            'business_id' => 'sometimes|integer'
        ]);
        
        try {
            // Get business data from database based on business_id
            $businessData = $this->getBusinessData($request->business_id);
            
            // Call Python AI API
            $response = Http::timeout(30)->post($this->pythonApiUrl . '/api/chat', [
                'message' => $request->message,
                'business_data' => $businessData
            ]);
            
            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json([
                    'response' => 'Sorry, I am currently unavailable. Please try again later.',
                    'status' => 'error'
                ], 500);
            }
            
        } catch (\Exception $e) {
            return response()->json([
                'response' => 'I apologize, but I am experiencing technical difficulties.',
                'status' => 'error'
            ], 500);
        }
    }
    
    /**
     * Train chatbot with business data (post-payment)
     */
    public function trainChatbot(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_description' => 'required|string',
            'products' => 'required|array',
            'faq' => 'sometimes|array',
            'policies' => 'sometimes|string',
            'contact_info' => 'sometimes|array'
        ]);
        
        try {
            $businessData = $request->all();
            
            // Train the AI
            $response = Http::post($this->pythonApiUrl . '/api/train', $businessData);
            
            if ($response->successful()) {
                // Store business data in database
                $this->storeBusinessData($businessData);
                
                return response()->json([
                    'status' => 'success',
                    'message' => 'Chatbot trained successfully!',
                    'data' => $response->json()
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to train chatbot'
                ], 500);
            }
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Training failed: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get business data from database
     */
    private function getBusinessData($businessId = null)
    {
        // Example - replace with your actual database logic
        if ($businessId) {
            // Get from your businesses table
            return [
                'business_name' => 'Example Business',
                'business_description' => 'We provide excellent services...',
                'products' => ['Service 1', 'Service 2'],
                'faq' => [
                    'What are your hours?' => 'We are open 9 AM to 6 PM',
                    'Do you offer support?' => 'Yes, 24/7 customer support'
                ],
                'policies' => '30-day money back guarantee',
                'contact_info' => [
                    'email' => 'contact@example.com',
                    'phone' => '+1234567890'
                ]
            ];
        }
        
        // Return default data if no business ID
        return [];
    }
    
    /**
     * Store business data in database
     */
    private function storeBusinessData($businessData)
    {
        // Store in your database
        // Example:
        // Business::create([
        //     'name' => $businessData['business_name'],
        //     'description' => $businessData['business_description'],
        //     'products' => json_encode($businessData['products']),
        //     'user_id' => auth()->id()
        // ]);
        
        return true;
    }
    
    /**
     * Check Python API health
     */
    public function checkHealth()
    {
        try {
            $response = Http::get($this->pythonApiUrl . '/api/health');
            return response()->json($response->json());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'unhealthy',
                'error' => $e->getMessage()
            ], 500);
        }
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
    }
}