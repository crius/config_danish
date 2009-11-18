<?php

$installer = $this;
$installer->startSetup();

// Danish tax
$query = "DELETE FROM {$this->getTable('tax_calculation_rule')};";
$installer->run($query);

$query = <<< EOF
INSERT INTO {$this->getTable('tax_calculation_rule')} VALUES (3, 'DK 25%', 1, 0);
EOF;
$installer->run($query);

$query = "DELETE FROM {$this->getTable('tax_class')};";
$installer->run($query);

$query = <<< EOF
INSERT INTO {$this->getTable('tax_class')} VALUES (1, 'Momspligtige varer 25%', 'PRODUCT');
INSERT INTO {$this->getTable('tax_class')} VALUES (2, 'Momspligtig', 'CUSTOMER');
INSERT INTO {$this->getTable('tax_class')} VALUES (3, 'Fragt', 'PRODUCT');
EOF;
$installer->run($query);

$query = "DELETE FROM {$this->getTable('tax_calculation_rate')};";
$installer->run($query);

$query = <<< EOF
INSERT INTO {$this->getTable('tax_calculation_rate')} VALUES (3, 'DK', 0, '*', '25 %', 25.0000);
EOF;
$installer->run($query);

$query = "DELETE FROM {$this->getTable('tax_calculation')};";
$installer->run($query);

$query = <<< EOF
INSERT INTO {$this->getTable('tax_calculation')} VALUES(3, 3, 2, 1);
EOF;
$installer->run($query);

$installer->run("UPDATE {$this->getTable('customer_group')} SET tax_class_id = 2");

$query = "DELETE FROM {$this->getTable('core_config_data')} WHERE `scope`='default' AND `scope_id`=0 AND `path`='catalog/category/root_id';";
$installer->run($query);

// Danish config
$installer->setConfigData('general/locale/code', 'da_DK');
$installer->setConfigData('general/locale/timezone', 'Europe/Berlin');
$installer->setConfigData('currency/options/base', 'DKK');
$installer->setConfigData('currency/options/default', 'DKK');
$installer->setConfigData('currency/options/allow', 'DKK');
$installer->setConfigData('general/country/allow', 'DK');
$installer->setConfigData('catalog/category/root_id', '0');
$installer->setConfigData('general/country/default', 'DK');
$installer->setConfigData('general/locale/firstday', '1');
$installer->setConfigData('general/locale/weekend', '0,6');
$installer->setConfigData('tax/classes/shipping_tax_class', '3');
$installer->setConfigData('tax/calculation/based_on', 'origin');
$installer->setConfigData('tax/calculation/price_includes_tax', '1');
$installer->setConfigData('tax/calculation/shipping_includes_tax', '0');
$installer->setConfigData('tax/calculation/apply_after_discount', '1');
$installer->setConfigData('tax/calculation/discount_tax', '0');
$installer->setConfigData('tax/calculation/apply_tax_on', '0');
$installer->setConfigData('tax/defaults/country', 'DK');
$installer->setConfigData('tax/defaults/region', '');
$installer->setConfigData('tax/defaults/postcode', '');
$installer->setConfigData('tax/display/column_in_summary', '2');
$installer->setConfigData('tax/display/full_summary', '1');
$installer->setConfigData('tax/display/shipping', '2');
$installer->setConfigData('tax/display/type', '2');
$installer->setConfigData('tax/display/zero_tax', '1');
$installer->setConfigData('tax/weee/enable', '0');
$installer->setConfigData('tax/weee/display_list', '0');
$installer->setConfigData('tax/weee/display', '0');
$installer->setConfigData('tax/weee/display_sales', '0');
$installer->setConfigData('tax/weee/display_email', '0');
$installer->setConfigData('tax/weee/discount', '0');
$installer->setConfigData('tax/weee/apply_vat', '0');
$installer->setConfigData('tax/weee/include_in_subtotal', '0');
$installer->setConfigData('shipping/origin/country_id', 'DK');
$installer->setConfigData('shipping/origin/region_id', '');
$installer->setConfigData('shipping/origin/postcode', '');
$installer->setConfigData('shipping/origin/city', '');
$installer->setConfigData('payment/free/title', 'Ingen betalingsdata nødvendig');
$installer->setConfigData('payment/checkmo/title', 'Check/kontant-ordre');

