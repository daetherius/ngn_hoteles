<?php
App::import('Controller','_base/Items');
class ReservationsController extends ItemsController{
	var $name = 'Reservations';
	var $uses = array('Reservation');
}
?>