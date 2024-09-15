-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 12, 2024 lúc 06:19 PM
-- Phiên bản máy phục vụ: 10.5.20-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id22006471_cathai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CauHoi`
--

CREATE TABLE `CauHoi` (
  `id` int(11) NOT NULL,
  `idtieudiem` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `CauHoi`
--

INSERT INTO `CauHoi` (`id`, `idtieudiem`, `noidung`, `note`) VALUES
(4, 9, 'Pháo đài thần công chính thức mở cửa đón khách du lịch vào lúc nào?', ''),
(5, 9, 'Pháo đài thần công còn có tên gọi là gì?', ''),
(6, 9, 'Pháo đài thần công được xây dựng năm nào?', ''),
(7, 9, 'Pháo Đài Thần Công là một công trình gì?', ''),
(12, 11, 'Mắm tôm Cát Hải có chứng chỉ iso nào', ''),
(13, 11, 'Để làm đc chai mắm tôm cần mấy bước', ''),
(14, 11, 'Mắm tôm Cát Hải được làm từ gì', ''),
(15, 1, 'Mắm tôm được làm theo tiêu chuẩn nào', ''),
(16, 1, 'Mắm tôm có mấy bước để làm ra', ''),
(17, 1, 'mắm tôm được làm từ gì', ''),
(18, 54, 'Đình chùa gia lộc được xây dựng năm nào\r\n', ''),
(19, 54, 'khu di tích có phải lịch sử văn hóa và là cấp gì', ''),
(20, 55, 'Hang quân y ở huyện nào', ''),
(21, 56, 'Hầm chống bom nguyên tử còn được gọi là gì', ''),
(22, 58, 'pháo đài thần công được đặt ở đâu', ''),
(23, 58, 'Địa chỉ ở ', ''),
(24, 17, 'Vịnh Lan Hạ nằm ở đâu', ''),
(25, 17, 'Các điểm vui chơi khi đến Vịnh (đuọc chọn 2 trở lên)', ''),
(26, 18, 'Đê chắn sóng dài bao nhiêu km', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DapAn`
--

