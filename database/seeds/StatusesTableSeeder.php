<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    \DB::table('statuses')->insert([
    'name'    => 'Order Placed',
    'percent' => 10,
    ]);

    \DB::table('statuses')->insert([
    'name'    => 'Prep',
    'percent' => 30,
    ]);

    \DB::table('statuses')->insert([
    'name'    => 'Bake',
    'percent' => 50,
    ]);

    \DB::table('statuses')->insert([
    'name'    => 'Quality Check',
    'percent' => 70,
    ]);

    \DB::table('statuses')->insert([
    'name'    => 'Out for Delivery',
    'percent' => 100,
    ]);
  }
}
