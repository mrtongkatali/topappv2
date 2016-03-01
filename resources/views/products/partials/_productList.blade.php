@if ($products)
<ul class="inventory">
    @foreach($products as $i)
      <li id="product_wrapper_{{$i->id}}">
          <div>
            <p class="product-name col3" onclick="editProduct({{$i->id}})">
              <strong>{{ $i->product_name }}</strong> <br/>
              <small class="red">{{ $i->sku }}</small> <br/>
              <small>{{ $i->description }}</small>
            </p>
            <p><a class="btn btn-danger" href="javascript:void(0);" onclick="deleteProduct({{$i->id}})" role="button">Delete</a></p>
          </div>
      </li>
    @endforeach
</ul>
@else
  <center>No data available</center>
@endif
