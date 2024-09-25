SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

--
-- Tạo table `add_property`
--

CREATE TABLE `add_property` (
  `property_id` int(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `ward_no` int(10) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `estimated_price` bigint(10) NOT NULL,
  `total_rooms` int(10) NOT NULL,
  `bedroom` int(10) NOT NULL,
  `living_room` int(10) NOT NULL,
  `kitchen` int(10) NOT NULL,
  `bathroom` int(10) NOT NULL,
  `booked` varchar(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `owner_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insert  data 
--

INSERT INTO `add_property` (`property_id`, `country`, `province`, `district`, `city`, `ward_no`, `contact_no`, `property_type`, `estimated_price`, `total_rooms`, `bedroom`, `living_room`, `kitchen`, `bathroom`,`booked`, `description`, `latitude`, `longitude`, `owner_id`) VALUES
(123, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 3, 9860462146, 'Nguyên căn', 2000000, 12, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(124, 'Việt Nam', 'Hồ Chí Minh','Quận 1', 'Lê Duẩn, Bến Nghé', 30, 9860462146, 'Một phòng', 2000000, 12, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(125, 'Việt Nam', 'Hồ Chí Minh','Quận 1', 'Nguyễn Trung Ngạn, Bến Nghé', 12, 9860462146, 'Nguyên căn', 2000000, 12, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(126, 'Việt Nam', 'Hồ Chí Minh','Quận 1', 'Trần Quang Khải, Tân Định', 123, 9860462146, 'Một phòng', 2000000, 12, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(127, 'Việt Nam', 'Hồ Chí Minh','Quận 10', 'Thành Thái, Phường 12', 001, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(128, 'Việt Nam', 'Hồ Chí Minh','Quận 10', 'Sư Vạn Hạnh, Phường 02', 1235, 9860462146, 'Một lầu', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(129, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 1231235, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(130, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 534, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(131, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 346745, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(132, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 75, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(133, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 237, 9860462146, 'Một phòng', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(134, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 324, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(135, 'Việt Nam', 'Hồ Chí Minh','Quận Bình Thạnh', 'Bùi Đình Túy, Phường 12', 721, 9860462146, 'Một phòng', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(136, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 734, 9860462146, 'Một lầu', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(137, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 623, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(138, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 6346, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(139, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 234, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(140, 'Việt Nam', 'Hồ Chí Minh','Quận Bình Thạnh', 'Đường Nguyễn Hữu Cảnh, Phường 22', 16, 9860462146, 'Một phòng', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(141, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 885, 9860462146, 'Nguyên căn', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1),
(142, 'Việt Nam', 'Hồ Chí Minh','Quận 7', 'Nguyễn Hữu Thọ Tân Phong', 45, 9860462146, 'Một phòng', 2000000, 2, 3, 3, 3, 3, 'Còn trống','Nhà mặt phố bố làm to' ,'27.679130', '85.327872', 1);


-- --------------------------------------------------------

--
-- Tạo table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insert data  `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '12345');

--
-- Tạo table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insert data `owner`
--

INSERT INTO `owner` (`owner_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`) VALUES
(1, 'Phan Huỳnh Toàn Đức', 'phanhuynhtoanduc@gmail.com', '12345', 987654321, 'Hồ Chí Minh', 'Chứng minh nhân dân', 'owner-photo/chungminh1.png');

-- --------------------------------------------------------

--
-- Tạo `property_photo` chứa ảnh nhà
--

CREATE TABLE `property_photo` (
  `property_photo_id` int(12) NOT NULL,
  `p_photo` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insert
--

INSERT INTO `property_photo` (`property_photo_id`, `p_photo`, `property_id`) VALUES
(174, 'product-photo/1.jpg', 123),
(175, 'product-photo/2.jpg', 123),
(176, 'product-photo/c.jpg', 124),
(177, 'product-photo/d.jpg', 124),
(178, 'product-photo/1.jpg', 125),
(179, 'product-photo/2.jpg', 126),
(180, 'product-photo/c.jpg', 127),
(181, 'product-photo/1.jpg', 128),
(182, 'product-photo/2.jpg', 129),
(183, 'product-photo/c.jpg', 130),
(184, 'product-photo/1.jpg', 131),
(185, 'product-photo/2.jpg', 132),
(186, 'product-photo/c.jpg', 133),
(187, 'product-photo/2.jpg', 134),
(18, 'product-photo/c.jpg', 135),
(189, 'product-photo/1.jpg', 136),
(190, 'product-photo/2.jpg', 137),
(191, 'product-photo/c.jpg', 138),
(192, 'product-photo/2.jpg', 139),
(193, 'product-photo/c.jpg', 140),
(194, 'product-photo/1.jpg', 141),
(195, 'product-photo/2.jpg', 142);


--
-- Tạo table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(5) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- insert
--

INSERT INTO `review` (`review_id`, `comment`, `rating`, `property_id`) VALUES
(5, 'Nhà đẹp đấy em trai.', 5, 123),
(6, 'Nhà đẹp đấy em.', 4, 124);

--
-- table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data 
--

INSERT INTO `tenant` (`tenant_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`) VALUES
(17, 'Đào Ngọc Bách', 'daongocbach@gmail.com', '12345', 987654321, 'Hồ Chí Minh', 'Chứng minh nhân dân', 'tenant-photo/chungminh2.png');

--
-- Thêm khóa chính 
--

ALTER TABLE `add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `owner_id` (`owner_id`);

--
--  `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
--  `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- `property_photo`
--
ALTER TABLE `property_photo`
  ADD PRIMARY KEY (`property_photo_id`),
  ADD KEY `property_id` (`property_id`);

--
-- `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `property_id` (`property_id`);

--
-- `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT cho id `add_property`
--
ALTER TABLE `add_property`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- `property_photo`
--
ALTER TABLE `property_photo`
  MODIFY `property_photo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
--  `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Khóa ngoại `add_property`
--
ALTER TABLE `add_property`
  ADD CONSTRAINT `add_property_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`);

ALTER TABLE `property_photo`
  ADD CONSTRAINT `property_photo_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);


ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);

--
-- talbe `booking`
--

CREATE TABLE `booking`(
  `booking_id` int(10) NOT NULL,
  `estimated_price` bigint(10),
  `time` varchar(100),
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `property_id` (`property_id`);



ALTER TABLE `booking`
  MODIFY `booking_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);


ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`);

--
-- talbe `chat`
--

CREATE TABLE `chat`(
  `chat_id` int(10) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `message` nvarchar(100000000) NOT NULL,
  `owner_id` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `owner_id` (`owner_id`);

ALTER TABLE `chat`
  MODIFY `chat_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`);


ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`);
COMMIT;
