---
extends: _layouts.post
title: লারাভেলে একাধিক রাউটিং ফাইলের ব্যবহার
date: '2016-02-16'
gist: >-
  লারাভেলে একাধিক রাউটিং ফাইল ব্যবহার বিধি। (আপডেট: লারাভেল ৫.৫ এ এই ফিচারটি
  যুক্ত করা হয়েছে।)
section: content
syntaxHighlight: false
categories: []
---

> আপডেট: লারাভেল ৫.৫-এ এই ফিচারটি যুক্ত করা হয়েছে।

লারাভেলে চমৎকার একটি রাউটিং লাইব্রেরি সহ এসেছে, যা সিম্ফনির রাউটারের উপর ভিত্তি করে তৈরি করা। আর এটি ব্যবহার করাও খুব সহজ। এর চমৎকার এপিআই সেল্ফ এক্সপ্লেনারি। যে কেউ রাউটারের কোড দেখলেই বুঝতে পারবে, এটি কি কাজ করবে। চলুন একটু উদাহরন দেখি-

<script src="https://gist.github.com/milon/71894ae3390ad2375f28.js">
</script>

লারাভেলের রাউটগুলি ডিক্লেয়ার করা থাকে `app/Http/routes.php` ফাইলে। সমস্যা হচ্ছে যখন অনেক বড় কোন প্রজেক্টে কাজ করতে হয়, তখন রাউট ফাইলটির আকার অনেক বড় হয়ে যায় এবং একটি মাত্র ফাইলে রাউটগুলি ম্যানেজ করা খুবই কষ্টসাধ্য হয়ে পড়ে। এর সমাধান করা যায় খুব সহজেই, রাউটগুলি অনেকগুলি ফাইলে ভাগ করে নিলে।

এটা করা অত্যন্ত সহজ। এ উদাহরনে আমরা এমন একটি টেস্টকেস চিন্তা করবো, যেখানে এটি ফাইলে প্রজেক্টের ওয়েব রাউটগুলি থাকবে এবং অন্য একটি ফাইলে এপিআই রাউটগুলি থাকবে। এর জন্য আমরা প্রথমেই আমাদের রাউট ফাইলের নাম পরিবর্তন করে রাখি `web_routes.php`. এরপর একটি ডিরেক্টরিতে `api_routes.php` নামে আরো একটা ফাইল তৈরি করি। এরপর আমরা `app/Providers/RouteServiceProvider.php` ফাইলটি ওপেন করি। এই ক্লাসটির প্রথমেই আছে `$namespace` নামে একটি প্রটেক্টেড ভ্যারিয়েবল। এটিকে রিনেম করে `$webNamespace` করি এবং এর ঠিক নিচেই `$apiNamespace` নামে আরো একটি ভ্যারিয়েবল ডিক্লেয়ার করি। এ উদাহরনের জন্য আমরা ধরে নেই আমাদের সবগুলো ওয়েব কন্ট্রোলার এবং এপিআই কন্ট্রোলার থাকবে যথাক্রমে `app/Http/Controllers` ফোল্ডারের `Web` এবং `Api` নামের ফোল্ডারে। তাহলে সেক্ষেত্রে এ কন্ট্রোলারগুলোর নেমস্পেসও এ অনুসারেই হবে। এরপর `map` মেথডে ফাইলদুটোকে রেজিস্টার করে দিতে হবে। সেটি করার পর ফাইলটি দেখতে হবে এরকম-

<script src="https://gist.github.com/milon/d3ff4faf93f521439c9f.js">
</script>

এরপর থেকে আপনি আপনার ওয়েবসাইটের রাউটগুলি ওয়েব রাউট ফাইলে এবং এপিআই রাউটগুলি এপিআই রাউট ফাইলে আলাদা করে রাখতে পারবেন। আপনি আপনার প্রয়োজনমত যতগুলি ইচ্ছা ফাইলে রাউটগুলি ভাগ করে রাখতে পারেন। আর রাউট ফাইলের সংখ্যা যদি বেড়ে যায়, তাহলে সেগুলিকে `Http` ফোল্ডারের মধ্যে `Routes` নামে একটি ফোল্ডারে রাখতে পারেন। সেক্ষেত্রে ম্যাপ মেথডে শুধু রাউট ফাইলের পাথটি ঠিক করে দিলেই হবে।
