@extends('layoutsite.app')
@section('customeCSS')

<style>
.nav-menu a{
      color: #FFFFFF;
}
  #header {
        background: #000
      }
/*#header.header-scrolled{
      background:green;
}*/

/*
 @media (min-width: 1200px) {
   .m-xl-0 {
     margin: 0 !important;

 }*/
</style>
@endsection

@section('content')



    <!--==========================
      About Us Section
      ============================-->
      <section id="about"  >
      	<div class="container">

      		<header class="section-header" style="padding: 150px 0 0 0">
      			<h3>التشريعات</h3>
      			<p>التشريعات وقوانين حماية حقوق الطفل </p>
      		</header>

      		<div class="row about-cols" style="min-height: 700px;text-align: right;">

      			<table class="table table-sm " style="border-radius: 3px;background: #34495E;" >

      				<tbody>
      					@foreach($Legislations as $Legislation)
      					<tr>

      						 


                                          <td style="color: #ffffff">
                                                <div style="color:#dd5;padding: 10px"> 	{{$Legislation->law}} </div>    
                                                <div style=" font-size: 14px !important; padding:  10px 10px 10px 40px ">	{{$Legislation->explan}}  </div>  

                                                <div style="font-size: 12px !important">{{$Legislation->material}} </div> 
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>


                  </div>

            </div> 
      </section><!-- #about -->


      @endsection
