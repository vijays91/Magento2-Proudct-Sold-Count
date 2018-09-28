<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */

namespace Learn\Productsold\Block\Adminhtml;

class Productsold extends\Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_productsold';
		$this->_blockGroup = 'Learn_Productsold';
		$this->_headerText = __('Productsold');
		parent::_construct();
        $this->buttonList->remove('add');
        $this->buttonList->remove('delete');
        $this->buttonList->remove('back');
        $this->buttonList->remove('save');
        $this->buttonList->remove('reset');
	}
}