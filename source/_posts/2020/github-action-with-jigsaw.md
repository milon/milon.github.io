---
extends: _layouts.post
title: Build and deploy Jigsaw site with Github Actions
date: '2020-07-13'
gist: How to build and deploy a site built with Jigsaw static generator with Github Actions.
section: content
syntaxHighlight: true
categories: [meta]
---

I built this very site about 2 years ago. From that moment till today, I used to run a small shell script locally to deploy it to GitHub pages. Here's what I used to do-

```bash
#!/usr/local/bin/zsh

npm run prod
./vendor/bin/jigsaw build production
git add build_production
git commit -m "Build for deploy"
git subtree push --prefix build_production origin master
```

I was building the assets first, then build the site locally for production in the `build_production` folder. I run this website in a custom domain, so I used to have a `CNAME` file in the root of `/source` directory.

Couple of month ago, GitHub launched it's CI/CD platform named GitHub Actions. Today, I had some time to kill, so I thought why not give it a try. So, here's what I did-

```yaml
name: Build & Publish

on:
  push:
    branches:
      - develop
  schedule:
    - cron: "0 2 * * 1-5"

jobs:
  build-site:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v2
    - name: Install Composer Dependencies
      run: composer install --no-ansi --no-interaction --no-scripts --no-suggest --no-progress --prefer-dist
    - name: Install NPM Dependencies
      run: npm install
    - name: Build assets
      run: npm run production
    - name: Build Jigsaw site
      run: ./vendor/bin/jigsaw build production
    - name: Create CNAME File
      run: echo "milon.im" >> build_production/CNAME
    - name: Stage Files
      run: git add -f build_production
    - name: Commit files
      run: |
        git config --local user.email "actions@github.com"
        git config --local user.name "GitHub Actions"
        git commit -m "Build for deploy"
    - name: Publish
      run: |
        git subtree split --prefix build_production -b master
        git push -f origin master:master
        git branch -D master
```

I create a file named `build-publish.yml` in `.github/workflows` folder. Then still the build script from James Brooks' [site](https://james.brooks.page/blog/jigsaw-github-actions/) and modify a little bit. After that it just works. Kudos to James. The process is basically the same, install composer dependencies, install npm dependencies, run npm build for production, run jigsaw build for production and then move the `build_production` folder to master branch.

So, I no longer have to build it locally and I don't need to think about `CNAME`.

Chao!
