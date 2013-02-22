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

	function admin_index(){
		$sAdmin = $this->Session->read('sAdmin');
		$conds = array();

		if(!$sAdmin['master']){
			$hotel_ids = $this->Hotel->HotelsUser->find_(array('conditions'=>array('user_id'=>$sAdmin['id']),'fields'=>array('id','hotel_id')),'list+');
			$conds = array('Hotel.id'=>$hotel_ids);
		}
		parent::admin_index($conds);
	}
}
?>