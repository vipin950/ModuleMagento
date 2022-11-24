<?php

namespace Nethues\Member\Controller\Register;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface 
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory) {
        
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {
        //echo "dkljkdljfjklf"; exit;
               return $this->resultPageFactory->create();
    }
}
