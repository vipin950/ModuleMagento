<?php
namespace Operations\Applyjob\Controller\Adminhtml\Candidate;
class Index extends \Magento\Backend\App\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		 parent::__construct($context);
	}

	public function execute()
	{
        
     		return $this->_pageFactory->create();
	}
}