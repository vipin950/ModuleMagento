<?php

namespace Nethues\Rentocar\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Nethues\Rentocar\Api\Data\CarInterface;

/**
 * Class File
 * @package Thecoachsmb\Mymodule\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Car extends AbstractModel implements CarInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'nethues_car_list';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Nethues\Rentocar\Model\ResourceModel\Car');
    }


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getCarName()
    {
        return $this->getData(self::CAR_NAME);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getCarRent()
    {
        return $this->getData(self::CAR_RENT);
    }

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getCarMilage()
    {
        return $this->getData(self::CAR_MILAGE);
    }
    

    public function getCarDetails()
    {
        return $this->getData(self::CAR_DETAILS);
    }


    
    public function getIsBooked()
    {
        return $this->getData(self::IS_BOOKED);
    }

    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
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

    public function getIdOwner()
    {
        return $this->getData(self::ID_OWNER);
    }

    public function getIdCustomer()
    {
        return $this->getData(self::ID_CUSTOMER);
    }
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getIdCar()
    {
        return $this->getData(self::ID_CAR);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getIdCar()];
    }

    
    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setCarName($name)
    {
        return $this->setData(self::CNAME, $name);
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setCarRent($email)
    {
        return $this->setData(self::CAR_RENT, $email);
    }

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setCarMilage($exp)
    {
        return $this->setData(self::CAR_MILAGE, $exp);
    }

    
    public function setCarDetails($post)
    {
        return $this->setData(self::CAR_DETAILS, $post);
    }

    public function setIsBooked($file)
    {
        return $this->setData(self::IS_BOOKED, $file);
    }

    public function setIsActive($file)
    {
        return $this->setData(self::IS_ACTIVE, $file);
    }

    public function setIdOwner($file)
    {
        return $this->setData(self::ID_OWNER, $file);
    }

    public function setIdCustomer($file)
    {
        return $this->setData(self::ID_CUSTOMER, $file);
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
    public function setIdCar($idjob)
    {
        return $this->setData(self::ID_CAR, $idjob);
    }
}