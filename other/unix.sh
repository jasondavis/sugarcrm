# найти последние измененные файлы
OFS="$IFS";IFS=$'\n';stat --printf="%y %n\n" $(ls -tr $(find . -type f));IFS="$OFS";
