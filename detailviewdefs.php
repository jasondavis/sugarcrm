<?php

$module_name = 'PX_AddressDirectory';
$viewdefs[$module_name]['DetailView'] = array(
    'templateMeta' => array(
        'form' => array(
            'buttons' => array(
                'EDIT',
                'DUPLICATE',
                'DELETE',
                //override buttons
                array(
                    'customCode' => '<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="px_check_delete();" type="button" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" >'
                ),
                'FIND_DUPLICATES',
            )
        ),
        'maxColumns' => '2',
        'widths' => array(
            array(
                'label' => '10',
                'field' => '30'
            ),
            array(
                'label' => '10',
                'field' => '30'
            )
        ),
        //include js files
        'includes' => array(
            array('file' => 'modules/PX_Orders/js/DetailView.js'),
        ),
    ),

    'panels' => array(

        array('post_code', 'px_countries_name'),
        array('px_provinces_name', 'px_districts_name'),
        array('px_settlements_name', 'px_settlementdistricts_name'),
        array('px_microdistricts_name', ''),
        array('street_type', 'px_streets_name'),
        array('px_buildingnumbers_name', 'px_housingnumbers_name'),
        array('px_apartmentnumbers_name', ''),
        array('description',),
        array('assigned_user_name', 'team_name'),
        array(
            //show dropdown
            'customCode' => '{$fields.px_birth_day.options[$fields.px_birth_day.value]} {$fields.px_birth_month.options[$fields.px_birth_month.value]}',
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
    )
);
