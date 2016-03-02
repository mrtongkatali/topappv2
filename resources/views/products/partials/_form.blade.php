<h3>{{ $page_title }}</h3>

<br/>
<div class="form">
  @if ($action == "update")
    {!! Form::model($product,['route' => array('products.update', $product->id), 'method' => 'PATCH' ]) !!}
  @else
    {!! Form::open(array('route' => array('products.store'), 'method' => 'POST')) !!}
  @endif

  {!! Form::hidden('id',null, array('class' => 'form-control', 'id' => 'id')) !!}
  {!! Form::hidden('status',null, array('class' => 'form-control', 'id' => 'status')) !!}
  <br/>
  {!! Form::label('product_name', 'Name') !!}<span class="red">*</span>
  {!! Form::text('product_name',null, array('class' => 'form-control', 'id' => 'product_name')) !!}
  <br/>
  {!! Form::label('sku', 'SKU') !!}<span class="red">*</span>
  {!! Form::text('sku',null, array('class' => 'form-control', 'id' => 'sku')) !!}
  <br/>
  {!! Form::label('description', 'Description') !!}
  {!! Form::textarea('description',null, array('class' => 'form-control description', 'id' => 'description')) !!}
  <br/>
  {!! Form::label('base_price', 'Base Price') !!}<span class="red">*</span> <small>(e.g 20.00, 1, 0.32)</small>
  <div class="input-group">
    <span class="input-group-addon">Php</span>
    {!! Form::text('base_price',null, array('class' => 'form-control currency', 'id' => 'base_price')) !!}
  </div>
  <br/>
  <br/>
  <label for="product_name">Ingredients</label>
  <div id="add_ingredients_wrapper"></div>
  <br/>
  <br/>


  {!! Form::submit($submitBtnTxt, array('class'=>'btn btn-default pull-right btn-success')) !!}
  <a href="{{ route('products.index') }}" class="btn btn-default pull-right btn-danger">Cancel</a>

{!! Form::close() !!}
</div>

<script>
  function getAllIngredientListSelection() {
    var id = $('#id').val();
    $('#add_ingredients_wrapper').html("<center>Fetching result from server...</center>")
    $.get('/products/xhttp/_getIngredientListSelection/'+id,{}, function(data) {
      $('#add_ingredients_wrapper').html(data);
    });
  }

  $(document).ready(function($) {
      getAllIngredientListSelection();
  });
</script>
