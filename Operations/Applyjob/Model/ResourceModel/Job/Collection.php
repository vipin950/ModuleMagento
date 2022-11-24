<?php
namespace Operations\Applyjob\Model\ResourceModel\Job;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Operations\Applyjob\Model\Job::class, \Operations\Applyjob\Model\ResourceModel\Job::class);
    }
}