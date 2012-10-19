<?php

class Conzentra_Bannermanager_Block_Adminhtml_Banneritem_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
        
		public function __construct()
		{
				parent::__construct();
				$this->setId("banneritemGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("ASC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("bannermanager/banneritem")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("bannermanager")->__("ID"),
				"align" =>"right",
				"width" => "50px",
				"index" => "id",
				));
				$this->addColumn("id_banner", array(
				"header" => Mage::helper("bannermanager")->__("Banner ID"),
				"align" =>"left",
				"index" => "id_banner",
				));
                                $this->addColumn("description", array(
				"header" => Mage::helper("bannermanager")->__("Description"),
				"align" =>"left",
				"index" => "description",
				));
                                $this->addColumn("destination_url", array(
				"header" => Mage::helper("bannermanager")->__("Destination URL"),
				"align" =>"left",
				"index" => "destination_url",
				));


				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}

}