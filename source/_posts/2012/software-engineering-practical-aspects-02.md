---
extends: _layouts.post
title: 'সফটয়্যার ইঞ্জিনিয়ারিং: ব্যবহারিক আঙ্গিক-২'
date: '2012-11-26'
gist: My thoughts on Software Engineering's practical aspects.
section: content
syntaxHighlight: false
categories: []
---

কিছু কোর্স প্রজেক্ট আমাদেরকে বিভিন্ন ধরনের বাধ্যবাধকতা জুড়ে দেয়। যেমন- সি প্রজেক্ট করতে হয় বেশিরভাগ বিশ্ববিদ্যালয়গুলোতে। এছাড়া রয়েছে অবজেক্ট অরিয়েন্টেড প্রোগ্রামিংয়ের প্রজেক্ট যা সাধারনত সবাই জাভা বা সি# ব্যবহার করে করে। অন্যান্য ক্ষেত্রে ছাত্রদের স্বাধীনতা থাকে প্রজেক্ট করার ক্ষেত্রে। এছাড়া আমরা যখন ব্যবহারিক সফটয়্যার তৈরী করবো, তখনো ক্লায়েন্টের কাছ থেকে বিভিন্ন ধরনের চাহিদা বা রিকোয়্যারমেন্ট আসতে পারে। এ ব্যাপারগুলোর দিকে সব সময় খেয়াল রাখতে হবে।

**প্রজেক্ট প্রস্তাবনা**

প্রজেক্ট প্রস্তাবনা রাখার ক্ষেত্রে কয়েকটি বিষয় খেয়াল রাখা উচিৎ-

- এমন বিষয় নির্বাচন করা উচিৎ যেটা নির্দিষ্ট সময়ের মধ্যে দলটি দ্বারা করা সম্ভব হবে। বেশিরভাগ প্রজেক্ট করার জন্য সময় থাকে ছয় মাস বা ক্ষেত্রবিশেষে এক বছর। এমন প্রজেক্ট কখনোই নির্বাচন করা উচিৎ হবে না, যা এই সময়ের মধ্যে করা সম্ভব হবে না।
- প্রজেক্ট নির্বাচনের সময় কোন একজনের সমস্যার সমাধানের চেয়ে বেশি খেয়াল রাখা দরকার এটার ব্যবহারিক প্রয়োগের দিকে। একটা সফটয়্যার প্রজেক্টের টার্গেট পিপল বা ভোক্তা কারা হবে সে বিষয়ে খেয়াল রেখে প্রজেক্ট নির্বাচন করা উচিৎ।
- যে সফটয়্যার বাজারে ইতোমধ্যে আছে সে ধরনের প্রজেক্ট নির্বাচন করা উচিৎ হবে না। আর নির্বাচন করা হলে অবশ্যই নতুন কোন বৈশিষ্ট্য যুক্ত করতে হবে যা বাজারে বিদ্যমান সফটয়্যারটিতে নেই।
- একটা প্রজেক্ট নির্বাচন করার পর সেটিতে আস্থা রাখতে হবে। প্রায়সই দেখা যায় একটা প্রজেক্ট নির্বাচন করার কিছুপর সেটা বদলে অন্য প্রজেক্ট নেয়া হয়। এতে করে সময়ের অপব্যবহার হয় এবং আত্নবিশ্বাসে ফাটল ধরে।
- সত্যিকারের ব্যবহারকারীদের টার্গেট করে সফটয়্যার তৈরী করতে হবে। অনেক সময় দেখা যায়, লাইব্রেরী ম্যানেজমেন্ট সিস্টেম, স্কুল ম্যানেজমেন্ট সিস্টেম বা এই ধরনের প্রজেক্ট নির্বাচন করা হয়, যা হয়তো কখনোই ব্যবহারিক কাজে ব্যবহৃত হবে না। এ ধরনের প্রজেক্ট নির্বাচন করলে যাতে ব্যবহারিক কাজে লাগানো যায় সেদিকে খেয়াল রাখতে হবে।
- প্রজেক্টের একটি সুন্দর এবং অর্থপূর্ণ নাম রাখতে হবে।

**প্রজেক্ট ফিচার**

প্রজেক্টের ফিচার কি কি হবে সে দিকে সতর্ক দৃষ্টি রাখতে হবে। কোন কোন ফিচারের দিকে খেয়াল রাখলে প্রজেক্টটি অন্যান্য প্রোডাক্টের চেয়ে ভাল হবে সেদিকে হাইলাইট করতে হবে। প্রজেক্টের শুরুতেই প্রোডাক্টের ইউজার ইন্টারফেস কি হবে সেদিকে খেয়াল রাখতে হবে। প্রোডাক্টটি যাতে এর ইউজারের কাছে আকর্ষনীয় হয়, সেদিকে সর্বোচ্চ গুরুত্ব দিতে হবে।

**প্রজেক্ট ফিডব্যাক**

প্রজেক্ট চলাকালীন সময়ে প্রজেক্ট সুপারভাইজার বা ক্লায়েন্ট(বানিজ্যিক সফটয়্যারের ক্ষেত্রে) এর মতামত নিতে হবে। এ ক্ষেত্রে আমি সর্বদা মডেল-ভিউ-কন্ট্রোলার মডেল অনুসরনের পরামর্শ দেব। প্রত্যেকটা অংশ সম্পূর্ণ হওয়ার সাথে সাথে সুপারভাইজারের পরামর্শ নিতে হবে। তা না হলে প্রজেক্ট কমপ্লিট করার পর এমন কোন ফরমায়েশ আসতে পারে যার কারনে হয়তো পুরো প্রজেক্টটিকে নতুন করে ঢেলে সাজানোর দরকার পড়বে। সেটা একঘেয়েমীপূর্ণ আর বিরক্তিকর হবে।