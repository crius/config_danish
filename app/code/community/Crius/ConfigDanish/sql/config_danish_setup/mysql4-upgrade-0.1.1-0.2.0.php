<?php

$installer = $this;
$installer->startSetup();

// Danish config
$installer->setConfigData('tax/calculation/based_on', 'billing');
$installer->setConfigData('tax/calculation/price_includes_tax', '1');
$installer->setConfigData('tax/calculation/shipping_includes_tax', '0');
$installer->setConfigData('tax/calculation/apply_after_discount', '1');
$installer->setConfigData('tax/calculation/discount_tax', '0');
$installer->setConfigData('tax/calculation/apply_tax_on', '0');
$installer->setConfigData('tax/defaults/country', 'DK');
$installer->setConfigData('tax/defaults/region', '*');
$installer->setConfigData('tax/defaults/postcode', '*');
$installer->setConfigData('tax/display/shipping', '2');
$installer->setConfigData('tax/display/type', '2');
$installer->setConfigData('tax/cart_display/price', '2');
$installer->setConfigData('tax/cart_display/subtotal', '1');
$installer->setConfigData('tax/cart_display/shipping', '1');
$installer->setConfigData('tax/cart_display/grandtotal', '0');
$installer->setConfigData('tax/cart_display/full_summary', '1');
$installer->setConfigData('tax/cart_display/zero_tax', '1');
$installer->setConfigData('tax/sales_display/price', '2');
$installer->setConfigData('tax/sales_display/subtotal', '1');
$installer->setConfigData('tax/sales_display/shipping', '1');
$installer->setConfigData('tax/sales_display/grandtotal', '0');
$installer->setConfigData('tax/sales_display/full_summary', '1');
$installer->setConfigData('tax/sales_display/zero_tax', '1');

$installer->endSetup();