<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Job\Block\Adminhtml\Application\Edit;

use Magento\Backend\Block\Widget\Context;
use Nethues\Job\Api\BlockRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var PageRepositoryInterface
     */
    protected $pageRepository;

    /**
     * @param Context $context
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(
        Context $context,
        BlockRepositoryInterface $pageRepository
    ) {
        $this->context = $context;
        $this->pageRepository = $pageRepository;
    }

    /**
     * Return CMS page ID
     *
     * @return int|null
     */
    public function getIdJob()
    {
        try {
            return $this->pageRepository->getById(
                $this->context->getRequest()->getParam('id_job')
            )->getIdJob();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
