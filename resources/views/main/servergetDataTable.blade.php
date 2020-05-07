  @if($thDatas->count()>0)


  @include('main.popdetailofmaster')




  <div class="widget-content nopadding">
  	<table id="users" editable="1" deletable="1" class="{{$thDatas[0]->Systemtable->cssClass}}">
  		<thead>
  			<tr>
  				@foreach($thDatas as $key => $thData)
          @if(!$thData->include)
          <th style="text-align: right;">{{ $thData->titleEN }}</th>
          @endif
          @endforeach

          @if($thDataextas->count()>0 || $thDataextas2->count()>0)
          <th style="text-align: right;width: {{$tdWidth}};">تحكم</th>
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
          <?php $cloNamev=explode('_', $options->tableDataSource)[1];
          $cloNamevid = explode('_', $options->tableDataSource)[0].'s_id' ?>
          <span style="font-size:10px">{{trim($Data->$cloNamevid)}}   -</span>  
          <a href="{{trim($options->isLink)}}" id="{{trim($Data->$cloNamevid)}}" class="{{trim($options->CustomClass)}}">{{trim($Data->$cloNamev)}}</a>
          @else
          <a href="{{trim($options->isLink)}}" id="{{trim($Data->id)}}" class="{{trim($options->CustomClass)}}">{{trim($Data->$cloNamev)}}</a>

          @endif






          @elseif(trim($options->displayModeType)=='checkbox')
          <input class="{{trim($options->CustomClass)}}"  type="checkbox"  @if (trim($Data->$cloNamev)==1) checked @endif  name"{{$options->colName}}">

          @elseif(trim($options->displayModeType)=='dropdown')
          {{$options->tableDataSource}}
          <select>
            <option>0</option>
          </select>
          
          @elseif(trim($options->displayModeType)=='textbox')
          <input  class="{{trim($options->CustomClass)}}" type="text" name="{{trim($Data->$cloNamev)}}">
          
          @else
          
          
          @if($options->tableDataSource)
          <?php $cloNamev=explode('_', $options->tableDataSource)[1];
          $cloNamevid = explode('_', $options->tableDataSource)[0].'s_id' ?>
          <span style="font-size:1px">{{trim($Data->$cloNamevid)}}   -</span>  {{trim($Data->$cloNamev)}}
          @else
          {{trim($Data->$cloNamev)}}

          @endif
          
          @endif




          @foreach($includedColum as $key => $value)
          <?php $cloNamev3=$value->tbName . $value->include;  $colNamevd=$value->tbName . $value->colName;?>
          @if( $options->id==$cloNamev3)

          <br>

          @if(trim($value->isLink)!='')

          @if($value->tableDataSource)
          <?php $colNamevd=explode('_', $value->tableDataSource)[1];
          $cloNamevid = explode('_', $value->tableDataSource)[0].'s_id' ?>
          <span style="font-size:1px">{{trim($Data->$cloNamevid)}}   -</span>   
          <a href="{{trim($value->isLink)}}" id="{{trim($Data->$cloNamevid)}}" class="{{trim($value->CustomClass)}}"> {{trim($Data->$colNamevd)}}</a>
          @else
          <a href="{{trim($value->isLink)}}" id="{{trim($Data->id)}}" class="{{trim($value->CustomClass)}}">  {{trim($Data->$colNamevd)}}</a>

          @endif

          @elseif(trim($value->displayModeType)=='checkbox')
          <input  class="{{trim($value->CustomClass)}}" class="{{trim($options->CustomClass)}}" type="checkbox"  @if (trim($Data->$colNamevd)==1) checked @endif  name"{{$value->colName}}">

          @elseif(trim($value->displayModeType)=='dropdown')
          {{$value->tableDataSource}}
          <select>
            <option>0</option>
          </select>
          
          @elseif(trim($value->displayModeType)=='textbox')
          <input  class="{{trim($value->CustomClass)}}" type="text" name="{{trim($Data->$colNamevd)}}">
          
          @else
          
          
          @if($value->tableDataSource)
          <?php $colNamevd=explode('_', $value->tableDataSource)[1];
          $cloNamevid = explode('_', $value->tableDataSource)[0].'s_id' ?>
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

        @if($thDataextas->count()>0 || $thDataextas2->count()>0)
        <td >


         @if($thDataextas2->count()>0)
         @foreach($thDataextas2 as $key => $Ctrloptions2)
         <a href="#" id="{{$Data->id}}" class="{{$Ctrloptions2->btnclass}}" >{{$Ctrloptions2->titleEN}}</a>
         @endforeach
         @endif



         @if($thDataextas->count()>0)
         <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-sm  dropdown-toggle" style="margin-left: 15px" >تحكم <span class="caret"></span></button>
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
   <tr><td><b> No result found..!</b></td></tr>

   @endif
 </tbody>
</table>
 
  {{  $Datas->appends(['table_id' => 1])->links()  }}
 
</div>

@endif