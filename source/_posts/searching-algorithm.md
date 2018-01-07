---
extends: _layouts.post
title: সার্চিং এ্যালগরিদম (Searching algorithm)
date: '2011-06-17'
gist: Comparison between different searching algorithm.
section: content
---

সার্চিং প্রোগ্রামিং এর ক্ষেত্রে একটি অত্যন্ত গুরুত্বপূর্ণ বিষয়। সিংহভাগ প্রোগ্রামের ক্ষেত্রেই কোন না কোন সার্চ আমাদের করতে হয়। সার্চিংয়ের ক্ষেত্রে লিনিয়ার সার্চ, বাইনারী সার্চ, ব্রেথ ফার্স্ট সার্চ(BFS), ডেপথ ফার্স্ট সার্চ(DFS) ইত্যাদি জনপ্রিয় এ্যালগরিদম। তবে BFS এবং DFS গ্রাফের সাথে সম্পর্কিত বলে আজকে এ বিষয়ে আলোচনা করব না।

**লিনিয়ার সার্চঃ**

লিনিয়ার সার্চ হল সবচেয়ে সহজ এবং সর্বাধিক ব্যবহৃত সার্চিং এ্যালগরিদম। এই এ্যালগরিদমের ক্ষেত্রে একসারি তথ্যের(ডাটা) মধ্য থেকে কাঙ্খিত তথ্যটি খুজে পাওয়ার জন্য একটি একটি করে সবগুলো ডাটা খুঁজে দেখা। যদি কাঙ্খিত ডাটাটি খুঁজে পাওয়া যায় তবে খোঁজা বন্ধ করে দেয়া হয়।

সুবিধাঃ

- কোড করা অনেক সহজ।
- ডাটা যে অবস্থাতেই থাক না কেন খুঁজে পাওয়া সম্ভব।
- অল্প সংখ্যক ডাটা থেকে কাঙ্খিত ডাটা খোঁজার জন্য অত্যন্ত উপযোগী।

অসুবিধাঃ

- তথ্য খুঁজে পেতে অনেক বেশি সময় লাগে।
- অধিক পরিমানে তথ্যের মধ্য থেকে খোঁজার জন্য উপযোগী নয়।

C++ প্রোগ্রামিং ভাষায় সোর্স কোডঃ

```
//Linear search

#include<iostream>
using namespace std;

int linear_search(int *a,int size, int key){
    for(int i=0;i<size;i++)
        if(a[i] == key)
            return i+1;
    return 0;
}

int main(){
    int n, key;
    cout<<"How many number do you want: ";
    cin>>n;
    int arr[n];
    cout<<"Enter "<<n<<" numbers:"<<endl;
    for(int i=0;i<n;i++)
        cin>>arr[i];
    cout<<"Enter the searching number: ";
    cin>>key;
    int res = linear_search(arr, n, key);
    if(res==0)
        cout<<"Key not found."<<endl;
    else
        cout<<"Key found at position "<<res<<"."<<endl;
    return 0;
}
```

Java প্রোগ্রামিং ভাষায় সোর্স কোডঃ

```
//Linear Search

import java.util.Scanner;

public class LinearSearch{
    public static int linearSearch(int a[], int key) {
        for(int i=0;i<a.length;i++)
            if(a[i] == key)
                return i+1;
        return 0;
    }

    public static void main(String args[]) {
        Scanner input = new Scanner(System.in);
        System.out.println("Linear Search");
        System.out.print("Enter the number of element in array: ");
        int n = input.nextInt();
        int arr[] = new int[n];
        System.out.print("Enter " + n + " numbers: ");
        for(int i=0;i<n;i++)
            arr[i] = input.nextInt();
        System.out.print("Enter the searching key: ");
        int key = input.nextInt();
        if(linearSearch(arr, key) != 0)
            System.out.println("Key found at " + linearSearch(arr, key) + " position.");
        else
            System.out.println("Key not found.");
    }
}
```

**বাইনারী সার্চঃ**

