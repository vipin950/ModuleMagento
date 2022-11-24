<?php
/**
* Copyright © Magento, Inc. All rights reserved.
* See COPYING.txt for license details.
*/

namespace Operations\Applyjob\Helper;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Helper\View as CustomerViewHelper;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
* Contact base helper
*
* @deprecated 100.2.0
* @see \Magento\Contact\Model\ConfigInterface
*/
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var DataPersistorInterface
     */
    protected $_customerViewHelper;
     private $dataPersistor;
     protected $_customerSession;
    /**
     * @var array
     */
     private $postData = null;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
     public function __construct(
         \Magento\Framework\App\Helper\Context $context,
         \Magento\Customer\Model\Session $customerSession,
         CustomerViewHelper $customerViewHelper
     ) {
        $this->_customerSession = $customerSession;
        $this->_customerViewHelper = $customerViewHelper;
         parent::__construct($context);
     }

     /**
      * Get value from POST by key
      *
      * @param string $key
      * @return string
      */
     //session code start 
      public function getUserName()
      {
          if (!$this->_customerSession->isLoggedIn()) {
              return '';
          }
          /**
           * @var \Magento\Customer\Api\Data\CustomerInterface $customer
           */
          $customer = $this->_customerSession->getCustomerDataObject();
  
          return trim($this->_customerViewHelper->getCustomerName($customer));
      }


      public function getUserEmail()
      {
          if (!$this->_customerSession->isLoggedIn()) {
              return '';
          }
          /**
           * @var CustomerInterface $customer
           */
          $customer = $this->_customerSession->getCustomerDataObject();
  
          return $customer->getEmail();
      }


      

  


    //session code end 

      public function getPostValue($key)
     {
         if (null === $this->postData) {
             $this->postData = (array) $this->getDataPersistor()->get('apply_here');
             $this->getDataPersistor()->clear('apply_here');
         }

         if (isset($this->postData[$key])) {
            return (string) $this->postData[$key];
         }

         return '';
     }

     /**
      * Get Data Persistor
      *
      * @return DataPersistorInterface
      */
      private function getDataPersistor()
     {
        if ($this->dataPersistor === null) {
             $this->dataPersistor = ObjectManager::getInstance()
                     ->get(DataPersistorInterface::class);
       }

       return $this->dataPersistor;
    }
}