<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));
        $nombre = ucfirst($this->faker->unique()->words(random_int(1,2) , true));
        return [
            
            'nombre' => $nombre,
            'descripcion' => $this->faker->text(),
            'imagen' => 'articulos/'.$this->faker->picsum("public/storage/articulos" , 500 , 400 , null , false),
            'decimal' => $this->faker->randomFloat(2,1,999),
            'stock' => $this->faker->numberBetween(0,1000),
            'user_id' => User::all()->random()->id,
            'slug' => Str::slug($nombre)


        ];
    }
}
