<?php
namespace Operations\Applyjob\Model\ResourceModel\View;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */

 
    protected function _construct()
    {
        $this->_init(\Operations\Applyjob\Model\View::class, \Operations\Applyjob\Model\ResourceModel\View::class);
    }

    protected function _initSelect()
    {
        parent::_initSelect();
        
        //filter for custom_column field
        $value = 60;
        $data  = $this->addFieldToFilter("id", $value);
        print_r($data);
        die;
        return $this;
    }
  
}