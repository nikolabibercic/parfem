CREATE DATABASE parfemi 
CHARACTER SET utf8 
COLLATE utf8_unicode_ci;

create table users(
	user_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(100) character set utf8 not null,
    email varchar(100) character set utf8 not null unique,
    password varchar(100) character set utf8 not null
)engine=myisam;

CREATE TABLE roles(
	role_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
)engine=myisam;

CREATE TABLE user_roles(
	user_role_id int AUTO_INCREMENT PRIMARY KEY,
	user_id int not null,
	role_id int not null,
	FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (role_id) REFERENCES roles(role_id)
)engine=myisam;

CREATE TABLE categories(
	category_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
)engine=myisam;

CREATE TABLE brands(
	brand_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique,
    category_id int not null,
	FOREIGN KEY (category_id) REFERENCES categories(category_id)
)engine=myisam;

CREATE TABLE types(
	type_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique,
    brand_id int not null,
	FOREIGN KEY (brand_id) REFERENCES brands(brand_id)
)engine=myisam;

CREATE TABLE products(
	product_id int AUTO_INCREMENT PRIMARY KEY,
	type_id int not null,
    size int,
    purchase_price int not null,
    selling_price int not null,
    other_information varchar(50) character set utf8,
	FOREIGN KEY (type_id) REFERENCES types(type_id)
)engine=myisam;

insert into roles values(null,'Admin');
insert into roles values(null,'Bloger');

insert into users values(null,'Nikola Bibercic','nikolabibercic@gmail.com','123');
insert into user_roles values(null,1,1);