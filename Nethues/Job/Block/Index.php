<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Job\Block;

use Magento\Framework\View\Element\Template;
use Nethues\Job\Model\ResourceModel\View\CollectionFactory;
use Nethues\Job\Model\ViewFactory;
use Magento\Framework\App\Filesystem\DirectoryList; 

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
       public $applypost; 
 
    public function __construct(ViewFactory $view, Template\Context $context, array $data = [], CollectionFactory $collection)
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
        $this->collection = $collection;
        $this->view = $view;
       
        
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('job/apply/post/', ['_secure' => true]);
    }


    public function getUploadDir()
    {
        
        return DirectoryList::MEDIA."/jobpostfiles";
    }
    


    public function getCandidates(){
      return  $candidates = $this->collection->create()->addFieldToSelect('*')->load();
       //return $candidates->getItems();


     //  return $candidates = $this->collection->create()->addFieldToSelect('id_job','candi_name')->addFieldToFilter('experiance',10)->addFieldToFilter('id_job',['gt'=>2])->load();


       //You can pass multiple comma seprated cilumn name in ->addFieldToSelect()
       //you need to call addFieldToFilter() for each condition sepratly
       //return $candidates = $this->collection->create()->addFieldToSelect('*')->addFieldToFilter('experience',3)->addFieldToFilter('id_job',['gt'=>2])->load();
       
       
       //TO print MySql Query running behind the collection data fetch
        //echo $candidates->getSelect();
        // exit;

      
    }

    

     public  function editCandidate(){
         $id = $this->getRequest()->getParam('id_job');
        // exit;
         return $this->view->create()->load($id);
        
     }




     public function getCacheLifetime()
    {
        return null;
    }
}
