<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Operations\Applyjob\Block;
use Operations\Applyjob\Model\ResourceModel\View\CollectionFactory;
use Operations\Applyjob\Model\ViewFactory;
use Magento\Framework\View\Element\Template;
/**
 * Main contact form block
 *
 * @api
 * @since 100.0.2
 */
class Apply extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [],CollectionFactory $collection,ViewFactory $view)
    {
        $this->collection = $collection;
        $this->view = $view;
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
      
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('job/apply/post', ['_secure' => true]);
    }

    public function getCollection()
    {

        return $member = $this->collection->create()->addFieldToSelect(['id','name','email','experiance'])->addFieldToFilter('experiance',1)->addFieldToFilter('id',['gt'=>2])->setPageSize(2)->load();
//    echo $member->getSelect();
//    exit;
    }

    public function getAdminCollection()
    {

        return $member = $this->collection->create()->addFieldToSelect('*')->load();
    }


    public function getFieldData()
    {
     return $member = $this->collection->create()->addFieldToSelect(['id','title'])->addFieldToFilter('experiance',1)->load();
    }
    
    public function editData()
    {
        $id = $this->getRequest()->getParam('id');
        // print_r($id);
        return $data =  $this->view->create()->load($id);
        
    }


    public function singleRecord()
    {
         $single = $this->getRequest()->getParam('id');
        return $this->view->create()->load($single);
    }

  
  
    
}
