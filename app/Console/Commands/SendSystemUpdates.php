<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\SystemUpdate;
use Illuminate\Support\Facades\Mail;

class SendSystemUpdates extends Command
{
    protected $signature = 'updates:send';
    protected $description = 'Send system update notifications to all users';

    public function handle()
    {
        $users = User::all();
        $updateDetails = [
            'title' => 'New AI Features & Performance Improvements',
            'description' => 'We\'ve enhanced our AI capabilities and improved system performance based on your feedback.',
            'features' => [
                [
                    'name' => 'Enhanced AI Chatbot',
                    'description' => 'Our chatbot now provides more accurate business advice and can handle complex queries.'
                ],
                [
                    'name' => 'Improved SEO Analysis',
                    'description' => 'Get more detailed SEO recommendations with our updated analysis engine.'
                ],
                [
                    'name' => 'New Marketing Templates',
                    'description' => 'Access professionally designed templates for your marketing campaigns.'
                ]
            ],
            'improvements' => [
                'Faster website generation',
                'Improved mobile responsiveness',
                'Enhanced security features'
            ]
        ];
        
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SystemUpdate($user, $updateDetails));
        }
        
        $this->info('System update notifications sent successfully!');
    }
}