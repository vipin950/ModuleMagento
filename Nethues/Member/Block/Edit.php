<?php

namespace Nethues\Member\Block;

use Magento\Framework\View\Element\Template;
use Nethues\Member\Model\ResourceModel\View\CollectionFactory;
use Nethues\Member\Model\ViewFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;

class Edit extends Template
{
protected $_pageFactory;
protected $_coreRegistry;
protected $_contactLoader;

public function __construct(
Context $context,
PageFactory $pageFactory,
Registry $coreRegistry,
ViewFactory $contactLoader,
array $data = []
){
$this->_pageFactory = $pageFactory;
$this->_coreRegistry = $coreRegistry;
$this->_contactLoader = $contactLoader;
return parent::__construct($context,$data);
}

public function execute()
{
return $this->_pageFactory->create();
}

public function getEditData()
{
$id = $this->_coreRegistry->registry('editId');
$postData = $this->_contactLoader->create();
$result = $postData->load($id);
$result = $result->getData();
return $result;
}
}