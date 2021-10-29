<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate(
            [
                'name' => 'Ноутбуки',
            ],
            [
                'image' => 'img/categories/notebooks.png',
                'is_active' => true,
                'priority' => 1,
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Монітори',
            ],
            [
                'image' => 'img/categories/monitors.png',
                'is_active' => true,
                'priority' => 2,
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Комп\'ютери',
            ],
            [
                'image' => 'img/categories/computers.png',
                'is_active' => true,
                'priority' => 3,
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Планшети',
            ],
            [
                'image' => 'img/categories/tablets.png',
                'is_active' => true,
                'priority' => 4,
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Мікрофони',
            ],
            [
                'image' => 'img/categories/microphones.jpg',
                'is_active' => true,
                'priority' => 5,
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Навушники',
            ],
            [
                'image' => 'img/categories/headphone.jpg',
                'is_active' => true,
                'priority' => 6,
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Клавіатури',
            ],
            [
                'image' => 'img/categories/keyboards.jpg',
                'is_active' => true,
                'priority' => 7,
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Миші',
            ],
            [
                'image' => 'img/categories/mice.jpg',
                'is_active' => true,
                'priority' => 8,
            ]
        );
    }
}

