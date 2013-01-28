<?php
class Hotelimg extends AppModel {
	var $name = 'Hotelimg';
	var $actsAs = array('File'=>array('portada'=>'hotel_id'));
	var $belongsTo = array(
		'Hotel' => array(
			'className'=>'Hotel',
			'counterCache' => true
		)
	);
}
?>