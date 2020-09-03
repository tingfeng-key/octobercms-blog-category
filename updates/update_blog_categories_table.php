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
            if (!Schema::hasColumn("rainlab_blog_categories", "tingfeng_blogcategory_title")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->string("tingfeng_blogcategory_title")->before("description")->nullable();
                });
            }
            if (!Schema::hasColumn("rainlab_blog_categories", "tingfeng_blogcategory_keywords")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->string("tingfeng_blogcategory_keywords")->after("tingfeng_blogcategory_title")->nullable();
                });
            }
        }
    }

    public function down()
    {
        if (Schema::hasTable("rainlab_blog_categories")) {
            if (Schema::hasColumn("rainlab_blog_categories", "tingfeng_blogcategory_title")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->dropColumn("tingfeng_blogcategory_title");
                });
            }
            if (Schema::hasColumn("rainlab_blog_categories", "tingfeng_blogcategory_keywords")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->dropColumn("tingfeng_blogcategory_keywords");
                });
            }
        }
    }

}
