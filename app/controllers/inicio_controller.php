<?php
App::import('Sanitize');
App::import('Controller','_base/My');
class InicioController extends MyController {
	var $name = 'Inicio';
	var $uses = array('Hotel','Room','Rate','Destination');

	function index(){
		$items = array();
		if(!empty($this->data['Hotel'])){
			$data = $this->data['Hotel']; fb($data,'$data');
			$conds = array(
				'OR'=>array('Room.tipo_disponibilidad <>'=>'Allotment','Room.disponibilidad >'=>0),
				'Blackout.id'=>null
			);

			if(!empty($data['inicio'])){
				$data['inicio'] = $data['inicio']['year'].'-'.$data['inicio']['month'].'-'.$data['inicio']['day'];
				$conds['Rate.inicio <='] = $data['inicio'];
				$conds['Rate.fin >='] = $data['inicio'];
			}

			/// Destination
			if(!empty($data['destination_id']))
				$conds['Hotel.destination_id'] = $data['destination_id'];

			/// Nombre
			if(!empty($data['nombre']))
				$conds['Hotel.nombre LIKE'] = '%'.$data['nombre'].'%';

			/// Categoría
			if(!empty($data['categoria']))
				$conds['Hotel.categoria'] = $data['categoria'];

			/// Alimentos
			if(!empty($data['alimentos']))
				$conds['Rate.plan_alimentos'] = $data['alimentos'];
			fb($conds,'$conds');

			$this->Rate->recursive = -1;
			$this->paginate['Rate'] = array(
				'fields' => array(
					'Rate.id',
					'Hotel.nombre',
					'Destination.nombre',
					'Rate.plan_alimentos',
					'Room.nombre',
					'Rate.sencilla',
					'Hotel.permite_menores',
					'Hotel.edad_max_menor',
					'Hotel.categoria',
					'Hotel.src',
					'Hotel.nombre'
				),
				'joins'=>array(
					array(
						'table'=>'rooms',
						'alias'=>'Room',
						'type'=>'LEFT',
						'conditions'=>'Room.id = Rate.room_id',
					),
					array(
						'table'=>'hotels',
						'alias'=>'Hotel',
						'type'=>'LEFT',
						'conditions'=>'Hotel.id = Room.hotel_id',
					),
					array(
						'table'=>'blackouts',
						'alias'=>'Blackout',
						'type'=>'LEFT',
						'conditions'=>array('Hotel.id = Blackout.hotel_id','Blackout.inicio <='=>$data['inicio'],'Blackout.fin >='=>$data['inicio']),
					),
					array(
						'table'=>'destinations',
						'alias'=>'Destination',
						'type'=>'LEFT',
						'conditions'=>'Destination.id = Hotel.destination_id',
					)
				)
			);

			$items = $this->paginate('Rate',$conds); fb($items,'$items');
			$this->set(compact('items'));
		}

		$destinations = $this->Destination->find_(array('contain'=>false,'cache'=>true),'list');
		$this->Destination->clean($destinations,true);
		$this->set(compact('destinations'));
		$this->pageTitle = Configure::read('Site.slogan');
	}
	
	function email(){ $this->layout = 'empty'; }
}
?>