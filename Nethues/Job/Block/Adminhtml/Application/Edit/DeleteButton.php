<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Job\Block\Adminhtml\Application\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getButtonData()
    {
        $data = [];
        
        if ($this->getIdJob()) {
            $data = [
                'label' => __('Delete Job Application'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to delete this job Application?'
                ) . '\', \'' . $this->getDeleteUrl() . '\', {"data": {}})',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Url to send delete requests to.
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id_job' => $this->getIdJob()]);
    }
}
