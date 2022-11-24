<?php
namespace Nethues\Member\Api\Data;

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID_MEMBER            = 'id_member';
    const FNAME                 = 'fname';
    const LNAME               = 'lname';
    const STATUS               = 'status';
    const CREATED_DATE            = 'created_date';
    /**#@-*/


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getFname();

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getLname();

    public function getStatus();

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
    public function getIdMember();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setFname($title);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setLname($content);

    public function setStatus($content);

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
    public function setIdMember($id);

    
}