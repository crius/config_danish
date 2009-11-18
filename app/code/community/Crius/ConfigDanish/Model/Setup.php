<?php
class Crius_ConfigDanish_Model_Setup extends Mage_Eav_Model_Entity_Setup
{
	public function updateAttributeLabels($attributeCode, $data) {
		$entityTypeId = $this->getEntityTypeId($attributeCode);
		foreach ($data as $code => $label) {
			$this->updateAttributeLabel($entityTypeId, $code, $label);
		}
	}
	
    public function updateAttributeLabel($entityTypeId, $attributeCode, $label) {
		if ($id = $this->getAttribute($entityTypeId, $attributeCode, 'attribute_id')) {
			$this->updateAttribute($entityTypeId, $id, 'frontend_label', $label);
		}
	}
}