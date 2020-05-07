<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>لجنة حقوق الطفل | بجمعية المحامين الكويتية</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="لجنة حقوق الطفل  حقوق الطفل الكويتية  لجنة حقوق الطفل الحويتية الكويت حقوق الطفل">
  <meta content="" name="لجنة حقوق الطفل  جمعية المحامين الكويتية">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts --> 
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">-->

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
 @yield('customeCSS')
  
</head>

<body>


  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left"><img class="logoimg" src="{{ asset('img/logo5.png') }}" width="230px" alt="">
        
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/">الرئيسية</a></li>
          <li><a href="/#about">عن لجنتنا</a></li>
          <li><a href="/#services">خدماتنا</a></li>
           <li class="menu-has-children"><a href="">اخبارنا</a>
            <ul>
              <li><a href="{{ asset('/news') }}">الاخبار</a></li>
              <li><a href="{{ asset('/activats') }}">الفاعليات</a></li>
              <li><a href="{{ asset('/siminars') }}">الندوات</a></li>
            </ul>
          </li>
          <li><a href="/#portfolio">البوم الصور</a></li>
          <li><a href="/#team">اعضاء اللجنة</a></li>
         
          <li><a href="/#contact">تواصل معنا</a></li>
          <li><a href="home">الكنترول</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
<main id="main">



 @yield('content')

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3><img src="{{ asset('img/kwl2.png') }}" width="180px" /></h3>
            <p>جمعية المحامين الكويتية</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>روابط ذات صلة</h4>
            <ul>
              <li><i class="ion-ios-arrow-left"></i> <a href="/#intro">الرئيسية</a></li>
              <li><i class="ion-ios-arrow-left"></i> <a href="/#about">عن لجنتنا</a></li>
              <li><i class="ion-ios-arrow-left"></i> <a href="/#services">خدماتنا</a></li>
              <li><i class="ion-ios-arrow-left"></i> <a href="/#team">اعضاء الفريق</a></li>
             
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>اتصل بنا</h4>
            <p>
              لجنة حقوق الطفل <br>
              بجمعية المحامين الكويتية<br>
              دولة الكويت <br>
              <strong>موبايل:</strong> +96590055511<br>
              <strong>إيميل:</strong> info@kwcrc.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>قنوات التواصل </h4>
            <p>يمكنك ايضاً الاشتراك فى القائمة البريدة ليصلك كل ما هو جديد عن لجنتنا لتكون على تواصل دائم معنا</p>
            <form action="emaillist" method="post">
               {{ csrf_field() }}
              <input type="email" name="email"><input type="submit"  value="اشتراك">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; اصدار 2018  <strong>لجنة حقوق الطفل بجمعية المحامين الكويتية</strong>. جميع الحقوق محفوظة 
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        تصميم <a href="http://talsystem.com/">المرشد للحلول الذكية</a> قسم المواقع
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('lib/touchSwipe/jquery.touchSwipe.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>

