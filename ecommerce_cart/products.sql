CREATE TABLE `products` (
  `id` INT(15) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `products` (`name`, `price`, `image`) VALUES
('Product 1', 10.00, 'product.jpg'),
('Product 2', 15.00, 'product2.jpg'),
('Product 3', 20.00, 'product3.jpg'),
('Product 4', 40.00, 'product4.jpg'),
('Product 5', 50.00, 'product5.jpg'),
('Product 6', 60.00, 'product6.jpg'),
('Product 7', 70.00, 'product7.jpg'),
('Product 8', 80.00, 'product8.jpg'),
('Product 9', 40.00, 'product9.jpg'),
('Product 10', 50.00, 'product10.jpg'),
('Product 11', 60.00, 'product11.jpg'),
('Product 12', 70.00, 'product12.jpg');


