@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'Laravel PHP Web Framework',
        'description' => "Nuruzzaman Milon's first book on Laravel PHP Web Framework.",
    ])
@endsection

@section('body')
    <div class="book-page">
        <h2>Laravel PHP Web Framework</h2>

        <section class="book-intro">
            <p>
                I heard a question very often, "Brother, I have learned PHP, but writing PHP inside HTML is not the pleasant thing to me." Or, "Which PHP framework should I learn?" In these type of scenario, my general answer is Laravel. Now, the question is why Laravel? You can answer it in many ways, even I have a <a href="/post/why-you-should-consider-laravel-as-your-go-to-framework-of-choice">blogpost</a> on that. But the short answer is Laravel uses the cutting age techniques and best practices of PHP. Though this bit of information is true for some other PHP frameworks as well, my personal preference is Laravel, especially for its beautiful syntax.
            </p>
            <p>
                Now the question is why I decided to write a book? I heard a complain so many times, that I am really sick of it. And it is, we don't have a good resource on Bengali for Laravel. All the resources are in English. I have taken a lot of help from the Bangladeshi community but didn't return them anything significant. This actually encourages me to write a book on Laravel.
            </p>
        </section>

        <section class="book-editions">
            <div class="book-edition">
                <img class="book" src="/assets/images/book/cover_1st_edition.png" alt="1st Edition Cover">
                <div class="book-content">
                    <h3>Second Edition</h3>
                    <p>বইটার দ্বিতীয় সংস্করণ বের হয়েছে। এটা আমার প্রথম বই ছিল। তাই প্রথম সংস্করনে অনেকগুলো ভুল-ত্রুটি ছিল। কিছু ফরম্যাটিং ভুল ছিল, সবচেয়ে মারাত্মক যে ভুল ছিল সেটা হলো, কোডের একটা অংশ মিসিং ছিল। অনেক ভালোবাসা পেয়েছি বইটার জন্য আপনাদের কাছ থেকে। সবাই খুব উৎসাহ দিয়েছে, ভালো ভালো মন্তব্য পেয়েছি। দুই-একটা যে বাজে মন্তব্য পাই নি, তা না, তবে সেগুলিকে আমি এই সংস্করনে ঠিক করার চেষ্টা করেছি।</p>
                    <p>সবচেয়ে বড় যে অভিযোগ ছিল বইটা নিয়ে, সেটাই এবার দূর করা হয়েছে। কোডের ব্যাখ্যা সহ একটি পূর্ণাঙ্গ প্রজেক্ট যুক্ত করা হয়েছে। এছাড়া লারাভেলের নতুন নতুন অনেক ফিচারের বর্ণনা এবং ব্যবহারবিধিও যোগ করা হয়েছে। আগামী সপ্তাহে লারাভেল ৫.৩ রিলিজ পাবে। এই বইয়ে যে অংশগুলো কভার করা হয়েছে, সেগুলি পুরোপুরি লারাভেল ৫.৩ এর সাথে সামঞ্জস্যপূর্ণ। তবে প্রজেক্টে আমি লারাভেল ৫.১ ব্যবহার করেছি। এর কারন, লারাভেল ৫.১ লং টার্ম সাপোর্ট ভার্সন। এ কারনে এটি রিয়েল লাইফ প্রজেক্ট করার ক্ষেত্রে সবচেয়ে উপযুক্ত।</p>
                </div>
            </div>

            <div class="book-edition">
                <img class="book" src="/assets/images/book/cover_2nd_edition.jpg" alt="2nd Edition Cover">
                <div class="book-content">
                    <h3>About the Book</h3>
                    <p>প্রায়শই আমাকে একটা কথা শুনতে হয়, ভাই পিএইচপি তো শিখেছি, কিন্তু এইচটিএমএল ট্যাগের ভেতর পিএইচপি কোড লিখতে ভালো লাগে না। অথবা, ভাইয়া পিএইচপির কোন ফ্রেমওয়ার্ক শিখলে ভাল হবে? এ ধরনের উত্তরে আমি এখন লারাভেল ফ্রেমওয়ার্ক শেখার পরামর্শ দেই। প্রশ্ন হচ্ছে কেন লারাভেল? এর উত্তরে অনেক কথাই বলা যায়, তবে এককথায় বলতে গেলে লারাভেল পিএইচপির কাটিং এজ টেকনিকগুলি ব্যবহার করে। এছাড়াও অনেক আরো অনেক উল্লেখযোগ্য ফিচার রয়েছে যা অন্য পিএইচপি ফ্রেমওয়ার্কগুলিতে নেই। যদিও এই কথা সিম্ফোনীর ক্ষেত্রেও প্রযোজ্য, কিন্তু আমি নিজে ব্যক্তিগতভাবে লারাভেল খুব পছন্দ করি।</p>
                    <p>এবার কথা হচ্ছে কেন লারাভেলের উপর বই লেখার সিদ্ধান্ত নিলাম। প্রায়ই শুনতে হয় নেটে লারাভেলের ভালো কোন বাংলা টিউটোরিয়াল বা রিসোর্স নাই। যা আছে সবই ইংরেজিতে। এছাড়া কমিউনিটি থেকে সারাজীবন বিভিন্ন সাহায্য সহযোগীতা নিয়েই গেলাম, কিন্তু উল্লেখ করার মত কিছুই দিতে পারি নি। তাই এ দায়বন্ধতা থেকেই লারাভেলের উপর বই লিখতে উৎসাহিত হয়েছি।</p>
                    <p>আমি লারাভেল ফ্রেমওয়ার্কে কাজ করি খুব বেশি দিন হয় নি। লারাভেলের বয়সও খুব বেশি না, মাত্র বছর চারেক। আমার সাথে লারাভেলের পরিচয় বছর দুয়েক হলো, আর বছর খানেক ধরে প্রফেশনাল কাজে লারাভেল ব্যবহার করছি। আমি লারাভেল শেখা শুরু করেছি লারাভেল ৪.০ থেকে। এরপর ৪.১, ৪.২ দেখলাম। যদিও প্রফেশনালি লারাভেল ৪.২ দিয়েই শুরু করেছি। এরপরই এলো লারাভেল ৫.০, এই ভার্সনে কিছু উল্লেখযোগ্য পরিবর্তন এসেছে যেমন নতুন সিম্ফোনীর মত ডিরেক্টরি স্ট্রাকচার, নতুন ফরম ভ্যালিডেশন, ফিল্টারিংয়ের পরিবর্তে মিডলওয়্যার ইত্যাদি। এছাড়াও আমি যদি ভুল করে না থাকি তাহলে লারাভেল ৫.০ ই হল প্রথম পিএইচপি ফ্রেমওয়ার্ক যেটা ১০০ ভাগ psr-4 কম্পিটেবল। তাই শুরু যখন করবো নতুনটা দিয়ে করাই ভালো মনে হলো আমার কাছে।</p>
                </div>
            </div>
        </section>

        <section class="book-info">
            <div class="book-info-section">
                <p>বইটি সম্পর্কে আপনাদের যে কোন মতামত স্বানন্দে গ্রহন করা হবে। মতামত জানাতে পারেন contact[at]milon[dot]im এই ইমেইল ঠিকানায়।</p>
            </div>

            <div class="book-details">
                <div class="book-detail-item">
                    <strong class="strong">লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক</strong>
                    <p>ISBN: 978-984-33-9190-2</p>
                </div>

                <div class="book-detail-item">
                    <strong class="strong">প্রকাশক:</strong>
                    <p><strong class="strong">দ্বিমিক প্রকাশনী</strong></p>
                    <p>১ম সংস্করণের প্রকাশ: মে, ২০১৫</p>
                    <p>২য় সংস্করণের প্রকাশ: আগস্ট, ২০১৬</p>
                </div>

                <div class="book-detail-item">
                    <strong class="strong">প্রাপ্তিস্থান:</strong>
                    <p><strong class="strong">হক লাইব্রেরি</strong>নীলক্ষেত, ঢাকা। (০১৮২০-১৫৭১৮১)</p>
                    <p><strong class="strong">মানিক লাইব্রেরি</strong>নীলক্ষেত, ঢাকা। (০১৭৩৫-৭৪২৯০৮)</p>
                </div>

                <div class="book-detail-item">
                    <strong class="strong">রকমারি.কম</strong>
                    <p><a href="https://www.rokomari.com/book/100634">https://www.rokomari.com/book/100634</a></p>
                    <p>ফোন: ১৬২৯৭</p>
                </div>
            </div>
        </section>

        @include('_layouts._partials._back_to_home_link')
    </div>
@endsection
