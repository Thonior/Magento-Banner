<?php
class Conzentra_Bannermanager_Block_Adminhtml_Banner_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("bannermanager_form", array("legend"=>Mage::helper("bannermanager")->__("Item information")));

				$fieldset->addField("name", "text", array(
				"label" => Mage::helper("bannermanager")->__("Bannermanager Name"),
				"class" => "required-entry",
				"required" => true,
				"name" => "name",
				));




				if (Mage::getSingleton("adminhtml/session")->getBannermanagerData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getBannermanagerData());
					Mage::getSingleton("adminhtml/session")->setBannermanagerData(null);
				} 
				elseif(Mage::registry("bannermanager_data")) {
				    $form->setValues(Mage::registry("bannermanager_data")->getData());
				}
				return parent::_prepareForm();
		}
}
