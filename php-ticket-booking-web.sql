SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `php_ticket_booking_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `php_ticket_booking_web`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` bit(1) DEFAULT (false),
  `user_type` bit(1) DEFAULT (false),
  `activate_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `address`, `activated`, `activate_token`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$ngoCTbgUgUIGes6/KnLg7e0Li.JIOQkpVGYnZ6pbPsjuiw3kYwN3G','09876543210', N'Quận 7', b'1', '123456', b'1'),
(2, 'mvmanh', N'Mai', N'Văn Mạnh', 'mvmanh@gmail.com', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm','09876543210', N'Quận 7', b'1', '123456', b'0'),
(3, 'tdt', N'Tôn', N'Đức Thắng', 'mvmanh@it.tdt.edu.vn', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm','0975839562', N'Quận 4', b'1', '123456', b'0'),
(4, 'luffy', 'Luffy', 'Monkey', 'luffymonkey@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0654294738', N'Biển Đông', b'1', '123456', b'0'),
(5, 'izuku', 'Izuku', 'Midoriya', 'izuku@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0123456678', N'Học viện anh hùng', b'1', '123456', b'0');

ALTER TABLE `user`
  ADD UNIQUE KEY `username`(`username`),
  ADD UNIQUE KEY `email`(`email`),
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `type`(`type_id`, `name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Adventure'),
(4, 'Drama'),
(5, 'Horror'),
(6, 'Science Fiction'),
(7, 'Cartoon');

ALTER TABLE `type`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `film_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `runtime` int DEFAULT NULL,
  `publish_year` int DEFAULT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY(`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `film` (`film_id`, `name`, `runtime`, `publish_year`, `director`, `description`, `image`) VALUES
(1, 'The Lion King', 118, 2019, 'Rob Minkoff, Roger Allers', N'Chú sư tử con Simba, con trai của Mufasa, vị vua đang thống trị thế giới hoang dã ở đây. Em trai của Mufasa là Scar thèm muốn ngai vàng và âm mưu loại bỏ Mufasa và Simba, để hắn có thể trở thành vua. Simba đánh bại Scar tiếp quản vương quốc trở thành vua sư tử', 'the-lion-king.jpeg'),
(2, 'Doctor Strange', 115, 2016, 'Scott Derrickson', N'Stephen Strange, một bác sĩ phẫu thuật tài ba nhưng kiêu căng và tự cao. Sau một tai nạn giao thông nghiêm trọng khiến tay anh bị thương nặng, Stephen tìm đến ngôi chùa Ấn Độ và học được nghệ thuật phép thuật từ Người Cổ Đại. Anh dần khám phá ra thế giới siêu nhiên và sức mạnh của thế giới này. Khi thế giới đối diện nguy cơ, Stephen Strange trở thành Doctor Strange và sử dụng những kỹ năng mới để bảo vệ thế giới khỏi những mối đe dọa siêu nhiên.', 'doctor-strange.jpeg'),
(3, 'Godzilla x Kong: The New Empire', 125, 2024, 'Adam Wingard', N'Kong và Godzilla - hai sinh vật vĩ đại huyền thoại, hai kẻ thủ truyền kiếp sẽ cùng bắt tay thực thi một sứ mệnh chung mang tính sống còn để bảo vệ nhân loại, và trận chiến gắn kết chúng với loài người mãi mãi sẽ bắt đầu.', 'kong-x-godzila-the-new-empire.jpeg'),
(4, 'Kung Fu Panda 4', 94, 2024, 'Mike Mitchell', N'Sau khi Po được chọn trở thành Thủ lĩnh tinh thần của Thung lũng Bình Yên, Po cần tìm và huấn luyện một Chiến binh Rồng mới, trong khi đó một mụ phù thủy độc ác lên kế hoạch triệu hồi lại tất cả những kẻ phản diện mà Po đã đánh bại về cõi linh hồn.', 'kung-fu-panda-4.jpeg');
  
