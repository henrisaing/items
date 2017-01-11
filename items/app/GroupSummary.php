<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
use App\Item;
use Auth;

class GroupSummary extends Model
{
    //

  public function returnOne(){
    return 1;
  }

  public function groupName(Group $group){
    return $group->name;
  }

  public function status(Group $group){
    $status = 'error for '.$group->name;

    switch ($group->type) {
      //gets avg of all tasks in group
      case 'task':
        $counter = 0;
        $total = 0;
        $status = '0%';
        if (count($group->items()->get())):
          foreach ($group->items()->get() as $item):
            $total += $item->status;
            $counter++;
          endforeach;
          $status = ($total / $counter).'%';
        endif;
      break;
      
      //gets lowest stock item
      case 'inventory':
        if (count($group->items()->get())):
          $lowestItem = $group->items()->first();
          
          foreach ($group->items()->get() as $item):
            if ($item->status < $lowestItem->status):
              $lowestItem = $item;
            endif;
          endforeach;
          $status = $lowestItem->name.':'.$lowestItem->status;
        else:
          $status = 'no items';
        endif;
      break;

      //gets  closest event
      case 'event':
        $status = 'ev placeholder';
      break;

      //gets last item added to group
      default:
        if (count($group->items()->get())):
          $latest = $group->items()->orderBy('id', 'desc')->first();
          $status = $latest->name.':'.$latest->status;
        else:
          $status = 'error';
        endif;
      break;
    }

    return $status;
  }
}
