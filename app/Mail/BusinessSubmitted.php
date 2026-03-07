<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BusinessSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $business;

    public function __construct($business)
    {
        $this->business = $business;
    }

    public function build()
    {
        return $this->subject('Thanks for submitting to BizFlow AI')
                    ->view('email.business_submitted');
    }
}
