<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model{
	
	protected $fillable = ['title','description'];
	
	public function save(array $options = array()){
		$this->userid = auth()->id();
		parent::save($options);
	}
	
    //use HasFactory;
}
