CREATE DATABASE quickart;
USE DATABASE quickart;

CREATE TABLE account(
    AccID int NOT NULL AUTO_INCREMENT,
    AccEmail varchar(50) NOT NULL,
    AccPassword varchar(10),
    PRIMARY KEY (AccID)
);

CREATE TABLE customer(
    customerID int NOT NULL AUTO_INCREMENT,
    firstName varchar(20) NOT NULL,
    lastName varchar(20),
    address varchar(100),
    phone varchar(12),
    AccID int,
    PRIMARY KEY (customerID),
	CONSTRAINT FK_AccID FOREIGN KEY(AccID)
	REFERENCES account(AccID)
);

CREATE TABLE products(
    productID int NOT NULL AUTO_INCREMENT,
    productName varchar(30) NOT NULL,
    unit varchar(20),
	price float,
    category varchar(20),
    imgName varchar(30),
    PRIMARY KEY (productID)
);


CREATE TABLE feedback(
    feedbackID int NOT NULL AUTO_INCREMENT,
    cName varchar(20) NOT NULL,
    cEmail varchar(20),
    Ftime date,
    feedback varchar(60),
    response boolean,
    PRIMARY KEY (feedbackID)
);


INSERT INTO account(AccEmail, AccPassword) VALUES('admin@admin.com', 'ADMIN');