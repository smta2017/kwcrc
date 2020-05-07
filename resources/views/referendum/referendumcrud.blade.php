@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col">

      <div  class="modal fade editmodal" id="detailsmodal"  >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button data-dismiss="modal" class="close" type="button">×</button>

            </div>
            <div class="modal-body">
              <div id="datatab" datatableid="22" >

              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="dodo" id="mains" datatableid="21" >

      </div>
    </div>
  </div>
</div>



@endsection



@section('footersection')
<script src="mainjs/mainjs.js" type="text/javascript" ></script>

<script>
  $(document).on('click', '.chois', function(e) {

   // $('#datatab').append('ssss');

   fechdatatableindiv($('#datatab'),1,0,$(this).attr('id'),'referendums');

   $('#detailsmodal').modal('show');
 });




  $(document).ready(function(e){
   fechdatatableindiv($('#mains'),1);
 });


  
</script>
@endsection
