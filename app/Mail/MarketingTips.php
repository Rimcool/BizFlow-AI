<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MarketingTips extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $business;
    public $tips;
    public $appName;

    public function __construct($business, $tips)
{
    $this->business = $business;
    $this->tips = $tips;
    $this->appName = config('app.name', 'BizFlow AI');
}
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Marketing Tips for ' . $this->business->name . ' - ' . $this->appName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.marketing-tips',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}