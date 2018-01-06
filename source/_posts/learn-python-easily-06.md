---
extends: _layouts.post
title: সহজে পাইথন শেখা-০৬
date: '2012-07-05'
gist: সহজ ভাষায় পাইথন শেখার টিউটোরিয়াল।
section: content
---

আমাদের আজকের টপিক হচ্ছে স্ট্রিং। পাইথনে স্ট্রিং হচ্ছে একটা অবজেক্ট। আসলে পাইথন একটা অবজেক্ট অরিয়েন্টেড প্রোগ্রামিং ভাষা। এখানে সবকিছুই আসলে এক-একটা অবজেক্ট। অবজেক্ট সম্পর্কে আমরা পরে বিস্তারিত জানবো। স্ট্রিং হচ্ছে এক বা একাধিক ক্যারেকটারের সমষ্টি। আমরা স্টিং তৈরী করতে পারি যে কোন কিছু সিঙ্গেল বা ডাবল কোটেশনের মধ্যে লিখে। যেমন-

```
“My name is Milon.”
'I am a student of Information Technology.'
```

আমরা স্ট্রিংকে একটা ভ্যারিয়েবল হিসেবে ধরতে পারি। যেমন-

```
>>>name=”My name is Milon.”
>>>print name
My name is Milon.
```

এছাড়া মাল্টিলাইন স্ট্রিংও হতে পারে। মাল্টিলাইন স্ট্রিং লেখা হয় তিনটা সিঙ্গেল বা ডাবল কোটেশন ব্যবহার করে। যেমন-

```
>>>”””This is a multi line String.
...This is the second line.
...This is the last line of the string.”””
```

মাল্টিলাইন স্ট্রিং লেখার সময় আমরা পাইথন টার্মিনালে তিনটা করে ডট(. . .) দেখতে পাব।

আমরা স্ট্রিং দিয়ে মাল্টিপ্লিকেশন বা গুন অপারেটর ব্যবহার করে অনেক কিছু লিখতে পারি। যেমন-

```
>>>”Milon”*5
MilonMilonMilonMilonMilon
```

এবারে আমরা স্ট্রিংএর আরেকটা মজার ব্যবহার শিখবো। আমরা স্ট্রিংএ % নোটেশনকে প্লেসহোল্ড ক্যারেকটার হিসেবে ব্যবহার করতে পারি। যেমন-

```
>>>string=”Hello %s, How are you?”
>>>print string % Milon
Hello Milon, How are you?
```

আমরা চাইলে একাধিক ভ্যারিয়েবলও ব্যবহার করতে পারি। যেমন-

```
>>>name1=”Rahim”
>>>name2=”Karim”
>>>print “%s and %s are two brothers.” % (name1, name2)
Rahim and Karim are two brothers.
```

স্ট্রিং একটা প্রোগ্রামিং ভাষার একটা অত্যন্ত গুরুত্বপূর্ণ অংশ। ছোট্ট একটা টিউটোরিয়াল স্ট্রিংয়ের মত বিশাল বিষয়কে জানার জন্য মোটেও যথেষ্ট না। ফাংশন, লিস্ট আর টাপল সম্পর্কে জানার পর আমরা স্ট্রিং সম্পর্কে আরো বিস্তারিত জানবো।