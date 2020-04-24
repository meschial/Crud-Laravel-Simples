Crud com laravel, fazendo o create, show, update e delete. Usando url amigavel


<------Banco de dados usado -------->

CREATE TABLE `properts` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rental_price` decimal(11,0) NOT NULL,
  `sale_price` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
