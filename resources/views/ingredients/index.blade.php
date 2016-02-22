@extends('layouts.generic')

@section('content')
  <a href="{{ route('ingredients.create') }}" class="btn btn-default btn-full-width btn-orange" role="button">Create New Ingredient</a>

  <div class="inventory-wrapper">
      <ul class="inventory">
          @foreach($ingredients as $i)
          <li>
              <a href="#">
                  <p class="product-name col3">
                    <strong>{{ $i->ingredient_name }}</strong> <br/>
                    <small class="red">{{ $i->ingredient_code }}</small> <br/>
                    <small>{{ $i->description }}</small>
                  </p>
                  <p class="item-description"><span class="gray">Stock: </span>{{ $i->stock_qty }}</p>
              </a>
          </li>
          @endforeach

      </ul>
  </div>

@endsection
