<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nethues\Vipin\Model;

use Nethues\Vipin\Api\BlockRepositoryInterface;
use Nethues\Vipin\Api\Data;
use Nethues\Vipin\Model\ResourceModel\View as ResourceBlock;
use Nethues\Vipin\Model\ResourceModel\View\CollectionFactory as BlockCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\EntityManager\HydratorInterface;

/**
 * Default block repo impl.
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BlockRepository implements BlockRepositoryInterface
{
    /**
     * @var ResourceBlock
     */
    protected $resource;

    /**
     * @var BlockFactory
     */
    protected $blockFactory;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;
 
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @param ResourceBlock $resource
     * @param BlockFactory $blockFactory
     * @param Data\BlockInterfaceFactory $dataBlockFactory
     * @param BlockCollectionFactory $blockCollectionFactory
     * @param Data\BlockSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param HydratorInterface|null $hydrator
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        ResourceBlock $resource,
        ViewFactory $blockFactory,
        StoreManagerInterface $storeManager,
        ?HydratorInterface $hydrator = null
    ) {
        $this->resource = $resource;
        $this->blockFactory = $blockFactory;
        $this->storeManager = $storeManager;
        $this->hydrator = $hydrator ?? ObjectManager::getInstance()->get(HydratorInterface::class);
    }

    /**
     * Save Block data
     *
     * @param \Magento\Cms\Api\Data\BlockInterface $block
     * @return Block
     * @throws CouldNotSaveException
     */
    public function save(Data\ViewInterface $block)
    {
        if (empty($block->getStoreId())) {
            $block->setStoreId($this->storeManager->getStore()->getId());
        }

        if ($block->getIdVipin() && $block instanceof Block && !$block->getOrigData()) {
            $block = $this->hydrator->hydrate($this->getById($block->getIdVipin()), $this->hydrator->extract($block));
        }

        try {
            $this->resource->save($block);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $block;
    }

   
}
