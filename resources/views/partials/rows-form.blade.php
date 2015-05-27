@if(Route::currentRouteName()=='users.payments.index')
  {!! Form::open(['route' => [Route::currentRouteName(), $user->id], 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline', 'style' => 'display:inline-block']) !!}
@else
  {!! Form::open(['route' => Route::currentRouteName(), 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline', 'style' => 'display:inline-block']) !!}
@endif

  <label>Número de filas:</label>
  
  <div class="form-group">   
	@if(Input::get('q'))
    {!! Form::hidden('q', Input::get('q')) !!}
    @endif
	@if(Input::get('column') AND Input::get('direction'))
    {!! Form::hidden('column', Input::get('column')) !!}
    {!! Form::hidden('direction', Input::get('direction')) !!}
    @endif
    {!! Form::select('rows', $rows, Input::get('rows'), ['class' => 'form-control', 'id' => 'rows', 'onchange' => 'this.form.submit()']) !!}

  </div>

{!! Form::close() !!}