---
extends: _layouts.post
title: সহজে পাইথন শেখা-০৭
date: '2012-07-06'
gist: সহজ ভাষায় পাইথন শেখার টিউটোরিয়াল। (সপ্তম পর্ব)
section: content
syntaxHighlight: true
categories: []
---

আমরা এতদিন শুধুমাত্র আমাদের দেয়া ভ্যালু নিয়েই কাজ করেছি। কিন্তু কম্পিউটার প্রোগ্রামে দেখা যায় আমরা ইউজারের কাছ থেকে বিভিন্ন তথ্য সংগ্রহ করে থাকি। যেমন- আমরা হয়ত ইউজারের কাছ থেকে তার নাম, বয়স ইত্যাদি জানতে চাইতে পারি। এটা পাইথনে করা খুবই সহজ। ছোট্ট একটা উদাহরন দেখি-

```
>>>print “What is your name?”
>>>name=raw_input()
>>>print “Hoe old are you?”
>>>age=raw_input()
>>>print “Hello %s, you are %s years old.” % (name, age)
```

উপরের প্রোগ্রামটি ইউজারের কাছ থেকে তার নাম এবং বয়স জানতে চাইবে এবং সবশেষে সে তার নাম এবং বয়স প্রদর্শন করবে। এক্ষেত্রে একেক ব্যবহারকারী একেক ধরনের ইনপুট দেবে, কিন্তু আমাদের প্রোগ্রাম সে সকল ধরনের ইনপুট নিয়েই কাজ করতে পারবে।

আর একটা বিষয়, আমরা অনেক বড় বড় প্রোগ্রাম করার সময় চাইলে প্রোগ্রাম কোডে বিভিন্ন কমেন্ট লিখে রাখতে পারি। যা পরবর্তীতে আমাদেরকে ঐ প্রোগ্রাম দেখা মাত্রই বুঝতে সাহায্য করবে। এছাড়া বড় বড় প্রজেক্টে দেখা যায় অনেকে মিলে একটা প্রোগ্রাম তৈরী করে। সেক্ষেত্রে একজনের কোড অন্যজনের বুঝতে অসুবিধা হতে পারে। তাই কমেন্ট ব্যবহার করলে এক্ষেত্রে সুবিধা পাওয়া যাবে। উপরের উদাহরনটিই আমরা কমেন্ট ব্যবহার করার পরের অবস্থা দেখি-

```
>>>#This is a sample program
>>>print “What is your name?”   #ask name
>>>name=raw_input()             #take input as name
>>>print “Hoe old are you?”     #ask age
>>>age=raw_input()              #take input as age
>>>#Next line will print the values
>>>print “Hello %s, you are %s years old.” % (name, age)
```

কমেন্ট ব্যবহার করার পর যে কেউ প্রোগ্রামটি দেখলেই বুঝতে পারবে এটা দিয়ে কি কাজ করা হচ্ছে। পাইথনে কমেন্ট করার জন্য হ্যাশ(#) ব্যবহার করা হয়। হ্যাশ চিহ্ন পাওয়ার পর পাইথন ইন্টারপ্রিটার ঐ লাইনের আর কোন কোডকে কম্পাইল করে না।
