CREATE VIEW min_hotel_price AS
SELECT hotels.hotel_id, wat.room_id, MIN(wat.minimum_price) 
FROM hotels 
JOIN 
	( 
        SELECT MIN(room_package_prices.price) 
        AS minimum_price, rooms.room_id, rooms.hotel_id 
        FROM rooms 
        JOIN room_package_prices 
        ON rooms.room_id=room_package_prices.room_id 
        group by rooms.room_id 
    ) AS wat 
ON hotels.hotel_id=wat.hotel_id
GROUP BY hotels.hotel_id