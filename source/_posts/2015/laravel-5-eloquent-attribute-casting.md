---
extends: _layouts.post
title: 'লারাভেল ৫: ইলোকোয়েন্ট এট্রিবিউট কাস্টিং'
date: '2015-03-24'
gist: লারাভেল ৫ এর ইলোকোয়েন্ট এট্রিবিউট কাস্টিং এর অদ্যোপান্ত।
section: content
syntaxHighlight: true
categories: []
---

আমরা জানি লারাভেলের ইলোকোয়েন্ট ওআরএম এ কোন কোয়েরি চালালে যে ভ্যালু রিটার্ন করে সেটা সবসময়ই স্ট্রিং হিসেবে থাকে। এতে করে একটা সমস্যা প্রায়ই দেখা যায়। যেমন ধরুন, আমরা নিচের কোয়েরিটা চালালাম User নামের মডেলে-

```
$user = User::find($id);
```

ধরি আমাদের ইউজার টেবিলে শুধুমাত্র নাম এবং এক্টিভেটেড ফ্লাগ কলাম আছে। সেক্ষেত্রে এই ইউজারকে যদি আমরা ডাম্প করি তাহলে নিচের মত আউটপুট দেখতে পাবো-

```
{
    "id" => "1",
    "name" => "John Doe",
    "activated" => "0"
}
```

এক্ষেত্রে একটি সাধারন সমস্যা হচ্ছে ইউজার এক্টিভেটেড কিনা সেটি যদি আমরা চেক করি তাহলে সেক্ষেত্রে দেখা যাবে-

```
echo ($user.activated)? "Yes" : "No";
//output: Yes
```

এক্ষেত্রে আউটপুট আসবে Yes যদিও No আউটপুট আসা উচিৎ ছিল। এর কারন এক্টিভেটেড ফ্লাগটি স্ট্রিং হিসেবে আছে। ফ্লাগটি যদি বুলিয়ান ভ্যালু হিসেবে থাকতো তাহলে আর এই সমস্যাটা হতো না।

লারাভেল ৪.* এ আমরা এক্সেসর এবং মিউটেটর ব্যবহার করে এই সমস্যার সমাধান করতে পারতাম। মডেল ক্লাসে নিচের মেথডটি যুক্ত করে আমরা ভ্যালুটিকে বুলিয়ানে কাস্টিং করতে পারতাম-

```
public function getActivatedAttribute($value){
    return (boolean) $value;
}
```

লারাভেল ৫ এ আপনি একইভাবে এট্রিবিউট কাস্টিং করতে পারবেন। এছাড়া আরো একটি সহজ উপায় যুক্ত হয়েছে লারাভেল ৫ এ। সেটি হচ্ছে মডেলে $casts নামে একটি এসোসিয়েটিভ এরে যোগ করে সেটিতে ডেটাটাইপ ডিক্লেয়ার করে দেয়া। যেমন উপরের উদাহরনটিকে যদি নতুন পদ্ধতিতে কাস্টিং করতে চাই সেক্ষেত্রে লিখতে হবে-

```
proteced $casts = [
    'activated' => 'boolean'
];
```

শুধুমাত্র বুলিয়ানেই কাস্টিং করতে পারবেন তা না। boolean ছাড়াও আপনি integer, real, float, double, string, boolean, object এবং array তে কাস্ট করতে পারবেন।

এক্ষেত্রে বলে রাখা ভালো এরে কাস্টিং শুধুমাত্র ব্যবহৃত হয় যখন কোন কলামে জেসন সিরিয়ালাইজড ডেটা সেভ করা হয়। যেমন ধরুন আমাদের উদাহরনের ইউজার টেবিলে যদি অপশন নামে একটি কলাম থাকতো, এবং সেটিতে যদি সিরিয়ালাইজ ডেটা সেভ করা হতো তাহলে সেটি করা হতো এভাবে-

```
$user = User::find($id);

$user->options = [
    'email' => 'john@example.com',
    'age' => 20
];
$user->save();
```

এক্ষেত্রে ইউজারকে ডাম্প করলে আমরা অপশনের জায়গায় একটি সিরিয়ালাইড জেসন ডেটা পেতাম। কিন্তু আমরা যদি $casts এরেতে অপশন হিসেবে এরে সিলেক্ট করি সেক্ষেত্রে মডেল ডেটা রিটার্ন করার সময় অটোমেটিক আউটপুটকে ডিসিরিয়ালাইজ করবে।
