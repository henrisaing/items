<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')
@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"> 
      <a href="{{url('home')}}">home</a> > 
      <a href="{{url('/group/index')}}">groups</a> > 
      {{$group->name}} items
    </div>

    <div class="panel-body">
      {!! Form::button('Create Item',[
      'class' => 'form-control btn btn-default lightbox-open',
      'func' => '/group/'.$group->id.'/create'
      ]); !!}

      <?php if (!empty($items)): ?>
        <div class="table-responsive">
          <table class="table table table-hover">
            <thead>
              <th>Item Name</th>
              <th>Info</th>
              <th>Status</th>
              <th>Remove Item</th>
            </thead>
            <tbody>

            <?php foreach ($items as $item): ?>
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->info}}</td>
                <td>{{$item->status}}</td>
                <td>
                  {!! Form::open(['url' => 'item/'.$item->id]) !!}
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    {!! Form::button('delete',[
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
    </div><!-- end div.panel-body -->
  </div><!-- end div.panel-default -->
</div><!-- end div.container -->

@endsection