/**
* Gruppo Di Lena, Ferrari, Lavezzi, Marchetto G., Pavan
* Classe 5F A.S. 2022-2023
* Script del database per VISE
* N.B. : lo script è valido SOLO per MySQL
**/

CREATE DATABASE vise_db;
USE vise_db;

CREATE TABLE vise_db.customer(
    user_name VARCHAR(30) PRIMARY KEY,
    gender VARCHAR(10) NOT NULL,
    `name` VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    birth_date date NOT NULL,
    birth_place VARCHAR(30) NOT NULL,
    telephone_number VARCHAR(15) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    registration_date DATE NOT NULL,
    account_id INT NOT NULL
);

CREATE TABLE vise_db.account(
    account_number INT AUTO_INCREMENT PRIMARY KEY,
    balacing_item INT NOT NULL,
    current_balance INT NOT NULL,
    opening_date DATE NOT NULL,
    `contract` BLOB,
    open_close BOOLEAN NOT NULL
);

CREATE TABLE vise_db.billing_address(
    id INT AUTO_INCREMENT PRIMARY KEY,
    street_type VARCHAR(10) NOT NULL,
    street_name VARCHAR(30) NOT NULL,
    civic_number INT NOT NULL,
    city VARCHAR(40) NOT NULL,
    postal_code INT NOT NULL,
    province VARCHAR(40) NOT NULL,
    region VARCHAR(40) NOT NULL,
    country VARCHAR(40) NOT NULL
);

CREATE TABLE vise_db.card(
    id INT AUTO_INCREMENT PRIMARY KEY,
    card_name VARCHAR(15) NOT NULL,
    institute_communication_token INT NOT NULL,
    expiration_date VARCHAR(5) NOT NULL,
    billing_address_id INT
);

CREATE TABLE vise_db.payment_circuit(
    id INT AUTO_INCREMENT PRIMARY KEY,
    circuit_name VARCHAR(30) NOT NULL
);

CREATE TABLE vise_db.transaction(
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_time DATETIME NOT NULL,
    transaction_type VARCHAR(15) NOT NULL,
    amount INT NOT NULL,
    sender VARCHAR(50) NOT NULL,
    receiver VARCHAR(50) NOT NULL
);

CREATE TABLE vise_db.customer_card(
    customer_id VARCHAR(30),
    card_id INT
);

CREATE TABLE vise_db.card_circuit(
    card_id INT,
    circuit_id INT
);

CREATE TABLE vise_db.account_transaction(
    account_id INT,
    transaction_id INT
);

ALTER TABLE vise_db.customer
ADD CONSTRAINT fk_customer_account_id
FOREIGN KEY (account_id) REFERENCES account(account_number);

ALTER TABLE vise_db.card
ADD CONSTRAINT fk_card_billing_address_id
FOREIGN KEY (billing_address_id) REFERENCES billing_address(id);

ALTER TABLE vise_db.customer_card
ADD CONSTRAINT fk_customer_card_customer_id
FOREIGN KEY (customer_id) REFERENCES customer(user_name);

ALTER TABLE vise_db.customer_card
ADD CONSTRAINT fk_customer_card_card_id
FOREIGN KEY (card_id) REFERENCES card(id);

ALTER TABLE vise_db.card_circuit
ADD CONSTRAINT fk_card_circuit_card_id
FOREIGN KEY (card_id) REFERENCES card(id);

ALTER TABLE vise_db.card_circuit
ADD CONSTRAINT fk_card_circuit_circuit_id
FOREIGN KEY (circuit_id) REFERENCES payment_circuit(id);

ALTER TABLE vise_db.account_transaction
ADD CONSTRAINT fk_account_transaction_account_id
FOREIGN KEY (account_id) REFERENCES account(account_number);

ALTER TABLE vise_db.account_transaction
ADD CONSTRAINT fk_account_transaction_transaction_id
FOREIGN KEY (transaction_id) REFERENCES transaction(id);