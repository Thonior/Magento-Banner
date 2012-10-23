<?php   
class Conzentra_Bannermanager_Block_Index extends Mage_Core_Block_Template{   

    public function getBanner($position){
        $collection = Mage::getModel('bannermanager/banner')->getCollection();
        $collection->addFieldToFilter('position',$position);
        $collection->addFieldToFilter('status',1);
        $banners = $collection;
        //$banners = Mage::getModel('bannermanager/banner')->load($position,'position');
        if($banners)
            return $banners;
        else
            return false;
    }

    public function getItems($bannerId){
        $collection = Mage::getModel('bannermanager/banneritem')->getCollection();
        $collection->addFieldToFilter('id_banner',$bannerId);
        $collection->addFieldToFilter('status',1);
        $items = $collection;
        if($items)
            return $items;
        else
            return false;
    }


}