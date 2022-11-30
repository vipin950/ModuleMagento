<?php

namespace Nethues\Job\Model;


class Product
{
    public \Magento\Catalog\Model\Product $subject;     

    public function afterGetName($subject, $result)
    {
        return $result." -Before getName";
    }
   
}