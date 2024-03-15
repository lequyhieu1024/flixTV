-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 15, 2024 lúc 04:20 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `touch_and_watch`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `like` int(11) NOT NULL DEFAULT 0,
  `dislike` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `movie_id`, `comment`, `like`, `dislike`, `create_at`) VALUES
(7, 6, 9, 'được', 0, 0, '2024-03-01 18:59:53'),
(8, 6, 9, 'hahaha\r\n', 0, 0, '2024-03-01 19:01:22'),
(9, 6, 14, 'được\r\n', 0, 0, '2024-03-01 19:22:46'),
(10, 6, 14, 'rất hay nha', 0, 0, '2024-03-01 19:22:57'),
(11, 6, 9, 'hay', 0, 0, '2024-03-01 19:44:22'),
(12, 6, 16, 'như phim con nít', 0, 0, '2024-03-01 21:39:07'),
(13, 6, 15, 'tạm', 0, 0, '2024-03-01 21:40:08'),
(14, 6, 15, 'ổn nha mấy đứa', 0, 0, '2024-03-01 21:41:42'),
(15, 6, 15, 'chả ra gì', 0, 0, '2024-03-01 21:41:49'),
(16, 6, 16, 'hay mà', 0, 0, '2024-03-01 21:45:00'),
(17, 6, 16, 'hay đ gì', 0, 0, '2024-03-01 21:45:07'),
(18, 6, 13, 'chưa thấy web nào có phim này =)))\r\n', 0, 0, '2024-03-01 21:46:47'),
(19, 6, 13, 'con mình thích xem loại này mà web khác toàn gắn quảng cáo linh tinh mất thời gian vãi', 0, 0, '2024-03-01 21:47:16'),
(20, 7, 23, 'phim mới à mọi người', 0, 0, '2024-03-02 22:16:47'),
(21, 7, 12, 'Phim này cũng tạm =)))', 0, 0, '2024-03-02 22:22:26'),
(23, 6, 36, 'hay hihhi', 0, 0, '2024-03-04 00:02:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `flag` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `subject`, `content`, `flag`) VALUES
(5, 'Sinh', 'duongsinh2004@gmail.com', 'Đăng kí quảng cáo', 'Hãy nhập đúng thông tin để nhận được email phản hồi nhanh và chính xác nhất, không gửi quá 3 liên hệ trong 1 ngày.\r\nCảm ơn', 1),
(6, 'Sinh fffggg gggg', 'duongsinh2004@gmail.com', 'Đăng kí quảng cáo', 'Hãy nhập đúng thông tin để nhận được email phản hồi nhanh và chính xác nhất, không gửi quá 3 liên hệ trong 1 ngày.\r\nCảm ơn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(225) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `name`, `thumbnail`, `flag`) VALUES
(6, 'Hoạt hình', '1-20240307052541.jpg', 0),
(7, 'Hành động', '10-phim-hanh-dong-chieu-rap-hay-nhat-2021-co-nhip-do-nhanh-va-cam-xuc-cao-trao-202111082041266427-20240229163900.jpg', 0),
(8, 'Phiêu lưu', 'phim_phieu_luu.jpg', 0),
(9, 'Kinh dị', 'phim-kinh-di-my-ma-cay-5.jpg.webp', 0),
(10, 'Hài hước', 'phim-hai.jpg', 0),
(11, 'Lãng mạn', 'lang-man.jpg', 0),
(12, 'Khoa học viễn tưởng', 'khoa-hoc-vien-tuong.jpg', 0),
(13, 'Gia đình', 'gia-dinh.jpg', 0),
(14, 'Tài liệu', 'phim-tai-lieu.jpg', 0),
(15, 'Âm nhạc', 'phim-am-nhac.jpg', 0),
(16, 'Drama', 'cau-lac-bo-bao-thu-trailer.jpg', 0),
(20, '18+', 'icon-symbol-18-years-and-over-free-vector[1]-20240301190530.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `link_movies`
--

CREATE TABLE `link_movies` (
  `link_id` int(11) NOT NULL,
  `episode` int(3) NOT NULL,
  `link` text NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `link_movies`
--

INSERT INTO `link_movies` (`link_id`, `episode`, `link`, `movie_id`) VALUES
(10, 5, '//ok.ru/videoembed/760874404523', 9),
(12, 3, '//ok.ru/videoembed/757697874603', 9),
(13, 4, '//ok.ru/videoembed/757697809067', 9),
(14, 2, '//ok.ru/videoembed/757059291819', 9),
(15, 6, '//ok.ru/videoembed/760874535595', 9),
(16, 7, '//ok.ru/videoembed/765658335915', 9),
(17, 8, '//ok.ru/videoembed/765650799275', 9),
(18, 9, '//ok.ru/videoembed/765663775403', 9),
(23, 10, '//ok.ru/videoembed/766714907307', 9),
(24, 2, 'https://vip.opstream13.com/share/a9986cb066812f440bc2bb6e3c13696c', 23),
(25, 3, 'https://vip.opstream13.com/share/1091660f3dff84fd648efe31391c5524', 23),
(26, 4, 'https://vip.opstream13.com/share/663fd3c5144fd10bd5ca6611a9a5b92d', 23),
(27, 2, 'https://vip.opstream16.com/share/dc14e10c0ecf8029a86d27e74d140539', 24),
(28, 3, 'https://vip.opstream16.com/share/c031d32c88833d1f9a2144071eaf34d9', 24),
(29, 4, 'https://vip.opstream16.com/share/a2667dd894062c9ca2a4602cb4718f52', 24),
(30, 5, 'https://vip.opstream16.com/share/a01874b1881feb4f498d3f877bd41e62', 24),
(31, 6, 'https://vip.opstream16.com/share/070ffad3c0f12da66ca3b5d0c2d23069', 24),
(32, 7, 'https://vip.opstream16.com/share/381dc6cd0e6bfa5feb1f70484171a7a9', 24),
(33, 8, 'https://vip.opstream16.com/share/f6c744ece7e1a36892eba3a5d2938110', 24),
(34, 9, 'https://vip.opstream16.com/share/992293aa502a94d9d76d1d0313c00873', 24),
(35, 10, 'https://vip.opstream16.com/share/508cb643c0ea0e2f6451bba7aa5cfb64', 24),
(36, 11, 'https://vip.opstream16.com/share/d61f3a760c9bcbc9bb75228deddd9379', 24),
(37, 12, ' https://vip.opstream16.com/share/337751565e513506b6400ca2ad6ff5df', 24),
(38, 2, 'https://vip.opstream13.com/share/8a56257ea05c74018291954fc56fc448', 27),
(39, 3, '  https://vip.opstream13.com/share/be767243ca8f574c740fb4c26cc6dceb', 27),
(40, 4, 'https://vip.opstream13.com/share/f44ee263952e65b3610b8ba51229d1f9', 27),
(41, 2, 'https://vip.opstream17.com/share/f9028faec74be6ec9b852b0a542e2f39', 31),
(42, 3, 'https://vip.opstream17.com/share/8f7d807e1f53eff5f9efbe5cb81090fb', 31),
(43, 4, ' https://vip.opstream17.com/share/fa83a11a198d5a7f0bf77a1987bcd006', 31),
(44, 5, ' https://vip.opstream17.com/share/02a32ad2669e6fe298e607fe7cc0e1a0', 31),
(45, 6, ' https://vip.opstream17.com/share/fc3cf452d3da8402bebb765225ce8c0e', 31),
(46, 7, 'https://vip.opstream17.com/share/3d8e28caf901313a554cebc7d32e67e5', 31),
(47, 8, ' https://vip.opstream17.com/share/e97ee2054defb209c35fe4dc94599061', 31),
(48, 9, '  https://vip.opstream17.com/share/b86e8d03fe992d1b0e19656875ee557c', 31),
(49, 10, 'https://vip.opstream17.com/share/84f7e69969dea92a925508f7c1f9579a', 31),
(50, 11, ' https://vip.opstream17.com/share/f4552671f8909587cf485ea990207f3b', 31),
(51, 12, 'https://vip.opstream17.com/share/362e80d4df43b03ae6d3f8540cd63626', 31),
(52, 13, ' https://vip.opstream17.com/share/fe8c15fed5f808006ce95eddb7366e35', 31),
(53, 2, 'https://vip.opstream13.com/share/1e0a84051e6a4a7381473328f43c4884', 32),
(54, 3, ' https://vip.opstream13.com/share/02f657d55eaf1c4840ce8d66fcdaf90c', 32),
(55, 4, 'https://vip.opstream13.com/share/453fadbd8a1a3af50a9df4df899537b5', 32),
(56, 5, ' https://vip.opstream13.com/share/bd1354624fbae3b2149878941c60df99', 32),
(57, 6, 'https://vip.opstream13.com/share/e2c61965b5e23b47b77d7c51611b6d7f', 32),
(58, 7, 'https://vip.opstream13.com/share/f6b5f8c32c65fee991049a55dc97d1ce', 32),
(59, 8, ' https://vip.opstream13.com/share/e93028bdc1aacdfb3687181f2031765d', 32),
(60, 9, 'https://vip.opstream13.com/share/8004d637b6236202217be3dfcdd8ce59', 32),
(61, 2, 'https://vip.opstream17.com/share/b9141aff1412dc76340b3822d9ea6c72', 33),
(62, 3, 'https://vip.opstream17.com/share/9ac403da7947a183884c18a67d3aa8de', 33),
(63, 4, ' https://vip.opstream17.com/share/a0e2a2c563d57df27213ede1ac4ac780', 33),
(64, 5, ' https://vip.opstream17.com/share/1019c8091693ef5c5f55970346633f92', 33),
(65, 6, 'https://vip.opstream17.com/share/7cce53cf90577442771720a370c3c723', 33),
(66, 7, 'https://vip.opstream17.com/share/1579779b98ce9edb98dd85606f2c119d', 33),
(67, 8, '  https://vip.opstream17.com/share/20b5e1cf8694af7a3c1ba4a87f073021', 33),
(68, 2, '    https://vip.opstream13.com/share/353de26971b93af88da102641069b440', 38),
(69, 3, 'https://vip.opstream13.com/share/d0bb8259d8fe3c7df4554dab9d7da3c9', 38),
(70, 4, 'https://vip.opstream13.com/share/5d75b942ab4bd730bc2e819df9c9a4b5', 38),
(71, 5, ' https://vip.opstream13.com/share/a78482ce76496fcf49085f2190e675b4', 38),
(72, 6, 'https://vip.opstream13.com/share/d71fa38b648d86602d14ac610f2e6194', 38),
(73, 7, 'https://vip.opstream13.com/share/3812f9a59b634c2a9c574610eaba5bed', 38),
(74, 8, 'https://vip.opstream13.com/share/bf2fb7d1825a1df3ca308ad0bf48591e', 38),
(75, 9, ' https://vip.opstream13.com/share/6f1d0705c91c2145201df18a1a0c7345', 38),
(76, 10, 'https://vip.opstream13.com/share/4b29fa4efe4fb7bc667c7b301b74d52d', 38),
(77, 11, ' https://vip.opstream13.com/share/eb9fc349601c69352c859c1faa287874', 38),
(78, 12, 'https://vip.opstream13.com/share/fdf1bc5669e8ff5ba45d02fded729feb', 38),
(79, 13, 'https://vip.opstream13.com/share/327708dd10d68b1361ad3addbaca01f2', 38),
(80, 14, 'https://vip.opstream13.com/share/2650d6089a6d640c5e85b2b88265dc2b', 38),
(81, 15, 'https://vip.opstream13.com/share/7e0a0209b929d097bd3e8ef30567a5c1', 38),
(82, 16, 'https://vip.opstream13.com/share/efd7e9ed0e5e694ba6df444d84dfa37d', 38),
(83, 17, 'https://vip.opstream13.com/share/e6af401c28c1790eaef7d55c92ab6ab6', 38),
(84, 18, 'https://vip.opstream13.com/share/4f1f29888cabf5d45f866fe457737a23', 38),
(85, 19, 'https://vip.opstream13.com/share/12a1d073d5ed3fa12169c67c4e2ce415', 38),
(86, 20, 'https://vip.opstream13.com/share/f076073b2082f8741a9cd07b789c77a0', 38),
(87, 21, ' https://vip.opstream13.com/share/a6db4ed04f1621a119799fd3d7545d3d', 38),
(88, 22, 'https://vip.opstream13.com/share/ec8b57b0be908301f5748fb04b0714c7', 38),
(89, 23, 'https://vip.opstream13.com/share/c61f571dbd2fb949d3fe5ae1608dd48b', 38),
(90, 24, 'https://vip.opstream13.com/share/445e1050156c6ae8c082a8422bb7dfc0', 38),
(91, 2, 'https://vip.opstream17.com/share/8e296a067a37563370ded05f5a3bf3ec', 39),
(92, 3, ' https://vip.opstream17.com/share/4e732ced3463d06de0ca9a15b6153677', 39),
(93, 4, 'https://vip.opstream17.com/share/02e74f10e0327ad868d138f2b4fdd6f0', 39),
(94, 5, ' https://vip.opstream17.com/share/33e75ff09dd601bbe69f351039152189', 39),
(95, 6, 'https://vip.opstream17.com/share/34173cb38f07f89ddbebc2ac9128303f', 39),
(96, 7, 'https://vip.opstream17.com/share/6ea9ab1baa0efb9e19094440c317e21b', 39),
(97, 8, 'https://vip.opstream17.com/share/c16a5320fa475530d9583c34fd356ef5', 39),
(98, 2, ' https://vip.opstream17.com/share/89ae0fe22c47d374bc9350ef99e01685', 40),
(99, 3, ' https://vip.opstream17.com/share/f337d999d9ad116a7b4f3d409fcc6480', 40),
(100, 4, '  https://vip.opstream17.com/share/aff0a6a4521232970b2c1cf539ad0a19', 40),
(101, 5, 'https://vip.opstream17.com/share/c88d8d0a6097754525e02c2246d8d27f', 40),
(102, 6, 'https://vip.opstream17.com/share/204da255aea2cd4a75ace6018fad6b4d', 40),
(103, 7, 'https://vip.opstream17.com/share/35464c848f410e55a13bb9d78e7fddd0', 40),
(104, 8, ' https://vip.opstream17.com/share/6b8eba43551742214453411664a0dcc8', 40),
(105, 9, 'https://vip.opstream17.com/share/351b33587c5fdd93bd42ef7ac9995a28', 40),
(106, 10, 'https://vip.opstream17.com/share/4e6cd95227cb0c280e99a195be5f6615', 40),
(107, 11, 'https://vip.opstream17.com/share/18ead4c77c3f40dabf9735432ac9d97a', 40),
(108, 12, 'https://vip.opstream17.com/share/98986c005e5def2da341b4e0627d4712', 40),
(109, 2, '  https://vip.opstream11.com/share/f69a5ac83a9b713c404a7f5c3cc3f38e', 42),
(110, 3, 'https://vip.opstream11.com/share/1ab59cc3f2f7e8707dd194e788e14861', 42),
(111, 4, 'https://vip.opstream11.com/share/7277a11074131374e3fe7f00fa9b5a9d', 42),
(112, 5, 'https://vip.opstream11.com/share/e59c62a0e3bb247c17c1b7cccb82dc02', 42),
(113, 6, 'https://vip.opstream11.com/share/abfbc9218080a0a948e2485b28a14171', 42),
(114, 7, 'https://vip.opstream11.com/share/5816bbdeed7f46a35c1f542c4aba0336', 42),
(115, 8, ' https://vip.opstream11.com/share/78c9993a943c7fc54b2c81d428e9a921', 42),
(116, 9, 'https://vip.opstream11.com/share/0b7b648ed41a32e7c391c52996c51c3a', 42),
(117, 10, 'https://vip.opstream11.com/share/afa5d8d1cff2526e9c9bd71ef3b4c7cc', 42),
(118, 11, 'https://vip.opstream11.com/share/1795dd80219aee955f3827f8178b555d', 42),
(119, 12, 'https://vip.opstream11.com/share/8bbd6ed02e5b1387ac5e61e03b1608fb', 42),
(120, 13, 'https://vip.opstream11.com/share/a9b6b5a8a81a04a77ce3c809a94fda13', 42),
(121, 14, 'https://vip.opstream11.com/share/14d7dcbc02704ffaa6a285f6bae7353e', 42),
(122, 15, '  https://vip.opstream11.com/share/1a4f44ed6b4af67129c6c0b1564a2120', 42),
(123, 16, 'https://vip.opstream11.com/share/ae0bb1efb479568dc1a3fddcd91a7ca0', 42),
(124, 17, 'https://vip.opstream11.com/share/d3f3fc2af03f6d233127c67def83093c', 42),
(125, 18, 'https://vip.opstream11.com/share/3926d36a800e0517690ac5aeec814c21', 42),
(126, 19, 'https://vip.opstream11.com/share/94ac524c4fd3a20b66ecefb70d8db8fd', 42),
(127, 20, 'https://vip.opstream11.com/share/2f6a0826437abc6688b22dfd89d783c0', 42),
(128, 21, 'https://vip.opstream11.com/share/cfc9acc5717fa8f921a7c6e704383496', 42),
(129, 22, 'https://vip.opstream17.com/share/2f885d0fbe2e131bfc9d98363e55d1d4', 42),
(130, 23, ' https://vip.opstream17.com/share/fba9d88164f3e2d9109ee770223212a0', 42),
(131, 24, ' https://vip.opstream17.com/share/2290a7385ed77cc5592dc2153229f082', 42);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `link_trailer` varchar(225) NOT NULL,
  `link_movie` varchar(225) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `thumbnail_movie` varchar(225) NOT NULL,
  `thumbnail_trailer` varchar(225) NOT NULL,
  `description` text DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `nation` varchar(50) DEFAULT NULL,
  `rating` float NOT NULL,
  `views` int(225) DEFAULT 0,
  `flag` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `link_trailer`, `link_movie`, `title`, `thumbnail_movie`, `thumbnail_trailer`, `description`, `release_date`, `duration_minutes`, `author`, `genre_id`, `nation`, `rating`, `views`, `flag`) VALUES
(9, 'https://www.youtube.com/watch?v=rnPIJMkCeiU', '//ok.ru/videoembed/757049068203', 'Câu lạc bộ báo thù', 'cau-lac-bo-bao-thu.webp', 'cau-lac-bo-bao-thu-trailer.jpg', 'Câu Lạc Bộ Báo Thù, Avengers Social Club 2017 FHD Vietsub.\r\nBộ phim kể câu chuyện về những người dân bình thường, mỗi người đều mang theo những lý do riêng biệt, họ quyết định lập kế hoạch trả thù theo cách của mình.', '2017-01-27', 102, 'Kwon Seok-jang, Kim Sang-ho', 16, 'Hàn Quốc', 8, 290, 0),
(11, 'https://www.youtube.com/watch?v=CtmcwhzzjXQ', 'https://playhydrax.com/?v=HPti3EMKB', 'Nội chiến siêu anh hùng Captain America: Civil War (2016) ', 'civil-war.jpg-20240229145429', 'civil-war-trailer.jpg', '\"Civil War\" là một bộ phim siêu anh hùng của Mỹ phát hành vào năm 2016, là một phần của Marvel Cinematic Universe (MCU). Bộ phim có tiêu đề đầy đủ là \"Captain America: Civil War\" và được đạo diễn bởi Anthony và Joe Russo.\r\n\r\nMô tả:\r\n\r\nBối cảnh của \"Civil War\" diễn ra sau sự kiện của \"Avengers: Age of Ultron\" khi thế giới bắt đầu chịu áp lực từ sự tồn tại của các siêu anh hùng và các vụ tấn công gây ra bởi họ. Cảm thấy phải đối mặt với sự trách nhiệm và quyền lực của họ, chính phủ Mỹ đề xuất một sự kiện kiểm soát mang tên \"Sự kiện Sokovia\" để đặt ra các siêu anh hùng dưới sự kiểm soát và giám sát chính thức.\r\n\r\nTuy nhiên, cuộc đối đầu bắt đầu nảy lửa khi Captain America và Iron Man, hai nhân vật chính của MCU, trở thành hai phe phái đối lập. Trong khi Steve Rogers (Captain America) tin rằng siêu anh hùng cần tự do để hành động và không nên phụ thuộc vào chính phủ, Tony Stark (Iron Man) ủng hộ việc giám sát chính thức và sự kiểm soát để đảm bảo an toàn cho nhân dân.\r\n\r\nCuộc chia rẽ không chỉ làm tan nát đội Avengers mà còn khiến họ phải đối đầu với nhau. Hai phe phái của các siêu anh hùng chia thành hai nhóm, mỗi nhóm đang tìm cách thuyết phục người khác hoặc ngăn chặn họ tham gia vào một cuộc chiến khốc liệt, dẫn đến những trận đánh đỉnh điểm và sự thất bại đau đớn.\r\n\r\n', '2016-01-27', 147, 'Anthony và Joe Russo', 7, 'Mỹ', 8.8, 32, 0),
(12, 'https://www.youtube.com/watch?v=uHW-JsNu6tk', '//ok.ru/videoembed/6821809621732', 'Người vợ cuối cùng ( The last wife )', 'nguoi-vo-cuoi-cung.jpg', 'nguoivocuoicung-trailer.jpg', 'Người Vợ Cuối Cùng - The Last Wife , HD, The Last Wife 2024\r\nLấy cảm hứng từ tiểu thuyết Hồ Oán Hận, của nhà văn Hồng Thái, Người Vợ Cuối Cùng là một bộ phim tâm lý cổ trang, lấy bối cảnh Việt Nam vào triều Nguyễn. LINH – Người vợ bất đắc dĩ của một viên quan tri huyện, xuất thân là con của một gia đình nông dân nghèo khó, vì không thể hoàn thành nghĩa vụ sinh con nối dõi nên đã chịu sự chèn ép của những người vợ lớn trong gia đình. Sự gặp gỡ tình cờ của cô và người yêu thời thanh mai trúc mã của mình – NH N đã dẫn đến nhiều câu chuyện bất ngờ xảy ra khiến cuộc sống cô hoàn toàn thay đổi. (CHIẾU LẠI TỪ 19/01/2024)', '2023-11-17', 132, 'Vicor Vũ', 16, 'Việt Nam', 7.6, 28, 0),
(13, 'https://www.youtube.com/watch?v=10r9ozshGVE', '//ok.ru/videoembed/7666432412341', 'Kungfu Panda 3 2016', 'kungfu-panda.jpg', 'kungfu-panda-trailer.jpg', '\"Kung Fu Panda 3\" là một bộ phim hoạt hình sản xuất bởi DreamWorks Animation, phần tiếp theo của loạt phim \"Kung Fu Panda\". Bộ phim được đạo diễn bởi Jennifer Yuh Nelson và Alessandro Carloni. Đây là phần tiếp theo của \"Kung Fu Panda 2\" và là phần cuối cùng của loạt phim.\r\n\r\nBối cảnh của \"Kung Fu Panda 3\" diễn ra sau các sự kiện của phần hai. Trong bộ phim này, Po, nhân vật chính, phải đối mặt với một thách thức mới khi gặp gỡ cha ruột của mình và học được nhiều điều mới về bản thân và quá khứ của mình.\r\n\r\nBộ phim tiếp tục sử dụng phong cách hoạt hình ấn tượng và hài hước của loạt phim trước đó, cũng như các diễn viên lồng tiếng nổi tiếng như Jack Black (lồng tiếng cho nhân vật Po), Angelina Jolie, Dustin Hoffman, và Lucy Liu.\r\n\r\n\"Kung Fu Panda 3\" đã được công chiếu rộng rãi trên toàn cầu và nhận được đánh giá tích cực từ cả khán giả và các nhà phê bình.', '2016-01-27', 95, 'Jennifer Yuh Nelson, Alessandro Carloni', 6, 'Hoa Kỳ', 8, 21, 0),
(14, 'https://www.youtube.com/watch?v=DLPxBsejBbw', '//ok.ru/videoembed/6406806506203', 'Ninja Rùa: Hỗn loạn tuổi dậy thì', 'ninja-rua.jpg', 'ninja-rua-trailer.jpg', 'Tóm tắt\r\nNinja Rùa: Hỗn Loạn Tuổi Dậy Thì – Teenage Mutant Ninja Turtles: Mutant Mayhem (2023) sau nhiều năm được che chở khỏi thế giới loài người, bốn anh em rùa bắt đầu chinh phục trái tim người dân New York và được chấp nhận như những thiếu niên bình thường thông qua những hành động anh hùng. Người bạn mới của họ, April O’Neil, giúp họ đối đầu với một tổ chức tội phạm bí ẩn, nhưng họ sớm gặp rắc rối khi một quân đội đột biến', '2023-09-27', 92, 'Kevin Eastman ,  Peter Laird', 6, 'Hoa Kỳ', 8.2, 43, 0),
(15, 'https://www.youtube.com/watch?v=HZecJH5u1dw', 'https://vip.opstream17.com/share/7810ccd41bf26faaa2c4e1f20db70a71', 'Trận chiến tàn khốc ( Land of Bad 2024 )', 'Tran-Chien-Tan-Khoc-Land-of-Bad-2024-poster.webp', 'Tran-Chien-Tan-Khoc-Land-of-Bad-2024-1.webp', 'Khi một nhiệm vụ đặc biệt của Lực lượng Delta gặp trục trặc nghiêm trọng, phi công lái máy bay không người lái Reaper của Lực lượng Không quân có 48 giờ để khắc phục những gì đã biến thành một chiến dịch giải cứu hoang dã. Không có vũ khí và không có phương tiện liên lạc nào ngoài chiếc máy bay không người lái phía trên, nhiệm vụ trên mặt đất', '2024-02-28', 113, 'William Eubank', 7, 'Australia, Âu-Mỹ', 7.4, 23, 0),
(16, 'https://www.youtube.com/watch?v=9Euf0lCAYyc', 'https://vip.opstream17.com/share/1ee3dfcd8a0645a25a35977997223d22', 'Einstenin And The Bomb (Einstenin và trái bom)', 'hWRKHXKfu2WJGICdVpKZ0jEKsbp[1].jpg', 'einstein-and-the-bomb.jpg', 'Chuyện gì xảy ra sau khi Einstein trốn khỏi Đức Quốc xã? Qua phim tư liệu và lời chia sẻ của chính ông, bộ phim tài liệu chính kịch này đào sâu tâm trí của thiên tài bị dằn vặt.', '2024-02-23', 78, 'Anthony Philipson', 14, 'Hoa Kỳ', 7.3, 14, 0),
(17, 'https://www.youtube.com/watch?v=yjRHZEUamCc', 'https://hd1080.opstream2.com/share/8c3b5e395a73855eb15bf81d2f249f00', 'Join Wick Phần 4', 'FYWSFm5VUAAlNkI[1]-20240229162722.jpg', 'iDz920a[1].jpg', ' là câu chuyện của John Wick (Keanu Reeves) đã khám phá ra con đường để đánh bại High Table. Nhưng trước khi có thể kiếm được tự do, Wick phải đối đầu với kẻ thù mới với những liên minh hùng mạnh trên toàn cầu và những lực lượng biến những người bạn cũ thành kẻ thù.', '2023-07-29', 170, 'Chad Stahelski', 7, 'Mỹ', 8.7, 34, 0),
(22, 'https://youtube.com/watch?v=Q111qAilU7A', 'https://vip.opstream16.com/share/e909f4555009667712db532a9b58f118', 'Biệt đội Marvel (2023)', 'qgotFL0XUevylN2enbc3SeT7x2m[1]-20240301171758.jpg', 'feSiISwgEpVzR1v3zv2n2AU4ANJ[1]-20240301171758.jpg', 'Carol Danvers, hay còn gọi là Captain Marvel, đã lấy lại danh tính của mình từ Kree độc tài và trả thù Trí tuệ tối cao. Nhưng những hậu quả ngoài ý muốn khiến Carol phải gánh vác gánh nặng của một vũ trụ bất ổn. Khi nhiệm vụ của cô ấy đưa cô ấy đến một hố sâu dị thường có liên quan đến một nhà cách mạng Kree, sức mạnh của cô ấy bị vướng vào sức mạnh của Kamala Khan, một người hâm mộ cuồng nhiệt của Thành phố Jersey, hay còn gọi là Ms. Marvel, và cháu gái bị ghẻ lạnh của Carol, hiện là S.A.B.E.R. phi hành gia thuyền trưởng Monica Rambeau. Cùng với nhau, bộ ba kỳ lạ này phải hợp tác và học cách phối hợp với nhau để cứu vũ trụ.', '2023-03-01', 105, 'Nia DaCosta', 7, 'Hoa Kỳ', 8, 9, 0),
(23, 'https://youtube.com/watch?v=lxl2OOtivck', 'https://vip.opstream13.com/share/b6e710870acb098e584277457ba89d68', 'TRÒ CHƠI KIM TỰ THÁP (VIETSUB) Pyramid Game (2024)', 'Pyramid-Game[1]-20240301173742.jpg', 'mqdefault[1]-20240301173531.jpg', 'Trò chơi tàn khốc của những kẻ tấn công, nạn nhân và những người ngoài cuộc trong lớp học khi học sinh cạnh tranh để đứng đầu kim tự tháp.', '2024-03-08', 55, 'Park So-yeon', 9, 'Hàn Quốc', 8.8, 6, 0),
(24, 'https://www.youtube.com/watch?v=PTrCwc1SKUo', ' https://vip.opstream16.com/share/7362b26d78069dd38f4b45743fddc7ee', 'NGÔI TRƯỜNG XÁC SỐNG 2021 ( Vietsub ) -All of Us Are Dead', 'all-us-of-dead-20240301174625.jpg', 'alll-trailer-20240301174625.jpg', 'Phim là câu chuyện xoay quanh hành trình sống còn chống lại xác sống của một nhóm học sinh bị mắc kẹt trong trường học khi xuất hiện một loại virus lây nhiễm có khả năng biến con người thành xác sống đang lây lan khắp thành phố. Đây không chỉ đơn thuần là cuộc đấu tranh với những thứ nguy hiểm và đáng sợ mà còn là thử thách khi đối diện với sự đố kỵ và lòng tham vô đáy của con người.', '2021-03-01', 60, 'Đang cập nhật', 9, 'Hàn Quốc', 8.2, 13, 0),
(25, 'https://www.youtube.com/watch?v=PrX1JJ5dduA', 'https://vip.opstream17.com/share/a40511cad8383e5ae8ddd8b855d135da', 'CODE 8: PHẦN II Code 8 Part II', 'locandina[1]-20240301175631.jpg', 'AAAABbCuKc8whDYp0L8MG-ovOi3MgvL0-LPdqiSp1DDf21M8l1SKzlaRRskiKURlPueAJB5oOMCbWkJCb2Aa6EYOX0uOIMh0aGnABmpL[1]-20240301175631.jpg', 'In a world where superpowered people are heavily policed by robots, an ex-con teams up with a drug lord he despises to protect a teen from a corrupt cop.', '2024-03-08', 101, 'Jeff Chan', 7, 'Âu Mỹ, Canada', 8, 1, 0),
(26, 'https://www.youtube.com/watch?v=Oa5zeHdSwdQ', 'https://vip.opstream17.com/share/93fb9d4b16aa750c7475b6d601c35c2c', 'Star Wars:Biệt đội nhân bản đặc biệt (The Bad Batch Season 3)', 'motchill-uk-star-wars-biet-doi-nhan-ban-dac-biet-phan-3-the-bad-batch-s3-teaser-poster_874f2de9[1]-20240301180139.jpeg', 'c3f35d200f9611ecbb7429b843c314ac-20240301180139.png', 'The Bad Batch là một đội đặc biệt được biến đổi gene để có khả năng đặc biệt hơn người bình thường. Đội này chuyên có những nhiệm vụ đặc biệt mà thậm chí Jedi mới có thể làm, thường những nhiệm vụ này trên trình Clone bình thường. Trong phần 7 vừa rồi, The Bad Batch đã xuất hiện để hỗ trợ Anakin và Rex cứu lấy Echo. Tuy nhiên vì khác biệt với phần còn lại nên Echo đã đi cùng The Bad Batch để khác biệt cùng họ.', '2024-02-08', 27, 'Đang cập nhật', 7, 'Âu Mỹ', 7.9, 2, 0),
(27, 'https://www.youtube.com/watch?v=GBEgoaLZzXM', ' https://vip.opstream13.com/share/e4a93f0332b2519177ed55741ea4e5e7', 'HALO (PHẦN 2) (VIETSUB) Halo Season 2', 'halo-phan-2-thumb[1]-20240301180717.jpg', 'GamehubVN-phim-trung-quoc-dao-nhai[1]-20240301180717.jpg', 'Halo (2022) bộ phim được lấy ý tưởng từ trò chơi cùng tên, bối cảnh diễn ra ở thế kỷ 26 khi vũ trụ được đẩy mạnh khai phá và sự xuất hiện của những dấu hiệu sống ngoài con người được biết đến. Lúc này người ngoài hành tinh đến Trái Đất mang theo ý định xâm lược, đe doạ sự tồn vong của toàn nhân loại', '2024-03-01', 58, 'Đang cập nhật', 12, 'Âu Mỹ, Anh', 8.3, 5, 0),
(28, 'https://www.youtube.com/watch?v=Z1BCujX3pw8', '     https://vip.opstream11.com/share/a38b16173474ba8b1a95bcbc30d3b8a5', 'ĐẠI ÚY MARVEL Captain Marvel', 'cYq1wkJK2y44SeX79VXzRZP46iX[1]-20240301181312.jpg', 'qAzYK4YPSWDc7aa4R43LcwRIAyb[1]-20240301181312.jpg', 'Carol Danvers trở thành một trong những anh hùng mạnh nhất của vũ trụ khi Trái đất bị bắt ở giữa một cuộc chiến thiên hà giữa hai chủng tộc ngoài hành tinh.', '2024-03-01', 122, 'Anna Boden, Ryan Fleck,  Geneva Robertson-Dworet', 12, 'Hoa Kỳ', 8.3, 3, 0),
(29, 'https://www.youtube.com/watch?v=PzyjvWiigxg', 'https://vip.opstream14.com/share/a368b0de8b91cfb3f91892fbf1ebd4b2', 'NGƯỜI SÓI X-Men Origins: Wolverine 2009', 'iffWlf6scXhqv4PlIhYbHOre5tI[1]-20240301181943.jpg', 'wvqdJLVh0mSblly7UnYFPEk04Wd[1]-20240301181943.jpg', 'Marvel một lần nữa đưa đến cho khán giả câu chuyện mới đầy hấp dẫn về chàng Người Sói Logan - siêu anh hùng vốn được đông đảo khán giả yêu mến. Được đặt sau mốc sự kiện của X-Men: The Last Stand, bộ phim dõi theo hành trình của Logan lưu lạc tới đất nước Nhật Bản xa xôi, nơi anh bị lạc lõng hoàn toàn.\r\nGặp lại một cố nhân tại xứ mặt trời mọc, Logan nhận được một đề nghị có thể khiến anh thay đổi hoàn toàn cuộc sống cô độc: loại bỏ tất cả các năng lực để anh trở thành người thường. Giữa muôn trùng nguy hiểm đến từ những kẻ thù xung quanh, liệu anh chàng Người Sói có từ bỏ sự bất tử của mình?', '2009-11-11', 107, 'Gavin Hood', 12, 'Âu Mỹ, Anh', 8.9, 7, 0),
(30, 'https://www.youtube.com/watch?v=DwG56k6VGOE', '  https://vip.opstream10.com/share/2c89109d42178de8a367c0228f169bf8', 'Người Sói Wolverine (2013)', 'u6WIn5lhgFYGsOVoojnBg9MUbeo[1]-20240301182213.jpg', 'tqPRfJsrCtX5BvtAP4Bahwhq2dU[1]-20240301182213.jpg', 'Marvel một lần nữa đưa đến cho khán giả câu chuyện mới đầy hấp dẫn về chàng Người Sói Logan - siêu anh hùng vốn được đông đảo khán giả yêu mến. Được đặt sau mốc sự kiện của X-Men: The Last Stand, bộ phim dõi theo hành trình của Logan lưu lạc tới đất nước Nhật Bản xa xôi, nơi anh bị lạc lõng hoàn toàn.\r\n\r\nGặp lại một cố nhân tại xứ mặt trời mọc, Logan nhận được một đề nghị có thể khiến anh thay đổi hoàn toàn cuộc sống cô độc: loại bỏ tất cả các năng lực để anh trở thành người thường. Giữa muôn trùng nguy hiểm đến từ những kẻ thù xung quanh, liệu anh chàng Người Sói có từ bỏ sự bất tử của mình?', '2013-01-30', 126, 'James Mangold', 12, 'Âu Mỹ, Anh', 9, 1, 0),
(31, 'https://www.youtube.com/watch?v=zDL0Za9F7_4', ' https://vip.opstream17.com/share/b0b183c207f46f0cca7dc63b2604f5cc', 'NGƯỜI HÙNG TIA CHỚP (PHẦN 9) The Flash (Season 9)', 'rg8N7x27Ef6PvlIiioLStf9ZaIO[1]-20240301182940.jpg', 'the-flash-season-9[1]-20240301182940.jpg', 'Sau khi đánh bại Reverse Flash một lần và mãi mãi, Barry Allen và Iris West-Allen đang kết nối lại và ngày càng thân thiết hơn bao giờ hết. Nhưng khi một nhóm Rogue chết chóc tràn vào Thành phố Trung tâm do một mối đe dọa mới mạnh mẽ dẫn đầu, The Flash và nhóm của anh một lần nữa phải bất chấp những khó khăn bất khả thi để cứu lấy thế giới. Nhưng khi The Rogues bị đánh bại, một kẻ thù nguy hiểm mới trỗi dậy thách thức di sản anh hùng của Barry Allen. Và trong trận chiến vĩ đại nhất từ trước đến nay, Barry và Team Flash sẽ bị đẩy đến giới hạn của mình để cứu Central City lần cuối.', '2014-07-11', 45, 'Đang cập nhật', 12, 'Âu Mỹ', 7.8, 1, 0),
(32, 'https://www.youtube.com/watch?v=fsRLcPlGsxE', 'https://vip.opstream13.com/share/2c3ddf4bf13852db711dd1901fb517fa', 'TÀI PHIỆT VÀ CẢNH SÁT (VIETSUB) Flex X Cop', 'rEuuCZb7PsVzRYJ1DiWJZ7QYFqn[1]-20240301183628.jpg', 'nOGPxfYqd0f3oeFGGinpDOP68MQ[1]-20240301183628.jpg', 'Bộ phim xoay quanh anh chàng Jin Yi Soo, một người được coi là tầng lớp thìa vàng của xã hội Hàn Quốc hiện nay. Cuộc sống của anh vốn đang bình yên nhưng bỗng dưng vướng vào một vụ án, từ đó đã thay đổi con người anh ta và đưa đẩy sang một lối rẽ khác. Yi Soo đã tham gia một đội điều tra tợi sở cảnh sát và chuyên săn bắt cướp. anh ta sử dụng các mối quan hệ và sự giàu có để làm lợi thế cho mình và tuân theo sự chỉ huy của một vị thám tử tận tâm tên là Lee Kang Hyun.', '2024-03-01', 45, 'Kim Jae-hong', 7, 'Hàn Quốc', 8.4, 1, 0),
(33, 'https://www.youtube.com/watch?v=xEmlE9Ianuo', '  https://vip.opstream17.com/share/d736bb10d83a904aefc1d6ce93dc54b8', 'THẾ THẦN: NGỰ KHÍ SƯ CUỐI CÙNG Avatar: The Last Airbender', 'dkMsZu2cSOopqbSxUSLERQtRgbP[1]-20240301185035.jpg', 'u62XtaV8Iski2CgAUM8Yp0ZgKxD[1]-20240301185035.jpg', 'Thủy. Thổ. Hỏa. Khí. Từ xa xưa, bốn quốc gia chung sống hòa bình – và rồi mọi chuyện đổi thay.\r\nCậu bé nổi tiếng với danh xưng Thế thần phải thuần thục bốn sức mạnh nguyên tố để cứu thế giới đang chiến tranh... và chiến đấu với kẻ thù tàn nhẫn muốn ngăn cản mình.', '2024-02-23', 55, 'Đang cập nhật', 8, 'Âu Mỹ', 7.8, 2, 0),
(34, 'https://www.youtube.com/watch?v=Qs6Ne-Bqn6U', ' https://vip.opstream13.com/share/512fc3c5227f637e41437c999a2d3169', 'NHỮNG CÔ NÀNG LẮM CHIÊU (VIETSUB) Mean Girls', '5T5HYVQ5IPrKPb2aHA67t18j50A[1]-20240301185826.jpg', 'dmiN2rakG9hZW04Xx7mHOoHTOyD[1]-20240301185826.jpg', 'Học sinh mới Cady Heron được chào đón vào vị trí đứng đầu chuỗi thức ăn xã hội bởi nhóm các cô gái nổi tiếng ưu tú có tên là \'The Plastics\', được cai trị bởi ong chúa quỷ quyệt Regina George và tay sai của cô ta là Gretchen và Karen. Tuy nhiên, khi Cady mắc sai lầm lớn khi phải lòng Aaron Samuels, bạn trai cũ của Regina, cô thấy mình trở thành con mồi trong tầm ngắm của Regina. Khi Cady chuẩn bị hạ gục kẻ săn mồi đỉnh cao của nhóm với sự giúp đỡ của những người bạn bị ruồng bỏ Janis và Damian, cô phải học cách sống thật với chính mình trong khi điều hướng khu rừng khốc liệt nhất: trường trung học.', '2024-03-07', 113, 'Samantha Jayne, Arturo Perez Jr.', 10, 'Âu Mỹ', 7.8, 2, 0),
(35, 'https://www.youtube.com/watch?v=46RuZLu6dso', ' https://vip.opstream17.com/share/ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'NGƯỜI YÊU, KẺ RÌNH MÒ, SÁT NHÂN ( Lover, Stalker, Killer )', 'f5uojWzwJTCHBIV3rmGPTmQG7TF[1]-20240301190158.jpg', 'zMZUzJOMtdT0UyevOsq9F6qTooS[1]-20240301190158.jpg', 'Trong bộ phim tài liệu xoắn não này, người thợ máy nọ lần đầu tiên thử hẹn hò qua mạng và rồi gặp một người phụ nữ có nỗi ám ảnh tình ái đến mức chết người.', '2024-03-01', 90, 'Sam Hobkinson', 14, 'Anh', 8.8, 23, 0),
(36, 'https://www.youtube.com/watch?v=wQuteON5Y0o', 'https://vip.opstream16.com/share/2f1227c50fcdddb18e869bfdeae65a06', 'TRẢ THÙ Ganti-Ganti', 'qwbcX5bVkH3e5jAiHzw116n2rFO[1]-20240301190741.jpg', 'btsn4Q6edX5676Zh3Kb0jScQcZ0[1]-20240301190741.jpg', 'Bốn cuộc đời trở nên gắn bó với nhau vì một mục tiêu - trả thù. Mọi chuyện trở nên đẫm máu và hỗn loạn hơn khi tất cả đều nhận ra kẻ chủ mưu thực sự là ai.', '2023-06-02', 92, 'Mac Alejandre', 20, 'Philippines', 10, 4, 0),
(37, 'https://www.youtube.com/watch?v=2OQNR4CycbI', ' https://vip.opstream11.com/share/0c6ce35af00a57880fe02c768047dff8', 'Giam Cầm (2023)', '6bMaHRr38CgDQyHrw0CzCqXUJuC[2]-20240301193006.jpg', 'obz2rAWVhBXKr1pG2DwjZmA30nJ[3]-20240301193006.jpg', 'Lena trở về quê hương sau khi học xong đại học. Bạn trai Arthur của cô vô cùng ghen tị và giận dữ khi biết rằng Lena có một người bạn trai khác đến từ thành phố.', '2023-12-07', 99, 'Roman Perez Jr.', 20, 'Philippines', 8.5, 1, 0),
(38, 'https://www.youtube.com/watch?v=4jS5eaA_HHo', ' https://vip.opstream13.com/share/6e0e24295e8a86282cb559b860416812', 'DĨ ÁI VI KHẾ (KHẾ ƯỚC TÌNH YÊU) (VIETSUB) Taking Love as a Contract', 'di-ai-vi-khe-khe-uoc-tinh-yeu-thumb-scaled[1]-20240301194249.jpg', '1708072374-di-ai-vi-khe-khe-uoc-tinh-yeu-poster[1]-20240301194249.jpg', 'Xia Tian là một nữ diễn viên trẻ đầy tham vọng, cô nhận ra mình mang danh tính con gái của gia đình He trong một hành động tuyệt vọng để bảo vệ ngôi nhà của bà ngoại. Giờ đây, trong lốt công chúa của xã hội, cô và con trai nuôi giàu có của gia đình Hạ, Cheng Xuân, bất ngờ yêu nhau khi họ làm việc cùng nhau để cuối cùng được gia đình công nhận.', '2024-03-02', 15, '林森', 11, 'Trung Quốc', 8, 29, 0),
(39, 'https://www.youtube.com/watch?v=DbJuRN-cE4w', 'https://vip.opstream17.com/share/1ff1de774005f8da13f42943881c655f', 'Champion (2023)', 'bwkr5TtDp82XsBvGwo5wntzj8dw[1]-20240301200643.jpg', '3mI5WeLmj2AAEw7Op3LOkej70oX[1]-20240301200643.jpg', 'Rapper Bosco ra tù và sẵn sàng cho màn tái xuất, nhưng rồi em gái Vita của anh trở thành tâm điểm chú ý và khiến mối quan hệ gia đình của họ gặp thử thách.', '2023-01-02', 45, 'Candice Carty-Williams', 15, 'Anh', 7.7, 0, 0),
(40, 'https://www.youtube.com/watch?v=rqXFZ9aYCJQ', 'https://vip.opstream17.com/share/89ae0fe22c47d374bc9350ef99e01685', 'Phụ nữ ( WOMAN )', 'hvdymBKjyZYCk40p6e1bbnCGCNu[1]-20240301201130.jpg', '1OJ6HufTedi68LGP6ELa8wJWYKG[1]-20240301201130.jpg', 'ental death of her husband and being deemed ineligible for welfare, Koharu struggles to care for her two children.', '2013-02-02', 54, 'Jun Aizawa, Nobuo Mizuta', 13, 'Nhật Bản', 8.4, 2, 0),
(41, 'https://www.youtube.com/watch?v=e1k1PC0TtmE', 'https://vip.opstream13.com/share/2ef35a8b78b572a47f56846acbeef5d3', 'VÒNG VÂY CÁ MẬP (VIETSUB) No Way Up', 'yD3wMrQvG59IIWm3fYGjn1Lk0hT[1]-20240301201941.jpg', '4woSOUD0equAYzvwhWBHIJDCM88[1]-20240301201941.jpg', 'Các nhân vật có hoàn cảnh khác nhau gặp nhau khi chiếc máy bay họ đang di chuyển đâm xuống Thái Bình Dương. Một cuộc chiến sinh tồn ác mộng xảy ra sau đó khi nguồn cung cấp không khí cạn kiệt và những nguy hiểm đang rình rập từ mọi phía.', '2024-03-09', 90, 'Claudio Fäh', 12, 'Anh', 9.4, 5, 0),
(42, 'https://www.youtube.com/watch?v=G-vVAtL2hU8', '      https://vip.opstream11.com/share/1549586c33cbaa0c0b9f9db750b8768b', 'CẠM BẪY NGỌT NGÀO (Sweet Trap)', '1yLn9L4ee6lOppg9TR9QILITdGy[3]-20240301202414.jpg', 'b6EuVcxEvtNhNtEhCzBhrVT9rHH[1]-20240301202414.jpg', 'Bếp trưởng kém tiếng tăm Khương Giới và cô học trò đầy sức sống Lý Nại từng là thanh mai trúc mã, nhiều năm sau trùng phùng lại trở thành đối thủ mang mối hận “đoạt đao”. Để trả thù Khương Giới đoạt đao, Lý Nại đành thâm nhập “nằm vùng” ở nhà hàng của Khương Giới. Từ thuở đầu không ưa nhau đến khi hiểu được lòng mình rồi hướng về phía nhau, cả hai cùng gặt hái được tình yêu và trưởng thành qua những cuộc đọ sức tài nấu bếp.', '2024-03-01', 35, '	Đang cập nhật', 11, 'Trung Quốc', 8.4, 18, 0),
(43, 'https://www.youtube.com/watch?v=DKqu9qc-5f4', 'https://vip.opstream11.com/share/3c947bc2f7ff007b86a9428b74654de5', 'AVENGERS: CUỘC CHIẾN VÔ CỰC (Avengers: Infinity War)', '8gHc1cthgTOkmMiOREodCVZgJ7P[1]-20240301203833.jpg', 'mDfJG3LC3Dqb67AZ52x3Z0jU0uB[1]-20240301203833.jpg', 'The Avengers và các đồng minh của họ phải sẵn sàng hy sinh tất cả trong một nỗ lực để đánh bại Thanos mạnh mẽ trước khi Blitz của sự tàn phá và hủy hoại của anh ta chấm dứt vũ trụ.', '2018-02-02', 149, 'Joe Russo, Anthony Russo', 12, 'Âu Mỹ', 9.8, 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `verification_code` varchar(264) NOT NULL,
  `verified` int(1) DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 0,
  `modifier` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `create_at`, `verification_code`, `verified`, `is_active`, `modifier`) VALUES
(6, 'admin', 'Lequyhieu2004', 'lequyhieu1024@gmail.com', '2024-03-01 03:36:30', 'ef2aff491f41325d81f41aad79c1a64c', 1, 1, 1),
(7, 'Hiếu đẹp trai Khách', 'Lehieu123', 'hieulqph36904@fpt.edu.vn', '2024-03-01 13:40:39', 'd586f969684c7e9e963ca22aa71b094a', 1, 0, 0),
(8, 'admin', '123123a', 'duongsinh2004@gmail.com', '2024-03-01 14:11:09', '5e3b31661cbcffff6065b1aa619c4589', 0, 0, 0),
(11, 'Hiếu đẹp trai', 'Lequyhieu2004', 'codephpnguvl@gmail.com', '2024-03-07 11:30:19', 'c00412e25e4e1054e315ee8ee34b472f', 1, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `link_movies`
--
ALTER TABLE `link_movies`
  ADD PRIMARY KEY (`link_id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `link_movies`
--
ALTER TABLE `link_movies`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Các ràng buộc cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
