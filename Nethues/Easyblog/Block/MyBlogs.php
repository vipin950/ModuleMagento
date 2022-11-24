<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nethues\Easyblog\Block;

use Magento\Framework\View\Element\Template;

/**
 * Main contact form block
 *
 * @api
 * @since 100.0.2
 */
class MyBlogs extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('nethues/index/post', ['_secure' => true]);
    }

    public function getBlogLink()
    {
        return $this->getUrl('blog', ['_secure' => true]);
    }

    
    public function mycustomAction()
    {
        return "This is my custome module";
    }
}
