<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class internshipSaved extends Mailable
{
    use Queueable, SerializesModels;

    public $internship;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($internship)
    {
        $this->internship=$internship;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.internship.saved')
            ->subject("\"{$this->internship->baslik}\" onayınızı bekliyor.")
            ->with(["internship"=>$this->internship]);
    }
}
