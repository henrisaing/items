<!-- resources/views/items/snips/edit.blade.php -->
{!! Form::open(['url' => 'item/'.$item->id.'/update']) !!}
  
  {!! Form::text('name',$item->name, [
    'class' => 'form-control',
    'placeholder' => 'name',
    'required' => 'required',
  ]) !!}
<br>
  {!! Form::text('info', $item->info, [
    'class' => 'form-control',
    'placeholder' => 'description',
  ]) !!}
<br>
  {!! Form::text('status', $item->status, [
    'class' => 'form-control',
    'placeholder' => 'status',
  ]) !!}
<br>
  {!! Form::button('update',[
    'class' => 'btn btn-success',
    'type' => 'submit'
  ])!!}
  
{!! Form::close() !!}