---
extends: _layouts.post
title: ডাটা স্ট্রাকচারঃ Undirected Graph
date: '2011-05-23'
gist: How to implement undirected graph.
section: content
---

Directed Graph আর Undirected Graph এর মধ্যে বিশেষ তফাৎ নেই। শুধুমাত্র পেছনে আসার রাস্তাটা বন্ধ করে দিলেই Undirected Graph টা Directed হয়ে যাবে।

```
//Directed graph
//Author: Milon

#include<iostream>
#include<cstdio>
using namespace std;

int main(){
    int n;
    cout<<"Enter the number of nodes: ";
    cin>>n;
    bool list[n][n];

    //Initialize
    for(int i=0;i<n;i++)
        for(int j=0;j<n;j++)
            list[i][j]=false;
    cout<<"Enter an edge(start_node end_node)"<<endl;
    cout<<"Press (0 0) to end:"<<endl;

    //Making graph
    while(true){
        int a,b;
        cin>>a>>b;
        if(a==0 && b==0)
            break;
        if(a>n || b>n || a<=0 || b<=0)
            cout<<"Invalid input"<<endl;
        else{
            list[a-1][b-1]=true;
            //list[b-1][a-1]=true;      //for undirected graph
        }
    }
    cout<<endl;

    //Print adjacency matrix
    cout<<"Adjacency matrix:"<<endl;
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++)
            printf("%4d",list[i][j]);
        cout<<endl;
    }
    return 0;
}
```
