<?php

namespace Nethues\Vipin\Controller\Index;

use Magento\Framework\App\Action\Action;
class Index extends Action
{
protected $_resultPageFactory;

public function __construct(
\Magento\Framework\App\Action\Context $context,
\Magento\Framework\View\Result\PageFactory $resultPageFactory
) {
$this->_resultPageFactory = $resultPageFactory;
parent::__construct($context);
}

public function execute()
{
//echo "Module Cretaed Successfully"; exit;
    return $this->_resultPageFactory->create();
}
}
