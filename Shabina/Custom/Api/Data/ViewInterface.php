<?php
namespace Shabina\Custom\Api\Data; 

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ARTICLE_ID            = 'article_id';
    const TITLE                 = 'title';
    const CONTENT               = 'description';
    const STATUS                = 'status';
    const CREATED_AT            = 'created_at';
    /**#@-*/


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getStatus();

    public function getCreatedAt();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getArticleId();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setDescription($content);

    /**
     * Set Crated At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setStatus($status);

    public function setCreatedAt($createdAt);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setArticleId($id);
}