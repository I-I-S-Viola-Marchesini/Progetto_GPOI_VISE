-- Gruppo Di Lena, Ferrari, Lavezzi, Marchetto G., Pavan
-- Classe 5F A.S. 2022-2023
-- Script del database per VISE
-- N.B. : lo script è valido SOLO per MySQL


CREATE DATABASE vise_db;
USE vise_db;

CREATE TABLE user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    tax_code VARCHAR(16) NOT NULL,
    mobile_number VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    registration_date DATE NOT NULL,
    `status` BOOLEAN NOT NULL
);

CREATE TABLE account(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    balance INT NOT NULL
);

CREATE TABLE card(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    expiration_date DATE NOT NULL,
    billing_address VARCHAR(50) NOT NULL,
    id_payment_gateway INT NOT NULL
);

CREATE TABLE payment_gateway(
    id INT AUTO_INCREMENT PRIMARY KEY,
    card_token VARCHAR(200) NOT NULL,
    credit_circuit VARCHAR(30) NOT NULL
);

CREATE TABLE payment(
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_user_id INT NOT NULL,
    sender_card_id INT NOT NULL,
    payment_date DATE NOT NULL,
    destination VARCHAR(50) NOT NULL,
    amount INT NOT NULL
);

ALTER TABLE account ADD CONSTRAINT fk_account_user_id
FOREIGN KEY (user_id) REFERENCES user(id);

ALTER TABLE `card`  ADD CONSTRAINT fk_payment_gateway_card_id
FOREIGN KEY (id_payment_gateway) REFERENCES payment_gateway(id);

ALTER TABLE payment ADD CONSTRAINT fk_payment_user_id
FOREIGN KEY (sender_user_id) REFERENCES user(id);

ALTER TABLE payment ADD CONSTRAINT fk_payment_card_id
FOREIGN KEY (sender_card_id) REFERENCES `card`(id);

ALTER TABLE `card` ADD CONSTRAINT fk_card_user_id
FOREIGN KEY (user_id) REFERENCES user(id); 