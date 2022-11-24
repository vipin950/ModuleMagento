<?php

namespace Shabina\Custom\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Shabina\Custom\Api\Data\ViewInterface;


/**
 * Class File
 * @package Shabina\Custom\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class View extends AbstractModel implements ViewInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'shabina_custom';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Shabina\Custom\Model\ResourceModel\View');
    }


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->getData(self::CONTENT);
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
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getArticleId()
    {
        return $this->getData(self::ARTICLE_ID);
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
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setDescription($content)
    {
        return $this->setData(self::CONTENT, $content);
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
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setArticleId($id)
    {
        return $this->setData(self::ARTICLE_ID, $id);
    }
}