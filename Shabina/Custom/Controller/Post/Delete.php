<?php

namespace Shabina\Custom\Controller\Post;

use \Magento\Framework\App\Action\Action;
// use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\PageFactory;
use Shabina\Custom\Model\ViewFactory;
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
    public function __construct(ViewFactory $view, Context $context, PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->context = $context;
        $this->resultPageFactory = $resultPageFactory;
        $this->view =$view;

    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {
        $article_id = $this->getRequest()->getParam('id');
        

        //  return $this->resultPageFactory->create();
        //Load Single Record
        // $fetch= $this->view->create()->load(1)->getData();
        //print_r($fetch); exit;

        //Edit Single Record 
        // $fetch= $this->view->create()->load(1)->setTitle('Editing the text in a array')->save();
        

        //Delete Single Record 
        $fetch= $this->view->create()->load($article_id);
        

        if($fetch->delete()){
            $this->messageManager->addSuccessMessage(
                __('Your Details have been Deleted ')
            );

        } else {
            $this->messageManager->addErrorMessage(
                __('An error on Deleting Data')
            );

        }
        return $this->resultRedirectFactory->create()->setPath('blogform/post/table');
        
    }

      
}