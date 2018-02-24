---
extends: _layouts.post
title: লারাভেল ৫ এ flip/whoops প্যাকেজের ব্যবহার
date: '2014-11-03'
gist: কিভাবে flip/whoops প্যাকেজের ব্যবহার করবেন লারাভেল ৫-এ।
section: content
syntaxHighlight: true
---

**আপডেট**

> এই ব্লগটি প্রথমে যখন লেখা হয়েছিল, তখন লারাভেল ৫ রিলিজ হয় নি। রিলিজের পর দেখা গেল বেটা ভার্সনে লারাভেল যেভাবে এরর হ্যান্ডেল করতো তা পরিবর্তিত হয়েছে। এখানে নতুন উপায়ে কিভাবে হুপস প্যাকেজ ব্যবহার করতে পারবেন তা দেখানো হয়েছে।

প্রথমেই টার্মিনালে লিখুন-

```
composer require filp/whoops:~1.0
```

এরপর কম্পোজার আপডেট কমান্ড দিন।

এবার `app/Exceptions/Handler.php` ফাইলে যান এবং এই ক্লাসের `render()` মেথডটিকে নিচের মত করে এডিট করুন-

```
/**
 * Render an exception into an HTTP response.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Exception  $e
 * @return \Illuminate\Http\Response
 */
public function render($request, Exception $e)
{
    if ($this->isHttpException($e))
    {
        return $this->renderHttpException($e);
    }


    if (config('app.debug'))
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());

        return new \Illuminate\Http\Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }

    return parent::render($request, $e);
}
```

ব্যাস আপনার কাজ হয়ে গেছে। এবার আপনি আপনার এরর স্ক্রীনে হুপস দেখতে পারবেন।

**পুরনো পদ্ধতি**

আপনারা নিশ্চয়ই প্যাকেজিস্ট এর `flip/whoops` প্যাকেজের সাথে পরিচিত। এই প্যাকেজটিকে লারাভেল ৪.* এ ডিফল্ট এরর পেজ হিসেবে ব্যবহার করা হতো। কিন্তু লারাভেল ৫ এ এই প্যাকেজটিকে রিমুভ করা হয়েছে। যদিও আমি নিজে মনে করি এটি এখন পর্যন্ত পিএইচপির জন্য বেস্ট এরর দেখানোর প্যাকেজ। এটি আপনি চাইলে খুব সহজেই লারাভেল ৫ এ ফিরিয়ে আনতে পারেন।

আপনাকে প্রথমেই `composer.json` ফাইলটি আপডেট করতে হবে। আপনি এর `require-dev` অপশনে নিচের লাইনটি যুক্ত করুন-

```
"filp/whoops": "~1.0"
```

এবার আপনি টার্মিনালে লিখুন-

```
composer update
```

আপনি whoops প্যাকেজটি ডাউনলোড হওয়ার পর টার্মিনালে লিখুন-

```
php artisan make:provider ErrorServiceProvider
```

এই কমান্ডটি আপনার `app/Providers` ফোল্ডারে এরর সার্ভিস প্রোভাইডার নামে একটি ফাইল তৈরি করবে। আপনি সেই ফাইলটিকে নিচের মত করে এডিট করুন-

```
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
```

আপনার এরর সার্ভিস প্রোভাইডার তৈরি হয়ে গেছে। এবার একে রেজিস্টার করুন। এর জন্য `config/app.php` ফাইলের প্রোভাইডার এরেতে নিচের লাইনটি যুক্ত করুন-

```
'providers' => [
    ...,
    'App\Providers\ErrorServiceProvider',
],
```

ব্যাস, আপনি whoops প্যাকেজ লারাভেল ৫ এ ইন্টিগ্রেট করে ফেলেছেন। টেস্ট করার জন্য রাউট ফাইলে নিচের কোডটি লিখুন-

```
$router->get('/', function(){
    throw new \Exception('Whoops Test...');
});
```

এবার আপনি যদি আপনার রুট রাউট ভিজিট করেন তাহলে নিচের মত আউটপুট দেখতে পাবেন।

![Whoops](/images/posts/whoops.jpg)
