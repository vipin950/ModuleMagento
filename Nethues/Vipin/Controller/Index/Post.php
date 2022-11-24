<?php

namespace Nethues\Vipin\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Nethues\Vipin\Model\ViewFactory;
// // use Magento\Framework\App\Request\DataPersistorInterface;
 use Nethues\Vipin\Api\BlockRepositoryInterface;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;


class Post extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $LoggerInterface;
    protected $view;
    protected $dataPersistor;
    public    $jobpostfiles = 'jobpostfiles';  //Uppload dir


        /**
        * @var UploaderFactory
        */
        protected $uploaderFactory;

        /**
        * @var AdapterFactory
        */
        protected $adapterFactory;

        /**
        * @var Filesystem
        */
        protected $filesystem;


    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct(BlockRepositoryInterface $blockRepository, ViewFactory $viewFactory,Context $context, PageFactory $resultPageFactory, LoggerInterface $LoggerInterface) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->logger = $LoggerInterface;
        $this->view = $viewFactory;
        $this->blockRepository = $blockRepository;
        
    }


    /**
     * Prints the information
     * @return Page
     */
    public function execute()
    {

        try{

           $form_data =  $this->validateparam();
          // $id_job = $this->getRequest()->getParam("id_job");

          $model = $this->view->create();
          $model->setData($form_data);
          $this->blockRepository->save($model);

       
            $this->messageManager->addSuccessMessage(
                __('Pass: Job Application has valid entries!.')
            );




        }catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
         

            return $this->resultRedirectFactory->create()->setPath('vipin/index');
         //   $this->dataPersistor->set($this->getRequest()->getParams());
        }catch (\Exception $e) {
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            return $this->resultRedirectFactory->create()->setPath('vipin/index');
            //$this->dataPersistor->set('contact_us', $this->getRequest()->getParams());

        }

       return $this->resultRedirectFactory->create()->setPath('vipin/index');
    }

    private function validateparam(){

        $request = $this->getRequest();


        if (trim($request->getParam('candi_name', '')) != '') {

            if(!$this->isValidName(trim($request->getParam('candi_name')))){
                throw new LocalizedException(__('Invalid name!! Please enter a valid name.'));
            }
        }else{
            throw new LocalizedException(__('Candidate name is mandatory.'));
        }

       


        if (trim($request->getParam('hideit', '')) !== '') {
            // phpcs:ignore Magento2.Exceptions.DirectThrow
            throw new \Exception();
        }

        return $request->getParams();

    }

    public function isValidName($name){
        if(preg_match("/^([a-zA-Z' ]+)$/",$name)){
            return true;
        }
        return false;
    }




}
