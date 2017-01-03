<!-- resources/views/groups/index.blade.php -->

@extends('layouts.app')
@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">My Item Groups</div>
    <div class="panel-body">
      {!! Form::button('Add Group',[
      'class' => 'form-control btn btn-default lightbox-open',
      'func' => '/group/create']); !!}

      <?php if (!empty($groups)): ?>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>Group Name</th>
              <th>Info</th>
            </thead>
            <tbody>
        <?php foreach ($groups as $group): ?>
          <tr>
            <td><a href="{{url('group/'.'$group->id'.'/items')}}">
              {{$group->name}}
            </a></td>
            <td>{{$group->info}}</td>
          </tr>
        <?php endforeach ?>
          </tbody>
          </table>
        </div>
      <?php endif ?>

    </div><!-- end div.panel-body -->
  </div><!-- end div.panel-default -->
</div><!-- end div.container -->
@endsection