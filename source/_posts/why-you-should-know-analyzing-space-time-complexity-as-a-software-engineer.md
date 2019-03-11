---
extends: _layouts.post
title: Why you should know analyzing space time complexity as a software engineer?
date: '2019-03-11'
gist: Importance of space time complexity analysis in software engineering field.
section: content
syntaxHighlight: true
categories: []
---

Like tons of other software engineers, I also thought for a very long time that, knowing this Big O or Big Θ is only for a programming contest, there are very few impacts of these in day to day life in most software projects. Yah yah, I got it, if you are working on google, facebook or this type of tech giant, that may not be 100% right, but how many people you know working there as a software engineer? And what is the percentage of them in your address book? Even, not all of the engineers at those company working for developing a groundbreaking algorithm every day. Then what is the necessity of learning this?

Like most of the computer science student, I learned them too, and when I did programming contest regularly, I used to know the complexity of common data structure and algorithms. I used to tell the difference between `O(n log(n))` and `O(n^2)` and why merge sort is better than quicksort. But, I forgot all of those, in the last 6 years after I left college. And to be frank with you, I hardly needed them. One reason, I never need to handle a problem that critical to space-time and today's computing hardware is too capable that I never need to worry about micro optimism. And it's true in a sense. It's much more important to make a code readable that fight over why you should use single quote over a double quote in PHP. So, why I am talking about this now? Well, I faced a problem last week, and that makes me re-think my perspective on this whole thing again.

I was trying to optimize the cache mechanism of one of our product, but the script was failing often because it was too memory hungry. I am not gonna tell what happens, but I can give you a hint. When you are working with a fairly large dataset, and do a bunch of instruction on loop, even reduce a small computation can save you a lot. For example, look at this simple loop-

```
for($i=0; $i<count($arr); $i++) {
    // do your thing
}
```

If you just store the value of `count($arr)` in a variable and then use that variable in the loop, it will save you `N` number of instructions assuming the number of elements in the array is `N`.

The code I was working on was well documented and maintained, but it was failing for this type of problem. Being honest here, it took quite a while for me to figure out the problem. Then, I figure out why that took so long? Because I forgot everything about space-time complexity analysis. So, I invest some time to re-learn this again, and now I feel good.

Don't get me wrong, I am not asking you to give up all the readability or maintainability of your codebase just for the sake of optimization. But You should know this to be a better software engineer. All I am asking to add this to your toolbox, so whenever needed, you can use this tool to get the job done. And another thing, for a very good reason, asking a question about space-time complexity is one of the favorite questions of the interviewers. So, by knowing this, you are one step ahead to land your dream job.

Happy coding!
