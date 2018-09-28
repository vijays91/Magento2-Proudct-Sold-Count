<?php 
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */
namespace Learn\Productsold\Helper; 

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{ 	
 	protected $_scopeConfig;
	protected $_reportCollectionFactory;    

    const XML_PATH_PRUD_SOLD_ENABLE		= 'productsold_tab/productsold_setting/productsold_active';
    const XML_PATH_PRUD_SOLD_DISPLAY	= 'productsold_tab/productsold_setting/productsold_display';
    const XML_PATH_PRUD_SOLD_MIN_COUNT  = 'productsold_tab/productsold_setting/productsold_min_count';
    const XML_PATH_PRUD_SOLD_TEXT   	= 'productsold_tab/productsold_setting/productsold_text';

 	public function __construct (
			\Magento\Framework\App\Helper\Context $context,
			\Magento\Reports\Model\ResourceModel\Product\Sold\CollectionFactory  $reportCollectionFactory,
			\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig 
		) {
 		$this->_reportCollectionFactory = $reportCollectionFactory;
		parent::__construct($context);
		$this->_scopeConfig = $scopeConfig;
    }
    
    public function productsold_enable() {
        return $this->_scopeConfig->getValue(self::XML_PATH_PRUD_SOLD_ENABLE);
    }
    
    public function productsold_display() {
        return $this->_scopeConfig->getValue(self::XML_PATH_PRUD_SOLD_DISPLAY);
    }

    public function productsold_min_count() {
        return $this->_scopeConfig->getValue(self::XML_PATH_PRUD_SOLD_MIN_COUNT);
    }
    
    public function productsold_text() {
        return $this->_scopeConfig->getValue(self::XML_PATH_PRUD_SOLD_TEXT);
    }

	public function getSoldQtyByProductId($product_id = null){
        $SoldProducts = $this->_reportCollectionFactory->create();
        $SoldProdudctCOl = $SoldProducts->addOrderedQty()->addAttributeToFilter('product_id', $product_id);
        if(!$SoldProdudctCOl->count()):
			return false;
        endif;
        // echo $SoldProdudctCOl->getSelect()->__toString();
        // $product = $SoldProdudctCOl->getFirstItem();
        // $product->getData('ordered_qty');
        
        $sold_count = $SoldProdudctCOl->getData();
        $total = 0;
        foreach ($sold_count as $key => $value) {
            $total = $total + $value['ordered_qty'];
        }
        return (int) $total;
    }
}