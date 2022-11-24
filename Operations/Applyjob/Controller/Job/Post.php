<?php
namespace Operations\Applyjob\Controller\Job;
use Operations\Applyjob\Model\JobFactory;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
class Post extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $job;
    protected $logger;
    protected $loggerInterface;
	public function __construct(
        JobFactory $job,
		\Magento\Framework\App\Action\Context $context,
        LocalizedException $logger,
        LoggerInterface $loggerInterface,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
        $this->loggerInterface = $loggerInterface;
        $this->logger = $logger;
        $this->job = $job;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
     
        try {

            $form_data = $this->validatedParams();
            $result = $this->job->create()->setData($form_data);
            if($result->save())
            {
                $this->messageManager->addSuccessMessage(
                    __('saved successfully')
                );
            }
            else 
            {
                $this->messageManager->addErrorMessage(
                    __('Data not saved')
                );
            }
            return $this->resultRedirectFactory->create()->setPath('job/job/index');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $this->resultRedirectFactory->create()->setPath('job/job/index');
        }
        
        catch (\Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );

            
        }
       
	}
    private function validatedParams()
    {
        $request = $this->getRequest();
        if (trim($request->getParam('job_post')) == '') {
            throw new LocalizedException(__('Enter the job post and try again.'));
        }

        if (trim($request->getParam('hideit')) !== '') {
            throw new \Exception();
        }

        return $request->getParams();
    }
}