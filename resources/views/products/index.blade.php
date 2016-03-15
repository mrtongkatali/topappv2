@extends('layouts.generic')

@section('content')
  @include('success.generic_form',$callback)

  <div class="row">
    <a href="{{ route('products.create') }}" class="btn btn-default btn-full-width btn-orange" role="button">Create New Product</a>
    <div class="col-md-12">
      <div class="product-wrapper">
          <div id="products_wrapper"></div>
      </div>
    </div>

  </div>
@endsection

<script src="{{ asset('js/jquery.js') }}"></script>
<script>
  function editProduct(id) {
    window.location.href = "/products/"+id+"/edit";
  }

  function deleteProduct(id) {
    var token = "{{ csrf_token() }}";
    $.ajax({
        url: '/products/'+id,
        type: 'POST',
        data: {_method: 'delete', _token :token},
        success: function(result) {
            // Do something with the result
            $('#product_wrapper_'+id).remove();
        },
    });
  }

  function getAllProducts() {
    $('#products_wrapper').html("<center>Fetching result from server...</center>")
    $.get('/products/xhttp/_showProductList',{}, function(data) {
      $('#products_wrapper').html(data);
    });
  }

  $(document).ready(function($) {
      getAllProducts();
  });
</script>
