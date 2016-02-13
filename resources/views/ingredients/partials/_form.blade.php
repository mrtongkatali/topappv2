<h3>{{ $page_title }}</h3>


<br/>
<div class="form">
{!! Form::open(array('route' => array('ingredients.store'), 'method' => 'POST')) !!}

  {!! Form::label('ingredient_name', 'Name') !!}
  {!! Form::text('ingredient_name', '', array('class' => 'form-control', 'id' => 'ingredient_name')) !!}

  {!! Form::label('description', 'Description') !!}
  {!! Form::textarea('description', '', array('class' => 'form-control', 'id' => 'description')) !!}

  <br/>
  {!! Form::submit('Create', array('class'=>'btn btn-default pull-right btn-success')) !!}

{!! Form::close() !!}
</div>
