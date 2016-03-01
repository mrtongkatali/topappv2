@if ($ingredients)

<table class="table table-striped">
  <tr>
    <th width="1%"><input id="check_all" type="checkbox" onclick="selectAllIngredient();"></th>
    <th width="20%"><strong>Ingredient Name</strong></th>
    <th width="20%"><strong>Code</strong></th>
    <th width="59%"><strong>Description</strong></th>
  </tr>
  @foreach($ingredients as $i)
    <tr>
      <td width="1%"><input type="checkbox" id="cb_{{ $i->id }}" name="cb[{{ $i->id }}]" value="{{$i->id}}" class="ck_ingr" onclick="selectIngredient();"></td>
      <td onclick="selectRow({{ $i->id }});" width="20%">{{ $i->ingredient_name }}</td>
      <td onclick="selectRow({{ $i->id }});" width="20%">{{ $i->ingredient_code }}</td>
      <td onclick="selectRow({{ $i->id }});" width="59%">{{ $i->description }}</td>
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
