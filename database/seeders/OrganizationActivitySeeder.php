<?php

namespace Database\Seeders;

use App\Models\OrganizationActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organization_activities')->insert([
            ['name' => 'Еда', 'parent_id' => null],
            ['name' => 'Мясная продукция', 'parent_id' => 1],
            ['name' => 'Молочная продукция', 'parent_id' => 1],
            ['name' => 'Автомобили', 'parent_id' => null],
            ['name' => 'Грузовые', 'parent_id' => 4],
            ['name' => 'Легковые', 'parent_id' => 4],
            ['name' => 'Запчасти', 'parent_id' => 5],
            ['name' => 'Аксессуары', 'parent_id' => 5]
        ]);
    }
}
