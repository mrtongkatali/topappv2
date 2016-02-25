@extends('layouts.generic')

@section('content')
  @include('success.generic_form',$callback)
  <a href="{{ route('products.create') }}" class="btn btn-default btn-full-width btn-orange" role="button">Create New Product</a>

  <div class="product-list-wrapper">
      <div id="products_wrapper"></div>
  </div>
@endsection

<script src="{{ asset('js/jquery.js') }}"></script>
<script>
  function editIngredient(id) {
    window.location.href = "/ingredients/"+id+"/edit";
  }

  function deleteIngredient(id) {
    var token = "{{ csrf_token() }}";
    $.ajax({
        url: '/ingredients/'+id,
        type: 'POST',
        data: {_method: 'delete', _token :token},
        success: function(result) {
            // Do something with the result
            $('#ingr_wrapper_'+id).remove();
        },
    });
  }

  function getAllIngredients() {
    $('#products_wrapper').html("<center>Fetching result from server...</center>")
    $.get('/ingredients/xhttp/_showIngredientList',{}, function(data) {
      $('#products_wrapper').html(data);
    });
  }

  $(document).ready(function($) {
      getAllIngredients();
  });
</script>
