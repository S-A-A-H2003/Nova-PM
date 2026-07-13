<?php

namespace Database\Factories;

use App\Models\CvContent;
use App\Models\Cv;
use Illuminate\Database\Eloquent\Factories\Factory;

class CvContentFactory extends Factory
{
    protected $model = CvContent::class;

    public function definition()
    {
        $types = ['education','skill','experience','language','course'];

        return [
            'cv_id' => Cv::factory(),
            'type' => $this->faker->randomElement($types),
            'value' => $this->faker->sentence(),
            'extensions' => null,
        ];
    }
}
