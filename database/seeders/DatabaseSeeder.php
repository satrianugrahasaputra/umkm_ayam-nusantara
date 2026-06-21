<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Menu;
use App\Models\Review;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@ayamnusantara.com'],
            [
                'name' => 'Admin Ayam Nusantara',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Seed Settings
        $settings = [
            'business_name' => 'Ayam Nusantara Victoria',
            'phone' => '0812-3486-3389',
            'address' => 'Ruko Adivasa, Jl. Roda Mas Southpark 2 No.18, Panggung Lor, Kecamatan Semarang Utara, Kota Semarang, Jawa Tengah 50177',
            'opening_hours' => 'Open daily — closes at 21:00',
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.366228795551!2d110.4132!3d-6.966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f40d1a457493%3A0xe54e604f323a9ccb!2sRuko%20Adivasa!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
            'google_maps_link' => 'https://maps.google.com/?q=Ruko+Adivasa+Semarang',
            'whatsapp_number' => '6281234863389',
            'seo_meta_title' => 'Ayam Nusantara Victoria | Authentic Indonesian Chicken in Semarang',
            'seo_meta_description' => 'Nikmati cita rasa ayam nusantara dengan resep khas dan bumbu autentik di Ayam Nusantara Victoria Semarang. Tersedia dine-in, curbside pickup, dan online order.',
            'about_story' => 'Ayam Nusantara Victoria menyajikan kelezatan masakan ayam tradisional Indonesia dengan kualitas bahan prima dan racikan bumbu rahasia warisan nusantara. Kami berkomitmen menyuguhkan kelezatan bumbu yang meresap sempurna, tekstur ayam yang empuk, serta sambal khas beraroma harum yang memikat selera Anda.',
            'about_atmosphere' => 'Nikmati suasana makan yang santai, bersih, dan ber-AC yang sangat cocok untuk santap keluarga maupun berkumpul bersama teman. Kami memprioritaskan higienitas serta keramahan pelayanan untuk memberikan pengalaman bersantap terbaik.',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Seed Menus
        $menus = [
            [
                'category' => 'Chicken',
                'title' => 'Ayam Goreng Laos',
                'description' => 'Ayam goreng empuk bertabur bumbu kelapa parut dan lengkuas laos sangrai gurih renyah.',
                'price' => 32000,
                'image' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=600&auto=format&fit=crop',
                'is_featured' => true,
            ],
            [
                'category' => 'Chicken',
                'title' => 'Ayam Lengkuas',
                'description' => 'Ayam goreng dengan taburan parutan lengkuas melimpah yang renyah di luar dan bumbu meresap ke dalam daging.',
                'price' => 33000,
                'image' => 'https://images.unsplash.com/photo-1598511725832-d81237e199d3?q=80&w=600&auto=format&fit=crop',
                'is_featured' => true,
            ],
            [
                'category' => 'Chicken',
                'title' => 'Ayam Kalasan',
                'description' => 'Ayam goreng khas Kalasan dengan cita rasa bumbu manis gurih legit yang menggugah selera.',
                'price' => 35000,
                'image' => 'https://images.unsplash.com/photo-1569058242253-92a9c755a0ec?q=80&w=600&auto=format&fit=crop',
                'is_featured' => true,
            ],
            [
                'category' => 'Other Dishes',
                'title' => 'Bebek Goreng Nusantara',
                'description' => 'Bebek goreng empuk dengan bumbu rempah tradisional gurih, disajikan lengkap dengan sambal pedas mantap.',
                'price' => 45000,
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=600&auto=format&fit=crop',
                'is_featured' => true,
            ],
            [
                'category' => 'Other Dishes',
                'title' => 'Empal Goreng',
                'description' => 'Daging sapi empal empuk berkualitas yang diungkep dengan bumbu ketumbar khas Jawa kemudian digoreng.',
                'price' => 38000,
                'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=600&auto=format&fit=crop',
                'is_featured' => false,
            ],
            [
                'category' => 'Other Dishes',
                'title' => 'Sayur Asem (Vegetable Soup)',
                'description' => 'Sayur asem segar berkuah bening asam manis gurih berisi labu siam, jagung manis, melinjo, dan kacang panjang.',
                'price' => 15000,
                'image' => 'https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=600&auto=format&fit=crop',
                'is_featured' => false,
            ],
            [
                'category' => 'Other Dishes',
                'title' => 'Tahu Tempe Goreng',
                'description' => 'Seporsi tahu dan tempe goreng hangat bumbu bawang ketumbar sebagai lauk pelengkap utama.',
                'price' => 10000,
                'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=600&auto=format&fit=crop',
                'is_featured' => false,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::updateOrCreate(
                ['title' => $menu['title']],
                $menu
            );
        }

        // 4. Seed Reviews
        $reviews = [
            [
                'customer_name' => 'Budi Santoso',
                'rating' => 5,
                'review' => 'Ayam lengkuas dengan bumbu meresap. Gurihnya pas dan kremesannya melimpah ruah!',
                'featured' => true,
            ],
            [
                'customer_name' => 'Siti Rahma',
                'rating' => 5,
                'review' => 'Tempat bersih dan pelayanan baik. Pelayanannya sangat ramah dan penyajiannya cepat.',
                'featured' => true,
            ],
            [
                'customer_name' => 'Andi Wijaya',
                'rating' => 5,
                'review' => 'Sambal memiliki cita rasa unik. Sangat pas dipadukan dengan ayam laosnya yang gurih mantap.',
                'featured' => true,
            ],
            [
                'customer_name' => 'Dewi Lestari',
                'rating' => 4,
                'review' => 'Bebek gorengnya empuk sekali tidak bau amis. Harganya pun sangat bersahabat dibanding rasanya!',
                'featured' => false,
            ],
        ];

        foreach ($reviews as $rev) {
            Review::updateOrCreate(
                ['customer_name' => $rev['customer_name']],
                $rev
            );
        }

        // 5. Seed Gallery
        $gallery = [
            ['image' => 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?q=80&w=800', 'category' => 'Food Photos'],
            ['image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=800', 'category' => 'Restaurant Atmosphere'],
            ['image' => 'https://images.unsplash.com/photo-1577219491135-ce391730fb2c?q=80&w=800', 'category' => 'Menu Showcase'],
            ['image' => 'https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=800', 'category' => 'Customer Experience'],
            ['image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800', 'category' => 'Food Photos'],
            ['image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=800', 'category' => 'Restaurant Atmosphere'],
        ];

        foreach ($gallery as $gal) {
            Gallery::updateOrCreate(
                ['image' => $gal['image']],
                $gal
            );
        }
    }
}
