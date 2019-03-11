---
extends: _layouts.post
title: 'Adminer, a great tool for accessing databases'
date: '2016-04-19'
gist: My thoughts on single file RDBMS management tool Adminer.
section: content
syntaxHighlight: false
categories: []
---

Most of the web developers specially who used to write code in PHP, including myself using [phpmyadmin](https://www.phpmyadmin.net/) for a very long time for database management. I myself used this tool for last 6 years or so. But recently I was introduced to a great tool called [adminer](https://www.adminer.org/en/) while facing problem to install phpmyadmin on [homestead](https://laravel.com/docs/5.2/homestead) box.

![Adminer Logo](/images/posts/adminer-logo.png)

Long story short, it is a single php file which has almost all the functionality that phpmyadmin has with a bunch of other useful features. Also it supports mySQL, SQLite 2 & 3, PostgreSQL, Oracle, MS SQL, Firebird, SimpleDB, MongoDB and ElasticSearch where phpmyadmin only supports mysql. It is also extremely lightweight and portable as it is only one file. The compressed file is only 231 kB and if you use the English version without 36 other language's translation it turns into 167 kB only. If you use mySQL only, then you reduce the size to 155 kB for translated version and 94 kB for english only version. That's insane.

You can find a [full comparison](https://www.adminer.org/en/phpmyadmin) with phpmyadmin to their site. It can work with various plugins and has a bunch of themes. It's released under GPL2 and Apache License and it's totally free to use.

Besides that, it has a Debian package, Arch Linux package, WordPress plugin, Drupal module, Joomla extension (1, 2) Moodle plugin, TYPO3 extension, CMS Made Simple Module, Laravel, AMPPS, and Nette package.

After finding this, I just uninstall phpmyadmin form my machine and immediately switched to adminer. Hopefully, you would like it also.
