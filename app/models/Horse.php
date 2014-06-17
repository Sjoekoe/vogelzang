<?php

class Horse extends \Eloquent {
	protected $fillable = ['name', 'breed', 'age', 'gender_id', 'price_id', 'description'];

	public function gender() {
		return $this->hasOne('Gender', 'id', 'gender_id');
	}

	public function price() {
		return $this->hasOne('Price', 'id', 'price_id');
	}

	public function horsepicture() {
		return $this->hasMany('Horsepicture', 'horse_id', 'id');
	}
}