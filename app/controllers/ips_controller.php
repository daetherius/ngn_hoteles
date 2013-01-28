<?php
App::import('Controller','_base/Items');
class IpsController extends ItemsController{
	var $name = 'Ips';
	var $uses = array('Ip');
}
?>