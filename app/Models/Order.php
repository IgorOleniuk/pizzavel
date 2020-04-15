<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function users()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function status()
    {
      return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
