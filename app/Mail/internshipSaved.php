<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class internshipSaved extends Mailable
{
    use Queueable, SerializesModels;

    public $internship;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($internship,$user)
    {
        $this->internship=$internship;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->user->admin)
            return  $this
                ->markdown('emails.internship.approved')
                ->subject("\"{$this->internship->baslik}\" ilanınız yönetici tarafından onaylandı.")
                ->with(["internship"=>$this->internship]);
        else
            return $this
                ->markdown('emails.internship.saved')
                ->subject("\"{$this->internship->baslik}\" onayınızı bekliyor.")
                ->with(["internship"=>$this->internship]);
    }
}
