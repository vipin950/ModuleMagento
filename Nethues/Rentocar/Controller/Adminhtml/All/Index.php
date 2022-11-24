<?php

namespace Nethues\Rentocar\Controller\Adminhtml\All;

//use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Backend\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $context;
    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory) {
        Parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {
        //echo "admin car up"; exit;
               return $this->resultPageFactory->create();
    }
}
