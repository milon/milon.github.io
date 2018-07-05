---
extends: _layouts.post
title: Upgrading a project from Laravel 5.0 to 5.1
date: '2015-06-11'
gist: Complete guideline to upgrade a Laravel 5.0 project to Laravel 5.1
section: content
syntaxHighlight: true
categories: []
---

Laravel just released it's first LTS relase two days back. I was very excited about this release and can't wait to upgrade my existing project to the latest version.

I have just updated a laravel 5.0 project to laravel 5.1\. It was quiet a big project around 10 thousand line and 6 people working it. It was on latest iteration on laravel 5.0 branch which is 5.0.33\. It's a fairly simple task and took around 50 minutes. Let's get started.

**Take Backup**

At first take a backup of your existing project so that if anything goes wrong you could restore. If you are using git you could make a different brunch of your update-

```
git checkout -b update
```

**Update bootstrap/autoload.php file**

Previouslycompiled file was in `/storage/framework` directory but in 5.1 it is in `/bootstrap/autoload` directory. So, change the `$compiledPath` variable to this-

```
$compiledPath = __DIR__.'/cache/compiled.php';
```

**Create bootstrap/cache directory**

Then create `bootstrap/cache` directory and give write permission to it, becasue laravel will put it's `compiled.php`, `routes.php`, `config.php`, and `services.json` file in it. To do this run below command to console-

```
sudo chmod 755 -R bootstrap/cache
```

Then create a .gitignore file in this directory and put following content in it-

```
*
!.gitignore
```

**Authentication**

If you are not using laravel's default authentication scaffold then leave this section. If you are using then at first go to `app/Http/Controllers/Auth/AuthController.php` file. At first remove two dependencies from the controller. Then go to `app/Services/Registrar.php` file and copy validator and create method from it and paste it to `AuthController`. Then also import `App\User` and `Illuminate\Support\Facade\Validator` at the top of this class. After that delete `Registrar` class entirely. After doing all those things `AuthController` will be look like this-

```
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;


    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
```

Also remove the dependency from PasswordController's constructor method. Those are no longer needed.

**Validation**

If you don't override any of the default validator method then you are good to go to the next section. If you do override `formatValidationErrors` method on your `BaseController` class then typehint `Illuminate\Contracts\Validation\Validator` class to the instead of create an instance of `Illuminate\Validation\Validator` class.

Do the same thing for `formatErrors` method also. Typehint `Illuminate\Contracts\Validation\Validator` class instead of create an instance of `Illuminate\Validation\Validator` class.

**Eloquent**

Eloquent's create method now can applied with no parameter. So, If you are overriding this class, make sure you pass an empty array as a default parameter to this method. This will be look like this-

```
public static function create(array $attributes = [])
{
    // Your custom implementation
}
```

If you are overriding the find method in your own models and calling parent::find() within your custom method, you should now change it to call the find method on the Eloquent query builder. This will look like this-

```
public static function find($id, $columns = ['*'])
{
    $model = static::query()->find($id, $columns);

    // ...

    return $model;
}
```

**Date Formatting**

In 5.0 you could change the format of storage of date field by override `getDateFormat` method. This is still applicble but you could also use the more cleaner way to do this. Simply specify a `$dateFormat` property to the model declaring the fields you want in date format and you are good to go.

This is also applied for serializing model to array or JSON. You can override `serializeDate(DateTime $date)` method to do this.

**The Collection Class**

I use the collection class a lot, I think you also do, as eloquent and query builder returns collection.

Previously the sort method modify the existing collection. But from 5.1 it will return a completely new instance of collection. Take a look-

```
$collection = $collection->sortBy('name');
```

The groupBy method now returns an instance of collection for each of it's item. You could map over the collection for getting previous format-

```
$collection->groupBy('type')->map(function($item)
{
    return $item->all();
});
```

`lists` method now return collection instead of array. To get array form that-

```
$collection->lists('id')->all();
```

**Commands & Handlers**

`Commands` are now renamed to `Jobs` and `Handlers` are now renamed to `Listeners`. But This change is backward compatible. So, you are good to go without modifying it, but my suggesstion is rename the files and fix namespaces for your commands and events classes.

**Tests**

Just add a protected `$baseUrl` property to `App\TestCase` class and you are good to go.

```
protected $baseUrl = 'http://localhost:8000';
```

**Amazon Web Services SDK**

If you are using amazon web service then update you sdk by defining the version to `composer.json` file and do a `composer update`.

```
"league/flysystem-aws-s3-v3": "~1.0"
```

**Update**

After doing all these things go to `composer.json` file and change the require object like this-

```
"require": {
    "php": ">=5.5.9",
    "laravel/framework": "5.1.*"
},
"require-dev": {
    "fzaninotto/faker": "~1.4",
    "mockery/mockery": "0.9.*",
    "phpunit/phpunit": "~4.0",
    "phpspec/phpspec": "~2.1"
},
```

Then run following two command to the console-

```
composer update
composer dump-autoload -o
```

**Depredations**

There are also some depredations with the release of 5.1\. You should take a look at release guide section at the documentation and fix it gradually. This will be removed on Laravel 5.2 which will be released on December, 2015.

Happy Coding...
