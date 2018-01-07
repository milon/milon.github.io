---
extends: _layouts.post
title: ডাটা স্ট্রাকচারঃ Weighted Graph
date: '2011-05-24'
gist: How to implement weighted graph.
section: content
---

যে গ্রাফের প্রত্যেকটা এজের(edge) একটা Weight বা মান দেয়া থাকে তাকে Weighted Graph বলে। Weighted graph তৈরীর কৌশল হল-

```
//Weighted graph
//Author: Milon

#include<iostream>
#include<cstdio>
using namespace std;

int main(){
    int n;
    cout<<"Enter the number of nodes: ";
    cin>>n;
    int list[n][n];

    //Initialize
    for(int i=0;i<n;i++)
        for(int j=0;j<n;j++)
            list[i][j]=false;
    cout<<"Enter an edge(start_node< >end_node< >weight)"<<endl;
    cout<<"Press (0 0 0) to end:"<<endl;

    //Making graph
    while(true){
        int a,b,c;
        cin>>a>>b>>c;
        if(a==0 && b==0 && c==0)
            break;
        if(a>n || b>n || a<=0 || b<=0)
            cout<<"Invalid input"<<endl;
        else{
            list[a-1][b-1]=c;
            //list[b-1][a-1]=true;      //for undirected weighted graph
        }
    }
    cout<<endl;

    //Print adjacency matrix
    cout<<"Adjacency matrix:"<<endl;
    for(int i=0;i<n;i++) {
        for(int j=0;j<n;j++)
            printf("%4d",list[i][j]);
        cout<<endl;
    }

    return 0;
}
```
