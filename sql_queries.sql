CREATE DATABASE shop
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
    purchase_price decimal(15,2) not null,
    selling_price decimal(15,2) not null,
    other_information varchar(50) character set utf8,
    image varchar(50) character set utf8 not null,
	product_status_id int not null,
	FOREIGN KEY (brand_id) REFERENCES brands(brand_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
	FOREIGN KEY (product_status_id) REFERENCES product_statuses(product_status_id)
);

CREATE TABLE carts(
	cart_id int AUTO_INCREMENT PRIMARY KEY,
	user_id int not null unique,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE cart_item_statuses(
	cart_item_status_id int AUTO_INCREMENT PRIMARY KEY,
	cart_item_status varchar(50) character set utf8 not null
);

CREATE TABLE cart_items(
	cart_item_id int AUTO_INCREMENT PRIMARY KEY,
	cart_id int not null,
	product_id int,
	product_name varchar(50) character set utf8,
	brand_id int,
	brand_name varchar(50) character set utf8,
    category_id int,
	category_name varchar(50) character set utf8,
    size int,
    purchase_price decimal(15,2),
    selling_price decimal(15,2),
    other_information varchar(50) character set utf8,
    image varchar(50) character set utf8,
	cart_item_status_id int not null,
	import_date datetime not null,
	FOREIGN KEY (cart_item_status_id) REFERENCES cart_item_statuses(cart_item_status_id)
);

CREATE TABLE transaction_statuses(
	transaction_status_id int AUTO_INCREMENT PRIMARY KEY,
	transaction_status varchar(50) character set utf8 not null
);

CREATE TABLE transactions(
	transaction_id int AUTO_INCREMENT PRIMARY KEY,
	user_id int not null,
	transaction_date datetime not null,
	transaction_status_id int not null,
	FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (transaction_status_id) REFERENCES transaction_statuses(transaction_status_id)
);

CREATE TABLE cart_items_transactions(
	cart_item_transaction int AUTO_INCREMENT PRIMARY KEY,
	transaction_id int not null,
	cart_item_id int not null,
	cart_item_transaction_date datetime not null,
	FOREIGN KEY (transaction_id) REFERENCES transactions(transaction_id),
	FOREIGN KEY (cart_item_id) REFERENCES cart_items(cart_item_id)
);

CREATE TABLE delivery_methods(
	delivery_method_id int AUTO_INCREMENT PRIMARY KEY,
	delivery_method varchar(50) character set utf8 not null,
	delivery_price decimal(15,2) not null
);

CREATE TABLE orders(
	order_id int AUTO_INCREMENT PRIMARY KEY,
	transaction_id int not null,
	user_name varchar(50) character set utf8,
	user_surname varchar(50) character set utf8,
	user_address varchar(50) character set utf8,
	user_zip_code varchar(50) character set utf8,
	user_city varchar(50) character set utf8,
	user_municipality varchar(50) character set utf8,
	phone varchar(50) character set utf8,
	delivery_method_id int not null,
	order_date datetime not null,
	FOREIGN KEY (transaction_id) REFERENCES transactions(transaction_id),
	FOREIGN KEY (delivery_method_id) REFERENCES delivery_methods(delivery_method_id)
);

CREATE TABLE settings(
	setting_id int AUTO_INCREMENT PRIMARY KEY,
	setting_description varchar(150) character set utf8,
	setting_value varchar(150) character set utf8,
	setting_value_2 varchar(150) character set utf8
);

-------------------------------------------------------------------------------------------------
---OBAVEZNI INSERTI
-------------------------------------------------------------------------------------------------
insert into roles values(null,'Admin');
insert into roles values(null,'Bloger');

insert into product_statuses values(null,'Active');
insert into product_statuses values(null,'Inactive');

insert into cart_item_statuses values(null,'In cart');
insert into cart_item_statuses values(null,'Ordered');
insert into cart_item_statuses values(null,'Disabled');
insert into cart_item_statuses values(null,'Delivered');

insert into transaction_statuses values(null,'Incomplete');
insert into transaction_statuses values(null,'Complete');

insert into settings values(null,'footer jumbotron background color','#E5E7E9',null);
insert into settings values(null,'navbar jumbotron background color','#E5E7E9',null);
insert into settings values(null,'navbar horizontal line color','#F1C40F',null);
insert into settings values(null,'navbar jumbotron text color','black',null);
insert into settings values(null,'footer background color','darkblue',null);
insert into settings values(null,'footer text color','white',null);
insert into settings values(null,'facebook icon show','true',null);
insert into settings values(null,'instagram icon show','true',null);
insert into settings values(null,'icon facebook link','/shop/images/siteImages/facebookIcon.png',null);
insert into settings values(null,'icon instagram link','/shop/images/siteImages/instagramIcon.png',null);
insert into settings values(null,'back to top text color','darkblue',null);
insert into settings values(null,'footer jumbotron link 1 show','true',null);
insert into settings values(null,'footer jumbotron link 2 show','false',null);
insert into settings values(null,'footer jumbotron link 1','https://www.freepik.com/photos/people','People photo created by prostooleh - www.freepik.com');
insert into settings values(null,'footer jumbotron link 2',null,null);
insert into settings values(null,'carousel show','true',null);
insert into settings values(null,'navbar logo image link','/shop/images/siteImages/logo.png',null);
insert into settings values(null,'carousel image link 1','/shop/images/siteImages/carouselImage1.jpg',null);
insert into settings values(null,'carousel image link 2','/shop/images/siteImages/carouselImage2.jpg',null);
insert into settings values(null,'carousel image link 3','/shop/images/siteImages/carouselImage3.jpg',null);
insert into settings values(null,'navbar background color','darkblue',null);
insert into settings values(null,'navbar onmouse over leave color','darkblue','white');
insert into settings values(null,'navbar text color','white',null);
insert into settings values(null,'navbar logo image link show','true',null);
insert into settings values(null,'email FROM','office@parfem.in.rs',null);
insert into settings values(null,'email TO','nikolabibercic@gmail.com',null);
-------------------------------------------------------------------------------------------------
---OPCIONI INSERTI
-------------------------------------------------------------------------------------------------
insert into categories values(null,'Muški parfemi');
insert into categories values(null,'Ženski parfemi');

insert into brands values(null,'Armani');
insert into brands values(null,'Bulgari');

insert into users values(null,'Nikola Bibercic','nikolabibercic@gmail.com','123');
insert into user_roles values(null,1,1);

insert into delivery_methods values(null,'Post Express',0);
insert into delivery_methods values(null,'Lično preuzimanje',200);