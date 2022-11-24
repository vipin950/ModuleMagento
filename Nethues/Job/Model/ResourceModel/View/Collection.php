<?php
namespace Nethues\Job\Model\ResourceModel\View;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Nethues\Job\Model\View::class, \Nethues\Job\Model\ResourceModel\View::class);
    }
}