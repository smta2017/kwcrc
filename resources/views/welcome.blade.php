@extends('layoutsite.app')


@section('content')

<!--==========================
Intro Section
============================-->
<section id="intro">
  <div class="intro-container">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
          <div class="carousel-background"><img src="img/intro-carousel/1.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content"><h2>معاً لبناء كويت الجديدة 2035</h2>
              <p>NEW KUWAIT</p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/intro-carousel/2.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>صاحب السمو الشيخ صباح الاحمد الجابر الصباح</h2>
              <p>قائد العمل الانساني</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/intro-carousel/3.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>طفل اليوم قائد المستقبل</h2>
              <p></p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/intro-carousel/4.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>غرس الوطنية في اطفالنا = دولة الكويت</h2>
              <p>ما ان نغرس فيهم روح الوطنية ,سرعان ما نجني ثمارها في كيان الدولة بقيادة اطفالنا للمستقبل</p>
            </div>
          </div>
        </div>


      </div>

      <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>
</section><!-- #intro -->

<main id="main">

  <!--==========================
  Featured Services Section
  ============================-->
  <section id="featured-services">
    <div class="container">
      <div class="row">

        @foreach($Featurs as $Featur)
        <div class="col-lg-4 box  {{$Featur->classback}}">
          <i class="{{$Featur->icon}}"></i>
          <h4 class="title"><a href=""> {{$Featur->title}}</a></h4>
          <p class="description">{{ str_limit($Featur->details, 220, '...') }} <a href="/more1/{{$Featur->id}}">المذيد</a></p>
        </div>
        @endforeach

      </div>
    </div>
  </section><!-- #featured-services -->

  <!--==========================
  About Us Section
  ============================-->
  <section id="about">
    <div class="container">

      <header class="section-header">
        <h3>تعرف على لجنتنا</h3>
        <p>{{$Abouts[0]->head}}</p>
      </header>

      <div class="row about-cols">

        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
          <div class="about-col">
            <div class="img">
              <img src="img/about-vision.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-eye-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">الرؤية</a></h2>
            <p>
              {{str_limit($Abouts[0]->vetion,200,'...')}} <a href="/more2/1">المذيد</a>
            </p>
          </div>
        </div>



        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
          <div class="about-col">
            <div class="img">
              <img src="img/about-plan.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-list-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">الرسالة</a></h2>
            <p>
              {{str_limit($Abouts[0]->Politics,200,'...')}} <a href="/more2/2">المذيد</a>
            </p>
          </div>
        </div>

        <div class="col-md-4 wow fadeInUp">
          <div class="about-col">
            <div class="img">
              <img src="img/about-mission.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">الأهداف</a></h2>
            <p>
              {{str_limit($Abouts[0]->targets,200,'...')}} <a href="/more2/3">المذيد</a>
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- #about -->

  <!--==========================
  Services Section
  ============================-->
  <section id="services">
    <div class="container">

      <header class="section-header wow fadeInUp">
        <h3>خدمات لجنتنا</h3>
        <p>{{$Services[0]->head}}</p>
      </header>

      <div class="row">
        @foreach($Services as $Service)
        <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
          <div class="icon"><i class="{{$Service->icon}}"></i></div>
          <h4 class="title"><a href="">{{$Service->service}}</a></h4>
          <p class="description">{{$Service->desc}}</p>
        </div>
        @endforeach



      </div>

    </div>
  </section><!-- #services -->

  <!--==========================
  Call To Action Section
  ============================-->
  <section id="call-to-action" class="wow fadeIn">
    <div class="container text-center">
      <h3>شكاوى الطفل</h3>
      <p>نتلقى جميع شكاوى وبلاغات الطفل</p>
      <a class="cta-btn" href="complane">تقديم شكوى</a>
    </div>
  </section><!-- #call-to-action -->

  <!--==========================
  Skills Section
  ============================-->
  @if($Referendums->count()>0)
  <section id="skills">
    <div class="container">

      <header class="section-header">
        <h3>إستطلاع للرأي</h3>

        <p>{{$Referendums[0]->detail}}</p>
      </header>

      <div class="skills-content">
       @foreach($Referendums[0]->refselections as $refselection)
       <div class="progress">
        <div class="progress-bar bg-{{$refselection->class}}" role="progressbar" aria-valuenow="{{$refselection->votes}}" aria-valuemin="0" aria-valuemax="100">
          <span class="skill">{{$refselection->selection}} <i class="val">{{$refselection->votes}}%</i></span>
        </div>
      </div>
      @endforeach

    </div>


   <div class="text-center" style="margin-top: 15px"><a href="vote/{{$Referendums[0]->id}}" class="btn btn-danger">تصويت</a></div>

 </div>
