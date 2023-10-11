---
extends: _layouts.post
title: Adding multiple subdomain with Github Pages
date: '2023-10-10'
gist: How to add multiple subdomain with Github Pages?
section: content
syntaxHighlight: false
categories: []
---

I have a domain named `milon.im`, though I have some other domains, but I use it as my main domain for personal use. I have my personal website hosted in Github Pages. You can have a repository with github and name it like `<username>.github.io` and the pages enabled from this repository can be found in the same domain. I have a repository named `milon.github.io` and I have hosted my personal website here using a static site generator named [Jigsaw](https://jigsaw.tighten.com/). You can also assign a custom domain in this repository. I have assigned `milon.im` as my custom domain. So, my personal website can be found in [milon.im](https://milon.im). For doing that you can go to the repository settings and assign a custom domain. You can also add a `CNAME` file in the root of your repository and add your custom domain there. I have added a `CNAME` file in the root of my repository and added `milon.im` there. You can also do it from the repository settings. Then you have to go to the nameserver settings of your domain and add a A record with the IP address of Github Pages. You can find the IP address from [here](https://help.github.com/en/github/working-with-github-pages/managing-a-custom-domain-for-your-github-pages-site#configuring-an-apex-domain). I have added an A record with the IP address of Github Pages in my domain's nameserver settings. Now, I can access my personal website in [milon.im](https://milon.im).

I have some other hobby projects, which is also hosted in Github Pages. If you have an apex domain configured, then all other github pages site can be hosted like this- `<username>.github.io/<repository>`. During I COVID lockdown, I have spent some time on cooking various dish, and created a website with the recipes of those dishes. I was hosting that site on netlify. Netlify is great, if you are using a static site generator with Javascript. I was using a PHP based static site generator, so I had to face couple of issue. First of all, the default PHP version of netlify is PHP 7.4, and you can't use any version other than 7.4 or 8.0. So I decided to switch that site to github pages. After switching, the site was accessable `milon.im/recipes` URL. 

Then I thought, why not use a subdomain like `recipes.milon.im` to host this site. Luckly it is very easy to do with github pages. You basically need 3 things to have it-

- Enable github pages for the repository. I used gh-pages branch for this. Though you can use any branch as well.
- Add a CNAME file in the root of the repository and add the subdomain there. In my case, I added `recipes.milon.im` in the CNAME file.
- Add a CNAME record in the nameserver settings of your domain and add the github pages URL there. In my case, I added `recipes.milon.im` in the CNAME record in my DNS settings and the target was `milon.im` domain. I am using cloudflare as the DNS provider, which actually comes with bunch of other features. The most useful for me is the SSL certificate. I don't have to worry about SSL certificate for my subdomain. Cloudflare provides it for free.

I the added a github actions to automate the build and deploy process. I have added a `build-publish.yml` file in `.github/workflows` folder. You can learn more about how to do that in [this post](https://milon.im/blog/2020/github-action-with-jigsaw). Now, I can access my recipes site in [recipes.milon.im](https://recipes.milon.im).