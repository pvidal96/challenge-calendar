<?php

use App\Models\Attendee;
use App\Models\Company;
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
        
        Company::create([
            "name" => 'UserGems',
            "linkedin_url" => "https://www.linkedin.com/company/usergems/",
            "employees" => 60,
        ]);

        User::insert([
            [
                'email' => 'stephan@usergems.com',
                'first_name' => 'Stephan',
                'calendar_token' => '7S$16U^FmxkdV!1b',
                "company_id" => 1,
            ],
            [
                'email' => 'christian@usergems.com',
                'first_name' => 'Christian',
                'calendar_token' => 'Ay@T3ZwF3YN^fZ@M',
                "company_id" => 1,
            ],
            [
                'email' => 'joss@usergems.com',
                'first_name' => 'Joss',
                'calendar_token' => 'PK7UBPVeG%3pP9%B',
                "company_id" => 1,
            ],
            [
                'email' => 'blaise@usergems.com',
                'first_name' => 'Blaise',
                'calendar_token' => 'c0R*4iQK21McwLww',
                "company_id" => 1,
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
