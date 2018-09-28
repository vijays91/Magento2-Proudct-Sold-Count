<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */

namespace Learn\Productsold\Block\Adminhtml\Productsold\Renderer;

class TotalSales extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer 
{
	protected $helper;

	public function __construct( 
		\Learn\Productsold\Helper\Data $helper
	) {
		$this->helper = $helper;
	}
	public function render(\Magento\Framework\DataObject $row){
		$product_id = $row->getData($this->getColumn()->getIndex());
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$product = $objectManager->create('Magento\Catalog\Model\Product')->load($product_id);
		$offline = $product->getOfflineSale();
		$offline = ($offline) ? $offline : 0;

		$online = $this->helper->getSoldQtyByProductId($product_id);
		$online = ($online) ? $online : 0;

		$total = $offline + $online;

		$total = ($total) ? $total : "0";
		return $total;
	}
}