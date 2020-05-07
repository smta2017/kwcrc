@extends('layoutsite.app')
@section('customeCSS')

<style>
      .nav-menu a{
            color: green;
      }
</style>
@endsection

@section('content')


    <!--==========================
      contact Us Section
      ============================-->
      <section id="contact" class="section-bg wow fadeInUp"  style="padding: 150px 0 150px 0">
        <div class="container">

          <div class="section-header" >
            <h3>تسجيل اشتراك</h3>
            <p>{{$title}}</p>


          <div class="form">
            <div id="sendmessage">تلقينا رسالتك نشكركم على تعاونكم معنا</div>
            <div id="errormessage"></div>
            <form action="{{ url('savesiminarsub') }}" method="post" role="form" class="contactForm">
                   {{ csrf_field() }}

                   <input type="hidden" name="siminar_id" value="{{$id}}">
                   <input type="hidden" name="siminar_typ" value="{{$typ}}">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="اسم العضو" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="mobile" placeholder="الايميل" data-rule="email" data-msg="Please enter a valid mobile" />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-4">
                  <input type="mobile" class="form-control" name="mobile" id="mobile" placeholder="جوال التواصل" data-rule="mobile" data-msg="Please enter a valid mobile" />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-8">
                  <input type="notes" class="form-control" name="note" id="note" placeholder="ملاحظات" data-rule="mobile" data-msg="Please enter a valid mobile" />
                  <div class="validation"></div>
                </div>
              </div>


              <div class="text-center"><button type="submit">اشترك</button></div>
            </form>
          </div>

        </div>
      </section>


      @endsection
