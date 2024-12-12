<?php

namespace Database\Seeders;

use App\Enums\OptionType;
use App\Models\Option;
use App\Models\Property;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'john@doe.fr',
            'password' => '0000',
        ]);

        $allOptions = collect(OptionType::cases())->map(function ($option) {
            return Option::factory()->create(['name' => $option->value]);
        });

        Property::factory(50)->create()->each(function ($property) use ($allOptions) {
            $randomOptions = $allOptions->random(3);
            $property->options()->attach($randomOptions->pluck('id'));
        });
    }
}
