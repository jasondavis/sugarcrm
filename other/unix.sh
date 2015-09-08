# найти последние измененные файлы
OFS="$IFS";IFS=$'\n';stat --printf="%y %n\n" $(ls -tr $(find . -type f));IFS="$OFS";

#set sugar logger level
sed -i -e "s|\berror\b|info|" config_override.php
sed -i -e "s|\binfo\b|error|g" config_override.php

# удалить найденные файлы
find /var/www/hosted/crm75a.smartline.ua/ -name '*ar_SA.lang.php' -delete
