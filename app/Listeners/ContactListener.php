<?php

namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Mail\Mailer;

class ContactListener
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(ContactRequestEvent $event): void
    {
        // Commenté pour le test du subscriber
        // $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }
}
