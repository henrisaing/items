<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\GroupSummary;
use App\AuthCheck;

class GroupController extends Controller
{
    //
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
  
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
    if(AuthCheck::ownsGroup($group)):
      $view = view('groups.snips.edit',[
      'group' => $group,
    ]);
    else:
      $view = view('errors.permissions');
    endif;
    
    return $view;
  }

  public function update(Request $request, Group $group){
    if(AuthCheck::ownsGroup($group)):
      $this->validate($request,[
        'name'  => 'required|max:255',
      ]);
      $group->name = $request->name;
      $group->info = $request->info;
      $group->save();

      $view = redirect('group/manage');
    else:
      $view = view('errors.permissions');
    endif;
    
    return $view;
  }

  public function destroy(Group $group){
    if(AuthCheck::ownsGroup($group)):
      $group->delete();
      $view = redirect('group/manage');
    else:
      $view = view('errors.permissions');
    endif;
    
    return $view;
  }
}
