CREATE DATABASE perfumes 
CHARACTER SET utf8 
COLLATE utf8_unicode_ci;

create table users(
	user_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(100) character set utf8 not null,
    email varchar(100) character set utf8 not null unique,
    password varchar(100) character set utf8 not null
);

CREATE TABLE roles(
	role_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE user_roles(
	user_role_id int AUTO_INCREMENT PRIMARY KEY,
	user_id int not null,
	role_id int not null,
	FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

CREATE TABLE categories(
	category_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null unique
);

CREATE TABLE brands(
	brand_id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) character set utf8 not null
);

CREATE TABLE product_statuses(
	product_status_id int AUTO_INCREMENT PRIMARY KEY,
	product_status varchar(50) character set utf8 not null
);

CREATE TABLE products(
	product_id int AUTO_INCREMENT PRIMARY KEY,
	brand_id int not null,
    category_id int not null,
    name varchar(50) character set utf8 not null unique,
    size int,
    quantity int,
    purchase_price int not null,
    selling_price int not null,
    other_information varchar(50) character set utf8,
    image varchar(50) character set utf8 not null unique,
	product_status_id int not null,
	FOREIGN KEY (brand_id) REFERENCES brands(brand_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
	FOREIGN KEY (product_status_id) REFERENCES product_statuses(product_status_id)
);

CREATE TABLE carts(
	cart_id int AUTO_INCREMENT PRIMARY KEY,
	user_id int not null,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE user_cart_statuses(
	user_cart_status_id int AUTO_INCREMENT PRIMARY KEY,
	user_cart_status varchar(50) character set utf8 not null
);

CREATE TABLE user_carts(
	user_cart_id int AUTO_INCREMENT PRIMARY KEY,
	cart_id int not null,
	product_id int not null,
	user_cart_status_id int not null,
	FOREIGN KEY (cart_id) REFERENCES carts(cart_id),
	FOREIGN KEY (product_id) REFERENCES products(product_id),
	FOREIGN KEY (user_cart_status_id) REFERENCES user_cart_statuses(user_cart_status_id)
);

insert into roles values(null,'Admin');
insert into roles values(null,'Bloger');

insert into users values(null,'Nikola Bibercic','nikolabibercic@gmail.com','123');
insert into user_roles values(null,1,1);

insert into product_statuses values(null,'Active');
insert into product_statuses values(null,'Inactive');

insert into user_cart_statuses values(null,'In cart');
insert into user_cart_statuses values(null,'Ordered');

insert into categories values(null,'Muški parfemi');
insert into categories values(null,'Ženski parfemi');

insert into brands values(null,'Armani');
insert into brands values(null,'Bulgari');