CREATE TABLE `DapAn` (
  `id` int(11) NOT NULL,
  `idcauhoi` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `DapAn`
--

INSERT INTO `DapAn` (`id`, `idcauhoi`, `noidung`, `status`) VALUES
(9, 4, '13/5/2010', 0),
(10, 4, '13/6/2010', 1),
(11, 4, '14/7/2010', 0),
(12, 4, '20/8/2011', 0),
(13, 5, 'Cứ điểm 177', 1),
(14, 5, 'Doanh trại Cát Bà', 0),
(15, 5, 'Quân khu 3', 0),
(16, 5, 'Việt Bắc', 0),
(17, 6, '1940', 0),
(18, 6, '1942', 1),
(19, 6, '1950', 0),
(20, 6, '1965', 0),
(21, 7, 'Công trình hành chính', 0),
(22, 7, 'Công trình dân sự', 0),
(23, 7, 'Công trình quân sự', 1),
(24, 7, 'Công trình xây dựng', 0),
(41, 12, 'ISO 9001:2015', 1),
(42, 12, 'ISO 14000:2015', 0),
(43, 12, 'ISO 19001:2018', 0),
(44, 12, 'ISO 90010:2017', 0),
(45, 13, '1', 0),
(46, 13, '2', 0),
(47, 13, '3', 1),
(48, 13, '4', 0),
(49, 14, 'ruốc', 1),
(50, 14, 'tôm', 0),
(51, 14, 'cá', 0),
(52, 15, 'ISO 9001:2015', 1),
(53, 15, 'ISO 9002:2015', 0),
(54, 15, 'ISO 9003:2015', 0),
(55, 15, 'ISO 9004:2015', 0),
(56, 16, '1', 0),
(57, 16, '2', 0),
(58, 16, '3', 1),
(59, 16, '4', 0),
(60, 17, 'ruốc', 1),
(61, 17, 'tôm', 0),
(62, 17, 'cá', 0),
(63, 18, '1816', 1),
(64, 18, '1900', 0),
(65, 18, '1888', 0),
(66, 18, '2000', 0),
(67, 19, 'có , cấp huyện', 0),
(68, 19, 'không là lịch sử văn hóa', 0),
(69, 19, 'có , lịch sử cấp thành phố', 1),
(70, 19, '', 0),
(71, 20, 'Hải Sơn', 1),
(72, 20, 'Hải An ', 0),
(73, 20, 'Nghĩa Lộ', 0),
(74, 20, 'Văn Phong', 0),
(75, 21, 'hầm tránh bom', 0),
(76, 21, 'nơi trú nạn', 0),
(77, 21, 'hầm chữ u', 1),
(78, 21, 'khu tập hợp', 0),
(79, 22, 'hòn ngọc xanh', 1),
(80, 22, 'nhà dân', 0),
(81, 22, 'biển', 0),
(82, 22, 'khuất trong khu dân cư', 0),
(83, 23, 'Cái bèo', 1),
(84, 23, 'xuân đám', 0),
(85, 23, 'đà nẵng', 0),
(86, 24, 'phía đông cát bà', 1),
(87, 24, 'phía tây cát bà', 0),
(88, 24, 'phía nam cát bà', 0),
(89, 24, 'phía bắc cát bà', 0),
(90, 25, 'bãi tắm vạn bội', 1),
(91, 25, 'nơi ăn chơi ', 0),
(92, 25, 'đảo khỉ', 1),
(93, 25, 'đảo du lịch', 1),
(94, 26, '10km', 0),
(95, 26, '20km', 0),
(96, 26, '25km', 1),
(97, 26, '5km', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `name`, `note`) VALUES
(1, 'Ẩm thực', ''),
(2, 'Di tích', ''),
(3, 'Nghề làm mắm', ''),
(4, 'Du lịch', ''),
(5, 'Lễ hội', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TieuDiem`
--

CREATE TABLE `TieuDiem` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `idtheloai` int(11) NOT NULL,
  `description` text NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `TieuDiem`
--

INSERT INTO `TieuDiem` (`id`, `name`, `idtheloai`, `description`, `lat`, `lng`, `note`) VALUES
(1, 'Mắm tôm Cát Hải', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(66, 66, 66);\">Mắm Tôm Quang Hải được làm từ con tép biển (còn gọi là con ruốc, tôm biển, con moi ) tươi cùng với muối biển sạch được say nhuyễn và ủ lên men tự nhiên theo phương pháp truyền thống. Sau 12 tháng chăm sóc kỳ công, những mẻ mắm thơm dịu, vị thanh, màu hồng tím tự nhiên được tạo thành Mắm Tôm Quang Hải.</span></p><p><br></p>', 20.802464967746943, 106.99649956351772, ''),
(3, 'Sam biển', 1, '<p>https://vnexpress.net/gia-be-xao-dac-san-thu-thach-long-kien-nhan-o-hai-phong-4637033.html</p>', 20.802464967746943, 106.99649956351772, ''),
(4, 'Tu hài', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;Tại đảo Cát Bà còn có một loại hải sản cực kỳ quý hiếm với hàm lượng dinh dưỡng cao và cực kỳ thơm ngon đó là tu hài. Nghe tên có vẻ khá lạ lẫm nhưng loại hải sản này được chế biến trong các món nướng, hấp, cháo, gỏi,...&nbsp;</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">rất nhiều giúp tăng sự dẻo dai cho xương khớp và hỗ trợ tăng&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/kinh-nghiem-hay/hormone-la-gi-hormone-dong-vai-tro-gi-cho-suc-khoe-va-sac-dep-1324897\" rel=\"noopener noreferrer\" target=\"_blank\">hormone</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;cho nam giới.</strong></p><p><br></p>', 20.802464967746943, 106.99649956351772, ''),
(12, 'Nước mắm Cát Hải', 3, 'https://mia.vn/cam-nang-du-lich/nuoc-mam-cat-hai-thuc-qua-quy-tu-xu-cang-hai-phong-4396', 20.802464967746943, 106.99649956351772, ''),
(13, 'Nước mắm Cát Hải', 3, 'https://mia.vn/cam-nang-du-lich/nuoc-mam-cat-hai-thuc-qua-quy-tu-xu-cang-hai-phong-4396', 20.802464967746943, 106.99649956351772, ''),
(14, 'Nước mắm Cát Hải', 3, 'https://mia.vn/cam-nang-du-lich/nuoc-mam-cat-hai-thuc-qua-quy-tu-xu-cang-hai-phong-4396', 20.802464967746943, 106.99649956351772, ''),
(15, 'Nước mắm Cát Hải', 3, 'https://mia.vn/cam-nang-du-lich/nuoc-mam-cat-hai-thuc-qua-quy-tu-xu-cang-hai-phong-4396', 20.802464967746943, 106.99649956351772, ''),
(16, 'Nước mắm Cát Hải', 3, 'https://mia.vn/cam-nang-du-lich/nuoc-mam-cat-hai-thuc-qua-quy-tu-xu-cang-hai-phong-4396', 20.802464967746943, 106.99649956351772, ''),
(17, 'Vịnh Lan Hạ', 4, 'https://vinpearl.com/vi/vinh-lan-ha-cat-ba-review-dao-ngoc-thien-duong-cua-hai-phong', 20.802464967746943, 106.99649956351772, ''),
(18, 'Đê chắn sóng Cát Hải', 4, 'https://mia.vn/cam-nang-du-lich/den-bo-de-chan-song-cat-hai-tron-pho-thi-nao-nhiet-vao-cuoi-tuan-10815', 20.802464967746943, 106.99649956351772, ''),
(19, 'Ga Cát Hải - đi cáp treo', 4, 'https://catba.sunworld.vn/kinh-nghiem-di-cap-treo-cat-ba/', 20.802464967746943, 106.99649956351772, ''),
(20, 'Cát Bà Xanh', 5, '<p>https://vov.vn/xa-hoi/tin-24h/nhieu-hoat-dong-ky-niem-65-nam-bac-ho-ve-tham-lang-ca-cat-ba-post1086051.vov#:~:text=VOV.VN%20%2D%20K%E1%BB%B7%20ni%E1%BB%87m%2065,l%E1%BB%8Bch%20C%C3%A1t%20B%C3%A0%20n%C4%83m%202024.</p>', 20.802464967746943, 106.99649956351772, ''),
(21, 'Đua thuyền rồng', 5, 'https://haiphong.gov.vn/tin-tuc-su-kien/giai-dua-thuyen-rong-huyen-cat-hai-tranh-cup-bao-hai-phong-lan-thu-28-680867', 20.802464967746943, 106.99649956351772, ''),
(46, 'Vườn quốc gia Cát Bà', 4, '<p><br></p>', 0, 0, ''),
(47, 'Bề bề', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">Bề bề hay tôm tít là loại hải sản xuất hiện nhiều tại đảo Cát Bà với kích thước lớn hơn tôm sú, ngọt thịt và mức giá cũng phải chăng nên được nhiều du khách yêu thích.</span></p><p><br></p>', 0, 0, ''),
(48, 'Bún tôm', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">Nếu bạn đã đặt chân đến đảo Cát Bà</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;thì phải thưởng thức ngay một tô bún tôm ngập tràn topping nào&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/ca-tom-muc-ech-tom\" rel=\"noopener noreferrer\" target=\"_blank\">tôm</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">,&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/ca-tom-muc-ech/cha-ca-basa-tuoi-goi-200gr\" rel=\"noopener noreferrer\" target=\"_blank\">chả cá</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">,</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/rau-sach/bac-ha-khay-200g\" rel=\"noopener noreferrer\" target=\"_blank\">&nbsp;bạc hà</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">,&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/cu/ca-chua-beef-500g\" rel=\"noopener noreferrer\" target=\"_blank\">cà chua</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">,&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/rau-sach/rau-thi-la-goi-100g\" rel=\"noopener noreferrer\" target=\"_blank\">thì là</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">,...</strong><span style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;cho đã cái bụng mới được. Bún tôm</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;là một trong những đặc sản mà chỉ có ở Cát Bà mới giữ được hương vị đậm đà từ phần nước dùng đến độ tươi ngon của hải sản ăn kèm.</strong></p><p><br></p>', 0, 0, ' '),
(49, 'Rắn biển khô hoặc rắn ngâm rượu', 1, '<p class=\"ql-align-justify\"><strong style=\"background-color: white; color: rgb(51, 51, 51);\">Rắn biển khô hoặc rượu rắn ngâm được xem là bài thuốc quý giúp trị đau nhức xương khớp</strong><span style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;rất hiệu quả. Tuy nghe đến rắn thì nhiều người sẽ cảm thấy sợ nhưng rắn biển tại đảo Cát Bà đã được người dân lấy hết phần nội tạng,</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;chỉ giữ lại mật và lớp, rửa sạch với cồn 90 độ sau đó thì sấy hoặc phơi khô thì mới ra được thành phẩm quý hiếm cho du khách.</strong></p><p><br></p>', 0, 0, ' '),
(50, 'nước mắm Cát Hải', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">Nhắc đến đặc sản phải thì nước mắm Cát Hải quá nổi tiếng vì chính tên đã nói nên thương hiệu xuất sứ </span></p><p><br></p>', 0, 0, ' '),
(51, 'Mực khô , cá chỉ vàng', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">Ngoài những loại hải sản tươi ngon thì du khách cũng có thể tìm mua những sản phẩm đồ khô từ hải sản như mực khô và&nbsp;</span><a href=\"https://www.bachhoaxanh.com/ca-tom-muc-ech/kho-ca-chi-vang-khay-200g\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: white; color: rgb(0, 100, 194);\">khô cá chỉ vàng</a><span style=\"background-color: white; color: rgb(51, 51, 51);\">.&nbsp;</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">Đặc trưng của mực khô hay khô cá chỉ vàng chính là phải nướng trên than hoa hoặc cồn và chấm với chí chương (một loại&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/tuong-ot-ca-den-tuong-ot\" rel=\"noopener noreferrer\" target=\"_blank\">tương ớt</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;tại Hải Phòng) thì mới đúng điệu.</strong></p><p><br></p>', 0, 0, ' '),
(52, 'Mật ong vườn quốc gia Cát Bà', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">Không chỉ nổi tiếng bởi hải sản phong phú mà đảo Cát Bà còn có một loại&nbsp;</span><a href=\"https://www.bachhoaxanh.com/mat-ong\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: white; color: rgb(0, 100, 194);\">mật ong</a><span style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;trứ danh. Mật ong tại đây được lấy từ những loài hoa rừng quý trong vườn quốc gia Cát Bà.&nbsp;</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">Mật ong rừng Cát Bà có màu vàng đậm, đặc sánh, mùi thơm tự nhiên và hàm lượng dinh dưỡng cao tốt cho sức khỏe.</strong><span style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;Du khách có thể tìm mua tại nhiều cửa hàng địa phương trên đảo nhé.</span></p><p><br></p>', 0, 0, ' '),
(53, 'Cá thu một nắng', 1, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">Khác với những loại cá thu một nắng thường thấy, nguyên liệu chính của đặc sản này là cá thu phấn tại vùng biển Cát Bà.&nbsp;</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">Cá thu phấn chứa nhiều&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/kinh-nghiem-hay/chat-dam-hay-protein-la-gi-984580\" rel=\"noopener noreferrer\" target=\"_blank\">đạm</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;và&nbsp;</strong><strong style=\"background-color: white; color: rgb(0, 100, 194);\"><a href=\"https://www.bachhoaxanh.com/kinh-nghiem-hay/chat-beo-khong-bao-hoa-la-gi-chat-beo-khong-bao-hoa-co-loi-hay-hai-cho-co-the-1323881\" rel=\"noopener noreferrer\" target=\"_blank\">chất béo không bão hòa</a></strong><strong style=\"background-color: white; color: rgb(51, 51, 51);\">&nbsp;giúp ngăn ngừa bệnh tim mạch, ung thư vú,...</strong></p><p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(51, 51, 51);\">Du khách khi thưởng thức cá thu một nắng tại đảo Cát Bà thì không phải sợ mùi tanh mà chỉ cảm nhận được vị mặn đặc trưng, ngọt béo và đậm đà trong từng khứa cá thu.&nbsp;</span><strong style=\"background-color: white; color: rgb(51, 51, 51);\">Cá thu một nắng được bán rộng rãi tại nhiều cửa hàng lớn nhỏ trên đảo Cát Bà nên du khách có thể mua bất cứ lúc nào.</strong></p><p><br></p>', 0, 0, ' '),
(54, 'Đình chùa gia lộc', 2, '<p><span style=\"background-color: white; color: rgb(56, 56, 56);\">Khu di tích đình chùa Gia Lộc nằm tại địa bàn tổ dân phố Tiến Lộc và Hải Lộc thị trấn Cát Hải, huyện Cát Hải, thành phố Hải Phòng</span></p><p><span style=\"background-color: white; color: rgb(56, 56, 56);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đình Gia Lộc thờ Đông Hải Đại Vương ( Tên húy là Đoàn Thượng) xây dựng năm 1816, được tôn tạo năm 1916 đến nay đã qua 2 lần trùng tu vẫn giữ được nét kiến trúc cổ.</span></p><p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(56, 56, 56);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chùa Gia Lộc có quy mô rộng lớn, đẹp từ hậu đường đế gác chuông, dựng từ thế kỷ 17, năm 1705 dựng cây thiên đài. Chùa còn lại các tượng phật rất đẹp, đặc biệt là pho tượng Quan Âm 42 tay rất điển hình của nghệ thuật điêu khắc thế kỷ 18. Tuy vậy do sự xâm thực của biển nên diện tích và quy mô của chùa bị thu hẹp nhiều.</span></p><p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(56, 56, 56);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Theo cuốn Thần phả sắc phong của Viện Thông tin khoa học xã hội thì hệ thống đình, chùa, đền, miếu ở Cát Hải được các triều đại nhà Nguyễn từ thời Thiệu Trị ( 1846) đến Khải Định 9 ( 1924) ban nhiều sắc phong thần trong đó: Gia Lộc có 13 sắc phong ( Hầu hết các sắc phong không còn).Những di tích lích sử, văn hóa còn lại ở Cát Hải được Bảo tàng Hải Phòng, Bảo tàng mỹ thuật Hà Nội khảo sát, nghiên cứu từ tháng 7 năm 1989 đã kết luận: “ Sự tàn phá của thiên nhiên, thời gian, cộng với sự thiếu ý thức của con người chỉ để lại cho chúng ta một số đình, chùa, miếu mạo mà lớp người cao niên phải nhiều tưởng tượng mới khôi phục nổi một thời văn hóa xưa”.Năm 2004 di tích Đình Chùa Gia Lộc được cấp bằng di tích lịch sử, văn hóa cấp thành phố.</span></p><p><br></p>', 0, 0, ''),
(55, 'Hang quân y', 2, '<p><strong style=\"background-color: white; color: rgb(34, 34, 34);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hang Quân Y&nbsp;</strong><span style=\"background-color: white; color: rgb(34, 34, 34);\">trước đây được gọi là hang Hùng Sơn, được đặt theo tên người đã tìm ra hang - một vị tướng nhà Trần tham gia trận đánh trên sông Bạch Đằng. Đến khi chiến tranh chống Mỹ nổ ra, người ta nhận thấy hang động này có vị trí đặc biệt, được che chắn kín đáo bởi núi rừng Cát Bà rậm rạp, lòng hang lại rỗng nên quân và dân đã xây dựng một bệnh viện dã chiến độc đáo ngay trong hang.&nbsp;</span></p><p class=\"ql-align-center\"><em style=\"background-color: white; color: rgb(34, 34, 34);\"> </em></p><p><span style=\"background-color: white; color: rgb(34, 34, 34);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khoảng thời gian năm 1963 – 1965 là giai đoạn Đế quốc Mỹ bắn phá miền Bắc nước ta ác liệt nhất. Bệnh viện được dựng lên để làm nơi chữa trị cho thương binh; nơi trú ẩn, tránh bom của người dân địa phương và cư dân sơ tán từ đảo Bạch Long Vỹ. Cái tên hang Quân Y cũng được gọi từ đó.</span></p><p><span style=\"color: firebrick;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Di chuyển đến hang Quân Y như nào?</span></p><p><span style=\"background-color: white; color: rgb(34, 34, 34);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hang Quân Y nằm trên đảo Cát Bà, thuộc thôn Hải Sơn, xã Trân Châu, huyện Cát Hải, Hải Phòng. Đường đến hang khá dễ tìm vì nằm trên trục đường xuyên đảo. Từ thị trấn Cát Bà ra đó tầm 10 – 13km, đi tầm 30 phút là đến. Còn quãng đường từ Hà Nội đến đảo Cát Bà bạn tham khảo bài viết&nbsp;</span><strong style=\"background-color: white; color: rgb(0, 166, 81);\"><a href=\"https://www.kynghidongduong.vn/blog/kinh-nghiem-du-lich-cat-ba-2020-tat-tan-tat.html#di-chuy-7875-n-273-7871-n-c-aacute-t-b-agrave-nh-432-n-agrave-o\" rel=\"noopener noreferrer\" target=\"_blank\">Kinh nghiệm du lịch đảo Cát Bà</a></strong><span style=\"background-color: white; color: rgb(34, 34, 34);\">&nbsp;nhé!</span></p><p><br></p>', 0, 0, ' '),
(56, 'Hầm chống bom nguyên tử', 2, '<p><span style=\"color: rgb(52, 58, 64);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hay còn có tên gọi là hầm chữ U, đây không chỉ là địa đạo giúp quân ta tránh bom đạn mà tới đây, bạn sẽ cảm nhận được phần nào cuộc sống sinh hoạt của người lính trong những năm tháng chiến tranh ác liệt.</span></p>', 0, 0, ' '),
(57, 'Nhà truyền thống', 2, '<p><span style=\"background-color: white; color: rgb(52, 58, 64);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhà truyền thống là nơi lưu giữ những kỷ vật từ những cuộc chiến oai hùng của quân và dân ta như vũ khí, mô hình, súng, những bức ảnh, vật dụng đặc trưng,... Đây không chỉ là điểm du lịch, tham quan mà còn là không gian giáo dục lịch sử ý nghĩa.</span></p><p><br></p>', 0, 0, ' '),
(58, 'Khẩu pháo', 2, '<p><span style=\"background-color: white; color: rgb(52, 58, 64);\">Ngoài ngắm hoàng hôn, bạn có thể đến sớm hơn để tham quan khu di tích còn lại từ thời chiến tranh với khẩu pháo thần công Cát Bà có trọng lượng hàng trăm tấn. Quá trình vận chuyển khẩu pháo sử dụng hoàn toàn bằng sức người nên vô cùng tốn sức, kéo dài ròng rã nhiều tháng trời.</span></p><p><br></p>', 0, 0, ' '),
(59, 'Pháo đài thần công', 2, '<p><span style=\"background-color: white; color: rgb(52, 58, 64);\">Đứng trên đài quan sát, bạn có thể phóng tầm mắt bao trọn cảnh thị trấn Cát Bà và chiêm ngưỡng vẻ đẹp Vịnh Lan Hạ từ trên cao, mang lại cảm giác choáng ngợp trước thiên nhiên hùng vĩ. Ngay dưới chân Pháo đài là hai bãi tắm tuyệt đẹp có tên là Cát Cò 1 và Cát Cò 2. Khi ngắm và chính kính trên đài quan sát, bạn còn thấy rõ những nếp nhà người dân sinh sống - một khung cảnh yên bình đến lạ.</span></p><p><br></p>', 0, 0, ' '),
(60, 'Đền chùa bà chúa gôi', 2, '<p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(56, 56, 56);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Xã Xuân Đám nằm ở phí Tây Nam của đảo Cát Bà, thuộc huyện Cát Hải, thành phố Hải Phòng; người, 249&nbsp;hộ, chia làm 4 thôn.&nbsp;Xuân Đám đã từng có các tên gọi khác nhau: Làng U, làng Xuân Áng, Việt Hưng. Các thôn xóm cũng có các tên gọi mang nét đặc trưng riêng, phản ánh quá trình hội tụ dân cư, phát triển cộng đồng, mối qua hệ gắn bó giữa cuộc sống, con người với thiên nhiên. Thôn Cát Đồn trước đây (nay là Thôn 1) còn gọi là Làng Rá, do có bãi cát và thành nhà Mạc nên gọi là Cát Đồn. Xóm Đông là nơi dân cư sinh sống đông nhất (nay là Thôn 2). Xóm Đình là nơi có đình làng được xây ở đó (nay là Thôn 3). Còn thôn Tùng Ruộng (nay là Thôn 4) là nơi có nhiều ruộng đất sản xuất nông nghiệp.Đông – Bắc giáp xã Trân Châu, Tây – Bắc giáp xã Hiền Hào, phần còn lại giáp biển, đối diện luồng tàu ra vào Hải Phòng. Diện tích tự nhiên là 1.073,09 ha, dân số 893  </span></p><p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(56, 56, 56);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Theo Đại Nam Nhất thống trí: “Các xã Phù long, Gia Luận, Trân Châu, Áng Xuân (Xuân Đám - Tên gọi trước năm 1813) thuộc tổng Phù Long: Bốn mặt nhiều núi đá bao bọc, nước biển chảy quanh. Trên đảo núi đá chạy đầy không đếm hết, dân sông bằng nghề lấy mật và đánh cá. Do những biến đọng của lịch sử, lớp cư dân Xuân Đám hiện nay có nguồn gốc từ nhiều vùng trong đất liền. Ban đầu họ là những người đánh cá, sau đó đưa gia đình, họ hàng, bạn bè đến khai hoang, sinh số lập làng.</span></p><p class=\"ql-align-justify\"><span style=\"background-color: white; color: rgb(56, 56, 56);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cùng với quá trình lao động tạo dựng cuộc sống, mở mang cộng đồng làng xã, dù khó khăn, thiếu thốn, các thế hệ người dân Xuân Đám đã không ngừng vun đắp và phát triển nền văn hóa dân tộc. Xuân Đám có một chùa, một đình và 4 miếu trong đó Đền Bà chúa gôi là mội trong những ngôi đến trên địa bàn xã được nhân dân địa phương và du khách thập phương thờ cúng và đến dân hương cầu bình an may mắn vào các dịp trong năm. Đền Bà Chúa Gôi tọa lạc tại thôn 3 xã Xuân Đám - huyện Cát Hải, Thành phố Hải Phòng</span></p><p><br></p>', 0, 0, ' '),
(61, 'Đình trân trâu', 2, '<p><span style=\"background-color: white; color: rgb(56, 56, 56);\">Đình làng Trân Châu Tọa lạc ở vị trí đắc địa, lưng tựa núi Tùng, hướng mặt ra biển, đình làng Trân Châu được xây dựng vào năm 1825 với kiến trúc cổ kính. Đây là một trong những ngôi đình bề thế, lễ rước các bài vị Thành Hoàng làng, lễ xuống biển... Trong chiến tranh chống Pháp, đình làng Trân Châu đã trở thành căn cứ cách mạng của quân và dân đảo Cát Bà. Đây là địa điểm để hội họp, tổ chức huấn luyện tập hợp lực lượng trong phong trào đấu tranh giành chính quyền của nhân dân địa phương. Cũng tại nơi đây, đơn vị bộ đội đầu tiên của đảo Cát Bà được thành lập gồm 2 trung đội C919 do đồng chí Hoàng Lại và Hùng Quang trực tiếp lãnh đạo cùng lực lượng dân quân xã Trân Châu xây dựng tuyến phòng thủ làng kháng chiến vững chắc, bảo vệ an toàn cho khu căn cứ Hà Sen. Năm 1949, đình làng Trân Châu đã từng bị đốt phá, ngôi đình cũ chỉ còn phần móng và 5 chân tảng đá xanh kê cột và 2 trụ hiên xây theo thế tay ngai. Năm 2009, đình làng Trân Châu được khôi phục lại và là nơi thờ các vị Thành Hoàng làng: Quang Diệu Đôn Tĩnh, Cao Sơn, Quý Minh. Đình Trân Châu còn lưu giữ 6 sắc phong thuộc các đời vua Thiệu Trị (năm 1845), vua Tự Đức (năm 1853, 1854,1880), vua Đồng khánh (năm 1887), vua Duy Tân (năm 1909).</span></p>', 0, 0, ' '),
(62, 'Ngày hội khí cầu', 5, '<p>Là sự kiện nằm trong chuỗi hoạt động kỷ niệm 65 năm ngày Bác Hồ về thăm làng cá Cát Bà và khai mạc du lịch Cát Bà năm 2024</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: rgb(33, 37, 41);\">Nằm trong chuỗi sự kiện chào mừng kỷ niệm 65 năm ngày Bác Hồ về thăm làng cá Cát Bà và khai mạc du lịch Cát Bà 2024, sáng 30/3, UBND huyện Cát Hải đã tổ chức Lễ khánh thành dự án đầu tư xây dựng Khu tái định cư đảo Cát Hải – Giai đoạn I. Dự án có tổng mức đầu tư gần 500 tỷ đồng, nhằm đảm bảo nhu cầu tái định cư cho các hộ dân thuộc diện phải giải phóng mặt bằng trên địa bàn đảo Cát Hải; đồng thời, góp phần phát triển hạ tầng khu vực, tạo điều kiện thúc đẩy phát triển kinh tế - xã hội của huyện.&nbsp;</span></li></ol><p><br></p>', 0, 0, ' ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `CauHoi`
--
ALTER TABLE `CauHoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DapAn`
--
ALTER TABLE `DapAn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `TieuDiem`
--
ALTER TABLE `TieuDiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `idtheloai` (`idtheloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `CauHoi`
--
ALTER TABLE `CauHoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `DapAn`
--
ALTER TABLE `DapAn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `TieuDiem`
--
ALTER TABLE `TieuDiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `TieuDiem`
--
ALTER TABLE `TieuDiem`
  ADD CONSTRAINT `TieuDiem_ibfk_1` FOREIGN KEY (`idtheloai`) REFERENCES `theloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
