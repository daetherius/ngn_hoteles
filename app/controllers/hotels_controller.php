<?php
App::import('Controller','_base/Items');
class HotelsController extends ItemsController{
	var $name = 'Hotels';
	var $uses = array('Hotel','Room');
	function admin_agregar(){
		parent::admin_agregar();
	
		$destinations = $this->m[0]->Destination->find_(array(),'list');
		$this->m[0]->clean($destinations,true);
		$this->set(compact('destinations'));
	}
	
	function admin_editar($id){
		parent::admin_editar($id);
	
		$destinations = $this->m[0]->Destination->find_(array(),'list');
		$this->m[0]->clean($destinations,true);
		$this->set(compact('destinations'));
	}
}
?>