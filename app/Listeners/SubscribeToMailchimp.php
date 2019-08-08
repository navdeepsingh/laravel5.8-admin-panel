<?php

namespace App\Listeners;

use App\Events\SignupEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeToMailchimp
{
    private $mailchimp;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(\Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    /**
     * Handle the event.
     *
     * @param  SignupEvent  $event
     * @return void
     */
    public function handle(SignupEvent $event)
    {

        $this->mailchimp->lists->subscribe(
            env('MAILCHIMP_LIST_ID'),
            ['email' => $event->signup->email],
            ['NAME' => $event->signup->name, 
            'PHONE' => $event->signup->phone, 
            'REDEEMCODE' => $event->signup->redemption->redeem_code, 
            'OPTIN' => $event->signup->opt_in === 1 ? 'Yes' : 'No'],
            null,
            false
        );

    }
}
