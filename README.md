# VOD [Movie] Website


## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [Status](#status)
* [Inspiration](#inspiration)

## General info
* VOD Website to view Movies Online with secure signup and login features, includes web scraping

## Features
* Movies can be watched only after sign up
* The Website includes:
* 1-> index.php [the main home page that a non logged in user is shown,or a logged in user is shown if he/she has logged out]
* 2-> ml.php [redirected page after login]
* 3->Salient Features:
   On clicking [PLAY] button -> Movie Ratings and Information
   Signup and Login features

## Screenshots

## Technologies
* Html
* CSS
* Java Script
* Php
* JQuery
* Ajax
* Slight JSON for web scraping
* MySQL
* Bootstrap
* Php MyAdmin
* XAMPP for local host

## Setup
#### this website runs on local host, installation of XAMPP required

* installation of Xampp required, the files should be places in C drive
* After installing Xampp in C drive,Click on Xampp -> htdocs and create a folder moviewebsite
* In Movie Website two more folders need to be created -> 1. pictures 2.link
* Folders [Create the following folders] :
* pictures : to store movie pictures
* link :store the movies in this file
* Copy the project files in moviewebsite 
#### DATABASE SCHEMA
* In the Xampp panel,start Apache and MySql
* Click on MySql Admin for php MyAdmin
* Create a database named onlinemovies (as that is the name used for connection,or change db name in connection.php
 the following Schema is needed to be made

##### SQL Commands to create Schema
###### Creaing Movie Table:
 CREATE TABLE mvoies (
    id int(11), PRIMARY KEY,AUTO_INCREMENT,
    name varchar(200),
    genre varchar(100),
    link varchar(500),
    picture varchar(500),
);

###### Creating Users table:
 CREATE TABLE users (
    id int(11), PRIMARY KEY,AUTO_INCREMENT,
    username varchar(20),
    email varchar(50),
    password varchar(64),
    activationKey char(32),
);
  
###### Creating Remember me table:
CREATE TABLE rememberme (
    id int(11), PRIMARY KEY,AUTO_INCREMENT,
    authentificator1 char(20),
    f2authentificator2 char(64),
    user_id int(11),
    expiration datetime,
);

###### Creating forgot password table:
CREATE TABLE forgotpassword (
    id int(11), PRIMARY KEY,AUTO_INCREMENT,
    user_d int(11),
    keyy char(32),
    time int(11),
    status varchar(7),
);

## Status
Project is:finished

## Credits
Thank You Issam(the founder and director of Development Island based in Bedford, United Kindgom and creater of the Complete Web Development Course on Udemy) for personally helping me with all the problems I encountered during coding and helping me with the authentication process.

## Contact
Created by @Muskangupta99 - feel free to contact me!
