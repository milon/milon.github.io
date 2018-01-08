---
extends: _layouts.post
title: ডাটা স্ট্রাকচারঃ Linked List
date: '2011-05-22'
gist: How to implement list.
section: content
---

লিঙ্ক লিস্ট অত্যন্ত গুরুত্বপূর্ণ ডাটা স্ট্রাকচার। বহু ক্ষেত্রে লিঙ্ক লিস্টের ব্যবহার হয়ে থাকে। ডায়নামিক মেমোরী এ্যালোকেশনের ক্ষেত্রে লিঙ্ক লিস্টই হচ্ছে সবচেয়ে শক্তিশালী উপাদান। অন্যান্য ডাটা স্ট্রাকচার যেমন- স্ট্যাক, কিউ, ট্রি, গ্রাফ ইত্যাদি তৈরী করতেও লিঙ্ক লিস্ট ব্যবহার করা হয়।

C++ কোড:

```
//Linked list operations
//Author: Milon

#include<stdio.h>
#include<string.h>
#include<malloc.h>
//#include<conio.h>

void insert_first();
void insert_last();
void insert_before();
void insert_after();
void search_list();
void delete_node();
void show_list();

struct student{
    char name[25];
    char roll[8];
    char dept[4];
    char semester[10];
    struct student *next;
    } *start=NULL;

void main(){
    int d=0;
    char choice;
    do{
        //clrscr();
        printf("This program is for Linked List operations.\n\n");
        printf("# Insert at (F)irst position.\n");
        printf("# Insert at (L)ast position.\n");
        printf("# Insert (B)efore node.\n");
        printf("# Insert (A)fter node.\n");
        printf("# (S)earch in a list.\n");
        printf("# (R)emove a node from list.\n");
        printf("# (D)isplay all nodes of list.\n");
        printf("# (E)xit\n\n\n");
        printf("Enter your choice: ");
        choice=getchar();
        switch(choice){
            case 'F':
            case 'f':
                insert_first();
                break;
            case 'L':
            case 'l':
                insert_last();
                break;
            case 'B':
            case 'b':
                insert_before();
                break;
            case 'A':
            case 'a':
                insert_after();
                break;
            case 'S':
            case 's':
                search_list();
                break;
            case 'R':
            case 'r':
                delete_node();
                break;
            case 'D':
            case 'd':
                show_list();
                break;
            case 'E':
            case 'e':
                d=1;
                break;
            default:
                printf("\nInvalid input.");
                break;
            }
        }while(d==0);
    }

void insert_first(){
    struct student *data;
    data=(struct student*)malloc(sizeof(struct student));
    printf("\nEnter your name: ");
    gets(data->name);
    printf("\nEnter your roll: ");
    gets(data->roll);
    printf("\nEnter your department: ");
    gets(data->dept);
    printf("\nEnter your semester: ");
    gets(data->semester);
    data->next=NULL;
    if(start==NULL)
        start=data;
    else{
        data->next=start;
        start=data;
        }
    printf("\nItem successfully inserted.");
    //getch();
    }

void insert_last(){
    struct student *data,*ptr;
    data=(struct student*)malloc(sizeof(struct student));
    printf("\nEnter your name: ");
    gets(data->name);
    printf("\nEnter your roll: ");
    gets(data->roll);
    printf("\nEnter your department: ");
    gets(data->dept);
    printf("\nEnter your semester: ");
    gets(data->semester);
    data->next=NULL;
    if(start==NULL)
        start=data;
    else{
        ptr=start;
        while(ptr->next!=NULL)
            ptr=ptr->next;
        ptr->next=data;
        }
    printf("\nItem successfully inserted.");
    //getch();
    }

void insert_before(){
    char roll[8];
    struct student *data,*prev,*ptr;
    printf("\nEnter the student roll before which you want to insert: ");
    gets(roll);
    ptr=start;
    while(strcmp(roll,ptr->roll)!=0&&ptr!=NULL)
        ptr=ptr->next;
    if(ptr==NULL){
        printf("\Item not found.");
        //getch();
        return;
        }
    data=(struct student*)malloc(sizeof(struct student));
    printf("\nEnter your name: ");
    gets(data->name);
    printf("\nEnter your roll: ");
    gets(data->roll);
    printf("\nEnter your department: ");
    gets(data->dept);
    printf("\nEnter your semester: ");
    gets(data->semester);
    data->next=NULL;
    ptr=start;
    if(strcmp(roll,ptr->roll)==0){
        ptr->next=start;
        start=ptr;
        }
    else{
        ptr=ptr->next;
        prev=start;
        while(strcmp(roll,ptr->roll)!=0){
            ptr=ptr->next;
            prev=prev->next;
            }
        }
    data->next=ptr;
    prev->next=data;
    printf("\nItem successfully Inserted.");
    //getch();
    }

void insert_after(){
    char roll[8];
    struct student *data,*ptr;
    printf("\nEnter the student roll before which you want to insert: ");
    gets(roll);
    ptr=start;
    while(strcmp(roll,ptr->roll)!=0&&ptr!=NULL)
        ptr=ptr->next;
    if(ptr==NULL){
        printf("\Item not found.");
        //getch();
        return;
        }
    data=(struct student*)malloc(sizeof(struct student));
    printf("\nEnter your name: ");
    gets(data->name);
    printf("\nEnter your roll: ");
    gets(data->roll);
    printf("\nEnter your department: ");
    gets(data->dept);
    printf("\nEnter your semester: ");
    gets(data->semester);
    data->next=NULL;
    ptr=start;
    while(strcmp(roll,ptr->roll)!=0)
        ptr=ptr->next;
    data->next=ptr->next;
    ptr->next=data;
    printf("\nItem successfully inserted.");
    //getch();
    }

void search_list(){
    char roll[8];
    struct student *ptr;
    printf("\nEnter the student roll you want to search: ");
    gets(roll);
    ptr=start;
    while(strcmp(roll,ptr->roll)!=0&&ptr->next!=NULL)
        ptr=ptr->next;
    if(ptr->next==NULL)
        printf("\nNo match found.");
    else{
        printf("\nItem found.\n");
        printf("%28s %10s %5s %12s",ptr->name,ptr->roll,ptr->dept,ptr->semester);
        }
    //getch();
    }

void delete_node(){
    char roll[8];
    struct student *ptr,*prev;
    printf("\nEnter the student roll you want to search: ");
    gets(roll);
    ptr=start;
    if(strcmp(ptr->roll,roll)==0)
        start=ptr->next;
    else{
        ptr=ptr->next;
        prev=start;
        while(strcmp(roll,ptr->roll)!=0&&ptr->next!=NULL){
            ptr=ptr->next;
            prev=prev->next;
            }
        if(ptr->next==NULL)
            printf("No match found.");
        else
            prev->next=ptr->next;
        }
    printf("\nNode is successfully deleted.");
    //getch();
    }

void show_list(){
    int c=0;
    struct student *ptr;
    if(start==NULL)
        printf("List is empty.");
    else{
        ptr=start;
        while(ptr!=NULL){
            printf("\n%3d.%25s%10s%5s%12s",++c,ptr->name,ptr->roll,ptr->dept,ptr->semester);
            ptr=ptr->next;
            }
        }
    //getch();
    }
```

