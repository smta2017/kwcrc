@if($thDatas->count()>0)



  <h1 style="margin-top: -10px ">{{$thDatas[0]->Systemtable->titleEN}}</h1>
  <hr>


  





  <div  class="modal fade editmodal" id="{{$thDatas[0]->Systemtable->tbName}}editmodal"  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button">×</button>
          <h3>تعديل - ({{$thDatas[0]->Systemtable->titleEN}})</h3>
        </div>
        <form method="post" action="saveeditdata" class="form-horizontal" tableid="{{$thDatas[0]->Systemtable->id}}">
          <div class="modal-body">
           {{ csrf_field() }}


           <input type="hidden" value="{{$thDatas[0]->Systemtable->id}}" name="table_id">
           <input type="hidden" id="idformedit" value="" name="row_id"/>
           <input type="hidden" value="0" name="isSearch">
           <input type="hidden" value="{{$relatedtable}}" name="relatedtable">
           <input type="hidden" value="{{$searchvalue}}" name="searchvalue">

           <div class="vovo" style="padding: 20px">

           </div>

           <div class="modal-footer">

            <button type="submit" style="float: right;" class="btn btn-primary"> <i class="icon-save"></i> Save</button>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>






<div class="modal fade addmodal" id="{{$thDatas[0]->Systemtable->tbName}}addmodal">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button"></button>
      <h3>الإضافة - ({{$thDatas[0]->Systemtable->titleEN}})</h3>
    </div>


    <form   action="savetbldata"  method="post" class="form-horizontal form-bordered form-label-stripped"   enctype="multipart/form-data"  tableid="{{$thDatas[0]->Systemtable->id}}">
      <div class="modal-body">
        {{ csrf_field() }}

        <input type="hidden" value="{{$thDatas[0]->Systemtable->id}}" name="table_id">
        <input type="hidden" value="{{$relatedtable}}" name="relatedtable">
        <input type="hidden" value="{{$searchvalue}}" name="searchvalue">


        @foreach($thDatas as $key => $options)
        <?php $cloNamev=$options->colName; ?>


        @if(trim($options->addModeType)!='')
        @if(trim($options->addModeType)=='text')

        <div class="control-group">
          <label class="control-label">{{$options->titleEN}} </label>
          <div class="controls">
            <input  type="text" class="{{$options->CustomClass}}  form-control " @if($options->required) required @endif  name="{{trim($cloNamev)}}"/>
          </div>
        </div>


        @elseif(trim($options->addModeType)=='dropdown')
        <div class="control-group">
          <label class="control-label">{{$options->titleEN}} </label>
          <div class="controls">
            @if($options->tableDataSource)


            {{ Form::select(explode('@', $options->tableDataSource)[0] . '_id',
            array(''=>'اختر ...') + DB::table(explode('@', $options->tableDataSource)[0].'s')->pluck(explode('@', $options->tableDataSource)[1], 'id')->toArray(), 'null', array($options->required) +array('class' => 'form-control  required search_' . $options->CustomClass,'id' => explode('@', $options->tableDataSource)[0] . '_id', $options->required)) }}
            @endif

          </div>
        </div>
        @elseif(trim($options->addModeType)=='checkbox')

        <div class="control-group">
          <label class="control-label">{{$options->titleEN}} </label>
          <div class="controls">
            <input type="checkbox" class="{{$options->CustomClass}} "  name="{{trim($cloNamev)}}"/>

          </div>
        </div>

        @elseif(trim($options->addModeType)=='file')

        <div class="control-group">
          <label class="control-label">{{$options->titleEN}} </label>
          <div class="controls">
            <input type="file" class="{{$options->CustomClass}} form-control "  name="{{trim($cloNamev)}}" @if($options->required) required @endif />

          </div>
        </div>
        @elseif(trim($options->addModeType)=='date')

        <div class="control-group">
          <label class="control-label">{{$options->titleEN}} </label>
          <div class="controls">
           <input class="{{$options->CustomClass}} m-wrap date-picker form-control " placeholder="التاريخ" name="{{trim($cloNamev)}}"   @if($options->required) required @endif/>
         </div>
       </div>

       @elseif(trim($options->addModeType)=='CURRENT_USERLOGIN')

       <input type="hidden" value="{{Auth::user()->id}}" name="{{trim($cloNamev)}}">

       @endif
       @endif

       @endforeach





     </div>
     <div class="modal-footer">

      <button type="submit" style="float: left; margin-left: 50px;" class="btn yellow"> <i class="icon-save"></i> حفظ</button>

    </div>
  </form>
