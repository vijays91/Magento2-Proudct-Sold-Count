<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Learn_Productsold
 */
namespace Learn\Productsold\Model\Source;

class Display implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray() {
        return array(
            array(
                'value' => '1',
                'label' => __('On Site Orders')
            ),
            array(
                'value' => '2',
                'label' => __('Off Site Orders')
            ),
            array(
                'value' => '3',
                'label' => __('On Site + Off Site (Orders)')
            )
        );
    }

    public function toArray() {
        return [
            '1' => __('On Site Orders'),
            '2' => __('Off Site Orders'),
            '3' => __('On Site + Off Site (Orders)')
        ];
    }
}