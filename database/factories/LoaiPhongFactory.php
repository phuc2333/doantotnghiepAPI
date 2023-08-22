<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoaiPhong>
 */
class LoaiPhongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'LoaiPhong' => $this->faker->word,
            'DonGia' => 'Đang chờ',
            'SoNguoi' => 2,
            'SoGiuong' => 2,
        ];
    }
}
