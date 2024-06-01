<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Inserting data using migration
        DB::table('user')->insert([
            'name' => 'Abhishek ',
            'email' => 'abhishekfd@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('user')->insert([
            'name' => 'pooja Shekhawat',
            'email' => 'pooja@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);

        // Updating user data using migration 
        DB::table('user')
            ->where('id', 1)
            ->update(['name' => 'Nidhi', 'email' => 'nidhi12@gmail.com']);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            DB::table('user')
            ->where('id', 1)
            ->update(['name' => 'Atul Singh', 'email' => 'atulshekhawat21@gmail.com']);

            
        // Delete user data
        DB::table('user')
            ->where('id', 2)
            ->delete();
    }
};
