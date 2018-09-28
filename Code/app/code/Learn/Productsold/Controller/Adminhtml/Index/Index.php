<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */
namespace Learn\Productsold\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
	protected $messageManager;
	protected $helper;
    protected $_coreRegistry;
    protected $resultPageFactory;	

	public function __construct(
		Action\Context $context,
		\Magento\Framework\Message\ManagerInterface $messageManager,
		\Learn\Productsold\Helper\Data $helper,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
	) {
		$this->messageManager = $messageManager;
		$this->helper = $helper;
        $this->_coreRegistry = $registry;
		parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
	}

    public function execute() {
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Learn_Productsold::productsold');
		$resultPage->getConfig()->getTitle()->prepend(__('Product Sold'));
		return $resultPage;
    }

	protected function _isAllowed() {
		return true;
	}
}