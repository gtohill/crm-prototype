<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CRMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = DB::table('users')->insert([
            'name' => 'demo',
            'email' => 'demo@localhost.com',
            'password' => Hash::make('PD153328@!'),
        ]);
        

        // create companies
        for ($i = 0; $i < 10; $i++) {

            $company = new App\Company();
            $company->user_id = 1;
            $company->name = $faker->company;
            $company->address = $faker->streetAddress;
            $company->url = $faker->domainName;
            $company->city = $faker->city;
            $company->prov = $faker->state;
            $company->pc = $faker->postcode;
            $company->phone = $faker->tollFreePhoneNumber;
            $company->save();
            
            // create contact for each company
            for ($j = 0; $j < mt_rand(2, 8); $j++) {
                $contact = new App\Contact();

                $contact->user_id = 1;
                $contact->first_name = $faker->firstName;
                $contact->last_name = $faker->lastName;
                $contact->phone = $faker->tollFreePhoneNumber;
                $contact->email = $faker->email;
                $company->contacts()->save($contact);                

                // create tasks for each contact
                for ($k = 0; $k < mt_rand(2, 6); $k++) {
                    if ($k == 0) {
                        $task = new App\Task();
    
                        $task->user_id = 1;
                        $task->due_date = $faker->dateTimeBetween($startDate = 'now', $endDate = '1 years', $timezone = 'America/New_York');
                        $task->description = $faker->sentence($nbWords = 6, $variableNbWords = true);
                        $task->status = false;
                        
                        $company->tasks()->save($task);
                        $contact->tasks()->save($task);
                    }
                    $task = new App\Task();

                    $task->user_id = 1;
                    $task->due_date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'America/New_York');
                    $task->description = $faker->sentence($nbWords = 6, $variableNbWords = true);
                    
                    $company->tasks()->save($task);
                    $contact->tasks()->save($task);
                }
            }
        }
    }
}
