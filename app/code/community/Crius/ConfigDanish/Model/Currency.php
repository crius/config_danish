<?php
class Crius_ConfigDanish_Model_Currency extends Mage_Directory_Model_Currency
{
	// Overridden to use shortname (DKK) instead of symbol (kr)
	public function formatTxt($price, $options=array())
    {
		if (Mage::getStoreConfig('currency/options/use_shortname') && !array_key_exists('display', $options)) {
			$options['display'] = Zend_Currency::USE_SHORTNAME;
		}
		return parent::formatTxt($price, $options);
    }
}