<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nethues\Job\ViewModel;

use Nethues\Job\Helper\Data;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Provides the user data to fill the form.
 */
class UserDataProvider implements ArgumentInterface
{

    /**
     * @var Data
     */
    private $helper;

    /**
     * UserDataProvider constructor.
     * @param Data $helper
     */
    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }



    /**
     * Get user name
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->helper->getPostValue('candi_name');
    }

    /**
     * Get user email
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->helper->getPostValue('candi_email');
    }

    /**
     * Get user telephone
     *
     * @return string
     */
    public function getUserExperience()
    {
        return $this->helper->getPostValue('experience');
    }

    /**
     * Get user comment
     *
     * @return string
     */
    public function getUserJobPost()
    {
        return $this->helper->getPostValue('job_post');
    }
}
