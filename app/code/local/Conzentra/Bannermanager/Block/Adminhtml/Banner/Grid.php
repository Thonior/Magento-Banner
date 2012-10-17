<?php

class Conzentra_Bannermanager_Block_Adminhtml_Banner_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("bannerGrid");
				$this->setDefaultSort("banner_id");
				$this->setDefaultDir("ASC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("bannermanager/banner")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("banner_id", array(
				"header" => Mage::helper("bannermanager")->__("ID"),
				"align" =>"right",
				"width" => "50px",
				"index" => "banner_id",
				));
				$this->addColumn("name", array(
				"header" => Mage::helper("bannermanager")->__("Banner Name"),
				"align" =>"left",
				"index" => "name",
				));


				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}

}