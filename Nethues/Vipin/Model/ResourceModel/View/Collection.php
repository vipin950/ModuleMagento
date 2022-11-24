<?php
namespace Nethues\Vipin\Model\ResourceModel\View;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Nethues\Vipin\Model\View::class, \Nethues\Vipin\Model\ResourceModel\View::class);
    }
}