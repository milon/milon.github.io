---
extends: _layouts.post
title: Build and deploy Jigsaw site with Github Actions
date: '2020-07-13'
gist: How to build and deploy a site built with Jigsaw static generator with Github Actions.
section: content
syntaxHighlight: false
categories: []
---

I built this very site about 2 years ago. From that moment till today, I used to run a small shell script locally to deploy it to GitHub pages. Here's what I used to do-

<script src="https://gist.github.com/milon/5173255b58564a0e50548cfbe879181e.js?file=deploy.sh"></script>

I was building the assets first, then build the site locally for production in the `build_production` folder. I run this website in a custom domain, so I used to have a `CNAME` file in the root of `/source` directory.

Couple of month ago, GitHub launched it's CI/CD platform named GitHub Actions. Today, I had some time to kill, so I thought why not give it a try. So, here's what I did-

<script src="https://gist.github.com/milon/5173255b58564a0e50548cfbe879181e.js?file=build-publish.yml"></script>

I create a file named `build-publish.yml` in `.github/workflows` folder. Then still the build script from James Brooks' [site](https://james.brooks.page/blog/jigsaw-github-actions/) and modify a little bit. After that it just works. Kudos to James. The process is basically the same, install composer dependencies, install npm dependencies, run npm build for production, run jigsaw build for production and then move the `build_production` folder to master branch.

So, I no longer have to build it locally and I don't need to think about `CNAME`.

Chao!
