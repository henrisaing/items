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

<!-- changes input type depending on group type -->
  <?php switch ($group[0]->type):
  case 'inventory': ?>
      {!! Form::number('status', $item->status,[
        'class' => 'form-control'
      ])!!}
    <?php break; ?> 
    <?php case 'event': ?> 
      {!! Form::text('status', $item->status, [
        'class' => 'form-control',
        'placeholder' => 'status'
      ]) !!}
    <?php break; ?> 
    <?php case 'task': ?> 
      <div id="range-number"></div>
      <input id="range-input" type="range" min="0" max="100" step="1" name="status" value="{{$item->status}}">
    <?php break; ?> 
    <?php default: ?> 
      {!! Form::text('status', $item->status, [
        'class' => 'form-control',
        'placeholder' => 'status'
      ]) !!}
    <?php break; ?> 
  <?php endswitch ?>

<br>
  {!! Form::button('update',[
    'class' => 'btn btn-success lb-close',
    'type' => 'submit'
  ])!!}
{!! Form::close() !!}