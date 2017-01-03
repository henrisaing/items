<!-- resources/views/groups/snips/create.blade.php -->
{!! Form::open(['url' => 'group/create']) !!}
  
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
  {!! Form::button('Create Group',[
    'class' => 'btn btn-success',
    'type' => 'submit'
  ])!!}
{!! Form::close() !!}