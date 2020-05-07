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
      contact Us Section
      ============================-->
      <section id="contact" class="section-bg wow fadeInUp"  style="padding: 150px 0 0 0">
        <div class="container">

          <div class="section-header" >
            <h3> شكاوى الطفل</h3>
            <p>القسم مخصص لشكاوى حقوق الطفل</p>
    

          <div class="form">
            <div id="sendmessage">تلقينا رسالتك نشكركم على تعاونكم معنا</div>
            <div id="errormessage"></div>
            <form action="savecomplane" method="post" role="form" class="contactForm">
                   {{ csrf_field() }}

              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="مقدم الشكوى" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                  <input type="mobile" class="form-control" name="mobile" id="mobile" placeholder="جوال التواصل" data-rule="mobile" data-msg="Please enter a valid mobile" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع الشكوى" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="رسالة الشكوى"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">تقديم الشكوى</button></div>
            </form>
          </div>
 
        </div>
      </section>

<br><br>
      @endsection
