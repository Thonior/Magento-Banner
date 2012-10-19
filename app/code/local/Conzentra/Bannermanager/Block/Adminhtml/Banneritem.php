<?php


class Conzentra_Bannermanager_Block_Adminhtml_Banneritem extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_banneritem";
	$this->_blockGroup = "bannermanager";
	$this->_headerText = Mage::helper("bannermanager")->__("Banneritem Manager");
	$this->_addButtonLabel = Mage::helper("bannermanager")->__("Add New Item");
	parent::__construct();

	}

}