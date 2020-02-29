CREATE DATABASE test_POS_app;
USE test_POS_app;
CREATE TABLE Cashier (
	id INT(5) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(225) NOT NULL);
	
CREATE TABLE Category (
	id INT(5) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(225) NOT NULL);
	
CREATE TABLE Product (
	id INT(5) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(225) NOT NULL,
	Price INT(10) NOT NULL,
	id_category INT(5) NOT NULL,
	id_cashier INT(5) NOT NULL);
	
CREATE INDEX category ON Product (id_category);
CREATE INDEX cashier ON Product (id_cashier);

ALTER TABLE Product
ADD CONSTRAINT fk_category
FOREIGN KEY (id_category) REFERENCES Category(id);

ALTER TABLE Product
ADD CONSTRAINT fk_cashier
FOREIGN KEY (id_cashier) REFERENCES Cashier(id);
INSERT INTO Category (name) VALUES (Food),(Drink);
INSERT INTO Cashier(name) VALUES ('Pevita Pearce'),('Raisa Andriana'),('Ardiyana Saputra');
INSERT INTO Product (name,price,id_category,id_cashier) VALUES ('Latte',10000,2,1),(Cake,20000,1,2),('Nasi Goreng Special',45000,1,3);		