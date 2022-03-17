<?php

namespace Joy\VoyagerBreadPdfTemplate\Database\Seeders;

use Joy\VoyagerBreadPdfTemplate\Models\PdfTemplate;
use Illuminate\Database\Seeder;

class DummyPdfTemplatesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        PdfTemplate::factory()
            ->count($count)
            ->state(function (array $attributes) use ($count) {
                return [
                    'name' => 'PdfTemplate ' . time()
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count),
                    'description' => 'PdfTemplate Description ' . time()
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                ];
            })
            ->create();
    }
}
