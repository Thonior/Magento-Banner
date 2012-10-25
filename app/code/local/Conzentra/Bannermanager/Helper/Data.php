<?php
class Conzentra_Bannermanager_Helper_Data extends Mage_Core_Helper_Abstract
{
    
    public function isBannerInStore($itemId) {
        $currentStoreId = Mage::app()->getStore()->getId();
        $item = Mage::getModel('bannermanager/banner')->load($itemId);
        $itemStores = $item->getStoreId();
        $stores = explode(',', $itemStores);
        if(in_array($currentStoreId, $stores) || in_array(0, $stores)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function isItemInStore($itemId) {
        $currentStoreId = Mage::app()->getStore()->getId();
        $item = Mage::getModel('bannermanager/banneritem')->load($itemId);
        $itemStores = $item->getStoreId();
        $stores = explode(',', $itemStores);
        if(in_array($currentStoreId, $stores) || in_array(0, $stores)) {
            return true;
        }
        else {
            return false;
        }
    }
    
}
	 