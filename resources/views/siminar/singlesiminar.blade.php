@extends('layoutsite.app')
@section('customeCSS')

<style>
      .nav-menu a{
            color: green;
      }


      img:hover{

      }
</style>
@endsection

@section('content')


 <!--==========================
      Portfolio Section
      ============================-->
      <section id="portfolio"  class="section"  style="padding: 150px 0 0 0">
        <div class="container" style="height: 800px">
 
          <header class="section-header">
            <h3 class="section-title">تفاصيل الفاعلية</h3>
          </header>

          

          <div class="row portfolio-container">
        
           <div class="col-lg-12 col-md-6 portfolio-item filter-" style="overflow:visible;">
            <div class="portfolio-wrap">
              <figure style="height: 450px ;">
                <img src="http://kwcrc.com/storage/app/public/news_attach/news_{{$si->id}}" class="img-fluid" alt="">
                
              </figure>

              <div class="portfolio-info" style="text-align: right; height: auto;">
                <h3><a href="#">{{ $si->title}}</a></h3>  
                <p style="color: gray;">{{ $si->detail}} </p>
              </div>
            </div>
          </div>
       

        </div>

      </div>
    </section><!-- #portfolio -->


      @endsection
