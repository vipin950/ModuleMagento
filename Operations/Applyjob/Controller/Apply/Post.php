<?php
namespace Operations\Applyjob\Controller\Apply;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Exception\LocalizedException;
use Operations\Applyjob\Model\ViewFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;
class Post extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $logger;
    protected $adapterFactory;
	protected $view;
    protected $uploaderFactory;
    protected $filesystem;
    private $dataPersistor;
	public function __construct(
		Context $context,
		ViewFactory $view,
        AdapterFactory $adapterFactory,
        LocalizedException $logger,
        DataPersistorInterface $dataPersistor,
		PageFactory $resultPageFactory,
        UploaderFactory $uploaderFactory,
        Filesystem $filesystem
        )
	{
      
        $this->adapterFactory = $adapterFactory;
        $this->uploaderFactory = $uploaderFactory;
        $this->filesystem = $filesystem;
        $this->dataPersistor = $dataPersistor;
		$this->view = $view;
        $this->logger = $logger;
	    $this->resultPageFactory = $resultPageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        try {

         $form_data = $this->validatedParams();
         $files = $this->getRequest()->getFiles();
         if (isset($files['upload_file']) && !empty($files['upload_file']["name"])){
            $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'upload_file']);
            $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png', 'pdf', 'docx', 'doc']);
            $uploaderFactory->setAllowRenameFiles(true);
            //$uploaderFactory->setFilesDispersion(true);
            $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
            $destinationPath = $mediaDirectory->getAbsolutePath('myimgfolder');
            $result = $uploaderFactory->save($destinationPath);
            if (!$result) {
            throw new LocalizedException(
            __('File cannot be saved to path: $1', $destinationPath)
            );
            }
            $imagePath = $result['file'];
            // print_r($imagePath);
            // die;
            //Set file path with name for save into database
            $form_data['upload_file'] = $imagePath;
            // echo "<pre>";
            //   print_r( $form_data);
            // die;
            }
         
          
            $result = $this->view->create()->setData($form_data);
            // $view->setData($data);
            if($result->save()){
            $this->messageManager->addSuccessMessage(__(' saved  data successfully.'));
            $this->dataPersistor->clear('apply_here');
            }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
            $this->dataPersistor->set('apply_here', $this->getRequest()->getParams());
            }

        }

         catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('apply_here', $this->getRequest()->getParams());
        }

        catch (\Exception $e) {
            
            $this->messageManager->addErrorMessage(
            __('An error occurred while processing your form. Please try again later.')
            );
            $this->dataPersistor->set('apply_here', $this->getRequest()->getParams());
    
}
     return $this->resultRedirectFactory->create()->setPath('job/apply');
    }		
    private function validatedParams()
    {
       
        $request = $this->getRequest();
        $filedata = $request->getFiles();
        if (trim($request->getParam('name')) == '') {
            throw new LocalizedException(__('Enter the Customer Name and try again.'));
        }

        if (trim($request->getParam('email')) == '') {
            throw new LocalizedException(__('Enter the email and try again.'));
        }

		if (trim($request->getParam('telephone')) == '') {
            throw new LocalizedException(__('Enter the Telephone and try again.'));
        }

		if (trim($request->getParam('experiance')) == '') {
            throw new LocalizedException(__('select the Experience and try again.'));
        }
		if (trim($request->getParam('jobposts')) == '') {
            throw new LocalizedException(__('Select anyone job post and try again.'));
        }
        //    $filedata = $request->getFiles();
       //    print_r($filedata);
       //    die;
        if (empty($filedata['upload_file']['name'])) {
            throw new LocalizedException(__('Select file and try again.'));
        }

        if (trim($request->getParam('hideit')) !== '') {
            throw new \Exception();
        }

        return $request->getParams();
    }
}