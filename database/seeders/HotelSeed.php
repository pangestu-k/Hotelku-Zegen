<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class HotelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $data_admin = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'image' => url('assets/image/profile/guest.jpg')
            ]
        ];

        $data_type = [
            [
                'name' => 'Standar',
                'image' => url('assets/image/kategori/standar.png'),
            ],
            [
                'name' => 'Superior',
                'image' => url('assets/image/kategori/superior.png'),
            ],
            [
                'name' => 'Deluxe',
                'image' => url('assets/image/kategori/luxury.png'),
            ]
        ];

        $data_floor = [
            [
                'name' => 1
            ],
            [
                'name' => 2
            ],
        ];

        $data_room = [
            [
                'name' => 'd-123',
                'floor_id' => 1,
                'type_id' => 3,
                'price' => 1000000,
                'image' => url('assets/image/room/delux-room.webp'),
                'desc' => 'kamar ini adalah kamar tipe delux'
            ],
            [
                'name' => 's-123',
                'floor_id' => 1,
                'type_id' => 2,
                'price' => 800000,
                'image' => url('assets/image/room/superior-room.webp'),
                'desc' => 'kamar ini adalah kamar tipe superior'
            ],
            [
                'name' => 'sd-123',
                'floor_id' => 1,
                'type_id' => 1,
                'price' => 500000,
                'image' => url('assets/image/room/standar-room.webp'),
                'desc' => 'Kamar ini adalah kamar tipe standar'
            ],
        ];

        DB::table('users')->insert($data_admin);
        DB::table('types')->insert($data_type);
        DB::table('floors')->insert($data_floor);
        DB::table('rooms')->insert($data_room);
    }
}
