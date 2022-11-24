<?php
namespace Operations\Applyjob\Api\Data;

interface JobInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const JOBID                   = 'job_id';
    const JOBPOST                 = 'job_post';

    /**#@-*/
    /**
     * Get Title
     *
     * @return string|null
     */
    public function getJobPost();

    public function getJobId();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setJobPost($job_post);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
  
    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
   
    public function setJobId($job_id);
}
