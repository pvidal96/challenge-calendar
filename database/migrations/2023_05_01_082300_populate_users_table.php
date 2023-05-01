<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::insert([
            [
                'email' => 'stephan@usergems.com',
                'first_name' => 'Stephan',
                'calendar_token' => '7S$16U^FmxkdV!1b',
            ],
            [
                'email' => 'christian@usergems.com',
                'first_name' => 'Christian',
                'calendar_token' => 'Ay@T3ZwF3YN^fZ@M',
            ],
            [
                'email' => 'joss@usergems.com',
                'first_name' => 'Joss',
                'calendar_token' => 'PK7UBPVeG%3pP9%B',
            ],
            [
                'email' => 'blaise@usergems.com',
                'first_name' => 'Blaise',
                'calendar_token' => 'c0R*4iQK21McwLww',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::whereIn('email', [
            'stephan@usergems.com',
            'christian@usergems.com',
            'joss@usergems.com',
            'blaise@usergems.com',
        ])->delete();
    }
};
