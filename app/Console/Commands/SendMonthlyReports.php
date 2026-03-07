<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Business;
use App\Models\User;
use App\Mail\MonthlyReport;
use Illuminate\Support\Facades\Mail;

class SendMonthlyReports extends Command
{
    protected $signature = 'reports:monthly';
    protected $description = 'Send monthly performance reports to all business owners';

    public function handle()
    {
        $businesses = Business::with('user')->get();
        
        foreach ($businesses as $business) {
            if ($business->user) {
                $reportData = [
                    'metrics' => [
                        ['name' => 'Website Visitors', 'value' => rand(100, 1000), 'change' => rand(-10, 20)],
                        ['name' => 'Conversion Rate', 'value' => rand(2, 10) . '%', 'change' => rand(-5, 8)],
                        ['name' => 'Total Sales', 'value' => '$' . rand(500, 5000), 'change' => rand(-15, 25)],
                        ['name' => 'SEO Ranking', 'value' => '#' . rand(1, 50), 'change' => rand(-10, 15)],
                    ],
                    'recommendations' => [
                        'Optimize your product pages for better conversion rates',
                        'Consider running a promotion for your best-selling products',
                        'Add more content to improve SEO rankings',
                    ]
                ];
                
                Mail::to($business->user->email)->send(new MonthlyReport($business->user, $business, $reportData));
            }
        }
        
        $this->info('Monthly reports sent successfully!');
    }
}