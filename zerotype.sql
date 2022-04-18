-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th4 18, 2022 lúc 04:36 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `zerotype`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'thể thao'),
(3, 'game'),
(4, 'công nghệ'),
(5, 'chính trị'),
(6, 'sức khỏe'),
(7, 'kinh doanh'),
(8, 'giải trí'),
(9, 'thời tiết hôm nay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `news` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `author`, `news`, `content`) VALUES
(1, 1, 3, 'uwf ghe roi'),
(2, 1, 6, 'ok'),
(3, 1, 7, 'ngon day'),
(13, 1, 7, 'xin chao'),
(15, 8, 7, 'hello mk la van'),
(16, 3, 15, 'hello');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `short_content` text COLLATE utf8_unicode_ci NOT NULL,
  `long_content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `author`, `title`, `date`, `short_content`, `long_content`, `status`, `category_id`) VALUES
(7, 1, 'Đình chỉ đại úy công an liên quan vụ hành hung phụ nữ vì chỗ đỗ xe', '2022-05-01', '(Dân trí) - Đại úy công an ở Bình Dương bị tạm đình chỉ công tác vì liên quan đến vụ xô xát, hành hung một phụ nữ do mâu thuẫn chỗ đỗ xe.', 'Chiều 13/4, Công an tỉnh Bình Dương đã tạm đình chỉ công tác 30 ngày đối với Đại úy Trần Xuân Phương, Phó Đội trưởng thuộc Phòng Cảnh sát quản lý hành chính về trật tự xã hội (PC06), nhằm làm rõ sự việc xô xát với người dân tại phường An Thạnh (TP Thuận An) vì mâu thuẫn khi đỗ xe.\r\n\r\nGiám đốc công an tỉnh đã chỉ đạo các đơn vị chức năng khẩn trương xác minh, làm rõ để xử lý theo quy định.\r\n\r\nĐình chỉ đại úy công an liên quan vụ hành hung phụ nữ vì chỗ đỗ xe - 1\r\nChị H. bị một số người đàn ông đánh tới tấp (Ảnh: Cắt từ clip).\r\n\r\nTrước đó, khoảng 16h ngày 11/4, gia đình N.T.A.H. (SN 1989, ngụ TP Thuận An) đi ô tô vào đường An Thạnh 14 (phường An Thạnh, TP Thuận An) để về nhà. Khi vào hẻm khoảng 100m, xe của nhà chị H. bị một số ô tô đỗ chắn lối đi nên không thể vào trong.\r\n\r\nLúc này, chị H. đi tìm chủ xe nhờ di chuyển thì bị một số người đang tổ chức tiệc trong hẻm đi ra cự cãi, không đồng ý di chuyển để nhường đường. Một người đàn ông trong nhóm tự xưng công an và thách thức chị H. gọi công an đến.\r\n\r\nSau một lúc cự cãi, hai bên xảy ra xô xát, chị H. bị một số người dùng tay chân tấn công vào đầu, cơ thể. Toàn bộ sự việc được camera hành trình của ô tô ghi lại. Hình ảnh clip còn thể hiện cảnh người đàn ông giữ tay, giật cùi chỏ, khống chế chị H.\r\n\r\nSau khi bị hành hung, chị H. cùng gia đình đến cơ quan công an trình báo trong tình trạng bị thương vùng đầu và cơ thể. \r\n\r\nCông an phường An Thạnh đã hướng dẫn chị H. đi giám định thương tích, phối hợp làm rõ sự việc.\r\n\r\nAds By DTads\r\n', 1, 3),
(12, 2, 'Anh Toi dep zai qua ạ', '2022-04-14', 'Anh Toi dep zai qua ạ', 'Anh Toi dep zai qua ạ', 1, 1),
(13, 1, 'Tạm dừng biến động tài sản liên quan ông Trịnh Văn Quyết tại Quảng Nam', '2022-04-18', 'Cơ quan CSĐT Bộ Công vừa có văn bản đề nghị UBND tỉnh Quảng Nam phối hợp cung cấp thông tin phục vụ điều tra liên quan vụ án hình sự thao túng thị trường chứng khoán xảy ra tại Tập đoàn FLC.', 'Ngay sau khi tiếp nhận văn bản, Chủ tịch UBND tỉnh Quảng Nam Lê Trí Thanh đã có văn bản gửi Sở Tư pháp tỉnh, yêu cầu chỉ đạo các đơn vị liên quan tạm dừng biến động tài sản của các cá nhân, tổ chức liên quan phục vụ yêu cầu điều tra vụ án.\r\n\r\nTạm dừng biến động tài sản liên quan ông Trịnh Văn Quyết tại Quảng Nam - 1\r\nMột góc TP Tam Kỳ, tỉnh Quảng Nam (Ảnh minh họa).\r\n\r\nVăn bản của Văn phòng cơ quan Cảnh sát điều tra (CSĐT) Bộ Công an gửi UBND tỉnh Quảng Nam đề nghị rà soát, cung cấp thông tin, tài liệu cho Cơ quan CSĐT Bộ Công an về tài sản (bất động sản, cổ phần/vốn góp, cổ phiếu…) đứng tên cá nhân và các công ty liên quan đến Tập đoàn FLC.\r\n\r\nCác cá nhân gồm ông Trịnh Văn Quyết - nguyên Chủ tịch Tập đoàn FLC và vợ là Lê Thị Ngọc Diệp, cùng 2 em gái ruột của ông Quyết là bà Trịnh Thị Thúy Nga - Phó Tổng Giám đốc Công ty CP chứng khoán BOS, Trịnh Thị Minh Huế - cán bộ Ban kế toán Tập đoàn FLC.\r\n\r\nNgay sau khi tiếp nhận công văn của Bộ Công an, Chủ tịch UBND tỉnh Quảng Nam Lê Trí Thanh giao Sở Tư pháp chỉ đạo các văn phòng công chứng, đơn vị liên quan rà soát, kiểm tra và dừng thực hiện các hồ sơ đăng ký biến động (giao dịch chuyển nhượng, mua, bán, cho, tặng, cầm cố, thế chấp…) đối với tài sản (bất động sản, cổ phần/vốn góp, cổ phiếu…) của các cá nhân có tên theo công văn của Cơ quan CSĐT Bộ Công an.\r\n\r\nSở Tư pháp Quảng Nam được giao chủ trì, phối hợp với các Sở, ban, ngành, đơn vị, địa phương có liên quan rà soát, cung cấp thông tin, tài liệu cho Cơ quan CSĐT Bộ Công an theo yêu cầu và đảm bảo thời gian, báo cáo UBND tỉnh theo dõi, chỉ đạo.\r\n\r\nLiên quan đến các dự án của Tập đoàn FLC tại tỉnh Quảng Nam, tại cuộc họp báo quý I/2022 được tổ chức đầu tháng 4, ông Nguyễn Hồng Quang - Phó Chủ tịch tỉnh Quảng Nam - thông tin: FLC từng có đề xuất làm dự án địa phương, tuy nhiên FLC chỉ mới đề xuất và cho đến nay chưa có gì liên quan đến thủ tục đầu tư dự án của FLC tại Quảng Nam.\r\n\r\nTheo tìm hiểu của phóng viên, vào tháng 9/2021, Văn phòng UBND tỉnh Quảng Nam có văn bản gửi các đơn vị liên quan về việc giải quyết đề nghị của Tập đoàn FLC.\r\n\r\nVăn phòng UBND tỉnh Quảng Nam đã nhận được Công văn số 789/FLC-BĐT2 ngày 1/9/2021 của FLC gửi UBND tỉnh về việc đề xuất giới thiệu địa điểm, ranh giới, hiện trạng sử dụng đất để nghiên cứu các dự án khu đô thị, khu du lịch sinh thái, sân golf, khu vui chơi giải trí thuộc TP Tam Kỳ, tỉnh Quảng Nam.\r\n\r\nSau khi nhận được công văn của Tập đoàn FLC, Văn phòng UBND tỉnh Quảng Nam cũng đã đề nghị FLC gửi hồ sơ, tài liệu, làm việc với UBND TP Tam Kỳ, Ban Quản lý các khu kinh tế và khu công nghiệp tỉnh để được giới thiệu địa điểm nghiên cứu các dự án theo đề nghị của công ty hoặc địa điểm khác phù hợp.', 1, 6),
(14, 1, 'Chiến hạm Moskva bị chìm - tổn thất hải quân lớn nhất của Nga trong 40 năm', '2022-04-18', 'Việc một tàu chiến lớn bị chìm trong trận chiến thực sự là một sự kiện hiếm có trong chiến tranh hải quân hiện đại.', 'Chiến hạm Moskva thuộc Dự án 1164 Slava của Hải quân Nga đã bị chìm ở Biển Đen hôm 14/4, chưa đầy 24 giờ sau khi có thông tin cho rằng nó bị tên lửa hành trình chống hạm Neptune của Ukraine tấn công.\r\n\r\nMặc dù hiện tại chưa rõ chắc chắn điều gì đã xảy ra với chiến hạm Moskva, nhưng việc nó bị chìm có tác động rất lớn, và đặc biệt nếu đó là hành động tấn công của Kiev thì sẽ là một sự kiện cực kỳ hiếm.\r\n\r\nHiện có những tranh cãi quanh số phận của chiến hạm này.\r\n\r\nBộ Quốc phòng Nga hôm 14/4 thông báo tàu bị hư hại nặng sau một vụ cháy gây nổ kho đạn và hơn 500 thủy thủ được sơ tán an toàn. Đám cháy trên tàu sau đó được khống chế và chiến hạm Moskva được kéo về cảng ở Crimea, với các bệ phóng tên lửa còn nguyên vẹn.\r\n\r\nTuy nhiên, trong quá trình được lai dắt về cảng, chiến hạm Moskva đã bị chìm do phần thân bị hư hại khiến tàu mất ổn định trong điều kiện sóng lớn, Bộ Quốc phòng Nga 14/4 cho biết thêm. Nhưng bộ này không cung cấp chi tiết về mức độ thiệt hại hoặc bất kỳ thông tin nào về số thương vong.\r\n\r\nTrong khi đó, giới chức Ukraine cho biết, quân đội nước này đã tập kích tên lửa Neptune, phá hủy nghiêm trọng chiến hạm Moskva của Nga ở Biển Đen. \"Tên lửa chống hạm Neptune phòng thủ ở Biển Đen đã gây thiệt hại nghiêm trọng cho tàu chiến của Nga\", Guardian dẫn thông tin trên Telegram của Thống đốc Odessa Maksym Marchenko cho biết.\r\n\r\nCố vấn của Tổng thống Ukraine, ông Oleksiy Arestovych, cũng viết trên mạng xã hội rằng: \"Bất ngờ đã đến với chiến hạm thuộc hạm đội Biển Đen của Nga. Nó đang bốc cháy dữ dội. Có 510 thủy thủ trên tàu\".\r\n\r\nNếu chiến hạm Moskva bị tên lửa chống hạm của Ukraine tấn công, hoặc thực sự trở thành nạn nhân của một cuộc tấn công khác của Ukraine khiến nó bị chìm, thì đây chính là một vụ việc lớn trong chiến tranh hải quân hiện đại.\r\n\r\nChiến hạm Moskva bị chìm - tổn thất hải quân lớn nhất của Nga trong 40 năm  - 2\r\nẢnh vệ tinh tàu tuần dương Moskva và các tàu hỗ trợ hôm 13/4 (Ảnh: Sentinel-1).\r\n\r\nĐây là vụ tàu quân sự lớn nhất bị chìm trong hàng thập niên qua, nhưng đây liệu có phải tổn thất cho Nga khi xem xét đến vai trò thực tế của soái hạm này trong cuộc chiến tại Ukraine?\r\n\r\nTrên hết, ý nghĩa trước mắt đối với Hải quân Nga là việc mất tàu chiến lớn nhất của họ ở Biển Đen, và là một trong số ít những chiếc Slavas từng được hoàn thành. Ngoài việc từng là một trong 6 tàu chiến lớn nhất của Hải quân Nga, Moskva còn là một vũ khí phòng không và chống hạm lớn trong khu vực, trang bị tên lửa đất đối không tầm xa và tên lửa chống hạm siêu thanh.\r\n\r\nĐiều đáng chú ý là Moskva là tàu chiến thứ hai của Hải quân Ng', 1, 5),
(15, 1, 'Lời khai của nghi phạm sát hại người phụ nữ xinh đẹp ở Hà Nội', '2022-04-20', 'Cùng làm lễ tân một công ty ở Hà Nội và có liên quan với nhau quanh việc nợ nần, trong lúc xảy ra mâu thuẫn, Phùng Văn Vinh đã dùng dao sát hại nạn nhân, khóa cửa phòng trọ rồi bỏ trốn.', 'Liên quan đến vụ người phụ nữ xinh đẹp tử vong tại chung cư mini trên địa bàn phường Quan Hoa (Cầu Giấy, Hà Nội), ngày 17/4, Công an quận Cầu Giấy đã khởi tố vụ án giết người, cướp tài sản. Cơ quan điều tra đã ra lệnh tạm giữ hình sự Phùng Văn Vinh (SN 1994) trú tại Sơn Dương, Tuyên Quang để điều tra về hành vi trên.\r\n\r\nLời khai của nghi phạm sát hại người phụ nữ xinh đẹp ở Hà Nội - 1\r\nĐối tượng Phùng Văn Vinh (Ảnh: Công an Hà Nội).\r\n\r\nBước đầu, tại cơ quan công an, Phùng Văn Vinh khai nhận mình và chị H. (SN 1987, quê Hòa Bình) cùng làm lễ tân một công ty ở Hà Nội. Vinh cho chị H. vay số tiền 80 triệu đồng từ khá lâu nhưng người phụ nữ này chưa trả.\r\n\r\nChiều 12/4, Vinh đến phòng trọ của chị H. ở ngõ 143 phố Quan Hoa, phường Quan Hoa. Tại đây, Vinh hỏi chị H. bao giờ trả được tiền thì chị H. chỉ trả được 6 triệu đồng và nói sẽ tiếp tục trả sau.\r\n\r\nHai bên đôi co, sau đó đã xảy ra xô xát. Vinh khai rằng chị H. buông lời lẽ thách thức khiến Vinh tức giận, lấy con dao gọt hoa quả đâm liên tiếp vào người nạn nhân.\r\n\r\nThấy chị H. bất động, vì muốn gỡ gạc chút tiền đã cho chị H. vay, Vinh lục lọi lấy 3 chiếc điện thoại di động và 4 triệu đồng. Trước khi bỏ trốn, Vinh khóa cửa phòng trọ nhằm che giấu hành vi phạm tội của mình.\r\n\r\nTiếp nhận tin báo về vụ án mạng, Công an quận Cầu Giấy phối hợp với Phòng Cảnh sát hình sự - Công an Hà Nội, Cục Cảnh sát hình sự - Bộ Công an khẩn trương điều tra, truy xét.\r\n\r\nÁp dụng đồng bộ các biện pháp nghiệp vụ, cảnh sát xác định nghi phạm Phùng Văn Vinh có dấu hiệu di chuyển vào các tỉnh phía Nam để chạy trốn nên đã đề nghị công an các tỉnh phối hợp truy bắt đối tượng.\r\n\r\nKhoảng 20h30 ngày 15/4, Phòng Cảnh sát giao thông - Công an tỉnh Quảng Bình nhận được tin báo của Công an Hà Nội về việc đối tượng Phùng Văn Vinh đang trên đường bỏ trốn bằng xe khách đi vào phía Nam. Đặc điểm nhận dạng tóc màu ánh kim, có hình xăm bông hoa trên cánh tay trái.\r\n\r\nNgay sau đó, Phòng Cảnh sát giao thông đã khẩn trương triển khai các biện pháp nghiệp vụ để theo dõi, rà soát các phương tiện nghi vấn; đồng thời, triển khai 3 tổ tuần tra, kiểm soát thực hiện nhiệm vụ trên tuyến khẩn trương chốt chặn trên tuyến quốc lộ 1, đường Hồ Chí Minh để kiểm tra, phát hiện, bắt giữ đối tượng.\r\n\r\nĐến khoảng 21h cùng ngày, tại Km 605 quốc lộ 1, đoạn đi địa bàn xã Quảng Phú, huyện Quảng Trạch tổ tuần tra của Phòng CSGT - Công an tỉnh Quảng Bình phối hợp với Công an Hà Nội và Cục Cảnh sát hình sự đã dừng chiếc ô tô khách loại 45 chỗ đang đi từ Bắc vào Nam để kiểm tra.\r\n\r\nThông qua đặc điểm nhận dạng đã được thông báo, lực lượng chức năng đã phát hiện, bắt giữ đối tượng Phùng Văn Vinh đang ở trên chiếc xe khách này.', 1, 6),
(16, 5, '15000 ca mắc mới, đã có 12.414 trẻ từ 5-11 tuổi được tiêm vaccine', '2022-04-13', ' Ngày 17/4, Bộ Y tế cho biết ca mắc mới trong nước tiếp tục giảm sâu, với 14.730 trường hợp ghi nhận trong ngày. Đến nay cũng đã có 12.414 trẻ em từ 5-11 tuổi được tiêm mũi một vaccine Covid-19.', 'Tính từ 16h ngày 16/4 đến 16h ngày 17/4, trên Hệ thống Quốc gia quản lý ca bệnh Covid-19 ghi nhận 14.730 ca nhiễm mới (giảm 3.744 ca so với ngày trước đó) tại 60 tỉnh, thành phố (có 11.192 ca trong cộng đồng).\r\n\r\n14.739 ca mắc mới, đã có 12.414 trẻ từ 5-11 tuổi được tiêm vaccine - 1\r\nBác sĩ khám sàng lọc trước khi tiêm phòng cho trẻ em (Ảnh: Minh Hoàng).\r\n\r\nHà Nội vẫn đứng đầu cả nước dù số mắc mới trong ngày giảm còn 1.253 ca. Tiếp đó là Yên Bái (801), Quảng Ninh (778), Phú Thọ (749), Nghệ An (746), Tuyên Quang (582), Thái Bình (547), Bắc Giang (534), Thái Nguyên (509), Đắk Lắk (482), Hải Dương (448), Vĩnh Phúc (441), Lào Cai (440), TPHCM (427), Bắc Kạn (398), Quảng Bình (398), Gia Lai (368), Hưng Yên (263), Lạng Sơn (258), Bắc Ninh (233), Cao Bằng (224), Sơn La (220), Hà Tĩnh (213), Quảng Nam (208), Ninh Bình (187), Nam Định (186), Bình Định (183), Hà Giang (181), Lâm Đồng (176), Quảng Trị (143), Bến Tre (142), Vĩnh Long (135), Điện Biên (135), Đà Nẵng (131), Đắk Nông (126), Bình Dương (124), Lai Châu (122), Hà Nam (120), Hòa Bình (115), Tây Ninh (114), Thanh Hóa (107), Phú Yên (103), Quảng Ngãi (99), Cà Mau (83), Bình Phước (69), Thừa Thiên Huế (68), Bà Rịa - Vũng Tàu (62), An Giang (42), Sóc Trăng (39), Long An (38), Bình Thuận (37), Kiên Giang (35), Khánh Hòa (28), Kon Tum (22), Cần Thơ (16), Đồng Nai (14), Bạc Liêu (11), Trà Vinh (7), Đồng Tháp (7), Hậu Giang (3).\r\n\r\nCác địa phương ghi nhận số ca nhiễm giảm nhiều nhất so với ngày trước đó: Bắc Giang (-340), Phú Thọ (-321), Bình Phước (-287).\r\n\r\nCác địa phương ghi nhận số ca nhiễm tăng cao nhất so với ngày trước đó: Bến Tre (+50), Sóc Trăng (+39), Bình Dương (+25).\r\n\r\nTrung bình số ca nhiễm mới trong nước ghi nhận trong 07 ngày qua: 20.986 ca/ngày.\r\n\r\nKể từ đầu dịch đến nay Việt Nam có 10.432.617 ca nhiễm, đứng thứ 12/227 quốc gia và vùng lãnh thổ, trong khi với tỷ lệ số ca nhiễm/một triệu dân, Việt Nam đứng thứ 110/227 quốc gia và vùng lãnh thổ (bình quân cứ một triệu người có 105.506 ca nhiễm).\r\n\r\nTrong đợt dịch thứ 4 (từ ngày 27/4/2021 đến nay), số ca nhiễm ghi nhận trong nước là 10.424.870 ca, trong đó có 8.934.029 bệnh nhân đã được công bố khỏi bệnh.\r\n\r\nCác địa phương ghi nhận số nhiễm tích lũy cao trong đợt dịch này: Hà Nội (1.533.658), TPHCM (606.626), Nghệ An (475.974), Bình Dương (382.676), Bắc Giang (380.351).\r\n\r\nVề tình hình điều trị, trong ngày có 5.472 bệnh nhân được công bố khỏi bệnh, nâng tổng số ca được điều trị khỏi lên 8.936.846 trường hợp.\r\n\r\nSố bệnh nhân đang thở oxy là 1.070 ca, trong đó:\r\n\r\n- Thở oxy qua mặt nạ: 754 ca\r\n\r\n- Thở oxy dòng cao HFNC: 129 ca\r\n\r\n- Thở máy không xâm lấn: 30 ca\r\n\r\n- Thở máy xâm lấn: 154 ca\r\n\r\n- ECMO: 3 ca\r\n\r\nVề số bệnh nhân tử vong, từ 17h30 ngày 16/4 đến 17h30 ngày 17/4 ghi nhận 10 ca tử vong tại: Kiên Giang (4), Bến Tre (3), Bình Phước (1), Cần Thơ (1), Đồng Tháp (1).\r\n\r\nTrung bình số tử vong ghi nhận trong 7 ngày qua là 19 ca/ngày.\r\n\r\nĐến nay, tổng số ca tử vong do Covid-19 tại Việt Nam tính đến nay là 42.944 ca, chiếm tỷ lệ 0,4% so với tổng số ca nhiễm; xếp thứ 24/227 vùng lãnh thổ. Số ca tử vong trên một triệu dân xếp thứ 130/227 quốc gia, vùng lãnh thổ trên thế giới. So với châu Á, tổng số ca tử vong xếp thứ 6/49 (xếp thứ 3 ASEAN), tử vong trên một triệu dân xếp thứ 25/49 quốc gia, vùng lãnh thổ châu Á (xếp thứ 4 ASEAN).\r\n\r\nVề tình hình tiêm chủng, trong ngày 16/4 có 182.326 liều vaccine phòng Covid-19 được tiêm. Như vậy, tổng số liều vaccine đã được tiêm là 209.483.478 liều, trong đó, số liều tiêm cho trẻ từ 5-11 tuổi là 12.414 liều.', 1, 6),
(17, 5, 'Ninh Thuận cần biến thách thức thành cơ hội, thành động lực phát triển', '2022-04-17', 'Thủ tướng Phạm Minh Chính nêu rõ, Ninh Thuận là mảnh đất hội tụ nhiều giá trị khác biệt nhưng chưa phát huy thực sự hiệu quả, đúng tầm. Thời gian tới, tỉnh cần phát huy mạnh mẽ tiềm năng khác biệt...', 'Sáng 17/4, tại thành phố Phan Rang - Tháp Chàm, Thủ tướng Chính phủ Phạm Minh Chính và đoàn công tác làm việc với Ban Thường vụ Tỉnh ủy Ninh Thuận về tình hình, kết quả thực hiện nhiệm vụ năm 2021, quý I/2022, phương hướng, nhiệm vụ thời gian tới và một số kiến nghị, đề xuất.\r\n\r\nNinh Thuận cần biến thách thức thành cơ hội, thành động lực phát triển - 1\r\nThủ tướng Phạm Minh Chính và đoàn công tác làm việc với Ban Thường vụ Tỉnh ủy Ninh Thuận (Ảnh: VGP/Nhật Bắc).\r\n\r\nTrước đó, trong ngày 16/4, sau khi dự lễ kỷ niệm 30 tái lập tỉnh Ninh Thuận, Thủ tướng Phạm Minh Chính đã đi thăm, khảo sát một số dự án, công trình lớn trên địa bàn tỉnh, tìm hiểu về tiềm năng khác biệt, cơ hội nổi trội, lợi thế cạnh tranh và cả những khó khăn nổi lên cần giải quyết của tỉnh.\r\n\r\nNinh Thuận: Một điểm sáng của khu vực và cả nước\r\n\r\nTheo báo cáo của Ninh Thuận và các ý kiến phát biểu tại cuộc làm việc, năm 2021, trong bối cảnh khó khăn chung của cả nước, một số lĩnh vực của tỉnh có chuyển biến tích cực, đưa Ninh Thuận trở thành điểm sáng trong khu vực. Nổi bật là GRDP tăng 9%, đứng thứ tư cả nước, đứng đầu vùng Bắc Trung Bộ và Duyên Hải Miền Trung, quy mô nền kinh tế gấp 1,15 lần so với năm 2020.\r\n\r\nSản xuất nông nghiệp tăng 5,98% thể hiện vai trò bệ đỡ của nền kinh tế. Đặc biệt, chỉ số sản xuất công nghiệp IIP tăng 24,6%, đứng đầu cả nước, năng lượng tái tạo tăng trưởng cao, tăng 59,8% tiếp tục làm đầu tàu tăng trưởng cho toàn ngành, đóng góp 6,84% tăng trưởng chung.\r\n\r\nMột điểm nổi bật khác là tỉnh Ninh Thuận đã rất tích cực phối hợp với các Bộ, ngành Trung ương triển khai thực hiện các dự án trọng điểm trên địa bàn, nhất là tập trung hoàn tất công tác đền bù và khởi công dự án Đường cao tốc Bắc Nam đoạn qua tỉnh; hoàn thành dự án hồ chứa nước Tân Mỹ với dung tích 219 triệu m3, phát huy hiệu quả rõ nét, nhất là chống hạn, cắt lũ trong mùa mưa năm 2021, đảm bảo nguồn nước tưới và nước sinh hoạt phục vụ dân sinh.\r\n\r\n', 1, 6),
(18, 5, 'AMACCAO khởi công nhà máy Seraphin, biến nghìn tấn rác thành điện mỗi ngày', '2022-04-15', 'Tại lễ khởi công nhà máy điện rác Seraphin sáng 30/3, lãnh đạo Hà Nội nhấn mạnh, đây là một trong những dự án góp phần hiện đại hóa công tác xử lý rác thải, giảm tỷ lệ chôn lấp.', 'Dự án làm sạch môi trường Thủ đô bằng công nghệ hiện đại Châu Âu\r\n\r\nNgày 30/3, Công ty CP Công nghệ môi trường xanh Seraphin thuộc Tập đoàn AMACCAO đã khởi công nhà máy điện rác Seraphin tại Xuân Sơn, Sơn Tây, Hà Nội.\r\n\r\nĐây là dự án điện rác có quy mô lớn bằng vốn xã hội hóa được xây dựng ở Hà Nội. Với công suất xử lý 1.500 tấn rác khô (tương đương khoảng 1.800 tấn rác tươi) trên một ngày đêm, Seraphin sẽ giải tỏa được lượng lớn rác thải sinh hoạt lớn cho vùng nội đô Hà Nội và các quận huyện phía Tây Thành phố.\r\n\r\nPhát biểu tại lễ khởi công, ông Tô Văn Nhật - Phó Chủ tịch Tập đoàn AMACCAO nhấn mạnh, ô nhiễm rác thải sinh hoạt, rác thải công nghiệp cũng như nước thải sinh hoạt, công nghiệp đang là vấn đề bức xúc, nổi cộm nhiều đô thị trên cả nước, trong đó có Hà Nội.\r\n\r\nAMACCAO khởi công nhà máy Seraphin, biến nghìn tấn rác thành điện mỗi ngày - 2\r\nÔng Tô Văn Nhật, Phó Chủ tịch thường trực HĐQT Tập đoàn AMACCAO.\r\nThời gian qua, Tập đoàn AMACCAO đã dành rất nhiều thời gian nghiên cứu các nhà máy xử lý rác thải trên khắp thế giới. Doanh nghiệp nghiên cứu sâu hơn ở các đô thị có tính chất, thói quen sinh hoạt về rác thải tương đồng Việt Nam để tìm ra giải pháp tối ưu, phù hợp nhất.\r\n\r\n\"Sau thời gian nỗ lực cùng sự giúp đỡ của đơn vị tư vấn nước ngoài, đặc biệt là nhận được sự tin tưởng, hỗ trợ của lãnh đạo thành phố Hà Nội, bộ ngành, địa phương có liên quan, dự án đã được phê duyệt đầy đủ thủ tục pháp lý, đủ điều kiện động thổ và khởi công\", Phó Chủ tịch Tập đoàn AMACCAO chia sẻ.\r\n\r\nThay mặt ban lãnh đạo Tập đoàn AMACCAO, Phó Chủ tịch Tô Văn Nhật cam kết dự án sẽ được thần tốc triển khai, thi công an toàn, đảm bảo tiến độ. Đại diện chủ đầu tư cũng thông báo đã ký xong hợp đồng mua sắm thiết bị, sau khởi công sẽ thi công khẩn trương phần vỏ và thân nhà máy tại hiện trường. Sau 20 tháng triển khai, nhà máy Seraphin khi đi vào vận hành sẽ góp phần làm sạch đẹp cảnh quan, trong lành không khí cho môi trường thành phố.\r\n\r\nThông tin thêm về dự án, lãnh đạo AMACCAO cho biết, nhà máy Seraphin được áp dụng các công nghệ tiên tiến của Châu Âu, đảm bảo tiêu chuẩn khí thải, nước thải, mùi, tiếng ồn… và các tiêu chuẩn khác được cơ quan có thẩm quyền phê duyệt.\r\n\r\n\"Tiêu chuẩn này sẽ được gửi trực tuyến theo thời gian thực đến Sở Tài nguyên và Môi trường thành phố và chúng tôi sẽ đặt bảng hiển thị công khai tại cổng nhà máy để cơ quan chính quyền và nhân dân địa phương cùng giám sát\", ông Tô Văn Nhật khẳng định.\r\n\r\nCông nghệ được sử dụng tại nhà máy Seraphin là công nghệ lò ghi cơ học có xuất xứ từ Châu Âu (Seghers - Martin) đã được đội ngũ các nhà khoa học cải tiến phù hợp với loại rác thải của Việt Nam (rác thải không phân loại có nhiệt trị thấp, độ ẩm cao, có cả thủy tinh, trạc xỉ, đinh, kim loại..).\r\n\r\n', 1, 7),
(19, 3, 'Xúc động khoảnh khắc cô gái khoác áo cử nhân cho cha ngày tốt nghiệp', '2022-04-20', ' Trong ngày tốt nghiệp Đại học, em Lê Thị Kim Thy (22 tuổi, quê Vĩnh Long) đã khoác chiếc áo cử nhân cho cha khiến nhiều người xúc động, ấm lòng về tình cảm gia đình.', 'Những ngày qua, video ghi lại khoảnh khắc nữ cử nhân khoác áo cho cha ngày tốt nghiệp đang được chia sẻ trên các nền tảng mạng xã hội, lấy đi không ít nước mắt của cư dân mạng bởi tình cảm của con gái dành cho cha.\r\n\r\nPhần lớn bình luận đều gửi lời chúc mừng trước thành quả học tập của cô nàng và bày tỏ sự ngưỡng mộ trước tình cảm ấm áp của hai cha con. \r\n\r\nTrình phát Video is loading.Phát\r\nBật âm thanh\r\nThời gian hiện tại 0:00\r\n/\r\nĐộ dài 0:48\r\n \r\nToàn màn hình\r\n\r\nCài đặt\r\nXúc động khoảnh khắc con gái khoác áo cử nhân cho cha ngày tốt nghiệp (Clip: NVCC).\r\n\r\nXúc động khoảnh khắc cô gái khoác áo cử nhân cho cha ngày tốt nghiệp - 1\r\nKim Thy khoác áo và mũ cử nhân cho cha ngày tốt nghiệp (Ảnh: Kim Thy).\r\n\r\nChủ nhân clip trên là em Lê Thị Kim Thy ngụ xã Phúc Đức, huyện Long Hồ, tỉnh Vĩnh Long. Hiện Thy đã tốt nghiệp ngành Kinh tế học thuộc khoa Kinh tế, khóa 44, trường Đại học Cần Thơ. \r\n\r\nXúc động khoảnh khắc cô gái khoác áo cử nhân cho cha ngày tốt nghiệp - 2\r\nKim Thy tốt nghiệp ngành Kinh tế học, trường Đại học Cần Thơ với thành tích loại giỏi (Ảnh: Kim Thy).\r\n\r\nThy cho biết, em tốt nghiệp vào sáng 15/4 cả gia đình đến chúc mừng và chụp ảnh lưu niệm. Trong giây phút xúc động, Thy đã cởi bộ đồng phục cử nhân khoác lên người cha của mình với mong muốn ngày tốt nghiệp của bản thân cũng là ngày cha \"tốt nghiệp\". \r\n\r\n\"Trong suốt 4 năm giảng đường, gia đình là chỗ dựa để em cố gắng học tập. Chị gái em đã nghỉ học để phụ giúp gia đình, em gái em còn nhỏ, trong nhà chỉ có em tốt nghiệp đại học nên cha mẹ hãnh diện lắm\", Thy bày tỏ. \r\n\r\nXúc động khoảnh khắc cô gái khoác áo cử nhân cho cha ngày tốt nghiệp - 3\r\nGia đình là chỗ dựa vững chắc để Kim Thy cố gắng học tập (Ảnh: Kim Thy).\r\n\r\nTheo Thy, cha mẹ em đều là lao động tay chân, cha làm thợ hồ còn mẹ làm công nhân. Chị gái của Thy sau khi học xong THPT cũng đi làm phụ giúp gia đình, còn em út thì chỉ mới học lớp 6.\r\n\r\nThy chính là niềm hy vọng của người thân nên cô nàng luôn phấn đấu để có thành tích tốt. Được biết trong suốt thời gian học đại học, Thy làm nhiều công việc làm thêm như bán hàng, phụ quán ăn... Đặc biệt em cố gắng giành học bổng để có tiền trang trải chi phí sinh hoạt. ', 1, 6),
(21, 8, '\r\nPrint\r\n\r\n\r\nTHẾ GIỚICĂNG THẲNG NGA - UKRAINE\r\nTổng thống Ukraine nói không nhượng bộ lãnh thổ, sẵn sàng chiến đấu 10 năm', '2022-04-18', 'Tổng thống Volodymyr Zelensky tuyên bố Ukraine sẽ không từ bỏ bất kỳ phần lãnh thổ nào ở phía Đông để đổi lấy kết thúc chiến sự với Nga và sẵn sàng chiến đấu thêm 10 năm.\r\n', 'Trong cuộc phỏng vấn hôm 17/4, Tổng thống Volodymyr Zelensky cho biết không có gì đảm bảo rằng Nga sẽ không tìm cách kiểm soát thủ đô Kiev một lần nữa sau khi Moscow có được vùng Donbass, Đông Ukraine.\r\n\r\n\"Đây là lý do có một điều rất quan trọng đối với chúng tôi là không cho phép họ (đạt mục đích), đồng thời giữ vững lập trường của chúng tôi, bởi vì trận chiến này (ở Donbass) có thể ảnh hưởng đến tiến trình của cả cuộc chiến\", ông Zelensky nói.\r\n\r\nTuyên bố của Tổng thống Zelensky được đưa ra sau khi Nga cuối tháng 3 thông báo, lực lượng quân sự nước này đã đạt được các mục tiêu trong giai đoạn 1 của chiến dịch quân sự tại Ukraine. Quân đội Nga tuyên bố rút lực lượng khỏi Kiev và phía Bắc Ukraine, tập trung mục tiêu \"giải phóng hoàn toàn\" Donbass, nơi có các vùng lãnh thổ ly khai ở Đông Ukraine.\r\n\r\n\"Chúng tôi không thể từ bỏ lãnh thổ của mình, nhưng chúng tôi phải tìm cách nào đó để đối thoại với Nga\", ông Zelensky nhấn mạnh.\r\n\r\nCuộc xung đột Nga - Ukraine cho đến nay đã kéo dài hơn 7 tuần. Khi được hỏi liệu Ukraine có thể giành chiến thắng trong cuộc xung đột hay không, Tổng thống Zelensky nói: \"Tất nhiên là có, và Ukraine sẽ chiến thắng\".\r\n\r\nTổng thống Zelensky nói rằng thế giới nên chuẩn bị cho khả năng Nga sử dụng vũ khí hạt nhân chiến thuật tại Ukraine. Ông Zelensky cũng nhấn mạnh sự giúp đỡ khẩn cấp mà quân đội Ukraine cần được trang bị để đối phó với chiến dịch quân sự sắp tới của Nga ở miền Đông và miền Nam Ukraine.\r\n\r\nTổng thống Zelensky cho biết ông đã trao đổi với Tổng thống Pháp Emmanuel Macron tuần trước và muốn nhà lãnh đạo Pháp tới Ukraine. Ông Zelensky nói rằng ông cũng muốn Tổng thống Mỹ Joe Biden tới Ukraine.\r\n\r\nTổng thống Biden tiết lộ ông muốn tới Ukraine, nhưng ông cho biết các quan chức Mỹ vẫn đang \"thảo luận\" về việc liệu một quan chức cấp cao của Mỹ có nên tới thăm Ukraine vào thời điểm này hay không.\r\n\r\nTổng thống Zelensky cho biết gói viện trợ bổ sung trị giá 800 triệu USD, gồm các vũ khí mới và hiện đại hơn, do Tổng thống Biden phê duyệt tuần trước cho Ukraine là hữu ích, nhưng Kiev vẫn cần nhiều hơn thế.\r\n\r\n\"Tất nhiên, chúng tôi cần nhiều hơn thế. Nhưng tôi rất vui vì ông ấy đang giúp đỡ chúng tôi\", ông Zelensky nói.\r\n\r\nTheo Tổng thống Zelensky, yếu tố quan trọng nhất là tốc độ chuyển các vũ khí cần thiết cho lực lượng vũ trang Ukraine. Ông Zelensky bác bỏ một số lo ngại mà Mỹ và các nước khác nêu ra rằng, binh sĩ Ukraine không được đào tạo để sử dụng một số loại vũ khí mà nước này yêu cầu.', 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `name`, `email`, `subject`, `note`) VALUES
(4, 'truong', 'truong@gmail.com', 'subject', 'khong co gi'),
(5, 'ádsadas', 'ádasdasd', 'ádas', 'ádasdsd'),
(6, 'ádsadas', 'ádasdasd', 'ádas', 'ádasdsd'),
(7, 'Name', 'Email@gmail.com', 'Subject', 'sas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `favorite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `avatar`, `fullname`, `gender`, `favorite`, `role`) VALUES
(1, 'truongjae@gmail.com', 'truong', '25d55ad283aa400af464c76d713c07ad', 'image/239881458_636639640647091_5208234288639019968_n.jpg', 'Nguyễn Gia Trường', 'male', 'choigame', 'ADMIN'),
(2, 'ledangtu0703@gmail.com', 'truong2', '25d55ad283aa400af464c76d713c07ad', 'image/matbinh.png', 'Truong Nguyen Gia', 'male', 'hoclaptrinh,xemphim', 'USER'),
(3, 'admin@gmail.com', 'admin', '25d55ad283aa400af464c76d713c07ad', 'image/239881458_636639640647091_5208234288639019968_n.jpg', 'Nguyễn Gia Trường', 'male', 'hoclaptrinh,xemphim', 'ADMIN'),
(5, 'batoi@gmail.com', 'nguyenbatoi', '25d55ad283aa400af464c76d713c07ad', 'image/242516079_4968208943206632_3462131406151310933_n.jpg', 'Nguyễn Bá Tới', 'female', 'hoclaptrinh,choigame', 'ADMIN'),
(6, 'syhoang@gmail.com', 'syhoang', '25d55ad283aa400af464c76d713c07ad', 'image/242498093_4961084413919085_3718298541373064709_n.jpg', 'Nguyễn Sỹ Hoàng', 'male', 'hoclaptrinh,xemphim', 'USER'),
(7, 'mauhuy@gmail.com', 'mauhuy', '25d55ad283aa400af464c76d713c07ad', 'image/242498093_4961084413919085_3718298541373064709_n.jpg', 'Nguyễn Mậu Huy', 'male', 'hoclaptrinh', 'USER'),
(8, 'nguyenvan@gmail.com', 'nguyenvan', '25d55ad283aa400af464c76d713c07ad', 'image/242516079_4968208943206632_3462131406151310933_n.jpg', 'Nguyễn Thu Vân', 'female', 'hoclaptrinh,xemphim', 'USER');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
