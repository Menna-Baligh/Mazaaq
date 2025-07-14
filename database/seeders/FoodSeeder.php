<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Food::create([
            'name' => 'Air Fryer Fires',
            'description' => 'Delicious Air Fryer Fries with a crispy texture and a hint of sweetness. Perfect for breakfast or as a side dish.',
            'image' => 'assets/img/AirFryerFries.jpg',
            'price' => 100.00,
            'stock_quantity' => 50,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'Blueberry Muffins',
            'description' => 'Delicious Blueberry Muffins with a soft and fluffy texture, bursting with fresh blueberries. Perfect for breakfast or as a snack.',
            'image' => 'assets/img/BlueberryMuffins.jpg',
            'price' => 150.00,
            'stock_quantity' => 30,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'Breakfast Pizza',
            'description' => 'Delicious Breakfast Pizza with a crispy crust and a tangy tomato sauce. Perfect for a quick and satisfying breakfast.',
            'image' => 'assets/img/BreakfastPizza.jpg',
            'price' => 250.00,
            'stock_quantity' => 20,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'Chorizo and Eggs',
            'description' => 'Delicious Chorizo and Eggs with a spicy kick and a rich flavor. Perfect for a hearty breakfast or brunch.',
            'image' => 'assets/img/ChorizoandEggs.jpg',
            'price' => 150.00,
            'stock_quantity' => 40,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'Cinnamon Rolls French Toast',
            'description' => 'Delicious Cinnamon Rolls French Toast with a sweet and sticky glaze. Perfect for a decadent breakfast or brunch.',
            'image' => 'assets/img/CinnamonRollFrenchToastCasserole.jpg',
            'price' => 200.00,
            'stock_quantity' => 25,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'Corn Fritters',
            'description' => 'Delicious Corn Fritters with a crispy exterior and a soft, sweet interior. Perfect for breakfast or as a snack.',
            'image' => 'assets/img/CornFritters.jpg',
            'price' => 300.00,
            'stock_quantity' => 35,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'French Toast',
            'description' => 'Delicious French Toast with a golden-brown crust and a soft, fluffy interior. Perfect for breakfast or brunch.',
            'image' => 'assets/img/FrenchToast.jpg',
            'price' => 350.00,
            'stock_quantity' => 30,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'Homemade Waffles',
            'description' => 'Delicious Homemade Waffles with a crispy exterior and a soft, fluffy interior. Perfect for breakfast or brunch.',
            'image' => 'assets/img/HomemadeWaffles.jpg',
            'price' => 200.00,
            'stock_quantity' => 45,
            'category' => 'breakfast',
        ]);
        Food::create([
            'name' => 'Chicken weggs',
            'description' => 'Delicious Chicken Weggs with a rich and savory flavor. Perfect for Lunch.',
            'image' => 'assets/img/menu-1.jpg',
            'price' => 300.00,
            'stock_quantity' => 60,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Pizza',
            'description' => 'Delicious Pizza with a crispy crust and a rich tomato sauce. Perfect for lunch or dinner.',
            'image' => 'assets/img/menu-2.jpg',
            'price' => 400.00,
            'stock_quantity' => 50,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Meat with fries',
            'description' => 'Delicious Meat with Fries with a savory flavor and a crispy texture. Perfect for lunch or dinner.',
            'image' => 'assets/img/menu-3.jpg',
            'price' => 450.00,
            'stock_quantity' => 70,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Meat Steak',
            'description' => 'Delicious Meat Steak with a juicy and tender texture. Perfect for lunch or dinner.',
            'image' => 'assets/img/menu-4.jpg',
            'price' => 520.00,
            'stock_quantity' => 80,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Chicken Biryani',
            'description' => 'Delicious Chicken Biryani with a rich and aromatic flavor. Perfect for lunch or dinner.',
            'image' => 'assets/img/menu-5.jpg',
            'price' => 600.00,
            'stock_quantity' => 90,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Chicken Karahi',
            'description' => 'Delicious Chicken Karahi with a spicy and tangy flavor. Perfect for lunch or dinner.',
            'image' => 'assets/img/menu-6.jpg',
            'price' => 700.00,
            'stock_quantity' => 65,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Tona Pizza',
            'description' => 'Delicious Tona Pizza with a crispy crust and a rich tomato sauce. Perfect for lunch or dinner.',
            'image' => 'assets/img/menu-7.jpg',
            'price' => 800.00,
            'stock_quantity' => 55,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Grilled Meat',
            'description' => 'Delicious Grilled Meat with a smoky flavor and a tender texture. Perfect for lunch or dinner.',
            'image' => 'assets/img/menu-8.jpg',
            'price' => 900.00,
            'stock_quantity' => 40,
            'category' => 'lunch',
        ]);
        Food::create([
            'name' => 'Spinach Artichoke Dip',
            'description' => 'Delicious Spinach Artichoke Dip with a creamy texture and a rich flavor. Perfect for dinner or as a snack.',
            'image' => 'assets/img/SpinachArtichokeDip.jpg',
            'price' => 200.00,
            'stock_quantity' => 50,
            'category' => 'dinner',
        ]);
        Food::create([
            'name' => 'peanut Butter Chicken Kabobs',
            'description' => 'Delicious Peanut Butter Chicken Kabobs with a savory and slightly sweet flavor. Perfect for dinner or as a snack.',
            'image' => 'assets/img/peanutchickenkabobs.jpg',
            'price' => 300.00,
            'stock_quantity' => 30,
            'category' => 'dinner',
        ]);
        Food::create([
            'name' => 'Honey Mustard Chicken Salad',
            'description' => 'Delicious Honey Mustard Chicken Salad with a tangy and slightly sweet dressing. Perfect for dinner or as a light meal.',
            'image' => 'assets/img/HoneyMustardChickenSalad.jpg',
            'price' => 400.00,
            'stock_quantity' => 45,
            'category' => 'dinner',
        ]);
        Food::create([
            'name' => 'Shrimp Scampi',
            'description' => 'Delicious Shrimp Scampi with a creamy and savory sauce. Perfect for dinner or as a light meal.',
            'image' => 'assets/img/DELICIOUS_Shrimp.jpg',
            'price' => 500.00,
            'stock_quantity' => 60,
            'category' => 'dinner',
        ]);
        Food::create([
            'name' => 'Cilantro Lime Chicken Thighs',
            'description' => 'Delicious Cilantro Lime Chicken Thighs with a zesty and refreshing flavor. Perfect for dinner or as a light meal.',
            'image' => 'assets/img/CilantroLimeChickenThighs.jpg',
            'price' => 600.00,
            'stock_quantity' => 70,
            'category' => 'dinner',
        ]);
        Food::create([
            'name' => 'Balsamic Chicken Salad',
            'description' => 'Delicious Balsamic Chicken Salad with a creamy and tangy dressing. Perfect for dinner or as a light meal.',
            'image' => 'assets/img/BalsamicChickenSalad.jpg',
            'price' => 700.00,
            'stock_quantity' => 55,
            'category' => 'dinner',
        ]);
        Food::create([
            'name' => 'BBQ Chicken Pinapple Kabobs',
            'description' => 'Delicious BBQ Chicken Pineapple Kabobs with a smoky and slightly sweet flavor. Perfect for dinner or as a snack.',
            'image' => 'assets/img/BBQChickenPineappleKabobs.jpg',
            'price' => 800.00,
            'stock_quantity' => 65,
            'category' => 'dinner',
        ]);
        Food::create([
            'name' => 'Chicken Quesadillas',
            'description' => 'Delicious Chicken Quesadillas with a crispy and savory filling. Perfect for dinner or as a snack.',
            'image' => 'assets/img/ChickenQuesadillas.jpg',
            'price' => 900.00,
            'stock_quantity' => 75,
            'category' => 'dinner',
        ]);
    }
}
