<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            // no explicit fields defined for Setting model; use key/value shape if table exists
            'key' => $this->faker->word(),
            'value' => $this->faker->word(),
        ];
    }
}
