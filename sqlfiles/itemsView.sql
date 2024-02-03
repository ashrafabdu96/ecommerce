CREATE OR REPLACE VIEW item_view AS
SELECT categories.*,items.* FROM items
INNER JOIN categories ON categories.categories_id= items.items_categorie_id;







select `e_commerce`.`items`.`items_id` AS `items_id`,
`e_commerce`.`items`.`items_name` AS `items_name`,
`e_commerce`.`items`.`items_name_ar` AS `items_name_ar`,
`e_commerce`.`items`.`items_description` AS `items_description`,
`e_commerce`.`items`.`items_description_ar` AS `items_description_ar`,
`e_commerce`.`items`.`items_image` AS `items_image`,
`e_commerce`.`items`.`items_image2` AS `items_image2`,
`e_commerce`.`items`.`items_image3` AS `items_image3`,
`e_commerce`.`items`.`items_image4` AS `items_image4`,
`e_commerce`.`items`.`items_date_create` AS `items_date_create`,
`e_commerce`.`items`.`items_active` AS `items_active`,
`e_commerce`.`items`.`items_count` AS `items_count`,
`e_commerce`.`items`.`items_discount` AS `items_discount`,
`e_commerce`.`items`.`items_price` AS `items_price`,
`e_commerce`.`items`.`items_categories_id` AS `items_categories_id`,
case when (select `e_commerce`.`cart`.`item_cart_id` 
from `e_commerce`.`cart`
where `e_commerce`.`items`.`items_id` = `e_commerce`.`cart`.`item_cart_id`) is null then 'notInCart' else 'inCart' end AS `isInCart`
from `e_commerce`.`items`;