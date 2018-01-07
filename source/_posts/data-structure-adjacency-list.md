---
extends: _layouts.post
title: ডাটা স্ট্রাকচারঃ Adjacency List
date: '2011-05-24'
gist: How to implement adjacency list.
section: content
---

গ্রাফের নোডের সংখ্যা যদি অনেক বেশী হয়, তখন Adjacency Matrix ব্যবহার করে গ্রাফ তৈরী করা অসুবিধাজনক। সেক্ষেত্রে Linked List ব্যবহার করে গ্রাফ তৈরী করা হয়। গ্রাফের এই ধরনের উপস্থাপনাকে Adjacency List বলে।

```
//Adjacency list
//Author: Milon

#include<iostream>
#include<cstdlib>
using namespace std;

struct list{
    int val;
    struct list *next;
    };

struct list head[6];

int main(){
    list *ptr,*newnode;
    int data[14][2] = {{1,2},{2,1},{1,5},{5,1},{2,3},{3,2},{2,4},
                       {4,2},{3,4},{4,3},{3,5},{5,3},{4,5},{5,4}};

    //Adjacency list creation
    cout<<"The adjacent list of the graph : "<<endl;
    for(int i=1;i<6;i++){
        head[i].val=i;
        head[i].next=NULL;
        cout<<"Vertix "<<i<<" => ";
        ptr=&(head[i]);
        for(int j=0;j<14;j++){
            if(data[j][0]==i){
                newnode=new list();
                newnode->val=data[j][1];
                newnode->next=NULL;
                while(ptr!=NULL)
                   ptr=ptr->next;
                ptr=newnode;
                cout<<"["<<newnode->val<<"] ";
            }
        }
        cout<<endl;
    }
    return 0;
}
```
