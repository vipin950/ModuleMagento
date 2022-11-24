<?php

namespace Nethues\Job\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Nethues\Job\Api\Data\ViewInterface;

/**
 * Class File
 * @package Thecoachsmb\Mymodule\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class View extends AbstractModel implements ViewInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'nethues_job_view';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Nethues\Job\Model\ResourceModel\View');
    }


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getCandiName()
    {
        return $this->getData(self::CNAME);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getCandiEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getExperience()
    {
        return $this->getData(self::EXP);
    }
    

    public function getJobPost()
    {
        return $this->getData(self::JOBPOST);
    }


    
    public function getUploadFile()
    {
        return $this->getData(self::UPLOAD_FILE);
    }


    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedDate()
    {
        return $this->getData(self::CREATED_DATE);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getIdJob()
    {
        return $this->getData(self::ID_JOB);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getIdJob()];
    }

    
    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setCandiName($name)
    {
        return $this->setData(self::CNAME, $name);
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setCandiEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setExperience($exp)
    {
        return $this->setData(self::EXP, $exp);
    }

    
    public function setJobPost($post)
    {
        return $this->setData(self::JOBPOST, $post);
    }

    public function setUploadFile($file)
    {
        return $this->setData(self::UPLOAD_FILE, $file);
    }

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedDate($createdAt)
    {
        return $this->setData(self::CREATED_DATE, $createdAt);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setIdJob($idjob)
    {
        return $this->setData(self::ID_JOB, $idjob);
    }
}