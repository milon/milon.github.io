---
extends: _layouts.post
title: Setting Up Atom Editor for Software Development – 03
date: '2016-03-06'
gist: >-
  This is the third part of my setting up development environment in Atom editor
  by Github.
section: content
syntaxHighlight: true
---

In this episode I am going to talk about some basic package of atom. I told you earlier that atom is a text editor and it is not as feature rich as other IDEs like PhpStorm or Netbeans. But you could give it additional functionality with various packages.

First I am talking about a package that will give a nice look to your editor. The package is called [file-icons](https://atom.io/packages/file-icons). A number of icons and colors are provided by default for a range of common file types. If you have file that you would like custom icons for you can easily add this yourself. You can install it with this command- `apm install file-icons` or from settings menu's install tab.

![File Icons](/images/posts/file-icon.png)

The next package is inspired by Sublime Text's minimap feature. Actually I am a very big fan of [minimap](https://atom.io/packages/minimap) and I use this feature in every editor I use. Install it through `apm install minimap` or via settings menu. From settings menu you can change the position either in left or right and enable or disable colors. You can also scroll via clicking on minimap and also automatic hide minimap pane.

![Minimap](/images/posts/minimap.png)

Now I am talking about a very famous package that you might already familiar with. It is none other emmet, which was used to known as zen coding. It will boost up your development speed a lot. You can find the documentation and installation instruction on their official website [emmet.io](http://emmet.io)

What emmet does is with a keypress it expand HTML tags. like if you type `a>img` and then press `tab` or `Ctrl+e` then it will expand to `<a href=""><img src="" alt=""></a>` which is very handy. But for atoms default keybinding, tab is not working all the time. You could add the following line to you `config.cson` file to work it properly.

```
# Emmet
'atom-text-editor:not([mini])':
'tab': 'emmet:expand-abbreviation-with-tab'
```

I generally use markdown instead any rich text editor like MS Word or Libre Office. If you are like me [Markdown preview plus](https://atom.io/packages/markdown-preview-plus) can be a great tool for you. Just install the package from package installer and press `ctrl+shift+m` to view preview. For mathematical equation rendering press `Ctrl+shift+x` and see the magic.

Thats all for today. See you guys in the next episode. Piece.
