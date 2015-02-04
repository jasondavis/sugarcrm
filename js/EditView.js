jQuery(document).ready(function () {
	$('#px_account_level').change(function () {
		if (this.value == "Дочерняя структура" || this.value == "Технический контрагент") {
			addToValidate('EditView', 'parent_name', 'relate', true, SUGAR.language.translate('Accounts', 'LBL_PX_PARENT_ACCOUNT_NAME'));
			$('#parent_name_label').html(SUGAR.language.translate('Accounts', 'LBL_PX_PARENT_ACCOUNT_NAME') + '<span style="color:red">*</span>');
		} else {
			removeFromValidate('EditView', 'parent_name');
			$('#parent_name_label').html(SUGAR.language.translate('Accounts', 'LBL_PX_PARENT_ACCOUNT_NAME'));
		}
	});
});

//контроль удаления записи
function px_check_delete() {
	var record = get_record_id();
	var request = $.ajax({
		url: "index.php?module=PX_AddressDirectory&action=CheckDelete&to_pdf=1",
		type: "POST",
		data: {record: record},
		dataType: "json"
	});

	request.done(function (data) {
		if (data.status == 'fail') {
			alert(data.message);
		}
		if (data.status == 'success') {
			var _form = document.getElementById('formDetailView');
			_form.return_module.value = 'PX_AddressDirectory';
			_form.return_action.value = 'ListView';
			_form.action.value = 'Delete';
			if (confirm(SUGAR.language.translate('PX_AddressDirectory', 'NTC_DELETE_CONFIRMATION')))
				SUGAR.ajaxUI.submitForm(_form);
		}
	});
}


//формат даты
$(document).ready(function(){
	$('#is_actual').on('change',function(){
		if ($('#is_actual').attr('checked') == 'checked') {
			var date_now = new Date();
			var curr_date = ((date_now.getDate()).toString().length == 2) ? ('' + (date_now.getDate()).toString()) : ('0' + (date_now.getDate()).toString());
			var curr_month = ((date_now.getMonth() + 1).toString().length == 2) ? ('' + (date_now.getMonth() + 1).toString()) : ('0' + (date_now.getMonth() + 1).toString());
			var curr_year = date_now.getFullYear();

			var date_to_format = cal_date_format;
			date_to_format = date_to_format.replace("%d", curr_date);
			date_to_format = date_to_format.replace("%m", curr_month);
			date_to_format = date_to_format.replace("%Y", curr_year);

			$('#actual_date').val(date_to_format);
		} else {
			$('#actual_date').val('');
		}
	});
});


//изменить елемент после загрузки
YAHOO.util.Event.onAvailable('create-invitees-buttons', function(){
	YAHOO.util.Dom.setStyle("create-invitees", "display", "none");
});



px_trigger = jQuery('#px_trigger');
TRIGGER_DESCRIPTION = SUGAR.language.get('Accounts','LBL_PX_TRIGGER_DESCRIPTION');
trigger_info_dialog = jQuery('<div class="open"></div>')
	.html(TRIGGER_DESCRIPTION)
	.dialog({
		autoOpen: false,
		title: 'Trigger',
		width: 600,
		position: {
			my: 'right top',
			at: 'right bottom',
			of: px_trigger
		}
	});
px_trigger.change(function(){
	trigger_info_dialog.dialog("close");
});






$(document).ready(function () {
	$('#visibility').change(function (e) {
		if(e.target.value!='Недоступно')return;
		$('#SAVE_HEADER').attr('disabled', 'disabled');
		$.ajax({
			type: "POST",
			url: "index.php",
			data: {
				record: document.forms.EditView.record.value,
				module: "PX_DiscountTypes",
				action: "checkUsage",
				to_pdf: 1
			},
			dataType: "json",
			success: function (content) {
				//если не используется то диалог не показываем
				if (content.status == 'not usage') {
					$('#SAVE_HEADER').removeAttribute('disabled');
					return;
				}
				$('<div>' + content.msg + '</div>').dialog({
					modal: true,
					closeOnEscape: false,
					//скрыть крестик "закрыть окно"
					open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
					close: function (event, ui) {
						$('#SAVE_HEADER').removeAttr('disabled');
					},
					title: SUGAR.language.translate('PX_DiscountTypes', 'LBL_VISIBILITY'),
					content: content,
					buttons: [
						{
							text: "Ok",
							click: function () {
								$(this).dialog("close");
								$(this).remove();
							}
						},
						{
							text: "Отмена",
							click: function () {
								$('#visibility').val('Доступно');
								$(this).dialog("close");
								$(this).remove();
							}
						}
					]

				});
			}
		});
	});
});


