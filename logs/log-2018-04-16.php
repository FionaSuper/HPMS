
ERROR - 2018-04-16 12:11:57 --> Severity: Notice --> Undefined variable: exist_contract C:\Bitnami\wampstack-5.6.32-1\apache2\htdocs\cicool\application\controllers\administrator\Partner_doctor.php 176
ERROR - 2018-04-16 12:25:45 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE (`PARTNER_CODE` LIKE '%%' OR `DR_CODE` LIKE '%%' OR `PARTNER_DR_CODE` LIKE '%%' OR `LOC_CODE` LIKE '%%' OR `STATUS` LIKE '%%' )
AND `STATUS` = 'Not Start' or `STATUS` = 'Active'
ORDER BY `DR_CODE` DESC
 LIMIT 10
ERROR - 2018-04-16 12:25:46 --> Some variable did not contain a value.
ERROR - 2018-04-16 12:25:52 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:32:02 --> Some variable did not contain a value.
ERROR - 2018-04-16 12:32:06 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:33:06 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:33:26 --> Some variable did not contain a value.
ERROR - 2018-04-16 12:33:29 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:34:59 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:35:16 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:35:23 --> Some variable did not contain a value.
ERROR - 2018-04-16 12:35:27 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:36:40 --> Query error: Table 'humphrey.partner_doctor_contract' doesn't exist - Invalid query: SELECT *
FROM `partner_doctor_contract`
WHERE `PARTNER_CODE` = 'ACL-HK'
ERROR - 2018-04-16 12:40:02 --> Some variable did not contain a value.
ERROR - 2018-04-16 12:40:31 --> Severity: Warning --> error_log(/library/webserver/documents/cicool/application/logs/error_logs.php): failed to open stream: No such file or directory C:\Bitnami\wampstack-5.6.32-1\apache2\htdocs\cicool\application\controllers\administrator\Business_partner.php 246
ERROR - 2018-04-16 12:41:30 --> Query error: Unknown column 'PARTNER_CONTRACT_NO' in 'field list' - Invalid query: INSERT INTO `partner_contract` (`PARTNER_CODE`, `PARTNER_CONTRACT_NO`, `START_DATE`, `TERM_DATE`, `STATUS`, `CREATOR`, `CREATE_DATE`, `LAST_MODIFIER`, `LAST_UPDATE`) VALUES ('apr16test1', 1, '2018-04-21', '', 'Not Start', 'Admin', '2018-04-16 12:41:30', 'Admin', '2018-04-16 12:41:30')
