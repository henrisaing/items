<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;

class GroupController extends Controller
{
    //

  public function index(){
    $user = Auth::user();

    $groups = $user->groups()->get();

    return view('groups.index',[
      'user'    => $user,
      'groups'  => $groups,
      ]);
  }

  public function create(){
    return view('groups.snips.create');
  }

  public function store(Request $request){
    $this->validate($request,[
        'name'  => 'required|max:255',
      ]);

    Auth::user()->groups()->create([
      'name' => $request->name,
      'info' => $request->info,
      'type' => $request->type,
    ]);
    return redirect('group/index');
  }
}
