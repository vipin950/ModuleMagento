<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nethues\Job\Helper;
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
    private $dataPersistor;

    /**
     * @var array
     */
    private $postData = null;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param CustomerViewHelper $customerViewHelper
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
       
        parent::__construct($context);
    }

   
 
   
    /**
     * Get value from POST by key
     *
     * @param string $key
     * @return string
     */
    public function getPostValue($key)
    {
        if (null === $this->postData) {
            $this->postData = (array) $this->getDataPersistor()->get('job_post');
            $this->getDataPersistor()->clear('job_post');
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
