---
extends: _layouts.post
title: জাভার সাথে MySQL এর কানেকশন
date: '2011-05-21'
gist: How to connect MySQL with Java.
section: content
syntaxHighlight: false
---

জাভা বর্তমান পৃথিবীর অত্যন্ত জনপ্রিয় একটা প্রোগ্রামিং ভাষা। যে কোন ধরনের অ্যাপ্লিকেশন ডেভেলপ করতে জাভার কোন জুড়ি নেই। আর বর্তমানের অধিকাংশ সফটয়্যারেই ডাটাবেজ ব্যবহার করা হয়। জাভার সাথে ডাটাবেজের কিভাবে সংযোগ দিতে হয় তা এই পোষ্টের মাধ্যমে দেখান হল।

ডাটাবেজে বিভিন্ন ধরনের অপারেশন চালানোর জন্য জাভার Statement class(কমেন্টের মধ্যে) এবং অত্যাধুনিক PreparedStatement class ব্যবহার করা হয়েছে।

জাভাতে ডাটাবেজের কোন পরিবর্তন আনার জন্য executeUpdate() এবং কোন তথ্য অনুসন্ধানের জন্য executeQuery() মেথড ব্যবহার করা হয়।

<script src="https://gist.github.com/milon/b888d827513ecf1e79b57e88a58e45de.js">
</script>
