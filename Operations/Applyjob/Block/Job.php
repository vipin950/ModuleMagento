<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Operations\Applyjob\Block;
use Operations\Applyjob\Model\ResourceModel\Job\CollectionFactory;
use Operations\Applyjob\Model\JobFactory;
use Magento\Framework\View\Element\Template;
/**
 * Main contact form block
 *
 * @api
 * @since 100.0.2
 */
class Job extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [],CollectionFactory $collection,JobFactory $job)
    {
        $this->collection = $collection;
        $this->job = $job;
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
      
    }

    public function getFormAction()
    {
        return $this->getUrl('job/job/post', ['_secure' => true]);
    }

    public function getCollection()
    {

    return $member = $this->collection->create()->addFieldToSelect('*')->load();

    // $member = $this->collection->create()->addFieldToSelect(['job_id','job_post'])->addFieldToFilter('job_id',['lteq'=>2])->load();
    // $member = $this->collection->create()->addFieldToSelect(['job_id','job_post'])->addFieldToFilter('job_post',array('like' => 'J%'))->load();
    //$member = $this->collection->create()->addFieldToSelect(['job_id','job_post'])->addFieldToFilter('job_id', array('in' => array(1,4)))->load();
    // $member = $this->collection->create()->addFieldToSelect(['job_id','job_post'])->addFieldToFilter('job_id', array('nin' => array(1,4)))->load();
    // echo $member->getSelect();
    //echo $member->getSelect();
    //echo $member->getSelect();
  
    }

    
}
