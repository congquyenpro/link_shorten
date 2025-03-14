<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ShortenedUrl;

class ShortenedUrlFactory extends Factory
{
    protected $model = ShortenedUrl::class;

    public function definition()
    {
        return [
            'original_url' => $this->faker->url(),
            'short_code' => $this->faker->unique()->regexify('[A-Za-z0-9]{6}'),
        ];
    }
}
