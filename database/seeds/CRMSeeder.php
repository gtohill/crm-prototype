<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CRMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 4; $i++) {

            $company = new App\Company();

            $company->name = $faker->company;
            $company->address = $faker->streetAddress;
            $company->url = $faker->url;
            $company->city = $faker->city;
            $company->prov = $faker->state;
            $company->pc = $faker->postcode;
            $company->phone = $faker->tollFreePhoneNumber;
            $company->save();
            for ($j = 0; $j < 2; $j++) {
                $contact = new App\Contact();

                $contact->first_name = $faker->firstName;
                $contact->last_name = $faker->lastName;
                $contact->phone = $faker->tollFreePhoneNumber;
                $contact->email = $faker->email;
                $company->contacts()->save($contact);                

                for ($k = 0; $k < 2; $k++) {
                    if ($k == 0) {
                        $task = new App\Task();
    
                        $task->due_date = $faker->dateTimeBetween($startDate = 'now', $endDate = '1 years', $timezone = 'UTC');
                        $task->description = $faker->sentence($nbWords = 6, $variableNbWords = true);
                        $task->status = false;
                        
                        $company->tasks()->save($task);
                        $contact->tasks()->save($task);
                    }
                    $task = new App\Task();

                    $task->due_date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'UTC');
                    $task->description = $faker->sentence($nbWords = 6, $variableNbWords = true);
                    
                    $company->tasks()->save($task);
                    $contact->tasks()->save($task);
                }
            }
        }
    }
}
