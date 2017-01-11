<!-- resources/views/groups/snips/create.blade.php -->
{!! Form::open(['url' => 'group/'.$group->id]) !!}
  
  {!! Form::text('name',$group->name, [
    'class' => 'form-control',
    'placeholder' => 'name',
    'required' => 'required'
  ]) !!}
<br>
  {!! Form::text('info', $group->info, [
    'class' => 'form-control',
    'placeholder' => 'description'
  ]) !!}
<br>
  {!! Form::text('info', $group->type, [
    'class' => 'form-control',
    'placeholder' => 'type',
    'readonly' => 'readonly',
  ]) !!}
<br>
  {!! Form::button('save changes',[
    'class' => 'btn btn-success',
    'type' => 'submit'
  ])!!}
{!! Form::close() !!}