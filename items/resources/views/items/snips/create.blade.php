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

<!-- changes input type depending on group type -->
  <?php switch ($group->type):
    case 'inventory': ?>
      {!! Form::number('status', 0,[
        'class' => 'form-control'
      ])!!}
    <?php break; ?> 
    <?php case 'event': ?> 
      {!! Form::text('status', '', [
        'class' => 'form-control datetimepicker',
        'placeholder' => 'date'
      ]) !!}
    <?php break; ?> 
    <?php case 'task': ?> 
      <div id="range-number"></div>
      <input id="range-input" type="range" min="0" max="100" step="1" name="status">
    <?php break; ?> 
    <?php default: ?> 
      {!! Form::text('status', null, [
        'class' => 'form-control',
        'placeholder' => 'status'
      ]) !!}
    <?php break; ?> 
  <?php endswitch ?>

<br>
  {!! Form::button('add item',[
    'class' => 'btn btn-success lb-close',
    'type' => 'submit'
  ])!!}
{!! Form::close() !!}


<script type="text/javascript">
  //datepicker initializer
  $('.datetimepicker').datetimepicker();
</script>