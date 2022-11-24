<?php

namespace Nethues\Vipin\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Nethues\Vipin\Api\Data\ViewInterface;

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
    const CACHE_TAG = 'nethues_vipin_view';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Nethues\Vipin\Model\ResourceModel\View');
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
     * Get ID
     *
     * @return int|null
     */
    public function getIdVipin()
    {
        return $this->getData(self::ID_VIPIN);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getIdVipin()];
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
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setIdVipin($IdVipin)
    {
        return $this->setData(self::ID_VIPIN, $IdVipin);
    }
}