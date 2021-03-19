<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $withdraw;

    public function __construct($name,$withdraw)
    {
        $this->name = $name;
        $this->withdraw = $withdraw;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notification.email')
        ->with(
        [
            'name' => $this->name,
            'withdraw' => $this->withdraw
        ]);
    }
}
