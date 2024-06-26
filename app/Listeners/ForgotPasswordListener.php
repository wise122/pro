<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ForgotPasswordListener implements ShouldQueue
{
    public function handle($event)
    {
        $phoneNumber = $event->phoneNumber;
        $link = $event->link;

        $whatsappService = new \App\Services\WhatsappService();
        $whatsappService->sendForgotPasswordLink($phoneNumber, $link);
    }
}
