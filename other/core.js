/**
 * @desc подключается на editview, преобразовывает число в стандартный вид, без разделителей по разрадям, десятичный разделитель - точка
 * @param n string
 * @param num_grp_sep global var
 * @param dec_sep global var
 * @returns float
 */
function unformatNumber(n, num_grp_sep, dec_sep) {
	var x=unformatNumberNoParse(n, num_grp_sep, dec_sep);
	x=x.toString();
	if(x.length > 0) {
		return parseFloat(x);
	}
	return '';
}
// unformatNumber("124,5",num_grp_sep,dec_sep) returned 1245



requiredTxt = SUGAR.language.get('app_strings', 'ERR_MISSING_REQUIRED_FIELDS');//Пропущены обязательные поля:
invalidTxt = SUGAR.language.get('app_strings', 'ERR_INVALID_VALUE');//Неверное значение:
nomatchTxt = SUGAR.language.get('app_strings', 'ERR_SQS_NO_MATCH_FIELD');//Нет совпадения для поля:

