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


        Company::create([
            "name" => 'UserGems',
            "linkedin_url" => "https://www.linkedin.com/company/usergems/",
            "employees" => 60,
        ]);

        Attendee::create([
            "email" => 'stephan@algolia.com',
            "first_name" => "Stephan",
            "last_name" => "Lastname",
            "avatar" => "https://media-exp1.licdn.com/dms/image/C4D03AQHPUFYhbLcAqw/profile-displayphoto-shrink_200_200/0/1516239694635?e=1664409600&v=beta&t=xmiukyVVGR6edLzuNnkBjA0vzfvEg-COOCmcKIjDcGk",
            "title" => "GTM Chief of Staff",
            "linkedin_url" => "https://www.linkedin.com/in/stephanusergems",
            "company_id" => 1,
            "last_updated" => new DateTime(),
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
