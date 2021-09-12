<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AffiliateController;

class DistanceTest extends TestCase
{
    /**
     * Check is our imlplementation of the Haversine formula correct when compared to google maps values
     * @return void
     */
    public function test_example()
    {
        # use hardcoded data (first item in afiliates file) to determine correct proximity from home
        $controller = new AffiliateController();
        
        # spin up an instance of our controller and use test values as argument
        $distance = $controller->get_distance_from_home([
            "longitude" => -6.043701,
            "latitude" => 52.986375
        ]);

        # check is the distance correct to google maps value, as the crow flies (roughly 41 km)
        $within_error_theshold = False;
        if ($distance > 41 && $distance < 42){
            $within_error_theshold = True;
        }

        # assert if the distance value is within threshold
        $this->assertTrue($within_error_theshold);
    }
}
