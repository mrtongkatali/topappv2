@if (count($ingredients) > 0)
    @foreach($ingredients as $i)
      <div class="row list-wrapper" id="ingr_wrapper_{{$i->id}}">
        <div class="col-md-3 title" onclick="editIngredient({{$i->id}})"><strong>{{ $i->ingredient_name }}</strong></div>
        <div class="col-md-6 description" onclick="editIngredient({{$i->id}})">{{ $i->description }}</div>
        <div class="col-md-3 action-bar">
          <a class="btn btn-danger btn-medwidth" href="javascript:void(0);" onclick="deleteIngredient({{$i->id}})" role="button"><span class="glyphicon glyphicon-trash"></span></a>
          <a class="btn btn-success btn-medwidth" href="javascript:void(0);" onclick="deleteIngredient({{$i->id}})" role="button"><span class="glyphicon glyphicon-plus"></span></a>
        </div>
      </div>
    @endforeach
@else
  <center>No data available</center>
@endif
