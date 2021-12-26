<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUpdateStatusEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $complaint;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($complaint)
    {
        $this->complaint = $complaint;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('creativedev45@gmail.com')->subject('complaint Status Updated')->view('email.complaintStatusUpdated');
    }}

