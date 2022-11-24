<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Shabina\Custom\Block;

use Magento\Framework\View\Element\Template;
use Shabina\Custom\Model\ResourceModel\View\CollectionFactory;
use Shabina\Custom\Model\ViewFactory;

/**
 * Main contact form block
 *
 * @api
 * @since 100.0.2
 */
class Index extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(ViewFactory $view, Template\Context $context, array $data = [], CollectionFactory $collection)
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
        $this->collection = $collection;
        $this->view= $view;
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('blogform/post/view', ['_secure' => true]);
    }
    public function getDetails() {
        return $details= $this->collection->create()->addFieldToSelect('*')->load();
       // return $details->getItems();
    
        //dump($details->getItems()); exit;

    }
    public function editdetails(){
        $edit =$this->getRequest()->getParam('id');
        return $this->view->create()->load($edit);
    }
}
