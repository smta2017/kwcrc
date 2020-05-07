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
Portfolio Section
============================-->
<section id="portfolio"  class="section-bg" >
  <div class="container">

    <header class="section-header" style="padding: 150px 0 0 0">
      <h3 class="section-title">معرض الصور</h3>
    </header>

    <div class="row">
      <div class="col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">الكل</li>
          @foreach($potcats as $potcat)
          <li data-filter=".filter-{{$potcat->id}}">{{$potcat->catName}}</li>
          @endforeach

        </ul>
      </div>
    </div>

    <div class="row portfolio-container">
      @foreach($portfolios as $portfolio)
      <div class="col-lg-4 col-md-6 portfolio-item filter-{{$portfolio->portfoliocat_id}} wow fadeInUp">
        <div class="portfolio-wrap">
          <figure>
            <img src="http://kwcrc.com/storage/app/public/portfolios_attach/portfolios_{{$portfolio->id}}" class="img-fluid" alt="">
            <a href="http://kwcrc.com/storage/app/public/portfolios_attach/portfolios_{{$portfolio->id}}" data-lightbox="portfolio" data-title="{{$portfolio->title}}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
            <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
          </figure>

          <div class="portfolio-info">
            <h4><a href="#">{{$portfolio->title}}</a></h4>
            <p>{{$portfolio->portfoliocat->catName}}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- #portfolio -->



      @endsection
