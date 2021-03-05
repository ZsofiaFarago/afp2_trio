-- -----------------------------------------------------
-- Schema estatedb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS estatedb DEFAULT CHARACTER SET utf8 ;
USE estatedb ;

-- -----------------------------------------------------
-- Table estatedb.city
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estatedb.city (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  zipcode VARCHAR(10) NOT NULL,
  PRIMARY KEY (id));

-- -----------------------------------------------------
-- Table estatedb.address
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estatedb.address (
  id INT NOT NULL AUTO_INCREMENT,
  city_id INT NOT NULL,
  street_name VARCHAR(50) NOT NULL,
  street_number VARCHAR(10) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_address_city
    FOREIGN KEY (city_id)
    REFERENCES estatedb.city (id));

-- -----------------------------------------------------
-- Table estatedb.client
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estatedb.client (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  address_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_client_address
    FOREIGN KEY (address_id)
    REFERENCES estatedb.address (id));

-- -----------------------------------------------------
-- Table estatedb.estate
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estatedb.estate (
  id INT NOT NULL AUTO_INCREMENT,
  address_id INT NOT NULL,
  selling_price INT NOT NULL,
  purchase_price INT NOT NULL,
  area DOUBLE NOT NULL,
  room_number INT NOT NULL,
  description VARCHAR(500) NOT NULL,
  image_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_estate_address
    FOREIGN KEY (address_id)
    REFERENCES estatedb.address (id));

-- -----------------------------------------------------
-- Table estatedb.estate_agent
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estatedb.estate_agent (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  address_id INT NOT NULL,
  speciality VARCHAR(50) NOT NULL,
  image_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_estate_agent_address
    FOREIGN KEY (address_id)
    REFERENCES estatedb.address (id));