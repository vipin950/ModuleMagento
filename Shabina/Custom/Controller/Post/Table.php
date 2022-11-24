<?php

namespace Shabina\Custom\Controller\Post;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\PageFactory;
use Shabina\Custom\Model\ViewFactory;

class Table implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $view;

    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct(ViewFactory $view, PageFactory $resultPageFactory) {
        $this->resultPageFactory = $resultPageFactory;
        $this->view =$view;
    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {
         return $this->resultPageFactory->create();
        //Load Single Record
        $fetch= $this->view->create()->load(1)->getData();
        //print_r($fetch); exit;

        //Edit Single Record 
        $fetch= $this->view->create()->load(1)->setTitle('Editing the text in a array')->save();
        

        //Delete Single Record 
        $fetch= $this->view->create()->load(1)->delete();
        exit;

        //return $this->resultPageFactory->create();
    }
}