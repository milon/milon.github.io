---
extends: _layouts.post
title: লারাভেল ৫ এ প্যাকেজ ডেভেলপমেন্ট
date: '2015-03-23'
gist: কিভাবে লারাভেল ৫ ফ্রেমওয়ার্কের জন্য প্যাকেজ তৈরি করবেন তার বিস্তারিত।
section: content
---

লারাভেল ৪.* এ `"illuminate/workbench"` প্যাকেজ ব্যবহার করে খুব সহজেই আমরা লারাভেলের জন্য প্যাকেজ ডেভেলপ করতে পারতাম। কিন্তু লারাভেল ৫ এ সেটিকে লারাভেলের কোর থেকে বাদ দেয়া হয়েছে। আসলে টেইলর অটোয়েল(লারাভেলের জনক) মনে করেন, প্যাকেজগুলো ফ্রেমওয়ার্ক ইন্ডিপেন্ডেন্ট হওয়া জরুরী। তাই তিনি এ প্যাকেজটিকে লারাভেলের কোর থেকে বাদ দিয়েছেন। তবে আমরা চাইলে এ প্যাকেজটি ব্যবহার করে খুব সহজেই লারাভেল ৫ এর জন্য প্যাকেজ তৈরি করতে পারি।

এরজন্য প্রথমেই যা করতে হবে সেটি হচ্ছে লারাভেল ইনস্টলের পর `"illuminate/workbench"` প্যাকেজের `"dev-develop"` ব্রাঞ্চটিকে আপনার প্রজেক্টে পুল-ইন করে নিতে হবে। এটি করতে আপনি কম্পোজার ফাইলের রিকোয়ার অংশে নিচের লাইনটি যুক্ত করুন-

```
"require": {
    "laravel/framework": "5.0.*",
    "illuminate/workbench": "dev-master"
},
```

এরপর টার্মিনালে নিচের কমান্ডটি দিন-

```
composer update
```

এরপর `config/app.php` ফাইলের `providers` এরেতে নিচের লাইনটি যুক্ত করতে হবে-

```
'providers' => [
    ...,
    'Illuminate\Workbench\WorkbenchServiceProvider',
]
```

এবার আপনার প্রজেক্টের কনফিগ ডিরেক্টরিতে workbench.php নামে একটি নতুন ফাইল তৈরি করুন এবং সে ফাইলটিতে নিচের অংশটুকু যুক্ত করে দিন-

```
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Workbench Author Name
    |--------------------------------------------------------------------------
    |
    | When you create new packages via the Artisan "workbench" command your
    | name is needed to generate the composer.json file for your package.
    | You may specify it now so it is used for all of your workbenches.
    |
    */
    'name' => '',
    /*
    |--------------------------------------------------------------------------
    | Workbench Author E-Mail Address
    |--------------------------------------------------------------------------
    |
    | Like the option above, your e-mail address is used when generating new
    | workbench packages. The e-mail is placed in your composer.json file
    | automatically after the package is created by the workbench tool.
    |
    */
    'email' => '',
];
```

এই ফাইলের নাম এবং পাসওয়ার্ড অংশে প্যাকেজ রাইটারের নাম এবং ইমেইল এড্রেস লিখুন।

এবার আপনার কাজ শেষ। নতুন প্যাকেজ ডেভেলপমেন্ট শুরু করতে টার্মিনালে নিচের কমান্ডটি লিখুন-

```
php artisan workbench vendor/package
```

এই vendor এবং package এর জায়গায় আপনি আপনার প্যাকেজের ভেন্ডরের নাম এবং প্যাকেজের নাম লিখবেন।

কমান্ডটি দেয়ার পরে দেখবেন আপনার প্রজেক্টের রুট ডিরেক্টরিতে workbench নামে একটি ফোল্ডার তৈরি হয়েছে, এবং এই ফোল্ডারের ভেতরে আপনার প্যাকেজের জন্য একটি ফোল্ডার এবং অন্যান্য স্ক্যা-ফোল্ডিং ফাইল তৈরি হয়ে গেছে। ব্যস, শুরু করে দিন প্যাকেজ ডেভেলপমেন্ট।
