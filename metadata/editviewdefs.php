<?php
$module_name = 'PX_AccountContacts';
$viewdefs[$module_name]['EditView'] = array(
	'templateMeta' => array(
		'maxColumns' => '2',
		'form' => array(
			'hidden' => array(

				'<input type="hidden" name="parent_name" id="parent_name" value="{$fields.parent_name.value}">',
				'<input type="hidden" name="parent_id" id="parent_id" value="{$fields.parent_id.value}">',
				'<input type="hidden" name="parent_type" id="parent_type" value="{$fields.parent_type.value}">',

				'<input type="hidden" name="parent_name" id="parent_name" value="{$smarty.request.return_name}">',
				'<input type="hidden" name="parent_id" id="parent_id" value="{$smarty.request.return_id}">',
				'<input type="hidden" name="parent_type" id="parent_type" value="{$smarty.request.return_module}">',



				'<input type="hidden" name="assigned_user_name" id="assigned_user_name" value="{$fields.assigned_user_name.value}">',
				'<input type="hidden" name="assigned_user_id" id="assigned_user_id" value="{$fields.assigned_user_id.value}">',
				'{if !empty($smarty.request.contact_name)}<input type="hidden" name="report_to_name" value="{$smarty.request.contact_name}">{/if}',
			),
			'buttons' => array(
//				array('customCode' => '<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" onclick="SUGAR.meetings.fill_invitees();this.form.action.value=\'Save\'; this.form.return_action.value=\'DetailView\'; {if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}this.form.return_id.value=\'\'; {/if}return check_form(\'EditView\');" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">',),
				'CANCEL',
				array('customCode' => '<input title="{$MOD.LBL_SEND_BUTTON_TITLE}" class="button" onclick="this.form.send_invites.value=\'1\';SUGAR.meetings.fill_invitees();this.form.action.value=\'Save\';this.form.return_action.value=\'EditView\';this.form.return_module.value=\'{$smarty.request.return_module}\';return check_form(\'EditView\');" type="submit" name="button" value="{$MOD.LBL_SEND_BUTTON_LABEL}">',
				),
				array('customCode' => '{if $fields.status.value != "Held"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" accessKey="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_KEY}" class="button" onclick="SUGAR.meetings.fill_invitees(); this.form.status.value=\'Held\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'Meetings\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; return check_form(\'EditView\');" type="submit" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
				),
			),
		),
		//убрать все кнопки
		/*'form' => array(
			'buttons' => array(
				0 => array(),
			),
		),*/


		'widths' => array(
			array(
				'label' => '10',
				'field' => '30',
			),
			array(
				'label' => '10',
				'field' => '30',
			),
		),
		'javascript' => '{sugar_getscript file="modules/PX_Orders/js/EditView.js"}',
		'useTabs' => false,
	),


	'panels' => array(
		'default' => array(

//fields
//несколько полей в одной строчке
			array(
				array(
					'name' => 'parent_type_name',
					'label' => 'LBL_PX_PARENT_TYPE',
					'fields' => array(
						'parent_type_name', 'parent_name'
					),
				),
			),
			
			'type' => 'PxRelate',
'displayParams' => array(
  'onOpenPopup' => 'JSCode',
  'call_back_function' => 'FuncName',  // Вызывается при закрытии попапа, получает 1 параметр (data) со всеми данными. Для имитации стандартного поведения может вызвать set_return(data)
  'initial_filter' => array (
    'field_name' => 'field_name_advanced',  // Название поля на текущей форме => Название поля на форме поиска (можно взять из html-кода формы)
  ),
  'field_to_name_array' => array(  // если указан onOpenPopup, этот параметр указывается в js
    "popupFieldName" => "formFieldName",  // popupFieldName должен быть среди колонок списка в попапе (см. Popup)
  ),
)
			
			
			
			array(
//добавить чекбокс
				array(
					'name' => 'is_primary_contact',
					'customCode' => '
					<input type="checkbox" class="checkbox" name="is_primary_contact" id="is_primary_contact" value="{$fields.is_primary_contact.value}" disabled="true"{if $fields.is_primary_contact.value==1}checked{/if}>',
				),
			),

// скрыть кнопки и сделать readOnly relate поле
			array(
				'type_customer' => array(
					'name' => 'type_customer',
					'displayParams' => array(
						'readOnly' => true,
						'hideButtons' => true,
					),
				)
			),
//EditView readonly для обычного базового поля
			array(
				'type_customer' => array(
					'name' => 'type_customer',
					'displayParams' => array(
						'field' => array(
							'readonly' => 'readonly',
						)
					)
				)
			),
//info_button
			array(
				'customCode' => '{html_options name="px_trigger" id="px_trigger" options=$fields.px_trigger.options selected=$fields.px_trigger.value}&nbsp;<img vertical-align="middle" onclick="trigger_info_dialog.dialog(\'open\');" class="info" border="0" alt="Additional Details" src="themes/Sugar/images/info_inline.png">',
			),

			array(
				array(
					'name' => 'date_entered',
					'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
					'label' => 'LBL_DATE_ENTERED',
				),
				array(
					'name' => 'date_modified',
					'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
					'label' => 'LBL_DATE_MODIFIED',
				),
			),
			array('assigned_user_name',),
			array('team_name',),
			array('description',),

		),
	),
);


//EditView readonly для обычного базового поля
array(
	'type_customer' => array(
		'name' => 'type_customer',
		'displayParams' => array(
			'field' => array(
				'readonly' => 'readonly',
			)
		)
	)
);


//field_to_name_array указывать обязательно для того что бы в callback ф-ции возвращался масив данных,
//additionalFields указывать для того что бы после выбора из popup подставились значения
//additionalFields не обязательно указывать в editviewdefs.php можно указать в vardefs.php тогда связанные поля будут
//автоматически подставлятся и на DetailView и на ListView
array(
	'contact_name' => array(
		'name' => 'contact_name',
		'displayParams' => array(
			//'initial_filter' => '&account_name_advanced={$fields.parent_name.value}',
			//сначала выбирается компания а потом контакт этой компании
			//в итоге получим стоку для передачи параметра initial_filter в ф-цию open_popup
			//"&account_name_advanced="+$("#parent_name").val()+""
			'initial_filter' => '&account_name_advanced=' . chr(34) . '+$("#parent_name").val()+' . chr(34),
			'field_to_name_array' => array(
				'id' => 'contact_id',
				'name' => 'contact_name',
				'phone_work' => 'phone_work_customer',
				'px_phone_work_2' => 'phone_work_customer2',
				'phone_fax' => 'phone_fax_customer',
				'px_phone_fax_2' => 'phone_fax_customer2',
			),
			'additionalFields' => array(
				'phone_work' => 'phone_work_customer',
				'px_phone_work_2' => 'phone_work_customer2',
				'phone_fax' => 'phone_fax_customer',
				'px_phone_fax_2' => 'phone_fax_customer2',
			),
		),
	),
);
