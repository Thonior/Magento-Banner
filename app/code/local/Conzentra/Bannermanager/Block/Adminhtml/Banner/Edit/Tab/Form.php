<?php
class Conzentra_Bannermanager_Block_Adminhtml_Banner_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("bannermanager_form", array("legend"=>Mage::helper("bannermanager")->__("Item information")));

				$fieldset->addField("name", "text", array(
				"label" => Mage::helper("bannermanager")->__("Name"),
				"class" => "required-entry",
				"required" => true,
				"name" => "name",
				));
                                $fieldset->addField("status", "select", array(
				"label" => Mage::helper("bannermanager")->__("Enabled"),
				"class" => "",
				"required" => false,
                                "values" => array("No","Yes"),
				"name" => "status",
				));
                                $fieldset->addField("description", "text", array(
				"label" => Mage::helper("bannermanager")->__("Description"),
				"class" => "required-entry",
				"required" => true,
				"name" => "description",
				));
                                $fieldset->addField("position", "select", array(
				"label" => Mage::helper("bannermanager")->__("Position"),
				"class" => "",
				"required" => true,
                                "values" => array("Top" => "Top","Left" => "Left","Right" => "Right","Bottom" => "Bottom"),
				"name" => "position",
				));
                                $fieldset->addField("width", "text", array(
				"label" => Mage::helper("bannermanager")->__("Width"),
				"class" => "",
				"required" => false,
				"name" => "width",
				));
                                $fieldset->addField("height", "text", array(
				"label" => Mage::helper("bannermanager")->__("Height"),
				"class" => "",
				"required" => false,
				"name" => "height",
				));
                                $fieldset->addField("behaviour", "select", array(
				"label" => Mage::helper("bannermanager")->__("Behaviour"),
				"class" => "required-entry",
				"required" => true,
                                "values" => array("Static" => "Static","Ordered" => "Ordered","Random" => "Random"),
				"name" => "behaviour",
				));
                                $fieldset->addField("arrows", "select", array(
				"label" => Mage::helper("bannermanager")->__("Enable switch"),
				"class" => "",
				"required" => false,
                                "values" => array("No","Yes"),
				"name" => "arrows",
                                ));
                                if (!Mage::app()->isSingleStoreMode()) {
                                    $fieldset->addField('store_id', 'multiselect', array(
                                            'name'      => 'stores[]',
                                            'label'     => Mage::helper('bannermanager')->__('Store View'),
                                            'title'     => Mage::helper('bannermanager')->__('Store View'),
                                            'required'  => true,
                                            'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
                                    ));
                                }
                                else {
                                    $fieldset->addField('store_id', 'hidden', array(
                                            'name'      => 'stores[]',
                                            'value'     => Mage::app()->getStore(true)->getId()
                                    ));
                                    //$model->setStoreId(Mage::app()->getStore(true)->getId());
                                }




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
