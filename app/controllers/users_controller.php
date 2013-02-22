<?php
App::import('Controller','_base/My');
class UsersController extends MyController{
	var $name = 'Users';
	var $uses = array('User');

	function admin_dashboard(){
		if(!$this->Session->read('sAdmin.master'))
			$this->redirect(array('controller'=>'hotels','action'=>'index','admin'=>true),null,true);

		$this->pageTitle = 'Panel de Administración';
	}
	function admin_index(){ $this->set('items',$this->paginate($this->uses[0])); }
	function admin_login(){
		$this->pageTitle = 'Entrando al Sistema';
		if(!empty($this->data)) {
			if($usuario = $this->User->find_(array('contain'=>false,'conditions'=>array('username'=>$this->data['User']['username'])),'first')){
				if ($usuario['User']['password'] == sha1($this->data['User']['password'])){
					$this->Session->write('sAdmin', $usuario['User']);
					$this->redirect('/panel',null,true);
				} else { $this->User->invalidate('password','La contraseña no es correcta.'); }
			} else { $this->User->invalidate('username','El Nombre de usuario no existe.'); }
		}
	}
	
	function admin_logout(){
		$this->Session->delete('sAdmin');
		$this->redirect('/');
	}

	function admin_hoteles() {
		if(empty($this->params['named']['user_id']))
			$this->redirect(array('action'=>'index','admin'=>true));
		else
			$id = (int)$this->params['named']['user_id'];

		$with = $this->User->hasAndBelongsToMany['Hotel']['with'];
		$this->set(compact('with'));

		if(empty($this->data)){
			// Bind
			$this->m[0]->{$with}->bindModel(array('hasOne'=>array(
				'Hotel'=>array(
					'className'=>'Hotel',
					'foreignKey'=>false,
					'conditions'=>'Hotel.id = '.$with.'.hotel_id',
					'fields'=>array('id','nombre')
				)
			)));

			$orderdata = $this->m[0]->{$with}->find('all',array(
				'conditions'=>array('user_id'=>$id),
				'fields'=>array('id','Hotel.id','Hotel.nombre')
			));

			$this->set(compact('orderdata'));

		} else {
			$result = true;
			foreach($this->data['Hotel'] as $idx => $hotel){
				if(!empty($hotel['id'])){
					$this->m[0]->{$with}->create(false);
					$join = array('user_id'=>$id,'hotel_id'=>$hotel['id']);

					if(!empty($this->data[$with][$idx]['id']))
						$join['id'] = $this->data[$with][$idx]['id'];
					
					$result = $result && $this->m[0]->{$with}->save($join);
				}
			}

			$this->_flash($result ? 'save_ok':'save_some');
			$this->redirect(array('admin'=>true,'action'=>'index'));
		}
	}

	function admin_agregar() {
		if (!empty($this->data)){
			$error = false;
			if($this->User->find_(array('contain'=>false,'conditions'=>array('username'=>$this->data['User']['username'])),'first')){
				$error = true;
				$this->m[0]->invalidate('username','Este usuario ya existe.');
			}

			if($this->data['User']['password'] != $this->data['User']['passwordc']){
				$error = true;
				$this->m[0]->invalidate('password','Las contraseñas no coinciden.');
				$this->m[0]->invalidate('passwordc','Las contraseñas no coinciden.');
			}
			
			if(!$error && $this->m[0]->save($this->data)){
				$this->_flash('save_ok');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	function admin_editar($id) {
		$id = $this->_checkid($id);
		if($id == 1) $this->redirect(array('controller'=>'users','action'=>'index','admin'=>true));

		if(!empty($this->data)){
			$error = false;
			if($this->m[0]->find_(array('contain'=>false,'conditions'=>array('username'=>$this->data['User']['username'],'User.id <>'=>$id)),'first')){
				$error = true;
				$this->m[0]->invalidate('username','Este usuario ya existe.');
			}

			if(empty($this->data['User']['password'])){
				unset($this->data['User']['password']);
				unset($this->data['User']['passwordc']);
			}else{
				if($this->data['User']['password'] != $this->data['User']['passwordc']){
					$error = true;
					$this->m[0]->invalidate('password','Las contraseñas no coinciden.');
					$this->m[0]->invalidate('passwordc','Las contraseñas no coinciden.');
				}
			}
		
			if(!$error && $this->m[0]->save($this->data)){
				$this->redirect(array('action'=>'index','msg:oksave'));
			}
		} else {
			$this->m[0]->recursive = -1;
			$this->data = $this->m[0]->read(null,$id);
			unset($this->data[$this->uses[0]]['password']);
			$this->m[0]->clean($this->data,true);

		}
	}
}
?>