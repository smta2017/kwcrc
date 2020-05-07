@extends('layoutsite.app')
@section('customeCSS')

<style>
.nav-menu a{
      color: #FFFFFF;
}
  #header {
        background: #000
      }
</style>
@endsection

@section('content')



    <!--==========================
      About Us Section
      ============================-->
      <section id="about"  >
      	<div class="container">

      		<header class="section-header" style="padding: 150px 0 0 0">
      			<h3> اخبارنا</h3>
      			<p>ارشيف اخبار لجنتنا</p>
      		</header>

      		<div class="row about-cols" style="min-height: 700px;text-align: right;">

      			<table class="table table-sm " style="border-radius: 3px;background: #34495E;" >

      				<tbody>
      					@foreach($news as $new)
      					<tr>

      						<td style="padding: 20px ;width: 230px">
                                                <a href="{{ asset('singlenews')}}/{{$new->id}} ">
                                                      <img src="http://kwcrc.com/storage/app/public/news_attach/news_{{$new->id}}" alt="newimg" width="200" class="img-thumbnail">
                                                </a>
                                          </td>



                                          <td style="color: #ffffff">
                                                <div style="color:#dd5;padding: 10px"> 	{{$new->title}} </div>    
                                                <div style=" font-size: 12px !important; padding:  10px 10px 10px 40px ">	{{$new->detail}}  </div>  

                                                <div style="font-size: 10px !important">{{$new->created_at}} </div> 
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>


                  </div>

            </div> 
      </section><!-- #about -->


      @endsection