বাইনারী সার্চ সবচেয়ে কার্যকর সার্চিং এ্যালগরিদম। এর মাধ্যমে খুব কম সময়ে বিপুল পরিমান তথ্যের মধ্য থেকে কাঙ্খিত তথ্যটি খুঁজে পাওয়া যায়। এর জন্য ডাটাগুলোকে সর্টিং বা সাজানো অবস্থায় থাকা লাগে। সাজানো ডাটা গুলোর মধ্য থেকে মাঝের ডাটাটিকে নিয়ে প্রথমে চেক করা হয়। যদি আমার কাঙ্খিত ডাটা মাঝের ডাটা থেকে বড় হয় তবে মাঝের ডাটাটির চেয়ে ছোট সবগুলোকে বাদ দিয়ে আবার মাঝের ডাটা বের করা হয়। এভাবে কাঙ্খিত তথ্য খুঁজে না পাওয়া পর্যন্ত এ প্রক্রিয়া চালানো হয়।

সুবিধাঃ

- খুব অল্প সময়ের মধ্যে তথ্য খুঁজে বের করা যায়।
- বিপুল পরিমান তথ্য খোঁজার জন্য খুবই উপযোগী।

অসুবিধাঃ

- তথ্য সর্টেড বা সাজানো থাকতে হয়।
- অল্প পরিমান ডাটা খোঁজার জন্য খুব বেশি ফলপ্রসূ হয় না।

C++ প্রোগ্রামিং ভাষায় সোর্স কোডঃ

```
//Binary search

#include<iostream>
#include<algorithm>

using namespace std;

int binary_search(int a[], int size, int key) {
    int beg = 0, end = size-1;
    int mid = (beg+end)/2;
    while(beg<=end){
        if(key<a[mid])
            end = mid-1;
        else
            beg = mid+1;
        if(a[mid]==key)
            break;
        mid = (beg+end)/2;
        }
    if(a[mid]==key)
        return mid+1;
    return 0;
}

int main() {
    int n, key;
    cout<<"How many number do you want: ";
    cin>>n;
    int arr[n];
    cout<<"Enter "<<n<<" numbers:"<<endl;
    for(int i=0;i<n;i++)
        cin>>arr[i];
    sort(arr, arr+n);
    cout<<"Sorted elements are:"<<endl;
    for(int i=0;i<n;i++)
        cout<<arr[i]<<" ";

    cout<<"Enter the searching number: ";
    cin>>key;
    int res = binary_search(arr, n, key);
    if(res==0)
        cout<<"Key not found."<<endl;
    else
        cout<<"Key found at position "<<res<<"."<<endl;
    return 0;
}
```

Java প্রোগ্রামিং ভাষায় সোর্স কোডঃ

```
//Binary Search

import java.util.Scanner;

public class BinarySearch{
    public static int binarySearch(int a[], int key) {
        int beg = 0, end = a.length-1;
        int mid = (beg+end)/2;
        while(beg<=end){
            if(key<a[mid])
                end = mid-1;
            else
                beg = mid+1;
            if(a[mid]==key)
                break;
            mid = (beg+end)/2;
        }
        if(a[mid]==key)
            return mid+1;
        return 0;
    }

    public static void bubbleSort(int a[]) {
        for(int i=0; i<a.length-1; i++){
            for(int j=i+1; j<a.length; j++){
                if(a[i]>a[j]){
                    int temp = a[i];
                    a[i] = a[j];
                    a[j] = temp;
                }
            }
        }
    }

    public static void main(String args[]) {
        Scanner input = new Scanner(System.in);
        System.out.println("Binary Search");
        System.out.print("Enter the number of element in array: ");
        int n = input.nextInt();
        int arr[] = new int[n];
        System.out.print("Enter " + n + " numbers: ");
        for(int i=0;i<n;i++)
            arr[i] = input.nextInt();
        bubbleSort(arr);
        System.out.print("Array after sorting: ");
        for(int i: arr)
            System.out.print(i + " ");
        System.out.println();
        System.out.print("Enter the searching key: ");
        int key = input.nextInt();
        if(binarySearch(arr, key)!=0)
            System.out.println("Key found at "+ binarySearch(arr, key) + " potision.");
        else
            System.out.println("Key not found.");
    }
}
```
