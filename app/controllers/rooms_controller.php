<?php
App::import('Controller','_base/Items');
class RoomsController extends ItemsController{
	var $name = 'Rooms';
	var $uses = array('Room','Hotel');

	function admin_index(){
		if(empty($this->params['named']['hotel_id']))
			$this->redirect(array('controller'=>'hotels','action'=>'index','admin'=>true));
		else
			$hotel_id = $this->params['named']['hotel_id'];

		$this->Hotel->id = $hotel_id;
		$nombre_hotel = $this->Hotel->field('nombre');

		$items = $this->paginate('Room',$this->m[0]->find_(array('hotel_id'=>$hotel_id),'paginate'));
		$this->m[0]->clean($items,true);
		$this->set(compact('items','nombre_hotel'));
	}
}
?>