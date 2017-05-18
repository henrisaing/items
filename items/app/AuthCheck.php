<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Item;
use App\Group;

class AuthCheck extends Model
{
    //
  public static function ownsGroup(Group $group){
    $return = false;

    if(Auth::user()->id == $group->user_id):
      $return = true;
    endif;
  
    return $return;
  }

}
