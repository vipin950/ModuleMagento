<?php

namespace Operations\Applyjob\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Operations\Applyjob\Api\Data\ViewInterface;

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
    const CACHE_TAG = 'applyjob_table_apply';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Operations\Applyjob\Model\ResourceModel\View');
    }


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getTelephone()
    {
        return $this->getData(self::TELEPHONE);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getExperiance()
    {
        return $this->getData(self::EXPERIANCE);
    }

    /**
     * Get ID
     *
     * @return int|null
     */

    public function getJobposts()
    {
        return $this->getData(self::JOBPOSTS);
    }

    /**
     * Get ID
     *
     * @return int|null
     */

    public function getUploadFile()
    {
        return $this->getData(self::UPLOADFILE);
    }

    /**
     * Get ID
     *
     * @return int|null
     */

    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function  setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return $this
     */
    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */

    public function setExperiance($experiance)
    {
        return $this->setData(self::EXPERIANCE, $experiance);
    }

    public function setJobposts($jobposts)
    {
        return $this->setData(self::STATUS, $jobposts);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setUploadFile($upload_file)
    {
        return $this->setData(self::UPLOADFILE, $upload_file);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */


    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }
}