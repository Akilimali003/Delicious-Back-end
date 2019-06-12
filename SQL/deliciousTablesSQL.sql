use `uMozDZqPpy`;

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `USER`;
create table `USER`(
	`id` int NOT NULL AUTO_INCREMENT,
	`uname` varchar(50) NOT NULL,
	`uemail` varchar(50) NOT NULL,
	`upassword` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `USER`(`uname`,`uemail`,`upassword`)
values
("admin","admin@delicious.com","admin"),
("michelo","admin@delicious.com","dragonballz"),
("gamer","admin@delicious.com","manga"),
("ninja","admin@delicious.com","sodhi");

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `restaurant`;
create table `restaurant`(
	`rid` int NOT NULL AUTO_INCREMENT,
	`r_name` varchar(200) NOT NULL UNIQUE,
	`r_location` varchar(200) NOT NULL,
	`r_phone` varchar(100) NOT NULL,
	`r_opening_Closing_Time` varchar(100) NOT NULL,
	`r_website` varchar(200),
	`r_email` varchar(200),
	`r_details` varchar(500) default NULL,
	`r_image` longblob,
	`r_latitude` double,
	`r_longitude` double,
	PRIMARY KEY (`rid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into restaurant (rid,r_name,r_location,r_phone,r_opening_Closing_Time,r_website,r_email, r_details, r_image, r_latitude,r_longitude )
        values
        (1,"The Spotted Dick","4 Bold Street Newport","243994223847","08h00-20h00","http://www.dick.gov.uk","order@dick.gov.uk","restaurant avec specialites africaines"," ",-1.536627, 29.887479),
        (2,"The Refa","Market Place","243994223847","08h00-20h00","http://www.puffdragon.co.uk","order@puffdragon.co.uk","restaurant avec specialites africaines"," ",-1.536627, 29.887479),
		(3,"Ishango Guest House","4 Bold Street Newport","243994223847","08h00-20h00","http://www.sultangrub.co.uk","sendme@sultangrub.co.uk","restaurant avec specialites africaines"," ",-1.536627, 29.887479);

-- ***************************************************************************************************************************************************************************************************************** 		

create table restaurant_type (
        `rtid` int     primary key not null AUTO_INCREMENT,
        `rt_name` text
        );

insert into restaurant_type ( rtid, rt_name) values
        (101, "Pudderies"),
        (102, "Congolese"),
        (103, "Chinese"),
        (104, "Juice bar");

-- ***************************************************************************************************************************************************************************************************************** 

create table category (
        `cid` int primary key not null auto_increment,
        `c_name` varchar(100),
        `c_rid` int,
        `c_sortval` int
        );

insert into category (cid, c_name, c_rid, c_sortval)
        values
        (201, "Starters", 2, 1),
        (202, "Chef Specials", 2, 2),
        (203, "Rices", 2, 4),
        (204, "Mains", 2, 3),
        (205, "Veggies", 2, 5),
        (206, "Appetisers", 3, 1),
        (207, "Currys", 3, 2),
        (208, "Rices", 3, 4),
        (209, "Baltis", 3, 3),
        (210, "Veggies", 3, 5),
        (215, "Desserts", 1, 1),
        (216, "Toppings", 1, 3);

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `owner`;
create table `owner`(
	`oid` int primary key not null auto_increment,
	`oname` varchar(75) NOT NULL unique,
	`ocontact` varchar(100) NOT NULL,
	`rid` int NOT NULL,
	FOREIGN KEY (`rid`) REFERENCES `restaurant`(`rid`)
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `owner`(`oid`, `oname`,`ocontact`,`rid`)
values
(1,"Vadalia","9999999999",1);
insert into `owner`(`oid`, `oname`,`ocontact`,`rid`)
values
(2,"Chidoro","95859993",3),
(3,"Masika","9584774",2);
-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `bill`;
create table `bill`(
	`Order_Id` int NOT NULL AUTO_INCREMENT,
	`Customer_id` int NOT NULL,
	`Total_Amount` double NOT NULL,	
	PRIMARY KEY (`Order_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `order_bill`;
create table `order_bill`(
	`Order_Id` int NOT NULL,
	`Name` varchar(100) NOT NULL,
	`Quantity` varchar(20) NOT NULL,
	`Price` varchar(20) NOT NULL,
	FOREIGN KEY(`Order_Id`) REFERENCES `bill`(`Order_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `customer`;
create table `customer`(
	`id` int NOT NULL AUTO_INCREMENT,
	`c_name` varchar(75) NOT NULL,
	`c_contact` varchar(20) DEFAULT NULL,
	`c_email` varchar(50) DEFAULT NULL,	
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `customer`(`id`,`c_name`,`c_contact`,`c_email`)
values
(1,"Arpit","938912","arpit.sharma@students.iiit.ac.in"),
(2,"Yash","289374","yash.shah@students.iiit.ac.in"),
(3,"Darshit","234322","darshit.serna@students.iiit.ac.in"),
(4,"Aditya","778989","aditya.sharma@students.iiit.ac.in"),
(5,"Pallav","364932","pallav.shah@students.iiit.ac.in"),
(6,"Rajat","734277","rajat.bharadwaj@students.iiit.ac.in"),
(7,"Achintya","347534","achintya.madhav@students.iiit.ac.in");

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `manager`;
create table `manager`(
	`manager_Id` int NOT NULL AUTO_INCREMENT,
	`m_name` varchar(75) NOT NULL,
	`m_contact` varchar(20) NOT NULL,
 	`Address` varchar(30) DEFAULT NULL,
  	`Salary` varchar(30) DEFAULT NULL,
	`Sex` char(1) DEFAULT NULL,
	`Bdate` date DEFAULT NULL,
	`Join_Date` date NOT NULL,
	PRIMARY KEY (`Manager_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `HOME_DELIVERY`;
create table `HOME_DELIVERY`(
	`Delivery_Id` int NOT NULL AUTO_INCREMENT,
	`Address` varchar(50) NOT NULL,
	`Contact` varchar(20) NOT NULL,
	`Cust_Id` int NOT NULL,
	`Order_Id` int NOT NULL,
	PRIMARY KEY(`Delivery_Id`),
	FOREIGN KEY (`Cust_Id`) REFERENCES `customer`(`id`),
	FOREIGN KEY (`Order_Id`) REFERENCES `bill`(`Order_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `menu`;
create table `menu`(
	`Menu_Id` int NOT NULL AUTO_INCREMENT,
	`Name` varchar(100) NOT NULL,
	`Price` varchar(20) NOT NULL,	
	`Type` varchar(20) DEFAULT NULL,
	`Category` varchar(30) NOT NULL,
	`rid` int not null,
	PRIMARY KEY(`Menu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into `menu`(`Menu_id`, `Name`,`Price`,`Type`,`Category`, `rid`)
values
(1,"Vegetable Pakora","3.00","Veg","Starters",1),
(2,"Vegetable Samosa","3.00","Veg","Starters",1),
(3,"Onion Bhaji ","3.00","Veg","Starters",1),
(4,"Potato and Mushroom Chaat","3.00","Veg","Starters",1),
(5,"Mushroom Garlic Fry","3.00","Veg","Starters",1),
(6,"Chicken Tikka","4.00","Non-Veg","Starters",1),
(7,"Tandoori Chicken","4.00","Non-Veg","Starters",1),
(8,"Chicken Garlic Fry","4.00","Non-Veg","Starters",1),
(9,"Chicken Tikka on Puree","4.00","Non-Veg","Starters",3),
(10,"Lamb Tikka","4.00","Non-Veg","Starters",3),
(11,"Tandoori King Prawn","6.95","Non-Veg","SeaFood",2),
(12,"King Prawn Rosun","5.95","Non-Veg","SeaFood",2),
(13,"King Prawn on Puree","5.95","Non-Veg","SeaFood",3),
(14,"Prawn Bhuna on Puree","3.95","Non-Veg","SeaFood",2),
(15,"Prawn Cocktail","3.95","Non-Veg","SeaFood",1),
(16,"Chi/Lam Sashlik Chi","9.95","Non-Veg","Tandoori Specials",1),
(17,"Tandoori Deluxe","12.95","Non-Veg","Tandoori Specials",1),
(18,"Tandoori Chicken Main","9.95","Non-Veg","Tandoori Specials",2),
(19,"Chicken Tikka","7.95","Non-Veg","Tandoori Specials",2),
(20,"Lamb Tikka","9.95","Non-Veg","Tandoori Specials",3),
(21,"Bombay Aloo ","6.50","Veg","Vegetable Dishes",3),
(22,"Mushroom Bhaji ","6.50","Veg","Vegetable Dishes",1),
(23,"Saag Dall","6.50","Veg","Vegetable Dishes",1),
(24,"Mattor Paneer","6.50","Veg","Vegetable Dishes",1),
(25,"Vegetable Roshun","6.50","Veg","Vegetable Dishes",1),
(26,"Boiled Rice","2.50","Veg","Side Orders - Rice",1),
(27,"Keema Pilau Rice","3.50","Non-Veg","Side Orders - Rice",3),
(28,"Mushroom Rice","3.20","Veg","Side Orders - Rice",3),
(29,"Garlic Naan","3.00","Veg","Side Orders - Bread",3),
(30,"Stuffed Naan","3.50","Veg","Side Orders - Bread",3),
(31,"Chapati","1.00","Veg","Side Orders - Bread",1),
(32,"Green Salad","2.00","Veg","Side Orders - Sundries",2),
(33,"Spice Popadum","0.80","Veg","Side Orders - Sundries",2),
(34,"Chutney","0.70","Veg","Side Orders - Sundries",1),
(35,"Ras Malai","2.95","Veg","Dessert",1),
(36,"Ice Cream","2.95","Veg","Dessert",1),
(37,"Gulab Jamun","2.95","Veg","Dessert",1),
(38,"Kulfi","2.95","Veg","Dessert",2),
(39,"Kheer","2.95","Veg","Dessert",2);


-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `tables`;
create table `tables`(
	`Table_Number` varchar(9) NOT NULL unique,
	`Details` varchar(200) DEFAULT NULL,
	`rid` int not null,
	PRIMARY KEY (`Table_Number`),
	FOREIGN KEY (`rid`) REFERENCES `restaurant`(`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into `tables`(`Table_Number`,`Details`, `rid`)
values
("101","Capacity 4 People",1),
("102","Capacity 4 People Near Window",1),
("103","Capacity 3 People",1),
("104","Capacity 2 People",1),
("105","Capacity 8 People Family Table",1),
("201","Capacity 4 People",2),
("202","Capacity 4 People Near Window",2),
("203","Capacity 3 People",2),
("302","Capacity 4 People Near Window",3),
("303","Capacity 3 People",3),
("304","Capacity 2 People",3),
("305","Capacity 8 People Family Table",3);


-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `booking`;
create table `booking`(
	`Booking_Id` int NOT NULL AUTO_INCREMENT,
	`Table_Num` varchar(30) NOT NULL,
	`WhenMade`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`DateIssued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`Time` varchar(30) NOT NULL,
	`PaymentBy` varchar(20) not null,
	`Cust_Id` int NOT NULL,
	PRIMARY KEY (`Booking_Id`),
	FOREIGN KEY (`Cust_Id`) REFERENCES `customer`(`id`),
	FOREIGN KEY (`Table_Num`) REFERENCES `tables`(`Table_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ***************************************************************************************************************************************************************************************************************** 

drop table if exists `foods`;
create table `foods`(
	`food_Id` int NOT NULL AUTO_INCREMENT,
	`food_name` varchar(200) NOT NULL,
	`food_desc` varchar(250) NOT NULL,
	`food_price` double NOT NULL,
	`food_img` longblob,
	`food_cat` varchar(100) not null, -- list of foods categories
	`rid` int NOT NULL,
	PRIMARY KEY (`food_Id`),
	FOREIGN KEY (`rid`) REFERENCES `restaurant`(`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into foods (food_id, food_name,food_desc,food_price,food_img,food_cat,rid) 
values
(1,"Ngulu pimente","le porc melange a la sauce et avec du piment",10.0," ","viande",1),
(2,"Ngulu pimente","le porc melange a la sauce et avec du piment",15.5," ","viande",2),
(3,"Ngulu pimente","le porc melange a la sauce et avec du piment",20.5," ","viande",3);

-- ***************************************************************************************************************************************************************************************************************** 








