<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\json;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arcticle ='';
        for ($i=1; $i<7; $i++)
        {
            $arcticle =$arcticle . fake()->randomLetter() . str(fake()->randomDigit());
        }
        $attr_keys = ['страна', 'цвет'];
        $attr_values = [fake()->country(), fake()->colorName()];
        $attributes = array_combine($attr_keys, $attr_values);

        return [
            'article' => $arcticle,
            'name' => "Товар ". rand(1,10),
            'status' => 'available',
            'data' => $attributes,
        ];
    }
}
