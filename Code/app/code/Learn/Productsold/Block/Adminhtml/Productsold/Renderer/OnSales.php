<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */

namespace Learn\Productsold\Block\Adminhtml\Productsold\Renderer;

class OnSales extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer 
{
	protected $helper;

	public function __construct( 
		\Learn\Productsold\Helper\Data $helper
	) {
		$this->helper = $helper;
	}

	public function render(\Magento\Framework\DataObject $row){
		$product_id = $row->getData($this->getColumn()->getIndex());
		$online = $this->helper->getSoldQtyByProductId($product_id);
		$online = ($online) ? $online : "0";

		return $online;
	}
}