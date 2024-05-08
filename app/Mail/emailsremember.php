<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emailsremember extends Mailable
{
    use Queueable, SerializesModels;
    public $estudiante;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($es)
    {
        $this->estudiante=$es;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email');
    }
}
