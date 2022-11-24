<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Operations\Applyjob\Api;

/**
 * CMS block CRUD interface.
 * @api
 * @since 100.0.2
 */
interface BlockRepositoryInterface
{
    /**
     * Save block.
     *
     * @param \Magento\Cms\Api\Data\BlockInterface $block
     * @return \Magento\Cms\Api\Data\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\ViewInterface $block);

    /**
     * Retrieve block.
     *
     * @param string $blockId
     * @return \Magento\Cms\Api\Data\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($blockId);

    /**
     * Retrieve blocks matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Cms\Api\Data\BlockSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete block.
     *
     * @param \Magento\Cms\Api\Data\BlockInterface $block
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\ViewInterface $block);

    /**
     * Delete block by ID.
     *
     * @param string $blockId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($blockId);
}
