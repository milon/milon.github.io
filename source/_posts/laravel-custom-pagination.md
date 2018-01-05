---
extends: _layouts.post
title: লারাভেল ৫.১-এ কাস্টম পেজিনেশন
date: '2015-07-05'
gist: লারাভেল ৫.১ ব্যবহার করে কাস্টম পেজিনেটেড কোয়েরি লেখার গাইডলাইন।
section: content
---

লারাভেলের ইলোকোয়েন্ট বা কোয়েরি বিল্ডার ব্যবহার করে আপনি খুব সহজেই পেজিনেশন তৈরি করতে পারেন। নিচে উদাহরন দেখুন-

```
public function show()
{
    $people = People::paginate(5);
    return view('poeple.list', compact('people'));
}
```

আর পেজিনেশন লিঙ্কগুলো ভিউ পেজে শো করতে হয় এভাবে-

```
{!! $people->render() !!}
```

কিন্তু আমরা সবসময় ইলোকোয়েন্ট বা কোয়েরি বিল্ডার ব্যবহার নাও করতে পারি। সেক্ষেত্রে পেজিনেশনের দরকার হলে সেটি করতে হবে এভাবে-

```
public function index()
{
    $people = collect([
        [
            'name'    => 'Milon',
            'website' => 'http://milon.im'
        ],
        [
            'name'    => 'Sadek',
            'website' => 'http://sadek.im'
        ],
        //many other items...
        [
            'name'    => 'Ashik',
            'website' => 'http://ashik.im'
        ]
    ]);

    $perPage     = 5;
    $currentPage = \Input::get('page') ?: 1;
    $pagedData   = $people->slice($currentPage * $perPage, $perPage)->all();
    $people  = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($people), $perPage, $currentPage);

    return view('people.list', compact('people'));
}
```

এখানে প্রথমে একটা বড় এ্যারে কে ‌‌collect() হেল্পার মেথডের সাহায্যে লারাভেলের কালেকশন ক্লাসের অবজেক্টে পরিনত করা হয়েছে। এরপর $perPage এ ঠিক করা হয়েছে প্রতি পেজে কয়টা ডেটা শো করবে। এরপর কারেন্ট পেজ কোনটা সেটা নির্ধারন করা হয়েছে ইউআরএলের GET প্যারামিটার থেকে। যদি কোন গেট প্যারামিটার না থাকে তবে আমরা ডিফল্টভাবে $currentPage = 1 ধরে নেই।

এরপর ডেটাকে স্লাইস করে নিতে হয়। এই স্লাইস মেথড কিভাবে কাজ করে সেটা লারাভেলের [কালেকশনের ডকুমেন্টেশন](http://laravel.com/docs/5.1/collections#method-slice) দেখে নিতে পারেন। পরবর্তীতে এই ডেটাকে LengthAwarePaginator ক্লাসের ইন্সট্যান্স বানাতে হয়। LengthAwarePaginator ব্যবহার না করে আপনি চাইলে Paginator ক্লাসও ব্যবহার করতে পারেন। এ দুটির মধ্যে পার্থক্য হচ্ছে LengthAwarePaginator ক্লাসটিতে আপনার কালেকশনে মোট কয়টি ডেটা আছে সেটা পাঠাতে হয় কিন্তু Paginator এ সেটা পাঠাতে হয় না।

বাকি ভিউ আপনি নিচের মত করে রেন্ডার করতে পারেন-

```
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Website</th>
        </tr>

        @foreach($collection as $data)
            <tr>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['website'] }}</td>
            </tr>
        @endforeach
    </table>

    {!! $collection->render() !!}
</div>
```

হ্যাপি কোডিং...
