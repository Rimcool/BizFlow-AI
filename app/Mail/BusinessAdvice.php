<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Business;

class BusinessAdvice extends Mailable
{
    use Queueable, SerializesModels;

    public $business;
    public $adviceData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Business $business, array $adviceData)
    {
        $this->business = $business;
        $this->adviceData = $adviceData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Business Advice for ' . $this->business->name)
                    ->view('emails.business-advice');
    }
}