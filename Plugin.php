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
                "tingfeng_category_title" => [
                    "label" => "标题",
                    "placeholder" => "输入标题",
                    "span" => "left",
                    "type" => "mltext",
                  ],
                "tingfeng_category_keywords" => [
                    "label" => "关键字",
                    "placeholder" => "输入关键字",
                    "span" => "right",
                    "type" => "mltext",
                ]
            ]);
        });
    }
}
