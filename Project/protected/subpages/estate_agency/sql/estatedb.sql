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
  password VARCHAR(50) NOT NULL,
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
  client_id INT,
  PRIMARY KEY (id),
  CONSTRAINT fk_estate_address
    FOREIGN KEY (address_id)
    REFERENCES estatedb.address (id),
  CONSTRAINT fk_estate_client
    FOREIGN KEY (client_id)
    REFERENCES estatedb.client (id));

-- -----------------------------------------------------
-- Table estatedb.reserve
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estatedb.reserve (
  id INT NOT NULL AUTO_INCREMENT,
  estate_id INT NOT NULL,
  client_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_reserve_estate
    FOREIGN KEY (estate_id)
    REFERENCES estatedb.estate (id),
  CONSTRAINT fk_reserve_client
    FOREIGN KEY (client_id)
    REFERENCES estatedb.client (id));

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

-- -----------------------------------------------------
-- Table estatedb.service
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estatedb.service (
  id INT NOT NULL AUTO_INCREMENT,
  evaluation TINYINT NOT NULL,
  energetic TINYINT NOT NULL,
  property_paper TINYINT NOT NULL,
  plan TINYINT NOT NULL,
  size FLOAT NOT NULL,
  type VARCHAR(50) NOT NULL,
  address_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_service_address
    FOREIGN KEY (address_id)
    REFERENCES estatedb.address (id));

INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('1', 'Eger', '3300');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('2', 'Kazincbarcika', '3700');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('3', 'Pécs', '7691');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('4', 'Győr', '9000');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('5', 'Nyíregyháza', '4400');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('6', 'Gyöngyös', '3200');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('7', 'Békéscsaba', '5600');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('8', 'Székesfehérvár', '8000');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('9', 'Mosonmagyaróvár', '9200');
INSERT INTO `estatedb`.`city` (`id`, `name`, `zipcode`) VALUES ('10', 'Sopron', '9400');

INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('1', '1', 'Egészségház u.', '11/A');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('2', '10', 'Király út', '15');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('3', '6', 'Ady Endre u.', '9');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('4', '8', 'Hunyadi Mátyás u.', '8');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('5', '9', 'János Pál u.', '5/B');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('6', '2', 'Molylepke út', '13/A');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('7', '3', 'Reneszánsz u.', '10');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('8', '4', 'Fő út', '33');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('9', '5', 'Petőfi Sándor u.', '17');
INSERT INTO `estatedb`.`address` (`id`, `city_id`, `street_name`, `street_number`) VALUES ('10', '7', 'Arany János u.', '3/B');

INSERT INTO `estatedb`.`estate_agent` (`id`, `first_name`, `last_name`, `email`, `phone`, `address_id`, `speciality`, `image_name`) VALUES ('1', 'Gordon', 'Ramsay', 'gordon.ramsay@estate.com', '06 90 555 8413', '2', 'Értékesítés, lakberendezés', 'agent_001.jpg');
INSERT INTO `estatedb`.`estate_agent` (`id`, `first_name`, `last_name`, `email`, `phone`, `address_id`, `speciality`, `image_name`) VALUES ('2', 'Cersei', 'Lanniester', 'c.lanniester@estate.com', '06 90 555 3057', '4', 'Értékbecslés, tulajdonjog', 'agent_002.jpg');
INSERT INTO `estatedb`.`estate_agent` (`id`, `first_name`, `last_name`, `email`, `phone`, `address_id`, `speciality`, `image_name`) VALUES ('3', 'Anakin', 'Skywalker', 'anakin.s@estate.com', '06 90 555 3930', '1', 'Energetika, klíma, fűtés', 'agent_003.png');
INSERT INTO `estatedb`.`estate_agent` (`id`, `first_name`, `last_name`, `email`, `phone`, `address_id`, `speciality`, `image_name`) VALUES ('4', 'Perselus', 'Piton', 'perselus.piton@estate.com', '06 90 555 2456', '3', 'Teljes szakterület', 'agent_004.jpg');

INSERT INTO `estate` (`id`, `address_id`, `selling_price`, `purchase_price`, `area`, `room_number`, `description`, `image_name`, `client_id`) VALUES ('1', '6', '500000000', '395000000', '110', '10', 'Régi építésű ház, elszigetelt helyen található. Haszonállat tartására laklamas udvar tartozik hozzá. Van terasz is.', 'estate_001.jpg', 1);
INSERT INTO `estate` (`id`, `address_id`, `selling_price`, `purchase_price`, `area`, `room_number`, `description`, `image_name`, `client_id`) VALUES ('2', '7', '1000000000', '900000000', '250', '15', 'Nagy ház, sok szobával, légkondícionálóval, erdős területre néző kilátással, graázzsal, medencével. Felújításra szorul a konyha és a fürdőszobák.', 'estate_002.jpg', 2);
INSERT INTO `estate` (`id`, `address_id`, `selling_price`, `purchase_price`, `area`, `room_number`, `description`, `image_name`, `client_id`) VALUES ('3', '8', '80000000', '65000000', '60', '3', 'Két fürdőszobával és nagy konyhával rendelkező ház. Az árból lejön a rossz szomszédság és a felújításra szoruló fűtésrendszer.', 'estate_003.jpg', 3);
INSERT INTO `estate` (`id`, `address_id`, `selling_price`, `purchase_price`, `area`, `room_number`, `description`, `image_name`, `client_id`) VALUES ('4', '9', '94000000', '88000000', '96', '4', 'Padlással és pincével rendelkező ház, hátsó bejárattal, veteményeskerttel. Kétszintes, a második szint könnyen leválasztható és külön lakrésszé alakítható.', 'estate_004.jpg', 1);

INSERT INTO `reserve` values(1, 1, 3);
INSERT INTO `reserve` values(2, 2, 2);
INSERT INTO `reserve` values(3, 3, 1);
INSERT INTO `reserve` values(4, 4, 1);