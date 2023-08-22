<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phong>
 */
class PhongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'TenPhong' => $this->faker->word,
            'TrangThai' => 'Đang chờ',
            'idTang' => 1,
            'idLoaiPhong' => 1,
        ];
    }
}
