---
extends: _layouts.post
title: ডাটা স্ট্রাকচারঃ Queue
date: '2011-05-22'
gist: How to implement queue.
section: content
---

কিউ হচ্ছে First In First Out(FIFO) ডাটা স্ট্রাকচার। অর্থাৎ যে আইটেমটা সবার প্রথমে ইনসার্ট করা হয় সেটাই সবার প্রথমে ডিলিট করা হয়। অ্যারে বা লিঙ্ক লিস্ট ব্যবহার করে কিউ তৈরী করা যায়।

C++ কোড:

```
//Queue using array
//Author: Milon

#include<iostream>
using namespace std;

#define MAX 5           // MAXIMUM CONTENTS IN QUEUE


class queue{
private:
    int t[MAX];
    int add;      // Addition End
    int del;      // Deletion End

public:
    queue(){
        del=-1;
        add=-1;
        }

    void delet(){
        int tmp;
        if(del==-1){
            cout<<"Queue is Empty"<<endl;
            }
        else{
            for(int j=0;j<=add;j++){
                if((j+1)<=add){
                    tmp=t[j+1];
                    t[j]=tmp;
                    }
                else{
                    add--;
                    if(add==-1)
                        del=-1;
                    else
                        del=0;
                    }
                }
            }
        }

    void insert(int item){
        if(del==-1 && add==-1){
            del++;
            add++;
            }
        else{
            add++;
            if(add==MAX){
                cout<<"Queue is Full"<<endl;
                add--;
                return;
                }
            }
        t[add]=item;
        }

    void display(){
        if(del!=-1){
            for(int i=0;i<=add;i++)
                cout<<t[i]<<" ";
            }
        else
            cout<<"Queue is Empty"<<endl;
        }
    };

int main(){
    queue q;
    int data[5]={32,23,45,99,24};
    cout<<"Queue before adding Elements: ";
    q.display();
    cout<<endl<<endl;
    for(int i=0;i<5;i++){
        q.insert(data[i]);
        cout<<"Addition Number : "<<(i+1)<<" : ";
        q.display();
        cout<<endl;
        }
    cout<<endl;
    cout<<"Queue after adding Elements: ";
    q.display();
    cout<<endl<<endl;
    for(int i=0;i<5;i++){
        q.delet();
        cout<<"Deletion Number : "<<(i+1)<<" : ";
        q.display();
        cout<<endl;
        }
    return 0;
    }
```

Java কোড:

```
//Queue
//Author: Milon

import java.util.NoSuchElementException;

//Node class
class Node{
    //Instance variable
    private Object data;
    private Node nextNode;

    //Constructor
    public Node(){
        data = null;
        nextNode = null;
        }

    public Node(Object item, Node next){
        data = item;
        nextNode = next;
        }

    //Set methods
    public void setData(Object item){
        data = item;
        }

    public void setNextNode(Node next){
        nextNode = next;
        }

    //Get methods
    public Object getData(){
        return data;
        }

    public Node getNextNode(){
        return nextNode;
        }

    //Overloaded toString() method
    public String toString(){
        return ("" + data);
        }
    }

//Queue class
public class Queue{
    //Instance variable
    private Node head;
    private Node tail;
    private int size;

    //Constructor
    public Queue(){
        head = tail = null;
        size = 0;
        }

    //Returns is the queue empty
    public boolean isEmpty(){
        return head == null;
        }

    //Returns the size of the Queue
    public int size(){
        return size;
        }

    //Push method
    public void push(Object item){
        head = tail = new Node(item, head);
        ++size;
        }

    //pop method
    public Object pop(){
        if(isEmpty()){
            System.out.println("Stack is empty.");
            //throw new NoSuchElementException;
            return null;
            }
        if(head.getNextNode() == tail){
            Node current = head;
            head = tail = null;
            return current.getData();
            }
        Node current = head;
        while(current.getNextNode().getNextNode() !=null)
            current = current.getNextNode();
        Object obj = current.getNextNode().getData();
        current.setNextNode(null);
        tail = current;
        --size;
        return obj;
        }

    //Overloaded toString method to show the entire list
    public String toString(){
        String str = "[ ";
        if(head != null){
            str += head.getData();
            Node current = head.getNextNode();
            while(current.getNextNode() != null){
                str += ", " + current.getData();
                current = current.getNextNode();
                }
            str += ", " + current.getData();
            }
        str += " ]";
        return str;
        }
    }
```

```
//Queue Implementation class
//Author: Milon

import java.util.Scanner;
import java.util.Random;

public class QueueImplement{
    public static void main(String args[]){
        Scanner input = new Scanner(System.in);
        Random rand = new Random();
        Queue queue= new Queue();

        System.out.print("How many number of element do you want: ");
        int n = input.nextInt();

        for(int i=0;i<n;i++)
            queue.push(new Integer(rand.nextInt(100)));

        while(true){
            System.out.println("\n\n");
            System.out.println("* * * * * Queue Implementation * * * * *");
            System.out.println("1\. Show the whole queue.");
            System.out.println("2\. Show does the queue empty.");
            System.out.println("3\. Insert an element.");
            System.out.println("4\. Delete an element.");
            System.out.println("5\. Show the queue size.");
            System.out.println("6\. Exit.");
            System.out.println("\n\n");

            System.out.print("Enter your choice: ");
            int choice = input.nextInt();

            switch(choice){
                case 1:
                        System.out.println("The queue is: " + queue.toString());
                        break;

                case 2:
                        if(queue.isEmpty())
                            System.out.println("The queue is empty.");
                        else
                            System.out.println("The queue is not empty.");
                        break;

                case 3:
                        System.out.print("Inter the element: ");
                        int item = input.nextInt();
                        queue.push(new Integer(item));
                        System.out.println("Item inserted successfully.");
                        break;

                case 4:
                        System.out.println("Item " + queue.pop() + " deleted successfully.");
                        break;

                case 5:
                        if(queue.isEmpty())
                            System.out.println("The queue is empty.");
                        else
                            System.out.println("Size of the queue is " + queue.size());
                        break;

                case 6:
                        System.exit(1);
                        break;

                default:
                        break;
                }
            }
        }
    }
```
