<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Auth;
use App\Item;

class ItemController extends Controller
{
    //
  public function index(Group $group){
    //AUTH CHECK NEEDED
    $items = $group->items()->get();
    return view('items.index',[
      'items'   => $items,
      'group'   => $group,
    ]);
  }

  public function create(Group $group){
    return view('items.snips.create', [
      'group'   => $group
    ]);
  }

  public function store(Request $request, Group $group){
    $group->items()->create([
      'name' => $request->name,
      'info' => $request->info,
      'status' => $request->status,
    ]);
    return redirect('group/'.$group->id.'/items');
  }

  public function destroy(Item $item){
    $group = $item->group()->get();
    $item->delete();

    return redirect('/group/'.$group[0]->id.'/items');
  }
}
