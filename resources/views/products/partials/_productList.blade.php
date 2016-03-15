@if (count($products) > 0)
    @foreach($products as $i)
      <div class="row list-wrapper" id="product_wrapper_{{$i->id}}">
        <div class="col-md-3 title" onclick="editProduct({{$i->id}})"><strong>{{ $i->product_name }}</strong></div>
        <div class="col-md-6 description" onclick="editProduct({{$i->id}})">{{ $i->description }}</div>
        <div class="col-md-3 action-bar">
          <a class="btn btn-danger btn-medwidth" href="javascript:void(0);" onclick="deleteProduct({{$i->id}})" role="button"><span class="glyphicon glyphicon-trash"></span></a>
          <a class="btn btn-success btn-medwidth" href="javascript:void(0);" onclick="deleteProduct({{$i->id}})" role="button"><span class="glyphicon glyphicon-plus"></span></a>
        </div>
      </div>
    @endforeach
@else
  <center>No data available</center>
@endif