$errorMsg = 'Denne leveringsmetode er ikke tilgængelig i øjeblikket. Kontakt os hvis du ønsker at benytte den.';

$installer->setConfigData('carriers/dhl/specificerrmsg', $errorMsg);
$installer->setConfigData('carriers/ups/specificerrmsg', $errorMsg);
$installer->setConfigData('carriers/usps/specificerrmsg', $errorMsg);
$installer->setConfigData('carriers/fedex/specificerrmsg', $errorMsg);
$installer->setConfigData('carriers/flatrate/specificerrmsg', $errorMsg);
$installer->setConfigData('carriers/tablerate/specificerrmsg', $errorMsg);
$installer->setConfigData('carriers/freeshipping/specificerrmsg', $errorMsg);

// Product attribute labels
$installer->updateAttributeLabels('catalog_product', array(
	'color' => 'Farve',
	'cost' => 'Indkøbspris',
	'custom_design' => 'Specialdesign',
	'custom_design_from' => 'Aktiv fra',
	'custom_design_to' => 'Aktiv til',
	'custom_layout_update' => 'Speciallayout',
	'description' => 'Beskrivelse',
	'enable_googlecheckout' => 'Tilgængelig for køb gennem Google Checkout',
	'gallery' => 'Billedgalleri',
	'gift_message_available' => 'Tillad gavebesked',
	'image' => 'Hovedbillede',
	'image_label' => 'Billedtekst',
	'manufacturer' => 'Producent',
	'media_gallery' => 'Mediegalleri',
	'meta_description' => 'Metabeskrivelse',
	'meta_keyword' => 'Metanøgleord',
	'meta_title' => 'Metatitel',
	'minimal_price' => 'Mindstepris',
	'name' => 'Navn',
	'news_from_date' => 'Vis som nyt fra',
	'news_to_date' => 'Vis som nyt til',
	'options_container' => 'Vis produktmuligheder i',
	'page_layout' => 'Sidelayout',
	'price' => 'Pris',
	'short_description' => 'Kort beskrivelse',
	'sku' => 'Varenummer',
	'small_image' => 'Lille billede',
	'small_image_label' => 'Lille billedetekst',
	'special_from_date' => 'Specialpris fra',
	'special_price' => 'Specialpris',
	'special_to_date' => 'Specialpris til',
	'tax_class_id' => 'Momsklasse',
	'thumbnail_label' => 'Thumbnailtekst',
	'tier_price' => 'Mængderabat',
	'url_key' => 'URL-nøgle',
	'visibility' => 'Synlighed',
	'weight' => 'Vægt'));
	
// Category attribute labels
$installer->updateAttributeLabels('catalog_category', array(
	'available_sort_by' => 'Tilgængelig produktsortering',
	'custom_design' => 'Specialdesign',
	'custom_design_apply' => 'Gælder for',
	'custom_design_from' => 'Specialdesign fra',
	'custom_design_to' => 'Specialdesign til',
	'custom_layout_update' => 'Speciallayout',
	'default_sort_by' => 'Standardsortering',
	'description' => 'Beskrivelse',
	'display_mode' => 'Visning',
	'image' => 'Billede',
	'is_active' => 'Aktiv',
	'is_anchor' => 'Vis filtreret navigation (anchor)',
	'landing_page' => 'CMS blok',
	'level' => 'Niveau',
	'meta_description' => 'Metabeskrivelse',
	'meta_keywords' => 'Metanøgleord',
	'meta_title' => 'Titel',
	'name' => 'Navn',
	'page_layout' => 'Sidelayout',
	'path' => 'sti',
	'url_key' => 'URL-nøgle'));
	
