<?php

namespace TingFeng\BlogCategory;

use RainLab\Blog\Controllers\Categories;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = ['RainLab.Blog'];

    public function pluginDetails()
    {
        return [
            'name' => 'BlogCategory',
            'description' => "Blog Category Seo",
            'author' => "TingFeng",
            'icon' => 'icon-leaf'
        ];
    }

    public function boot()
    {
        Categories::extendFormFields(function ($widget, $model, $context) {
            if (! $model instanceof \Rainlab\Blog\Models\Category) {
                return;
            }

            $widget->addFields([
                "tingfeng_blogcategory_title" => [
                    "label" => "tingfeng.blogcategory::lang.title_label",
                    "placeholder" => "tingfeng.blogcategory::lang.title_placeholder",
                    "span" => "left",
                    "type" => "mltext",
                  ],
                "tingfeng_blogcategory_keywords" => [
                    "label" => "tingfeng.blogcategory::lang.keywords_label",
                    "placeholder" => "tingfeng.blogcategory::lang.keywords_placeholder",
                    "span" => "right",
                    "type" => "mltext",
                ]
            ]);
        });
    }
}
