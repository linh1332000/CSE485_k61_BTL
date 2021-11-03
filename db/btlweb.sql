-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2021 lúc 03:42 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btlweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bo_mon`
--

CREATE TABLE `bo_mon` (
  `id_BoMon` int(11) NOT NULL,
  `ten_BoMon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bo_mon`
--

INSERT INTO `bo_mon` (`id_BoMon`, `ten_BoMon`) VALUES
(1, 'Công Nghệ Web'),
(2, 'Kinh Tế Chính Trị Mác-Lê Nin'),
(3, 'Toán Cao Cấp 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_zoom` int(11) DEFAULT NULL,
  `message` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_meber`
--

CREATE TABLE `chat_meber` (
  `chat_meberid` int(11) NOT NULL,
  `id_zoom` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_khoa`
--

CREATE TABLE `lien_khoa` (
  `id_LienKhoa` int(11) NOT NULL,
  `ten_LienKhoa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lien_khoa`
--

INSERT INTO `lien_khoa` (`id_LienKhoa`, `ten_LienKhoa`) VALUES
(1, 'K60'),
(2, 'K61'),
(3, 'K59'),
(4, 'K58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id_Lop` int(11) NOT NULL,
  `ten_Lop` varchar(100) NOT NULL,
  `id_LienKhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id_Lop`, `ten_Lop`, `id_LienKhoa`) VALUES
(1, '60TH1', 1),
(2, '61PM1', 2),
(3, '59TH2', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukien`
--

CREATE TABLE `sukien` (
  `sk_id` int(30) NOT NULL,
  `sk_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_picture` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_des` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sukien`
--

INSERT INTO `sukien` (`sk_id`, `sk_name`, `sk_picture`, `sk_des`, `sk_date`) VALUES
(1, 'Học lập trình từ cơ bản đến nâng cao cho người mới', 'hlt.jpg', '<p>[CLB Lập tr&igrave;nh TBD - Học lập tr&igrave;nh từ bắt đầu]</p>\r\n\r\n<p><img alt=\"⭐\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t3b/1.5/16/2b50.png\" style=\"height:16px; width:16px\" />&nbsp;CLB Lập tr&igrave;nh TBD khởi đầu năm học mới với chương tr&igrave;nh Học lập tr&igrave;nh từ bắt đầu.<br />\r\nĐ&acirc;y l&agrave; hoạt động thường xuy&ecirc;n v&agrave;o chiều thứ 7 h&agrave;ng tuần, online hoặc trực tiếp tại IT Space (c&oacute; online đồng thời) nhằm tạo s&acirc;n chơi giao lưu, học hỏi cho c&aacute;c bạn y&ecirc;u th&iacute;ch lập tr&igrave;nh, th&iacute;ch s&aacute;ng tạo.</p>\r\n\r\n<p><img alt=\"🙌\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t56/1.5/16/1f64c.png\" style=\"height:16px; width:16px\" />&nbsp;Chương tr&igrave;nh mở cho tất cả mọi người quan t&acirc;m (tham gia online), đặc biệt th&iacute;ch hợp cho c&aacute;c bạn học sinh, sinh vi&ecirc;n bắt đầu lập tr&igrave;nh, hoặc muốn củng cố lại kiến thức, kỹ năng lập tr&igrave;nh một c&aacute;ch c&oacute; hệ thống.</p>\r\n\r\n<p><img alt=\"💻\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te5/1.5/16/1f4bb.png\" style=\"height:16px; width:16px\" />&nbsp;Ng&ocirc;n ngữ lập tr&igrave;nh sẽ sử dụng: C#, Python.</p>\r\n\r\n<p><img alt=\"🤓\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1.5/16/1f913.png\" style=\"height:16px; width:16px\" />&nbsp;GV Khoa CNTT-TBD phụ tr&aacute;ch v&agrave; hướng dẫn.</p>\r\n\r\n<p>----------------------------------------<br />\r\n<img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1.5/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;Th&ocirc;ng tin lớp học :<br />\r\nĐối tượng : sinh vi&ecirc;n, học sinh, giảng vi&ecirc;n quan t&acirc;m đến chương tr&igrave;nh<br />\r\nThời gian : Thứ 7 h&agrave;ng tuần, bắt đầu từ ng&agrave;y 13/10/2021, 14:00 - 16:00<br />\r\nLink tham gia :&nbsp;<a href=\"https://meet.google.com/aeg-prdq-wft?fbclid=IwAR1IkEdRrqI44a3wS8saqcAKVrka__Y_dU96fd1AJjrUjpZsKSjMSz3ldKo\" target=\"_blank\">https://meet.google.com/aeg-prdq-wft</a></p>\r\n', '2021-10-27'),
(2, 'Xây dựng nội dung trên mạng xã hội cơ bản', 'workshop.jpg', '<p>[Workshop diễn ra trong app Kalpha d&agrave;nh cho th&agrave;nh vi&ecirc;n Kalpha+]<br />\r\n3 gi&acirc;y l&agrave; khoảng thời gian ch&uacute;ng ta thường lướt qua một nội dung tr&ecirc;n mạng x&atilde; hội. Trong workshop n&agrave;y, ch&uacute;ng ta sẽ t&igrave;m hiểu về c&aacute;ch kể chuyện, tr&igrave;nh b&agrave;y nội dung như thế n&agrave;o để thay v&igrave; bỏ qua, người xem sẽ d&agrave;nh th&ecirc;m thời gian để kết nối với bạn.</p>\r\n\r\n<p>Với nội dung workshop xoay quanh:<br />\r\n<img alt=\"📌\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" />&nbsp;C&aacute;ch t&igrave;m hiểu, kh&aacute;m ph&aacute;, khai th&aacute;c c&acirc;u chuyện của m&igrave;nh/ của sản phẩm m&igrave;nh.<br />\r\n<img alt=\"📌\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" />&nbsp;Những g&oacute;c nh&igrave;n kh&aacute;c nhau về c&ugrave;ng một c&acirc;u chuyện.<br />\r\n<img alt=\"📌\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" />&nbsp;S&aacute;ng tạo tuyệt đối? c&oacute; hay kh&ocirc;ng?<br />\r\n<img alt=\"📌\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" />&nbsp;C&aacute;ch thức hoạt động v&agrave; lan tỏa nội dung của c&aacute;c nền tảng mạng x&atilde; hội.</p>\r\n\r\n<p>Với sự tham gia của diễn giả:<br />\r\n<img alt=\"🎤\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td7/1.5/16/1f3a4.png\" style=\"height:16px; width:16px\" />&nbsp;Anh Trị Nguyễn, Co-Founder Kalpha Vietnam, chủ k&ecirc;nh Youtube Anh Bạn Th&acirc;n. Hơn 10 năm, anh đ&atilde; đạt tới c&aacute;c chức vụ gi&aacute;m đốc s&aacute;ng tạo/ marketing, lặn lội l&agrave;m nội dung từ c&aacute;c kh&aacute;ch h&agrave;ng xa hoa đến c&aacute;c startup khi&ecirc;m tốn. Hiện nay anh đang vừa kể c&acirc;u chuyện của m&igrave;nh vừa đồng h&agrave;nh c&ugrave;ng c&aacute;c nh&atilde;n h&agrave;ng lớn trong lĩnh vực influencer marketing.</p>\r\n\r\n<p><img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1.5/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;Nếu bạn l&agrave; một người đang t&igrave;m hiểu, muốn kh&aacute;m ph&aacute; một g&oacute;c nh&igrave;n kh&aacute;c, một c&aacute;ch l&agrave;m mới trong việc l&agrave;m nội dung, h&atilde;y tham gia workshop n&agrave;y nh&eacute;!<br />\r\n<img alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1.5/16/1f449.png\" style=\"height:16px; width:16px\" />&nbsp;Thời gian: 06/11/2021, 10:00 AM<br />\r\n<img alt=\"🎁\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tdd/1.5/16/1f381.png\" style=\"height:16px; width:16px\" />&nbsp;Chỉ d&agrave;nh cho hội vi&ecirc;n Kalpha+. Đăng k&yacute; Kalpha+ v&agrave; tham gia ngay!</p>\r\n\r\n<p>Để đăng k&yacute; Hội vi&ecirc;n Kalpha+:<br />\r\n<img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" />&nbsp;V&agrave;o trang chủ của APP Kalpha<br />\r\n<img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" />&nbsp;Click v&agrave;o thẻ &ldquo;Đăng k&yacute; Kalpha+&rdquo; (m&agrave;u xanh)<br />\r\n<img alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tba/1.5/16/2705.png\" style=\"height:16px; width:16px\" />&nbsp;Sau khi đọc c&aacute;c th&ocirc;ng tin, bấm &ldquo;Tiếp tục đăng k&yacute;&rdquo;</p>\r\n', '2021-10-26'),
(3, 'Ngày hội khởi nghiệp quốc gia của HSSV năm 2020', 'kn.jpg', '<p>Ng&agrave;y hội Khởi nghiệp quốc gia của học sinh, sinh vi&ecirc;n 2020 (SV.STARTUP-2020). 📌 Thực hiện nhiệm vụ Thủ tướng Ch&iacute;nh phủ giao tại Quyết định số 1665/QĐ-TTg ng&agrave;y 30/10/2017 của Thủ tướng Ch&iacute;nh phủ về việc Ph&ecirc; duyệt Đề &aacute;n &ldquo;Hỗ trợ học sinh, sinh vi&ecirc;n khởi nghiệp đến năm 2025&rdquo;, Bộ Gi&aacute;o dục v&agrave; Đ&agrave;o tạo tổ chức ng&agrave;y Hội khởi nghiệp quốc gia của học sinh, sinh vi&ecirc;n năm 2020. Với mục ti&ecirc;u tổng kết c&ocirc;ng t&aacute;c triển khai hỗ trợ học sinh, sinh vi&ecirc;n khởi nghiệp trong c&aacute;c cơ sở gi&aacute;o dục đ&atilde; triển khai trong một năm. Tạo điều kiện để c&aacute;c cơ sở đ&agrave;o tạo được trao đổi kinh nghiệm với c&aacute;c chuy&ecirc;n gia, nh&agrave; khoa học v&agrave; thể hiện kết quả của c&ocirc;ng t&aacute;c hỗ trợ học sinh, sinh vi&ecirc;n của c&aacute;c cơ sở gi&aacute;o dục th&ocirc;ng qua việc trưng b&agrave;y c&aacute;c sản phẩm dự &aacute;n, &yacute; tưởng khởi nghiệp của HSSV. 🎯 Chương tr&igrave;nh hướng đến c&aacute;c mục ti&ecirc;u cụ thể như: Truyền cảm hứng cho c&aacute;c bạn HSSV d&aacute;m ước mơ v&agrave; đưa ra những &yacute; tưởng khởi nghiệp s&aacute;ng tạo, khả thi. Trang bị cho sinh vi&ecirc;n những kiến thức, kỹ năng th&agrave;nh lập dự &aacute;n từ &yacute; tưởng Vinh danh những &yacute; tưởng tốt, s&aacute;ng tạo đ&atilde; th&agrave;nh c&ocirc;ng từ giảng đường Tạo động lực th&uacute;c đẩy cho sinh vi&ecirc;n, d&aacute;m nghĩ d&aacute;m l&agrave;m để &yacute; tưởng kh&ocirc;ng chỉ l&agrave; tr&ecirc;n giấy Nhằm k&ecirc;u gọi c&aacute;c tổ chức, doanh nghiệp đầu tư cho c&aacute;c &yacute; tưởng xuất sắc nhất. ---------------------------------------------------- 📌 Ng&agrave;y hội khởi nghiệp quốc gia của học sinh, sinh vi&ecirc;n 2020 sẽ ch&iacute;nh thức diễn ra v&agrave;o: ⏳ Thời gian: ng&agrave;y 21-22/12/2020 🏢 Địa điểm: Trường Đại học Thuỷ Lợi - số 175 T&acirc;y Sơn, Đống Đa, H&agrave; Nội 🌟 C&aacute;c hoạt động ch&iacute;nh của ng&agrave;y Hội bao gồm: - Tham quan c&aacute;c kh&ocirc;ng gian &yacute; tưởng khởi nghiệp thuộc c&aacute;c lĩnh vực: Khoa học, c&ocirc;ng nghệ; Kinh doanh, t&agrave;i ch&iacute;nh, gi&aacute;o dục, y tế, dịch vụ; n&ocirc;ng, l&acirc;m, ngư nghiệp, kinh doanh tạo t&aacute;c động x&atilde; hội v&agrave; kh&ocirc;ng gian khởi nghiệp của học sinh THPT tổng số c&aacute;c dự &aacute;n tham gia trưng b&agrave;y 72 &yacute; tưởng dự &aacute;n. - Tham dự Lễ khai mạc; Diễn đ&agrave;n &ldquo;H&agrave;nh tr&igrave;nh lan toả - cảm hứng khởi nghiệp động lực mạnh mẽ để th&agrave;nh c&ocirc;ng&rdquo;; Hội thảo &ldquo;Giải ph&aacute;p ph&aacute;t triển c&aacute;c dự &aacute;n Khởi nghiệp của giảng vi&ecirc;n trẻ v&agrave; sinh vi&ecirc;n&rdquo;; Hội thảo &ldquo;Ph&aacute;t triển C&acirc;u lạc bộ Khởi nghiệp v&agrave; nội dung đ&agrave;o tạo Khởi nghiệp trong c&aacute;c trường THPT, THCS, kinh nghiệm v&agrave; giải ph&aacute;p&rdquo;; Chung kết cuộc thi &ldquo;học sinh, sinh vi&ecirc;n với &yacute; tưởng khởi nghiệp năm 2020&rdquo; v&agrave; Lễ tổng kết, trao giải cuộc thi. ---------------------------------------------------- 🌟 Chương tr&igrave;nh Ng&agrave;y hội Khởi nghiệp quốc gia của học sinh sinh vi&ecirc;n 2020 ch&acirc;n th&agrave;nh cảm ơn c&aacute;c nh&agrave; t&agrave;i trợ đ&atilde; đồng h&agrave;nh c&ugrave;ng Ng&agrave;y hội: - Nh&agrave; quảng c&aacute;o Kim cương: Ng&acirc;n h&agrave;ng Vietcombank - Nh&agrave; T&agrave;i trợ V&agrave;ng: Ng&acirc;n h&agrave;ng Bắc &Aacute; (Bắc &Aacute; Bank) - Nh&agrave; t&agrave;i trợ Đồng: L&ecirc; Kh&aacute;nh Group - Nh&agrave; t&agrave;i trợ Đồng h&agrave;nh: STI - Nh&agrave; t&agrave;i trợ: Tập đo&agrave;n Trung Nguy&ecirc;n (Trung Nguy&ecirc;n Legend), Tập đo&agrave;n x&acirc;y dựng Ho&agrave; B&igrave;nh ----------------------------------------------------- 🆘 Mọi thắc mắc xin vui l&ograve;ng li&ecirc;n hệ: (y) Inbox fanpage: Ng&agrave;y Hội Khởi Nghiệp Quốc Gia của HSSV 📧 Email: btc.sv.startup@gmail.com ☎️ Hotline: 0913 459 858/0966 065 951 #nhkn #ngayhoikhoinghiepcuaHSSV #Svstartup2020 #Novaedu #Vietcombank #Bacabank #Trungnguyenlegend #Lekhanhgroup #Tapdoanxaydunghoabinh #STI #Quocanhacademy</p>\r\n', '2021-10-29'),
(4, 'SVMC Roadshow 2018', 'svmc.jpg', '<p>Chương tr&igrave;nh Open day: ch&agrave;o đ&oacute;n c&aacute;c sinh vi&ecirc;n năm 2,3 tới tham quan, trải nghiệm trực tiếp c&aacute;c c&ocirc;ng nghệ h&agrave;ng đầu v&agrave; m&ocirc;i trường l&agrave;m việc năng động, s&aacute;ng tạo tại SVMC.<br />\r\nChương tr&igrave;nh Học bổng T&agrave;i năng Samsung-STP: d&agrave;nh cho c&aacute;c bạn sinh vi&ecirc;n năm 2-3 (hệ 4 năm) &amp; sinh vi&ecirc;n năm 3-4 (hệ 5 năm v&agrave; 4.5 năm), đam m&ecirc; c&ocirc;ng nghệ, y&ecirc;u th&iacute;ch lập tr&igrave;nh với gi&aacute; trị học bổng hơn 65 triệu VND hoặc 113 triệu VND tiền mặt/1 suất.<br />\r\nChương tr&igrave;nh Thực tập sinh tại SVMC: d&agrave;nh cho c&aacute;c bạn sinh vi&ecirc;n năm cuối, y&ecirc;u th&iacute;ch lập tr&igrave;nh. Sinh vi&ecirc;n được đ&agrave;o tạo b&agrave;i bản, chuy&ecirc;n s&acirc;u về thuật to&aacute;n, c&aacute;c ng&ocirc;n ngữ C/C++/Java, l&agrave;m mini-project về Android,&hellip;<br />\r\nChương tr&igrave;nh Tuyển dụng Kỹ sư lập tr&igrave;nh phần mềm: SVMC tuyển dụng h&agrave;ng Qu&yacute; những Kỹ sư y&ecirc;u th&iacute;ch lập tr&igrave;nh, tốt nghiệp Đại học tất cả c&aacute;c chuy&ecirc;n ng&agrave;nh.</p>\r\n', '2018-10-11'),
(5, 'Du ngoạn Hà Nội', 'hanoi.jpg', '<p>DU NGOẠN H&Agrave; NỘI: TỪ H&Agrave;NG BẠC ĐẾN NGUYỄN HỮU HU&Acirc;N<br />\r\n[Please scroll down for English]</p>\r\n\r\n<p><img alt=\"⏰\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbb/1.5/16/23f0.png\" style=\"height:16px; width:16px\" />&nbsp;09:30&ndash;12:30<br />\r\n<img alt=\"📆\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t58/1.5/16/1f4c6.png\" style=\"height:16px; width:16px\" />&nbsp;07.11.2021<br />\r\n<img alt=\"📌\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" />&nbsp;Điểm tập trung: Phố Đinh Liệt<br />\r\n<img alt=\"📌\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1.5/16/1f4cc.png\" style=\"height:16px; width:16px\" />&nbsp;Ng&ocirc;n ngữ: Tiếng Anh</p>\r\n\r\n<p><img alt=\"📋\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t84/1.5/16/1f4cb.png\" style=\"height:16px; width:16px\" />&nbsp;Đăng k&yacute; tại:&nbsp;<a href=\"https://forms.gle/RNRjj4QZKJ1Hn4WY7?fbclid=IwAR2vCbg7t2ebd6HWD05AioSp7bhLrtEKKQIueYeVFNz_oKeytU8NxraYTFs\" target=\"_blank\">https://forms.gle/RNRjj4QZKJ1Hn4WY7</a><br />\r\nPh&iacute; tham dự: 100,000 VNĐ</p>\r\n\r\n<p>*</p>\r\n\r\n<p>Hội &lsquo;Những người bạn của Di sản Việt Nam&rsquo; (FVH) thường xuy&ecirc;n tổ chức c&aacute;c chuyến &#39;Du ngoạn H&agrave; Nội&#39; để t&igrave;m hiểu về thủ đ&ocirc; với những g&oacute;c nh&igrave;n mới mẻ. Người tham gia sẽ kh&aacute;m ph&aacute; ra rằng th&agrave;nh phố n&agrave;y c&ograve;n rất nhiều những c&acirc;u chuyện th&uacute; vị về con người, về những g&oacute;c phố lẩn khuất m&agrave; m&igrave;nh chưa biết đến.</p>\r\n\r\n<p>Trong chuyến đi lần n&agrave;y, FVH mời bạn dạo một v&ograve;ng phố cổ H&agrave; Nội từ Đinh Liệt, H&agrave;ng Bạc đến Cầu Gỗ v&agrave; kết th&uacute;c ở Nguyễn Hữu Hu&acirc;n. Ch&uacute;ng ta sẽ c&ugrave;ng kh&aacute;m ph&aacute; về nhiều chủ đề, từ sự ra đời của nghề l&agrave;m kim ho&agrave;n ở phố cổ H&agrave;ng Bạc, cuộc &#39;đổ bộ&#39; của điện ảnh Hồng K&ocirc;ng v&agrave;o rạp cải lương một thời, cho đến c&acirc;u chuyện b&aacute;n kem trong thời kỳ c&aacute;ch mạng, hay l&agrave; niềm đam m&ecirc; bất tận với c&agrave; ph&ecirc;.</p>\r\n\r\n<p>*</p>\r\n\r\n<p><img alt=\"🌟\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f31f.png\" style=\"height:16px; width:16px\" />&nbsp;VỀ FVH</p>\r\n\r\n<p>Th&agrave;nh lập năm 1999, Hội Những người bạn của Di sản Việt Nam (FVH) tập hợp những th&agrave;nh vi&ecirc;n đang sống tại H&agrave; Nội, mang quốc tịch Việt Nam cũng như tới từ khắp nơi tr&ecirc;n thế giới. FVH hướng tới việc bảo tồn v&agrave; ph&aacute;t triển di sản văn h&oacute;a Việt, với mục ti&ecirc;u trau dồi hiểu biết s&acirc;u rộng về văn h&oacute;a Việt Nam. Nh&oacute;m hoạt động như một s&aacute;ng kiến gi&aacute;o dục phi lợi nhuận.</p>\r\n\r\n<p>Sự kiện thuộc liên hoan Sáng tạo &amp; Thiết kế Việt Nam 2021 do Đại học RMIT Việt Nam khởi xướng tổ chức cùng Tổ chức Giáo dục, Khoa học và Văn hóa Liên Hợp Quốc (UNESCO), Viện Văn hóa Nghệ thuật Quốc gia Việt Nam (VICAS) và COLAB Việt Nam, với sự tham gia của nhiều đối t&aacute;c, v&agrave; được bảo trợ truyền thông bởi Hanoi Grapevine.</p>\r\n', '2021-10-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `user_lv` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL,
  `user_pass` char(100) NOT NULL,
  `user_sdt` char(20) NOT NULL,
  `id_LienKhoa` int(11) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_email`, `picture`, `user_lv`, `id_lop`, `user_pass`, `user_sdt`, `id_LienKhoa`, `DOB`) VALUES
(1, 'Bùi Văn Linh', 'blinh8358@gmail.com', '', 1, 1, '123', '0382144259', 2, '2000-03-13'),
(2, 'Đỗ Duy Huy', 'duyhuy1900@gmail.com', 'avar3.jfif', 1, 1, '123', '0934272727', 1, '2000-09-09'),
(3, 'Phạm Quang Huy', 'quanghuy@gmail.com', 'avar2.jpg', 0, 1, '123', '09736344755', 1, '1999-07-05'),
(5, 'Phạm Thị Linh', 'noohuy1500@gmail.com', '', 1, 1, '', '0382144259', 1, '2002-07-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `zoom`
--

CREATE TABLE `zoom` (
  `id_zoom` int(11) NOT NULL,
  `name_z` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `zoom`
--

INSERT INTO `zoom` (`id_zoom`, `name_z`, `id_user`) VALUES
(1, 'K60', 3),
(2, 'K59', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bo_mon`
--
ALTER TABLE `bo_mon`
  ADD PRIMARY KEY (`id_BoMon`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`),
  ADD KEY `id_zoom` (`id_zoom`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `chat_meber`
--
ALTER TABLE `chat_meber`
  ADD PRIMARY KEY (`chat_meberid`),
  ADD KEY `id_zoom` (`id_zoom`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `lien_khoa`
--
ALTER TABLE `lien_khoa`
  ADD PRIMARY KEY (`id_LienKhoa`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_Lop`),
  ADD KEY `lien_khoa` (`id_LienKhoa`);

--
-- Chỉ mục cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`sk_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `lop` (`id_lop`),
  ADD KEY `id_lienkhoa` (`id_LienKhoa`);

--
-- Chỉ mục cho bảng `zoom`
--
ALTER TABLE `zoom`
  ADD PRIMARY KEY (`id_zoom`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bo_mon`
--
ALTER TABLE `bo_mon`
  MODIFY `id_BoMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lien_khoa`
--
ALTER TABLE `lien_khoa`
  MODIFY `id_LienKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id_Lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sukien`
--
ALTER TABLE `sukien`
  MODIFY `sk_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_zoom`) REFERENCES `zoom` (`id_zoom`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `chat_meber`
--
ALTER TABLE `chat_meber`
  ADD CONSTRAINT `chat_meber_ibfk_1` FOREIGN KEY (`id_zoom`) REFERENCES `zoom` (`id_zoom`),
  ADD CONSTRAINT `chat_meber_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lien_khoa` FOREIGN KEY (`id_LienKhoa`) REFERENCES `lien_khoa` (`id_LienKhoa`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_lienkhoa` FOREIGN KEY (`id_LienKhoa`) REFERENCES `lien_khoa` (`id_LienKhoa`),
  ADD CONSTRAINT `lop` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id_Lop`);

--
-- Các ràng buộc cho bảng `zoom`
--
ALTER TABLE `zoom`
  ADD CONSTRAINT `zoom_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
