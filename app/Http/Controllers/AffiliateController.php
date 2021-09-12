<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AffiliateController extends Controller
{
    /**
    * Retrieve users who are within 100km proximity of Dublin office
    */
    public function get_affiliates_in_proximity () 
    {
        # create placeholder array for valid items
        $affiliates = array();

        # retrieve text file and convert to array, one item per line 
        $array = explode("\n", file_get_contents(storage_path("app/demo/affiliates.txt")));

        # iterate through each item
        foreach ($array as $affiliate) {

            # create an Affilate object from this array item (note: this does not require SQL database)
            $item = new Affiliate(json_decode($affiliate, true));

            # find the affiliates distance from home
            $item->proximity = $this->get_distance_from_home($item);

            # if distance from home is less than 100, include in final array
            if ($item->proximity < 100) {
                array_push($affiliates, $item);
            }
        }

        # sort items by affiliate_id
        $collection = collect($affiliates)->sortBy('affiliate_id');

        # return answers to layout page
        return view('layout')->with('affiliates', $collection);
    }
    
    /**
    * Get this users proximity from Dublin office
    * @param Affiliate $affiliate generated from provided .txt data file
    */
    public function get_distance_from_home ($affiliate) 
    {
        # use hardcoded data (first item in afiliates file) to determine correct proximity from home
        $latFrom = deg2rad($affiliate['latitude']);
        $lonFrom = deg2rad($affiliate['longitude']);

        # retrive global values (for home coordinates and earth radius)
        $latTo = deg2rad(config('demo.HOME_LATTITUDE'));
        $lonTo = deg2rad(config('demo.HOME_LONGITUDE'));

        # create delta values
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        
        # apply the Haversine formula (help @ https://stackoverflow.com/questions/14750275/haversine-formula-with-php)
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        $distance = $angle * config('demo.EARTH_RADIUS');

        return $distance;
    }
}
