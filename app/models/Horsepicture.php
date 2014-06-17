<?php 

class Horsepicture extends Eloquent {
	protected $fillable = ['horse_id', 'path'];

	public function horse() {
		return $this->belongsTo('Horse', 'id', 'horse_id');
	}
}

 ?>