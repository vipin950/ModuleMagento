<?php
namespace Operations\Applyjob\Controller\Apply;
use Operations\Applyjob\Model\ViewFactory;
class Delete extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $view;
	public function __construct(ViewFactory $view,
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
        $this->view = $view;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        $iddata = $this->getRequest()->getParam('id');
        $result = $this->view->create()->load($iddata);
        if($result->delete())
        {
            $this->messageManager->addSuccessMessage(
                __('Deleted successfully')
            );
        }
        else 
        {
            $this->messageManager->addErrorMessage(
                __('Not Deleted')
            );
        }
        return $this->resultRedirectFactory->create()->setPath('job/apply/view');
		
	}
}