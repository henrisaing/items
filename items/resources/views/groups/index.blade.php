<!-- resources/views/groups/index.blade.php -->

@extends('layouts.app')
@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      groups >
      <a href="{{url('group/manage')}}">manage</a>
    </div>

    <div class="panel-body">
      {!! Form::button('create group',[
      'class' => 'form-control btn btn-success lightbox-open',
      'func' => '/group/create']); !!}
      <a href="{{url('group/manage')}}">
        {!! Form::button('manage groups',[
        'class' => 'form-control btn btn-info']); !!}
      </a>

      <?php if (!empty($groups)): ?>
        <?php if (count($groups)): ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <th>group</th>
              <th>info</th>
              <th>type</th>
              <th>status</th>
            </thead>
            <tbody>
        <?php foreach ($groups as $group): ?>
          <tr>
            <td><a href="{{url('group/'.$group->id.'/items')}}">
              {{$group->name}}
            </a></td>
            <td>{{$group->info}}</td>
            <td>{{$group->type}}</td>
            <td>{{$gs->status($group)}}</td>
          </tr>
        <?php endforeach ?>
          </tbody>
          </table>
        </div>
          
        <?php endif ?>
      <?php endif ?>

    </div><!-- end div.panel-body -->
  </div><!-- end div.panel-default -->
</div><!-- end div.container -->
@endsection