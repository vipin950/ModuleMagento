<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Job\Ui\Component\Listing\Columns;

 


class ProductActions  
{
    public function afterPrepareDataSource(\Magento\Catalog\Ui\Component\Listing\Columns\ProductActions $subject, array $dataSource, $result)
    {
        foreach ($result['data']['items'] as $key => $value) {
            $result['data']['items'][$key]['name'] = $value['name']." (".$value['websites'].")";
        }
        
        return $result;
    }

    
}
