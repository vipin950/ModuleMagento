<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Vipin\Block;

use Magento\Framework\View\Element\Template;
//use Nethues\Job\Model\ResourceModel\View\CollectionFactory;
//use Nethues\Job\Model\ViewFactory;
use Magento\Framework\App\Filesystem\DirectoryList; 

/**
 * Main contact form block
 *
 * @api
 * @since 100.0.2
 */
class Index extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
       public $applypost; 
 
    public function __construct( Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
       
       
        
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('vipin/index/post/', ['_secure' => true]);
    }
 

     public function getCacheLifetime()
    {
        return null;
    }
}
