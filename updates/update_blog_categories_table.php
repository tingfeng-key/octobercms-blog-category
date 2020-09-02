<?php
namespace Tingfeng\BlogCategory\Updates;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class UpdateBlogCategoriesTable extends Migration
{

    public function up()
    {
        if (Schema::hasTable("rainlab_blog_categories")) {
            if (!Schema::hasColumn("rainlab_blog_categories", "title")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->string("title")->before("description")->nullable();
                });
            }
            if (!Schema::hasColumn("rainlab_blog_categories", "keywords")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->string("keywords")->after("title")->nullable();
                });
            }
        }
    }

    public function down()
    {
        if (Schema::hasTable("rainlab_blog_categories")) {
            if (Schema::hasColumn("rainlab_blog_categories", "title")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->dropColumn("title");
                });
            }
            if (Schema::hasColumn("rainlab_blog_categories", "keywords")) {
                Schema::table("rainlab_blog_categories", function (Blueprint $table) {
                    $table->dropColumn("keywords");
                });
            }
        }
    }

}