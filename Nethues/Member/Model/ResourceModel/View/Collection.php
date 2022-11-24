<?php
namespace Nethues\Member\Model\ResourceModel\View;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Nethues\Member\Model\View::class, \Nethues\Member\Model\ResourceModel\View::class);
    }
}