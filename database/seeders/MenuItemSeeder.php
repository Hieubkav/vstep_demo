<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main menu items
        $mainMenuItems = [
            [
                'title' => 'Homepage',
                'url' => '/',
                'position' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Contact',
                'component_target' => 'contact',
                'position' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Projects',
                'url' => '/projects',
                'position' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Pricing',
                'url' => '/pricing',
                'position' => 4,
                'is_active' => true
            ],
            [
                'title' => 'About Us',
                'component_target' => 'about',
                'position' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Jobs',
                'url' => '/jobs',
                'position' => 6,
                'is_active' => true
            ],
            [
                'title' => 'More',
                'url' => '#',
                'position' => 7,
                'is_active' => true
            ]
        ];

        foreach ($mainMenuItems as $item) {
            $menuItem = \App\Models\MenuItem::updateOrCreate(
                ['title' => $item['title'], 'parent_id' => null],
                $item
            );

            // Add submenu items for "More" menu
            if ($item['title'] === 'More') {
                $subMenuItems = [
                    [
                        'title' => 'Asset Library',
                        'url' => '/asset-library',
                        'parent_id' => $menuItem->id,
                        'position' => 1,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Courses',
                        'url' => '/courses',
                        'parent_id' => $menuItem->id,
                        'position' => 2,
                        'is_active' => true
                    ]
                ];

                foreach ($subMenuItems as $subItem) {
                    \App\Models\MenuItem::updateOrCreate(
                        ['title' => $subItem['title'], 'parent_id' => $subItem['parent_id']],
                        $subItem
                    );
                }
            }
        }
    }
}
