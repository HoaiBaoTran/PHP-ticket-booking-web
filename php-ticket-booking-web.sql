SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `php_ticket_booking_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `php_ticket_booking_web`;

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` bit(1) DEFAULT (false),
  `activate_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `account` (`username`, `firstname`, `lastname`, `email`, `password`, `activated`, `activate_token`) VALUES
('mvmanh', 'Mai', 'Văn Mạnh', 'mvmanh@gmail.com', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', b'1', '123456'),
('tdt', 'Tôn', 'Đức Thắng', 'mvmanh@it.tdt.edu.vn', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', b'1', '123456');

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `type`(`id`, `name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Adventure'),
(4, 'Drama'),
(5, 'Horror'),
(6, 'Science Fiction'),
(7, 'Cartoon');

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `runtime` int DEFAULT NULL,
  `publish_year` int DEFAULT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `film` (`id`, `name`, `type`, `runtime`, `publish_year`, `director`, `description`, `image`) VALUES
(1, 'The Lion King', 'Cartoon, Adventure', 118, 2019, 'Rob Minkoff, Roger Allers', 'Chú sư tử con Simba, con trai của Mufasa, vị vua đang thống trị thế giới hoang dã ở đây. Em trai của Mufasa là Scar thèm muốn ngai vàng và âm mưu loại bỏ Mufasa và Simba, để hắn có thể trở thành vua. Simba đánh bại Scar tiếp quản vương quốc trở thành vua sư tử', 'the-lion-king.jpeg'),
(2, 'Doctor Strange', 'Science Fiction, Action', 115, 2016, 'Scott Derrickson', 'Stephen Strange, một bác sĩ phẫu thuật tài ba nhưng kiêu căng và tự cao. Sau một tai nạn giao thông nghiêm trọng khiến tay anh bị thương nặng, Stephen tìm đến ngôi chùa Ấn Độ và học được nghệ thuật phép thuật từ Người Cổ Đại. Anh dần khám phá ra thế giới siêu nhiên và sức mạnh của thế giới này. Khi thế giới đối diện nguy cơ, Stephen Strange trở thành Doctor Strange và sử dụng những kỹ năng mới để bảo vệ thế giới khỏi những mối đe dọa siêu nhiên.', 'doctor-strange.jpeg'),
(3, 'Godzilla x Kong: The New Empire', 'Science Fiction, Action', 125, 2024, 'Adam Wingard', 'Kong và Godzilla - hai sinh vật vĩ đại huyền thoại, hai kẻ thủ truyền kiếp sẽ cùng bắt tay thực thi một sứ mệnh chung mang tính sống còn để bảo vệ nhân loại, và trận chiến gắn kết chúng với loài người mãi mãi sẽ bắt đầu.', 'kong-x-godzila-the-new-empire.jpeg'),
(4, 'Kung Fu Panda 4', 'Cartoon, Comedy', 94, 2024, 'Mike Mitchell', 'Sau khi Po được chọn trở thành Thủ lĩnh tinh thần của Thung lũng Bình Yên, Po cần tìm và huấn luyện một Chiến binh Rồng mới, trong khi đó một mụ phù thủy độc ác lên kế hoạch triệu hồi lại tất cả những kẻ phản diện mà Po đã đánh bại về cõi linh hồn.', 'kung-fu-panda-4.jpeg');

-- ACCOUNT
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

-- TYPE
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- FILM
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

COMMIT;
