<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SystemUpdate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $updateDetails;
    public $appName;

    public function __construct($user, $updateDetails)
    {
        $this->user = $user;
        $this->updateDetails = $updateDetails;
        $this->appName = config('app.name', 'BizFlow AI');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'System Update: ' . $this->updateDetails['title'] . ' - ' . $this->appName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.system-update',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}