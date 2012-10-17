<?php
$installer = $this;
$installer->startSetup();
$installer->run("create table banner(banner_id int not null auto_increment, name varchar(100),status tinyint(1),description varchar(1000),width int,height int, behaviour varchar(20), primary key(banner_id));
create table banner_item(id int not null auto_increment,id_banner int, item_url varchar(150),description varchar(150),destination_url varchar(150),position int, status tinyint(1), primary key(id))");
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 