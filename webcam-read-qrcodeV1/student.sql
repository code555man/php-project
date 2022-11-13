CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `std_id` varchar(10) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_lastname` varchar(50) NOT NULL,
  `std_group` varchar(100) NOT NULL,
  `time_in` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;