</section>
@endif
<!--==========================
Facts Section
============================-->
<!-- <section id="facts"  class="wow fadeIn">
<div class="container">

<header class="section-header">
<h3>Facts</h3>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
</header>

<div class="row counters">

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">274</span>
<p>Clients</p>
</div>

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">421</span>
<p>Projects</p>
</div>

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">1,364</span>
<p>Hours Of Support</p>
</div>

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">18</span>
<p>Hard Workers</p>
</div>

</div>

<div class="facts-img">
<img src="img/facts-img.png" alt="" class="img-fluid">
</div>

</div>
</section>--><!-- #facts -->

<!--==========================
Portfolio Section
============================-->
<section id="portfolio"  class="section-bg" >
  <div class="container">

    <header class="section-header">
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
<div style="width: 100% ; margin: 0 auto; text-align: center; padding: 20px">
  <a class="btn btn-success" href="portfolios">المذيد</a>
</div>
  </div>
</section><!-- #portfolio -->

<!--==========================
Clients Section
============================-->
<section id="clients" class="wow fadeInUp">
  <div class="container">

    <header class="section-header">
      <h3>مواقع صديقة</h3>
    </header>

    <div class="owl-carousel clients-carousel">
      <img src="img/clients/client-1.png" alt="">
      <img src="img/clients/client-2.png" alt="">
      <img src="img/clients/client-3.png" alt="">
      <img src="img/clients/client-4.png" alt="">
      <img src="img/clients/client-5.png" alt="">
      <img src="img/clients/client-6.png" alt="">
      <img src="img/clients/client-7.png" alt="">
      <img src="img/clients/client-8.png" alt="">
    </div>

  </div>
</section><!-- #clients -->


<!--==========================
Facts Section
============================-->
@if($Siminars->count()>0 || $Activats->count()>0)
<section id="facts"  class="wow fadeIn">
  <div class="container" style="padding: 30px">

    <header class="section-header">
      <h3>فاعلياتنا</h3>
      <p>يمكنكم الاشتراك معنا في لحضور فاعلياتنا القادمة</p>
    </header>


    <div class="row counters" style="padding: 30px">
      @if($Siminars->count()>0)
      <div   class="col-lg-6 col-12 text-right" style="border-left: solid 1px green">
        <div   class="text-center">
          <span data-toggle="counter-up">300</span>
          <p>مسجلين بالندوة</p>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <img src="http://kwcrc.com/storage/app/public/seminars_attach/seminars_{{$Siminars[0]->id}}"   class="img-thumbnail" style="width: 200px;">
          </div>
          <div class="col-lg-8" style="padding: 20px 50px 0  0">
            <span style="font-size: 14px;color: geen;padding: 10px">{{$Siminars[0]->title}}</span>
            <ul style="list-style-type: none; font-size: 13px">
              <li><i class="ion-ios-location" ></i>{{$Siminars[0]->location}}</li>
              <li><i class="ion-ios-time-outline" ></i>{{$Siminars[0]->thedate}}</li>
            </ul>
            <p style="border-top: 1px solid gray; font-size:11px">
              {{$Siminars[0]->subject}}
            </p>
            <a href="siminarsubscribe/{{$Siminars[0]->id}}/{{$Siminars[0]->titlen}}/1" class="btn btn-success" style="float: left; margin:  10px">اشتراك</a>
          </div>
        </div>
      </div>
      @endif
      @if( $Activats->count()>0)
      <div  class="col-lg-6 col-12 text-right"  style="border-left: solid 1px green">
        <div   class="text-center">
          <span data-toggle="counter-up">300</span>
          <p>مسجلين  بالفاعلية</p>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <img src="http://kwcrc.com/storage/app/public/activats_attach/activats_{{$Activats[0]->id}}" class="img-thumbnail" style="width: 200px;">
          </div>
          <div class="col-lg-8" style="padding: 20px 50px 0  0">
            <span style="font-size: 14px;color: geen;padding: 10px">{{$Activats[0]->title}}</span>
            <ul style="list-style-type: none; font-size: 13px">
              <li><i class="ion-ios-location" ></i>{{$Activats[0]->location}}</li>
              <li><i class="ion-ios-time-outline" ></i>{{$Activats[0]->thedate}}</li>
            </ul>
            <p style="border-top: 1px solid gray; font-size:11px">
              {{$Activats[0]->subject}}
            </p>
            <a href="activsubscribe/{{$Activats[0]->id}}/{{$Activats[0]->titlen}}/2" class="btn btn-success"  style="float: left; margin:  10px">اشتراك</a>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
