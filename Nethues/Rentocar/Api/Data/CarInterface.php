<?php
namespace Nethues\Rentocar\Api\Data;

interface CarInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID_CAR          = 'id_car';
    const ID_OWNER          = 'id_owner';
    const ID_CUSTOMER          = 'id_customer';
    const CAR_NAME           = 'car_name';
    const CAR_RENT           = 'car_rent';
    const CAR_MILAGE             = 'car_milage';
    const CAR_DETAILS         = 'car_details';
    const IS_BOOKED         = 'is_booked';
    const IS_ACTIVE         = 'is_active';
    const CREATED_DATE    = 'created_date';
     
    /**#@-*/


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getCarName();

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getCarRent();

    public function getCarMilage();

    public function getCarDetails();

    public function getIsBooked();
    public function getIsActive();
    public function getIdOwner();
    public function getIdCustomer();

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedDate();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getIdCar();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setCarName($title);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setCarRent($content);

    public function setCarMilage($content);

    public function setCarDetails($content);
    public function setIsBooked($content);
    public function setIsActive($content);
    public function setIdOwner($content);
    public function setIdCustomer($content);

    /**
     * Set Crated At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setCreatedDate($createdAt);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setIdCar($id);

    
}