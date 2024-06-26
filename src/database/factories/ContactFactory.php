<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->numberBetween(1,3),
            'email' =>$this->faker->safeEmail,
            'tell' =>$this->faker->phoneNumber,
            'address' =>$this->faker->address,
            'building' =>$this->faker->city,
            'detail' =>$this->faker->sentence,
        ];
    }
}
