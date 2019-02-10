<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
	protected $guarded = [];
    public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function applies()
	{
		return $this->hasMany('App\Apply');
	}
}
