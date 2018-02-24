---
extends: _layouts.post
title: Story behind my new blog
date: '2018-01-23'
gist: The behind story of my statically generated github pages powered blog.
section: content
syntaxHighlight: false
---

I recently redesigned my website. Previously it was powered by wordpress and hosted in wordpress.com. But most of the internet provider of Bangladesh blocks that site because of some atheist online activist use that platform to host their blog.

Then I moved that to self hosted wordpress and manage it my myself. But it become a pain in the ass to manage. So, I decided to move that for a alternative. After a bit research, I decided to migrate to github powered static site.

After that decision, I looked into couple of choices. Jekyll and Hugo was in the list, but as I am working fulltime on Laravel, the new static site generator from [tighten](http://tighten.co) called [jigsaw](jigsaw.tighten.co). It uses laravel's blade templating engine. You can obviously use markdown even use both of them together. There are some other nifty features that is very convenient for building a site.

After that I tried to choose a theme. I liked [anybodyhome](https://themes.gohugo.io/anybodyhome) theme from hugo theme repository, so I ported it to jigsaw and did some tweak to fit my choice. Then I wrote a simple script to port all the posts from wordpress to markdown.

Then it comes to syntax highlighting. I used trusty old [highlight.js](https://highlightjs.org) with github theme. Preety strait forward.

Then I showed to it some of my colleagues. [Samiul Bhai](https://twitter.com/samhq7) asked me to add disqus as a comment engine. I did that too. Thanks to him.

Then I tried to add SSL on the site, but github don't allow SSL in custom domains. So, I integrate cloudflare with the site to enable that. Cloudflare also enables some other great features like DDoS protection, CDN, monitoring etc. After the final result, I am pretty happy what I got now.

Please do visit the sections of this site and let me know your thoughts about it. Peace.
