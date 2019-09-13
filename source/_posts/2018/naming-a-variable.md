---
extends: _layouts.post
title: Naming a variable
date: '2018-02-04'
gist: My two cents on naming a variable while programming.
section: content
syntaxHighlight: false
categories: [clean-code, programming]
---

There is a saying that-

> There are two things that is really difficult in programming. One is naming a variable and other is cache invalidation.

So, you might think naming is easy, but it's not that easy that you think. And another think is while we are talking about naming, it's not only variable, it goes all the way to a class name, database table, a column name, css class name etc.

First, there are some golden rules, that everybody knows. I am once again remind you that-

- Don't use too short or too long names. We a **meaningful** one.
- Don't use any reserved keyword.
- Use permitted characters only while naming, for example, in PHP use only, letters, numbers and underscore (`_`).
- Don't start a variable name with numbers.

There are some other things also. These are not rules, but recommendations. A good programmer should follow these-

- Use a good multiple word identifier. It could be `_`, it could be `-` or it could camel case.
- Use a consistent format, whether it is camel case, snake case, kebab case or stadly case.
- Use community recommendations, like- PSR-1 and 2, PEP-8 etc.

There are some personal recommendations from me as well-

- Use a multiple word name rather that plural. In my opinion `$memberList` is more readable than `$members`.
- Fix your indentations.
- Remove unnecessary variables.

These came from my idle brain this morning, If you have something to say, please let me know. Peace.
