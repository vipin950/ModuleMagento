<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Operations\Applyjob\Model\View\Source;

use Magento\Framework\Data\OptionSourceInterface;
// use Magento\Framework\View\Model\PageLayout\Config\BuilderInterface;
use Operations\Applyjob\Model\ResourceModel\View\CollectionFactory;

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
    public function __construct(CollectionFactory $collection)
    {
        // $this->pageLayoutBuilder = $pageLayoutBuilder;
        $this->collection = $collection;
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        $dataOptions = $this->collection->create()->addFieldToSelect('*')->load();
    //  echo "<pre>";
    //     print_r($data->getData());
    //     die;
    //$configOptions = $this->pageLayoutBuilder->getPageLayoutsConfig()->getOptions();
        $options = [];
        foreach ($dataOptions as $value) {
            $options[] = [
                'label' => $value->getExperiance(),
                'value' => $value->getExperiance(),
            ];
        }
        $this->options = $options;
        // echo "<pre>";
        // print_r($options);
        // die;
        return $options;
    }
}
