<?php

namespace Nethues\Member\Controller\Register;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use Nethues\Member\Model\ViewFactory;
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

        echo $id_member = $this->getRequest()->getParam('id_member');
        //exit;
        //load single recorf
        //$filtered_data = $this->view->create()->load(1)->getData();
        //print_r($filtered_data); exit;
        
        //Edit single record
        //$filtered_data = $this->view->create()->load(1)->setFname('viping')->save();

        //Delete single record  yes mam  :)
        $result = $this->view->create()->load($id_member);

        if($result->delete()){
            $this->messageManager->addSuccessMessage(
                __('Member has been deleted!! .')
            );
    
           }else{
                $this->messageManager->addErrorMessage(
                    __('An error while storing Member data!.')
                );
           }
           return $this->resultRedirectFactory->create()->setPath('member/register/view');
      //  exit;
        //return $this->resultPageFactory->create();
    }


}
