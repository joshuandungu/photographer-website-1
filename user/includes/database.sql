CREATE DATABASE photo;
USE photo;

CREATE TABLE users (
    id INT(250) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    firstname VARCHAR (250) NOT NULL,
    lastname VARCHAR (250) NOT NULL,
    email VARCHAR (250) UNIQUE NOT NULL,
    username VARCHAR (250) NOT NULL,
     password VARCHAR (250) NOT NULL,
      phone VARCHAR (250) NOT NULL,
       address VARCHAR (250) NOT NULL
);

CREATE TABLE photographer (
    id INT(250) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    firstname VARCHAR (250) NOT NULL,
    lastname VARCHAR (250) NOT NULL,
    email VARCHAR (250) UNIQUE NOT NULL,
    username VARCHAR (250) NOT NULL,
     gender VARCHAR (250) NOT NULL,
      phone VARCHAR (250) NOT NULL,
       address VARCHAR (250) NOT NULL,
        photographer VARCHAR (250) NOT NULL,
        package VARCHAR (250) NOT NULL,
        image_name VARCHAR (250) NOT NULL

);

CREATE TABLE portfolio (
    id INT(250) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    photographer_name VARCHAR(250) NOT NULL,
    file_path VARCHAR (500) NOT NULL,
    description LONGTEXT NOT NULL
);

CREATE TABLE bookings(
    book_id INT(500)  PRIMARY KEY NOT NULL,
    client_name VARCHAR(250) NOT NULL,
    client_email VARCHAR(250) NOT NULL,
    client_gender VARCHAR(250) NOT NULL,
    client_phone VARCHAR(250) NOT NULL,
    client_address VARCHAR(250) NOT NULL,
    photographer_name VARCHAR(250) NOT NULL,
    photographer_email VARCHAR (250) NOT NULL,
    photographer_gender VARCHAR(250) NOT NULL,
    photographer_phone VARCHAR(250) NOT NULL,
    photographer_address VARCHAR(250) NOT NULL,
    package VARCHAR(250) NOT NULL

);