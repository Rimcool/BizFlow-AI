<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MonthlyReport extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $business;
    public $reportData;
    public $appName;

    public function __construct($user, $business, $reportData)
    {
        $this->user = $user;
        $this->business = $business;
        $this->reportData = $reportData;
        $this->appName = config('app.name', 'BizFlow AI');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Monthly Performance Report for ' . $this->business->name . ' - ' . $this->appName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.monthly-report',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}