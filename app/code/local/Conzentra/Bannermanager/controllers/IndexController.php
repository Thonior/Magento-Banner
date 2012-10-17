<?php
class Conzentra_Bannermanager_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("BannerManager"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("bannermanager", array(
                "label" => $this->__("BannerManager"),
                "title" => $this->__("BannerManager")
		   ));

      $this->renderLayout(); 
	  
    }
}