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
            <h3>  الأهداف</h3>
            <p>{{$Abouts[0]->targets}}</p>
            



            <br>
          </div>
        </section>


        @endsection
