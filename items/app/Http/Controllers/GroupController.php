<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\GroupSummary;

class GroupController extends Controller
{
    //

  public function index(){
    $user = Auth::user();
    $gs = new GroupSummary();

    $groups = $user->groups()->get();

    return view('groups.index',[
      'user'    => $user,
      'groups'  => $groups,
      'gs'      => $gs,
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

  public function manage(){
    $user = Auth::user();

    $groups = $user->groups()->get();

    return view('groups.manage',[
      'groups' => $groups,
    ]);
  }

  public function edit(Group $group){

    return view('groups.snips.edit',[
      'group' => $group,
    ]);
    // return $group;
  }

  public function update(Request $request, Group $group){
    $this->validate($request,[
        'name'  => 'required|max:255',
      ]);
    $group->name = $request->name;
    $group->info = $request->info;
    $group->save();

    return redirect('group/manage');
  }

  public function destroy(Group $group){
    $group->delete();
    return redirect('group/manage');
  }
}
