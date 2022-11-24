<?php
namespace Nethues\Vipin\Api\Data;

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID_VIPIN          = 'id_vipin';
    const CNAME           = 'candi_name';
    
    /**#@-*/


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getCandiName();
 
   

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getIdVipin();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setCandiName($title);
 

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setIdVipin($id);

    
}