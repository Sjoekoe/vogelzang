<?php

class Item extends \Eloquent {
	protected $fillable = ['title', 'message', 'user_id'];

	public function user() {
		return $this->belongsTo('User');
	}

	public function itemphoto() {
		return $this->hasOne('Itemphoto', 'item_id', 'id');
	}

}