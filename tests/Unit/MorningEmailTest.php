<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\MorningEmailService;
use Tests\TestCase;

class MorningEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_prepare_morning_email()
    {
        $hardcoded = '[{"title":"UserGems x Algolia","start":"2022-06-25 10:00:00","end":"2022-06-25 12:00:00","attending":1,"attending_same_company":{"Stephan":1},"companies":{"2":{"name":"Algolia","linkedin_url":"https:\/\/www.linkedin.com\/company\/algolia","employees":700,"attendees":[{"name":"Demi Malnar","avatar":"https:\/\/media-exp1.licdn.com\/dms\/image\/C4D03AQHPUFYhbLcAqw\/profile-displayphoto-shrink_200_200\/0\/1516239694635?e=1664409600&v=beta&t=xmiukyVVGR6edLzuNnkBjA0vzfvEg-COOCmcKIjDcGk","title":"GTM Chief of Staff","linkedin_url":"https:\/\/www.linkedin.com\/in\/demimalnar","accepted":1},{"name":"Joshua Mateer","avatar":"https:\/\/media-exp1.licdn.com\/dms\/image\/C5603AQGb0ATcWHnC6A\/profile-displayphoto-shrink_200_200\/0\/1630336547843?e=1664409600&v=beta&t=8w4kVvRAR7auRV5NSMVG9afPKAaO2Axe_K2FT9FQwfI","title":"Sr Manager, Marketing Operations and Technology","linkedin_url":"https:\/\/www.linkedin.com\/in\/josh-mateer-37615665","accepted":1},{"name":"Aletta Noujaim","avatar":"https:\/\/media-exp1.licdn.com\/dms\/image\/C4E03AQFXfKcuS0FqOA\/profile-displayphoto-shrink_200_200\/0\/1640522676592?e=1664409600&v=beta&t=hIPnQK0pL16Re1gizVvSpVIbFIO8ZBx6n2PfXazjVXA","title":"Director of Sales Development, EMEA & emerging markets","linkedin_url":"https:\/\/www.linkedin.com\/in\/alettamarce","accepted":1}]}}}]';
        $user = User::where('id', 2)->first();

        $email = MorningEmailService::getInstance()->prepareEmail($user);

        $this->assertTrue($email->content == $hardcoded);
    }
}
