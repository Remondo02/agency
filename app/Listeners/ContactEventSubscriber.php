<?php

namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Mail\Mailer;

class ContactEventSubscriber
{

    public function __construct(private Mailer $mailer)
    {
    }

    public function sendEmailForContact(ContactRequestEvent $event)
    {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }

    public function subscribe(Dispatcher $dispatcher): array
    {
        // Example en retournant un tableau
        return [
            ContactRequestEvent::class => 'sendEmailForContact'
        ];
        // Example d'écriture d'un Event Subscriber
        // $dispatcher->listen(
        //     ContactRequestEvent::class,
        //     [ContactEventSubscriber::class, 'sendEmailForContact']
        // );
    }
}