@endif <!-- #facts -->



<!--==========================
Clients Section
============================-->
<section id="testimonials" class="section-bg wow fadeInUp">
  <div class="container">

    <header class="section-header">
      <h3>تشريعات الطفل</h3>
    </header>

    <div class="owl-carousel testimonials-carousel">


      @foreach($Legislations as $Legislation)
      <div class="testimonial-item">
        <img src="img/logo2.png" class="testimonial-img" alt="">
        <h3>{{$Legislation->law}}</h3>
        <h4>{{$Legislation->material}}</h4>
        <p>
          <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
          {{$Legislation->explan}}
          <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
        </p>
      </div>
      @endforeach

    </div>
<div style="width: 100% ; margin: 0 auto; text-align: center; padding: 20px">
  <a class="btn btn-success" href="Legislations">المذيد</a>
</div>
  </div>
</section><!-- #testimonials -->

<!--==========================
Team Section
============================-->
<section id="team">
  <div class="container">
    <div class="section-header wow fadeInUp">
      <h3>اعضاء اللجنة</h3>
      <p>مقدمة عن فريق عمل اللجنة</p>
    </div>

    <div class="row">
      @foreach($Teams as $Team)
      <div class="col-lg-3 col-md-6 wow fadeInUp">
        <div class="member">
          <img src="http://kwcrc.com/storage/app/public/teams_attach/teams_{{$Team->id}}" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>{{$Team->tName}}</h4>
              <span>{{$Team->posetion}}</span>
              <div class="social">
                <a href="https://twitter.com/{{$Team->twitt}}"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com{{$Team->face}}"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/{{$Team->insta}}"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- #team -->

<!--==========================
Contact Section
============================-->
<section id="contact" class="section-bg wow fadeInUp">
  <div class="container">

    <div class="section-header">
      <h3>اتصل بنا</h3>
      <p>لمزيد من الاقتراحات والتواصل</p>
    </div>

    <div class="row contact-info">

      <div class="col-md-4">
        <div class="contact-address">
          <i class="ion-ios-location-outline"></i>
          <h3>العنوان</h3>
          <address>مقر جمعية المحامين, دولة الكويت</address>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-phone">
          <i class="ion-ios-telephone-outline"></i>
          <h3>للاتصال</h3>
          <p><a href="tel:+96590055511">+96590055511</a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="ion-ios-email-outline"></i>
          <h3>ايميل</h3>
          <p><a href="mailto:info@example.com">info@kwcrc.com</a></p>
        </div>
      </div>

    </div>

    <div class="form">
      <div id="sendmessage">Your message has been sent. Thank you!</div>
      <div id="errormessage"></div>
      <form action="savecontact" method="post" role="form" class="contactForm">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="الاسم" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
            <div class="validation"></div>
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="الإيميل" data-rule="email" data-msg="Please enter a valid email" />
            <div class="validation"></div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
          <div class="validation"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="الرسالة"></textarea>
          <div class="validation"></div>
        </div>
        <div class="text-center"><button type="submit">إرسال</button></div>
      </form>
    </div>

  </div>
</section><!-- #contact -->

</main>

@endsection
