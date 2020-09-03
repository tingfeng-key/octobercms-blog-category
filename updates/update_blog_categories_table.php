<?php
namespace TingFeng\BlogCategory\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class UpdateBlogCategoriesTable extends Migration
{

    public function up()
    {
        if (Schema::hasTable("rainlab_blog_categories")) {
            if (!Schema::hasColumn("rainlab_blog_categories", "tingfeng_category_title")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->string("tingfeng_category_title")->before("description")->nullable();
                });
            }
            if (!Schema::hasColumn("rainlab_blog_categories", "tingfeng_category_keywords")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->string("tingfeng_category_keywords")->after("tingfeng_category_title")->nullable();
                });
            }
        }
    }

    public function down()
    {
        if (Schema::hasTable("rainlab_blog_categories")) {
            if (Schema::hasColumn("rainlab_blog_categories", "tingfeng_category_title")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->dropColumn("tingfeng_category_title");
                });
            }
            if (Schema::hasColumn("rainlab_blog_categories", "tingfeng_category_keywords")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->dropColumn("tingfeng_category_keywords");
                });
            }
        }
    }

}
