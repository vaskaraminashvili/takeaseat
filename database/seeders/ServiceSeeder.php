<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure required related records exist
        $businessId = 1;
        $staffIds = \App\Models\Staff::pluck('id')->toArray();
        $ladiesCategory = Category::where('name', 'პროცედურები ქალბატონებისთვის')->first();
        $menCategory = Category::where('name', 'პროცედურები მამაკაცებისათვის')->first();
        $injectionCategory = Category::where('name', 'ინექციური კოსმეტოლოგიის პროცედურები ქალბატონებისათვის')->first();
        $apparatusCategory = Category::where('name', 'აპარატურული კოსმეტოლოგიის პროცედურები')->first();
        if (! $ladiesCategory || ! $menCategory || ! $injectionCategory || ! $apparatusCategory || empty($staffIds)) {
            throw new \Exception('Required related records (categories or staff) are missing. Please seed businesses, staff, and categories first.');
        }

        // Ladies Services
        $ladiesServices = [
            'სახის კანის ზედაპირული წმენდა',
            'სახის კანის ღრმა წმენდა აპარატით',
            'მეზო პროცედურა ნემსის გარეშე',
            'დამატენიანებელი ნიღბები',
            'დამატენიანებელი ნიღბები და პილინგი',
            'პილინგი/პრობლემური კანისთვის',
            'პილინგი/ცხიმიანი კანისთვის',
            'პილინგი/მშრალი კანისთვის',
            'პილინგი/მარჯნის',
            'ზედაპირული პილინგი',
        ];
        foreach ($ladiesServices as $index => $title) {
            $service = Service::create([
                'business_id' => $businessId,
                'category_id' => $ladiesCategory->id,
                'name' => $title,
                'sort_order' => $index + 1,
                'description' => 'test',
                'status' => StatusEnum::ACTIVE,
            ]);
            $service->staff()->attach($staffIds[array_rand($staffIds)], ['price' => 50.00]);
        }
        // Men Services
        $menServices = [
            'სახის კანის ზედაპირული წმენდა',
            'სახის კანის ღრმა წმენდა აპარატით',
            'მეზო პროცედურა ნემსის გარეშე',
            'დამატენიანებელი ნიღბები',
            'დამატენიანებელი ნიღბები და პილინგი',
            'პილინგი/პრობლემური კანისთვის',
            'პილინგი/ცხიმიანი კანისთვის',
            'პილინგი/მშრალი კანისთვის',
            'პილინგი/მარჯნის',
            'ზედაპირული პილინგი',
        ];
        foreach ($menServices as $index => $title) {
            $service = Service::create([
                'status' => StatusEnum::ACTIVE,
                'business_id' => $businessId,
                'category_id' => $menCategory->id,
                'name' => $title,
                'description' => 'test',
                'sort_order' => $index + 1,
            ]);
            $service->staff()->attach($staffIds[array_rand($staffIds)], ['price' => 60.00]);
        }

        // Injection Services (first 10 as example)
        $injectionServices = [
            'ტუჩის ფილერი (NEORAMIS - კორეა)',
            'ტუჩის ფილერი (E.P.T.Q. - კორეა)',
            'ტუჩის ფილერი (DIVES - გერმანია)',
            'ტუჩის ფილერი (INFINI - იტალია)',
            'ტუჩის ფილერი (TEOSYAL - საფრანგეთი)',
            'ტუჩის კორექცია (JUVIDER - საფრანგეთი)',
            'ტუჩის კორექცია (STYLAGE - საფრანგეთი)',
            'ყვრიმალის ფილერი (NEORAMIS - კორეა)',
            'ყვრიმალის ფილერი (E.P.T.Q. - კორეა)',
            'ყვრიმალის ფილერი (INFINI - იტალია)',
        ];
        foreach ($injectionServices as $index => $title) {
            $service = Service::create([
                'status' => StatusEnum::ACTIVE,
                'business_id' => $businessId,
                'category_id' => $injectionCategory->id,
                'name' => $title,
                'description' => 'test',
                'sort_order' => $index + 1,
            ]);
            $service->staff()->attach($staffIds[array_rand($staffIds)], ['price' => 150.00]);
        }

        // Apparatus Services (first 10 as example)
        $apparatusServices = [
            'ცივი პლაზმა (მთლიანი სახე)',
            'ცივი პლაზმა (თვალი/2 ქუთუთო)',
            'ცივი პლაზმა (ცხვირტუჩის 2 ნაოჭი)',
            'ცივი პლაზმა (შუბლი)',
            'ცივი პლაზმა (ლოყები)',
            'ცივი პლაზმა (ღაბაბი)',
            'ცივი პლაზმა (ყელი)',
            'ცივი პლაზმა (ხელის მტევანი)',
            'ცივი პლაზმა (დეკოლტე)',
            'ცივი პლაზმა/სტრიების მოცილება (მუცელი, ფეხები, დუნდულები)',
        ];
        foreach ($apparatusServices as $index => $title) {
            $service = Service::create([
                'status' => StatusEnum::ACTIVE,
                'business_id' => $businessId,
                'category_id' => $apparatusCategory->id,
                'name' => $title,
                'description' => 'test',
                'sort_order' => $index + 1,
            ]);
            $service->staff()->attach($staffIds[array_rand($staffIds)], ['price' => 200.00]);
        }
    }
}
