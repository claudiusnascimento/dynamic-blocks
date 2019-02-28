
<div class="row">
	
	{!! Form::hidden('rel', $model_relation) !!}
	{!! Form::hidden('rel_id', $model_id) !!}

	<div class="col-xs-12">
		<div class="checkbox">
		    <label>
		      	{!! Form::checkbox('active', 1, isset($block) ? $block->active : true) !!} Ativo
		    </label>
		</div>
	</div>
	
	<div class="col-xs-12">
		<div class="form-group">
			
			<label for="key">Chave: (*)</label>
			{!! Form::text('key', null, array('class' => 'form-control')) !!}

		</div>
	</div>

	<div class="col-xs-12">
		<div class="form-group">
			
			<label for="order">Ordem: (*)</label>
			{!! Form::text('order', null, array('class' => 'form-control')) !!}

		</div>
	</div>

	<div class="col-xs-12">
		<div class="form-group">
			
			<label for="title">Título:</label>
			{!! Form::text('title', null, array('class' => 'form-control')) !!}

		</div>
	</div>

	<div class="col-xs-12">
		<div class="form-group">
			
			<label for="sub_title">Sub título:</label>
			{!! Form::text('sub_title', null, array('class' => 'form-control')) !!}

		</div>
	</div>

	<div class="col-xs-12">
		<div class="form-group">
			
			<label for="content">Conteúdo:</label>
			{!! Form::textarea('content', null, array('class' => 'form-control redactor')) !!}

		</div>
	</div>
	
</div>