

@foreach($Datas as $key => $Data)
@foreach($thDatas as $key => $options)
<?php $cloNamev=$options->tbName . $options->colName; ?>

@if(trim($options->editModeType)!='')

 
@if(trim($options->editModeType)=='text')
<div class="form-group">
	<label class="control-label">{{$options->titleEN}} </label>
	<div class="controls">
		<input type="text" value="{{$Data->$cloNamev}}"  class="form-control span3" @if($options->required) required @endif  name="{{trim($cloNamev)}}"/>
	</div>
</div>

@elseif(trim($options->editModeType)=='datepicker')

<div class="form-group">
	<label class="control-label">{{$options->titleEN}} </label>
	<div class="controls">
		<input type="text" value="{{$Data->$cloNamev}}" class="form-control span3 datepickerCTRL" @if($options->required) required @endif  name="{{trim($cloNamev)}}"/>
	</div>
</div>


@endif
@endif

@endforeach
@endforeach
