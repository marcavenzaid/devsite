@extends('layouts.default')

@section('title', 'Devsite')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<form action="{{ route('post') }}" method="post" name="form" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
					<div class="post-container panel panel-default">
						<div class="_panel-heading">Post your application</div>

						<div class="panel-body">
							<div class="form-group">
								<div class="col-xs-12">
									<label for="title" class="col-xs-2 control-label">Title</label>
							    	<div class="col-xs-9">
							    		<input type="text" name="title" class="form-control">
							    	</div>
						 	   	</div>
						 	</div>

						 	<div class="form-group">
						 	   	<div class="col-xs-12">
									<label for="desciption" class="col-xs-2 control-label">Description</label>
							    	<div class="col-xs-9">
							    		<textarea rows="8" type="text" name="description" class="form-control"></textarea>
						    		</div>
						 	   	</div>
					 	   	</div>

					 	   	<div class="form-group">
						 	   	<div class="col-xs-12">
									<label for="genre" class="col-xs-2 control-label">Genre</label>
							    	<div class="col-xs-9">
								    	<select type="text" name="genre" class="form-control">
								    		<option>Tech</option>
								    		<option>Developer Tool</option>
								    		<option>Game</option>
								    		<option>Artificial Intelligence</option>
								    	</select>
								    </div>
						 	   	</div>
				 	   		</div>
						 	
						 	<div class="form-group">
						 	   	<div class="col-xs-12">
									<label for="tags" class="col-xs-2 control-label">Tags</label>
							    	<div class="col-xs-9">
								    	<input type="text" name="tags" class="form-control">
								    	<p class="help-block">Separate tags with a comma. (ex. racing, unity, 3d, shooting)</p>
							    	</div>
						 	   	</div>
						 	</div>

						 	<div class="form-group">
						 	   	<div class="col-xs-12" style="margin-bottom: 10px;">
									<!-- <label for="icon" class="control-label form-margin">Icon</label> -->
									<div class="col-xs-offset-2 col-xs-9">
								    	<label class="btn _btn-default btn-file">
								    		Upload Icon <input type="file" name="icon">
								    	</label>
								    </div>
						 	   	</div>
						 	</div>

					 		<div class="form-group">
						 	   	<div class="col-xs-12" style="margin-bottom: 10px;">
									<!-- <label for="images" class="control-label form-margin">Image</label> -->
									<div class="col-xs-offset-2 col-xs-9">
								    	<label class="btn _btn-default btn-file">
								    		Upload Images <input type="file" name="images">
							    		</label>
							    	</div>
						 	   	</div>
						 	</div>

					 		<div class="form-group">
								<div class="col-xs-12" style="margin-bottom: 10px;">
									<div class="col-xs-offset-2 col-xs-9">
								    	<label class="btn _btn-default btn-file">
								    		Upload File <input type="file" name="file">
								    	</label>
							 	   		<p class="help-block">Example block-level help text here.</p>
							 	   	</div>
						 	   	</div>
					 	   	</div>

					 	   	<div class="col-xs-offset-9 col-xs-1">
								<button type="submit" class="btn _btn-default" style="width:150px">Post</button>
								<input type="hidden" name="_token" value="{{ Session::token() }}">
							</div>
						</div>
					</div>			    	
	 	   		</form>
			</div>
		</div>
	</div>
@endsection