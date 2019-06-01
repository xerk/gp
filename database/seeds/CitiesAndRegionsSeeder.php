<?php
use App\Region;
use Illuminate\Database\Seeder;
use App\City;
class CitiesAndRegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            'Haram',
            'Fisal',
            'Omranya',
        ]);
        $collectionCairo = collect([
            'El marg',
            'El Salam',
            'El Salam Owel',
            'El Elnozha',
            'ein Shams',
            'Naser City',
        ]);
        City::create(['city' => 'Giza']);
        City::create(['city' => 'Cairo']);
        $city = City::where('city', 'Giza')->first();
        $cairo = City::where('city', 'Cairo')->first();
        $collection->each(function ($item, $key) use($city){
            // create permissions for each collection item
            Region::create([
                'city_id' => $city->id,
                'region' => $item]);
        });
        $collectionCairo->each(function ($item, $key) use($cairo){
            // create permissions for each collection item
            Region::create([
                'city_id' => $cairo->id,
                'region' => $item]);
        });
    }
}