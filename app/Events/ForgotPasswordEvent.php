<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEvent
{
    use Dispatchable, SerializesModels;

    public $phoneNumber;
    public $link;

    /**
     * Create a new event instance.
     */
    public function __construct(string $phoneNumber, string $link)
    {
        $this->phoneNumber = $phoneNumber;
        $this->link = $link;
    }
}
