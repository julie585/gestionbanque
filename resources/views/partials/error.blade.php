<style type="text/css">
.alert{
border-radius: 7px;
}
</style>
<div class="alert alert-{{ $type }} alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
	</button>
	{!! $message !!}
</div>