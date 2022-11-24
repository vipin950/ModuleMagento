<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Student\Block;

use Magento\Framework\View\Element\Template;
//use Nethues\Student\Model\ResourceModel\View\CollectionFactory;

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
    //public function __construct(Template\Context $context, array $data = [], CollectionFactory $collection)
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
        //$this->collection = $collection;
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('student/processing/index/', ['_secure' => true]);
    }

    public function getPostData($name){
        if(isset($_POST[$name])){
            return $_POST[$name];
        }else{
            return "";
        }
        
    }

    // public function getMembers(){
    //    return $members = $this->collection->create()->addFieldToSelect('*')->load();
    //  //   dump($members->getItems()); exit;
    // }

    // public function getMemberById($id_member){
    //     //echo $id_member; exit;
    //    return $members = $this->collection->create()->addFieldToFilter('id_member', $id_member)->load();
    //   // return $members->getItems(); 
    //  }
}
