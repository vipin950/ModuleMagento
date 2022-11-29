<?php

namespace Nethues\Job\Model;


class SubscriptionManager{
    
    
    public function beforeSubscribe(\Magento\Newsletter\Model\SubscriptionManager $subject, string $email, int $storeId)
    {
        $email = "jhjh@kjkj.com";
        return [$email, $storeId];
    }
     
}