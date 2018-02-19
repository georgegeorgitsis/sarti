<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2018-02-15 08:42:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:42:18 --> No URI present. Default controller set.
DEBUG - 2018-02-15 08:42:18 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:42:18 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'sarti' C:\wamp64\www\ap\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-02-15 08:42:18 --> Unable to connect to the database
DEBUG - 2018-02-15 08:43:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:43:16 --> No URI present. Default controller set.
DEBUG - 2018-02-15 08:43:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:43:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:43:16 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:43:16 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:43:16 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:43:16 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:43:16 --> Pagination class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:43:16 --> Query error: Expression #1 of ORDER BY clause is not in SELECT list, references column 'test.hotels.hotel_name' which is not in SELECT list; this is incompatible with DISTINCT - Invalid query: SELECT DISTINCT(hotels.hotel_id)
FROM `hotels`
JOIN `rooms` ON `rooms`.`hotel_id`=`hotels`.`hotel_id`
INNER JOIN `packages` ON `rooms`.`room_package_id`=`packages`.`package_id`
INNER JOIN `package_periods` ON `package_periods`.`package_id`=`packages`.`package_id`
INNER JOIN `room_package_prices` ON `room_package_prices`.`room_id`=`rooms`.`room_id`
WHERE `rooms`.`room_active` = 1
AND `hotels`.`hotel_active` = 1
AND `room_package_prices`.`price` >0
AND `room_package_prices`.`is_active` = 1
ORDER BY `hotels`.`hotel_name` ASC
DEBUG - 2018-02-15 08:55:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:55:23 --> No URI present. Default controller set.
DEBUG - 2018-02-15 08:55:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:55:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:55:23 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:55:23 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:55:23 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:55:23 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:55:23 --> Pagination class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
ERROR - 2018-02-15 08:55:23 --> Severity: Warning --> Illegal string offset 'special_offer' C:\wamp64\www\ap\application\views\frontend\hotels_list.php 138
DEBUG - 2018-02-15 08:55:23 --> Total execution time: 0.2867
DEBUG - 2018-02-15 08:55:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:55:24 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:55:24 --> 404 Page Not Found: Img/favicon.png
DEBUG - 2018-02-15 08:55:38 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:55:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:55:38 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:55:38 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:55:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:55:38 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:56:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:11 --> No URI present. Default controller set.
DEBUG - 2018-02-15 08:56:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:11 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:11 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:11 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:11 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:11 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:11 --> Total execution time: 0.2529
DEBUG - 2018-02-15 08:56:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:56:12 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:56:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:56:12 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:56:15 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:15 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:15 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:15 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:15 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:15 --> Total execution time: 0.2176
DEBUG - 2018-02-15 08:56:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:16 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:56:16 --> 404 Page Not Found: Hotel/img
DEBUG - 2018-02-15 08:56:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:29 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:29 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:29 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:29 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:29 --> Total execution time: 0.0856
DEBUG - 2018-02-15 08:56:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:31 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:31 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:31 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:31 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:31 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:31 --> Total execution time: 0.0952
DEBUG - 2018-02-15 08:56:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:56:31 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 08:56:31 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:56:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:32 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:56:32 --> 404 Page Not Found: Hotels/img
DEBUG - 2018-02-15 08:56:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:32 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:32 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:32 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:32 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:32 --> Total execution time: 0.1600
DEBUG - 2018-02-15 08:56:37 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:37 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:37 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:37 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:37 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:37 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:37 --> Total execution time: 0.0956
DEBUG - 2018-02-15 08:56:37 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:37 --> UTF-8 Support Enabled
ERROR - 2018-02-15 08:56:37 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:56:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:56:38 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:56:38 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:38 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:38 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:38 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:38 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:38 --> Total execution time: 0.1483
DEBUG - 2018-02-15 08:56:51 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:51 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:51 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:51 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:51 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:51 --> Total execution time: 0.0896
DEBUG - 2018-02-15 08:56:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:53 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:53 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:53 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:53 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:53 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:53 --> Total execution time: 0.0978
DEBUG - 2018-02-15 08:56:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:56:53 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 08:56:53 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:56:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:56:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:56:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:56:53 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:56:53 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:56:53 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:56:53 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:56:53 --> Total execution time: 0.1284
DEBUG - 2018-02-15 08:57:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:57:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:57:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:57:01 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:57:01 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:57:01 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:57:01 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:57:02 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:57:02 --> Total execution time: 0.2696
DEBUG - 2018-02-15 08:57:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:57:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:57:02 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:57:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:57:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:57:02 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:57:13 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:57:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:57:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:57:13 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:57:13 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:57:13 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:57:13 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:57:13 --> Total execution time: 0.1733
DEBUG - 2018-02-15 08:58:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:58:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:58:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:58:28 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:58:28 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:58:28 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:58:28 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:58:28 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:58:29 --> Total execution time: 0.2529
DEBUG - 2018-02-15 08:58:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:58:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:58:29 --> UTF-8 Support Enabled
ERROR - 2018-02-15 08:58:29 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:58:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 08:58:29 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 08:58:43 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:58:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:58:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:58:43 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:58:43 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:58:43 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:58:43 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:58:43 --> Total execution time: 0.2129
DEBUG - 2018-02-15 08:59:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:59:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:59:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:59:04 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:59:04 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:59:04 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:59:04 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:59:04 --> Total execution time: 0.1819
DEBUG - 2018-02-15 08:59:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:59:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:59:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:59:32 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:59:32 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:59:32 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:59:32 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:59:32 --> Total execution time: 0.1847
DEBUG - 2018-02-15 08:59:36 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 08:59:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 08:59:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 08:59:36 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 08:59:36 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 08:59:36 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 08:59:36 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 08:59:36 --> Total execution time: 0.1606
DEBUG - 2018-02-15 09:10:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:10:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:10:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:10:05 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:10:05 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:10:05 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:10:05 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:10:05 --> Total execution time: 0.0839
DEBUG - 2018-02-15 09:10:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:10:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:10:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:10:21 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:10:21 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:10:21 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:10:21 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:10:21 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:10:21 --> Total execution time: 0.1294
DEBUG - 2018-02-15 09:10:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:10:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:10:21 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:10:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:10:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:10:21 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:10:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:10:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:10:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:10:22 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:10:22 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:10:22 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:10:22 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:10:22 --> Total execution time: 0.1796
DEBUG - 2018-02-15 09:11:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:11:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:11:00 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:11:00 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:11:00 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:11:00 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:11:00 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:11:00 --> Total execution time: 0.1176
DEBUG - 2018-02-15 09:11:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:11:01 --> UTF-8 Support Enabled
ERROR - 2018-02-15 09:11:01 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:11:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:11:01 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:11:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:11:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:11:01 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:11:01 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:11:01 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:11:01 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:11:01 --> Total execution time: 0.1023
DEBUG - 2018-02-15 09:11:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:11:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:11:06 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:11:06 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:11:06 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:11:06 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:11:06 --> Total execution time: 0.0601
DEBUG - 2018-02-15 09:11:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:11:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:11:14 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:11:14 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:11:14 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:11:14 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:11:14 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:11:14 --> Total execution time: 0.1220
DEBUG - 2018-02-15 09:11:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:11:14 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:11:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:11:14 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:11:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:11:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:11:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:11:14 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:11:14 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:11:14 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:11:14 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:11:14 --> Total execution time: 0.1258
DEBUG - 2018-02-15 09:23:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:23:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:23:16 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:23:16 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:23:16 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:23:16 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:23:16 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:23:16 --> Total execution time: 0.1187
DEBUG - 2018-02-15 09:23:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:23:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:23:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:23:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:23:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:23:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:23:17 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:23:17 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:23:17 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:23:17 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:23:17 --> Total execution time: 0.1226
DEBUG - 2018-02-15 09:23:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:23:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:23:24 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:23:24 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:23:24 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:23:24 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:23:24 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:23:24 --> Total execution time: 0.1194
DEBUG - 2018-02-15 09:23:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:23:24 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:23:24 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 09:23:24 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:23:25 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:23:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:23:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:23:25 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:23:25 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:23:25 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:23:25 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:23:25 --> Total execution time: 0.1140
DEBUG - 2018-02-15 09:24:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:24:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:24:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:24:40 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:24:40 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:24:40 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:24:40 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:24:40 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:24:40 --> Total execution time: 0.1190
DEBUG - 2018-02-15 09:24:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:24:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:24:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:24:41 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:24:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:24:41 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:24:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:24:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:24:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:24:41 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:24:41 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:24:41 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:24:41 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:24:41 --> Total execution time: 0.1034
DEBUG - 2018-02-15 09:25:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:25:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:25:02 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:25:02 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:25:02 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:25:02 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:25:02 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:25:02 --> Total execution time: 0.1375
DEBUG - 2018-02-15 09:25:03 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:03 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:03 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:25:03 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:25:03 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:25:03 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:25:03 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:25:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:25:03 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:25:03 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:25:03 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:25:03 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:25:03 --> Total execution time: 0.1183
DEBUG - 2018-02-15 09:25:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:25:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:25:40 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:25:40 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:25:40 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:25:40 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:25:40 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:25:40 --> Total execution time: 0.1193
DEBUG - 2018-02-15 09:25:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:25:40 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:25:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:25:40 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:25:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:25:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:25:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:25:41 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:25:41 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:25:41 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:25:41 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:25:41 --> Total execution time: 0.1242
DEBUG - 2018-02-15 09:26:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:26:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:26:31 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:26:31 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:26:31 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:26:31 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:26:31 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:26:31 --> Total execution time: 0.1220
DEBUG - 2018-02-15 09:26:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:26:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:26:31 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 09:26:31 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:26:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:26:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:26:32 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:26:32 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:26:32 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:26:32 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:26:32 --> Total execution time: 0.1288
DEBUG - 2018-02-15 09:26:46 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:26:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:26:46 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:26:46 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:26:46 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:26:47 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:26:47 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:26:47 --> Total execution time: 0.1173
DEBUG - 2018-02-15 09:26:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:26:47 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:26:47 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:26:47 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:26:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:26:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:26:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:26:47 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:26:47 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:26:47 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:26:47 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:26:47 --> Total execution time: 0.1021
DEBUG - 2018-02-15 09:27:33 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:27:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:27:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:27:33 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:27:33 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:27:33 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:27:33 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:27:33 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:27:33 --> Total execution time: 0.1501
DEBUG - 2018-02-15 09:27:33 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:27:33 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:27:33 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:27:33 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:27:34 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:27:34 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:27:34 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:27:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:27:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:27:34 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:27:34 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:27:34 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:27:34 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:27:34 --> Total execution time: 0.1055
DEBUG - 2018-02-15 09:29:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:29:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:29:19 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:29:19 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:19 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:29:19 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:29:19 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:19 --> Total execution time: 0.1094
DEBUG - 2018-02-15 09:29:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:29:19 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:29:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:29:20 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:29:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:29:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:29:20 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:29:20 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:20 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:29:20 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:29:20 --> Total execution time: 0.0989
DEBUG - 2018-02-15 09:29:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:29:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:29:40 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:29:40 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:40 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:29:40 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:29:40 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:40 --> Total execution time: 0.1196
DEBUG - 2018-02-15 09:29:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:29:40 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:29:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:29:40 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:29:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:29:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:29:41 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:29:41 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:41 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:29:41 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:29:41 --> Total execution time: 0.1112
DEBUG - 2018-02-15 09:29:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:29:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:29:54 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:29:54 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:54 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:29:54 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:29:54 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:54 --> Total execution time: 0.1123
DEBUG - 2018-02-15 09:29:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:29:54 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:29:54 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:29:54 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:29:54 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:29:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:29:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:29:55 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:29:55 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:29:55 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:29:55 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:29:55 --> Total execution time: 0.0984
DEBUG - 2018-02-15 09:30:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:00 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:00 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:00 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:00 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:00 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:00 --> Total execution time: 0.1167
DEBUG - 2018-02-15 09:30:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:30:01 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:30:01 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:30:01 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:30:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:01 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:01 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:01 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:01 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:01 --> Total execution time: 0.1136
DEBUG - 2018-02-15 09:30:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:09 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:09 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:09 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:09 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:09 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:09 --> Total execution time: 0.1181
DEBUG - 2018-02-15 09:30:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:30:09 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:30:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:30:09 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:30:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:10 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:10 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:10 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:10 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:10 --> Total execution time: 0.0976
DEBUG - 2018-02-15 09:30:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:18 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:18 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:18 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:18 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:18 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:18 --> Total execution time: 0.1161
DEBUG - 2018-02-15 09:30:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:18 --> UTF-8 Support Enabled
ERROR - 2018-02-15 09:30:18 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:30:18 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:30:18 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:30:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:18 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:18 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:18 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:18 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:18 --> Total execution time: 0.1115
DEBUG - 2018-02-15 09:30:44 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:44 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:44 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:44 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:44 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:44 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:44 --> Total execution time: 0.1431
DEBUG - 2018-02-15 09:30:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:45 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:30:45 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 09:30:45 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:30:45 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:30:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:30:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:30:45 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:30:45 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:30:45 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:30:45 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:30:45 --> Total execution time: 0.1470
DEBUG - 2018-02-15 09:31:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:31:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:31:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:31:17 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:31:17 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:31:17 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:31:17 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:31:17 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:31:17 --> Total execution time: 0.1228
DEBUG - 2018-02-15 09:31:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:31:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:31:17 --> UTF-8 Support Enabled
ERROR - 2018-02-15 09:31:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:31:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:31:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:31:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:31:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:31:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:31:18 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:31:18 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:31:18 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:31:18 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:31:18 --> Total execution time: 0.1396
DEBUG - 2018-02-15 09:32:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:32:00 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:32:00 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:00 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:32:00 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:32:00 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:00 --> Total execution time: 0.1140
DEBUG - 2018-02-15 09:32:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:00 --> UTF-8 Support Enabled
ERROR - 2018-02-15 09:32:00 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:32:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:32:00 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:32:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:32:01 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:32:01 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:01 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:32:01 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:32:01 --> Total execution time: 0.1360
DEBUG - 2018-02-15 09:32:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:32:23 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:32:23 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:23 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:32:23 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:32:23 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:23 --> Total execution time: 0.1185
DEBUG - 2018-02-15 09:32:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:32:23 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:32:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:32:23 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:32:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:32:24 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:32:24 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:24 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:32:24 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:32:24 --> Total execution time: 0.1200
DEBUG - 2018-02-15 09:32:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:32:48 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:32:48 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:48 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:32:48 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:32:48 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:48 --> Total execution time: 0.1199
DEBUG - 2018-02-15 09:32:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:32:48 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 09:32:48 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:32:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:32:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:32:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:32:49 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:32:49 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:32:49 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:32:49 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:32:49 --> Total execution time: 0.1110
DEBUG - 2018-02-15 09:33:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:33:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:33:16 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:33:16 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:33:16 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:33:16 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:33:16 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:33:16 --> Total execution time: 0.1238
DEBUG - 2018-02-15 09:33:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:33:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:33:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:33:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:33:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:33:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:33:17 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:33:17 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:33:17 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:33:17 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:33:17 --> Total execution time: 0.1499
DEBUG - 2018-02-15 09:33:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:33:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:33:30 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:33:30 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:33:30 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:33:30 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:33:30 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:33:30 --> Total execution time: 0.1261
DEBUG - 2018-02-15 09:33:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:33:30 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:33:30 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 09:33:30 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:33:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:33:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:33:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:33:30 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:33:30 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:33:30 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:33:30 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:33:30 --> Total execution time: 0.1288
DEBUG - 2018-02-15 09:34:01 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:01 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:01 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:01 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:01 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:01 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:01 --> Total execution time: 0.1195
DEBUG - 2018-02-15 09:34:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:02 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:02 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:02 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:02 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:02 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:02 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:02 --> Total execution time: 0.1417
DEBUG - 2018-02-15 09:34:12 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:12 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:12 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:12 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:12 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:12 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:12 --> Total execution time: 0.1171
DEBUG - 2018-02-15 09:34:13 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:13 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:13 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:13 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:13 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:13 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:13 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:13 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:13 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:13 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:13 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:13 --> Total execution time: 0.1062
DEBUG - 2018-02-15 09:34:27 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:27 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:27 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:27 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:27 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:27 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:27 --> Total execution time: 0.1254
DEBUG - 2018-02-15 09:34:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:28 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:28 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:28 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:28 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:28 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:28 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:28 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:28 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:28 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:28 --> Total execution time: 0.1237
DEBUG - 2018-02-15 09:34:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:40 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:40 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:40 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:40 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:40 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:40 --> Total execution time: 0.1528
DEBUG - 2018-02-15 09:34:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:41 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:34:41 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:34:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:34:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:34:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:34:41 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:34:41 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:34:41 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:34:41 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:34:41 --> Total execution time: 0.1278
DEBUG - 2018-02-15 09:36:59 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:36:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:36:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:36:59 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:36:59 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:36:59 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:36:59 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:36:59 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:37:00 --> Total execution time: 0.1182
DEBUG - 2018-02-15 09:37:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:37:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:37:00 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:37:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:37:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:37:00 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:37:00 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:37:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:37:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:37:00 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:37:00 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:37:00 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:37:00 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:37:00 --> Total execution time: 0.1294
DEBUG - 2018-02-15 09:38:13 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:38:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:38:13 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:38:13 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:38:13 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:38:13 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:38:13 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:38:13 --> Total execution time: 0.1154
DEBUG - 2018-02-15 09:38:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:38:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:38:14 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 09:38:14 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:38:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:38:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:38:14 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:38:14 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:38:14 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:38:14 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:38:14 --> Total execution time: 0.1449
DEBUG - 2018-02-15 09:38:29 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:38:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:38:30 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:38:30 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:38:30 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:38:30 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:38:30 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:38:30 --> Total execution time: 0.1106
DEBUG - 2018-02-15 09:38:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:30 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:38:30 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:38:30 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:38:30 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:38:30 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:38:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:38:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:38:30 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:38:30 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:38:30 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:38:31 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:38:31 --> Total execution time: 0.1281
DEBUG - 2018-02-15 09:41:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:41:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:41:02 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:41:02 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:41:02 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:41:02 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:41:02 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:41:03 --> Total execution time: 0.1181
DEBUG - 2018-02-15 09:41:03 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:03 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:41:03 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:41:03 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:03 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:41:03 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:41:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:41:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:41:04 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:41:04 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:41:04 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:41:04 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:41:04 --> Total execution time: 0.1160
DEBUG - 2018-02-15 09:41:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:41:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:41:48 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:41:48 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:41:48 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:41:48 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:41:48 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:41:49 --> Total execution time: 0.1258
DEBUG - 2018-02-15 09:41:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:41:49 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:41:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:41:49 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:41:50 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:41:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:41:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:41:50 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:41:50 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:41:50 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:41:50 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:41:50 --> Total execution time: 0.1385
DEBUG - 2018-02-15 09:51:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:51:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:51:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:51:10 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:51:10 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:51:10 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:51:10 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:51:10 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:51:10 --> Total execution time: 0.1257
DEBUG - 2018-02-15 09:51:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:51:10 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:51:10 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:51:10 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:51:10 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 09:51:10 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 09:51:11 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:51:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:51:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:51:11 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:51:11 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:51:11 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:51:11 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:51:11 --> Total execution time: 0.1332
DEBUG - 2018-02-15 09:51:44 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 09:51:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 09:51:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 09:51:44 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 09:51:44 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:51:44 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 09:51:44 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 09:51:44 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 09:51:44 --> Total execution time: 0.1667
DEBUG - 2018-02-15 10:00:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:00:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:00:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:00:48 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:00:48 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:00:48 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:00:48 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:00:48 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:00:48 --> Total execution time: 0.1717
DEBUG - 2018-02-15 10:00:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:00:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:00:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:00:49 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:00:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:00:49 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:00:50 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:00:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:00:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:00:50 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:00:50 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:00:50 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:00:50 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:00:50 --> Total execution time: 0.1315
DEBUG - 2018-02-15 10:01:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:01:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:01:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:01:23 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:01:23 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:01:23 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:01:23 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:01:23 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:01:23 --> Total execution time: 0.1246
DEBUG - 2018-02-15 10:01:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:01:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:01:23 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:01:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:01:23 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:01:23 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:01:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:01:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:01:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:01:24 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:01:24 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:01:24 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:01:24 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:01:24 --> Total execution time: 0.1324
DEBUG - 2018-02-15 10:02:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:02:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:02:16 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:02:16 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:16 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:02:16 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:02:16 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:16 --> Total execution time: 0.1264
DEBUG - 2018-02-15 10:02:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:02:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:02:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:02:17 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:02:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:02:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:02:18 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:02:18 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:18 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:02:18 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:02:18 --> Total execution time: 0.1387
DEBUG - 2018-02-15 10:02:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:02:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:02:19 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:02:19 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:19 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:02:19 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:02:19 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:19 --> Total execution time: 0.1293
DEBUG - 2018-02-15 10:02:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:02:20 --> UTF-8 Support Enabled
ERROR - 2018-02-15 10:02:20 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:02:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:02:20 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:02:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:02:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:02:21 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:02:21 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:21 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:02:21 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:02:21 --> Total execution time: 0.1098
DEBUG - 2018-02-15 10:02:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:02:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:02:40 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:02:40 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:40 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:02:40 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:02:40 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:40 --> Total execution time: 0.1181
DEBUG - 2018-02-15 10:02:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:02:40 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:02:40 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:40 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:02:40 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:02:41 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:02:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:02:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:02:41 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:02:41 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:02:41 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:02:41 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:02:41 --> Total execution time: 0.1537
DEBUG - 2018-02-15 10:03:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:03:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:03:22 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:03:22 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:03:22 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:03:22 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:03:22 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:03:22 --> Total execution time: 0.1462
DEBUG - 2018-02-15 10:03:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:22 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:03:22 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:03:22 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:22 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:03:22 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:03:23 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:03:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:03:23 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:03:23 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:03:23 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:03:23 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:03:23 --> Total execution time: 0.1565
DEBUG - 2018-02-15 10:03:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:03:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:03:47 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:03:47 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:03:47 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:03:48 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:03:48 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:03:48 --> Total execution time: 0.1379
DEBUG - 2018-02-15 10:03:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:03:48 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:03:48 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 10:03:48 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:03:50 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:03:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:03:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:03:50 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:03:50 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:03:50 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:03:50 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:03:50 --> Total execution time: 0.1392
DEBUG - 2018-02-15 10:05:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:05:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:05:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:05:17 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:05:17 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:05:17 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:05:17 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:05:17 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:05:17 --> Total execution time: 0.1242
DEBUG - 2018-02-15 10:05:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:05:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:05:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:05:18 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:05:18 --> 404 Page Not Found: Hotels/img
DEBUG - 2018-02-15 10:05:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:05:18 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:05:18 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:05:18 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:05:18 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:05:18 --> Total execution time: 0.1161
DEBUG - 2018-02-15 10:05:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:05:20 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:05:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:05:20 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:05:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:05:20 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:06:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:06:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:06:02 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:06:02 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:06:02 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:06:02 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:06:02 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:06:02 --> Total execution time: 0.1661
DEBUG - 2018-02-15 10:06:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:06:02 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:06:02 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:06:02 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:06:03 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:06:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:06:03 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:06:03 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:06:03 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:06:03 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:06:03 --> Total execution time: 0.1172
DEBUG - 2018-02-15 10:06:04 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:06:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:06:04 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:06:04 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:06:04 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:06:04 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:06:04 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:06:04 --> Total execution time: 0.1449
DEBUG - 2018-02-15 10:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:05 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:06:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:06:05 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 10:06:05 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:06:06 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:06:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:06:06 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:06:06 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:06:06 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:06:06 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:06:06 --> Total execution time: 0.1326
DEBUG - 2018-02-15 10:07:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:07:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:07:07 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:07:07 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:07 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:07:07 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:07:07 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:07 --> Total execution time: 0.2399
DEBUG - 2018-02-15 10:07:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:07 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:07:07 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:07:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:07:07 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:07:08 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:08 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:07:08 --> 404 Page Not Found: Img/favicon.png
DEBUG - 2018-02-15 10:07:47 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:07:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:07:47 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:07:47 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:47 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:07:47 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:07:47 --> Total execution time: 0.0961
DEBUG - 2018-02-15 10:07:48 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:07:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:07:48 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:07:48 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:48 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:07:48 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:07:48 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:48 --> Total execution time: 0.0909
DEBUG - 2018-02-15 10:07:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:07:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:07:49 --> 404 Page Not Found: Assets/css
ERROR - 2018-02-15 10:07:49 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:07:49 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:07:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:07:49 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:07:49 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:49 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:07:49 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:07:49 --> Total execution time: 0.1394
DEBUG - 2018-02-15 10:07:52 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:07:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:07:52 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:07:52 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:52 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:07:52 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:07:52 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:07:52 --> Total execution time: 0.2374
DEBUG - 2018-02-15 10:07:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:53 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:07:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:07:53 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:07:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2018-02-15 10:07:53 --> 404 Page Not Found: Assets/css
DEBUG - 2018-02-15 10:24:24 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:24:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:24:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:24:24 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:24:24 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:24:24 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:24:24 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:24:24 --> Total execution time: 0.0681
DEBUG - 2018-02-15 10:24:32 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:24:32 --> No URI present. Default controller set.
DEBUG - 2018-02-15 10:24:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:24:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:24:32 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:24:32 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:24:32 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:24:32 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:24:32 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:24:32 --> Total execution time: 0.2345
DEBUG - 2018-02-15 10:41:13 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:41:13 --> No URI present. Default controller set.
DEBUG - 2018-02-15 10:41:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:41:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:41:13 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:41:13 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:41:13 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:41:13 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:41:13 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:41:14 --> Total execution time: 0.2851
DEBUG - 2018-02-15 10:41:17 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:41:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:41:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:41:17 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:41:17 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:41:17 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:41:17 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:41:17 --> Total execution time: 0.0671
DEBUG - 2018-02-15 10:41:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:41:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:41:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:41:18 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:41:18 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:41:18 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:41:18 --> Language file contains no data: language/english/site_lang.php
ERROR - 2018-02-15 10:41:18 --> Severity: Notice --> Undefined variable: packageType C:\wamp64\www\ap\application\controllers\Hotels.php 73
DEBUG - 2018-02-15 10:41:18 --> Pagination class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:41:18 --> Severity: Notice --> Undefined variable: packageType C:\wamp64\www\ap\application\controllers\Hotels.php 74
DEBUG - 2018-02-15 10:41:18 --> Total execution time: 0.0795
DEBUG - 2018-02-15 10:41:18 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:41:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:41:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:41:18 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:41:18 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:41:18 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:41:18 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:41:18 --> Total execution time: 0.0873
DEBUG - 2018-02-15 10:42:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:42:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:42:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:42:14 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:42:14 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:42:14 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:42:14 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:42:14 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:42:14 --> Total execution time: 0.0837
DEBUG - 2018-02-15 10:42:14 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:42:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:42:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:42:14 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:42:14 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:42:14 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:42:14 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:42:14 --> Total execution time: 0.1143
DEBUG - 2018-02-15 10:42:21 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:42:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:42:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:42:21 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:42:21 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:42:21 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:42:21 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:42:21 --> Total execution time: 0.0816
DEBUG - 2018-02-15 10:49:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:49:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:49:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:49:31 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:49:31 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:49:31 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:49:31 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:49:31 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:49:31 --> Total execution time: 0.0976
DEBUG - 2018-02-15 10:49:31 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:49:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:49:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:49:31 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:49:31 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:49:31 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:49:31 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:49:31 --> Total execution time: 0.1235
DEBUG - 2018-02-15 10:50:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:50:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:50:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:50:16 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:50:16 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:50:16 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:50:16 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:50:16 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:50:16 --> Total execution time: 0.0810
DEBUG - 2018-02-15 10:50:16 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:50:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:50:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:50:16 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:50:16 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:50:16 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:50:16 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:50:16 --> Total execution time: 0.1081
DEBUG - 2018-02-15 10:50:19 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:50:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:50:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:50:19 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:50:19 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:50:19 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:50:19 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:50:19 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:50:19 --> Total execution time: 0.0870
DEBUG - 2018-02-15 10:50:42 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:50:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:50:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:50:42 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:50:42 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:50:42 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:50:42 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:50:42 --> Pagination class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:50:42 --> Severity: Notice --> Undefined variable: search C:\wamp64\www\ap\application\views\frontend\hotels_view.php 7
ERROR - 2018-02-15 10:50:42 --> Severity: Notice --> Undefined variable: search C:\wamp64\www\ap\application\views\frontend\hotels_view.php 7
ERROR - 2018-02-15 10:50:42 --> Severity: Notice --> Undefined variable: search C:\wamp64\www\ap\application\views\frontend\hotels_view.php 7
DEBUG - 2018-02-15 10:50:42 --> Total execution time: 0.1017
DEBUG - 2018-02-15 10:51:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:51:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:51:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:51:56 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:51:56 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:51:56 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:51:56 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:51:56 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:51:56 --> Total execution time: 0.0867
DEBUG - 2018-02-15 10:51:56 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:51:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:51:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:51:56 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:51:56 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:51:56 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:51:56 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:51:57 --> Total execution time: 0.1051
DEBUG - 2018-02-15 10:52:09 --> UTF-8 Support Enabled
DEBUG - 2018-02-15 10:52:09 --> No URI present. Default controller set.
DEBUG - 2018-02-15 10:52:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-02-15 10:52:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-02-15 10:52:09 --> Config file loaded: C:\wamp64\www\ap\application\config/ion_auth.php
DEBUG - 2018-02-15 10:52:09 --> Email class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:52:09 --> Session class already loaded. Second attempt ignored.
ERROR - 2018-02-15 10:52:09 --> Language file contains no data: language/english/site_lang.php
DEBUG - 2018-02-15 10:52:09 --> Pagination class already loaded. Second attempt ignored.
DEBUG - 2018-02-15 10:52:09 --> Total execution time: 0.2518
