/**
 * Author:  cqlsys
 * Created: 6 Sep, 2017
 */

SELECT 
    `Event`.*, 
    `Booking`.*, 
    `TicketCategory`.*,
    SUM(`Booking`.`number_of_tickets`) as _tickets 
FROM 
    `mmbooking`.`bookings` AS `Booking` 
    LEFT JOIN `mmbooking`.`events` AS `Event` 
        ON (`Booking`.`event_id` = `Event`.`id`) 
    LEFT JOIN `mmbooking`.`users` AS `User` 
        ON (`Booking`.`user_id` = `User`.`id`) 
    LEFT JOIN `mmbooking`.`ticket_categories` AS `TicketCategory` 
        ON (`Booking`.`ticket_category_id` = `TicketCategory`.`id`)  
WHERE 
    `Booking`.`ticket_category_id` IN (158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171)