// Address format
$collection = Mage::getResourceModel('directory/country_format_collection')
	->setCountryFilter('DK')
	->load();
	
if ($collection->count() == 0) {
	$this->_conn->insert($this->getTable('directory/country_format'), array(
		'country_id' => 'DK',
		'type' => 'html',
		'format' => '{{depend prefix}}{{var prefix}} {{/depend}}{{var firstname}} {{depend middlename}}{{var middlename}} {{/depend}}{{var lastname}}{{depend suffix}} {{var suffix}}{{/depend}}<br/>{{depend company}}{{var company}}<br />{{/depend}}{{var street1}}<br />{{depend street2}}{{var street2}}<br />{{/depend}}{{depend street3}}{{var street3}}<br />{{/depend}}{{depend street4}}{{var street4}}<br />{{/depend}}{{var postcode}} {{depend city}}{{var city}}{{/depend}}{{depend region}}, {{var region}}{{/depend}}<br/>{{var country}}<br/>{{depend telephone}}Tlf.: {{var telephone}}{{/depend}}{{depend fax}}<br/>Fax: {{var fax}}{{/depend}}'
	));
	$this->_conn->insert($this->getTable('directory/country_format'), array(
		'country_id' => 'DK',
		'type' => 'text',
		'format' => '{{depend prefix}}{{var prefix}} {{/depend}}{{var firstname}} {{depend middlename}}{{var middlename}} {{/depend}}{{var lastname}}{{depend suffix}} {{var suffix}}{{/depend}}{{depend company}}{{var company}}{{/depend}}{{var street1}}{{depend street2}}{{var street2}}{{/depend}}{{depend street3}}{{var street3}}{{/depend}}{{depend street4}}{{var street4}}{{/depend}}{{depend city}}{{var city}},  {{/depend}}{{depend region}}{{var region}}, {{/depend}}{{var postcode}}{{var country}}T: {{var telephone}}{{depend fax}}F: {{var fax}}{{/depend}}'
	));
	$this->_conn->insert($this->getTable('directory/country_format'), array(
		'country_id' => 'DK',
		'type' => 'pdf',
		'format' => '{{depend prefix}}{{var prefix}} {{/depend}}{{var firstname}} {{depend middlename}}{{var middlename}} {{/depend}}{{var lastname}}{{depend suffix}} {{var suffix}}{{/depend}}|{{depend company}}{{var company}}|{{/depend}}{{var street1}}|{{depend street2}}{{var street2}}|{{/depend}}{{depend street3}}{{var street3}}|{{/depend}}{{depend street4}}{{var street4}}|{{/depend}}{{var postcode}} {{depend city}}{{var city}}{{/depend}}{{depend region}}, {{var region}}, {{/depend}}|{{var country}}|{{depend telephone}}Tlf.: {{var telephone}}{{/depend}}|{{depend fax}}<br/>Fax: {{var fax}}{{/depend}}|'
	));
	$this->_conn->insert($this->getTable('directory/country_format'), array(
		'country_id' => 'DK',
		'type' => 'oneline',
		'format' => '{{depend prefix}}{{var prefix}} {{/depend}}{{var firstname}} {{depend middlename}}{{var middlename}} {{/depend}}{{var lastname}}{{depend suffix}} {{var suffix}}{{/depend}}, {{var street}}, {{var postcode}} {{var city}}, {{depend region}}{{var region}}, {{/depend}}{{var country}}'
	));
	$this->_conn->insert($this->getTable('directory/country_format'), array(
		'country_id' => 'DK',
		'type' => 'js_template',
		'format' => '#{prefix} #{firstname} #{middlename} #{lastname} #{suffix}<br/>#{company}<br/>#{street0}<br/>#{street1}<br/>#{street2}<br/>#{street3}<br/>#{postcode} #{city}, #{region}<br/>#{country_id}<br/>Tlf.: #{telephone}<br/>Fax: #{fax}'
	));
}

$installer->endSetup();