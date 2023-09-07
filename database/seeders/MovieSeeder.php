<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'name' =>  'Thử Thách #CáVoiXanh: Trò Chơi Kết Liễu',
                'slug' => 'thu-thach-cavoixanh-tro-choi-ket-lieu',
                'img' => 'public/movies/tro-choi-ket-lieu.jpg',
                'descrition' => 'Sau khi em gái tự sát, Dana quyết tâm tìm kiếm nguyên nhân đằng sau cái chết đầy nghi hoặc. Cô phát hiện em mình đã tham gia một thách thức điên rồ trên mạng xã hội - #Blue_Whale – khơi màu khủng hoảng và kích động giới trẻ tự sát. Dana dần tiến sâu vào chân tướng, nhưng cô buộc phải tham gia thử thách #Blue_Whale nguy hiểm trước khi vén màn sự thật.',
                'release_date' => '2023-08-04',
                'director' => 'Anna Zaytseva',
                'running_time' => 93,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Phim Điện Ảnh Thám Tử Lừng Danh Conan: Tàu Ngầm Sắt Màu Đen',
                'slug' => 'phim-dien-anh-tham-tu-luon-danh-conan-tau-ngam-sat-mau-den',
                'img' => 'public/movies/conan-tau-ngam-sat-mau-den.jpg',
                'descrition' => 'Thám Tử Lừng Danh Conan: Tàu Ngầm Sắt Màu Đen" lấy bối cảnh tại Pacific Buoy - một trụ sở hàng hải của Interpol có nhiệm vụ kết nối các camera an ninh trên toàn thế giới. Nhóm của Conan, theo lời mời của Sonoko, cũng đến Hachijojima để xem cá voi. Tại đây, Conan nhận được thông tin về một nhân viên Europol bị ám sát. Cùng với đó, tính mạng Haibara bị đe dọa, phải chăng thân phận của cô đã bị bại lộ trước Gin…',
                'release_date' => '2023-07-21',
                'director' => 'Yuzuru Tachikawa',
                'running_time' => 110,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Mặt Nạ Fanti',
                'slug' => 'mat-na-fanti',
                'img' => 'public/movies/mat-na-fanti.jpg',
                'descrition' => 'Thế giới của cô diễn viên đảo lộn khi một kẻ ẩn danh đội lốt Fans bước ra từ chiếc điện thoại và bắt đầu theo dõi, quấy quá, thậm chí còn đe dọa cuộc sống của cô',
                'release_date' => '2023-07-28',
                'director' => 'Andy Nguyễn',
                'running_time' => 109,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Dinh Thự Ma Ám',
                'slug' => 'dinh-thu-ma-am',
                'img' => 'public/movies/dinh-thu-ma-am.jpg',
                'descrition' => 'Một người phụ nữ và con trai của cô thuê một nhóm người chuyên gia về tâm linh để giúp đuổi những kẻ xâm chiếm siêu nhiên khỏi ngôi nhà của họ.',
                'release_date' => '2023-07-28',
                'director' => 'Justin Simien',
                'running_time' => 123,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Thanh Tra Sát Nhân',
                'slug' => 'thanh-tra-sat-nhan',
                'img' => 'public/movies/thanh-tra-sat-nhan.jpg',
                'descrition' => 'Phim điện ảnh Thanh Tra Sát Nhân (tên tiếng Anh: Devils) của đạo diễn Kim Jae-hoon xoay quanh màn tráo đổi thân phận bí ẩn, ly kỳ của thanh tra Jae-hwan (Oh Dae-hwan thủ vai) và tên giết người hàng loạt Jin-hyuk (Jang Dong-yoon thủ vai). Kẻ phản diện sống cuộc đời chính nghĩa, người lương thiện lại bất đắc dĩ trở thành sát nhân, những tình tiết không tưởng liên tục xảy ra khiến người xem không thể rời mắt khỏi cuộc truy đuổi nghẹt thở giữa hai nhân vật.',
                'release_date' => '2023-07-28',
                'director' => 'Kim Jae-hoon',
                'running_time' => 102,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Quỷ Quyệt: Cửa Đỏ Vô Định',
                'slug' => 'quy-quyet-cua-do-vo-dinh',
                'img' => 'public/movies/quy-quyet-cua-do-vo-dinh.jpg',
                'descrition' => 'Quỷ quyệt: Cửa Đỏ Vô Định" là bộ phim kinh dị siêu nhiên của Mỹ ra mắt năm 2023 được đạo diễn bởi Patrick Wilson, đây đồng thời cũng là bộ phim đạo diễn đầu tay của anh, với kịch bản dựa trên câu chuyện từ nhà sáng tạo của loạt phim Leigh Whannell và được chấp bút bởi Scott Teems.',
                'release_date' => '2023-07-14',
                'director' => 'Patrick Wilson',
                'running_time' => 107,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Nhiệm Vụ: Bất Khả Thi - Nghiệp Báo Phần Một',
                'slug' => 'nhiem-vu-bat-kha-thi-nghiep-bao-phan-mot',
                'img' => 'public/movies/nhiem-vu-bat-kha-thi-nghiep-bao-phan-mot.jpg',
                'descrition' => 'Câu chuyện lần này diễn ra khi Ethan Hunt và đội IMF của anh ta bắt đầu nhiệm vụ nguy hiểm nhất của họ: Theo dõi một vũ khí mới đáng sợ đe dọa toàn nhân loại trước khi nó rơi vào tay kẻ xấu. Với quyền kiểm soát tương lai và số phận thế giới đang bị đặt cược, và những thế lực đen tối từ quá khứ của Ethan tiến gần, một cuộc đua chết người xung quanh thế giới bắt đầu. Đối mặt với một kẻ thù bí ẩn, toàn năng, Ethan buộc phải xem xét rằng không có gì có thể quan trọng hơn nhiệm vụ của anh ta - ngay cả những người anh ta quan tâm nhất.',
                'release_date' => '2023-07-14',
                'director' => 'Christopher McQuarrie',
                'running_time' => 164,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Trăm Năm Hạnh Phúc',
                'slug' => 'tram-nam-hanh-phuc',
                'img' => 'public/movies/tram-nam-hanh-phuc.png',
                'descrition' => 'Chuyện tình sóng gió của Sati (Sunny Suwanmethanont) và Meta (Chompoo Araya) ngỡ chỉ còn thiếu 1 giọt nước...mắt nữa sẽ tràn ly thì Sati đã “suy” Meta sau cú “hôn đất” nhẹ tựa mây hồng, chỉ gây mất trí nhớ sương sương về quá khứ khá “bad” của mình. Sau khi cố chấp muốn lội về ngày xưa để lý giải cho hiện tại bất ổn của mình…Sati đã “lôi kéo” thêm vợ cũ và con gái Namo (Becky Rebecca) chung vui bằng cách cùng anh du hành thông qua những tấm hình được chụp bằng “chiếc máy ảnh xuyên không” mà Sati vô tình tìm được.. Từ đây, nhà có 3 người đã tạo ra những tình huống bá đạo tưởng hơi twist mà twist hơi nhiều!',
                'release_date' => '2023-07-21',
                'director' => 'Mook-Piyakarn Bootprasert',
                'running_time' => 135,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Xứ Sở Các Nguyên Tố',
                'slug' => 'xu-so-cac-nguyen-to',
                'img' => 'public/movies/xu-so-cac-nguyen-to.jpg',
                'descrition' => 'Xứ Sở Các Nguyên Tố từ Disney và Pixar lấy bối cảnh tại thành phố các nguyên tố, nơi lửa, nước, đất và không khí cùng chung sống với nhau. Câu chuyện xoay quanh nhân vật Ember, một cô nàng cá tính, thông minh, mạnh mẽ và đầy sức hút. Tuy nhiên, mối quan hệ của cô với Wade - một anh chàng hài hước, luôn thuận thế đẩy dòng - khiến Ember cảm thấy ngờ vực với thế giới này. Được đạo diễn bởi Peter Sohn, sản xuất bởi Denise Ream, và lồng tiếng bởi Leah Lewis (Ember) và Mamoudou Athie (Wade)',
                'release_date' => '2023-06-23',
                'director' => 'Peter Sohn',
                'running_time' => 109,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Mamamoo: My Con The Movie',
                'slug' => 'mamamoo-my-con-the-movie',
                'img' => 'public/movies/mamamoo-my-con-the-movie.jpg',
                'descrition' => 'Mamamoo ra mắt vào năm 2014, nổi tiếng với giọng live mạnh mẽ, hòa âm tuyệt vời của 4 thành viên, nhóm được công nhận với độ nổi tiếng chỉ sau BlackPink. Tour diễn ở Mỹ đầu tiên của Mamamoo vượt qua cả BlackPink trở thành tour diễn cháy vé nhất',
                'release_date' => '2023-08-09',
                'director' => 'Moon Byul, Whee In',
                'running_time' => 124,
                'created_at' => Carbon::now(),
            ],
            [
                'name' =>  'Monster',
                'slug' => 'monster',
                'img' => 'public/movies/monster.jpg',
                'descrition' => 'Bộ phim về chủ đề LGBTQ+ giành giải Kịch bản hay nhất tại LHP Cannes 2023. Phim sẽ mang đến cho người xem những lát cắt của một câu chuyện đầy cảm xúc cũng như nội tâm phức tạp của con người dù là trưởng thành hay trẻ con qua góc nhìn điện ảnh lột tả độc đáo của đạo diễn Kore-Eda Hirokazu.',
                'release_date' => '2023-07-21',
                'director' => 'Hirokazu Kore-eda',
                'running_time' => 126,
                'created_at' => Carbon::now(),
            ],

        ];

        DB::table('movies')->insert($movies);
    }
}