var date_reg_format = '([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})';
var re = new RegExp(date_reg_format);
var result = re.exec("11/08/2014");
console.log(result);


$('#px_status_study').change(
	function () {
		if (this.value == 'Распределение') {
			$("#px_review_reason").find("option[value='Отказ по решению РДП']").prop('disabled', '');
		} else {
			$("#px_review_reason").val('').find("option[value='Отказ по решению РДП']").prop('disabled', 'disabled');
		}
	});



var url = "index.php?" + SUGAR.utils.paramsToUrl({
	module : "ExpressionEngine",
	action : "validateRelatedField",
	tmodule : ModuleBuilder.module,
	package : ModuleBuilder.MBpackage,
	link : t.args[0].name,
	related : t.args[1].value
});
var resp = http_fetch_sync(url);
var data = YAHOO.lang.JSON.parse(resp.responseText);




$("<div>" + SUGAR.language.translate('PX_PriceLists', 'NTC_PX_DELETE_CONFIRMATION') + "</div>").dialog({
					hide: 'fade', show: 'fade', width: 450, height: 'auto', resizable: false, modal: true,
					buttons: {
						"Подтвердить": function () {
							$(this).dialog("close");
							//не удаляем а переводим в архив
							px_delete_record('DetailView');
						},
						"Отменить": function () {
							$(this).dialog("close");
						}
					}
				});	

var msg = $("<div>" + "" + "</div>").dialog({
		hide: 'fade', show: 'fade', width: 450, height: 'auto', resizable: false, modal: true,
		buttons: { "Ok": function(){$(this).dialog("close");} }
	});




	$.ajax({
		type: "POST",
		url: "index.php",
		async:false,
		data: {
			record: record,
			module: "Accounts",
			action: "px_checkLimits",
			px_receivables_sum_limit:$('#px_receivables_sum_limit').val(),
			px_receivables_term_limit:$('#px_receivables_term_limit').val(),
			to_pdf: 1
		},
		dataType: "json",
		success: function (data) {
			if(data.error){
				if(data.receivables_sum_limit_label){
					add_error_style(form_name, 'px_receivables_sum_limit', SUGAR.language.translate('Accounts', data.receivables_sum_limit_label), true);
				}
				if(data.receivables_term_limit_label){
					add_error_style(form_name, 'px_receivables_term_limit', SUGAR.language.translate('Accounts', data.receivables_term_limit_label), true);
				}
				not_error=false;
			}
		}
	});





function checkAllowInformal(obj){

	$.ajax({
		type: "POST",
		url: "index.php",
		data: {
			record: document.DetailView.record.value,
			module: "Accounts",
			action: "px_checkAllowInformal",
			to_pdf: 1
		},
		dataType: "json",
		success: function (data) {
			if(data.result==false){
				
				$("<div>" + data.msg + "</div>").dialog({
					hide: 'fade', show: 'fade', width: 450, height: 'auto', resizable: false, modal: true,
					buttons: { "Ok": function(){$(this).dialog("close");} }
				});
			}else{
				
				obj.form.submit();
			}
		}
	});
}

//стандартная кнопка сохранить
function px_submitForm() {
	var _form = document.getElementById('EditView');
	_form.action.value = 'Save';
	if (check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);
	return false;
}


open_popup(
	"PX_AdditionalServicesDirectory",
	800,
	600,
	"",
	true,
	false,
	{
		"call_back_function": "PxAdditionalServicesQuickCreate.callbackEvent",
		"form_name": "",
		"field_to_name_array": {
			"name": "name",
			"id": "id"
		}
	},
	"MultiSelect",
	true,
	'popupdefs_pl'
);


//Для перенаправления браузера путём POST-запроса используем следующую функцию: 
function pxLocationAsPost(url, fields, inNewTab) {
	var $ = jQuery;
	fields = fields || {};
	inNewTab = !!inNewTab;
 
	var form = $("<form>");
	form.attr("action", url).attr("method", "post").attr("enctype", "multipart/form-data");
	if (inNewTab) {
		form.attr("target", "_blank");
	}
	$.each(fields, function(key) {
		form.append('<input type="text" name="' + key + '" value="' + this + '" />');
	});
	form.appendTo($('body')).submit().remove();
}