ALTER TABLE `film`
  MODIFY `film_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


DROP TABLE IF EXISTS `film_type`;
CREATE TABLE `film_type` (
  `film_type_id` INT NOT NULL AUTO_INCREMENT,
  `film_id` INT NOT NULL,
  `type_id` INT NOT NULL,
  PRIMARY KEY(film_type_id),
  FOREIGN KEY (film_id) REFERENCES `film`(film_id),
  FOREIGN KEY (type_id) REFERENCES `type`(type_id)
);

INSERT INTO `film_type` (`film_id`, `type_id`) VALUES
(1, 3),
(1, 7),
(2, 1),
(2, 6),
(3, 1),
(3, 2),
(3, 6),
(4, 2),
(4, 7);

CREATE TABLE IF NOT EXISTS `bookings` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(30) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12;

INSERT INTO `bookings` (`book_id`, `ticket_id`, `theater_id`, `user_id`, `show_id`, `screen_id`, `no_seats`, `amount`, `ticket_date`, `date`, `status`) VALUES
(3, '', 4, 3, 3, 3, 200, 75, '2017-05-21', '2017-05-21', 1),
(4, '', 4, 4, 1, 3, 2, 150, '2017-05-22', '2017-05-22', 1),
(5, '', 3, 2, 6, 1, 200, 70, '2017-05-25', '2017-05-22', 1),
(6, '', 3, 5, 6, 1, 100, 70, '2017-05-22', '2017-05-22', 1),
(7, '', 3, 5, 5, 1, 1, 70, '2017-05-22', '2017-05-22', 1),
(11, 'BKID5258816', 4, 2, 3, 3, 1, 75, '2017-05-22', '2017-05-22', 1);

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `screen`;
CREATE TABLE IF NOT EXISTS `screen` (
  `screen_id` int(11) NOT NULL AUTO_INCREMENT,
  `theater_id` int(11) NOT NULL,
  `screen_name` varchar(110) NOT NULL,
  `no_seats` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  PRIMARY KEY (`screen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5;

INSERT INTO `screen` (`screen_id`, `theater_id`, `screen_name`, `no_seats`, `charge`) VALUES
(1, 3, 'Screen 1', 100, 70),
(2, 3, 'Screen 2', 150, 60),
(3, 4, 'Screen 1', 200, 75),
(4, 14, 'Screen 1', 34, 120);

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

