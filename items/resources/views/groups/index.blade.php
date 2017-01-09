<!-- resources/views/groups/index.blade.php -->

@extends('layouts.app')
@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a href="{{url('home')}}">home</a> > 
      my item groups
    </div>

    <div class="panel-body">
      {!! Form::button('Add Group',[
      'class' => 'form-control btn btn-default lightbox-open',
      'func' => '/group/create']); !!}

      <?php if (!empty($groups)): ?>
        <?php if (count($groups)): ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <th>group name</th>
              <th>info</th>
              <th>status</th>
            </thead>
            <tbody>
        <?php foreach ($groups as $group): ?>
          <tr>
            <td><a href="{{url('group/'.$group->id.'/items')}}">
              {{$group->name}}
            </a></td>
            <td>{{$group->info}}</td>
            <td>
              {{$group->type}}
              <!-- placeholder for group status update -->
            </td>
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