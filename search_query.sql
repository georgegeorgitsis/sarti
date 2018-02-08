SELECT DISTINCT(hotels.hotel_id) 
FROM `hotels` 
JOIN `rooms` ON `rooms`.`hotel_id`=`hotels`.`hotel_id` 
INNER JOIN `packages` ON `rooms`.`room_package_id`=`packages`.`package_id` 
INNER JOIN `package_periods` ON `package_periods`.`package_id`=`packages`.`package_id` 
INNER JOIN `room_package_prices` ON `room_package_prices`.`room_id`=`rooms`.`room_id` 
WHERE `rooms`.`room_active` = 1 
AND `hotels`.`hotel_active` = 1 
AND `room_package_prices`.`price` >0 
AND `room_package_prices`.`is_active` = 1 
AND `packages`.`is_package_type` = '2' 
AND `package_periods`.`period_from` = '2018-06-02' 
AND `package_periods`.`period_to` = '2018-06-09' 
AND `room_package_prices`.`adults` = '2' 
ORDER BY `hotels`.`hotel_name` ASC 
LIMIT 10