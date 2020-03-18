<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('books')->delete();
        
        \DB::table('books')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Giáo trình C++ & Lập trình hướng đối tượng',
                'author' => 'GS. Phạm Văn Ất',
                'description' => '<p><strong><span style="font-size:14px">Lập tr&igrave;nh hướng đối tượng dựa tr&ecirc;n việc tổ chức chương tr&igrave;nh th&agrave;nh c&aacute;c lớp. Kh&aacute;c với h&agrave;m v&agrave; thủ tục, lớp l&agrave; một đơn vị bao gồm cả dữ liệu v&agrave; c&aacute;c phương thức xử l&yacute;.</span></strong></p>

<p><br />
<span style="font-size:14px">&ldquo;Gi&aacute;o tr&igrave;nh C++ &amp; lập tr&igrave;nh hướng đối tượng&rdquo; tr&igrave;nh b&agrave;y một c&aacute;ch hệ thống c&aacute;c kh&aacute;i niệm của lập tr&igrave;nh hướng đối tượng được c&agrave;i đặt trong C++ như lớp, đối tượng, sự thừa kế, t&iacute;nh tương ứng bội v&agrave; c&aacute;c khả năng mới trong x&acirc;y dựng, sử dụng h&agrave;m như đối tham chiếu, đối mặc định, h&agrave;m tr&ugrave;ng t&ecirc;n, h&agrave;m to&aacute;n tử. &ldquo;Gi&aacute;o tr&igrave;nh C++ &amp; lập tr&igrave;nh hướng đối tượng&rdquo; gồm 13 chương v&agrave; 5 phụ lục được tr&igrave;nh b&agrave;y kh&aacute; khoa học. Ngo&agrave;i ra, cuốn s&aacute;ch c&ograve;n đề cập đến một số vấn đề c&ograve;n &iacute;t được biết đến như c&aacute;ch x&acirc;y dựng h&agrave;m với số đối bất định trong C cũng sẽ được giới thiệu .</span></p>',
                'image' => 'images/books/26K359iNfhsl8UkQhj9BvU3gH3HZP8sh3Yi6zMIH.png',
                'available_quantity' => 100,
                'sale' => 20,
                'price' => 108750,
                'publication_date' => '2018-01-01',
                'genre_id' => 6,
                'publisher_id' => 6,
                'created_at' => '2020-04-22 03:40:21',
                'updated_at' => '2020-04-22 03:40:21',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '7 Bài Học Hay Nhất Về Vật Lý',
                'author' => 'Carlo Rovelli',
                'description' => '<p><span style="font-size:14px">Cuốn s&aacute;ch&nbsp;<em><strong>7 b&agrave;i học hay nhất về Vật l&yacute;</strong></em>&nbsp;l&agrave; một bản tổng kết nhanh những tri thức quan trọng đ&atilde; tạo n&ecirc;n cuộc c&aacute;ch mạng vĩ đại trong nền vật l&yacute; thế kỷ XX như thuyết tương đối rộng, cơ học lượng tử, vũ trụ học, hạt cơ bản, l&yacute; thuyết hấp dẫn lượng tử, hố đen. Cuốn s&aacute;ch cũng đề cập đến &yacute; nghĩa của tất cả những tri thức ấy với nhận thức của con người ng&agrave;y nay.<br />
<br />
Trong ấn bản tiếng Italia, cuốn s&aacute;ch đ&atilde; b&aacute;n được hơn 300.000 bản, v&agrave; giờ đ&atilde; được dịch ra 28 thứ tiếng. Được Independent, Economist, Telegraph, Guardian, New Scientist, Evening Standard b&igrave;nh chọn l&agrave; cuốn s&aacute;ch hay nhất của năm 2015</span></p>',
                'image' => 'images/books/lsvLQBoz4VO5II4HjzlHcGCxfwZ1Uwd1bvCrr0NH.jpeg',
                'available_quantity' => 50,
                'sale' => 0,
                'price' => 51750,
                'publication_date' => '2017-01-01',
                'genre_id' => 6,
                'publisher_id' => 7,
                'created_at' => '2020-04-22 04:00:16',
                'updated_at' => '2020-04-22 04:00:16',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Câu chuyện giải tích',
                'author' => 'Larry Gonick',
                'description' => '<p><span style="font-size:14px">Tiếp theo chủ đề đại số, t&aacute;c giả&nbsp;<strong>Larry Gonick</strong>&nbsp;tiếp tục đưa độc giả tiến bước v&agrave;o v&ugrave;ng đất của to&aacute;n giải t&iacute;ch, bắt nguồn từ &yacute; tưởng của hai nh&agrave; khoa học t&ecirc;n tuổi, m&agrave; c&acirc;u chuyện về &yacute; tưởng n&agrave;y của cả hai người c&oacute; thể viết hẳn th&agrave;nh một cuốn s&aacute;ch kh&aacute;c. Vẫn l&agrave; to&aacute;n học nhưng với c&aacute;c kh&aacute;i niệm trừu tượng hơn như t&iacute;ch ph&acirc;n, đạo h&agrave;m, vi ph&acirc;n, tỷ số, tiệm cận, giới hạn&hellip;,&nbsp;<strong>Larry Gonick</strong>&nbsp;đ&atilde; th&agrave;nh c&ocirc;ng khi giải th&iacute;ch c&aacute;c kh&aacute;i niệm n&agrave;y th&ocirc;ng qua những đồ thị r&otilde; r&agrave;ng v&agrave; những v&iacute; dụ d&iacute; dỏm, đồng thời sau mỗi chủ đề, &ocirc;ng c&ograve;n cung cấp cho bạn đọc những b&agrave;i tập đơn giản để &aacute;p dụng những g&igrave; đ&atilde; học.</span></p>',
                'image' => 'images/books/HqtI06WKSpFWF5sQQMURBtPXYZMcsFnczenyCYsx.png',
                'available_quantity' => 30,
                'sale' => 20,
                'price' => 102400,
                'publication_date' => '2019-01-01',
                'genre_id' => 6,
                'publisher_id' => 4,
                'created_at' => '2020-04-22 04:02:14',
                'updated_at' => '2020-04-22 04:02:14',
            ),
        ));
        
        
    }
}