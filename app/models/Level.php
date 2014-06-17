<?php 

class Level extends Eloquent {
	public function user() {
		return $this->belongsTo('User', 'level_id');
	}
}

 ?>