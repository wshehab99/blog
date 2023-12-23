<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe($email, $list=null)
    {
        $list??=config('services.mailchimp.lists.subscriber');
        return $this->config()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
    protected function config():ApiClient
    {
        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);
    }
}
