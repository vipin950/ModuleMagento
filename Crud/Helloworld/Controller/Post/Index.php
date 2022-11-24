<?php

namespace Crud\Helloworld\Controller\Post;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;


class Index extends Action 
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct( Context $context, PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->context = $context;
        
    }
 

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {
       
        try{
            echo "<pre>";
            print_r($this->getRequest()->getParams());
            exit;
            $this->validateparam();
            $this->messageManager->addSuccessMessage(
                __('Thanks .')
            );

        }catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
         //   $this->dataPersistor->set($this->getRequest()->getParams()); 
        }catch (\Exception $e) {
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            //$this->dataPersistor->set('contact_us', $this->getRequest()->getParams());

        }

       return $this->resultRedirectFactory->create()->setPath('blognew/index');
    }

    private function validateparam(){

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

        return $request->getParams();

    }

   
}