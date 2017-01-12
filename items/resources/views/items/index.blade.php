<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')
@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a href="{{url('/group/index')}}">groups</a> > 
      {{$group->name}} items
    </div>

    <!-- group status header -->
    <?php if (!empty($items)): ?>
      <?php if (count($items)): ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            group status:{{$gs->status($group)}}
          </div>
        </div>
      <?php endif ?>
    <?php endif ?>


    <div class="panel-body">
      {!! Form::button('add item',[
      'class' => 'form-control btn btn-default lightbox-open',
      'func' => '/group/'.$group->id.'/create'
      ]); !!}

      <?php if (!empty($items)): ?>
        <?php if (count($items)): ?>
          
        
        <div class="table-responsive">
          <table class="table table table-hover">
            <thead>
              <th>Item Name</th>
              <th>Status</th>
              <th></th>
              <th></th>
            </thead>
            <tbody>

            <?php foreach ($items as $item): ?>
              <tr class="toggle" item="{{$item->id}}">
                <td>
                  {{$item->name}}
                  <p class="hide toggle-item-{{$item->id}}">
                    {{$item->info}}
                  </p>
                </td>
                <!-- <td>{{$item->info}}</td> -->
                <td>{{$item->status}}</td>
                <td>
                  {!! Form::button('edit',[
                    'class' => 'btn btn-info lightbox-open',
                    'func' => '/item/'.$item->id.'/edit'
                  ]) !!}
                </td>
                <td>
                  {!! Form::open(['url' => 'item/'.$item->id]) !!}
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