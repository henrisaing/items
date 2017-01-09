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
    $this->validate($request,[
        'name'  => 'required|max:255',
      ]);

    $group->items()->create([
      'name' => $request->name,
      'info' => $request->info,
      'status' => $request->status,
    ]);
    return redirect('group/'.$group->id.'/items');
  }

  public function edit(Item $item){
    $group = $item->group()->get();
    return view('items.snips.edit',[
      'item' => $item,
      'group' => $group,
    ]);
  }

  public function update(Request $request, Item $item){
    $group = $item->group()->get();
    $this->validate($request,[
        'name'  => 'required|max:255',
      ]);

    $item->name = $request->name;
    $item->info = $request->info;
    $item->status = $request->status;
    $item->save();

    return redirect('group/'.$group[0]->id.'/items');
  }

  public function destroy(Item $item){
    $group = $item->group()->get();
    $item->delete();

    return redirect('/group/'.$group[0]->id.'/items');
  }
}
