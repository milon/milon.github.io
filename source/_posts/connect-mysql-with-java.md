---
extends: _layouts.post
title: জাভার সাথে MySQL এর কানেকশন
date: '2011-05-21'
gist: How to connect MySQL with Java.
section: content
---

জাভা বর্তমান পৃথিবীর অত্যন্ত জনপ্রিয় একটা প্রোগ্রামিং ভাষা। যে কোন ধরনের অ্যাপ্লিকেশন ডেভেলপ করতে জাভার কোন জুড়ি নেই। আর বর্তমানের অধিকাংশ সফটয়্যারেই ডাটাবেজ ব্যবহার করা হয়। জাভার সাথে ডাটাবেজের কিভাবে সংযোগ দিতে হয় তা এই পোষ্টের মাধ্যমে দেখান হল।

ডাটাবেজে বিভিন্ন ধরনের অপারেশন চালানোর জন্য জাভার Statement class(কমেন্টের মধ্যে) এবং অত্যাধুনিক PreparedStatement class ব্যবহার করা হয়েছে।

জাভাতে ডাটাবেজের কোন পরিবর্তন আনার জন্য executeUpdate() এবং কোন তথ্য অনুসন্ধানের জন্য executeQuery() মেথড ব্যবহার করা হয়।

```
//Mysql connection
//Author: Milon

//import java.sql.*;
import java.sql.Connection;
import java.sql.Statement;
import java.sql.PreparedStatement;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;

public class MysqlConnection{
    private static String driver = "com.mysql.jdbc.Driver";
    private static String connection = "jdbc:mysql://localhost:3306/milon"; //'milon' is your database name
    private static String user = "root";                  //'root' is username
    private static String password = "pass";        //'pass' is password


    private static Connection con = null;
    private static Statement state = null;
    private static ResultSet result;
    private static PreparedStatement pstate;

    public static void main(String args[])/* throws Exception*/{
        mysqlConnect();
        insertData("s6s","milon","dgh","ghjgh");
        deleteData("sd");
        countRow("dictionary");
        updateData("ss", "suru");
        showData("surayea");
        closeConnection();
        }


    public static void mysqlConnect(){
        try{
            Class.forName(driver);
            con = DriverManager.getConnection(connection, user, password);
            System.out.println("Successfully connected to database.");
            }
        catch(ClassNotFoundException e){
            System.err.println("Couldn't load driver.");
            }
        catch(SQLException e){
            System.err.println("Couldn't connect to database.");
            }
        }


    public static void closeConnection(){
        try{
            if(!con.isClosed()){
                con.close();
                System.out.println("Database closed successfully.");
                }
            }
        catch(NullPointerException e){
            System.err.println("Couldn't load driver.");
            }
        catch(SQLException e){
            System.err.println("Couldn't close database.");
            }
        }

    public static void insertData(String word, String meaning, String synonyms, String antonyms){
        try{
            //using PreparedStatement
            pstate = con.prepareStatement("insert into dictionary(word, meaning, synonyms, antonyms)"+
                                            "values(?,?,?,?)");
            pstate.setString(1, word);
            pstate.setString(2, meaning);
            pstate.setString(3, synonyms);
            pstate.setString(4, antonyms);
            int value = pstate.executeUpdate();

            //using Statement
            //state = con.createStatement();
            //int value = state.executeUpdate("insert into dictionary(word, meaning, synonyms, antonyms)"+
            //                      "values('"+word+"', '"+meaning+"', '"+synonyms+"', '"+antonyms+"')");

            System.out.println("Query OK, 1 row insertedted.");
            }
        catch(SQLException e){
            System.err.println("Query error.");
            }
        }

    public static void deleteData(String word){
        try{
            //using PreparedStatement
            pstate = con.prepareStatement("delete from dictionary where word = ?");
            pstate.setString(1,"word");
            int value = pstate.executeUpdate();

            //using Statement
            //state = con.createStatement();
            //int value = state.executeUpdate("delete from dictionary where word='"+word+"'");

            System.out.println("Query OK, 1 row deleted.");
            }
        catch(SQLException e){
            System.err.println("Query error.");
            }
        }

    public static void countRow(String table){
        try{
            result = state.executeQuery("SELECT COUNT(*) FROM "+table);
            result.next();
            int rowcount = result.getInt(1);
            System.out.println("Number of rows: "+rowcount);
            }
        catch(SQLException e){
            System.err.println("Query error.");
            }
        }

    public static void showData(String word){
        try{
            state = con.createStatement();
            result = state.executeQuery("select * from dictionary where word='"+word+"'");
            while(result.next()){
                String word1 = result.getString("word");
                String mean = result.getString("meaning");
                String syno = result.getString("synonyms");
                String anto = result.getString("antonyms");
                System.out.println("Word: "+word1+" Meaning: "+mean+" Synonyms: "+syno+" Antonyms: "+anto);
                }
            }
        catch(SQLException e){
            System.err.println("Query error.");
            }
        catch(NullPointerException e){
            System.err.println("Element not found.");
            }
        }

    public static void updateData(String word, String meaning){
        try{
            //using Statement
            //state = con.createStatement();
            //int value = state.executeUpdate("update dictionary set meaning='"+meaning+"' where word='"+word+"'");

            //using PreparedStatement
            pstate = con.prepareStatement("update dictionary set meaning= ? whrere word = ?");
            pstate.setString(1, meaning);
            pstate.setString(2, word);
            pstate.executeUpdate();

            System.out.println("Query OK, 1 row updated.");
            }
        catch(SQLException e){
            System.err.println("Query error."+e.getMessage());
            }
        }

    }
```
