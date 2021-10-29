<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::updateOrCreate(
            [
                'name' => 'Ноутбук HP Pavilion Gaming 15-ec2004ua (4A7M7EA) Shadow',
            ],
            [
                'category_id' => 1,
                'description' => 'Екран 15.6" IPS (1920x1080) Full HD 144 Гц, матовий / AMD Ryzen 5 5600H (3.3 — 4.2 ГГц)
                / RAM 16 ГБ / SSD 512 ГБ / nVidia GeForce RTX 3050, 4 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / вебкамера
                / DOS / 1.98 кг / чорний',
                'image' => 'img/products/HP-Pavilion-Gaming-15-ec2004ua.jpg',
                'price' => 29999,
                'is_active' => true,
                'is_top' => true,
                'priority' => 1,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Ноутбук Acer Aspire 3 A315-34-C1DV (NX.HE3EU.05J) Charcoal Black',
            ],
            [
                'category_id' => 1,
                'description' => 'Екран 15.6" (1366x768) WXGA HD, матовий / Intel Celeron N4020 (1.1 — 2.8 ГГц) / RAM 4 ГБ
                / SSD 128 ГБ / Intel UHD 600 / без ОД / LAN / Wi-Fi / Bluetooth / вебкамера / без ОС / 1.94 кг / чорний',
                'image' => 'img/products/Acer-Aspire-3-A315-34-C1DV.jpg',
                'price' => 9999,
                'is_active' => true,
                'is_top' => false,
                'priority' => 2,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Ноутбук HP Laptop 15s-eq2053ua (4A7N8EA) Natural Silver',
            ],
            [
                'category_id' => 1,
                'description' => 'Екран 15.6" IPS (1920x1080) Full HD, матовий / AMD Ryzen 5 5500U (2.1 — 4.0 ГГц) / RAM 16 ГБ
                / SSD 512 ГБ / AMD Radeon Graphics / без ОД / Wi-Fi / Bluetooth / вебкамера / DOS / 1.69 кг / сріблястий',
                'image' => 'img/products/HP-Laptop-15s-eq2053ua.jpg',
                'price' => 18499,
                'is_active' => true,
                'is_top' => false,
                'priority' => 3,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Ноутбук Apple MacBook Air 13" M1 256GB 2020 (MGN63) Space Gray',
            ],
            [
                'category_id' => 1,
                'description' => 'Екран 13.3" Retina (2560x1600) WQXGA, глянсовий / Apple M1 / RAM 8 ГБ / SSD 256 ГБ
                / Apple M1 Graphics / Wi-Fi / Bluetooth / macOS Big Sur / 1.29 кг / сірий',
                'image' => 'img/products/Apple-MacBook-Air-13-M1.jpg',
                'price' => 33999,
                'is_active' => true,
                'is_top' => false,
                'priority' => 4,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Монітор 27" Samsung Odyssey G5 LC27G54T Black',
            ],
            [
                'category_id' => 2,
                'description' => 'Діагональ дисплея 27". Максимальна роздільна здатність дисплея 2560 x 1440.
                Час реакції матриці 1 мс (GtG). Яскравість дисплея 250 кд/м². Тип матриці VA. Контрастність дисплея 2500:1.
                Особливості: Flicker-Free, Безрамковий (Сinema screen), Вигнутий екран',
                'image' => 'img/products/Монітор-27-Samsung-Odyssey-G5.jpg',
                'price' => 8999,
                'is_active' => true,
                'is_top' => true,
                'priority' => 2,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Монітор 27" Dell S2721DGFA',
            ],
            [
                'category_id' => 2,
                'description' =>'Діагональ дисплея 27". Максимальна роздільна здатність дисплея 2560 x 1440.
                Час реакції матриці 1 мс (GtG). Яскравість дисплея 400 кд/м². Тип матриці IPS. Контрастність дисплея 1000:1.
                Особливості: Flicker-Free, USB-концентратор, Безрамковий (Сinema screen), Поворотний екран (Pivot), Регулювання за висотою',
                'image' => 'img/products/Dell-27-S2721DGFA.jpg',
                'price' => 14199,
                'is_active' => true,
                'is_top' => false,
                'priority' => 2,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Монітор 27" HP P27q G4',
            ],
            [
                'category_id' => 2,
                'description' =>'Діагональ дисплея 27". Максимальна роздільна здатність дисплея 2560 x 1440.
                Час реакції матриці 5 мс. Яскравість дисплея 250 кд/м². Тип матриці IPS. Контрастність дисплея 1000:1.
                Особливості: Flicker-Free, Безрамковий (Сinema screen), Поворотний екран (Pivot), Регулювання за висотою',
                'image' => 'img/products/Монітор-27-HP-P27q-G4.jpg',
                'price' => 7999,
                'is_active' => true,
                'is_top' => false,
                'priority' => 2,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Комп\'ютер Everest Home 4070',
            ],
            [
                'category_id' => 3,
                'description' => 'Intel Core i3-10100F (3.6 - 4.3 ГГц) / RAM 8 ГБ / HDD 1 ТБ
                / nVidia GeForce GTX 1050 Ti, 4 ГБ / Без ОД / LAN / без ОС',
                'image' => 'img/products/Everest-Home-4070.jpg',
                'price' => 16999,
                'is_active' => true,
                'is_top' => true,
                'priority' => 3,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Комп\'ютер QUBE i5 10400F GTX 1660 TI 6 GB 1621',
            ],
            [
                'category_id' => 3,
                'description' => 'Intel Core i5-10400F (2.9 — 4.3 ГГц) / RAM 16 ГБ / HDD 1 ТБ + SSD 240 ГБ
                / nVidia GeForce GTX 1660 Ti, 6 ГБ / без ОД / LAN / без ОС',
                'image' => 'img/products/QUBE-i5-10400F.jpg',
                'price' => 32499,
                'is_active' => true,
                'is_top' => false,
                'priority' => 3,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Планшет Samsung Galaxy Tab A7 Lite LTE 32GB Grey',
            ],
            [
                'category_id' => 4,
                'description' => 'Екран 8.7" (1340x800) MultiTouch/MediaTek Helio P22T (2.3 ГГц)
                /RAM 3 ГБ/32 ГБ вбудованої пам\'яті + microSD/3G/4G/Wi-Fi/Bluetooth 5.0/основна камера 8 Мп,
                фронтальна — 2 Мп/GPS/ГЛОНАСС/Android 11/371 г/сірий',
                'image' => 'img/products/Samsung-Galaxy-Tab-A7-Lite.jpg',
                'price' => 5699,
                'is_active' => true,
                'is_top' => false,
                'priority' => 4,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Планшет Lenovo Tab M10 FHD Plus (2nd Gen) Wi-Fi 64 GB Platinum Grey',
            ],
            [
                'category_id' => 4,
                'description' => 'Екран 10.3" (1920x1200) MultiTouch / MediaTek Helio P22T (2.3 ГГц) / RAM 4 ГБ
                / 64 ГБ вбудованої пам\'яті + microSD / Wi-Fi / Bluetooth 5.0 / основна камера 8 Мп, фронтальна — 5 Мп
                / Android 9.0 (Pie) / 460 г / платиновий сірий',
                'image' => 'img/products/Lenovo-Tab-M10.jpg',
                'price' => 5999,
                'is_active' => true,
                'is_top' => true,
                'priority' => 4,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Планшет Samsung Galaxy Tab S7 FE Wi-Fi 64 GB Pink',
            ],
            [
                'category_id' => 4,
                'description' => 'Екран 12.4" (2560x1600) MultiTouch / Qualcomm Snapdragon 778G (2.4 ГГц)
                / RAM 4 ГБ / 64 ГБ вбудованої пам\'яті + microSD / Wi-Fi / Bluetooth 5.0 / основна камера: 8 Мп,
                фронтальна — 5 Мп / GPS / ГЛОНАСС / Android 11 / 608 г / рожевий',
                'image' => 'img/products/Samsung-Galaxy-Tab-S7.jpg',
                'price' => 14999,
                'is_active' => true,
                'is_top' => false,
                'priority' => 4,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Мікрофон Esperanza Studio Pro EH182',
            ],
            [
                'category_id' => 5,
                'description' => 'Призначення: Для комп\'ютерів. Роз\'єми: 3.5 мм mini-jack. Діапазон частот: 20 Гц - 20000.
                Розміри: 220x90x60. Довжина шнура: 1.8. Колір: Чорний.',
                'image' => 'img/products/Esperanza-Studio-Pro-EH182.jpg',
                'price' => 249,
                'is_active' => true,
                'is_top' => false,
                'priority' => 5,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Мікрофон HyperX SoloCast',
            ],
            [
                'category_id' => 5,
                'description' => 'Призначення: Студійні. Роз\'єми: USB. Чутливість: -6 дБ повної шкали (1 В/Па у разі 1 кГц).
                Діапазон частот: 20 Гц - 20000. Розміри: 78 х 97 х 184. Довжина шнура: 1.8. Колір: Чорний.',
                'image' => 'img/products/HyperX-SoloCast.jpg',
                'price' => 1799,
                'is_active' => true,
                'is_top' => false,
                'priority' => 5,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Навушники Defunc True Music TWS Black',
            ],
            [
                'category_id' => 6,
                'description' => 'Тип навушників: TWS (2 окремо). Діапазон частот навушників: 20 Гц - 20 кГц. Вага: 40 г.',
                'image' => 'img/products/Defunc-True-Music-TWS-Black.jpg',
                'price' => 899,
                'is_active' => true,
                'is_top' => false,
                'priority' => 6,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Навушники Razer Hammerhead True Wireless',
            ],
            [
                'category_id' => 6,
                'description' => 'Тип навушників: TWS (2 окремо), Діапазон частот навушників: 20 - 20 000 Гц. Вага: 0.045.',
                'image' => 'img/products/Razer-Hammerhead-True-Wireless.jpg',
                'price' => 1799,
                'is_active' => true,
                'is_top' => false,
                'priority' => 6,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Клавіатура бездротова Logitech K380 Multi-Device Bluetooth White',
            ],
            [
                'category_id' => 7,
                'description' => 'Під\'єднання: Бездротове. Розмір миші: Велика. Особливості: Без підсвітки.
                Кнопки: Програмовані. Сумісність з ОС: Mac OS, Microsoft Windows.',
                'image' => 'img/products/Logitech-K380-Multi-Device.jpg',
                'price' => 1159,
                'is_active' => true,
                'is_top' => false,
                'priority' => 7,
            ]
        );
        Product::updateOrCreate(
            [
                'name' => 'Миша Logitech G Pro X Superlight Wireless Black',
            ],
            [
                'category_id' => 8,
                'description' => 'Під\'єднання: Бездротове. Розмір миші: Велика. Особливості: Без підсвітки.
                Кнопки: Програмовані. Сумісність з ОС: Mac OS, Microsoft Windows.',
                'image' => 'img/products/Logitech-G-Pro-X-Superlight-Wireless-Black.jpg',
                'price' => 4250,
                'is_active' => true,
                'is_top' => false,
                'priority' => 8,
            ]
        );
    }
}

