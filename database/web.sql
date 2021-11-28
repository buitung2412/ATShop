CREATE DATABASE Web DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use Web;

CREATE TABLE IF NOT EXISTS category
(
	id int PRIMARY KEY AUTO_INCREMENT,
	`name` varchar(100) NOT NULL UNIQUE,
	status tinyint(1) DEFAULT '1' COMMENT '1 là hiểu thị, 0 ẩn',
	prioty tinyint DEFAULT '0',
	created_at date DEFAULT NOW(),
	updated_at date DEFAULT NOW()
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS banner
(
	id int PRIMARY KEY AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
	image VARCHAR(200) NOT NULL,
	link VARCHAR(255) DEFAULT '#',
	status tinyint(1) DEFAULT '1' COMMENT '1 là hiểu thị, 0 ẩn',
	prioty tinyint DEFAULT '0',
	created_at date DEFAULT NOW(),
	updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS product
(
	id int PRIMARY KEY AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
	image VARCHAR(200) NOT NULL,
	price float(9,3) NOT NULL,
	sale_price float(9,3) DEFAULT '0',
	description text,
	image_list text,
	status tinyint(1) DEFAULT '1' COMMENT '1 là hiểu thị, 0 ẩn',
	category_id int NOT NULL,
	created_at date DEFAULT NOW(),
	updated_at date DEFAULT NOW(),
	FOREIGN KEY (category_id) REFERENCES category (id)

) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS account
(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(100) NOT NULL UNIQUE,
	phone varchar(100) NOT NULL UNIQUE,
	email varchar(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	address varchar(255) NULL,
	role varchar(50) DEFAULT 'customer',
	status tinyint(1) DEFAULT '1' COMMENT '1 là ok, 0 bị khóa',
	created_at date DEFAULT NOW(),
	updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS blog
(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(200) NOT NULL,
	image VARCHAR(200) NOT NULL,
	sumary varchar(255),
	description text,
	status tinyint(1) DEFAULT '1' COMMENT '1 là hiểu thị, 0 ẩn',
	account_id int NOT NULL,
	created_at date DEFAULT NOW(),
	updated_at date DEFAULT NOW(),
	FOREIGN KEY (account_id) REFERENCES account(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `order`
(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(200) NOT NULL,
	email varchar(100) NOT NULL,
	phone varchar(100) NOT NULL,
	address varchar(255) NULL,
	note text,
	status tinyint(1) DEFAULT '1' COMMENT '1 là hiểu thị, 0 ẩn',
	account_id int NOT NULL,
	created_at date DEFAULT NOW(),
	updated_at date DEFAULT NOW(),
	FOREIGN KEY (account_id) REFERENCES account(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS order_detail
(
	order_id int NOT NULL,
	product_id int NOT NULL,
	quantity int NOT NULL,
	price float NOT NULL,
	FOREIGN KEY (order_id) REFERENCES `order`(id),
	FOREIGN KEY (product_id) REFERENCES product(id)
) ENGINE = InnoDB;

