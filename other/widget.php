// custom/include/generic/SugarWidgets/SugarWidgetSL_SubPanelTopButtonQuickCreate.php
<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class SugarWidgetSL_SubPanelTopButtonQuickCreate extends SugarWidgetSubPanelTopButtonQuickCreate
{


	function &_get_form($defines, $additionalFormFields = null)
	{
		//<sl_change author="Demydenko" date="2015-01-20" desc="создние платежного требования":>
		//Получаем дополнительные поля для формы
		foreach($defines['additional_form_fields'] as $key=>$value)
		{
			if(!empty($defines['focus']->$value))
			{
				$additionalFormFields[$key] = $defines['focus']->$value;
			}
			else
			{
				$additionalFormFields[$key] = '';
			}
		}
		//</sl_change>
		return parent::_get_form($defines,$additionalFormFields);
	}
	
	
	function SugarWidgetSL_SubPanelTopButtonQuickCreate(){
		$GLOBALS['log']->error(print_r(__CLASS__.'::'.__FUNCTION__, 1));
		//<sl_change author="Demydenko" date="2015-01-20" desc="создние платежного требования":>
		//Заполняем данными по умолчанию
		$module='';
		$title='LBL_NEW_BUTTON_TITLE';
		$access_key='LBL_NEW_BUTTON_KEY';
		$form_value='LBL_NEW_BUTTON_LABEL';
		parent::SugarWidgetSubPanelTopButton($module,$title,$access_key,$form_value);
		//</sl_change>
	}
	
	
	function display($defines, $additionalFormFields = null, $nonbutton = false)
	{
		$temp='';
		$inputID = $this->getWidgetId();

		if(!empty($this->acl) && ACLController::moduleSupportsACL($defines['module'])  &&  !ACLController::checkAccess($defines['module'], $this->acl, true)){
			return $temp;
		}

		global $app_strings,$mod_strings;
		//<sl_change author="Demydenko" date="2015-01-20" desc="создние платежного требования":>
		//Проверяем метаданные виджета на наличие следующих данных
		if(!empty($defines['title'])){
			if(!empty($mod_strings[$defines['title']])){
				$this->title=$mod_strings[$defines['title']];
			}else{
				$this->title=$app_strings[$defines['title']];
			}
		}
		if(!empty($defines['access_key'])){
			if(!empty($mod_strings[$defines['access_key']])){
				$this->access_key=$mod_strings[$defines['access_key']];
			}else{
				$this->access_key=$app_strings[$defines['access_key']];
			}
		}
		if(!empty($defines['form_value'])){
			if(!empty($mod_strings[$defines['form_value']])){
				$this->form_value=$mod_strings[$defines['form_value']];
			}else{
				$this->form_value=$app_strings[$defines['form_value']];
			}
		}
		//</sl_change>
		if ( isset($_REQUEST['layout_def_key']) && $_REQUEST['layout_def_key'] == 'UserEAPM' ) {
			// Subpanels generally don't go on the editview, so we have to handle this special
			$megaLink = $this->_get_form($defines, $additionalFormFields,true);
			$button = "<input title='$this->title' accesskey='$this->access_key' class='button' type='submit' name='$inputID' id='$inputID' value='$this->form_value' onclick='javascript:document.location=\"index.php?".$megaLink."\"; return false;'/>";
		} else {
			$button = $this->_get_form($defines, $additionalFormFields);
			//<sl_change author="Demydenko" date="2015-01-20" desc="можно создавать свою кнопку">
			if(isset($defines['customCode']) && $defines['customCode']!=''){
				$button .= $defines['customCode'];
				//заменяем label, сделано так что бы не нарушать общий стандарт формирования кнопок
				// в большенстве случаев описание кнопки следующее
				//'<input title="{$APP.LBL_CREATE_BUTTON_LABEL}" accessKey="{$APP.LBL_CREATE_BUTTON_KEY}" class="button" type="button" name="sl_create_fin_payment_request_button" id="sl_create_fin_payment_request_button" value="{$APP.LBL_CREATE_BUTTON_LABEL}" onclick="sl_sendAndRetrieve(this)">'
				$button = preg_replace_callback('/{(\$APP|\$MOD)\.\w+}/',
					function ($matches){
						global $app_strings,$mod_strings;
						$str = mb_substr($matches[0],6);
						$str = mb_substr($str,0,strlen($str)-1);
						$str = (!empty($mod_strings[$str]))? $mod_strings[$str] : $app_strings[$str];
						return $str;
					},$button);

			}else{
				$button .= "<input title='$this->title' accesskey='$this->access_key' class='button' type='submit' name='$inputID' id='$inputID' value='$this->form_value' />\n</form>";
			}
			//</sl_change>

		}

		if ($nonbutton) {
			$button = "<a onclick=''>$this->form_value";
		}

		return $button;
	}





}




?>
