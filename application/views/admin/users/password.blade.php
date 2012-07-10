@section('page_content')
<div class="row-fluid">
	{{ render('partials.menus.users') }}
	<div class="span10">
		{{ render('partials.flashmsg') }}
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin.auth@login','Home') }} <span class="divider">/</span></li>
			<li class="active">Change password</li>
		</ul>
		<div class="row-fluid">
			<div class="span6">
				<h1>Change password</h1>
				{{ Form::open('admin/users/password', 'POST', array('class' => 'well well-large form-horizontal')) }}
				<div class="control-group">
					{{ Form::label('current_password', 'Current password', array('class' => 'control-label')) }}
					<div class="controls">
						{{ Form::password('current_password', array('placeholder' => 'Current password')) }}
					</div>
				</div>
				<div class="control-group">
					{{ Form::label('new_password', 'New password', array('class' => 'control-label')) }}
					<div class="controls">
						{{ Form::password('new_password', array('placeholder' => 'New password')) }}
					</div>
				</div>
				<div class="control-group">
					{{ Form::label('confirm_password', 'Confirm new password', array('class' => 'control-label')) }}
					<div class="controls">
						{{ Form::password('confirm_password', array('placeholder' => 'Confirm new password')) }}
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						{{ Form::button('Change password', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
					</div>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection