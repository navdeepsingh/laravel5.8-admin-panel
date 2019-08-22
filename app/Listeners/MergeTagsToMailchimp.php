<?php

namespace App\Listeners;

use App\Events\RedemptionEvent;
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
     * @param  RedemptionEvent  $event
     * @return void
     */
    public function handle(RedemptionEvent $event)
    {

        $this->mailchimp->lists->updateMember(
            env('MAILCHIMP_LIST_ID'),
            ['email' => $event->redemption->signup->email],
            ['OUTLET' => $event->redemption->outlet->title, 
            'REDEEMDATE' => $event->redemption->updated_at],
            null,
            false
        );

    }
}