</div></div>

</div>








<div  class="modal fade" id="{{$thDatas[0]->Systemtable->tbName}}searchmodal">

 <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
     <button data-dismiss="modal" class="close" type="button"></button>
     <h3>البحث - ({{$thDatas[0]->Systemtable->titleEN}})</h3>
   </div>

   <form action="gettbldata"  method="post" class="form-horizontal form-bordered form-label-stripped" tableid="{{$thDatas[0]->Systemtable->id}}">
     <div class="modal-body">
      {{ csrf_field() }}

      <input type="hidden" value="{{$thDatas[0]->Systemtable->id}}" name="table_id">
      <input type="hidden" value="1" name="isSearch">

      <input type="hidden" value="{{$relatedtable}}" name="relatedtable">
      <input type="hidden" value="{{$searchvalue}}" name="searchvalue">

      @foreach($thDatas as $key => $options)
      <?php $cloNamev=$options->colName; ?>


      @if(trim($options->searchModeType)!='')
      @if(trim($options->searchModeType)=='text')

      <div class="control-group">
        <label class="control-label">{{$options->titleEN}} </label>
        <div class="controls">
         <input type="text" class="form-control "  name="{{trim($cloNamev)}}"/>
       </div>
     </div>


     @elseif(trim($options->searchModeType)=='dropdown')
     <div class="control-group">
      <label class="control-label">{{$options->titleEN}} </label>
      <div class="controls">
       @if($options->tableDataSource)


       {{ Form::select(explode('@', $options->tableDataSource)[0] . '_id',
       array(''=>'اختر ...') + DB::table(explode('@', $options->tableDataSource)[0].'s')->pluck(explode('@', $options->tableDataSource)[1], 'id')->toArray(), 'null', array('class' => 'form-control  required search_' . $options->CustomClass,'id' => explode('@', $options->tableDataSource)[0] . '_id')) }}
       @endif

     </div>
   </div>
   @elseif(trim($options->searchModeType)=='checkbox')

   <div class="control-group">
    <label class="control-label">{{$options->titleEN}} </label>
    <div class="controls">
     <input type="checkbox"   name="{{trim($cloNamev)}}"/>

   </div>
 </div>

 @elseif(trim($options->searchModeType)=='date')

 <div class="control-group">
  <label class="control-label">{{$options->titleEN}} </label>
  <div class="controls">
   <input class=" date-picker form-control " placeholder="التاريخ" name="{{trim($cloNamev)}}"  @if($options->required) required @endif/>
 </div>
</div>
@endif
@endif

@endforeach





</div>
<div class="modal-footer">
  <button type="submit" style="float: left; margin-left: 50px;" class="btn green "  > <i class="icon-search"></i> بحث </button>
</div>
</form>
</div> </div>
</div>



















