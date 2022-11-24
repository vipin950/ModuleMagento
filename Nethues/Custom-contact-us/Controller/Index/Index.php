<?php

namespace Nethues\CustomContactUs\Controller\Index;

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
    {echo "scscsc"; exit;
        return $this->resultPageFactory->create();
    }
}