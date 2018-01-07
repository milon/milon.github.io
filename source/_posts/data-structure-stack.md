---
extends: _layouts.post
title: ডাটা স্ট্রাকচারঃ Stack
date: '2011-05-22'
gist: How to implement stack.
section: content
---

স্ট্যাক হচ্ছে Last In First Out(LIFO) ডাটা স্ট্রাকচার। অর্থাৎ যে আইটেমটা সবার শেষে ইনসার্ট করা হয় সেটাই সবার প্রথমে ডিলিট করা হয়। অ্যারে বা লিঙ্ক লিস্ট ব্যবহার করে স্ট্যাক তৈরী করা যায়।

C++কোড:

```
//Stack using array
//Author: Milon

#include<stdio.h>
//#include<conio.h>

#define max 50

void push();
void pop();
void display();

int top=0;
int stack[max];

void main(){
    int c=0;
    char ch;
    do{
        //clrscr();
        printf("This program is for Push & Pop operation.\n");
        printf("Enter your choice:\n");
        printf("# (P)ush operatino.\n");
        printf("# Pop (O)peration.\n");
        printf("# (D)isplay stack.\n");
        printf("# (E)xit.\n\n");
        printf("Enter your choice: ");
        ch=getchar();
        switch(ch){
            case 'P':
            case 'p':
                push();
                break;
            case 'O':
            case 'o':
                pop();
                break;
            case 'D':
            case 'd':
                display();
                break;
            case 'E':
            case 'e':
                c=1;
                break;
            default:
                printf("\nInvalid input.");
                //getch();
                break;
            }
        }while(c!=1);
    }

void push(){
    int data;
    if(top==max){
        printf("\nStack is overflow.");
        //getch();
        return;
        }
    printf("\nEnter data for Push: ");
    scanf("%d",&data);
    top=top+1;
    stack[top]=data;
    printf("\nPush operation complete successfully.");
    //getch();
    }

void pop(){
    if(top==0){
        printf("\nStack is underflow.");
        //getch();
        return;
        }
    printf("\nData %d is deleted.",stack[top]);
    top=top-1;
    printf("\nPop operation complete successfully.");
    //getch();
    }

void display(){
    if(top==0){
        printf("\nStack is empty.");
        //getch();
        return;
        }
    printf("\nStack: ");
    for(int i=1;i<=top;i++)
        printf("%d -->",stack[i]);
    //getch();
    }
```

Java কোড:

```
//Stack
//Author: Milon

import java.util.NoSuchElementException;

//Node class
class Node{
    //Instance variable
    protected Object data;
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
    public void setData(int item){
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

    //Overloaded toString method
    public String toString(){
        return "" + data;
        }
    }

//Stack class
public class Stack{
    //Instance variable
    private Node top;
    private int size;

    //Constructor
    public Stack(){
        top = null;
        size = 0;
        }

    //Returns is the stack empty
    public boolean isEmpty(){
        return top == null;
        }

    //Returns size of the stack
    public int size(){
        return size;
        }

    //Push method
    public void push(Object item){
        top = new Node(item, top);
        ++size;
        }

    //Pop method
    public Object pop(){
        if(!isEmpty()){
            Node current = top;
            top = top.getNextNode();
            --size;
            return current.getData();
            }
        else{
            System.out.println("Stack underflow.");
            //throw new NoSuchElementException();
            return null;
            }
        }

    //Peek method
    public Object peek(){
        if(!isEmpty())
            return top.getData();
        else{
            System.out.println("Stack underflow.");
            //throw new NoSuchElementException();
            return null;
            }
        }

    //Overloaded toString method to show the entire list
    public String toString(){
        String str = "[ ";
        if(top != null){
            str += top.getData();
            Node current = top.getNextNode();
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
//Stack Implementation class
//Author: Milon

import java.util.Scanner;
import java.util.Random;

public class StackImplement{
    public static void main(String args[]){
        Scanner input = new Scanner(System.in);
        Random rand = new Random();
        Stack stack = new Stack();

        System.out.print("How many number of element do you want: ");
        int n = input.nextInt();

        for(int i=0;i<n;i++)
            stack.push(new Integer(rand.nextInt(100)));

        while(true){
            System.out.println("\n\n");
            System.out.println("* * * * * Stack Implementation * * * * *");
            System.out.println("1\. Show the whole stack.");
            System.out.println("2\. Show does the stack empty.");
            System.out.println("3\. Show the top element.");
            System.out.println("4\. Insert an element.");
            System.out.println("5\. Delete an element.");
            System.out.println("6\. Show the stack size.");
            System.out.println("7\. Exit.");
            System.out.println("\n\n");

            System.out.print("Enter your choice: ");
            int choice = input.nextInt();

            switch(choice){
                case 1:
                        System.out.println("The stack is: "+stack.toString());
                        break;

                case 2:
                        if(stack.isEmpty())
                            System.out.println("The stack is empty.");
                        else
                            System.out.println("The stack is not empty.");
                        break;

                case 3:
                        System.out.println("The top element is "+stack.peek());
                        break;

                case 4:
                        System.out.print("Inter the element: ");
                        int item = input.nextInt();
                        stack.push(new Integer(item));
                        System.out.println("Item inserted successfully.");
                        break;

                case 5:
                        System.out.println("Item "+stack.pop()+" deleted successfully.");
                        break;

                case 6:
                        if(stack.isEmpty())
                            System.out.println("The stack is empty.");
                        else
                            System.out.println("Size of the stack is "+stack.size());
                        break;

                case 7:
                        System.exit(1);
                        break;

                default:
                        break;
                }
            }

        }
    }
```
