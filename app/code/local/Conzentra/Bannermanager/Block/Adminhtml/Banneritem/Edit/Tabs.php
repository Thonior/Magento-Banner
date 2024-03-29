<?php
class Conzentra_Bannermanager_Block_Adminhtml_Banneritem_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("banneritem_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("bannermanager")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("bannermanager")->__("Item Information"),
				"title" => Mage::helper("bannermanager")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("bannermanager/adminhtml_banneritem_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
