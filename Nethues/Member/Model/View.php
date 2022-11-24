<?php

namespace Nethues\Member\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Nethues\Member\Api\Data\ViewInterface;

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
    const CACHE_TAG = 'nethues_member_view';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Nethues\Member\Model\ResourceModel\View');
    }


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getFname()
    {
        return $this->getData(self::FNAME);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getLname()
    {
        return $this->getData(self::LNAME);
    }


    public function getStatus()
    {
        return $this->getData(self::STATUS);
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
    public function getIdMember()
    {
        return $this->getData(self::ID_MEMBER);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getIdMember()];
    }

    
    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setFname($title)
    {
        return $this->setData(self::FNAME, $title);
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setLname($content)
    {
        return $this->setData(self::LNAME, $content);
    }


    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
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
    public function setIdMember($idmember)
    {
        return $this->setData(self::ID_MEMBER, $idmemberd);
    }
}