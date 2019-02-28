<div class="page_title">
	<div class="title_left">
		<h2>Blocos Dinâmicos</h2>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	@foreach($blocks as $block)

		<div class="col-xs-12 col-sm-6">

			<div class="x_panel" style="background: #dedede;">

				<div class="x_content">

					<div class="edit-delete-block">

						@include('dynamic-blocks::form-errors', ['error_bag_name' => 'errorBlockEdit_' . $block->id])

						{!! Form::model($block, array('route' => array('dynamic-blocks.edit', $block->id))) !!}
							
							{!! Form::hidden('errorBag', 'errorBlockEdit_' . $block->id) !!}

							@include('dynamic-blocks::inputs')

							<div class="action-buttons">
								<button type="submit" class="btn btn-success">Salvar {!! $block->key !!}</button>
								<a class="btn btn-danger delete-block-action" href="{!! route('dynamic-blocks.delete', $block->id) !!}">Deletar {!! $block->key !!}</a>
							</div>

						{!! Form::close() !!}

					</div>


				</div>

			</div>

		</div>


	@endforeach
	
	<script>
		
		$(document).ready(function(){

			$('.delete-block-action').on('click', function(e) {

				e.preventDefault();

				var delete_block = confirm('Confirma apagar bloco?');

				if(delete_block)
				{
					var action = $(this).attr('href');
					$(this).closest('form').attr('action', action).submit();
				}
			});

		});

	</script>

	
	<div class="col-xs-12 col-sm-6">
		
		<div class="x_panel">
			<div class="x_content">
				<div class="create-block">
					
					@include('dynamic-blocks::form-errors', ['error_bag_name' => 'errorBlockCreate'])

					{!! Form::open(array('route' => 'dynamic-blocks.store')) !!}
						
						{!! Form::hidden('errorBag', 'errorBlockCreate') !!}

						@include('dynamic-blocks::inputs')

						<div class="action-buttons">
							<button type="submit" class="btn btn-success">Salvar</button>
						</div>

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

</div>
