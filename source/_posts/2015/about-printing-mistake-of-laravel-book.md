---
extends: _layouts.post
title: লারাভেল বইয়ের প্রিন্টিং মিসটেক প্রসঙ্গে
date: '2015-05-29'
gist: আমার প্রকাশিত বইয়ের প্রিন্টিং মিসটেক সম্পর্কে আমার বক্তব্য।
section: content
syntaxHighlight: true
categories: []
---

আমার প্রকাশিত প্রথম বই **লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক**-এ অনিচ্ছাসত্ত্বেও একটা প্রিন্টিং মিসটেক হয়ে গেছে। বইয়ের প্রথম অধ্যায়ের "কনস্ট্রাক্টর ইনজেকশন" অংশের(পৃষ্ঠা নাম্বার ১৭) কোডে কয়েকটি লাইন বাদ পড়ে গেছে। পাঠকের যাতে বুঝতে অসুবিধা না হয় সেজন্য সেই অংশটি আমি এখানে দিয়ে দিচ্ছি।

```
use Book;
use BookShelf;

class Library{

    $protected $book;
    $protected $bookShelf;

    public function __construct(Book $book, BookShelf $bookShelf){
        $this->book = $book;
        $this->bookShelf = $bookShelf;
    }
}
```

এ অনাকাঙ্খিত ভুলের জন্য আমি পাঠকের নিকট ক্ষমাপ্রার্থী। পরবর্তী সংস্করণে এ ভুল শুধরে দেয়া হবে।
