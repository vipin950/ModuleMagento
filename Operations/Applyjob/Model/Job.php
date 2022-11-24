<?php

namespace Operations\Applyjob\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Operations\Applyjob\Api\Data\JobInterface;

/**
 * Class File
 * @package Thecoachsmb\Mymodule\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Job extends AbstractModel implements JobInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'job_table';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Operations\Applyjob\Model\ResourceModel\Job');
    }


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getJobPost()
    {
        return $this->getData(self::JOBPOST);
    }


    public function getJobId()
    {
        return $this->getData(self::JOBID);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getJobId()];
    }

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setJobPost($job_post)
    {
        return $this->setData(self::JOBPOST, $job_post);
    }


    public function setJobId($job_id)
    {
        return $this->setData(self::JOBID, $job_id);
    }
}