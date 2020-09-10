<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ["Snow White Tablets", "Luxcent luminous caps", "Glutax 4000gs", "GLUTATHIONE IV THERAPY", "Glutanex Day & Night Ki"];

        foreach ($brands as $brand) {
            Brand::create([
                'brand_name' => $brand,
                'brand_slug' => str_slug($brand),
                'top_brand'  => 1,
                'status'     => 1
            ]);
        }
    }
}
