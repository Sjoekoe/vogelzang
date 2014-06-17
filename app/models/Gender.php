<?php 

class Gender extends Eloquent {
	public function horse() {
		return $this->belongsTo('Horse', 'gender_id');
	}
}

 ?>