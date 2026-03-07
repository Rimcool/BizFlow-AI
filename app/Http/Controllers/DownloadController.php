<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    }
}