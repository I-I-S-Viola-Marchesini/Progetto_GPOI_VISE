/*
Gruppo Di Lena, Ferrari, Lavezzi, Marchetto G., Pavan
Classe 5F A.S. 2022-2023
Script del database per VISE
N.B. : lo script è valido SOLO per MySQL
*/


CREATE DATABASE vise_db;
USE vise_db;

CREATE TABLE user_account(
    username VARCHAR(30) PRIMARY KEY,
    `name` VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(60) NOT NULL,
    `password` VARCHAR(30) NOT NULL,
    tax_code VARCHAR(16) NOT NULL,
    mobile_number VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    registration_date DATE NOT NULL,
    balance DECIMAL(5,2) NOT NULL, -- importo in euro, il massimo è 99999,99
    `status` BOOLEAN NOT NULL
);

CREATE TABLE card(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(30) NOT NULL,
    pan VARCHAR(16) NOT NULL, -- il pan non deve essere salvato interamente per sicurezza, ma solo alcune cifre ( prime e/o ultime quattro cifre)
    expiration_date DATE NOT NULL,
    billing_address VARCHAR(100) NOT NULL,
    payment_gateway_id INT NOT NULL
);

CREATE TABLE payment_gateway(
    id INT AUTO_INCREMENT PRIMARY KEY,
    card_token VARCHAR(200) NOT NULL,
    credit_circuit VARCHAR(30) NOT NULL
);

CREATE TABLE payment(
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_user_id VARCHAR(16) NOT NULL, -- indico il mittente e il relativo conto VISE
    receiver_user_id VARCHAR(16) NOT NULL, -- indico il destinatario e il relativo conto VISE in cui verrà inserito il denaro inviato dal mittente
    payment_date_time DATETIME NOT NULL,
    amount DECIMAL(4,2) NOT NULL, -- importo del pagamento in euro, il massimo è 9999,99
    account_payment BOOLEAN NOT NULL, -- se true indica che parte del denaro proviene dal conto del mittente
    card_payment BOOLEAN NOT NULL, -- se true indica che parte del denaro proviene dalla carta del mittente
    sender_card_id INT -- viene usato quando il mittente usa la carta
);

ALTER TABLE `card`  ADD CONSTRAINT fk_payment_gateway_card_id
FOREIGN KEY (payment_gateway_id) REFERENCES payment_gateway(id);

ALTER TABLE payment ADD CONSTRAINT fk_payment_sender_id
FOREIGN KEY (sender_user_id) REFERENCES user_account(username);

ALTER TABLE payment ADD CONSTRAINT fk_payment_receiver_id
FOREIGN KEY (receiver_user_id) REFERENCES user_account(username);

ALTER TABLE payment ADD CONSTRAINT fk_payment_sender_card_id
FOREIGN KEY (sender_card_id) REFERENCES `card`(id);

ALTER TABLE `card` ADD CONSTRAINT fk_card_user_id
FOREIGN KEY (user_id) REFERENCES user(username); 