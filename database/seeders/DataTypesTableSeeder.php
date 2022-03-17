<?php

namespace Joy\VoyagerBreadPdfTemplate\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'pdf-templates');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'pdf_templates',
                'display_name_singular' => __('joy-voyager-bread-pdf-template::seeders.data_types.pdf_template.singular'),
                'display_name_plural'   => __('joy-voyager-bread-pdf-template::seeders.data_types.pdf_template.plural'),
                'icon'                  => 'voyager-bread',
                'model_name'            => 'Joy\\VoyagerBreadPdfTemplate\\Models\\PdfTemplate',
                // 'policy_name'           => 'Joy\\VoyagerBreadPdfTemplate\\Policies\\PdfTemplatePolicy',
                // 'controller'            => 'Joy\\VoyagerBreadPdfTemplate\\Http\\Controllers\\VoyagerBreadPdfTemplateController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
