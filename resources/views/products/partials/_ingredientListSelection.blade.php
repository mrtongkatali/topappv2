@if (count($ingredients) > 0)
  <table class="table table-striped">
    <tr>
      <th width="1%"><input id="check_all" type="checkbox" onclick="selectAllIngredient();"></th>
      <th width="20%"><strong>Ingredient Name</strong></th>
      <th width="20%"><strong>Code</strong></th>
      <th width="39%"><strong>Description</strong></th>
      <th width="10%"><strong>QTY</strong></th>
    </tr>
    @foreach($ingredients as $i)
      <tr>
        <td width="1%">{!! Form::checkbox('cb['.$i->id.']', $i->id, (in_array($i->id,$recipe_array) ? true : false), array('class' => 'form-control ck_ingr', 'id' => 'cb_'.$i->id, 'onclick'=> 'selectIngredient();')) !!}</td>
        <td onclick="selectRow({{ $i->id }});" width="20%">{{ $i->ingredient_name }}</td>
        <td onclick="selectRow({{ $i->id }});" width="20%">{{ $i->ingredient_code }}</td>
        <td onclick="selectRow({{ $i->id }});" width="39%">{{ $i->description }}</td>
        <td onclick="selectRow({{ $i->id }});" width="10%"><input type="number" name="qty_{{$i->id}}" min="1" max="10" class="form-control" value="1"></td>
      </tr>
    @endforeach
  </table>

@else
  <center>No data available</center>
@endif

<br/>
<br/>

<script>
  function selectRow(id) {
    $('#cb_'+id).click();
  }

  function selectAllIngredient() {
    $('.ck_ingr').prop('checked',$('#check_all:checked').length);
  }

  function selectIngredient() {
    var checked = $('.ck_ingr:checked').length;
    $('#check_all').prop('checked',false);
  }
</script>
