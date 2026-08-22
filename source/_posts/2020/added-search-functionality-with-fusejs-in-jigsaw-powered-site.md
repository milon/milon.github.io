---
extends: _layouts.post
title: Added search functionality with fuse.js in Jigsaw powered site
date: '2020-04-21'
gist: Added fuzzy search with fuse.js in static site generated with Jigsaw.
section: content
syntaxHighlight: true
categories: [meta, javascript]
---

After being in lockdown for over a month I was bored as hell. So, recently I created a website for sharing my recipes with the world. I choose Jigsaw to create this site as it was very quick and easy for me to built because it's based on Laravel's Blade templating engine. I also didn't want to spend any money on the site, so a static site was the perfect choice for me. I built the side within a day and deploy it to netlify. I launched the side with 10 recipes only, but soon I started adding more and more recipes and after a week the number of recipes was more than 40. I was looking for a search solution for the site. There was couple of paid choice, but I didn't want to spend any money, so those were not a viable option for me. Then I found a nifty little npm package called fuse.js. It was exactly what I needed. Let's talk about the implementation.

Fuse.js needs some kind of index to be able to search. It could be a simple json array. It was very strait forward to generate the index with a Jigsaw `afterBuild` event listener. I created this file on `listeners/GenerateIndex.php` location.

```php
<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data = collect($jigsaw->getCollection('posts')->map(function ($page) use ($jigsaw) {
            return [
                'title'             => $page->title,
                'link'              => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                'excerpt'           => $page->excerpt,
                'englishSearchTerm' => str_replace('-', ' ', $page->getFilename()),
                'categories'        => $page->categories ?? []
            ];
        })->values());

        file_put_contents($jigsaw->getDestinationPath() . '/index.json', json_encode($data));
    }
}
```

Then I hooked the event listener in the `bootstrap.php` file like this-

```php
<?php

// Generate search index
$events->afterBuild(App\Listeners\GenerateIndex::class);
```

Then every time I built the site, all the gist of all my recipes goes to a `index.json` file in the built directory. This file will work as the api for my fuse.js search.

Now, let's talk about the search functionality. I opt in for simple `vue.js` single file component for the search with a very basic styling. Here is the code for that file-

```html
<template>
    <form class="form-inline my-3 my-lg-0 position-relative" v-on:submit.prevent="() => {}">
        <input
            id="search"
            v-model="query"
            ref="search"
            class="form-control"
            type="text"
            placeholder="খুঁজুন..."
            @keyup.esc="reset"
        >
        <button
            v-show="query"
            class="btn btn-link cancel-btn"
            @click="reset"
        ><i class="fas fa-times"></i></button>

        <div v-if="query" class="search-panel">
            <div class="search-scroll">
                <a
                    v-for="(result, index) in results"
                    class="search-item"
                    :href="result.link"
                    :title="result.title"
                    :key="result.link"
                    @mousedown.prevent>

                    {{ result.title }}

                    <span class="excerpt" v-html="result.excerpt"></span>
                </a>
            </div>

            <div v-if="! results.length" class="">
                <span class="no-result">{{ query }}-এর জন্যে কোন ফলাফল পাওয়া যায় নি।</span>
            </div>

        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            fuse: null,
            query: '',
        };
    },
    computed: {
        results() {
            return this.query ? this.fuse.search(this.query) : [];
        },
    },
    methods: {
        reset() {
            this.query = '';
        },
    },
    created() {
        axios('/index.json').then(response => {
            this.fuse = new fuse(response.data, {
                minMatchCharLength: 6,
                keys: ['title', 'excerpt', 'englishSearchTerm'],
            });
        });
    },
};
</script>

<style>
    #search {
        width: 350px !important;
        border-radius: 0;
    }

    #search:focus {
        border-color: #ced4da;
        box-shadow: none;
    }

    .cancel-btn {
        right: 0;
        color: #495057;
        position: absolute;
    }

    .cancel-btn:hover {
        color: #495057;
    }

    .search-panel {
        width: 100%;
        left: 0;
        right: 0;
        background: white;
        top: 100%;
        position: absolute;
        max-height: 350px;
        overflow: scroll;
    }

    .no-result {
        font-size: 16px;
        padding: 5px 8px;
    }

    .search-item {
        text-decoration: none !important;
        display: block;
        padding: 5px 8px;
        border-bottom: 1px solid #ccc;
        font-size: 16px;
        font-weight: bold;
    }

    .search-item .excerpt {
        font-size: 13px;
        display: block;
        color: #bababa;
        font-weight: normal;
    }
</style>
```

Finally I added the search component in the the navbar to render the search field-

```html
<div class="collapse navbar-collapse" id="navbarResponsive">
    <div id="vue-search">
        <search></search>
    </div>
</div>
```

It just works like a bridge.

You can visit the website [here](https://easy-recipes.netlify.app) and the whole source code can be found in [Github](https://github.com/milon/recipe). Enjoy!
