

// $(document).ready(function(e){
// 	$('div').each(function(){
// 		if ($(this).attr('datatableid')) {
// 			fechdatatableindiv($(this),1);
// 		}
// 	});
// });




$(document).on('click', '.pagination a', function(e) {
	e.preventDefault();

	// alert($(this).closest('div').parent().parent().parent().parent().attr('class'));
	var maindiv = $("[datatableid='"+ $(this).closest('div').attr('tableid') +"']");

	if ($(maindiv).attr('datatableid')) {
		var page=$(this).attr('href').split('page=')[1];
		var insearch=$(this).attr('href').split(/(?:insearch=|&)+/)[1];

		var searchvalue=$("[name='searchvalue']").attr('value');
		var relatedtable=$("[name='relatedtable']").attr('value');

		fechdatatableindiv(maindiv,page,insearch,searchvalue,relatedtable);

		// fechdatatableindiv($("[datatableid='2']"),1,0,$(this).attr('id'),'printings');
	}
});


$(document).on('focus',".date-picker", function(){
	$(this).datepicker({ dateFormat: 'yy-mm-dd' });
});


$(document).on('click', '.searchlink', function(e) {
	$('#' + $(this).attr('id') + 'searchmodal').modal('show');
});




$(document).on('click', '.addlink', function(e) {
	$('#' + $(this).attr('id') + 'addmodal').modal('show');
});

//------------




$(document).on('click', '.editrow', function(e) {
	$('.vovo').html('');
	$('#' + $(this).attr('table') + 'editmodal').modal('show');
	var table_id =$(this).closest('table').attr('tableid');
	var row_id = $(this).closest('tr').attr('id');
	$('#idformedit').val(row_id);
	//==================================
	$.ajax({
		type: "GET",
		url: 'geteditdata',
		data : {row_id:row_id,table_id:table_id},
		success: function (data) {

			$('.vovo').html(data);

		},
		error: function (msg) {alert('document_فقد الاتصال');}
	});
	//==================================

});









$(document).on('click', '.deleterow', function(e) {
	e.preventDefault();
	var tbid = $(this).closest('table').attr('tableid');
	var rowdelete= $(this).attr('id');
	var divdata_obj = $("[datatableid='"+ tbid +"']");

	var searchvalue=$("[name='searchvalue']").attr('value');
	var relatedtable=$("[name='relatedtable']").attr('value');

	if(confirm('هل تود بالفعل من حذف هذا الاجراء')==true){
		//==================================
		$.ajax({
			type: "post",
			url: 'deleterow',
			data : {'_token': $('meta[name="_token"]').attr('content'),table_id:tbid,rowid:rowdelete,searchvalue:searchvalue,relatedtable:relatedtable},

			beforeSend: function() {
				var el = $(".loadingDiv");
				el.css('display','block');
			},
			complete : function() {
				var el = $(".loadingDiv" );
				el.css('display','none');
			},

			success: function (data) {
				// let frag = document.createRange().createContextualFragment(data);
				divdata_obj.html(data);
			},
			error: function (msg) {alert('document_فقد الاتصال');}
		});
		//==================================
	}

});



//------ Main Add Form's ------
$(document).on('submit', 'form', function(e) {
	e.preventDefault();
	var url =$(this).attr('action');
	var post =$(this).attr('method');
	var state = $('#save_Detail').val();
	var divdata_obj = $("[datatableid='"+ $(this).attr('tableid') +"']");
	var model_obj =$(this).closest('div').parent().parent();
	//==================================
	$.ajax({
		type: post,
		url: url,
		data: new FormData($(this) [0]),
		beforeSend: function() {
			var el = $(".loadingDiv");
			el.css('display','block');
			model_obj.modal('hide');
		},
		complete : function() {
			var el = $(".loadingDiv" );
			el.css('display','none');
		},
		processData: false,
		contentType: false,
		success: function (data) {
			//fechdatatableindiv(divdata_obj,1)
			divdata_obj.html(data);
			// alert(data);
		},
		error: function (msg) {alert('submit_form_فقد الاتصال');}
	});
	//==================================
});





// //------ Main search Form's ------
// $(document).on('submit', '.mainsystemsearchform', function(e) {
// 	e.preventDefault();
// 	var url =$(this).attr('action');
// 	var post =$(this).attr('method');
// 	var data =$(this).serialize();
// 	var state = $('#save_Detail').val();
// 	var divdata_obj = $("[datatableid='"+ $(this).attr('tableid') +"']");
// 	var model_obj =$(this).closest('div').parent().parent();
// 		//==================================
// 		$.ajax({
// 			type: post,
// 			url: url,
// 			data: data,
// 			beforeSend: function() {
// 				var el = $(divdata_obj.find('table'));
// 				App.blockUI(el);
// 				model_obj.modal('hide');
// 			},
// 			complete : function() {
// 				var el = $(divdata_obj.find('table'));
// 				App.unblockUI(el);
// 			},
// 			success: function (data) {
// 				divdata_obj.html(data);
// 			},
// 			error: function (msg) {alert('document_فقد الاتصال');}
// 		});
// 		//==================================
// 	});














//--------------------------------------<<<****** Functions *****>>>-------------------------------------------------

function fechdatatableindiv(obj,tblpgnum,insearchv,searchvalue,relatedtable) {

	if ($(obj).attr('datatableid')) {

		var divdata_obj = $(obj);
		//==================================
		$.ajax({
			type: "post",
			url: 'gettbldata',
			data : {'_token': $('meta[name="_token"]').attr('content'),table_id:$(obj).attr('datatableid'),page:tblpgnum,insearch:insearchv,searchvalue:searchvalue,relatedtable:relatedtable},

			beforeSend: function() {
				var el = $(".loadingDiv");
				el.css('display','block');
			},
			complete : function() {
				var el = $(".loadingDiv" );
				el.css('display','none');
			},

			success: function (data) {
				divdata_obj.html(data);
			},
			error: function (msg) {alert('document_فقد الاتصال');}
		});
		//==================================
	}
};






 





function loaddatatable(argument) {
	$('table thead').each(function(){
		var table_obj = $(this).closest('table');
		var thead_obj  = $(this);
		var tbody_obj  = $(this).closest('table').find('tbody');

		var editable = table_obj.attr('editable');
		var deletable = table_obj.attr('deletable');

		var arr1 = [];

		$(this).children('tr').find('th').each(function(){
			if ($(this).attr('name')) {
				arr1.push($(this).attr('name'));
			}
		});

		if (arr1!='') {
			//==================================
			$.ajax({
				type: "GET",
				url: 'gettbldata',
				data : {table_id:$(table_obj).attr('id'),fld:arr1.toString(),isedit:editable,isdelet:deletable},
				success: function (data) {
					// let frag = document.createRange().createContextualFragment(data);
					tbody_obj.html(data);
				},
				error: function (msg) {alert('document_فقد الاتصال');}
			});
			//==================================
		}else {alert('الجدول بدون حقول مطلوبة');}

	});
};
