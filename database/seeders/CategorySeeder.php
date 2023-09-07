<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_categories = [
            [
                'name' => 'Phiêu lưu',
                'slug' => 'phieu-luu'
            ],
            [
                'name' => 'Trinh thám',
                'slug' => 'trinh-tham'
            ],
            [
                'name' => 'Hồi hộp',
                'slug' => 'hoi-hop'
            ],
            [
                'name' => 'Ly kì',
                'slug' => 'ly-ki'
            ],
            [
                'name' => 'Gia đình',
                'slug' => 'gia-dinh'
            ],
            [
                'name' => 'Hài hước',
                'slug' => 'hai-huoc'
            ],
            [
                'name' => 'Trẻ em',
                'slug' => 'tre-em'
            ],
            [
                'name' => 'Người lớn',
                'slug' => 'nguoi-lon'
            ],
            [
                'name' => 'Ca nhạc',
                'slug' => 'ca-nhac'
            ],
            [
                'name' => 'Khoa học',
                'slug' => 'khoa-hoc'
            ],
            [
                'name' => 'Tài liệu',
                'slug' => 'tai-lieu'
            ],
            [
                'name' => 'Hoạt hình',
                'slug' => 'hoat-hinh'
            ],[
                'name' => 'Khiêu dâm',
                'slug' => 'kieu-dam'
            ],
            [
                'name' => 'Lãng mạn',
                'slug' => 'lang-man'
            ],
            [
                'name' => 'Chính kịch',
                'slug' => 'chinh-kich'
            ],
            [
                'name' => 'Kỳ ảo',
                'slug' => 'ky-ao'
            ],
            [
                'name' => 'Giật gân',
                'slug' => 'giat-gan'
            ],
            [
                'name' => 'Kiếm hiệp',
                'slug' => 'kiem-hiep'
            ],
            [
                'name' => 'Cổ trang',
                'slug' => 'co-trang'
            ],
            [
                'name' => 'Tâm lý',
                'slug' => 'tam-ly'
            ],
        ];
        DB::table('categories')->insert($list_categories);

    }
}