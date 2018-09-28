<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */

namespace Learn\Productsold\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'sale_label',
            [
                'group'     => 'Product Sold',
                'type'      => 'varchar',
                'backend'   => '',
                'frontend'  => '',
                'label'     => 'Sale Label',
                'input'     => 'text',
                'class'     => '',
                'source'    => '',
                'global'    => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'   => true,
                'required'  => false,
                'user_defined' => false,
                'default'   => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'offline_sale',
            [
                'group'     => 'Product Sold',
                'type'      => 'int',
                'backend'   => '',
                'frontend'  => '',
                'label'     => 'Offline Sale',
                'input'     => 'text',
                'class'     => '',
                'source'    => '',
                'global'    => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'   => true,
                'required'  => false,
                'user_defined'  => false,
                'default'       => '0',
                'searchable'    => false,
                'filterable'    => false,
                'comparable'    => false,
                'visible_on_front'      => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
    }
}