<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_penembusan' => $this->faker->sentence(),
            'nama_produsen' => $this->faker->sentence(),
            'distributor' => $this->faker->sentence(),
            'kode_distributor' => $this->faker->sentence(),
            'kode_so' => $this->faker->sentence(),
            'tgl_order' => $this->faker->sentence(),
            'total_kuantitas' => $this->faker->sentence(),
            'nomor_do' => $this->faker->sentence(),
            'nama_produk' => $this->faker->sentence(),
            'qty' => $this->faker->sentence(),
            'tanggal_do' => $this->faker->sentence(),
            'dibuat_oleh' => $this->faker->sentence(),
            'dibuat_pada' => $this->faker->sentence(),

        ];
    }
}
