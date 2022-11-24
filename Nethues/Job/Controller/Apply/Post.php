<?php

namespace Nethues\Job\Controller\Apply;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Nethues\Job\Model\ViewFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Nethues\Job\Api\BlockRepositoryInterface;

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
    public function __construct(ViewFactory $view, Context $context, PageFactory $resultPageFactory, LoggerInterface $LoggerInterface, DataPersistorInterface $dataPersistor, UploaderFactory $uploaderFactory,
    AdapterFactory $adapterFactory,
    Filesystem $filesystem,
      BlockRepositoryInterface $blockRepository = null) {
       // echo "kkjkl"; exit;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->logger = $LoggerInterface;
        $this->dataPersistor = $dataPersistor;
        $this->view = $view;
        $this->blockRepository = $blockRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(BlockRepositoryInterface::class);
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
    }


    /**
     * Prints the information
     * @return Page
     */
    public function execute()
    {

        try{

           $form_data =  $this->validateparam();
           $id_job = $this->getRequest()->getParam("id_job");

           $files = $this->getRequest()->getFiles();
           if (isset($files['upload_file']) && !empty($files['upload_file']["name"])){

                $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'upload_file']);
                $uploaderFactory->setAllowedExtensions(['pdf']);
                $uploaderFactory->setAllowRenameFiles(true);
                //$uploaderFactory->setFilesDispersion(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $destinationPath = $mediaDirectory->getAbsolutePath($this->jobpostfiles);
                $result = $uploaderFactory->save($destinationPath);


                $form_data['upload_file']  = $result['file'];


                if (!$result) {
                throw new LocalizedException(
                __('File cannot be saved to path: $1', $destinationPath)
                );
                }
              }



           if(isset($form_data['id_job']) && $form_data['id_job'] != ''){
               $result = $this->view->create()->load($id_job)->setData($form_data);
               $success_msg = "Updated: Job Application Modification done!";
           }else{
               unset($form_data['id_job']);
               $result = $this->view->create()->setData($form_data);
               $success_msg = "Applied: Job Application submitted successfully!";
           }

          $model = $this->view->create();
          $model->setData($form_data);
          $this->blockRepository->save($model);

          // if($result->save()){
          //  $this->messageManager->addSuccessMessage(
          //      __($success_msg)
          //  );

           $this->dataPersistor->clear('job_post');

          // }else{
          //      $this->messageManager->addErrorMessage(
          //          __('An error while Job Application or updatetion!.')
          //      );
          // }
            $this->messageManager->addSuccessMessage(
                __('Pass: Job Application has valid entries!.')
            );




        }catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('job_post', $this->getRequest()->getParams());

            return $this->resultRedirectFactory->create()->setPath('job/apply');
         //   $this->dataPersistor->set($this->getRequest()->getParams());
        }catch (\Exception $e) {
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            $this->dataPersistor->set('job_post', $this->getRequest()->getParams());
            return $this->resultRedirectFactory->create()->setPath('job/apply');
            //$this->dataPersistor->set('contact_us', $this->getRequest()->getParams());

        }

       return $this->resultRedirectFactory->create()->setPath('job/applications');
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

        if (trim($request->getParam('candi_email', '')) === '') {
            throw new LocalizedException(__('Please Enter email.'));
        }

        if (trim($request->getParam('experience', '')) === '') {
            throw new LocalizedException(__('Enter experience in years.'));
        }

        if (trim($request->getParam('job_post', '')) === '') {
            throw new LocalizedException(__('Please Choose post you want to apply for.'));
        }

        if (trim($request->getParam('status', '')) != 0 && trim($request->getParam('status', '')) != 1 ) {
            throw new LocalizedException(__('Status can be only Active(1) or Inactive(0).'));
        }

        $filesdata = $request->getFiles();

        if (empty($filesdata['upload_file']['name'])) {
            throw new LocalizedException(__('File is required.'));
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