INSERT INTO `news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
(3, 'The Mummy', 'Tom Cruiz', '2017-06-15', 'Thought safely entombed in a crypt deep beneath the desert, an ancient princess whose destiny was unjustly taken from her is awakened in the modern era', 'mummy.jpeg'),
(5, 'Transformers: The Last Knight', ' Mark Wahlberg , Isabela Moner ', '2017-07-21', 'Humans are at war with the Transformers, and Optimus Prime is gone. The key to saving the future lies buried in the secrets of the past and the hidden history of Transformers on Earth', 'transformer.jpeg'),
(6, 'Tiyaan', 'Privthi Raj,Indrajith', '2017-10-18', 'Tiyaan is an upcoming Indian Malayalam film written by Murali Gopy and directed by Jiyen Krishnakumar.', 'tiyaan.jpeg');

DROP TABLE IF EXISTS `shows`;
CREATE TABLE IF NOT EXISTS `shows` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theater_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

INSERT INTO `shows` (`s_id`, `st_id`, `theater_id`, `film_id`, `start_date`, `status`, `r_status`) VALUES
(1, 9, 4, 1, '2017-05-01', 1, 1),
(2, 10, 4, 1, '2017-05-01', 1, 1),
(3, 11, 4, 2, '2017-05-01', 1, 1),
(4, 12, 4, 2, '2017-05-01', 1, 1),
(5, 1, 3, 1, '2017-05-01', 1, 1),
(6, 2, 3, 1, '2017-05-01', 1, 1),
(7, 3, 3, 1, '2017-05-01', 1, 1),
(8, 4, 3, 1, '2017-05-01', 1, 1),
(9, 5, 3, 2, '2017-05-01', 1, 1),
(10, 6, 3, 2, '2017-05-01', 1, 1),
(11, 7, 3, 2, '2017-05-01', 1, 1),
(12, 8, 3, 2, '2017-05-01', 1, 1),
(13, 1, 3, 3, '2017-02-25', 1, 0),
(14, 2, 3, 3, '2017-02-25', 1, 0),
(15, 9, 4, 4, '2017-05-28', 1, 0),
(16, 10, 4, 4, '2017-05-28', 1, 0),
(17, 11, 4, 4, '2017-05-28', 1, 0),
(18, 12, 4, 4, '2017-05-28', 1, 0);

DROP TABLE IF EXISTS `show_time`;
CREATE TABLE IF NOT EXISTS `show_time` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'noon,second,etc',
  `start_time` time NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

INSERT INTO `show_time` (`st_id`, `screen_id`, `name`, `start_time`) VALUES
(1, 1, 'Noon', '10:00:00'),
(2, 1, 'Matinee', '14:00:00'),
(3, 1, 'First', '18:00:00'),
(4, 1, 'Second', '21:00:00'),
(5, 2, 'Noon', '10:00:00'),
(6, 2, 'Matinee', '14:00:00'),
(7, 2, 'First', '18:00:00'),
(8, 2, 'Second', '21:00:00'),
(9, 3, 'Noon', '10:00:00'),
(10, 3, 'Matinee', '14:00:00'),
(11, 3, 'First', '18:00:00'),
(12, 3, 'Second', '21:00:00'),
(14, 4, 'Noon', '12:30:00');

DROP TABLE IF EXISTS `theater`;
CREATE TABLE IF NOT EXISTS `theater` (
  `theater_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`theater_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

INSERT INTO `theater` (`theater_id`, `name`, `area`, `district`, `address`) VALUES
(2, N'CGV Vincom Đồng Khởi', N'Hồ Chí Minh', N'Quận 1', N'72 Đường Lê Thánh Tôn'),
(3, N'CGV Vạn Hạnh Mall', N'Hồ Chí Minh', N'Quận 10', N'Tầng 6 Vạn Hạnh Mall, 11 Đường Sư Vạn Hạnh'),
(4, N'CGV Vivo City', N'Hồ Chí Minh', N'Quận 7', N'Tầng 5 TTTM Vivo City, 1058 Đường Nguyễn Văn Linh'),
(5, N'CGV Parkson Đồng Khởi', N'Hồ Chí Minh', N'Quận 1', N'Tầng 5 Parson Đồng Khởi'),
(6, N'CGV Lý Chính Thắng', N'Hồ Chí Minh', N'Quận 3', N'83 Đường Lý Chính Thằng'),
(7, N'CGV Pearl Plaza', N'Hồ Chí Minh', N'Quận Bình Thạnh', N'561A Đường Điện Biên Phủ'),
(8, N'CGV Thảo Điền Pearl', N'Hồ Chí Minh', N'Quận 2', N'12 Đường Quốc Hương'),
(9, N'CGV Crescent Mall', N'Hồ Chí Minh', N'Quận 7', N'Cresent Mall Đường Nguyễn Văn Linh'),
(10, N'CGV Vincom Thủ Đức', N'Hồ Chí Minh', N'Quận Thủ Đức', N'Tầng 6 TTTM Giga Mall, 240, 242 Phạm Văn Đồng'),
(11, N'CGV Hùng Vương Plaza', N'Hồ Chí Minh', N'Quận 5', N'Parkson Hùng Vương'),
(12, N'CGV Pandora City', N'Hồ Chí Minh', N'Quận Tân Phú', N'Pandora City, 1/1 Đường Trường Chinh'),
(13, N'CGV Aeon Tân Phú', N'Hồ Chí Minh', N'Quận Tân Phú', N'Aeon Mall, 30 Đường Tân Phú'),
(14, N'CGV Vincom Center Landmark 81', N'Hồ Chí Minh', N'Quận Bình Thạnh', N'Tầng B1, TTTM Vincom Center Landmark 81, 772 Điện Biên Phủ');

DROP TABLE IF EXISTS `film_ticket`;
CREATE TABLE `film_showtime` (
  `film_ticket_id` INT NOT NULL AUTO_INCREMENT,
  `film_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `seat` VARCHAR(10) NOT NULL,
  `shows_id` INT NOT NULL,
  PRIMARY KEY(film_ticket_id)
);

COMMIT;
