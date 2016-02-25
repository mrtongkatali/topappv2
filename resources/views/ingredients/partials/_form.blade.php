<h3>{{ $page_title }}</h3>

<br/>
<div class="form">

@if ($action == "update")
  {!! Form::model($ingredient,['route' => array('ingredients.update', $ingredient->id), 'method' => 'PATCH' ]) !!}
@else
  {!! Form::open(array('route' => array('ingredients.store'), 'method' => 'POST')) !!}
@endif

  {!! Form::hidden('status',null, array('class' => 'form-control', 'id' => 'status')) !!}
  {!! Form::hidden('ingredient_code',null, array('class' => 'form-control', 'id' => 'ingredient_code')) !!}

  {!! Form::label('ingredient_name', 'Name') !!}<span class="red">*</span>
  {!! Form::text('ingredient_name',null, array('class' => 'form-control', 'id' => 'ingredient_name')) !!}

  {!! Form::label('description', 'Description') !!}
  {!! Form::textarea('description',null, array('class' => 'form-control', 'id' => 'description')) !!}

  <br/>

  {!! Form::submit($submitBtnTxt, array('class'=>'btn btn-default pull-right btn-success')) !!}
  <a href="{{ route('ingredients.index') }}" class="btn btn-default pull-right btn-danger">Cancel</a>

{!! Form::close() !!}
</div>
