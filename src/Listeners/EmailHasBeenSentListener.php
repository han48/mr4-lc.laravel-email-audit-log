<?php

namespace Mr4Lc\LaravelEmailAuditLog\Listeners;

use Mr4Lc\LaravelEmailAuditLog\Models\EmailAudit;
use Illuminate\Mail\Events\MessageSent;

class EmailHasBeenSentListener
{
    public function handle(MessageSent $event)
    {
        $subject        = $event->message->getSubject();
        $toArr          = $this->parseAddresses($event->message->getTo());
        $ccArr          = $this->parseAddresses($event->message->getCc());
        $fromArr        = $this->parseAddresses($event->message->getFrom());
        $body           = $this->parseBodyText($event->message->getBody());
        $user           = auth()->id() ?? NULL;

        EmailAudit::create([
            'user_id'   => $user,
            'from'      => json_encode($fromArr),
            'to'        => json_encode($toArr),
            'cc'        => $ccArr ? json_encode($ccArr) : NULL,
            'subject'   => $subject,
            'body'      => $body,
        ]);

        return false;
    }

    private function parseAddresses($array): array
    {
        $parsed = [];
        if (isset($array) && is_array($array)) {
            foreach($array as $key => $address) {
                if (isset($address) && method_exists($address, 'getAddress')) {
                    $parsed[] = $address->getAddress();
                } else {
                    $parsed[] = $key;
                }
            }
        }
        return $parsed;
    }

    private function parseBodyText($body): string
    {
        return preg_replace('~[\r\n]+~', '<br>', $body);
    }
}
