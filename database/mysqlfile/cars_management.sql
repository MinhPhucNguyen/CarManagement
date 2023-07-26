-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 05:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=unpublish; 1=publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `title`, `content`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(27, 'Nên Lựa Chọn Xe Số Sàn Hay Số Tự Động, Kinh Nghiệm Dành Cho Lái Mới Hoặc Mua Xe Lần Đầu?', '<p>Khi tìm hiểu về mua một chiếc xe mới, một câu hỏi phổ biến khi người mua thường gặp phải là liệu nên chọn xe số sàn hay số tự động. Cũng như đối với lái mới, quyết định này có thể đáng ngại và khó khăn. Dưới đây là một số ưu điểm và nhược điểm của cả hai loại xe, giúp bạn có được cái nhìn tổng quan để đưa ra quyết định phù hợp với nhu cầu của mình.</p><h2><strong>Xe ô tô số sàn</strong></h2><p>Xe ô tô số sàn, còn được gọi là xe ô tô cơ bản hay xe ô tô sử dụng hộp số cơ khí, là một loại xe có hộp số cơ bản được điều khiển bằng cách sử dụng côn và phanh chân. Trong khi công nghệ hộp số tự động đang ngày càng phổ biến. Vậy ô tô số sàn có những ưu &amp; nhược điểm gì? Hãy cùng Mioto tìm hiểu nhé!</p><h3><strong>Ưu điểm của xe số sàn</strong></h3><ul><li><i>Tính kiểm soát cao:</i> Xe số sàn cho phép người lái hoàn toàn kiểm soát chiếc xe. Người lái có thể chọn cách chuyển số tốt nhất dựa vào tốc độ, địa hình và điều kiện giao thông, giúp giữ cho xe luôn trong tình trạng tốt nhất.</li></ul><p><i>Tiết kiệm nhiên liệu:</i> Xe số sàn thường đơn giản hơn về cấu trúc so với xe số tự động, do đó nó tiêu thụ ít nhiên liệu hơn. Điều này đồng nghĩa với việc giảm thiểu chi phí vận hành và tiết kiệm tiền cho người sử dụng.</p><p><i>Giá thành thấp hơn:</i> Xe số sàn có chi phí sản xuất thấp hơn so với xe số tự động, dẫn đến giá bán thường thấp hơn. Điều này thu hút đối tượng người mua có ngân sách hạn chế hoặc đang tìm kiếm một phương tiện đơn giản và phổ thông.</p><p><i>Tương tác lái xe thú vị</i>: Với việc chuyển số thủ công, lái xe số sàn mang lại trải nghiệm lái xe thú vị và gần gũi hơn. Người lái có cảm giác kết nối chặt chẽ hơn với chiếc xe và cảm nhận được mọi cử động của nó.</p><h3><strong>Nhược điểm của xe số sàn:</strong></h3><ul><li><i>Khó lái trong đô thị và kẹt xe: </i>Trong điều kiện giao thông đông đúc của đô thị, việc chuyển số thủ công có thể trở nên mệt mỏi và gây cản trở, đặc biệt khi bạn thường xuyên phải dừng lại và khởi động lại. Điều này làm cho xe số sàn khá không thuận tiện khi di chuyển trong các thành phố lớn hoặc trong tình trạng kẹt xe.</li><li><i>Thiếu tính tự động hóa: </i>Xe số sàn không có tính năng tự động hóa như xe số tự động, làm cho lái xe trở nên mệt mỏi hơn trong những cuộc hành trình dài.</li><li><i>Khả năng lái phụ thuộc vào kỹ năng người lái:</i> Lái xe số sàn yêu cầu phải có kỹ năng chuyển số và sử dụng côn, điều này đòi hỏi sự kiên nhẫn và tập trung cao từ người lái. Việc sử dụng không đúng cách có thể gây hư hỏng đến hộp số và làm tăng chi phí sửa chữa.</li></ul><h2><strong>Xe ô tô số tự động</strong></h2><p>Xe ô tô số tự động đã trở thành xu hướng phổ biến trong ngành công nghiệp ô tô hiện đại. Với khả năng tự động hóa quá trình lái xe, đem đến những ưu điểm và tiện ích đáng kể. Tuy nhiên, như bất kỳ công nghệ nào, chúng cũng có những hạn chế và nhược điểm riêng. Cùng Mioto điểm qua những ưu điểm và nhược điểm của xe ô tô số tự động.</p><h3><strong>Ưu điểm:</strong></h3><p><i>Dễ sử dụng và thuận tiện:</i> Điều khiến xe ô tô số tự động trở nên phổ biến là dễ sử dụng và thuận tiện cho người lái. Với hệ thống truyền động tự động, người lái chỉ cần chọn chế độ lái và thả bàn đạp ga hoặc phanh. Không cần phải thao tác bàn tay và chân nhiều như xe cơ cấu.</p><p><i>Lái xe dễ dàng và thoải mái: </i>Xe ô tô số tự động giúp người lái tránh được sự mệt mỏi của việc sử dụng hộp số bằng tay. Hệ thống này tự động điều chỉnh các bước số tùy thuộc vào tốc độ và tải trọng, cung cấp trải nghiệm lái xe mượt mà và thoải mái hơn.</p><p><i>An toàn hơn trong đô thị: </i>Trong những phạm vi giao thông đông đúc, việc sử dụng xe ô tô số tự động giúp giảm khả năng gây tai nạn do sai sót của người lái. Hệ thống này tự động giảm tốc độ, giữ khoảng cách an toàn và có khả năng phanh tự động khi phát hiện các chướng ngại vật trong quá trình di chuyển.</p><p><i>Hỗ trợ tài xế:</i> Nhiều mẫu xe ô tô số tự động được trang bị công nghệ hỗ trợ tài xế tiên tiến, chẳng hạn như cảnh báo lệch làn đường, hỗ trợ đỗ xe tự động, cảnh báo điểm mù, cảnh báo va chạm, và hệ thống kiểm soát hành trình. Tất cả những tính năng này giúp cải thiện tính an toàn và giảm nguy cơ tai nạn giao thông.</p><h3><strong>Nhược điểm:</strong></h3><p>Chi phí cao: Xe ô tô số tự động thường có giá cao hơn so với phiên bản cơ cấu tương tự. Hệ thống truyền động tự động phức tạp và cần nhiều công nghệ tiên tiến, điều này dẫn đến chi phí sản xuất và bảo dưỡng cao hơn.</p><p>Hiệu suất nhiên liệu thấp: Mặc dù công nghệ đã cải thiện nhiều, nhưng nhiều xe ô tô số tự động vẫn tiêu thụ nhiên liệu nhiều hơn so với phiên bản cơ cấu. Hệ thống tự động thường cần nhiều năng lượng để điều khiển các bộ phận hoạt động, làm giảm hiệu suất nhiên liệu.</p><p>Tùy chỉnh giới hạn: Với xe ô tô số tự động, tùy chỉnh các tính năng lái xe và trải nghiệm cá nhân hóa có thể bị hạn chế. Người lái không thể điều chỉnh bước số tùy ý như trong xe cơ cấu.</p><p>Sự thiếu tương tác và thú vị: Đối với những người yêu thích trải nghiệm lái xe, việc sử dụng xe ô tô số tự động có thể làm mất đi sự tương tác và thú vị của việc chuyển số và điều khiển xe bằng tay.</p><p>Dễ bị lỗi hệ thống: Mặc dù công nghệ ngày càng tiến bộ, hệ thống ô tô số tự động vẫn dễ bị lỗi kỹ thuật. Một lỗi nhỏ trong hệ thống có thể gây ra vấn đề nghiêm trọng và đòi hỏi chi phí cao để sửa chữa.</p><h2><strong>Nên chọn xe số sàn hay số tự động cho tài mới hoặc mua xe lần đầu?</strong></h2><h3><strong>Nên mua xe số sàn khi:</strong></h3><p><i>Muốn tiết kiệm chi phí:</i> Xe số sàn thường có giá thành thấp hơn so với xe số tự động và yêu cầu ít chi phí bảo dưỡng. Điều này có thể thu hút những người đang tìm kiếm một phương tiện kinh tế và tiết kiệm nhiên liệu. Xe số sàn thường nhẹ hơn so với phiên bản số tự động, điều này giúp giảm mức tiêu thụ nhiên liệu của xe. Không có hộp số tự động và các bộ phận điện tử phức tạp đi kèm, xe số sàn có xu hướng tiêu thụ ít nhiên liệu hơn, giúp bạn tiết kiệm chi phí và bảo vệ môi trường.</p><p><i>Người thích cảm giác lái xe chân thật: </i>Nếu bạn là người thích cảm giác lái và muốn có sự kiểm soát tối đa trên chiếc xe của mình, xe số sàn là sự lựa chọn lý tưởng. Việc chuyển số thủ công mang lại trải nghiệm lái xe đích thực và làm tăng sự tương tác giữa người lái và chiếc xe.</p>', 'nen-lua-chon-xe-so-san-hay-so-tu-dong-kinh-nghiem-danh-cho-lai-moi-hoac-mua-xe-lan-dau', '1690078070.jpg', 1, '2023-07-23 02:07:50', '2023-07-23 02:07:50'),
(28, 'Kinh Nghiệm Lái Xe Ô Tô Cho Tài Mới: Hướng Dẫn Và Lời Khuyên Để Lái Xe An Toàn', '<p>Từ khi ô tô trở thành phương tiện giao thông thông dụng, việc sở hữu bằng lái xe ô tô đã trở thành một kỹ năng quan trọng đối với nhiều người. Tuy nhiên, việc lái xe ô tô không chỉ đơn giản là ngồi vào ghế lái và lái đi. Đối với những tài xế mới, có một số kinh nghiệm quan trọng cần được lưu ý để đảm bảo an toàn và tránh những rủi ro trong quá trình lái xe. Trong bài viết này, hãy cùng Mioto tìm hiểu về những kinh nghiệm quan trọng nhất cho tài mới khi lái xe ô tô.</p><h2><strong>1. Tìm hiểu quy tắc giao thông trước khi bắt đầu lái xe</strong></h2><p>Hãy đảm bảo bạn hiểu rõ các quy tắc giao thông cơ bản. Học luật giao thông và biết cách áp dụng chúng trong thực tế sẽ giúp bạn tránh được những phạm vi pháp luật và nguy hiểm trong quá trình lái xe.</p><h2><strong>2. Đeo thắt lưng an toàn khi lái xe</strong></h2><p>Hãy đảm bảo rằng bạn và tất cả hành khách trên xe đều đeo thắt lưng an toàn trước khi bắt đầu hành trình. Đây là một biện pháp quan trọng để bảo vệ bạn khỏi chấn thương trong trường hợp tai nạn.</p><h2><strong>3. Điều chỉnh gương chiếu hậu trước khi khởi hành</strong></h2><p>Hãy điều chỉnh gương chiếu hậu để có tầm nhìn tốt nhất. Gương chiếu hậu phải được thiết lập sao cho bạn có thể nhìn thấy được các phương tiện và các điểm mù quan trọng.</p><h2><strong>4. Hãy kiên nhẫn và tỉnh táo khi lái xe</strong></h2><p>Khi lái xe đòi hỏi sự tập trung và kiên nhẫn. Đừng để sự bất cẩn hoặc mất kiên nhẫn ảnh hưởng đến khả năng lái của bạn. Luôn duy trì tư thế thoải mái, đặt chân lên bàn đạp phanh và ga một cách tự nhiên.</p><h2><strong>5. Khi lái xe bạn nên thực hiện các điều khiển cơ bản</strong></h2><p>Nắm vững cách sử dụng các điều khiển cơ bản như tay lái, hệ thống phanh và hệ thống ga. Thực hành chúng trong một môi trường an toàn trước khi ra đường là rất quan trọng để làm quen và nắm vững các tác động của chúng.</p><h2><strong>6. Học cách điều khiển tốc độ để đảm bảo quá trình lái xe an toàn</strong></h2><p>Điều khiển tốc độ là một kỹ năng quan trọng trong lái xe ô tô. Hãy thực hành điều chỉnh tốc độ một cách mượt mà và kiểm soát khoảng cách với xe khác để tránh tai nạn.</p><h2><strong>7. Hãy thực hiện lái xe thử trên đường cao tốc</strong></h2><p>Khi bạn đã tự tin hơn trong việc lái xe, hãy thử lái trên đường cao tốc. Điều này giúp bạn làm quen với tốc độ cao và các khía cạnh đặc biệt của lái xe trên đường cao tốc.</p><h2><strong>8. Tránh lái xe khi mệt mỏi</strong></h2><p>Đảm bảo bạn nghỉ ngơi đầy đủ trước khi lái xe và tránh lái xe khi bạn mệt mỏi. Mệt mỏi có thể làm giảm tập trung và làm tăng nguy cơ gây tai nạn.</p><h2><strong>9. Luôn giữ khoảng cách an toàn khi lái xe</strong></h2><p>Hãy giữ khoảng cách an toàn với xe phía trước để có thời gian phản ứng khi có tình huống bất ngờ xảy ra. Luôn tuân thủ quy tắc \"3 giây\" để đảm bảo an toàn.</p><h2><strong>10. Không lái xe khi có chất kích thích</strong></h2><p>Hạn chế hoặc tốt nhất là tránh lái xe khi bạn có trong cơ thể các chất kích thích như rượu, thuốc lá, ma túy hoặc các loại thuốc ảnh hưởng đến sự tập trung và khả năng lái xe của bạn.</p><h2><strong>11. Sử dụng đèn chiếu sáng đúng cách khi lái xe</strong></h2><p>Đảm bảo rằng bạn sử dụng đèn chiếu sáng đúng cách trong điều kiện khác nhau. Đèn pha và đèn hậu không chỉ giúp bạn nhìn rõ hơn trong ban đêm mà còn giúp người khác nhìn thấy bạn.</p><h2><strong>12. Hãy thực hiện bảo trì định kỳ xe thường xuyên</strong></h2><p>Hãy đảm bảo rằng xe của bạn được bảo trì định kỳ và kiểm tra trước mỗi hành trình. Kiểm tra hệ thống phanh, đèn&nbsp;chiếu sáng, lốp xe và các yếu tố an toàn khác để đảm bảo rằng xe của bạn hoạt động tốt.</p><h2><strong>13. Luyện kỹ năng lái xe</strong></h2><p>Hãy nhớ rằng kỹ năng lái xe sẽ được phát triển thông qua thời gian và kinh nghiệm. Hãy kiên nhẫn và tiếp tục luyện tập để trở thành một tài xế ô tô giỏi.</p><h2><strong>14. Khi lái xe hãy chú ý đến môi trường xung quanh</strong></h2><p>Lái xe không chỉ đòi hỏi sự tập trung vào con đường, mà còn yêu cầu bạn chú ý đến môi trường xung quanh. Theo dõi gương chiếu hậu, quan sát các điểm mù và đảm bảo bạn luôn biết những xe xung quanh để tránh va chạm.</p><h2><strong>15. Thực hành lái xe trong điều kiện khác nhau&nbsp;</strong></h2><p>Để trở thành một tài xế kỳ cựu, hãy thử lái xe trong nhiều điều kiện khác nhau. Hãy thực hành lái xe trong mưa, ban đêm, trên đường trơn trượt và trong lưu lượng giao thông dày đặc. Điều này giúp bạn nắm bắt các kỹ thuật lái xe đa dạng và sẵn sàng cho mọi tình huống.</p><h2><strong>16. Hãy biết cách đối phó với áp lực và căng thẳng khi lái xe</strong></h2><p>Lái xe trong điều kiện giao thông có thể tạo ra áp lực và căng thẳng. Hãy học cách đối phó với những tình huống căng thẳng bằng cách thực hiện thực hành thở sâu, lắng nghe nhạc thư giãn hoặc tìm cách xả stress khác để giữ tinh thần và tập trung.</p><h2><strong>17. Tuân thủ luật lệ giao thông khi lái xe là điều rất quan trọng</strong></h2><p>Điều này không chỉ đảm bảo an toàn cho bạn mà còn cho tất cả những người tham gia giao thông khác. Hãy đảm bảo bạn hiểu và tuân thủ các quy định giao thông cục bộ và quốc gia.</p><h2><strong>18. Hãy chuẩn bị cho các tình huống khẩn cấp khi lái xe</strong></h2><p>Trong trường hợp xảy ra sự cố hoặc tình huống khẩn cấp, hãy biết cách phản ứng một cách nhanh chóng và đúng đắn. Hãy luôn giữ một bộ đồ nghề cứu hộ và biết cách sử dụng chúng. Đồng thời, hãy biết cách gọi cứu hỏa, cấp cứu và hỗ trợ từ các cơ quan chức năng.</p><h2><strong>19. Làm quen với hệ thống định vị và bản đồ trước khi lái xe</strong></h2><p>Hiểu và sử dụng hệ thống định vị và bản đồ trong ô tô sẽ giúp bạn điều hướng và lựa chọn lộ trình tốt nhất. Hãy thực hành sử dụng các công nghệ này và làm quen với các biểu đồ địa phương để tránh lạc đường.</p><h2><strong>20. Học cách phân biệt các biển báo giao thông trước khi lái</strong></h2><p>Hiểu và phân biệt các biển báo giao thông là một kỹ năng quan trọng khi lái xe. Hãy học các biểu tượng, màu sắc và hình dạng của các biển báo để biết được ý nghĩa của chúng và áp dụng đúng trong quá trình lái xe.</p><h2><strong>21. Chú trọng đến việc đỗ xe</strong></h2><p>Đỗ xe là một kỹ năng quan trọng khi lái xe ô tô. Hãy thực hành đỗ xe trong nhiều điều kiện khác nhau và làm quen với các phương pháp đỗ xe như đỗ vuông, đỗ song song và đỗ ngang. Điều này giúp bạn tự tin hơn khi phải đỗ xe trong những tình huống thực tế.</p><h2><strong>22. Khi lái xe hãy luôn tự nhìn trước</strong></h2><p>Để đảm bảo an toàn, hãy luôn nhìn trước và dự đoán những tình huống tiềm ẩn trên đường. Điều này giúp bạn chuẩn bị và có thời gian phản ứng khi cần thiết.</p><h2><strong>23. Luôn duy trì tinh thần học tập và cải thiện</strong></h2><p>Cuối cùng, luôn cố gắng học hỏi và cải thiện kỹ năng lái xe của bạn. Hãy tham gia các khóa đào tạo bổ sung, đọc sách và tài liệu về lái xe an toàn và tự tin. Quá trình học tập không bao giờ kết thúc và luôn có thể nâng cao kỹ năng của bạn.</p><p>Lái xe ô tô là một kỹ năng quan trọng, nhưng nó cũng đi kèm với trách nhiệm lớn. Hi vọng ở bài viết này, bạn sẽ có những kinh nghiệm để trở thành một tài xế an toàn và tự tin trên đường. Hãy nhớ rằng quá trình học lái xe là một hành trình, hãy tận hưởng nó và luôn tuân thủ luật lệ giao thông để đảm bảo an toàn cho bản thân và người khác trên đường.</p>', 'kinh-nghiem-lai-xe-o-to-cho-tai-moi-huong-dan-va-loi-khuyen-de-lai-xe-an-toan', '1690080502.jpg', 1, '2023-07-23 02:48:22', '2023-07-23 02:48:22'),
(29, 'Thuê Xe Ô Tô Tự Lái Ở Tân Bình: Sự Lựa Chọn Thông Minh Cho Chuyến Đi Hoàn Hảo', '<p>Khi bạn có kế hoạch du lịch hoặc cần di chuyển trong khu vực thành phố Hồ Chí Minh, một trong những giải pháp tiện lợi và linh hoạt nhất là thuê xe ô tô tự lái. Đặc biệt, ở khu vực Tân Bình, một điểm nổi bật mà Mioto cung cấp dịch vụ thuê xe ô tô tự lái chất lượng và đáng tin cậy. Và khi thuê xe chúng ta có những lợi ích gì? Cùng Mioto khám phá lợi ích của việc thuê xe ô tô tự lái ở Tân Bình và đưa ra một số gợi ý để bạn có một chuyến đi hoàn hảo.</p><h2><strong>1. Tự do di chuyển khi thuê xe tự lái</strong></h2><p>Một trong những lợi ích lớn nhất của việc thuê xe ô tô tự lái là bạn có toàn quyền quyết định lịch trình của mình. Bạn không phải dựa vào lịch trình của phương tiện công cộng hoặc chờ đợi taxi. Bạn có thể tự do khám phá các địa điểm yêu thích của mình và dừng lại ở bất kỳ nơi nào bạn muốn.</p><h2><strong>2. Tiết kiệm thời gian khi thuê ô tô riêng</strong></h2><p>Việc sử dụng dịch vụ thuê xe ô tô tự lái ở Tân Bình giúp bạn tiết kiệm thời gian di chuyển. Bạn không phải chờ đợi xe buýt hay tìm kiếm taxi. Thay vào đó, bạn có thể lập kế hoạch chính xác và di chuyển theo sở thích của mình, giúp bạn tận hưởng thời gian nhiều hơn trong chuyến đi của mình.</p><h2><strong>3. Linh hoạt và tiện nghi với thuê xe tự lái</strong></h2><p>Xe ô tô tự lái luôn đảm bảo sự linh hoạt và tiện nghi cho người thuê. Bạn có thể chọn loại xe phù hợp với nhu cầu và số lượng người đi cùng.&nbsp;</p><h2><strong>4. Sự riêng tư và thoải mái cho chuyến đi</strong></h2><p>Khi thuê xe ô tô tự lái ở Tân Bình, bạn sẽ có không gian riêng tư và thoải mái cho chuyến đi của mình. Bạn không cần chia sẻ không gian với người lạ như khi sử dụng phương tiện công cộng hoặc taxi. Điều này giúp bạn cảm thấy thoải mái hơn và tận hưởng chuyến đi mà không bị giới hạn.</p><h2><strong>5. Tính linh hoạt trong lựa chọn địa điểm trong khu vực Tân Bình</strong></h2><p>Với xe ô tô tự lái, bạn có khả năng di chuyển đến bất kỳ địa điểm nào bạn muốn. Tân Bình nằm gần nhiều địa danh nổi tiếng như Sài Gòn Square, công viên Gia Định và Chùa Giác Lâm. Bạn có thể dễ dàng khám phá những địa điểm này mà không phải lo lắng về việc đi lại.</p><h2><strong>6. Chuyến công tác ngắn ngày tại Tân Bình</strong></h2><p>Nếu bạn có một chuyến công tác ngắn tại Tân Bình, thuê xe ô tô tự lái sẽ là một lựa chọn thông minh. Bạn có thể dễ dàng di chuyển từ khách sạn đến địa điểm làm việc và tiết kiệm thời gian so với việc chờ taxi hoặc sử dụng dịch vụ xe ô tô riêng.</p><h2><strong>7. Tiết kiệm chi phí khi thuê xe tự lái</strong></h2><p>Dịch vụ thuê xe ô tô tự lái tại Mioto thường có giá cả hợp lý và linh hoạt. Bạn có thể chọn từ nhiều loại xe khác nhau với mức giá phù hợp với ngân sách của mình. Điều này giúp bạn tiết kiệm chi phí và vẫn có được sự thoải mái và linh hoạt trong chuyến đi của mình.</p>', 'thue-xe-o-to-tu-lai-o-tan-binh-su-lua-chon-thong-minh-cho-chuyen-di-hoan-hao', '1690080540.jpg', 1, '2023-07-23 02:49:00', '2023-07-23 02:49:00'),
(30, 'DU LỊCH 3 MIỀN CÙNG MIOTO', '<p>Việt Nam mảnh đất thân thương hình chữ S, với những cảnh sắc thiên nhiên phong phú. Không chỉ vậy với bàn tay kiến tạo của con người cũng đã góp phần tạo nên những công trình kiến trúc độc đáo, và cảnh đẹp cũng có thể là những hình ảnh đời thường của những con người giản dị chân chất mang đậm nét truyền thống. Cùng Mioto du lịch 3 miền để chọn cho mình một địa điểm cho dịp hè này thêm lý tưởng!</p><p><strong>MIỀN BẮC - CÁI NÔI CỦA VĂN HOÁ NGÀN NĂM VĂN HIẾN</strong></p><p>Miền Bắc được xem là “cái nôi” văn hóa ngàn năm văn hiến của người dân Việt Nam. Đến với Miền Bắc, bạn sẽ được chiêm ngưỡng những vùng núi thiên nhiên hùng vĩ cùng nhiều công trình kiến trúc đẹp mắt.&nbsp; Chính vì thế nơi đây sở hữu rất nhiều cảnh đẹp nổi bật say lòng du khách.</p><p><strong>Hà Nội - Thủ đô của những hoài niệm</strong></p><p>Hà Nội được ví như “cái nôi” tinh hoa văn hóa của dân tộc. Hà Nội với nhiều khu phố cổ đặc trưng, nơi lưu giữ kiến trúc cổ xưa gắn liền với di tích lịch sử lâu đời.</p><p>Bên cạnh đó, một Hà Nội với nền ẩm thực đa dạng cùng những danh lam thắng cảnh nổi tiếng như: Lăng Bác Hồ, đền Ngọc Sơn, cầu Thê Húc, cầu Long Biên, chùa Một Cột... chắc hẳn là một địa điểm không thể bỏ lỡ mỗi khi bạn lên kế hoạch đi du lịch miền Bắc!</p>', 'du-lich-3-mien-cung-mioto', '1690080575.jpg', 1, '2023-07-23 02:49:35', '2023-07-23 03:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'HONDA', 0),
(2, 'VINFAST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `seats` int(11) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `transmission` varchar(255) NOT NULL COMMENT '0=automatic; 1=manual',
  `number_of_trip` varchar(255) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `price`, `description`, `seats`, `fuel`, `year`, `speed`, `capacity`, `transmission`, `number_of_trip`, `brand_id`, `status`, `location`, `created_at`, `updated_at`) VALUES
(103, 'c9', 143.95, 'Consequatur nisi et quo. Hic quibusdam omnis aut sed necessitatibus illum soluta vel. Animi sunt et tempora harum.', 10, 'Petrol', 2009, 691, 366, '1', '38', 2, 0, 'West Shannybury', NULL, NULL),
(104, 'i6', 151.67, 'Repellat rem explicabo reiciendis explicabo sint quibusdam. Illum neque qui ut et. Iusto enim voluptas voluptate necessitatibus.', 7, 'Petrol', 2007, 585, 446, '0', '33', 1, 1, 'Lake Keshaunfurt', NULL, NULL),
(105, 'c6', 196.49, 'Labore sunt vel molestiae dolorum qui labore. Fugit recusandae sapiente molestiae. Enim exercitationem est quia non. Cupiditate consequuntur veniam qui quisquam enim rerum voluptatibus ipsum.', 9, 'Diesel', 2003, 750, 447, '0', '58', 2, 1, 'West Ben', NULL, NULL),
(106, 'W6', 178.82, 'Non corrupti maxime doloribus rerum voluptates. Incidunt quod quidem laboriosam sed. Iste ut reiciendis sequi temporibus incidunt et qui.', 7, 'Diesel', 2019, 766, 350, '0', '2', 1, 1, 'Murphymouth', NULL, NULL),
(107, 'm7', 122.14, 'Nemo et est qui possimus quod. Est qui nesciunt ut tempora harum accusantium qui. Rerum molestiae accusantium possimus. Libero et sit enim amet nesciunt architecto unde.', 7, 'Diesel', 1996, 303, 353, '1', '50', 1, 0, 'Lake Elias', NULL, NULL),
(108, 'l7', 117.30, 'Iure natus at voluptas autem possimus nemo veniam reprehenderit. Illum minus hic itaque iste officiis voluptas eos. Cumque quibusdam fugit ut ut itaque quo et beatae. Est ex ex aut dolorem dicta eligendi.', 10, 'Diesel', 1981, 678, 378, '1', '76', 1, 0, 'Port Winston', NULL, NULL),
(109, 'Y3', 118.96, 'Dolor temporibus consequatur maxime rerum. Distinctio quo voluptas nihil dolor ad voluptatem.', 5, 'Diesel', 2012, 569, 480, '1', '6', 1, 0, 'South Jessycafurt', NULL, NULL),
(110, 'b1', 120.44, 'Officia voluptatem porro magnam quisquam recusandae aspernatur. Ut dolores quia deserunt distinctio praesentium ut et pariatur. Molestiae occaecati voluptatem adipisci nobis consequuntur dolor.', 10, 'Petrol', 2013, 309, 325, '0', '20', 2, 1, 'South Paulaport', NULL, NULL),
(111, 'h7', 181.20, 'In corporis eaque ratione temporibus rem. Minima dolore esse qui pariatur ut aut. Quia in est neque qui ut ut.', 4, 'Diesel', 1998, 624, 407, '1', '51', 1, 1, 'Schneiderport', NULL, NULL),
(112, 'u5', 148.73, 'Facere repudiandae ut magni maiores sed optio voluptates. Dolore impedit in illum molestiae cum quam. Ab tenetur qui sed. Perspiciatis consectetur doloremque ipsa debitis et quasi.', 4, 'Petrol', 2020, 773, 461, '1', '13', 1, 1, 'East Candace', NULL, NULL),
(113, 'J7', 186.81, 'Ut vel qui facere qui. Beatae eveniet unde aut a nostrum ut. Possimus voluptas unde error vel aliquam. A dolorum voluptatem quia distinctio soluta et molestiae.', 7, 'Petrol', 1987, 628, 460, '0', '3', 1, 1, 'Russelport', NULL, NULL),
(114, 'x4', 119.69, 'Totam id debitis unde. Natus autem autem sit tenetur voluptas nemo. Quasi repellat et enim.', 5, 'Petrol', 2018, 360, 388, '1', '17', 1, 1, 'South Jeffry', NULL, NULL),
(115, 'J5', 100.91, 'Libero tenetur adipisci porro architecto laudantium accusantium praesentium quaerat. Voluptas molestiae molestias quae quia culpa voluptatibus. Reprehenderit molestias esse dicta quibusdam.', 4, 'Petrol', 1973, 421, 442, '0', '41', 2, 1, 'Lake Troy', NULL, NULL),
(116, 'i3', 160.31, 'Laboriosam minima quae mollitia in necessitatibus est voluptas. Quae iusto atque ut sit voluptatem aliquid. Quo at et occaecati ipsa.', 10, 'Diesel', 1996, 341, 446, '1', '54', 1, 0, 'North Aprilside', NULL, NULL),
(117, 'q6', 111.71, 'Illum ut sit dolor sit et quo ut. Quas porro est ad ut illo aliquam.', 8, 'Diesel', 2012, 669, 475, '0', '13', 2, 1, 'Port Berthaburgh', NULL, NULL),
(118, 'U4', 199.94, 'Quia ratione id ab sit. In eos quia consequatur consequatur. Harum dolorum quo quia quia.', 8, 'Diesel', 1988, 510, 490, '0', '36', 2, 1, 'East Destin', NULL, NULL),
(119, 'K3', 145.73, 'Suscipit id cum sed rerum autem laudantium quos nihil. Dolor quia itaque et dolore voluptas nihil. Laboriosam accusamus ad rerum cumque minus ut magni.', 8, 'Petrol', 1986, 348, 479, '0', '14', 1, 0, 'New Benjamin', NULL, NULL),
(120, 'v9', 194.81, 'Consequatur dolorem labore nesciunt quas praesentium. Placeat eligendi enim aut quas corporis voluptatem. Perspiciatis autem voluptatum et. Asperiores illo rerum quibusdam veniam eius vitae a.', 9, 'Petrol', 2014, 681, 374, '0', '72', 1, 1, 'Maudiehaven', NULL, NULL),
(121, 'O7', 111.38, 'Quasi molestiae dignissimos quis deleniti nihil. Provident nostrum consequatur aut et reiciendis veniam et iusto. Deleniti saepe quisquam ex fugit molestiae.', 7, 'Petrol', 2011, 488, 341, '0', '11', 1, 1, 'Lake Yoshikomouth', NULL, NULL),
(122, 'S1', 181.20, 'Sunt aliquam explicabo beatae ea sunt sequi autem tenetur. Maxime nihil unde enim at.', 8, 'Petrol', 1970, 453, 413, '1', '56', 2, 1, 'Durganview', NULL, NULL),
(123, 't1', 167.99, 'Et enim sint consequatur quibusdam ducimus adipisci. Facilis quis porro ratione incidunt nihil deleniti assumenda. Nihil temporibus in accusantium velit. Sed nostrum similique a tempore. Cupiditate earum dolor maxime qui ab porro.', 4, 'Diesel', 2003, 318, 381, '1', '98', 2, 0, 'Port Valentine', NULL, NULL),
(124, 'f5', 182.04, 'Unde nostrum accusantium accusamus explicabo beatae. Ut debitis consequatur quidem dolores deserunt reiciendis qui. Et et laudantium iure voluptatem ut numquam. Qui eum quo id.', 10, 'Diesel', 2008, 792, 346, '0', '20', 1, 1, 'Port Karson', NULL, NULL),
(125, 'n3', 194.40, 'Non placeat pariatur quia provident. Quae esse enim minus sit quis. Sed et totam voluptates rerum fugit.', 8, 'Petrol', 1983, 616, 434, '1', '65', 1, 1, 'Burleyfurt', NULL, NULL),
(126, 'B3', 162.99, 'Modi ut qui illo voluptatem sed voluptatum. Quia eos deserunt aspernatur dolores. Sed a blanditiis tenetur accusantium laboriosam voluptates. Quis placeat voluptas quisquam amet recusandae.', 5, 'Diesel', 2012, 374, 453, '1', '54', 2, 1, 'Wintheisermouth', NULL, NULL),
(127, 'b6', 170.90, 'Exercitationem expedita sit velit officia. Optio neque quas culpa qui. Magni sed rerum expedita aut itaque facere.', 4, 'Diesel', 1976, 626, 446, '1', '70', 1, 0, 'New Generalmouth', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_06_30_095231_create_brands_table', 3),
(9, '2023_05_16_100303_create_cars_table', 4),
(10, '2023_07_03_015641_create_car_images_table', 5),
(14, '2023_05_10_154031_create_users_table', 6),
(15, '2023_05_13_015911_add_details_to_users_table', 7),
(18, '2023_07_16_033253_create_locations_table', 9),
(22, '2023_07_16_031238_add_details_to_cars_table', 10),
(27, '2023_07_16_112959_create_blogs_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0=female, 1=male',
  `email` varchar(255) NOT NULL,
  `phone` tinytext NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=inactive, 1=active',
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `gender`, `email`, `phone`, `address`, `email_verified_at`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `status`, `role_as`) VALUES
(1, 'Guadalupe', 'Wiza', 'kreiger.marianne', 0, 'dskiles@example.org', '5565277451', '3934 Rowan Passage\nGoyetteborough, MI 01130', NULL, '$2y$10$0uTZaGG.MwnEBLnXMfT4MeLjJsGddfQFabosNO6lWKjTD2pUILkqW', 'true', NULL, '2023-07-09 00:08:16', '2023-07-09 00:08:16', 'default.jpg', 0, 0),
(2, 'Libby', 'Lynch', 'tking', 0, 'kgraham@example.org', '4728612203', '9623 Terrell Mall\nNew Tia, OH 01253', NULL, '$2y$10$NOiRKAMwdJYQXuRxaWxXD.pefhYTh9CtoI79e4mJ.wqhGcLTRGFWq', 'true', NULL, '2023-07-09 00:08:16', '2023-07-09 00:08:16', 'default.jpg', 0, 0),
(3, 'Piper', 'Auer', 'ally40', 0, 'hannah94@example.com', '4208770729', '847 Schroeder Roads Apt. 216\nCollinsberg, WI 15706', NULL, '$2y$10$et3H05MpusQXRvHy9TQtm.KSeAK2ptzfjLLtjBOShAM7lsdxabybu', 'true', NULL, '2023-07-09 00:08:16', '2023-07-09 00:08:16', 'default.jpg', 0, 0),
(4, 'Rashawn', 'Conn', 'annabelle.klocko', 1, 'jamaal08@example.org', '6965162977', '47477 Nichole Locks Apt. 854\nPort Keely, FL 65445', NULL, '$2y$10$ZcLSFzOeXyyc5VKXZxITOuk8yz0wIFLUQBLM8B0XPP0N.2dGy9urO', 'true', NULL, '2023-07-09 00:08:16', '2023-07-09 00:08:16', 'default.jpg', 0, 0),
(5, 'Nakia', 'Block', 'mary.jakubowski', 1, 'breanne45@example.net', '9417562197', '50741 Ansel Lodge Apt. 549\nPort Cooperberg, MS 61422-8095', NULL, '$2y$10$13QXJtjHr5bDu0gcdlIK2.bArluK8AqEOhoLM9A90E8m3Wongtl/K', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(6, 'Demarco', 'Connelly', 'wilbert84', 1, 'pdaugherty@example.com', '4428554352', '12259 Jermaine Knoll Apt. 199\nWest Tevin, GA 83212', NULL, '$2y$10$H9efm7vL.dbQPl41kxWu0Ow18W/DFfmErRVBWs/xy7AeXhmF3BEI.', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(7, 'Barney', 'Tromp', 'evangeline.wisoky', 1, 'ukutch@example.org', '3799385181', '211 Metz Groves\nEast Lonzo, MS 98439-9893', NULL, '$2y$10$.nepN0k5XSb6y5jTHY4GROAfiPwy23ZpheACsAxDqngZoam/LO2rG', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(8, 'Adonis', 'Renner', 'ethel.haley', 1, 'rachelle.lind@example.org', '6334907966', '1731 Macey Mountains\nNorth Lloydberg, DE 33134-0557', NULL, '$2y$10$5yLuyjWA4gS4v3Dz/QJFZ.JQuc2fXgmUvvmgoVVYhaUdkxmhWRg4O', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(9, 'Gonzalo', 'Weimann', 'block.bryce', 0, 'estevan63@example.com', '0002003703', '78373 Nickolas Overpass\nVirginiashire, MO 02410', NULL, '$2y$10$WGdGdBrS3/6PHBAag7cVquGreMFkuXobyLvRTc338v5/A3klPdb8.', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(10, 'Keyshawn', 'Friesen', 'dianna38', 1, 'kulas.neha@example.net', '4573418109', '384 Birdie Points Apt. 381\nLake Marianne, MT 31578-2951', NULL, '$2y$10$qEt7GI7YCSd4sNTB88RNzusFyZ7zQshtyToUVKwTCB6OTvZGe.T1u', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(11, 'Zachary', 'Von', 'emmanuelle.tillman', 0, 'ykoch@example.org', '7703991037', '249 Ulices Squares\nNew Ruby, NE 44246', NULL, '$2y$10$YAggN9Co6mq07jMlU5HrvOTM.6.D37w.SZX.xNrSj7EmelIo13K1O', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(12, 'Mallie', 'Stiedemann', 'delilah97', 1, 'maximus.grant@example.com', '5848662966', '5311 Stephania Branch Apt. 603\nSmithamborough, MD 97900-3157', NULL, '$2y$10$lDMGw.beo7vAc76vLxByTe5T6y2mOBs9adcMpd02BV9zDl8HPJQ1i', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(13, 'Jennifer', 'Lebsack', 'okeebler', 1, 'herbert.carroll@example.net', '6838451566', '59540 Kavon Inlet Apt. 786\nWunschview, NC 48847', NULL, '$2y$10$GBSzSrjNiOxeTRr70nmgteA2rWm0uScnwBIHoQ/.Q84WncPGrMvkq', 'true', NULL, '2023-07-09 00:08:17', '2023-07-09 00:08:17', 'default.jpg', 0, 0),
(14, 'Ashlee', 'Graham', 'nona84', 0, 'satterfield.rahul@example.com', '3830446513', '522 Andres Springs Suite 979\nNew Otischester, AL 38411', NULL, '$2y$10$yDq3iYqVQtO/QPleCeAPuuKiyAlJmUUEVipfNEoNnsKejVHKK/CS2', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(15, 'Shayna', 'Daniel', 'wolff.bobbie', 0, 'ada99@example.net', '9711379302', '685 Upton Hill\nGrantview, KS 58672', NULL, '$2y$10$qWDsszhEtOg1FctYb5gF.u1mAdpQ14MrTEB9HLro7DRnVpplajTn.', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(16, 'Bettye', 'Beer', 'jcole', 1, 'hartmann.chelsey@example.com', '5346208935', '8768 Franecki Harbor Apt. 535\nMaudton, NE 30625', NULL, '$2y$10$SUVdD4qF3Z0UcrVRvw8ctu2h81aNJEdVIeSK3HOiGRpDAQ6QmRTmu', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(17, 'Eveline', 'Quigley', 'alaina.ledner', 0, 'immanuel48@example.com', '2219225196', '7221 Runolfsson Dale Apt. 296\nWest Kaitlin, DE 74662-4660', NULL, '$2y$10$BSJHmsFhNE/4WSkVehSX7uOKK1rwbhQ7oAeBJrbUax6iInQkM7Ps.', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(18, 'Roy', 'Kuphal', 'leopoldo.schimmel', 0, 'madalyn88@example.com', '2637232040', '15028 Elena Vista Suite 350\nJaycestad, RI 77374', NULL, '$2y$10$PPGCYkNMK8bbQQZscV0A2uLx2h2LyWNBPVzGNrBlKlHS4G.3vNI4O', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(19, 'Tyree', 'Dickinson', 'christophe00', 1, 'roberts.minnie@example.org', '8784722066', '898 Nedra Landing Apt. 628\nKiehnfort, AL 59558', NULL, '$2y$10$BZsIXgxm1u16TyI/8Hq7a.fkkMr9TqDX2/EtM2.NoIzrm97IK41Em', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(20, 'Linda', 'Lebsack', 'bahringer.addie', 0, 'braeden.reynolds@example.net', '5168149923', '88891 Elvie Island\nEast Makenziechester, MA 09672', NULL, '$2y$10$nBb1VGw1kqDxMWVnDN8dQu6TyXgxM8Wy7XSj1nhVoJ0A2gh7Gzuau', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(21, 'Carolyn', 'Prosacco', 'kerluke.duncan', 0, 'elinor34@example.com', '0006466001', '937 Amiya Court\nAuroreville, NY 20240-3117', NULL, '$2y$10$MaJxXu1ijhaYw8P6232lAuDlkOgAuOd.OmOAFknD/KUx4ssyMacY6', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(22, 'Rosemary', 'Casper', 'ocorkery', 0, 'okuneva.bettie@example.org', '2936261936', '29771 Quentin Alley Apt. 771\nJacintofurt, CT 66922', NULL, '$2y$10$keNh1CKbVdnKaxmZO.wh2.aQIxPtlCqHlfC4rAYVkehDszXcr5WNe', 'true', NULL, '2023-07-09 00:08:18', '2023-07-09 00:08:18', 'default.jpg', 0, 0),
(24, 'Rosalyn', 'Waters', 'amoen', 1, 'wkoch@example.net', '3434584570', '3387 Balistreri Squares Suite 948\nEast Amina, DC 58376-6946', NULL, '$2y$10$C3y6bP5SINad4FMNx4LXYuLpEElvBUDxel8Tjx0kXT/Vha7Hcaq5K', 'true', NULL, '2023-07-09 00:08:19', '2023-07-09 00:08:19', 'default.jpg', 0, 0),
(26, 'Phuc', 'Nguyen', 'admin', 1, 'admin@gmail.com', '0357824536', '21 ngõ 349 ngách 37 Minh Khai, Vĩnh Tuy, Hai Bà Trưng, Hà Nội', NULL, '$2y$10$YxFBiKNndXQPukNaw6iSGub258jntpezrtOiEQtbfYsLKNsl77FAm', 'true', NULL, '2023-07-09 00:08:54', '2023-07-15 21:48:15', '1689482893_avatar_26.jpg', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `cars_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `car_images_car_id_foreign` (`car_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
