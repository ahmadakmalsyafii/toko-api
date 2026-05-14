<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $dataProduk = [
            [
                'kode_produk' => 'PRD-001',
                'image_url'      => 'https://res.cloudinary.com/dzvmb5wru/image/upload/v1778141062/dw8mcylo4d0lczbhvxvq.webp',
                'nama_produk' => 'Laptop Asus ROG',
                'deskripsi'   => 'Laptop Asus ROG dengan prosesor Intel Core i7, RAM 16GB, dan kartu grafis NVIDIA GeForce RTX 3060.',
                'harga'       => 15000000,
                'stok'        => 20,
            ],
            [
                'kode_produk' => 'PRD-002',
                'image_url'      => 'https://res.cloudinary.com/dzvmb5wru/image/upload/v1778141062/wrqxludbvuovvg5tzlrp.webp',
                'nama_produk' => 'Mouse Logitech Wireless',
                'deskripsi'   => 'Mouse Logitech Wireless dengan sensor optik dan konektivitas Bluetooth.',
                'harga'       => 250000,
                'stok'        => 50,
            ],
            [
                'kode_produk' => 'PRD-003',
                'nama_produk' => 'Keyboard Mechanical Keychron',
                'image_url'      => 'https://res.cloudinary.com/dzvmb5wru/image/upload/v1778141062/wpu2i7kppwfu0h5rkaqv.webp',
                'deskripsi'   => 'Keyboard Mechanical Keychron dengan switch Gateron Red dan backlight RGB.',
                'harga'       => 1500000,
                'stok'        => 30,
            ],
            [
                'kode_produk' => 'PRD-004',
                'image_url'      => 'https://res.cloudinary.com/dzvmb5wru/image/upload/v1778141064/ctuxx6u4mdu7v11cs7x4.jpg',
                'nama_produk' => 'Monitor LG 24 Inch',
                'deskripsi'   => 'Monitor LG 24 Inch dengan resolusi Full HD dan refresh rate 75Hz.',
                'harga'       => 1800000,
                'stok'        => 15,
            ],
        ];

        foreach ($dataProduk as $produk) {
            Produk::create($produk);
        }
    }
}
