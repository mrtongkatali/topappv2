@if (count($ingredients) > 0)
<ul class="inventory">
    @foreach($ingredients as $i)
      <li id="ingr_wrapper_{{$i->id}}">
          <!-- <a href="{{ route('ingredients.edit',[$i->id]) }}"> -->
            <div>
              <p class="product-name col3" onclick="editIngredient({{$i->id}})">
                <strong>{{ $i->ingredient_name }}</strong> <br/>
                <small class="red">{{ $i->ingredient_code }}</small> <br/>
                <small>{{ $i->description }}</small>
              </p>
              <p class="item-description" onclick="editIngredient({{$i->id}})"><span class="gray">Stock: </span>{{ $i->stock_qty }}</p>
              <p><a class="btn btn-danger" href="javascript:void(0);" onclick="deleteIngredient({{$i->id}})" role="button">Delete</a></p>
            </div>
          <!-- </a> -->
      </li>
    @endforeach
</ul>
@else
  <center>No data available</center>
@endif
