---
extends: _layouts.post
title: Added search functionality with fuse.js in Jigsaw powered site
date: '2020-04-21'
gist: Added fuzzy search with fuse.js in static site generated with Jigsaw.
section: content
syntaxHighlight: false
categories: []
---

After being in lockdown for over a month I was bored as hell. So, recently I created a website for sharing my recipes with the world. I choose Jigsaw to create this site as it was very quick and easy for me to built because it's based on Laravel's Blade templating engine. I also didn't want to spend any money on the site, so a static site was the perfect choice for me. I built the side within a day and deploy it to netlify. I launched the side with 10 recipes only, but soon I started adding more and more recipes and after a week the number of recipes was more than 40. I was looking for a search solution for the site. There was couple of paid choice, but I didn't want to spend any money, so those were not a viable option for me. Then I found a nifty little npm package called fuse.js. It was exactly what I needed. Let's talk about the implementation.

Fuse.js needs some kind of index to be able to search. It could be a simple json array. It was very strait forward to generate the index with a Jigsaw `afterBuild` event listener. I created this file on `listeners/GenerateIndex.php` location.

<script src="https://gist.github.com/milon/5daa9aec64c1bff70e2e1c3678dafbf3.js?file=GenerateIndex.php"></script>

Then I hooked the event listener in the `bootstrap.php` file like this-

<script src="https://gist.github.com/milon/5daa9aec64c1bff70e2e1c3678dafbf3.js?file=bootstrap.php"></script>

Then every time I built the site, all the gist of all my recipes goes to a `index.json` file in the built directory. This file will work as the api for my fuse.js search.

Now, let's talk about the search functionality. I opt in for simple `vue.js` single file component for the search with a very basic styling. Here is the code for that file-

<script src="https://gist.github.com/milon/5daa9aec64c1bff70e2e1c3678dafbf3.js?file=Search.vue"></script>

Finally I added the search component in the the navbar to render the search field-

<script src="https://gist.github.com/milon/5daa9aec64c1bff70e2e1c3678dafbf3.js?file=navigation.blade.php"></script>

It just works like a bridge.

You can visit the website [here](https://easy-recipes.netlify.app) and the whole source code can be found in [Github](https://github.com/milon/recipe). Enjoy!
