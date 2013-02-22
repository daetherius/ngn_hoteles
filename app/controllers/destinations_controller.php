<?php
App::import('Controller','_base/Items');
class DestinationsController extends ItemsController{
	var $name = 'Destinations';
	var $uses = array('Destination');

	function admin_agregar(){
		parent::admin_agregar();
	
		$regions = $this->m[0]->Region->find_(array(),'list');
		$this->m[0]->clean($regions,true);
		$this->set(compact('regions'));
	}
	
	function admin_editar($id){
		parent::admin_editar($id);
	
		$regions = $this->m[0]->Region->find_(array(),'list');
		$this->m[0]->clean($regions,true);
		$this->set(compact('regions'));
	}
}
?>