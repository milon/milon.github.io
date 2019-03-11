---
extends: _layouts.post
title: Setting Up Atom Editor for Software Development – 04
date: '2016-03-07'
gist: >-
  This is the forth part of my setting up development environment in Atom editor
  by Github.
section: content
syntaxHighlight: false
categories: []
---

Today I am going to talk about a very important topic, and that is Lint. In computer programming, lint is a Unix utility that flags some suspicious and non-portable constructs (likely to be bugs) in C language source code; generically, lint or a linter is any tool that flags suspicious usage in software written in any computer language.

According to [wikipedia](https://en.wikipedia.org/wiki/Lint_(software))-

> In computer programming, lint is a Unix utility that flags some suspicious and non-portable constructs (likely to be bugs) in C language source code; generically, lint or a linter is any tool that flags suspicious usage in software written in any computer language.

Thats bookish knowledge, lets make is a little bit easier to understand. Linter will help to prevent various typo and organize your code in various coding standards.

I am a web application developer and I use php and javascript almost everyday. So, in this episode I am going to show you how to use linter in these languages. First of all you have to install the base package for atom linter. It will give you the base functionality and it's a bridge for using specific linter package for various language. You can install linter by typing `apm install linter` or from settings' package installer.

This [linter](https://atom.io/packages/linter) package supports a lot of different languages. All the supported packages and ducumentation can be found on <http://atomlinter.github.io>

I use only some packages that I use for my day to day job. Let me introduce those one by one.

At first lets talk about HTML linter. I use [linter-htmlhint](https://atom.io/packages/linter-htmlhint) package for this. This package is just a bridge between atom and famous htmlhint package. You can install it via `apm install linter-htmlhint`. It assume you pc has already htmlhint installed. If not then you could install it through `npm install htmlhint -g` and then give it's path to htmlhint package settings. I assume your machinealre If you don't find the path, then type `which htmlhint` on your terminal and paste the path to the settings.

After that I am going to talk about [csslint](https://atom.io/packages/linter-csslint). It's almost the same process, just install it form terminal with `apm install linter-csslint` and configure it same as previous package.

You can install [jsonlint](https://atom.io/packages/linter-jsonlint) and [bootlint](https://atom.io/packages/linter-bootlint) for linting json and bootstrap code. Install it by typing `apm install linter-jsonlint` and `apm install linter-bootlint`. Configuring process is exactly the same.

![Linter](/images/posts/linter.png)

There are two popular linter for javascript. One is [jshint](http://jshint.com) and other is [jslint](http://www.jslint.com). They are not better from one another, they are just different. I personally use jshint. Install it from terminal by typing `apm install linter-jshint` and then give it's path in settings just like the previous one.

![Linter](/images/posts/linter-js.gif)

I use php a lot and php has some popular linter package. But I think [PHP code sniffer](https://packagist.org/packages/squizlabs/php_codesniffer) is the most popular and one of the best package for php. You can install the package form terminal by typing `apm install linter-phpcs`. It assume youe machine already has phpcs installed. If not you could install it in a number of ways. One of the popular way is to install it through pear. Just type `pear install PHP_CodeSniffer` and you are good to go. But I prefer another way, and it's through composer. If you are a php guy, I assume you have familiarity with both pear and composer. You can install it from terminal with `composer global require "squizlabs/php_codesniffer=*"` command. Then just give the path of phpcs to the settings of the package.

Thats it. From now on if you do something wrong while typing, atom linter will show errors.

Thats all for today. Peace.
