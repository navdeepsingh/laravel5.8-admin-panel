<?php

namespace App\Listeners;

use App\Events\SignupEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MergeTagsToMailchimp
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

        $this->mailchimp->lists->updateMember(
            env('MAILCHIMP_LIST_ID'),
            ['email' => $event->signup->email],
            ['OUTLET' => $event->signup->redemption->redeem_code, 
            'REDEEMDATE' => $event->signup->redemption->updated_at],
            null,
            false
        );

    }
}
