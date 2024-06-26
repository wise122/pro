<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendForgotPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $phoneNumber;
    public $link;

    /**
     * Create a new job instance.
     */
    public function __construct(string $phoneNumber, string $link)
    {
        $this->phoneNumber = $phoneNumber;
        $this->link = $link;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        event(new \App\Events\ForgotPasswordEvent($this->phoneNumber, $this->link));
    }
}
