<!-- resources/views/groups/index.blade.php -->

@extends('layouts.app')
@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a href="{{url('group/index')}}">groups</a> > 
      manage
    </div>

    <div class="panel-body">
  <!--     {!! Form::button('create group',[
      'class' => 'form-control btn btn-success lightbox-open',
      'func' => '/group/create']); !!} -->
  <!--     <a href="{{url('group/manage')}}">
        {!! Form::button('manage groups',[
        'class' => 'form-control btn btn-info']); !!}
      </a> -->

      <?php if (!empty($groups)): ?>
        <?php if (count($groups)): ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <th>group name</th>
              <th>edit</th>
              <th>delete</th>
            </thead>
            <tbody>
        <?php foreach ($groups as $group): ?>
          <tr>
            <td><a href="{{url('group/'.$group->id.'/items')}}">
              {{$group->name}}
            </a></td>
            <td>
              {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',[
                'class' => 'btn btn-success lightbox-open',
                'func' => '/group/'.$group->id]); !!}
            </td>
            <td>
              {!! Form::open(['url' => 'group/'.$group->id]) !!}
                {{csrf_field()}}
                {{method_field('DELETE')}}
                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
                  'type' => 'submit',
                  'class' => 'btn btn-danger'
                ]) !!}
              {!! Form::close() !!}
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