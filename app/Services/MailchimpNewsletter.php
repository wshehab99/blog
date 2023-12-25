<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public ApiClient $client;
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe($email, $list=null)
    {
        $list??=config('services.mailchimp.lists.subscriber');
        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}
