<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
	var $labels = array(
		'username'=>'nombre de usuario',
		'password'=>'contraseña',
		'master'=>'Administrador'
	);
	var $actsAs = array('ExtendAssociations');
	var $hasAndBelongsToMany = array('Hotel');

	var $validate = array(
		'username'=>array('rule'=>array('between', 1,255), 'allowEmpty'=>false, 'message'=>'Ingrese un valor.'),
		'password'=>array('rule'=>array('between', 1,255), 'allowEmpty'=>false, 'message'=>'Ingrese un valor.'),
	);

	function beforeSave(){
		$this->_encriptpass($this->data);
		return parent::beforeSave();
	}
}
?>