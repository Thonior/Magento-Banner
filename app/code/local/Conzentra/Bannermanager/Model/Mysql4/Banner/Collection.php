<?php
    class Conzentra_Bannermanager_Model_Mysql4_Banner_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
    {

		public function _construct(){
			$this->_init("bannermanager/banner");
		}
    }
	 