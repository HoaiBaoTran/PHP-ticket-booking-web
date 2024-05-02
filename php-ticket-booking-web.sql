SET SQL_MODE = `NO_AUTO_VALUE_ON_ZERO`;
START TRANSACTION;
SET time_zone = `+00:00`;

CREATE DATABASE IF NOT EXISTS `php_ticket_booking_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `php_ticket_booking_web`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
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
(4, 'luffy', 'Luffy', 'Monkey', 'luffymonkey@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0654294738', N'Biển Đông', b'1', '123456', b'1'),
(5, 'izuku', 'Izuku', 'Midoriya', 'izuku@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0123456678', N'Học viện anh hùng', b'1', '123456', b'1'),
(6, 'natsu', 'Natsu', 'Dragneel', 'natsudragneel@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0175501675', N'Tartarus', b'1', '123456', b'0'),
(7, 'ichigo', N'Ichigo', N'Kurosaki', 'ichigokurosaki@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0487620356', N'Hollow World', b'1', '123456', b'0'),
(8, 'bakugo', N'Bakugo', N'Katsuki', 'bakugokatsuki@it.tdt.edu.vn', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0126583916', N'Học viện siêu anh hùng', b'1', '123456', b'0'),
(9, 'zoro', 'Zoro', 'Roronoa', 'zorororonoa@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0536442182', N'Biển Đông', b'1', '123456', b'0'),
(10, 'law', 'Law', 'Trafalgar', 'lawtrafalgar@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0341096666', N'Heart Crew', b'1', '123456', b'1'),
(11, 'messi', 'Messi', 'Lionel', 'messilionel@gmail.com', '$2y$10$v3jh3KOUv0t7MmLYyYLlaOLRfEUS.lwKJ4kFVB4L4z9PYJ8XvIrRi','0341096666', N'Argentina', b'1', '123456', b'0');

ALTER TABLE `user`
  ADD UNIQUE KEY `username`(`username`),
  ADD UNIQUE KEY `email`(`email`);

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `genre_id` INT NOT NULL AUTO_INCREMENT,
  `genre_name` TEXT COLLATE utf8_unicode_ci NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `genre` (`genre_id`, `genre_name`, `description`) VALUES
(1, N'Kinh dị', N'Phim mang đến trải nghiệm kinh dị, đáng sợ với các yếu tố ma quái và huyền bí.'),
(2, N'Hài', N'Phim mang đến tiếng cười và giải trí, tập trung vào yếu tố hài hước và sự vui nhộn.'),
(3, N'Tình cảm', N'Các câu chuyện xoay quanh các mối quan hệ tình cảm, nổi bật với tình yêu và cảm xúc.'),
(4, N'Tài liệu', N'Phim tài liệu thực tế, chân thực mô tả sự kiện, người nổi tiếng hoặc chủ đề cụ thể.'),
(5, N'Bí ẩn', N'Các câu chuyện với yếu tố bí ẩn, kèm theo sự hồi hộp và giải đố.'),
(6, N'Hành động', N'Phim với những cảnh hành động và phiêu lưu, thường đi kèm với chiến đấu và đấu tranh.'),
(7, N'Hoạt hình', N'Phim dùng kỹ thuật hoạt hình để tạo ra các nhân vật và cảnh quay.'),
(8, N'Phiêu lưu', N'Các cuộc phiêu lưu mạo hiểm, thường bao gồm khám phá và đối mặt với nguy hiểm.'),
(9, N'Hồi hộp', N'Phim tạo cảm giác hồi hộp và căng thẳng, thường với các yếu tố truyền hình.'),
(10, N'Tâm lý', N'Các câu chuyện tâm lý sâu sắc, tập trung vào tâm trạng và tâm lý nhân vật.'),
(11, N'Gia đình', N'Phim hướng đến gia đình và mối quan hệ gia đình, thường mang đến thông điệp tích cực.'),
(12, N'Giả tưởng', N'Các câu chuyện khoa học viễn tưởng và huyền bí, thường xoay quanh thế giới ảo.'),
(13, N'Thần thoại', N'Các câu chuyện về thần thoại và huyền bí, thường liên quan đến các vị thần và sinh vật siêu nhiên.'),
(14, N'Tội phạm', N'Phim tập trung vào các hoạt động tội phạm, bao gồm hành động truy nã và phá án.');

DROP TABLE IF EXISTS `studio`;
CREATE TABLE `studio` (
	  studio_id INT NOT NULL AUTO_INCREMENT,
    studio_name VARCHAR(50) NOT NULL,
    `address` VARCHAR(50) NOT NULL,
    email VARCHAR(20) NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    PRIMARY KEY (studio_id)
);

INSERT INTO `studio` (studio_name, `address`, email, phone_number) Values 
('Screen Gems', '', '', ''),
('Calendar Studios', '', '', ''),
('CoMix Wave Films', '', '', ''),
('My Way Pictures', '', '', ''),
('Live On', '', '', ''),
('Climax Studio', '', '', ''),
('DC Studios', '', '', ''),
('Amazon Studios', '', '', ''),
('Skybound', '', '', ''),
('CJ HK Entertainment', '', '', ''),
('Film Bridge International', '', '', ''),
('Galaxy Studio', '', '', ''),
('Marvel Studios', '', '', ''),
('Fowler Media', '', '', ''),
('DandeLion Animation Studio', '', '', ''),
('Universal Pictures', '', '', ''),
('MT Entertainment', '', '', ''),
('Entertainment One', '', '', ''),
('Universal Pictures', '', '', ''),
('Lucasfilm Ltd.', '', '', ''),
('Mainframe Studios', '', '', ''),
('DreamWorks Animation', '', '', ''),
('Skydance Media', '', '', ''),
('Walt Disney Pictures', '', '', ''),
('Columbia Pictures', '', '', ''),
(N'Lý Hải Production', '', '', ''),
('Galaxy Studio', '', '', ''),
('Studio Ghibli', '', '', ''),
('STXfilms', '', '', ''),
('World Pictures', '', '', '');

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
	language_id INT NOT NULL AUTO_INCREMENT,
	language_name VARCHAR(20) NOT NULL,
  PRIMARY KEY (language_id)
);

INSERT INTO language (language_name) VALUES
(N'Tiếng Anh'),
(N'Tiếng Pháp'),
(N'Tiếng Trung'),
(N'Tiếng Nhật'),
(N'Tiếng Hàn'),
(N'Tiếng Việt'),
(N'Tiếng Thái'),
(N'Tiếng Malay'),
(N'Tiếng Ý');

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `film_id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_year` int DEFAULT NULL,
  `premiere` VARCHAR(10) NOT NULL, -- ngày khởi chiếu
  `url_trailer` TEXT NOT NULL,
  `url_poster_vertical` TEXT NOT NULL,
	`url_poster_horizontal` TEXT NOT NULL,
  `time` TIME DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `studio_id` INT not null,
  `language_id` INT not null,
  `rating` INT NOT NULL,
  `age` INT NOT NULL,
  PRIMARY KEY(`film_id`),
  FOREIGN KEY (studio_id) REFERENCES `studio`(studio_id),
  FOREIGN KEY (language_id) REFERENCES `language`(language_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
  
INSERT INTO `film` (`film_id`, `name`, `director`, `publish_year`, `premiere`, `url_trailer`, `url_poster_vertical`, `url_poster_horizontal`, `time`, `age`, `description`, `rating`, `studio_id`, `language_id`) VALUES
(1, N'Khắc tinh của quỷ', 'Julius Avery', 2023, '2023-4-14', 'https://www.youtube.com/watch?v=SXfnUAW9gwA', 'movie1.jpg', 'movie1.jpg', '01:43:00', 18, N'Theo chân Amorth trong cuộc điều tra về vụ quỷ ám kinh hoàng của một cậu bé và dần khám phá ra những bí mật hàng thế kỷ mà Vatican đã cố gắng giấu kín', 4, 1, 1),
(2, N'Blue Beetle', 'Angel Manuel Soto', 2023, '2023-08-18', 'https://www.youtube.com/watch?v=j5rpK0Ba7q8', 'movie2.jpg', 'movie2.jpg', '02:08:00', 13, N'Cậu sinh viên mới tốt nghiệp Jaime Reyes trở về nhà với tràn trề niềm tin và hy vọng về tương lai, để rồi nhận ra quê nhà của anh đã thay đổi rất nhiều so với trước đây', 4, 7, 1),
(3, N'Khóa chặt cửa nào Suzume', 'Makoto Shinkai', 2023, '2023-03-10', 'https://www.youtube.com/watch?v=xQ4_c8JfuzI', 'movie3.jpg', 'movie3.jpg', '02:02:00', 0, N'Để bảo vệ Nhật Bản khỏi thảm họa, những cánh cửa rải rác khắp nơi phải được đóng lại, và bất ngờ thay Suzume cũng có khả năng đóng cửa đặc biệt này', 5, 3, 4),
(4, N'Đảo tội ác', 'euho', 2024, '2024-03-31', 'https://www.youtube.com/watch?v=jSZUpx_3yL4', 'movie4.jpg', 'movie4.jpg', '01:54:00', 18, N'Nhóm du khách trẻ vô tình phá bỏ phong ấn của con quái vật khát máu khi đến tham quan một hòn đảo cấm không dân địa phương nào dám đặt chân đến', 3, 4, 8),
(5, N'Biệt đội rất ổn', N'Tạ Nguyên Hiệp', 2024, '2024-03-31', 'https://www.youtube.com/watch?v=XHvNz4g88pE', 'movie5.jpg', 'movie5.jpg', '01:44:00', 13, N'Màn kết hợp bất đắc dĩ của Biệt Đội Rất Ổn và Gia Đình Cục Súc tại khu resort sang chảnh hứa hẹn cực kỳ gay cấn, hồi hộp nhưng không kém phần hài hước, xúc động', 3, 5, 6),
(6, N'Tri kỷ', 'Young-Keun Min', 2023, '2023-03-24', 'https://www.youtube.com/watch?v=K46K_1yTwUg', 'movie6.jpg', 'movie6.jpg', '02:04:00', 16, N'Khi Ham Jin Woo bước vào giữa cả hai, đó cũng là lúc những vết nứt trong mối quan hệ của Mi So và Ha Eun xuất hiện', 4, 6, 5),
(7, N'Cơn thịnh nộ của các vị thần', 'David F. Sandberg', 2025, '2025-03-17', 'https://www.youtube.com/watch?v=l37LjoV9W7M', 'movie7.jpg', 'movie7.jpg', '02:10:00', 13, N'Một tác phẩm từ New Line Cinema mang tên “Shazam! Fury of the Gods,” tiếp tục câu chuyện về chàng trai Billy Batson, và bản ngã Siêu anh hùng trưởng thành của mình sau khi hô cụm từ “SHAZAM !”', 5, 7, 1),
(8, N'Air-Theo đuổi một huyền thoại', 'Ben Affleck', 2024, '2024-06-14', 'https://www.youtube.com/watch?v=0h9vZ52Vals', 'movie8.jpg', 'movie8.jpg', '01:52:00', 16, N'Từ đạo diễn đã từng đoạt giải thưởng Ben Affleck, AIR hé lộ mối quan hệ đột phá giữa huyền thoại Michael Jordan khi mới bắt đầu sự nghiệp và bộ phận bóng rổ còn non trẻ của Nike, đã làm thay đổi thế giới thể thao và văn hóa đương đại với thương hiệu Air Jordan', 3, 8, 1),
(9, N'Renfield tay sai của quỷ', 'Chris McKay', 2024, '2024-07-20', 'https://www.youtube.com/watch?v=vXkN2H3Ijyw', 'movie9.jpg', 'movie9.jpg', '01:32:00', 18, N'Renfield bị buộc phải bắt con mồi về cho chủ nhân và thực hiện mọi mệnh lệnh, kể cả việc đó nhục nhã như thế nào. Nhưng giờ đây, sau nhiều thế kỷ làm nô lệ, Renfield đã sẵn sàng để khám phá cuộc sống bên ngoài cái bóng của Hoàng Tử Bóng Đêm', 4, 9, 1),
(10, N'Tình chị duyên em', 'Weawwan Hongvivatana', 2024, '2024-04-07', 'https://www.youtube.com/watch?v=DGKsSNmVPKA', 'movie10.jpg', 'movie10.jpg', '02:01:00', 13, N'Hai chị em sinh đôi giống hệt nhau là “You” và “Me” cũng đang lo lắng cho tương lai của họ về việc “làm sao sống mà có thể thiếu vắng nhau”. Cặp song sinh thân thiết với nhau đến mức có thể chia sẻ mọi khía cạnh cuộc sống cho nhau, kể cả nụ hôn đầu', 5, 10, 7),
(11, N'Câu lạc bộ sát thủ', 'Camille Delamarre', 2023, '2023-05-05', 'https://www.youtube.com/watch?v=neDUFSt8N0Q', 'movie11.jpg', 'movie11.jpg', '01:51:00', 18, N'Morgan Gaines - một sát thủ chuyên nghiệp có nhiệm vụ phải giết bảy người, Morgan phát hiện ra bảy `mục tiêu` cũng là bảy sát thủ nặng ký. Lối thoát duy nhất cho Morgan là tìm ra kẻ chủ mưu đứng sau tất cả mọi chuyện', 3, 11, 1),
(12, N'Siêu lừa gặp siêu lầy', N'Võ Thanh Hòa', 2024, '2024-08-27', 'https://www.youtube.com/watch?v=NIVa1CCdFv4', 'movie12.jpg', 'movie12.jpg', '01:52:00', 16, N'Theo chân của Khoa – tên lừa đảo tầm cỡ “quốc nội” đến đảo ngọc Phú Quốc với mong muốn đổi đời. Tại đây, Khoa gặp Tú – tay lừa đảo “hàng real” và cùng Tú thực hiện các phi vụ từ nhỏ đến lớn', 4, 12, 6),
(13, N'Chàng trai xinh đẹp của tôi', 'Sakai Mai', 2024, '2024-05-26', 'https://www.youtube.com/watch?v=Wy0f83FHbYY', 'movie13.jpg', 'movie13.jpg', '01:43:00', 18, N'Phim kể về mối tình tuyệt đẹp thời học sinh của hai chàng trai Hira và Kiyoi So. Hira vốn là một chàng trai hướng nội lại có tật nói lắp nên đã bị bạn bè bắt nạt', 5, 13, 4),
(14, N'Mặt nạ quỷ', 'Lawrence Fowler', 2023, '2023-04-14', 'https://www.youtube.com/watch?v=3MKRzG9k76Q', 'movie14.jpg', 'movie14.jpg', '01:42:00', 18, N'Bí ẩn về cái chết của em gái Evie 20 năm trước còn bỏ ngỏ, vào lúc 09:09 hằng đêm, hàng loạt cuộc chạm trán kinh hoàng xảy ra. Liệu Margot có biết được sự thật ai là kẻ giết em gái mình?', 3, 14, 1),
(15, N'The first slam dunk', 'Takehiko Inoue, Yasuyuki Ebara', 2023, '2023-04-11', 'https://www.youtube.com/watch?v=NEa0J_Q-NIY', 'movie15.jpg', 'movie15.jpg', '02:04:00', 13, N'Phim theo chân Ryota Miyagi, hậu vệ của đội bóng rổ trường trung học Shohoku. Anh có một người anh trai, Sota, hơn anh ba tuổi và là người đã truyền cảm hứng cho tình yêu bóng rổ của anh', 4, 15, 4),
(16, N'Phim anh em Super Mario', 'Aaron Horvath, Michael Jelenic', 2024, '2024-09-13', 'https://www.youtube.com/watch?v=QcinmCfoh8E', 'movie16.jpg', 'movie16.jpg', '01:33:00', 0, N'Câu chuyện về cuộc phiêu lưu của anh em Super Mario đến vương quốc Nấm', 5, 16, 1),
(17, N'Người giữ thời gian', N'Mỹ Tâm, Tạ Nguyên Hiệp', 2023, '2023-10-16', 'https://www.youtube.com/watch?v=yiI_McOCaw4', 'movie17.jpg', 'movie17.jpg', '01:46:00', 0, N'Khi cánh cổng thời gian mở ra, Tú và các người bạn của mình bắt đầu hành trình vượt qua các thời kỳ khác nhau để tìm kiếm và giữ gìn bản sắc văn hóa Việt Nam', 3, 17, 6),
(18, N'Ngục tối & rồng: Danh dự của kẻ trộm', 'John Francis Daley, Jonathan Goldstein', 2024, '2024-05-20', 'https://www.youtube.com/watch?v=P4IA6pIVb-w', 'movie18.jpg', 'movie18.jpg', '02:14:00', 13, N'Theo chân một tên trộm quyến rũ và một nhóm những kẻ bịp bợm nghiệp dư thực hiện vụ trộm sử thi nhằm lấy lại một di vật đã mất, nhưng mọi thứ trở nên nguy hiểm khó lường hơn bao giờ hết khi họ đã chạm trán nhầm người', 4, 18, 1),
(19, N'Nhà vịt di cư', 'Benjamin Renner', 2024, '2024-12-22', 'https://www.youtube.com/watch?v=865RCGVYcSc', 'movie19.jpg', 'movie19.jpg', '02:10:00', 0, N'Nhà Vịt Di Cư theo chân một gia đình vịt trời gồm vịt bố, vịt mẹ, cậu con trai tuổi teen Dax và vịt út Gwen, trong lần đầu tiên trải nghiệm chuyến di cư tiến về phía nam để trú đông. Thế nhưng, niềm vui vẻ sự háo hức kéo dài không bao lâu, gia đình vịt nhận ra, họ đang bay ngược chiều với tất cả các đàn vịt khác', 5, 19, 1),
(20, N'Indiana Jones và vòng quay định mệnh', 'James Mangold', 2024, '2024-06-29', 'https://www.youtube.com/watch?v=6u93f9fQ8yY', 'movie20.jpg', 'movie20.jpg', '02:34:00', 16, N'Indiana Jones 5 sẽ pha trộn giữa thực tế, hư cấu khi lấy bối cảnh năm 1969, lần này Indiana Jones sẽ đối mặt với Đức quốc xã trong thời gian diễn ra cuộc chạy đua vào không gian', 3, 20, 1),
(21, N'Barbie: Công chúa phiêu lưu', 'Conrad Helten', 2024, '2024-09-01', 'https://www.youtube.com/watch?v=7joR5V_T3wQ', 'movie21.jpg', 'movie21.jpg', '01:12:00', 0, N'Barbie thực hiện một chuyến đi đến Vương quốc Floravia theo lời mời của công chúa Amelia của Floravia', 4, 21, 1),
(22, N'Chuyện tôi và ma quỷ thành người một nhà', N'Trình Vĩ Hào', 2024, '2024-11-29', 'https://www.youtube.com/watch?v=zxk_YEa2Ky0', 'movie22.jpg', 'movie22.jpg', '02:10:00', 18, N'Một cuộc hành trình giả tưởng đầy tiếng cười và nước mắt giữa một người đàn ông thẳng thắn và một con ma đồng tính', 4, 2, 3),
(23, N'Quỷ lùn tinh nghịch: Đồng tâm hiệp nhạc', 'Walt Dohrn, Tim Heitz', 2024, '2024-11-17', 'https://www.youtube.com/watch?v=izi44lM_HSo', 'movie23.jpg', 'movie23.jpg', '01:32:00', 0, N'Sự xuất hiện đột ngột của John Dory, anh trai thất lạc đã lâu của Branch mở ra quá khứ bí mật được che giấu bấy lâu nay của Branch. Đó là quá khứ về một ban nhạc có tên BroZone từng rất nổi tiếng nhưng đã tan rã', 5, 22, 1),
(24, N'Transformers: Quái thú trỗi dậy', 'Steven Caple Jr.', 2023, '2023-06-09', 'https://www.youtube.com/watch?v=lRBA1AKyUaI', 'movie24.jpg', 'movie24.jpg', '02:07:00', 13, N'Bộ phim dựa trên sự kiện Beast Wars trong loạt phim hoạt hình `Transformers`, nơi mà các robot có khả năng biến thành động vật khổng lồ cùng chiến đấu chống lại một mối đe dọa tiềm tàng', 5, 23, 1),
(25, N'Flash', 'Andy Muschietti', 2025, '2025-01-01', 'https://www.youtube.com/watch?v=cvn0h6cuUPQ', 'movie25.jpg', 'movie25.jpg', '02:24:00', 16, N'Mùa hè này, đa thế giới sẽ va chạm khốc liệt với những bước chạy của FLASH', 3, 22, 1),
(26, N'Xứ sở các nguyên tố', 'Peter Sohn', 2025, '2025-01-10', 'https://www.youtube.com/watch?v=1Vg1hL435OI', 'movie26.jpg', 'movie26.jpg', '01:49:00', 13, N'Xứ Sở Các Nguyên Tố từ Disney và Pixar lấy bối cảnh tại thành phố các nguyên tố, nơi lửa, nước, đất và không khí cùng chung sống với nhau. Câu chuyện xoay quanh nhân vật Ember, một cô nàng cá tính, thông minh, mạnh mẽ và đầy sức hút. Tuy nhiên, mối quan hệ của cô với Wade - một anh chàng hài hước, luôn thuận thế đẩy dòng - khiến Ember cảm thấy ngờ vực với thế giới này', 4, 24, 1),
(27, N'Vú em dạy yêu', 'Gene Stupnitsky', 2024, '2024-06-23', 'https://www.youtube.com/watch?v=q_XWWWlA39k', 'movie27.jpg', 'movie27.jpg', '01:43:00', 18, N'Không dành cho bé dưới 18!.. Red Band Trailer với Jennifer Lawrence trở lại, nóng bỏng cả mắt trong tựa phim hài-bựa-lầy nhất hè năm nay', 5, 25, 1),
(28, N'Lật mặt 6: Tấm vé định mệnh', N'Lý Hải', 2023, '2023-04-28', 'https://www.youtube.com/watch?v=2EnP2tVC00Q', 'movie28.jpg', 'movie28.jpg', '02:12:00', 16, N'Lật mặt 6 sẽ thuộc thể loại giật gân, tâm lý pha hành động, hài hước', 5, 26, 6),
(29, N'Con Nhót mót chồng', N'Vũ Ngọc Đãng', 2023, '2023-04-28', 'https://www.youtube.com/watch?v=e7KHOQ-alqY', 'movie29.jpg', 'movie29.jpg', '01:52:00', 16, N'Bộ phim là câu chuyện của Nhót - người phụ nữ “chưa kịp già” đã sắp bị mãn kinh, vội vàng đi tìm chồng. Nhưng sâu thẳm trong cô, là khao khát muốn có một đứa con và luôn muốn hàn gắn với người cha suốt ngày say xỉn của mình', 4, 27, 6),
(30, N'Mèo Siêu Quậy ở Viện Bảo Tàng', 'Vasiliy Rovenskiy', 2024, '2024-04-28', 'https://www.youtube.com/watch?v=xj4cfU9SHIM', 'movie30.jpg', 'movie30.jpg', '01:20:00', 0, N'Câu chuyện xoay quanh tình bạn của chú mèo Vincent và chú chuột Maurice. Vincent vừa nhận được công việc bảo vệ kiệt tác tranh Mona Lisa trong một viện bảo tàng, còn Maurice lại có niềm đam mê gặm nhấm bức tranh này. Mọi chuyện phức tạp hơn khi có người cũng đang nung nấu ý định cướp lấy tuyệt tác Mona Lisa', 5, 28, 1),
(31, N'Vệ binh dải Ngân Hà 3', 'James Gunn', 2024, '2024-05-05', 'https://www.youtube.com/watch?v=89aYxQcGGA4', 'movie31.jpg', 'movie31.jpg', '02:29:00', 13, N'Cho dù vũ trụ này có bao la đến đâu, các Vệ Binh của chúng ta cũng không thể trốn chạy mãi mãi', 3, 13, 1),
(32, N'Khế ước', 'Guy Ritchie', 2024, '2024-04-21', 'https://www.youtube.com/watch?v=npHvcDj45rg',  'movie32.jpg', 'movie32.jpg', '02:03:00', 18, N'Trong nhiệm vụ cuối cùng ở Afghanistan, Trung sĩ John Kinley cùng đội với phiên dịch viên bản địa Ahmed. Khi đơn vị của họ bị phục kích, Kinley và Ahmed là 2 người sống sót duy nhất. Bị kẻ địch truy đuổi, Ahmed liều mạng đưa Kinley đang bị thương băng qua nhiều dặm đường địa hình khắc nghiệt đến nơi an toàn. Trở về Mỹ, Kinley biết rằng Ahmed và gia đình không dc cấp giấy thông hành tới Mỹ như đã hứa', 5, 29, 1),
(33, N'Đầu gấu đụng đầu đất', 'Park Sung Kwang', 2024, '2024-04-21', 'https://www.youtube.com/watch?v=MagrY1rpOT4', 'movie33.jpg', 'movie33.jpg', '01:38:00', 16, N'Phim Đầu Gấu Đụng Đầu Đất dựa trên câu chuyện thần thoại nổi tiếng tại Hàn Quốc về hai chú gấu sinh đôi hoá thành người sau khi ăn tỏi và ngải cứu trong 100 ngày', 3, 10, 5),
(34, N'Âm vực chết', N'Alessandro Antonaci, Stefano Mandalà, Daniel Lascar', 2023, '2023-12-24', 'https://www.youtube.com/watch?v=CmBuZXqkyLM', 'movie34.jpg', 'movie34.jpg', '01:33:00', 18, N'Sau cái chết của cha, Emma (Penelope Sangiorgi) vội vã bay từ New York về quê nhà ở Ý để lo hậu sự. Trong thời gian diễn ra tang lễ, Emma ở một mình trong căn nhà mà cha mẹ để lại. Lúc này, cô bị buộc phải đối mặt với một thực thể tà ác có khả năng kết nối thông qua một chiếc radio bị nguyền rủa', 4, 30, 9);

DROP TABLE IF EXISTS `film_genre`;
CREATE TABLE `film_genre` (
  `film_genre_id` INT NOT NULL AUTO_INCREMENT,
  `film_id` INT NOT NULL,
  `genre_id` INT NOT NULL,
  PRIMARY KEY(film_genre_id),
  FOREIGN KEY (film_id) REFERENCES `film`(film_id),
  FOREIGN KEY (genre_id) REFERENCES `genre`(genre_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `film_genre`(`film_id`, `genre_id`) VALUES
(1, 1),
(2, 2),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(4, 1),
(5, 2),
(6, 9),
(6, 10),
(7, 6),
(7, 8),
(8, 10),
(9, 1),
(9, 2),
(10, 2),
(10, 3),
(11, 6),
(12, 2),
(12, 6),
(13, 3),
(14, 1),
(15, 2),
(15, 7),
(16, 2),
(16, 7),
(16, 8),
(17, 4),
(18, 6),
(18, 8),
(18, 13),
(19, 7),
(20, 6),
(20, 8),
(21, 7),
(22, 6),
(22, 8),
(22, 12),
(23, 2),
(23, 7),
(23, 8),
(24, 6),
(24, 8),
(24, 12),
(25, 6),
(25, 8),
(25, 13),
(26, 2),
(26, 7),
(26, 11),
(27, 2),
(28, 2),
(28, 6),
(28, 9),
(28, 10),
(29, 2),
(29, 10),
(30, 2),
(30, 7),
(30, 8),
(31, 6),
(31, 8),
(31, 13),
(32, 6),
(32, 9),
(32, 14),
(33, 2),
(33, 6),
(34, 1);

DROP TABLE IF EXISTS `theater`;
CREATE TABLE IF NOT EXISTS `theater` (
  `theater_id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10),
  `number_of_room` INT NOT NULL,
  PRIMARY KEY (`theater_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `theater` (`theater_id`, `name`, `area`, `district`, `address`, `phone`, `number_of_room`) VALUES
(1, N'CGV Vincom Học Viện Anh Hùng', N'Biển Đông', N'Làng Cối Xay Gió', N'10 Đường Mòn', '1234567890', 5),
(2, N'CGV Vincom Đồng Khởi', N'Hồ Chí Minh', N'Quận 1', N'72 Đường Lê Thánh Tôn', '1234567890', 4),
(3, N'CGV Vạn Hạnh Mall', N'Hồ Chí Minh', N'Quận 10', N'Tầng 6 Vạn Hạnh Mall, 11 Đường Sư Vạn Hạnh', '0987564781', 6),
(4, N'CGV Vivo City', N'Hồ Chí Minh', N'Quận 7', N'Tầng 5 TTTM Vivo City, 1058 Đường Nguyễn Văn Linh', '0362758693', 7),
(5, N'CGV Parkson Đồng Khởi', N'Hồ Chí Minh', N'Quận 1', N'Tầng 5 Parson Đồng Khởi', '0967548728', 3),
(6, N'CGV Lý Chính Thắng', N'Hồ Chí Minh', N'Quận 3', N'83 Đường Lý Chính Thằng', '0145386937', 5),
(7, N'CGV Pearl Plaza', N'Hồ Chí Minh', N'Quận Bình Thạnh', N'561A Đường Điện Biên Phủ', '0126574869', 6),
(8, N'CGV Thảo Điền Pearl', N'Hồ Chí Minh', N'Quận 2', N'12 Đường Quốc Hương', '0156347384', 8),
(9, N'CGV Crescent Mall', N'Hồ Chí Minh', N'Quận 7', N'Cresent Mall Đường Nguyễn Văn Linh', '0945362768', 5),
(10, N'CGV Vincom Thủ Đức', N'Hồ Chí Minh', N'Quận Thủ Đức', N'Tầng 6 TTTM Giga Mall, 240, 242 Phạm Văn Đồng', '0935176953', 3),
(11, N'CGV Hùng Vương Plaza', N'Hồ Chí Minh', N'Quận 5', N'Parkson Hùng Vương', '1234567890', 4),
(12, N'CGV Pandora City', N'Hồ Chí Minh', N'Quận Tân Phú', N'Pandora City, 1/1 Đường Trường Chinh', '0987654321', 3),
(13, N'CGV Aeon Tân Phú', N'Hồ Chí Minh', N'Quận Tân Phú', N'Aeon Mall, 30 Đường Tân Phú', '09577231843', 8),
(14, N'CGV Vincom Center Landmark 81', N'Hồ Chí Minh', N'Quận Bình Thạnh', N'Tầng B1, TTTM Vincom Center Landmark 81, 772 Điện Biên Phủ', '1239876540', 7);

-- Loại rạp (2D, 3D, ...)
DROP TABLE IF EXISTS `format`;
CREATE TABLE `format` (
	`format_id` INT NOT NULL AUTO_INCREMENT,
	`format_name` TEXT NOT NULL,
	PRIMARY KEY (format_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO format(`format_id`, `format_name`) VALUES
(1, '2D'),
(2, '3D');

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
	`room_id` INT NOT NULL AUTO_INCREMENT,
	`room_name` VARCHAR(50) NOT NULL,
	`number_of_seats` INT NOT NULL,
	`theater_id` INT NOT NULL,
	PRIMARY KEY (room_id),
	FOREIGN KEY (theater_id) REFERENCES `theater`(theater_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `room`(`room_id`, `room_name`, `number_of_seats`, `theater_id`) VALUES
(1, 'Room 1', 100, 1),
(2, 'Room 2', 80, 1),
(3, 'Room 3', 100, 2),
(4, 'Room 4', 80, 2),
(5, 'Room 5', 100, 3),
(6, 'Room 6', 80, 3),
(7, 'Room 7', 100, 4),
(8, 'Room 8', 80, 4),
(9, 'Room 9', 100, 5),
(10, 'Room 10', 80, 5),
(11, 'Room 11', 100, 6),
(12, 'Room 12', 80, 6),
(13, 'Room 13', 100, 7),
(14, 'Room 14', 80, 7);

DROP TABLE IF EXISTS `showtime`;
CREATE TABLE IF NOT EXISTS `showtime` (
  `showtime_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `price` INT NOT NULL,
  status INT NOT NULL,
  `film_id` INT NOT NULL,
	`room_id` INT NOT NULL,
	`format_id` INT NOT NULL,
  PRIMARY KEY (showtime_id),
	FOREIGN KEY (film_id) REFERENCES `film`(film_id),
	FOREIGN KEY (room_id) REFERENCES `room`(room_id),
	FOREIGN KEY (format_id) REFERENCES `format`(format_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `showtime`(`start_time`, `end_time`, `price`, status, `film_id`, `room_id`, `format_id`) VALUES
('14:00:00', '16:00:00', 100, 1, 1, 1, 1),
('16:00:00', '18:00:00', 120, 1, 1, 2, 1),
('12:00:00', '14:00:00', 100, 1, 2, 3, 2),
('10:00:00', '12:00:00', 120, 1, 2, 4, 2),
('08:00:00', '10:00:00', 100, 1, 3, 5, 1),
('08:00:00', '10:00:00', 120, 1, 3, 6, 1),
('10:00:00', '12:00:00', 100, 1, 4, 7, 2),
('12:00:00', '14:00:00', 120, 1, 4, 8, 2),
('14:00:00', '16:00:00', 100, 1, 5, 9, 1),
('16:00:00', '18:00:00', 120, 1, 5, 10, 1),
('08:00:00', '10:00:00', 100, 1, 6, 11, 2),
('10:00:00', '12:00:00', 120, 1, 6, 12, 2),
('12:00:00', '14:00:00', 100, 1, 7, 13, 1),
('14:00:00', '16:00:00', 120, 1, 7, 14, 1),
('16:00:00', '18:00:00', 100, 1, 8, 1, 2),
('08:00:00', '10:00:00', 120, 1, 8, 2, 2),
('10:00:00', '12:00:00', 100, 1, 9, 3, 1),
('12:00:00', '14:00:00', 120, 1, 9, 4, 1),
('14:00:00', '16:00:00', 100, 1, 10, 5, 2),
('16:00:00', '18:00:00', 120, 1, 10, 6, 2),
('08:00:00', '10:00:00', 100, 1, 11, 7, 1),
('10:00:00', '12:00:00', 120, 1, 11, 8, 1),
('12:00:00', '14:00:00', 100, 1, 12, 9, 2),
('14:00:00', '16:00:00', 120, 1, 12, 10, 2),
('16:00:00', '18:00:00', 100, 1, 13, 11, 1),
('08:00:00', '10:00:00', 120, 1, 13, 12, 1),
('10:00:00', '12:00:00', 100, 1, 14, 13, 2),
('12:00:00', '14:00:00', 120, 1, 14, 14, 2),
('14:00:00', '16:00:00', 100, 1, 15, 1, 1),
('16:00:00', '18:00:00', 120, 1, 15, 2, 1),
('08:00:00', '10:00:00', 100, 1, 16, 3, 2),
('10:00:00', '12:00:00', 120, 1, 16, 4, 2),
('12:00:00', '14:00:00', 100, 1, 17, 5, 1),
('14:00:00', '16:00:00', 120, 1, 17, 6, 1),
('16:00:00', '18:00:00', 100, 1, 18, 7, 2),
('08:00:00', '10:00:00', 120, 1, 18, 8, 2),
('10:00:00', '12:00:00', 100, 1, 19, 9, 1),
('12:00:00', '14:00:00', 120, 1, 19, 10, 1),
('14:00:00', '16:00:00', 100, 1, 20, 11, 2),
('16:00:00', '18:00:00', 120, 1, 20, 12, 2),
('08:00:00', '10:00:00', 100, 1, 21, 13, 1),
('10:00:00', '12:00:00', 120, 1, 21, 14, 1),
('12:00:00', '14:00:00', 100, 1, 22, 1, 2),
('14:00:00', '16:00:00', 120, 1, 22, 2, 2),
('16:00:00', '18:00:00', 100, 1, 23, 3, 1),
('08:00:00', '10:00:00', 120, 1, 23, 4, 1),
('10:00:00', '12:00:00', 100, 1, 24, 5, 2),
('12:00:00', '14:00:00', 120, 1, 24, 6, 2),
('14:00:00', '16:00:00', 100, 1, 25, 7, 1),
('16:00:00', '18:00:00', 120, 1, 25, 8, 1),
('08:00:00', '10:00:00', 100, 1, 26, 9, 2),
('10:00:00', '12:00:00', 120, 1, 26, 10, 2),
('12:00:00', '14:00:00', 100, 1, 27, 11, 1),
('14:00:00', '16:00:00', 120, 1, 27, 12, 1),
('16:00:00', '18:00:00', 100, 1, 28, 13, 2),
('08:00:00', '10:00:00', 120, 1, 28, 14, 2),
('10:00:00', '12:00:00', 100, 1, 29, 1, 1),
('12:00:00', '14:00:00', 120, 1, 29, 2, 1),
('14:00:00', '16:00:00', 100, 1, 30, 3, 2),
('16:00:00', '18:00:00', 120, 1, 30, 4, 2),
('08:00:00', '10:00:00', 100, 1, 31, 5, 1),
('10:00:00', '12:00:00', 120, 1, 31, 6, 1),
('12:00:00', '14:00:00', 100, 1, 32, 7, 2),
('14:00:00', '16:00:00', 120, 1, 32, 8, 2),
('16:00:00', '18:00:00', 100, 1, 33, 9, 1),
('08:00:00', '10:00:00', 120, 1, 33, 10, 1),
('10:00:00', '12:00:00', 100, 1, 34, 11, 2),
('12:00:00', '14:00:00', 120, 1, 34, 12, 2);

DROP TABLE IF EXISTS `ticket_status`;
CREATE TABLE `ticket_status` (
	`status_id` INT NOT NULL AUTO_INCREMENT,
	`status_name` TEXT NOT NULL,
	PRIMARY KEY (status_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ticket_status`(`status_id`, `status_name`) VALUES
(1, 'Available'),
(2, 'Booked'),
(3, 'Sold Out');

DROP TABLE IF EXISTS `seat`;
CREATE TABLE `seat` (
	`seat_id` INT NOT NULL AUTO_INCREMENT,
	`seat_name` TEXT NOT NULL,
	`type` VARCHAR(20) DEFAULT N'Thường' NOT NULL, -- Ghế VIP hoặc thường
	`room_id` INT NOT NULL,
	PRIMARY KEY (seat_id),
	FOREIGN KEY (room_id) REFERENCES `room`(room_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `seat`(`seat_name`, `type`, `room_id`) VALUES
('Seat 1', 'Standard', 1),
('Seat 2', 'VIP', 1),
('Seat 3', 'Standard', 1),
('Seat 4', 'VIP', 1),
('Seat 5', 'Standard', 2),
('Seat 6', 'VIP', 2),
('Seat 7', 'Standard', 2),
('Seat 8', 'VIP', 2),
('Seat 9', 'Standard', 3),
('Seat 10', 'VIP', 3),
('Seat 11', 'Standard', 3),
('Seat 12', 'VIP', 3),
('Seat 13', 'Standard', 4),
('Seat 14', 'VIP', 4),
('Seat 15', 'Standard', 4),
('Seat 16', 'VIP', 4),
('Seat 17', 'Standard', 5),
('Seat 18', 'VIP', 5),
('Seat 19', 'Standard', 5),
('Seat 20', 'VIP', 5),
('Seat 21', 'Standard', 6),
('Seat 22', 'VIP', 6),
('Seat 23', 'Standard', 6),
('Seat 24', 'VIP', 6),
('Seat 25', 'Standard', 7),
('Seat 26', 'VIP', 7),
('Seat 27', 'Standard', 7),
('Seat 28', 'VIP', 7),
('Seat 29', 'Standard', 8),
('Seat 30', 'VIP', 8),
('Seat 31', 'Standard', 8),
('Seat 32', 'VIP', 8),
('Seat 33', 'Standard', 9),
('Seat 34', 'VIP', 9),
('Seat 35', 'Standard', 9),
('Seat 36', 'VIP', 9),
('Seat 37', 'Standard', 10),
('Seat 38', 'VIP', 10),
('Seat 39', 'Standard', 10),
('Seat 40', 'VIP', 10),
('Seat 41', 'Standard', 11),
('Seat 42', 'VIP', 11),
('Seat 43', 'Standard', 11),
('Seat 44', 'VIP', 11),
('Seat 45', 'Standard', 12),
('Seat 46', 'VIP', 12),
('Seat 47', 'Standard', 12),
('Seat 48', 'VIP', 12),
('Seat 49', 'Standard', 13),
('Seat 50', 'VIP', 13),
('Seat 51', 'Standard', 13),
('Seat 52', 'VIP', 13),
('Seat 53', 'Standard', 14),
('Seat 54', 'VIP', 14),
('Seat 55', 'Standard', 14),
('Seat 56', 'VIP', 14);

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
	`ticket_id` INT NOT NULL AUTO_INCREMENT,
	`showtime_id` INT NOT NULL,
	`seat_id` INT NOT NULL,
	`status_id` INT NOT NULL,
	PRIMARY KEY (ticket_id),
	FOREIGN KEY (showtime_id) REFERENCES `showtime`(showtime_id),
	FOREIGN KEY (seat_id) REFERENCES `seat`(seat_id),
	FOREIGN KEY (status_id) REFERENCES `ticket_status`(status_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ticket`(`showtime_id`, `seat_id`, `status_id`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 1),
(1, 4, 2),
(2, 1, 1),
(2, 2, 2),
(2, 3, 1),
(2, 4, 2),
(3, 1, 1),
(3, 2, 2),
(3, 3, 1),
(3, 4, 2),
(4, 1, 1),
(4, 2, 2),
(4, 3, 1),
(4, 4, 2),
(5, 1, 1),
(5, 2, 2),
(5, 3, 1),
(5, 4, 2),
(6, 1, 1),
(6, 2, 2),
(6, 3, 1),
(6, 4, 2),
(7, 1, 1),
(7, 2, 2),
(7, 3, 1),
(7, 4, 2),
(8, 1, 1),
(8, 2, 2),
(8, 3, 1),
(8, 4, 2),
(9, 1, 1),
(9, 2, 2),
(9, 3, 1),
(9, 4, 2),
(10, 1, 1),
(10, 2, 2),
(10, 3, 1),
(10, 4, 2);

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
	`item_id` INT NOT NULL AUTO_INCREMENT,
	`name` TEXT NOT NULL,
	`price` INT NOT NULL,
	`image_url` TEXT NOT NULL,
	`status` INT NOT NULL, -- 1 = true: còn món, 0 = false: hết món
	PRIMARY KEY (item_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO menu (`name`, price, `image_url`, status) VALUES
(N'Bắp thường', 50000, 'item1.jpg', 1),
(N'Coca Cola', 15000, 'item2.jpg', 1),
(N'Pepsi', 12000, 'item3.jpg', 1),
(N'Nước cam', 20000, 'item4.jpg', 1),
(N'Snack', 15000, 'item5.jpg', 1),
(N'Bắp phô mai', 70000, 'item6.jpg', 1),
(N'Combo 1 bắp thường 1 nước tự chọn', 80000, 'item7.jpg', 1),
(N'Combo 1 bắp phô mai 2 nước tự chọn', 120000, 'item8.jpg', 1);

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion` (
	`promotion_id` INT NOT NULL AUTO_INCREMENT,
	`promotion_name` TEXT NOT NULL,
	`description` TEXT NOT NULL,
	`start_time` TIMESTAMP NOT NULL,
	`end_time` TIMESTAMP NOT NULL,
	`discount` INT NOT NULL,
	`code` TEXT NOT NULL,
	`url_image` TEXT NOT NULL,
	PRIMARY KEY (promotion_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` INT NOT NULL AUTO_INCREMENT,
  `number_of_tickets` INT NOT NULL,
  `total_price` INT NOT NULL,
  `booking_time` TIMESTAMP NOT NULL,
	`show_time` TIMESTAMP NOT NULL,
	`status` BOOLEAN NOT NULL,
	`promotion_id` INT NOT NULL,
  `theater_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`),
  FOREIGN KEY (promotion_id) REFERENCES `promotion`(promotion_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

DROP TABLE IF EXISTS `film_ticket`;
CREATE TABLE `film_ticket` (
  `film_ticket_id` INT NOT NULL AUTO_INCREMENT,
  `film_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `seat` VARCHAR(10) NOT NULL,
  `shows_id` INT NOT NULL,
  PRIMARY KEY(film_ticket_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

COMMIT;
