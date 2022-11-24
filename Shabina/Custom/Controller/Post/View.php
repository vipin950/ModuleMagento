<?php

namespace Shabina\Custom\Controller\Post;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Action\Context;
use Psr\Log\LoggerInterface;
use Shabina\Custom\Model\ViewFactory;

class View extends Action 
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $LoggerInterface;
    protected $View;
    

    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct(ViewFactory $view,  Context $context, PageFactory $resultPageFactory, LoggerInterface $LoggerInterface) {
        parent::__construct($context);
        $this->context = $context;
        $this->resultPageFactory = $resultPageFactory;
        $this->logger =$LoggerInterface;
        $this->view =$view;
    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {

       try {
            $data= $this->validatedParams();
            $this->messageManager->addSuccessMessage(
                __('Thanks for Submitting the form ')
            );
           
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            
        } catch (\Exception $e) {
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
           
        }
        $result= $this->view->create()->setData($data);
        if($result->save()){
            $this->messageManager->addSuccessMessage(
                __('Your Details have been stored ')
            );

        } else {
            $this->messageManager->addErrorMessage(
                __('An error on saving Data')
            );

        }
        return $this->resultRedirectFactory->create()->setPath('blogform/index');
        // return $this->resultPageFactory->create();
        
    }
    private function validatedParams()
    {
        $request = $this->getRequest();

        if (trim($request->getParam('title', '')) === '') {
            throw new LocalizedException(__('Enter the title and try again.'));
        }
        if (trim($request->getParam('description', '')) === '') {
            throw new LocalizedException(__('Enter the description and try again.'));
        }


        if (trim($request->getParam('hideit', '')) !== '') {
            // phpcs:ignore Magento2.Exceptions.DirectThrow
            throw new \Exception();
        }
        if (trim($request->getParam('status','')) !=0 && trim($request->getParam('status','')) !=1 ){
            throw new LocalizedException(__('Status can be either 0 or 1.'));
        }
        

        return $request->getParams();
    }
}