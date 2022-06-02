# Project as part of application for Software Developer positon

Notable files 
- AffiliateController.php (main controller)
- Affiliate.php (Model for Affiliate)
- layout.blade.php (main page)
- demo.php (contant variables)
- web.php (routing for page content)
- DistanceTest.php (test the Affiliate controller, single test of great-circle distance formula)

## Run the project
-php artisan serve

## Testing
-php artisan test

## Specification

We have a shortlist of affiliate contact records in a text file (affiliates.txt) -- one affiliate per line, JSON-encoded. We want to invite any affiliate that lives within 100km of our Dublin office for some food and drinks using this text file as the input (Don't alter). Write a program that will read the full list of affiliates from this txt file and output the name and affiliate ids of matching affiliates (within 100km), sorted by Affiliate ID (ascending).

You can use the first formula from this [Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance. Don't forget, you'll need to convert degrees to radians.

The GPS coordinates for our Dublin office are 53.3340285, -6.2535495.

You can find the affiliate list in this repository called affiliates.txt.

Please don’t forget, your code should be production ready, clean and tested!

### Nice to haves:
- Demonstrate understanding of MVC
- Unit Tests
- Basic HTML output
- Usage of a PHP Framework (Not necessary but as a Laravel based company it's a bonus)
- Use original txt file as input
