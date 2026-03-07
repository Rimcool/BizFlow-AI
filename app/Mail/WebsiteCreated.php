<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WebsiteCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $business;
    public $siteUrl;
    public $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct($business, $siteUrl, $pdfPath)
    {
        $this->business = $business;
        $this->siteUrl = $siteUrl;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Your {$this->business->name} Website is Ready!",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.website-created',
            with: [
                'business' => $this->business,
                'siteUrl' => $this->siteUrl,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromStorage($this->pdfPath)
                ->as("{$this->business->name}-marketing-guide.pdf")
                ->withMime('application/pdf'),
        ];
    }
}