<div style="position: relative;">

  <div class="btn-group btn-group-sm" role="group" style="padding-bottom:  10px;float: right;">
    @if($thDatas[0]->Systemtable->search)
    <button type="button" class="btn btn-info searchlink" id="{{$thDatas[0]->Systemtable->tbName}}"> <i class="fa fa-search"></i> بحث</button>
    @endif
    @if($thDatas[0]->Systemtable->add)
    <button type="button" class="btn btn-success addlink" id="{{$thDatas[0]->Systemtable->tbName}}"> <i class="fa fa-plus"></i> إضافة</button>
    @endif
  </div>

  <div class="loadingDiv" style=" display:none;  width: 100%; height: 100%;position: absolute; opacity: 0.2;background: #000">


  </div>
  <div class="loadingDiv"  style="position: absolute; display:none;width: 100px;   width: 100%;  height: 100%; background: url(img/preloader.gif) no-repeat; background-position: center;">

  </div>


  <?php echo $alertnote;?>
  <div  class="portlet-body no-more-tables">

    <table id="users" editable="1" tableid="{{$thDatas[0]->Systemtable->id}}" class="{{$thDatas[0]->Systemtable->cssClass}}">
      <thead>
        <tr>
          @foreach($thDatas as $key => $thData)
          @if(!$thData->include)
          <th style="text-align: right;">{{ $thData->titleEN }}</th>
          @endif
          @endforeach

          @if($thDataextas->count()>0 || $thDataextas2->count()>0)
          <th @if(!$tdWidth=='') style="text-align: right;width: {{$tdWidth}};" @endif >تحكم</th>
          @endif
          @if($thDatas[0]->Systemtable->isedit || $thDatas[0]->Systemtable->isdelete)
          <th style="text-align: right; width:150px">تحكم</th>
          @endif
        </tr>
      </thead>
      <tbody>
       @if($Datas->count()!=0)
       @foreach($Datas as $key => $Data)
       <tr id="{{trim($Data->id)}}">
        @foreach($thDatas as $key => $options)
        <?php $cloNamev=$options->tbName . $options->colName; ?>
        @if(!$options->include)
        <td id="{{trim($options->colName)}}">
          @if(trim($options->isLink)!='')
          @if($options->tableDataSource)
          <?php $cloNamev=explode('@', $options->tableDataSource)[1];
          $cloNamevid = explode('@', $options->tableDataSource)[0].'s_id' ?>
          <span style="font-size:10px">{{trim($Data->$cloNamevid)}}   -</span>
          <a href="{{trim($options->isLink)}}" id="{{trim($Data->$cloNamevid)}}" class="{{trim($options->CustomClass)}}"  >       {{trim($Data->$cloNamev)}}</a>
          @else
          <a href="{{trim($options->isLink)}}" id="{{trim($Data->id)}}" class="{{trim($options->CustomClass)}}">  {{trim($Data->$cloNamev)}}</a>
          @endif
          @elseif(trim($options->displayModeType)=='checkbox')
          <input class="{{trim($options->CustomClass)}}"  type="checkbox"  @if (trim($Data->$cloNamev)==1) checked @endif   name"{{$options->colName}}">
          @elseif(trim($options->displayModeType)=='dropdown')
          {{$options->tableDataSource}}
          <select>
            <option>0</option>
          </select>
          @elseif(trim($options->displayModeType)=='file')

          <a id="{{$Data->id}}" href='http://kwcrc.com/storage/app/public/{{$thDatas[0]->Systemtable->tbName}}_{{$options->colName}}/{{$thDatas[0]->Systemtable->tbName}}_{{$Data->id}}'  target='_blank'>
           <img title="{{$Data->$cloNamev}}" height='100' width='120' src='
           @if(str_is('*.pdf',$Data->$cloNamev))
           pdf.png
           @elseif(str_is('*.docx',$Data->$cloNamev))
           docx.png
           @elseif(str_is('*.tgz',$Data->$cloNamev))
           winrar.jpg
           @elseif(str_is('*.rar',$Data->$cloNamev))
           winrar.png
           @elseif(str_is('*.zip',$Data->$cloNamev))
           winzip.png
           @elseif(str_is('*.txt',$Data->$cloNamev))
           Notepad.png
           @elseif(str_is('*.png',$Data->$cloNamev) || str_is('*.jpeg',$Data->$cloNamev) || str_is('*.GIF',$Data->$cloNamev) || str_is('*.PNG',$Data->$cloNamev) ||  str_is('*.JPEG',$Data->$cloNamev)|| str_is('*.JPG',$Data->$cloNamev) ||str_is('*.jpg',$Data->$cloNamev))

           http://kwcrc.com/storage/app/public/{{$thDatas[0]->Systemtable->tbName}}_{{$options->colName}}/{{$thDatas[0]->Systemtable->tbName}}_{{$Data->id}}

           @elseif(str_is('*.rtf',$Data->$cloNamev))
           docx.png
           @elseif(str_is('*.xlsx',$Data->$cloNamev))
           excel.png
           @else
           emptyfile.png

           @endif
           ' alt='مشاهدة' >
         </a>
         @elseif(trim($options->displayModeType)=='textbox')
         <input  class="{{trim($options->CustomClass)}}" type="text" name="{{trim($Data->$cloNamev)}}">
         @else
         @if($options->tableDataSource)
         <?php $cloNamev=explode('@', $options->tableDataSource)[1];
         $cloNamevid = explode('@', $options->tableDataSource)[0].'s_id' ?>
         <span style="font-size:1px">{{trim($Data->$cloNamevid)}}   -</span>
         <span  class="{{trim($options->CustomClass)}}"> {{trim($Data->$cloNamev)}} </span>
         @else
         <span  class=""> {{trim($Data->$cloNamev)}} </span>

         @endif
         @endif


         @foreach($includedColum as $key => $value)
         <?php $cloNamev3=$value->tbName . $value->include;  $colNamevd=$value->tbName . $value->colName;?>
         @if( $options->id==$cloNamev3)
         <br>
         @if(trim($value->isLink)!='')
         @if($value->tableDataSource)
         <?php $colNamevd=explode('@', $value->tableDataSource)[1];
         $cloNamevid = explode('@', $value->tableDataSource)[0].'s_id' ?>
         <span style="font-size:1px">{{trim($Data->$cloNamevid)}}   -</span>
         <a href="{{trim($value->isLink)}}" id="{{trim($Data->$cloNamevid)}}" class="{{trim($value->CustomClass)}}"> {{trim($Data->$colNamevd)}}</a>
         @else
         <a href="{{trim($value->isLink)}}" id="{{trim($Data->id)}}" class="{{trim($value->CustomClass)}}">    {{trim($Data->$colNamevd)}}</a>
         @endif
         @elseif(trim($value->displayModeType)=='checkbox')
         <input  class="{{trim($value->CustomClass)}}" class="{{trim($options->CustomClass)}}" type="checkbox"   @if (            trim($Data->$colNamevd)==1) checked @endif  name"{{$value->colName}}">
         @elseif(trim($value->displayModeType)=='dropdown')
         {{$value->tableDataSource}}
         <select>
          <option>0</option>
        </select>
        @elseif(trim($value->displayModeType)=='textbox')
        <input  class="{{trim($value->CustomClass)}}" type="text" name="{{trim($Data->$colNamevd)}}">
        @else
        @if($value->tableDataSource)
        <?php $colNamevd=explode('@', $value->tableDataSource)[1];
        $cloNamevid = explode('@', $value->tableDataSource)[0].'s_id' ?>
        <span style="font-size:1px">{{trim($Data->$cloNamevid)}}   -</span>
        <span  class="{{trim($value->CustomClass)}}"> {{trim($Data->$colNamevd)}}</span>
        @else
        <span  class="{{trim($value->CustomClass)}}">  {{trim($Data->$colNamevd)}}</span>
        @endif
        @endif
        @endif
        @endforeach
      </td>
      @endif

      @endforeach

      @if($thDatas[0]->Systemtable->isedit || $thDatas[0]->Systemtable->isdelete)
      <td>

        @if($thDatas[0]->Systemtable->isedit)
        <a href="#" id="{{trim($Data->id)}}" table="{{$thDatas[0]->Systemtable->tbName}}"   class="{{$thDatas[0]->Systemtable->isedit}}  editrow">تعديل</a>
        @endif

        @if($thDatas[0]->Systemtable->isdelete)
        <a href="#" id="{{trim($Data->id)}}" table="{{$thDatas[0]->Systemtable->tbName}}"  class="{{$thDatas[0]->Systemtable->isdelete}}  deleterow">حذف</a>
        @endif
      </td>

      @endif





      @if($thDataextas->count()>0 || $thDataextas2->count()>0)
      <td >

       @if($thDataextas2->count()>0)
       @foreach($thDataextas2 as $key => $Ctrloptions2)
       <a href="#" id="{{$Data->id}}" class="{{$Ctrloptions2->btnclass}}" >{{$Ctrloptions2->titleEN}}</a>
       @endforeach
       @endif
       @if($thDataextas->count()>0)
       <div class="btn-group">
        <button data-toggle="dropdown" class="btn btn-xs  dropdown-toggle" style="margin-left: 15px" >تحكم <span class="caret"></span></button>
        <ul class="dropdown-menu">
         @foreach($thDataextas as $key => $Ctrloptions)
         <li><a href="#" id="{{$Data->id}}" class="{{$Ctrloptions->btnclass}}" >{{$Ctrloptions->titleEN}}</a></li>
         @endforeach
       </ul>
     </div>
     @endif
   </td>
   @endif
 </tr>


 @endforeach
 @else
 <tr><td><b> لا توجد بيانات..!</b></td></tr>
 @endif
</tbody>
</table>

<div class="pagination alternate" tableid="{{$thDatas[0]->Systemtable->id}}"  style="margin: 0px 0;">
 {{  $Datas->appends(['insearch' => $insearch])->links()  }}
</div>


</div>







@endif
