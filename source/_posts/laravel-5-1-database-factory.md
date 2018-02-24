---
extends: _layouts.post
title: Laravel 5.1 Database Factory
date: '2015-05-29'
gist: 'What is database factory, how to use it?'
section: content
syntaxHighlight: true
---

Earlier versions of laravel comes with a system for seeding dummy data on database. Traditionaly you just create a class extending laravel's DatabaseSeeder class. This would look like this-

```
<?php

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10);
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
```

Then you can run this command for seed in database-

```
php artisan db:seed
```

Instead of using creating query builder, you could also called eloquent. In that case, run method will look like this-

```
public function run(){
    \App\User::create([
        'name' => str_random(10);
        'email' => str_random(10).'@gmail.com',
        'password' => bcrypt('secret'),
    ]);
}
```

You could also use a package called faker with it. Faker will generate bunch of different things automatically for you like- name, email, phone number, paragraph, sentence, date and much more. In that case UserTableSeeder class will look like this-

```
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => $faker->name;
            'email' => $faker->email,
            'password' => bcrypt('secret'),
        ]);
    }
}
```

For more entry you could use loop and each time faker would create different entry for you.

But using laravel's new feature model factory, this could be much more simpler. Take a look-

```
class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory('App\User', 50)->create();
    }
}
```

Couldn't be much simpler than that, right? You could also use make method that will create users, but won't persist them in database. This method is very helpful for testing. Let talk them another day, as it is out of scope of today's topic.

Now you could wonder, how laravel knows that we should create 50 users, and how it also know the database schema and what to seed? I think if you already noticed that laravel 5.1 comes with a new folder called factory in database folder and by default there is a file called ModelFactory. Let's look at this file-

```
$factory->define('App\User', function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
```

Here we see, laravel creates a factory defination for App\User model and it passes a faker object, that we use earlier. We could also create other defination and also create another file in this directory. But if you create new file, you should run this command-

```
composer dump-autoload
```

This needed to be done because in version 5.1 laravel autoload database folder with classmap. You could take a look composer.json file.

Happy coding...
