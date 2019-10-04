---
extends: _layouts.post
title: 'Never use rm, instead use trash'
date: '2016-03-19'
gist: I thoughts on why everyone should use `trash` command instead of using `rm`.
section: content
syntaxHighlight: true
categories: []
---

Those who use command line heavily, they use a command called `rm` almost everyday. I myself use command line everyday, and I most often use rm for deleting files and folders. Things getting more worse when you chain `-rf` command with `rm`. Last week I was working on a project and I accidently run `rm -rf` command to my project root directory. Then all my codes were gone and it's not reversible. Thanks to git, I don't loose all my codes, but the latest uncommited changes.

After that incident, I tried to find some solution. Then I find an awesome tool called [trash](https://github.com/sindresorhus/trash). It's a simple node module and you can use it to your project. But I installed it globally so that I can use it anywhere on my machine. It deletes your files and folders just like `rm` but it put then to trash. So, you can undo the process.

![Trash Logo](/assets/images/posts/trash.png)

The installing process is very strait forward. I assume your machine has already node and npm installed. If not, then install them. After that run this command on your terminal-

```
npm install -g trash-cli
```

If it shows an error, try with `sudo`. Then you are good to go.

Using trash is very easy. If you are familiar with `rm` then you are already known to `trash`. It uses similar commands. Here is an example-

```
trash file.txt
```

You can do some complicated operation also.

```
trash '*.png' '!welcome.png'
```

This command will delete all your png files except welcome.png.

Hope you will like it, and never use `rm` from now on. Peace.
