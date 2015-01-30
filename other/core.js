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
