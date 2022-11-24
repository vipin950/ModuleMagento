<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Job\Model\View\Source;

use Magento\Framework\Data\OptionSourceInterface;
//use Magento\Framework\View\Model\PageLayout\Config\BuilderInterface;
use Nethues\Job\Model\ResourceModel\View\CollectionFactory;

/**
 * Class PageLayout
 */
class Experience implements OptionSourceInterface
{
    /**
     * @var \Magento\Framework\View\Model\PageLayout\Config\BuilderInterface
     */
    protected $pageLayoutBuilder;

    /**
     * @var array
     * @deprecated 103.0.1 since the cache is now handled by \Magento\Theme\Model\PageLayout\Config\Builder::$configFiles
     */
    protected $options;

    /**
     * Constructor
     *
     * @param BuilderInterface $pageLayoutBuilder
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        $configOptions = $this->collectionFactory->create()->addFieldToSelect('*')->load();
        
       // $configOptions = [1,2,3,4];
        $options = [];
      
        foreach ($configOptions as  $value) {
            $options[] = [
                'label' => $value->getExperience(),
                'value' => $value->getExperience(),
            ];
        }
        

       // $this->options = $options;
 
        return $options;
    }
}
