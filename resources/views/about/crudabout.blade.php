@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		 
		<div class="col">
			<div class="dodo" datatableid="12" >

			</div>
		</div>
	</div>
</div>



@endsection



@section('footersection')
 <script src="mainjs/mainjs.js" type="text/javascript" ></script>
 
<script>
  $(document).ready(function(e){
   $('div').each(function(){
       if ($(this).attr('datatableid')) {
           fechdatatableindiv($(this),1);
       }
   });
});
</script>
@endsection