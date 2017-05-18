<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Auth;
use App\Item;
use App\GroupSummary;
use App\AuthCheck;

class ItemController extends Controller
{    
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Group $group){
    //AUTH CHECK NEEDED
    if(AuthCheck::ownsGroup($group)):
      $items = $group->items()->get();

      $gs = new GroupSummary;

      $view = view('items.index',[
        'items'   => $items,
        'group'   => $group,
        'gs'      => $gs,
      ]);
    else:
      $view = view('errors.permissions');
    endif;

    return $view;
  }

  public function create(Group $group){
    if(AuthCheck::ownsGroup($group)):
      $view = view('items.snips.create', [
        'group'   => $group
      ]);
    else:
      $view = view('errors.permissions');
    endif;

    return $view;
  }

  public function store(Request $request, Group $group){

    if(AuthCheck::ownsGroup($group)):
      $this->validate($request,[
        'name'  => 'required|max:255',
      ]);

      $group->items()->create([
        'name' => $request->name,
        'info' => $request->info,
        'status' => $request->status,
      ]);
      $view = redirect('group/'.$group->id.'/items');

    else:
      $view = view('errors.permissions');
    endif;

    return $view;
  }

  public function edit(Item $item){
    if(AuthCheck::ownsGroup($item->group()->get()[0])):
      $group = $item->group()->get();

      $view = view('items.snips.edit',[
        'item' => $item,
        'group' => $group,
      ]);

    else:
      $view = view('errors.permissions');
    endif;

    return $view;
  }

  public function update(Request $request, Item $item){

    if(AuthCheck::ownsGroup($item->group()->get()[0])):
      $group = $item->group()->get();
      $this->validate($request,[
          'name'  => 'required|max:255',
        ]);

      $item->name = $request->name;
      $item->info = $request->info;
      $item->status = $request->status;
      $item->save();

      $view = redirect('group/'.$group[0]->id.'/items');
    else:
      $view = view('errors.permissions');
    endif;

    return $view;
  }

  public function destroy(Item $item){
    if(AuthCheck::ownsGroup($item->group()->get()[0])):
      $group = $item->group()->get();
      $item->delete();

      $view = redirect('/group/'.$group[0]->id.'/items');
    else:
      $view = view('errors.permissions');
    endif;

    return $view;
  }
}
