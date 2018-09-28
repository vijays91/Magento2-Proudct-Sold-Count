<?php 
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */
 
namespace Learn\Productsold\Block;
 
use Magento\Framework\Registry;
use \Learn\Productsold\Helper\Data;

class Productsold extends \Magento\Framework\View\Element\Template
{
    public $assetRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Magento\Framework\View\Asset\Repository $assetRepository,
        \Magento\Framework\Registry $registry,
        Data $helperData
    )
    {
        // Get the asset repository to get URL of our assets
        $this->assetRepository = $assetRepository;
        $this->_helperData = $helperData;
        $this->_registry = $registry;

        return parent::__construct($context, $data);
    }

    public function getCurrentProduct() {        
        return $this->_registry->registry('current_product');
    }

    public function helperInit() {        
        return $this->_helperData;
    }
}