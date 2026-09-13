<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BaseballStoreSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Baseball Bats', 'slug' => 'bats'],
            ['name' => 'Fielding Gloves', 'slug' => 'gloves'],
            ['name' => 'Baseballs & Softballs', 'slug' => 'balls'],
            ['name' => 'Protective & Helmets', 'slug' => 'protective'],
            ['name' => 'Cleats & Footwear', 'slug' => 'cleats'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        $batCat = Category::where('slug', 'bats')->first()->id;
        $gloveCat = Category::where('slug', 'gloves')->first()->id;
        $ballCat = Category::where('slug', 'balls')->first()->id;
        $protCat = Category::where('slug', 'protective')->first()->id;
        $cleatCat = Category::where('slug', 'cleats')->first()->id;

        $products = [
            [
                'category_id' => $batCat,
                'name' => 'Louisville Slugger Genuine Mix Maple Bat',
                'brand' => 'Louisville Slugger',
                'price' => 1250000,
                'stock' => 14,
                'description' => 'Kayu maple premium grade dengan konstruksi seimbang untuk swing speed maksimal dan sweet-spot solid.',
                'image_url' => 'https://images.unsplash.com/photo-1593786481097-cf281dd12e9e?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category_id' => $batCat,
                'name' => 'Easton Maxum 360 BBCOR Composite (-3)',
                'brand' => 'Easton',
                'price' => 3850000,
                'stock' => 6,
                'description' => 'One-piece composite bat dengan sweet-spot barrel terpanjang di kelasnya. Sertifikasi BBCOR resmi kompetisi.',
                'image_url' => 'https://images.unsplash.com/photo-1508344928928-7165b67de128?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category_id' => $gloveCat,
                'name' => 'Rawlings Heart of the Hide 11.5" Infield Glove',
                'brand' => 'Rawlings',
                'price' => 4200000,
                'stock' => 8,
                'description' => 'Kulit steerhide US premium. Pilihan utama infielder profesional MLB dengan durability dan shape retention tinggi.',
                'image_url' => 'https://images.unsplash.com/photo-1516826957135-700dedea698c?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category_id' => $gloveCat,
                'name' => 'Wilson A2000 1786 11.5" Baseball Glove',
                'brand' => 'Wilson',
                'price' => 4500000,
                'stock' => 5,
                'description' => 'Pro Stock Leather ikonik dengan dual-welting untuk stabilitas pocket. Nyaman dan presisi saat transfer bola.',
                'image_url' => 'https://images.unsplash.com/photo-1562077772-3ab12ae4e423?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category_id' => $ballCat,
                'name' => 'Rawlings Official MLB Baseball (Box of 12)',
                'brand' => 'Rawlings',
                'price' => 1650000,
                'stock' => 20,
                'description' => 'Satu lusin bola resmi MLB. Full grain leather cover dengan jahitan benang merah standar liga mayor.',
                'image_url' => 'https://images.unsplash.com/photo-1587280501635-68a0e82cd5ff?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category_id' => $protCat,
                'name' => 'Mizuno Samurai Catcher Gear Set',
                'brand' => 'Mizuno',
                'price' => 5800000,
                'stock' => 3,
                'description' => 'Full set catcher gear mencakup chest protector, leg guards, dan helm pelindung berstandar NOCSAE.',
                'image_url' => 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category_id' => $cleatCat,
                'name' => 'New Balance 4040v6 Metal Cleats',
                'brand' => 'New Balance',
                'price' => 1950000,
                'stock' => 12,
                'description' => 'Sepatu baseball metal cleats dengan midsole FuelCell yang responsif untuk sprint cepat di basepath.',
                'image_url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($products as $item) {
            $item['slug'] = Str::slug($item['name']);
            Product::create($item);
        }
    }
}