Java কোড:

```
//Linked List class
//Author: Milon

import java.util.Scanner;
import java.util.Iterator;
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


//LinkedList class
public class LinkedList{
    //Instance variable
    protected Node head;
    private int size;

    //Constructor
    public LinkedList(){
        head = null;
        size = 0;
        }

    //Returns is the list empty
    public boolean isEmpty(){
        return head == null;
        }

    //Returns the size
    public int size(){
        return size;
        }

    //Insert an element at first position
    public void addFirst(Object item){
        head = new Node(item, head);
        ++size;
        }

    //Insert an element at last position
    public void addLast(Object item){
        if(isEmpty()){
            addFirst(item);
            return;
            }
        Node current = head;
        while(current.getNextNode() != null)
            current = current.getNextNode();
        Node temp = new Node(item, current.getNextNode());
        current.setNextNode(temp);
        ++size;
        }

    //Show the first item
    public Object showFirst(){
        if(head != null)
            return head.getData();
        else{
            System.out.println("LinkedList is empty.");
            //throw new NoSuchElementException();
            return null;
            }
        }

    //Show the last item
    public Object showLast(){
        if(head == null){
            System.out.println("LinkedList is empty.");
            //throw new NoSuchElementException();
            return null;
            }
        else{
            Node current = head;
            while(current.getNextNode() != null)
                current = current.getNextNode();
            return current.getData();
            }
        }

    //Show the nth element
    public Object peek(int position){
        Node current = head;
        for(int i=0;i<position && current != null;i++)
            current = current.getNextNode();
        return current.getData();
        }

    //Remove first element
    public Object removeFirst(){
        if(!isEmpty()){
            Node current = head;
            head = head.getNextNode();
            --size;
            return current.getData();
            }
        else{
            System.out.println("LinkedList is empty.");
            //throw new NoSuchElementException();
            return null;
            }
        }

    //Remove last element
    public Object removeLast(){
        if(isEmpty()){
            System.out.println("LinkedList is empty.");
            return null;
            }
        if(head.getNextNode() == null)
            return removeFirst();
        Node current = head;
        while(current.getNextNode().getNextNode() !=null)
            current = current.getNextNode();
        Object obj = current.getNextNode().getData();
        current.setNextNode(null);
        --size;
        return obj;
        }

    //Check does the item exists in the list
    public boolean contains(Object item){
        Node current = head;
        while(current.getNextNode() != null){
            if(item.equals(current.getData()))
                return true;
            else
                current = current.getNextNode();
            }
        return false;
        }

    //Reverse the list
    public void reverse(){
        Node current, next, loop;
        if(head == null)
            return;
        current = head;
        next = head.getNextNode();
        loop = null;
        while(next != null){
            current.setNextNode(loop);
            loop = current;
            current = next;
            next = next.getNextNode();
            }
        head = current;
        head.setNextNode(loop);
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
//Linked List Implementation class
//Author: Milon

import java.util.Scanner;
import java.util.Random;

public class LinkedListImplement{
    public static void main(String args[]){
        LinkedList list = new LinkedList();
        Scanner input = new Scanner(System.in);
        Random rand = new Random();

        System.out.print("How many item do you want to insert first: ");
        int n = input.nextInt();

        for(int i=0;i<n;i++)
            list.addFirst(new Integer(rand.nextInt(100)));

        while(true){
            System.out.println("\n");
            System.out.println("* * * * * LinkedList Implementation * * * * *");
            System.out.println(" 1\. Show the list.");
            System.out.println(" 2\. Insert an element at first position.");
            System.out.println(" 3\. Insert an element at last position.");
            System.out.println(" 4\. Show the first element.");
            System.out.println(" 5\. Show the last element.");
            System.out.println(" 6\. Show the nth element.");
            System.out.println(" 7\. Reverse the list.");
            System.out.println(" 8\. Show the list size.");
            System.out.println(" 9\. Search an element in the list.");
            System.out.println("10\. Remove first element.");
            System.out.println("11\. Remove last element.");
            System.out.println("12\. Exit\n\n");

            System.out.print("Enter your choice: ");
            int choice = input.nextInt();

            switch(choice){
                case 1:
                        System.out.println("The whole list is:");
                        System.out.println(list.toString());
                        break;

                case 2:
                        System.out.print("Enter the element: ");
                        int item = input.nextInt();
                        list.addFirst(new Integer(item));
                        System.out.println("Item inserted successfully.");
                        break;

                case 3:
                        System.out.print("Enter the element: ");
                        int element = input.nextInt();
                        list.addLast(new Integer(element));
                        System.out.println("Item inserted successfully.");
                        break;

                case 4:
                        System.out.println("The first element is: "+list.showFirst());
                        break;

                case 5:
                        System.out.println("The last element is: "+list.showLast());
                        break;

                case 6:
                        System.out.print("Enter the position: ");
                        int pos = input.nextInt();
                        System.out.println("The "+pos+"th element is: "+list.peek(pos-1));
                        break;

                case 7:
                        //list.head = list.reverse(list.head, null);
                        list.reverse();
                        System.out.println("List reversed successfully.");
                        break;

                case 8:
                        System.out.println("List size is: "+list.size());
                        break;

                case 9:
                        System.out.print("Enter the searching element: ");
                        int key = input.nextInt();
                        if(list.contains(key))
                            System.out.println("Item found.");
                        else
                            System.out.println("Item not found.");
                        break;

                case 10:
                        System.out.println("First element " + list.removeFirst() + " removed.");
                        break;

                case 11:
                        System.out.println("Last element " + list.removeLast() + " removed.");
                        break;

                case 12:
                        System.exit(1);
                        break;

                default:
                        break;
                }
            }
        }

    }
```
