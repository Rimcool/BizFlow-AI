<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadAIChatbotPackage(Request $request)
    {
        // For demo purposes, skip payment validation
        // In production, you would validate the payment
        
        // $paymentId = $request->query('payment_id');
        // $payment = Payment::where('payment_id', $paymentId)
        //                  ->where('status', 'completed')
        //                  ->firstOrFail();
        
        // Generate download token
        $token = $this->generateDownloadToken();
        
        // Return the AI chatbot package
        $filePath = storage_path('app/ai-chatbot-package.zip');
        
        if (!file_exists($filePath)) {
            // Create the package if it doesn't exist
            $this->createAIChatbotPackage();
        }
        
        return response()->download($filePath, 'bizflow-ai-chatbot-package.zip', [
            'Content-Type' => 'application/zip',
            'X-Download-Token' => $token,
        ]);
    }
    
    public function downloadInstallationGuide(Request $request)
    {
        // For demo purposes, skip payment validation
        // $paymentId = $request->query('payment_id');
        // $payment = Payment::where('payment_id', $paymentId)
        //                  ->where('status', 'completed')
        //                  ->firstOrFail();
        
        // Generate PDF using simple HTML response for demo
        // In production, use DomPDF or similar
        $pdfContent = $this->generateInstallationGuidePDF();
        
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="AI-Chatbot-Installation-Guide.pdf"',
        ]);
    }
    
    private function generateDownloadToken()
    {
        return hash('sha256', 'demo_token' . config('app.key') . time());
    }
    
    private function createAIChatbotPackage()
    {
        // Create a simple demo ZIP file
        $zip = new \ZipArchive();
        $zipPath = storage_path('app/ai-chatbot-package.zip');
        
        if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
            // Add a readme file
            $zip->addFromString('README.txt', 
                "BizFlow AI Chatbot Package\n" .
                "==========================\n\n" .
                "Thank you for purchasing our AI Chatbot!\n\n" .
                "Installation Instructions:\n" .
                "1. Upload the chatbot files to your website\n" .
                "2. Add the provided script tag to your HTML\n" .
                "3. Configure the chatbot settings\n" .
                "4. Test the functionality\n\n" .
                "For support: support@bizflowai.com"
            );
            
            // Add a demo script file
            $zip->addFromString('chatbot.js', 
                "// BizFlow AI Chatbot\n" .
                "console.log('AI Chatbot loaded successfully!');"
            );
            
            $zip->close();
        }
    }
    
    private function generateInstallationGuidePDF()
    {
        // For demo purposes, return a simple HTML that browsers can "print as PDF"
        // In production, use DomPDF: https://github.com/dompdf/dompdf
        
        $html = "
        <!DOCTYPE html>
        <html>
        <head>
            <title>AI Chatbot Installation Guide</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 40px; }
                h1 { color: #036ceb; }
                .step { margin: 20px 0; }
                .code { background: #f5f5f5; padding: 10px; border-left: 4px solid #036ceb; }
            </style>
        </head>
        <body>
            <h1>AI Chatbot Installation Guide</h1>
            <p>Thank you for purchasing the BizFlow AI Chatbot!</p>
            
            <div class='step'>
                <h2>Step 1: Add Script to Your Website</h2>
                <p>Add this code before the closing &lt;/body&gt; tag:</p>
                <div class='code'>
                    &lt;script src='https://cdn.bizflowai.com/chatbot/v1.0/widget.js'&gt;&lt;/script&gt;
                </div>
            </div>
            
            <div class='step'>
                <h2>Step 2: Configure the Chatbot</h2>
                <p>Add configuration options:</p>
                <div class='code'>
                    &lt;script&gt;<br>
                    window.chatbotConfig = {<br>
                    &nbsp;&nbsp;theme: 'light',<br>
                    &nbsp;&nbsp;position: 'bottom-right'<br>
                    };<br>
                    &lt;/script&gt;
                </div>
            </div>
            
            <div class='step'>
                <h2>Step 3: Test Installation</h2>
                <p>Refresh your website and look for the chatbot icon.</p>
            </div>
            
            <p><strong>Support:</strong> support@bizflowai.com</p>
        </body>
        </html>
        ";
        
        return $html;
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use ZipArchive;
use Barryvdh\DomPDF\Facade\Pdf;
class DownloadController extends Controller
{
    public function downloadChatbot(Request $request)
    {
        // ✅ Step 1: Check membership
        $user = $request->user();
        if (!$user || !$user->is_paid) {
            return response()->json([
                'error' => 'You need to purchase the $3 membership to access the AI Chatbot package.'
            ], 403);
        }

        // ✅ Step 2: Create temp folder
        $folderName = "chatbot_package_" . time();
        $projectPath = storage_path("app/generated/{$folderName}");
        File::makeDirectory($projectPath, 0777, true, true);

        // ✅ Step 3: Generate chatbot file (basic JS bot example)
        $botJs = <<<EOT
            // Simple AI Chatbot script
            console.log("AI Chatbot initialized for {$user->name}'s business!");
            // Extend this script with AI API integration
        EOT;

        File::put($projectPath . '/chatbot.js', $botJs);

        // ✅ Step 4: Create PDF Installation Guide
        $pdfData = [
            'businessName' => $user->name,
        ];

        $pdf = PDF::loadView('pdf.chatbot_guide', $pdfData);
        $pdfPath = $projectPath . '/AI_Chatbot_Installation_Guide.pdf';
        $pdf->save($pdfPath);

        // ✅ Step 5: Zip everything
        $zipPath = storage_path("app/generated/{$folderName}.zip");
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($projectPath),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($projectPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();
        }

        // ✅ Step 6: Download response
        return Response::download($zipPath)->deleteFileAfterSend(true);
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
    }
}