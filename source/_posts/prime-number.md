---
extends: _layouts.post
title: মৌলিক সংখ্যা (Prime number)
date: '2011-05-25'
gist: Implement and optimize prime number generation algorithm.
section: content
---

Prime number বা মৌলিক সংখ্যা হচ্ছে সে সব সংখ্যা যার ১ এবং ঐ সংখ্যা ছাড়া আর কোন উৎপাদক নেই। অর্থাৎ ঐ সংখ্যাটি ১ এবং ঐ সংখ্যা ছাড়া নিঃশেষে বিভাজ্য নয়।

প্রোগ্রামারদের কাছে মৌলিক সংখ্যা খুব পছন্দের একটা বিষয়। যে কোন ধরনেন প্রোগ্রামিং প্রতিযোগিতায় সাধারনত অন্তত একটা সমস্যা থাকে প্রাইম নাম্বার থেকে। প্রাইম নাম্বার বের করার প্রোগ্রামটি খুব সহজেই লিখে ফেলা যায়।

```
//Prime number check
//Author: Milon

#include<iostream>
using namespace std;

bool isPrime(int num){
    if(num<2)
        return false;
    for(int i=2;i<num;i++)
        if(num%i==0)
            return false;
    return tru e;
}

int main(){
    int n;
    while(cin>>n && n){
        if(isPrime(n))
            cout<<n<<" is a prime number."<<endl;
        else
            cout<<n<<" is not a prime number."<<endl;
        }
    return 0;
}
```

উপরের প্রোগ্রামটিতে সব গুলো সংখ্যা দিয়ে num কে ভাগ করা হয়েছে, যার আসলে কোন প্রয়োজন নেই। কারন কোন জোড় সংখ্যা কখনো প্রাইম নাম্বার হতে পারে না। সেক্ষেত্রে প্রোগ্রামটি হবে-

```
//Prime number check
//Author: Milon

bool isPrime(int num){
    if(num<2)
        return false;
    if(num==2)
        return true;
    if(num%2==0)
        return false;
    for(int i=3;i<num;i+=2)
        if(num%i==0)
            return false;
    return true;
}
```

এখানেও শেষ পর্যন্ত চেক করা হয়েছে। যার আসলে দরকার নেই। কারন ঐ সংখ্যাটি মৌলিক কিনা তা চেক করার জন্য ঐ সংখ্যার অর্ধেক পর্যন্ত চেক করলেই চলে। সেক্ষেত্রে প্রোগ্রামটি হবে-

```
//Prime number check
//Author: Milon

bool isPrime(int num){
    if(num<2)
        return false;
    if(num==2)
        return true;
    if(num%2==0)
        return false;
    for(int i=3;i<num/2;i+=2)
        if(num%i==0)
            return false;
    return true;
}
```

অর্ধেক পর্যন্ত চেক করার প্রয়োজনও আসলে নাই। ঐ সংখ্যার বর্গমূল পর্যন্ত চেক করলেই চলে-

```
//Prime number check
//Author: Milon

bool isPrime(int num){
    if(num==1)
        return false;
    if(num==2)
        return true;
    if(num%2==0)
        return false;
    for(int i=3;i*i<=num;i+=2)
        if(num%i==0)
            return false;
    return true;
}
```

প্রাইম নাম্বার বের করার সবচেয়ে ভাল পদ্ধতি হচ্ছে Sieve of Eratosthenes. গ্রীক গণিতবিদ Eratosthenes এই পদ্ধতিটি আবিস্কার করেন। এই পদ্ধতিটিতে প্রথমে যে সংখ্যাগুলোর মধ্য থেকে প্রাইম নাম্বার বের করা হবে সেগুলিকে একটা অ্যারের মধ্যে রাখা হয়। মনে করি আমরা ১ থেকে ৫০ পর্যন্ত সংখ্যার মধ্যে প্রাইম নাম্বার বের করব। তাহলে prime নামের অ্যারের মধ্যে আমরা সংখ্যাগুলোকে রাখব। আমরা ধরে নিলাম এর সবগুলোই প্রাইম নাম্বার। প্রথমে ০ এবং ১ প্রাইম নাম্বার না। তাই এ দুটোকে বাদ দিলাম। ২ প্রাইম সংখ্যা, কিন্তু এর গুনিতক একটাও প্রাইম নাম্বার না। তাই ৪, ৬, ৮, ১০, ১২ এগুলোকে বাদ দিলাম। এরপরের প্রাইম নাম্বার ৩। ৩ এর সব গুনিতক বাদ। এরপর ৪, কিন্তু ৪ আগেই বাদ পড়েছে। এরপর ৫ প্রাইম নাম্বার, ৫ এর সব গুনিতক বাদ। এভাবে চলতে চলতে ৫০ এর বর্গমূল পর্যন্ত চেক করলেই আমরা সব প্রাইম নাম্বার পেয়ে যাব।

```
//Sieve of Eratosthenes
//Author: Milon

#include<cstdio>
#include<cmath>
using namespace std;

#define max 19000000

bool prime[max+1];

void sieve() {
    long int i,j;
    for(i=2;i<=max;i++)
        prime[i]=true;
    for(i=2;i*i<=max;){
        for(j=2*i;j<=max;j+=i){
            prime[j]=false;
        }
        i++;
        while(!prime[i])
            i++;
    }
}

int main() {
    sieve();
    long int n;
    while(scanf("%ld",&n)==1){
        if(prime[n]==true)
            printf("prime\n");
        else
            printf("not prime\n");
    }
    return 0;
}
```
