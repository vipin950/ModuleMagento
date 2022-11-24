<?php
namespace Operations\Applyjob\Api\Data;

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                   = 'id';
    const NAME                 = 'name';
    const EMAIL                = 'email';
    const TELEPHONE            = 'telephone';
    const EXPERIANCE           = 'experiance';
    const JOBPOSTS           = 'jobposts';
    const UPLOADFILE           = 'upload_file';
    

    /**#@-*/
    /**
     * Get Title
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Get Created At
     *
     * @return string|null
     */
    
    public function getTelephone();

    /**
     * Get ID
     *
     * @return int|null
     */

    public function getExperiance();

    /**
     * Get ID
     *
     * @return int|null
     */


    public function getJobposts();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getUploadFile();

    /**
     * Get ID
     *
     * @return int|null
     */


    public function getId();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setName($name);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setEmail($email);

    /**
     * Set Crated At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setTelephone($telephone);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setExperiance($experiance);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */

    public function setJobposts($jobposts);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */

    public function setUploadFile($upload_file);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */

    public function setId($id);
}
