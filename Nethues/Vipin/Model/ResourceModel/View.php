<?php

namespace Nethues\Vipin\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class View extends AbstractDb
{
    /**
     * Post Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('nethues_vipin', 'id_vipin');
    }
}