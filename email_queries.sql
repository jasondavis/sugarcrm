-- Получить id записи по email 
SELECT
	ear.bean_id
FROM
	email_addresses ea
LEFT JOIN email_addr_bean_rel ear ON ea.id = ear.email_address_id
WHERE
	ear.bean_module = N'Accounts'
AND ea.email_address = 'qwe@qwe.qwe'
AND ear.deleted = 0
ORDER BY
	ear.reply_to_address,
	ear.primary_address DESC;

-- Получить email и все поля accounts

SELECT
	email_address,accounts.*
FROM
	email_addresses ea
LEFT JOIN email_addr_bean_rel ear ON ea.id = ear.email_address_id
JOIN accounts ON ear.bean_id = accounts.id
WHERE
	ear.bean_module = N'Accounts'
AND ear.deleted = 0
ORDER BY
	ear.reply_to_address,
	ear.primary_address DESC
