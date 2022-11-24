<?php

namespace Nethues\Job\Controller\Apply;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use Nethues\Job\Model\ViewFactory;
use Magento\Framework\App\Action\Context;

class Delete extends Action 
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $view;
    protected $context;
    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct(ViewFactory $view, PageFactory $resultPageFactory, Context $context) {
        $this->view = $view;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
      
    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {

        echo $id_job = $this->getRequest()->getParam('id_job');
       // exit;
        //load single recorf
        //$filtered_data = $this->view->create()->load(1)->getData();
        //print_r($filtered_data); exit;
        
        //Edit single record
        //$filtered_data = $this->view->create()->load(1)->setFname('viping')->save();

        //Delete single record  yes mam  :)
        $result = $this->view->create()->load($id_job);

        if($result->delete()){
            $this->messageManager->addSuccessMessage(
                __('Job application deleted!! .')
            );
    
           }else{
                $this->messageManager->addErrorMessage(
                    __('Unable to delete job application!.')
                );
           }
           return $this->resultRedirectFactory->create()->setPath('job/applications');
    }


}
