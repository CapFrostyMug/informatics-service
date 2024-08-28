<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lead;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /**
         * Вызов Seeder-а для таблицы "statuses"
         */
        $this->call(StatusesSeeder::class);

        /**
         * Вызов фабрики для таблицы "leads"
         */
        Lead::factory(30)->create();
    }
}
