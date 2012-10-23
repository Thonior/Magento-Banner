<?php
class Conzentra_Bannermanager_Block_Adminhtml_Banneritem_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{
				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("bannermanager_form", array("legend"=>Mage::helper("bannermanager")->__("Item information")));
                                $banners = Mage::getModel('bannermanager/banner')->getCollection()->loadData();
                                $banners_array=array();
                                foreach($banners as $banner){
                                    $banners_array[$banner->getId()]=$banner->getName();
                                }
				$fieldset->addField("id_banner", "select", array(
				"label" => Mage::helper("bannermanager")->__("Banner"),
				"class" => "required-entry",
				"required" => true,
                                "values" => $banners_array,
				"name" => "id_banner",
				));
                                $fieldset->addField("item_url", "file", array(
				"label" => Mage::helper("bannermanager")->__("Item"),
				"class" => "",
				"required" => false,
				"name" => "item_url",
				));
                                $fieldset->addField("description", "text", array(
				"label" => Mage::helper("bannermanager")->__("Description"),
				"class" => "required-entry",
				"required" => true,
				"name" => "description",
				));
                                $fieldset->addField("destination_url", "text", array(
				"label" => Mage::helper("bannermanager")->__("Destination URL"),
				"class" => "required-entry",
				"required" => true,
				"name" => "destination_url",
				));
                                $fieldset->addField("position", "text", array(
				"label" => Mage::helper("bannermanager")->__("Order"),
				"class" => "",
				"required" => false,
				"name" => "position",
				));
                                $fieldset->addField("status", "select", array(
				"label" => Mage::helper("bannermanager")->__("Enabled"),
				"class" => "",
				"required" => false,
                                "values" => array("No","Yes"),
				"name" => "status",
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
