<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Job\Controller\Adminhtml\Application;

use Magento\Framework\App\Action\HttpPostActionInterface;

/**
 * Delete CMS page action.
 */
class Delete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Nethues_Job::job_delete';

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id_job');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        
        if ($id) {
            $title = "";
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Nethues\Job\Model\View::class);
                $model->load($id);
                
                $title = $model->getTitle();
                $model->delete();
                
                // display success message
                $this->messageManager->addSuccessMessage(__('The Job has been deleted.'));
                
                // // go to grid
                // $this->_eventManager->dispatch('adminhtml_cmspage_on_delete', [
                //     'title' => $title,
                //     'status' => 'success'
                // ]);
                
                
            } catch (\Exception $e) {
                // $this->_eventManager->dispatch(
                //     'adminhtml_cmspage_on_delete',
                //     ['title' => $title, 'status' => 'fail']
                // );
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                
                

                // go back to edit form
                //return $resultRedirect->setPath('*/*/edit', ['page_id' => $id]);
            }
            return $resultRedirect->setPath('job/candidate/');
        }
        
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a page to delete.'));
        
        // go to grid
      //  return $resultRedirect->setPath('*/*/');
      return $resultRedirect->setPath('job/candidate/');
    }
}
