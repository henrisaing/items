<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

  protected $fillable = [
  'name',
  'info',
  ];

  public function items(){
    return $this->hasMany(Item::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
