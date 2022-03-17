<?php

namespace Joy\VoyagerBreadPdfTemplate\Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerBreadPdfTemplate\Models\PdfTemplate;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->dataTypesTranslations();
        $this->pdfTemplatesTranslations();
        $this->menusTranslations();
    }

    /**
     * Auto generate Categories Translations.
     *
     * @return void
     */
    private function pdfTemplatesTranslations()
    {
        // Adding translations for 'pdf_templates'
        //
        $cat = PdfTemplate::where('name', 'pdf-template-1')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['pdf_templates', 'name'], $cat->id), 'pdf-template-1');
            $this->trans('pt', $this->arr(['pdf_templates', 'description'], $cat->id), 'PdfTemplate 1');
        }
        $cat = PdfTemplate::where('name', 'pdf-template-2')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['pdf_templates', 'name'], $cat->id), 'pdf-template-2');
            $this->trans('pt', $this->arr(['pdf_templates', 'description'], $cat->id), 'PdfTemplate 2');
        }
    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        
        $dtp = DataType::where($_fld, __('joy-voyager-bread-pdf-template::seeders.data_types.category.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'PdfTemplate');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, __('joy-voyager-bread-pdf-template::seeders.data_types.category.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'PdfTemplates');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl = ['menu_items', 'title'];
        $_item = $this->findMenuItem(__('joy-voyager-bread-pdf-template::seeders.menu_items.pdf_templates'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'PdfTemplates');
        }
    }

    private function findMenuItem($title)
    {
        return MenuItem::where('title', $title)->firstOrFail();
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
