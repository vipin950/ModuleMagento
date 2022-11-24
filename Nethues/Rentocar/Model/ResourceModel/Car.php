<?php

namespace Nethues\Rentocar\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Car extends AbstractDb
{
    /**
     * Post Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('nethues_rentocar', 'id_car');
    }
}