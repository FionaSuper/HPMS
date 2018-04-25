<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-24 11:38:47 --> Query error: Unknown column 'doctorDR_CODE' in 'on clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
JOIN `doctor` ON `doctorDR_CODE`=`doctor_special_fee`.`DR_CODE`
WHERE `PARTNER_CODE` = 'BLUEX'
AND `CARD_TYPE` = 'C'
ERROR - 2018-04-24 11:39:01 --> Query error: Unknown column 'doctorDR_CODE' in 'on clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
JOIN `doctor` ON `doctorDR_CODE`=`doctor_special_fee`.`DR_CODE`
WHERE `PARTNER_CODE` = 'BLUEX'
AND `CARD_TYPE` = 'C'
ERROR - 2018-04-24 11:39:20 --> Query error: Unknown column 'doctorDR_CODE' in 'on clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
JOIN `doctor` ON `doctorDR_CODE`=`doctor_special_fee`.`DR_CODE`
WHERE `PARTNER_CODE` = 'BLUEX'
AND `CARD_TYPE` = 'C'
ERROR - 2018-04-24 12:42:36 --> Query error: Unknown column 'doctor_special_fee.AUTO' in 'field list' - Invalid query: SELECT `doctor_special_fee`.`AUTO`, `doctor_special_fee`, `CARD_TYPE`, `doctor_special_fee`.`DR_CODE`, `doctor_special_fee`.`TYPE`, `doctor_special_fee`.`SPECIAL_FEE`
FROM `doctor_special_fee`
JOIN `doctor` ON `doctor`.`DR_CODE`=`doctor_special_fee`.`DR_CODE`
WHERE `PARTNER_CODE` = 'BLUEX'
AND `CARD_TYPE` = 'A'
ERROR - 2018-04-24 12:45:44 --> Query error: Unknown column 'doctor_special_fee.AUTO' in 'field list' - Invalid query: SELECT `doctor_special_fee`.`AUTO`, `doctor_special_fee`, `CARD_TYPE`, `doctor_special_fee`.`DR_CODE`, `doctor_special_fee`.`TYPE`, `doctor_special_fee`.`SPECIAL_FEE`
FROM `doctor_special_fee`
JOIN `doctor` ON `doctor`.`DR_CODE`=`doctor_special_fee`.`DR_CODE`
WHERE `PARTNER_CODE` = 'BLUEX'
AND `CARD_TYPE` = 'A'
ERROR - 2018-04-24 12:49:46 --> Query error: Column 'DR_CODE' in where clause is ambiguous - Invalid query: SELECT `doctor_special_fee`.`AUTO_NO`, `doctor_special_fee`.`CARD_TYPE`, `doctor_special_fee`.`DR_CODE`, `doctor_special_fee`.`TYPE`, `doctor_special_fee`.`MED_DAYS`, `doctor_special_fee`.`SPECIAL_FEE`
FROM `doctor_special_fee`
JOIN `doctor` ON `doctor`.`DR_CODE`=`doctor_special_fee`.`DR_CODE`
WHERE `PARTNER_CODE` = 'BLUEX'
AND `CARD_TYPE` = 'A'
AND `DR_CODE` = 'ATSUN'
ERROR - 2018-04-24 12:52:00 --> Query error: Column 'DR_CODE' in where clause is ambiguous - Invalid query: SELECT `doctor_special_fee`.`AUTO_NO`, `doctor_special_fee`.`CARD_TYPE`, `doctor_special_fee`.`DR_CODE`, `doctor_special_fee`.`TYPE`, `doctor_special_fee`.`MED_DAYS`, `doctor_special_fee`.`SPECIAL_FEE`
FROM `doctor_special_fee`
INNER JOIN `doctor` ON `doctor`.`DR_CODE`=`doctor_special_fee`.`DR_CODE`
WHERE `PARTNER_CODE` = 'BLUEX'
AND `CARD_TYPE` = 'A'
AND `DR_CODE` = 'ATSUN'
ERROR - 2018-04-24 16:01:00 --> Some variable did not contain a value.
ERROR - 2018-04-24 16:02:21 --> Some variable did not contain a value.
ERROR - 2018-04-24 16:11:20 --> Some variable did not contain a value.
ERROR - 2018-04-24 16:11:35 --> Some variable did not contain a value.
