<?php

namespace Nethues\Member\Controller\View;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\PageFactory;
use Nethues\Member\Model\ViewFactory;

class Index implements HttpGetActionInterface 
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
        $this->view = $view;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {

     //   echo "testhghghjg"; exit;
        return $this->resultPageFactory->create();
        
        
        //echo "dkljkdljfjklf"; exit;
        //load single recorf
        $filtered_data = $this->view->create()->load(1)->getData();
        //print_r($filtered_data); exit;
        
        //Edit single record
        $filtered_data = $this->view->create()->load(1)->setFname('viping')->save();

        //Delete single record
        $filtered_data = $this->view->create()->load(1)->delete();

        exit;
        //return $this->resultPageFactory->create();
    }
}
