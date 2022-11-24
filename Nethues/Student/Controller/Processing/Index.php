<?php

namespace Nethues\Student\Controller\Processing;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
//use Nethues\Member\Model\ViewFactory;


class Index extends Action 
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $LoggerInterface;
    protected $view;
    

    /**
     * @param PageFactory $resultPageFactory
     */
    // public function __construct(ViewFactory $view, Context $context, PageFactory $resultPageFactory, LoggerInterface $LoggerInterface)
    public function __construct( Context $context, PageFactory $resultPageFactory, LoggerInterface $LoggerInterface) {
       // echo "kkjkl"; exit;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->logger = $LoggerInterface;
        //$this->view = $view;
        
    }
 

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {
       
        try{
            // echo "<pre>";
            // print_r($this->getRequest()->getParams());
            // exit;
           $form_data =  $this->validateparam();
            $this->messageManager->addSuccessMessage(
                __('Member data has been registred!! .')
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
      $result = $this->view->create()->setData($form_data);
       if($result->save()){
        $this->messageManager->addSuccessMessage(
            __('Member data has been stored!! .')
        );

       }else{
            $this->messageManager->addErrorMessage(
                __('An error while storing Member data!.')
            );
       }
       return $this->resultRedirectFactory->create()->setPath('member/register');
    }

    private function validateparam(){

        $request = $this->getRequest();
         
        
        if (trim($request->getParam('fname', '')) != '') {

            if(!$this->isValidMemberName(trim($request->getParam('fname')))){
                throw new LocalizedException(__('Invalid name!! Please use only alfabates in first name.'));    
            }
        }else{
            throw new LocalizedException(__('Please Enter member\'s first name.'));
        }

        if (trim($request->getParam('lname', '')) === '') {
            throw new LocalizedException(__('Please Enter member\'s last name.'));
        }


        // if (trim($request->getParam('level', '')) > 15 || trim($request->getParam('level', '')) < 0) {
        //     throw new LocalizedException(__('Invalid Level!! Member Level must be between 0 - 15 '));
        // }

        
        // if (strlen(trim($request->getParam('mobile'))) < 10 ) {
        //     throw new LocalizedException(__('Invalid Mobile number,  mobile number must have 10 digit '));
        // }

        // if ($this->isValidDate(trim($request->getParam('dob')))) {
        //     if(!$this->isValidateAge(trim($request->getParam('dob')))){
        //         throw new LocalizedException(__('Member should be older than allowed age.'));
        //     }
        // }else{
        //     throw new LocalizedException(__('Invalid Date, please check and enter again'));
        // }


        // if (trim($request->getParam('address', '')) === '') {
        //     throw new LocalizedException(__('Enter the address, and try again.'));
        // }
        

        if (trim($request->getParam('status', '')) != 0 && trim($request->getParam('status', '')) != 1 ) {
            throw new LocalizedException(__('Status can be only Active(1) or Inactive(0).'));
        }

        

        if (trim($request->getParam('hideit', '')) !== '') {
            // phpcs:ignore Magento2.Exceptions.DirectThrow
            throw new \Exception();
        }

        return $request->getParams();

    }

    public function isValidMemberName($name){
        if(preg_match("/^([a-zA-Z' ]+)$/",$name)){
            return true;
        }
        return false;
    }
    
    public function isValidDate($inputdate, $format = 'Y-m-d'){
        
        $reg_rule = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
        if(preg_match($reg_rule, $inputdate))
            {   
                return true;
            }else{
                return false;
            }
    }

    function isValidateAge($dob_input, $allowed_age = 18)
        {
            $dob = strtotime($dob_input);
            $allowed_age = strtotime('+18 years',$dob);
            if(time() < $allowed_age)  {
                return false; 
            }
            return true; 
        }

   
}