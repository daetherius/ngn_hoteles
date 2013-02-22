function index(){
		$items = array();
		if(!empty($this->data['Hotel'])){
			$data = $this->data['Hotel']; fb($data,'$data');
			$hotel_conds = array();
			$where = array();

			/// Destination
			if(!empty($data['destination_id'])){
				$hotel_conds['Hotel.destination_id'] = $data['destination_id'];
			}

			/// Nombre
			if(!empty($data['nombre'])){
				$hotel_conds['Hotel.nombre LIKE'] = '%'.$data['nombre'].'%';
			}

			/// Categoría
			if(!empty($data['categoria'])){
				$hotel_conds['Hotel.categoria'] = $data['categoria'];
			}

			fb($hotel_conds,'$hotel_conds');

			foreach ($hotel_conds as $cond => $value) {
				$comparison = '';
				if($cond != 'Hotel.nombre LIKE')
					$comparison = '=';
				
				$where[] = $cond.' '.$comparison.' \''.Sanitize::escape($value).'\'';
			}
			
			/// Categoría
			if(!empty($data['inicio'])){
				$alimentos = '';
				if(!empty($data['alimentos'])){
					$alimentos = ' AND RT.plan_alimentos = \''.Sanitize::escape($data['alimentos']).'\'';
				}

				$data['inicio'] = '\''.$data['inicio']['year'].'-'.$data['inicio']['month'].'-'.$data['inicio']['day'].'\'';
				$where[] = 'EXISTS (
					SELECT *
					FROM rooms RM
					WHERE
						(RM.tipo_disponibilidad <> \'Allotment\' OR	RM.disponibilidad > 0) AND
						RM.hotel_id = Hotel.id AND
						EXISTS (
							SELECT *
							FROM rates RT
							WHERE
								'.$data['inicio'].' BETWEEN RT.inicio AND RT.fin AND
								RT.room_id = RM.id '.$alimentos.'
						)
				) AND NOT EXISTS (
					SELECT *
					FROM blackouts B
					WHERE
						'.$data['inicio'].' BETWEEN B.inicio AND B.fin AND
						Hotel.id = B.hotel_id
				)';
			}

			$where = implode(' AND ',$where);
			$items = $this->Hotel->query('SELECT * FROM hotels Hotel WHERE '.$where);
			$this->set(compact('items'));
		}

		$destinations = $this->Destination->find_(array('contain'=>false,'cache'=>true),'list');
		$this->Destination->clean($destinations,true);
		$this->set(compact('destinations'));
		$this->pageTitle = Configure::read('Site.slogan');
	}