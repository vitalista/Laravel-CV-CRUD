<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $tables = ['application', 'cvs', 'education'];

    public function up(): void
    {
       

        foreach ($this->tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $table) {
                    $table->softDeletes();  
                });
            }
        }
    }

   
    public function down(): void
    {
        foreach ($this->tables as $table) {
           
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $table) {
                    $table->dropSoftDeletes();  
                });
            }
        }
    }
};
