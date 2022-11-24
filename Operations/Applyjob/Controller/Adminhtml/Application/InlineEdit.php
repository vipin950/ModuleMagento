<?php
namespace Operations\Applyjob\Controller\Adminhtml\Application;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Operations\Applyjob\Model\ViewFactory;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    private $dataFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        ViewFactory $dataFactory)
    {
       parent::__construct($context);
       $this->jsonFactory = $jsonFactory;
       $this->dataFactory = $dataFactory;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

       if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
               $messages[] = __('Please correct the data sent.');
               $error = true;
           } else {
              foreach (array_keys($postItems) as $id) {
                $model = $this->dataFactory->create()->load($id);
                  try {
                    $model->setData(array_merge($model->getData(), $postItems[$id]));
                     $model->save();
                } catch (\Exception $e) {
                   $messages[] = "[Customform ID: {$id}] {$e->getMessage()}";
                   $error = true;
                 }
             }
         }
     }


return $resultJson->setData([
'messages' => $messages,
'error' => $error]);
} 
}