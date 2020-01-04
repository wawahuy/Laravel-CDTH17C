<?php

use App\CauHoi;
use App\LinhVuc;
use Illuminate\Database\Seeder;

class ThemLinhVucVaCauHoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function da($da){
        if($da=='1') return 'A';
        if($da=='2') return 'B';
        if($da=='3') return 'C';
        return 'D';
    }

    public function run()
    {
        //linh vuc
        $linh_vuc = ['Thể thao', 'Lịch sử', 'Âm nhạc', "Toán học", "IT", "Văn học"];
        foreach ($linh_vuc as $lv) {
            LinhVuc::create([
                "ten_linh_vuc" => $lv
            ]);
        }

        //The thao
        $listCauHoi[] = ['noi_dung'=>'Giải Grand Slam đầu tiên trong năm là giải nào?',
            'dap_an'=>'1','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Austrlia mở rộng',
            'phuong_an_B'=>'Wimbledon','phuong_an_C'=>'Roland Garos','phuong_an_D'=>'Mỹ mở rộng'
        ];
        $listCauHoi[] = ['noi_dung'=>'Cùng với Hà Nội T&T (vô địch V-League 2010), CLB nào của Việt Nam tham dự AFC Cup 2011?',
            'dap_an'=>'1','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Sông Lam Nghệ An',
            'phuong_an_B'=>'SHB Đà Nẵng','phuong_an_C'=>'Hoàng Anh Gia Lai','phuong_an_D'=>'Becamex Bình Dương'
        ];
        $listCauHoi[] = ['noi_dung'=>'AFC Asian Cup 2011 được tổ chức tại quốc gia nào?',
            'dap_an'=>'2','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Qatar',
            'phuong_an_B'=>'Hàn Quốc','phuong_an_C'=>'Nhật Bản','phuong_an_D'=>'Iraq'
        ];
        $listCauHoi[] = ['noi_dung'=>'Đội nào lên ngôi vô địch AFC Asian Cup 2011 tổ chức tại Qatar?',
            'dap_an'=>'1','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Nhật Bản',
            'phuong_an_B'=>'Australia','phuong_an_C'=>'Hàn Quốc','phuong_an_D'=>'Uzbekistan'
        ];
        $listCauHoi[] = ['noi_dung'=>'Việt Nam lần đầu tiên vô địch AFF Cup là vào năm nào?',
            'dap_an'=>'3','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'2004',
            'phuong_an_B'=>'2006','phuong_an_C'=>'2008','phuong_an_D'=>'2010'
        ];
        $listCauHoi[] = ['noi_dung'=>'CLB nào vô địch FIFA Club World Cup 2010 tổ chức tại Qatar?',
            'dap_an'=>'3','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Inter Milan',
            'phuong_an_B'=>'Real Madrid','phuong_an_C'=>'Bayern Munich','phuong_an_D'=>'Manchester United'
        ];
        $listCauHoi[] = ['noi_dung'=>'Vận động viên đứng đầu danh sách 100 vận động viên Việt Nam tiêu biểu của năm 2010 là vận động viên Vũ Thị Hương của môn thể thao nào?',
            'dap_an'=>'1','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Điền kinh',
            'phuong_an_B'=>'Cờ vua','phuong_an_C'=>'Karatedo','phuong_an_D'=>'Cầu lông'
        ];
        $listCauHoi[] = ['noi_dung'=>'Giải đua xe đạp vòng quanh nước Pháp năm 2001 có mấy chặng đua?',
            'dap_an'=>'1','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'16',
            'phuong_an_B'=>'21','phuong_an_C'=>'26','phuong_an_D'=>'31'
        ];
        $listCauHoi[] = ['noi_dung'=>'Vận động viên nào sau đây giành được huy chương vàng tại ASIAD 16 (tổ chức tại Quảng Châu-Trung Quốc 2010)',
            'dap_an'=>'4','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Lê Bích Phương',
            'phuong_an_B'=>'Trương Thanh Hằng','phuong_an_C'=>'Vũ Thị Hương','phuong_an_D'=>'Lê Quang Liêm'
        ];
        $listCauHoi[] = ['noi_dung'=>'Đội tuyển bóng đá nào xếp thứ ba tại World Cup 2010?',
            'dap_an'=>'3','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Tây Ban Nha',
            'phuong_an_B'=>'Hà Lan','phuong_an_C'=>'Đức','phuong_an_D'=>'Uruguay'
        ];
        $listCauHoi[] = ['noi_dung'=>'Trong môn quần vợt thì một năm có bao nhiêu giải Grand Slam được tổ chức?',
            'dap_an'=>'1','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'3',
            'phuong_an_B'=>'4','phuong_an_C'=>'5','phuong_an_D'=>'6'
        ];
        $listCauHoi[] = ['noi_dung'=>'Tại thể vận hội Olympic trẻ lần 1-2010 tại Singapore, thể thao Việt Nam giành được 4 huy chương, trong đó vận động viên nào giành được huy chương vàng duy nhất?',
            'dap_an'=>'3','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Thạch Kim Tuấn (cử tạ)',
            'phuong_an_B'=>'Nguyễn Thanh Thảo (Taekwondo)','phuong_an_C'=>'Nguyễn Quốc Cương (Taekwondo)','phuong_an_D'=>'Vũ Thị Trang (cầu lồng)'
        ];
        $listCauHoi[] = ['noi_dung'=>'Nước nào là nước chủ nhà tại Copa America 2011?',
            'dap_an'=>'1','linh_vuc_id'=>'1','loai'=>'TheThao','phuong_an_A'=>'Argentina',
            'phuong_an_B'=>'Boliviar','phuong_an_C'=>'Venezuela','phuong_an_D'=>'Paraguay'
        ];
        //Lich Su
        $listCauHoi[] = ['noi_dung'=>'Đại Ngu là quốc hiệu của triều đại nào?',
            'dap_an'=>'2','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Triều Ngô',
            'phuong_an_B'=>'Triều Hồ','phuong_an_C'=>'Các chúa Nguyễn','phuong_an_D'=>'Nhà Tây Sơn'
        ];
        $listCauHoi[] = ['noi_dung'=>'Các vua Hùng đặt quốc hiệu nước ta là gì?',
            'dap_an'=>'1','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Văn Lang',
            'phuong_an_B'=>'Âu Lạc','phuong_an_C'=>'Vạn Xuân','phuong_an_D'=>'Đại Việt'
        ];
        $listCauHoi[] = ['noi_dung'=>'An Dương Vương đặt quốc hiệu nước ta là gì?',
            'dap_an'=>'1','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Âu Lạc',
            'phuong_an_B'=>'Vạn Xuân','phuong_an_C'=>'Đại Cồ Việt','phuong_an_D'=>'Đại Việt'
        ];
        $listCauHoi[] = ['noi_dung'=>'Năm 1010, Lý Thái Tổ đã cho xây dựng điện nào ở trung tâm hoàng thành Thăng Long?',
            'dap_an'=>'2','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Điện Kính Thiên',
            'phuong_an_B'=>'Điện Càn Nguyên','phuong_an_C'=>'Điện Càn Chánh','phuong_an_D'=>'Điện Càn Thành'
        ];
        $listCauHoi[] = ['noi_dung'=>'Thành cổ Sơn Tây do vị vua nào xây dựng nên vào năm 1822?',
            'dap_an'=>'2','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Gia Long',
            'phuong_an_B'=>'Minh Mạng','phuong_an_C'=>'Thiệu Trị','phuong_an_D'=>'Tự Đức'
        ];
        $listCauHoi[] = ['noi_dung'=>'Chùa nào được Lý Nam Đế cho xây sau khi lên ngôi hoàng đế năm 544 ?',
            'dap_an'=>'4','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Chùa Trấn Quốc',
            'phuong_an_B'=>'Chùa Một Cột','phuong_an_C'=>'Chùa Tây Phương','phuong_an_D'=>'Chùa Tứ Pháp'
        ];
        $listCauHoi[] = ['noi_dung'=>'Vạn Thắng Vương là ai ? ',
            'dap_an'=>'3','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Đinh Bộ Lĩnh',
            'phuong_an_B'=>'Lê Hoàn','phuong_an_C'=>'Lê Lợi','phuong_an_D'=>'Nguyễn Huệ'
        ];
        $listCauHoi[] = ['noi_dung'=>'Sau khi chiến thắng quân Nam Hán vào năm 938, Ngô Quyền đã đóng đô ở đâu? ',
            'dap_an'=>'3','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Hoa Lư',
            'phuong_an_B'=>'Đại La','phuong_an_C'=>'Cổ Loa','phuong_an_D'=>'Phú Xuân'
        ];
        $listCauHoi[] = ['noi_dung'=>'Từ “nhị thánh” trong câu “ Đây là nơi chiến địa buổi Trùng Hưng nhị thánh bắt Ô Mã” (Bạch Đằng giang phú ) gồm những người nào ?',
            'dap_an'=>'2','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Ngô Quyền và Trần Hưng Đạo',
            'phuong_an_B'=>'Ngô Quyền và Trần Thái Tông','phuong_an_C'=>'Ngô Quyền và Trần Nhân Tông','phuong_an_D'=>'Trần Thánh Tông và Trần Nhân Tông'
        ];
        $listCauHoi[] = ['noi_dung'=>'Hổ Quyền dưới thời nhà Nguyễn là một đấu trường của những cuộc tử chiến giữa hổ và loài động vật nào?',
            'dap_an'=>'3','linh_vuc_id'=>'2','loai'=>'LichSu','phuong_an_A'=>'Bò tót',
            'phuong_an_B'=>'Báo','phuong_an_C'=>'Voi','phuong_an_D'=>'Chó'
        ];
        $listCauHoi[] = ['noi_dung'=>'Ai là nhạc sĩ Việt Nam đầu tiên viết opera với tác phẩm “Cô sao” và sau đó là “Người tạc tượng”?',
            'dap_an'=>'1','linh_vuc_id'=>'3','loai'=>'AmNhac','phuong_an_A'=>'Đỗ Nhuận',
            'phuong_an_B'=>'Hoàng Vân','phuong_an_C'=>'Trần Hoàn','phuong_an_D'=>'Trọng Đài'
        ];
        $listCauHoi[] = ['noi_dung'=>'The ASEAN WAY-ca khúc chính thức của ASEAN là sáng tác của nhạc sĩ người nước nào?',
            'dap_an'=>'3','linh_vuc_id'=>'3','loai'=>'AmNhac','phuong_an_A'=>'Thái Lan',
            'phuong_an_B'=>'Việt Nam','phuong_an_C'=>'Singapore','phuong_an_D'=>'Malaysia'
        ];
        $listCauHoi[] = ['noi_dung'=>'“Mùa con ong đi lấy mật, mùa con voi xuống sông hút nước, mùa em đi phát rẫy làm nương, anh vào rừng đặt bẫy cài chông” là những câu hát nói về tháng nào?',
            'dap_an'=>'2','linh_vuc_id'=>'3','loai'=>'AmNhac','phuong_an_A'=>'Tháng Giêng',
            'phuong_an_B'=>'Tháng hai','phuong_an_C'=>'Tháng ba','phuong_an_D'=>'Tháng tư'
        ];
        $listCauHoi[] = ['noi_dung'=>'Bộ phim “The Social Network” về mạng xã hội nào đã đạt giải Quả cầu vàng 2011?',
            'dap_an'=>'1','linh_vuc_id'=>'3','loai'=>'Phim','phuong_an_A'=>'Facebook',
            'phuong_an_B'=>'Twitter','phuong_an_C'=>'Yahoo Plus','phuong_an_D'=>'Opera'
        ];
        $listCauHoi[] = ['noi_dung'=>'Lã Thanh Huyền đã tham gia bộ phim nào sau đây?',
            'dap_an'=>'3','linh_vuc_id'=>'3','loai'=>'Phim','phuong_an_A'=>'Nhà có nhiều cửa sổ',
            'phuong_an_B'=>'Đẹp từng centimet','phuong_an_C'=>'Blog nàng dâu','phuong_an_D'=>'Ngôi nhà hạnh phúc'
        ];
        $listCauHoi[] = ['noi_dung'=>'Tác phẩm điện ảnh "Thập diện mai phục" là của đạo diễn nào?',
            'dap_an'=>'3','linh_vuc_id'=>'3','loai'=>'Phim','phuong_an_A'=>'Lý An',
            'phuong_an_B'=>'Dương Khiết','phuong_an_C'=>'Trương Nghệ Mưu','phuong_an_D'=>'Ngô Vũ Sâm'
        ];
        $listCauHoi[] = ['noi_dung'=>'Nam ca sĩ nào đạt giải thưởng Ca sĩ của năm tại Lễ trao giải Làn Sóng Xanh 2010?',
            'dap_an'=>'3','linh_vuc_id'=>'3','loai'=>'AmNhac','phuong_an_A'=>'Đàm Vĩnh Hưng',
            'phuong_an_B'=>'Lam Trường','phuong_an_C'=>'Đan Trường','phuong_an_D'=>'Minh Quân'
        ];
        $listCauHoi[] = ['noi_dung'=>'Trong nhạc phẩm "Hoa sữa" nhạc sĩ Hồng Đăng còn nhắc tới loại cây nào khác?',
            'dap_an'=>'3','linh_vuc_id'=>'3','loai'=>'AmNhac','phuong_an_A'=>'Bàng',
            'phuong_an_B'=>'Phượng','phuong_an_C'=>'Phi lao','phuong_an_D'=>'Quất'
        ];
        $listCauHoi[] = ['noi_dung'=>'Ai đã lên ngôi Thần tượng âm nhạc Việt Nam 2010?',
            'dap_an'=>'3','linh_vuc_id'=>'3','loai'=>'AmNhac','phuong_an_A'=>'Trần Lân Nhã',
            'phuong_an_B'=>'Trần Nguyễn Uyên Linh','phuong_an_C'=>'Văn Mai Hương','phuong_an_D'=>'Lều Phương Anh'
        ];
        $listCauHoi[] = ['noi_dung'=>'Test ngôi Thần tượng âm nhạc Việt Nam 2010?',
        'dap_an'=>'3','linh_vuc_id'=>'1','loai'=>'AmNhac','phuong_an_A'=>'Trần Lân Nhã',
        'phuong_an_B'=>'Trần Nguyễn Uyên Linh','phuong_an_C'=>'Văn Mai Hương','phuong_an_D'=>'Lều Phương Anh'
        ];
        $listCauHoi[] = ['noi_dung'=>'Test hạc Việt Nam 2010?',
        'dap_an'=>'3','linh_vuc_id'=>'1','loai'=>'AmNhac','phuong_an_A'=>'Trần Lân Nhã',
        'phuong_an_B'=>'Trần Nguyễn Uyên Linh','phuong_an_C'=>'Văn Mai Hương','phuong_an_D'=>'Lều Phương Anh'
        ];

        foreach ($listCauHoi as $ch) {
            CauHoi::create([
                    "noidung" => $ch["noi_dung"],
                    "linh_vuc_id" => $ch["linh_vuc_id"],
                    "dapan" => $this->da($ch["dap_an"]),
                    "phuongan_A" => ($ch["phuong_an_A"]),
                    "phuongan_B" => ($ch["phuong_an_B"]),
                    "phuongan_C" => ($ch["phuong_an_C"]),
                    "phuongan_D" => ($ch["phuong_an_D"]),
            ]);
        }
    }
}
