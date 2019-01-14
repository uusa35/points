<?php

namespace App\Mail;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionComplete extends Mailable
{
    use Queueable, SerializesModels;
    public $element;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaction $element, User $user)
    {
        $this->element = $element;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->markdown('emails.transaction-complete');
    }
}
