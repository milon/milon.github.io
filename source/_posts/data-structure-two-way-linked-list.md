---
extends: _layouts.post
title: ডাটা স্ট্রাকচারঃ Two Way Linked List
date: '2011-05-24'
gist: How to implement two way linked list.
section: content
---

জাভাতে C বা C++ এর মত পয়েন্টার নাই। পয়েন্টারের কাজ জাভাতে reference এর মাধ্যমে করা হয়। সাধারন বা ওয়ান ওয়ে লিঙ্ক লিস্টের মত খুব সহজেই জাভা প্রোগ্রামিং ভাষা ব্যবহার করে টু ওয়ে লিঙ্ক লিস্ট তৈরী করা যায়।

```
//Two Way Linked List
//Author: Milon

import java.util.NoSuchElementException;

//Node class
class Node{
    //Instance variable
    private Object data;
    private Node nextNode;
    private Node previousNode;

    //Constructor
    public Node(){
        data = null;
        nextNode = null;
        previousNode = null;
        }

    public Node(Object item, Node next, Node previous){
        data = item;
        nextNode = next;
        previousNode = previous;
        }

    //Set methods
    public void setData(Object item){
        data = item;
        }

    public void setNextNode(Node next){
        nextNode = next;
        }

    public void setPreviousNode(Node previous){
        previousNode = previous;
        }

    //Get methods
    public Object getData(){
        return data;
        }

    public Node getNextNode(){
        return nextNode;
        }

    public Node getPreviousNode(){
        return previousNode;
        }

    //Overloaded toString() method
    public String toString(){
        return ("" + data);
        }
    }


//Two Way Linked List class

public class TwoWayLinkedList{
    //Instance variable
    private int size;
    private Node head;
    private Node tail;

    //Constructor
    public TwoWayLinkedList(){
        head = tail = null;
        size = 0;
        }

    //Returns is the list empty
    public boolean isEmpty(){
        return head == null;
        }

    //Returns the size of list
    public int size(){
        return size;
        }

    //Insert element at first position
    public void addFirst(Object item){
        if(isEmpty()){
            head = tail = new Node(item, head, tail);
            ++size;
            return;
            }
        Node current = new Node(item, head, null);
        head.setPreviousNode(current);
        head = current;
        ++size;
        }

    //Insert an element at last
    public void addLast(Object item){
        if(isEmpty()){
            addFirst(item);
            return;
            }
        Node current = new Node(item, null, tail);
        tail.setNextNode(current);
        tail = current;
        ++size;
        }

    //Show the first item
    public Object showFirst(){
        if(!isEmpty())
            return head.getData();
        else{
            System.out.println("LinkedList is empty.");
            //throw new NoSuchElementException();
            return null;
            }
        }

    //Show the last item
    public Object showLast(){
        if(!isEmpty())
            return tail.getData();
        else{
            System.out.println("LinkedList is empty.");
            //throw new NoSuchElementException();
            return null;
            }
        }

    //Remove the first element
    public Object removeFirst(){
        if(head.getNextNode() == null){
            Node current = head;
            head = null;
            tail = null;
            --size;
            return current.getData();
            }
        if(!isEmpty()){
            Node current = head;
            head = head.getNextNode();
            head.setPreviousNode(null);
            --size;
            return current.getData();
            }
        else{
            System.out.println("LinkedList is empty.");
            //throw new NoSuchElementException();
            return null;
            }
        }

    //Remove the last element
    public Object removeLast(){
        if(isEmpty()){
            System.out.println("LinkedList is empty.");
            //throw new NoSuchElementException();
            return null;
            }
        if(head.getNextNode() == null){
            --size;
            return removeFirst();
            }
        Node current = tail;
        tail = tail.getPreviousNode();
        tail.setNextNode(null);
        --size;
        return current.getData();
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

    //Traversing the list from front
    public String frontTraverse(){
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

    //Traversing the list from rear
    public String rearTraverse(){
        String str = "[ ";
        if(tail != null){
            str += tail.getData();
            Node current = tail.getPreviousNode();
            while(current.getPreviousNode() != null){
                str += ", " + current.getData();
                current = current.getPreviousNode();
                }
            str += ", " + current.getData();
            }
        str += " ]";
        return str;
        }

    }
```

```
//Two Way Linked List Implementation class
//Author: Milon

import java.util.Scanner;
import java.util.Random;

public class TwoWayLinkedListImplement{
    public static void main(String args[]){
        TwoWayLinkedList list = new TwoWayLinkedList();
        Scanner input = new Scanner(System.in);
        Random rand = new Random();

        System.out.print("How many item do you want to insert first: ");
        int n = input.nextInt();

        for(int i=0;i<n;i++)
            list.addFirst(new Integer(rand.nextInt(100)));

        while(true){
            System.out.println("\n");
            System.out.println("* * * * * TwoWayLinkedList Implementation * * * * *");
            System.out.println(" 1\. Show the list from front.");
            System.out.println(" 2\. Show the list from rear.");
            System.out.println(" 3\. Insert an element at first position.");
            System.out.println(" 4\. Insert an element at last position.");
            System.out.println(" 5\. Show the first element.");
            System.out.println(" 6\. Show the last element.");
            System.out.println(" 7\. Show the list size.");
            System.out.println(" 8\. Search an element in the list.");
            System.out.println(" 9\. Remove first element.");
            System.out.println("10\. Remove last element.");
            System.out.println("11\. Exit\n\n");

            System.out.print("Enter your choice: ");
            int choice = input.nextInt();

            switch(choice){
                case 1:
                        System.out.println("The whole list from front is:");
                        System.out.println(list.frontTraverse());
                        break;

                case 2:
                        System.out.println("The whole list from rear is:");
                        System.out.println(list.rearTraverse());
                        break;

                case 3:
                        System.out.print("Enter the element: ");
                        int item = input.nextInt();
                        list.addFirst(new Integer(item));
                        System.out.println("Item inserted successfully.");
                        break;

                case 4:
                        System.out.print("Enter the element: ");
                        int element = input.nextInt();
                        list.addLast(new Integer(element));
                        System.out.println("Item inserted successfully.");
                        break;

                case 5:
                        System.out.println("The first element is: "+list.showFirst());
                        break;

                case 6:
                        System.out.println("The last element is: "+list.showLast());
                        break;

                case 7:
                        System.out.println("List size is: "+list.size());
                        break;

                case 8:
                        System.out.print("Enter the searching element: ");
                        int key = input.nextInt();
                        if(list.contains(key))
                            System.out.println("Item found.");
                        else
                            System.out.println("Item not found.");
                        break;

                case 9:
                        System.out.println("First element " + list.removeFirst() + " removed.");
                        break;

                case 10:
                        System.out.println("Last element " + list.removeLast() + " removed.");
                        break;

                case 11:
                        System.exit(1);
                        break;

                default:
                        break;
                }
            }
        }

    }
```
