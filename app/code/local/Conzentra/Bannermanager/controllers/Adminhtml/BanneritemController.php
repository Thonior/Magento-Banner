<?php

class Conzentra_Bannermanager_Adminhtml_BanneritemController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("bannermanager/banneritem")->_addBreadcrumb(Mage::helper("adminhtml")->__("Banneritem  Manager"),Mage::helper("adminhtml")->__("Banneritem Manager"));
				return $this;
		}
		public function indexAction() 
		{   
				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{
				$brandsId = $this->getRequest()->getParam("id");
				$brandsModel = Mage::getModel("bannermanager/banneritem")->load($brandsId);
				if ($brandsModel->getId() || $brandsId == 0) {
					Mage::register("bannermanager_data", $brandsModel);
					$this->loadLayout();
					$this->_setActiveMenu("bannermanager/banneritem");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banneritem Manager"), Mage::helper("adminhtml")->__("Banneritem Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banneritem Description"), Mage::helper("adminhtml")->__("Banneritem Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("bannermanager/adminhtml_banneritem_edit"))->_addLeft($this->getLayout()->createBlock("bannermanager/adminhtml_banneritem_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("bannermanager")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("bannermanager/banneritem")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("bannermanager_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("bannermanager/banneritem");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banneritem Manager"), Mage::helper("adminhtml")->__("Banneritem Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Banneritem Description"), Mage::helper("adminhtml")->__("Banneritem Description"));


		$this->_addContent($this->getLayout()->createBlock("bannermanager/adminhtml_banneritem_edit"))->_addLeft($this->getLayout()->createBlock("bannermanager/adminhtml_banneritem_edit_tabs"));

		$this->renderLayout();

		       // $this->_forward("edit");
		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data && $_FILES) {
                                        if(isset($post_data['stores'])) {
                                        $stores = $post_data['stores'];
                                        $storesCount = count($stores);
                                        $storesIndex = 1;
                                        $storesData = '';
                                        foreach($stores as $store) {
                                            $storesData .= $store;
                                            if($storesIndex < $storesCount) {
                                                $storesData .= ',';
                                            }
                                            $storesIndex++;
                                        }
                                        //echo $storesData;die;
                                        $post_data['store_id'] = $storesData;
                                        }
                                        //echo "<pre>";print_r($post_data);die;
					try {   
                                                if($_FILES['item_url']){
                                                    $item=$_FILES['item_url'];
                                                    $target_path = "media/banners/";

                                                    $target_path = $target_path . basename( $post_data['id_banner'].$item['name']); 
                                                    move_uploaded_file($item['tmp_name'], $target_path);

                                                    $post_data['item_url']=$post_data['id_banner'].$item['name'];
                                                }
						$brandsModel = Mage::getModel("bannermanager/banneritem")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Banneritem was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setBanneritemData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $brandsModel->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setBanneritemData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$brandsModel = Mage::getModel("bannermanager/banneritem");
						$brandsModel->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}
}
