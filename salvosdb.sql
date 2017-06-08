DROP DATABASE SALVOS;

CREATE DATABASE SALVOS;

USE SALVOS;
 
CREATE TABLE Book(
ISBN varchar (15)  NOT NULL,
BookName varchar (60),
Author varchar (50),
price numeric (10,2) NOT NULL,
BookType varchar (30) NOT NULL,
Description text,
imagepath varchar (50),
Primary key(ISBN));

CREATE TABLE Bookcond(
ISBN varchar (15)  NOT NULL,
cond varchar(10),
FOREIGN KEY(ISBN) REFERENCES Book(ISBN));

CREATE TABLE Customer(
CustomerID int UNSIGNED NOT NULL AUTO_INCREMENT,
CustomerName char (40) NOT NULL,
Address char (100),
zip char (6),
state char (20),
ShipAdd char (100),
shipzip char (6),
shipstate char (20),
email char (40) NOT NULL,
password char (20),
phone char (10),
Primary key(CustomerID));

CREATE TABLE IOrder(
OrderID int UNSIGNED NOT NULL AUTO_INCREMENT,
CustomerID int NOT NULL,
OrderDate Date,
timestamp int,
shipmethod char(20),
total numeric (10,2),
Primary key(OrderID),
FOREIGN KEY(CustomerID) REFERENCES Customer(CustomerID));

CREATE TABLE OrderItem(
OrderID int NOT NULL,
ISBN varchar (15) NOT NULL,
FOREIGN KEY(OrderID) REFERENCES IOrder(OrderID),
FOREIGN KEY(ISBN) REFERENCES Book(ISBN));

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `orderid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
