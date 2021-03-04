create database MobileStoreCreator;

use MobileStoreCreator;


Create table mobiles ( mob_id int not null auto_increment, 
mobile_name varchar(50), 
price varchar(10), 
version varchar(20), 
brand varchar(20),
quantity varchar(20), 
image varchar(100), 
primary key(mob_id));

select * from mobiles;

CREATE TABLE orders (
  orderid int NOT NULL AUTO_INCREMENT,
  firstname varchar(50),
  email varchar(50),
  address varchar(500),
  PRIMARY KEY (orderid)
);

select * from orders;

