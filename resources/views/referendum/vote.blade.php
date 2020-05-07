@extends('layoutsite.app')
@section('customeCSS')

<style>
.nav-menu a{
  color: #FFFFFF;
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
            <h3>تصويت على الاستطلاع </h3>
            <p>{{$Referendums->detail}}</p>

            <div class="form">
              <div id="sendmessage">تلقينا رسالتك نشكركم على تعاونكم معنا</div>
              <div id="errormessage"></div>
              <form action="/savevote" method="post" role="form" class="contactForm">
               {{ csrf_field() }}
 

               <div style="text-align: right; margin: 0 auto; width: 200px; padding-bottom: 20px">
                 @foreach($Referendums->refselections as $refselection)
                 <div class="form-check">


                   <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value=" {{$refselection->id}}" checked>
                   <label style="padding-right:   25px" class="form-check-label" for="exampleRadios1">
                     {{$refselection->selection}} 
                   </label>
                 </div>
                 @endforeach
               </div>




               <div class="text-center"><button type="submit">  تصويت</button></div>
             </form>
           </div>
<br>
         </div>
       </section>


       @endsection
