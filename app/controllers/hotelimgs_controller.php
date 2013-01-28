<?php
App::import('Controller','_base/Imgs');
class HotelimgsController extends ImgsController{
	var $name = 'Hotelimgs';
	var $uses = array('Hotelimg','Hotel');
}
?>