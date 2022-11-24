<?php
namespace Shabina\Custom\Model\ResourceModel\View;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Shabina\Custom\Model\View::class, \Shabina\Custom\Model\ResourceModel\View::class);
    }
}