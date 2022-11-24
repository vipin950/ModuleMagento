<?php
namespace Nethues\Job\Api\Data;

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID_JOB          = 'id_job';
    const CNAME           = 'candi_name';
    const EMAIL           = 'candi_email';
    const EXP             = 'experience';
    const JOBPOST         = 'job_post';
    const CREATED_DATE    = 'created_date';
    const UPLOAD_FILE     = 'upload_file';
    /**#@-*/


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getCandiName();

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getCandiEmail();

    public function getExperience();

    public function getJobPost();

    public function getUploadFile();

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
    public function getIdJob();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setCandiName($title);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setCandiEmail($content);

    public function setExperience($content);

    public function setJobPost($content);

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
    public function setIdJob($id);

    
}