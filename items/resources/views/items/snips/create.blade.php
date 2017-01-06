<!-- resources/views/items/snips/create.blade.php -->
{!! Form::open(['url' => 'group/'.$group->id.'/create']) !!}
  
  {!! Form::text('name',null, [
    'class' => 'form-control',
    'placeholder' => 'name',
    'required' => 'required'
  ]) !!}
<br>
  {!! Form::text('info', null, [
    'class' => 'form-control',
    'placeholder' => 'description'
  ]) !!}
<br>
  {!! Form::text('status', null, [
    'class' => 'form-control',
    'placeholder' => 'status'
  ]) !!}
<br>
  {!! Form::button('Create Group',[
    'class' => 'btn btn-success',
    'type' => 'submit'
  ])!!}
{!! Form::close() !!}