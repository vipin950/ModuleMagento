<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Vipin\Api;

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
 
}
