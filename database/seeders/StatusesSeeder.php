<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('statuses')->insert($this->getData());
    }

    private function getData(): array
    {
        return [
            [
                'name' => 'Новый'
            ],
            [
                'name' => 'В работе'
            ],
            [
                'name' => 'Завершён'
            ],
        ];
    }
}
