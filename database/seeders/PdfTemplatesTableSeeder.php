<?php

namespace Joy\VoyagerBreadPdfTemplate\Database\Seeders;

use Joy\VoyagerBreadPdfTemplate\Models\PdfTemplate;
use Illuminate\Database\Seeder;

class PdfTemplatesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (PdfTemplate::query()->count() > 0) {
            return false;
        }

        $count = 20;
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
