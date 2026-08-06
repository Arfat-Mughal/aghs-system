<?php

namespace Database\Seeders;

use App\Models\BilalCenter\BikeModel;
use App\Models\BilalCenter\Brand;
use App\Models\BilalCenter\Category;
use App\Models\BilalCenter\Product;
use App\Models\BilalCenter\Supplier;
use Illuminate\Database\Seeder;

class BilalCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = collect([
            ['name' => 'Honda', 'country' => 'Japan'],
            ['name' => 'Yamaha', 'country' => 'Japan'],
            ['name' => 'Suzuki', 'country' => 'Japan'],
            ['name' => 'United', 'country' => 'Pakistan'],
            ['name' => 'Road Prince', 'country' => 'Pakistan'],
        ])->mapWithKeys(function ($brand) {
            return [$brand['name'] => Brand::firstOrCreate(['name' => $brand['name']], [
                'country' => $brand['country'],
                'status' => 'Active',
            ])];
        });

        $engine = Category::firstOrCreate(['name' => 'Engine', 'parent_id' => null]);
        $piston = Category::firstOrCreate(['name' => 'Piston', 'parent_id' => $engine->id]);
        $valve = Category::firstOrCreate(['name' => 'Valve', 'parent_id' => $engine->id]);
        $bearing = Category::firstOrCreate(['name' => 'Bearing', 'parent_id' => $engine->id]);

        $brake = Category::firstOrCreate(['name' => 'Brake', 'parent_id' => null]);
        $brakeShoe = Category::firstOrCreate(['name' => 'Brake Shoe', 'parent_id' => $brake->id]);
        $brakeCable = Category::firstOrCreate(['name' => 'Brake Cable', 'parent_id' => $brake->id]);

        $electrical = Category::firstOrCreate(['name' => 'Electrical', 'parent_id' => null]);
        $cdi = Category::firstOrCreate(['name' => 'CDI', 'parent_id' => $electrical->id]);
        $sparkPlug = Category::firstOrCreate(['name' => 'Spark Plug', 'parent_id' => $electrical->id]);

        $bikeModels = collect([
            ['company' => 'Honda', 'model' => 'CD70', 'year_from' => 2000, 'year_to' => null],
            ['company' => 'Honda', 'model' => 'CG125', 'year_from' => 1995, 'year_to' => null],
            ['company' => 'Yamaha', 'model' => 'YBR125', 'year_from' => 2010, 'year_to' => null],
            ['company' => 'Suzuki', 'model' => 'GS150', 'year_from' => 2005, 'year_to' => null],
            ['company' => 'Road Prince', 'model' => 'RP70', 'year_from' => 2008, 'year_to' => null],
        ])->mapWithKeys(function ($bike) {
            return [$bike['company'] . ' ' . $bike['model'] => BikeModel::firstOrCreate([
                'company' => $bike['company'],
                'model' => $bike['model'],
            ], [
                'year_from' => $bike['year_from'],
                'year_to' => $bike['year_to'],
            ])];
        });

        $supplier = Supplier::firstOrCreate(['name' => 'Al-Falah Auto Traders'], [
            'phone' => '0300-1234567',
            'address' => 'Bhano Chak, Wagha, Lahore',
            'status' => 'Active',
        ]);

        $products = [
            [
                'sku' => 'CLT-001',
                'shop_code' => 'A-101',
                'name_en' => 'Clutch Plate',
                'name_ur' => 'کلچ پلیٹ',
                'description' => 'Standard clutch plate set',
                'purchase_price' => 350,
                'selling_price' => 500,
                'stock' => 40,
                'unit' => 'Set',
                'brand' => 'Honda',
                'category' => $engine,
                'search_keywords' => 'clutch,plate,transmission',
                'aliases' => ['Cluch Plate', 'Clutch Disc'],
                'bike_models' => ['Honda CD70', 'Road Prince RP70'],
            ],
            [
                'sku' => 'BRK-SHO-001',
                'shop_code' => 'B-201',
                'name_en' => 'Brake Shoe',
                'name_ur' => 'بریک شو',
                'description' => 'Rear brake shoe set',
                'purchase_price' => 180,
                'selling_price' => 280,
                'stock' => 60,
                'unit' => 'Set',
                'brand' => 'Honda',
                'category' => $brakeShoe,
                'search_keywords' => 'brake,shoe,rear brake',
                'aliases' => ['Brak Shoe'],
                'bike_models' => ['Honda CD70', 'Honda CG125'],
            ],
            [
                'sku' => 'SPK-001',
                'shop_code' => 'C-301',
                'name_en' => 'Spark Plug',
                'name_ur' => 'سپارک پلگ',
                'description' => 'Standard spark plug',
                'purchase_price' => 60,
                'selling_price' => 100,
                'stock' => 100,
                'unit' => 'Piece',
                'brand' => 'Yamaha',
                'category' => $sparkPlug,
                'search_keywords' => 'plug,spark,ignition',
                'aliases' => ['Plug', 'Spar Plug'],
                'bike_models' => ['Yamaha YBR125', 'Suzuki GS150'],
            ],
            [
                'sku' => 'PIS-001',
                'shop_code' => 'A-102',
                'name_en' => 'Piston Kit',
                'name_ur' => 'پسٹن کٹ',
                'description' => 'Complete piston kit with rings',
                'purchase_price' => 900,
                'selling_price' => 1300,
                'stock' => 15,
                'unit' => 'Set',
                'brand' => 'Suzuki',
                'category' => $piston,
                'search_keywords' => 'piston,kit,rings,engine',
                'aliases' => ['Piston Set'],
                'bike_models' => ['Suzuki GS150'],
            ],
            [
                'sku' => 'CDI-001',
                'shop_code' => 'D-401',
                'name_en' => 'CDI Unit',
                'name_ur' => 'سی ڈی آئی یونٹ',
                'description' => 'Capacitor discharge ignition unit',
                'purchase_price' => 500,
                'selling_price' => 750,
                'stock' => 20,
                'unit' => 'Piece',
                'brand' => 'United',
                'category' => $cdi,
                'search_keywords' => 'cdi,ignition,electrical',
                'aliases' => ['CDI Box'],
                'bike_models' => ['Honda CD70', 'Road Prince RP70'],
            ],
        ];

        foreach ($products as $data) {
            $product = Product::firstOrCreate(['sku' => $data['sku']], [
                'shop_code' => $data['shop_code'],
                'name_en' => $data['name_en'],
                'name_ur' => $data['name_ur'],
                'description' => $data['description'],
                'purchase_price' => $data['purchase_price'],
                'selling_price' => $data['selling_price'],
                'stock' => $data['stock'],
                'unit' => $data['unit'],
                'brand_id' => $brands[$data['brand']]->id,
                'category_id' => $data['category']->id,
                'supplier_id' => $supplier->id,
                'search_keywords' => $data['search_keywords'],
                'status' => 'Active',
            ]);

            foreach ($data['aliases'] as $alias) {
                $product->aliases()->firstOrCreate(['alias' => $alias]);
            }

            $product->bikeModels()->sync(
                collect($data['bike_models'])->map(fn ($name) => $bikeModels[$name]->id)
            );
        }
    }
}
