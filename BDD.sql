SET SQL_SAFE_UPDATES = 0;


UPDATE personnage
SET url_img = 'Amber.jpg'
WHERE name = 'Amber';

SET SQL_SAFE_UPDATES = 1;

UPDATE personnage 
SET url_img = 'Amber.jpg' 
WHERE name = 'Amber';

SELECT name, url_img FROM personnage WHERE name='Amber';

UPDATE personnage 
SET url_img = 'mavuika.jpg'
WHERE name = 'Mavuika';

UPDATE personnage 
SET url_img = 'mavuika.jpg'
WHERE name = 'Mavuika';

use database genshin_db;
USE genshin_db;


USE genshin_db;
SET SQL_SAFE_UPDATES = 0;

UPDATE personnage
SET url_img = 'mavuika.jpg'
WHERE name = 'Mavuika';


create table element (
	id INT auto_increment primary KEY,
    NAME VARCHAR(50) not null;
    url_img varchar(255) not null
);

create table origin (
	id int auto_increment primary key;
    name varchar (50) not null,
    url_img varchar(255) not null
);

CREATE TABLE origin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    url_img VARCHAR(255) NOT NULL
);




show tables ;

create table   ELEMEN (
	id int auto_increment primary key,
    name varchar(50) not null,
    url_img varchar(255) not null
);


create table unitclass ( 
	id int auto_increment primary key,
    name varchar(50) not null,
    url_img varchar(255) not null
);



