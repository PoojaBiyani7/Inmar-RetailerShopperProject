show databases;

use retailershopperdatabase;

create table retailer(
 rId int(11) auto_increment,
 rFirstname varchar(20) NOT NULL,
 rLastname varchar(20) NOT NULL,
 rEmail varchar(30) unique NOT NULL,
 rPassword varchar(20) NOT NULL,
 rAddress varchar(30) NOT NULL,
 rPAN varchar(10) NOT NULL,
 PRIMARY KEY(rId)
 );
 
 create table shopper( 
 sId int NOT NULL PRIMARY KEY AUTO_INCREMENT,
 retailerId int NOT NULL DEFAULT 0,
 retailerEmail varchar(30) NOT NULL DEFAULT 0,
 sEmail varchar(30) NOT NULL UNIQUE, 
 sPassword varchar(20) NOT NULL,
 FOREIGN KEY (retailerId) REFERENCES retailer(rId),
 FOREIGN KEY (retailerEmail) REFERENCES retailer(rEmail)
 );
 
 create table retailershopper1(
 transactionDate date NOT NULL,
 shopperId int NOT NULL, 
 sRetailerId int NOT NULL, 
 shopperTransactionWallet double NOT NULL DEFAULT 100, 
 shopperWallet double NOT NULL DEFAULT 3500, 
 retailerWallet double NOT NULL DEFAULT 0,
 PRIMARY KEY(transactionDate,shopperId,sRetailerId)
 );
 
 create table checkforupdateonce1 (
 retailerId int NOT NULL,
 updatedDate date NOT NULL,
 PRIMARY KEY(retailerId,updatedDate)
 );
 
 create table store1(
 retailerId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
 retailerEmail varchar(30) NOT NULL DEFAULT 0,
 storeName varchar(30) NOT NULL, 
 storeDescription varchar(225) NOT NULL,
 storeLocation varchar(100) NOT NULL,
 FOREIGN KEY (retailerEmail) REFERENCES retailer(rEmail)
 );

