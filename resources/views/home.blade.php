@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <label>مسميات الالون</label>
      <button type="button" class="btn btn-primary">Primary</button>
      <button type="button" class="btn btn-secondary">Secondary</button>
      <button type="button" class="btn btn-success">Success</button>
      <button type="button" class="btn btn-danger">Danger</button>
      <button type="button" class="btn btn-warning">Warning</button>
      <button type="button" class="btn btn-info">Info</button>

    </div> </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">القائمة</div>

          <div class="panel-body">
            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif





            <a href="/crudnews" class="btn btn-primary btn-block mainmenue">الاخبار</a>
            <a href="/crudfeatur" class="btn btn-primary btn-block mainmenue">الخواص</a>
            <a href="/crudabout" class="btn btn-primary btn-block mainmenue">عن اللجنة</a>
            <a href="/crudservice" class="btn btn-primary btn-block mainmenue">الخدمات</a>
            <a href="/crudsiminar" class="btn btn-primary btn-block mainmenue">الندوات</a>
            <a href="/crudactivat" class="btn btn-primary btn-block mainmenue">الفاعليات</a>
            <a href="/crudlegislation" class="btn btn-primary btn-block mainmenue">التشريعات</a>
            <a href="/crudportfoliocat" class="btn btn-primary btn-block mainmenue">تصنيف البوم الصور</a>
            <a href="/crudportfolio" class="btn btn-primary btn-block mainmenue">البوم الصور</a>
            <a href="/crudteam" class="btn btn-primary btn-block mainmenue">الاعضاء</a>
            <a href="/crudcomplane" class="btn btn-primary btn-block mainmenue">الشكاوى</a>
            <a href="/crudcontact" class="btn btn-primary btn-block mainmenue">رسائل التواصل</a>
            <a href="/crudssub" class="btn btn-primary btn-block mainmenue">مشتركي الندوات/a>
            <a href="/crudssub" class="btn btn-primary btn-block mainmenue">مشتركي الفاعليات</a>
            <a href="/crudreferendum" class="btn btn-primary btn-block mainmenue">الاستطلاعات</a>
            <a href="/crudmailbord" class="btn btn-primary btn-block mainmenue">القائمة البريدية</a>

            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
