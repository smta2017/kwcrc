@extends('layouts.app')

@section('content')
<div class="container">

    <div  class=""  datatableid="1">
    <img src="img/load-new4.gif" style="margin: 150px 450px; width: 200px ;height: 200px">
    
    </div>

</div>
<script src="main/mainjs.js" type="text/javascript" ></script>

<script type="text/javascript">
    $(document).ready(function(e){
     fechdatatableindiv($("[datatableid='1']"),1,0,0,0);
 });
</script>
@endsection
