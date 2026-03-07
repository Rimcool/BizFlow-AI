<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SeoRecommendations extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $business;
    public $recommendations;
    public $appName;

    public function __construct($business, $recommendations)
{
    $this->business = $business;
    $this->recommendations = $recommendations;
    $this->appName = config('app.name', 'BizFlow AI');
}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'SEO Recommendations for ' . $this->business->name . ' - ' . $this->appName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.seo-recommendations',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}