@extends('layoutsite.app')
@section('customeCSS')

<style>
.nav-menu a{
  color:#FFFFFF;
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
            <h3> {{ $Featurs->title}} </h3>
            <p>{{ $Featurs->details}}</p>
            



            <br>
          </div>
        </section>


        @endsection
