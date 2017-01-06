<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
  protected $fillable = [
  'name',
  'info',
  'status',
  'type',
  ];

  public function group(){
    return $this->belongsTo(Group::class);
  }
}
