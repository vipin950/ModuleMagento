<?php

namespace Operations\Applyjob\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Job extends AbstractDb
{
    /**
     * Post Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('job_post_table', 'job_id');
    }
}