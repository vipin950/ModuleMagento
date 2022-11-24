<?php

namespace Nethues\Job\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class View extends AbstractDb
{
    /**
     * Post Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('nethues_job', 'id_job');
    }
}