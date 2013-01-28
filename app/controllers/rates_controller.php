<?php
App::import('Controller','_base/Items');
class RatesController extends ItemsController{
	var $name = 'Rates';
	var $uses = array('Rate','Room');

	function admin_index(){
		if(empty($this->params['named']['room_id']))
			$this->redirect(array('controller'=>'rooms','action'=>'index','admin'=>true,'hotel_id'=>$this->params['named']['hotel_id']));
		else
			$room_id = $this->params['named']['room_id'];

		$this->Room->id = $room_id;
		$nombre_room = $this->Room->field('nombre');

		$items = $this->paginate('Rate',$this->m[0]->find_(array('room_id'=>$room_id),'paginate'));
		$this->m[0]->clean($items,true);
		$this->set(compact('items','nombre_room'));
	}

}
?>