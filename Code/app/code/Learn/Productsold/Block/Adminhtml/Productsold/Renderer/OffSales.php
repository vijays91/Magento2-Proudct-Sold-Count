<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */

namespace Learn\Productsold\Block\Adminhtml\Productsold\Renderer;

class OffSales extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer 
{
	public function render(\Magento\Framework\DataObject $row){
		$product_id = $row->getData($this->getColumn()->getIndex());
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$product = $objectManager->create('Magento\Catalog\Model\Product')->load($product_id);
		return $product->getOfflineSale();
	}
}