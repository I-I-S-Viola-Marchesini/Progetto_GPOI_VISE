/**
* Gruppo Di Lena, Ferrari, Lavezzi, Marchetto G., Pavan
* Classe 5F A.S. 2022-2023
* Script del database per l'istituto di credito
* N.B. : lo script è valido SOLO per MySQL
**/

CREATE DATABASE credit_institute;
USE credit_institute;

CREATE TABLE credit_institute.customer(
    tax_code VARCHAR(16) PRIMARY KEY,
    gender VARCHAR(10) NOT NULL,
    `name` VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    birth_date date NOT NULL,
    birth_place VARCHAR(30) NOT NULL,
    telephone_number VARCHAR(15) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    registration_date DATE NOT NULL,
    residence_id INT NOT NULL,
    abode_id INT -- id_domicilio
);

CREATE TABLE credit_institute.account(
    account_number INT AUTO_INCREMENT PRIMARY KEY,
    balacing_item INT NOT NULL,
    current_balance INT NOT NULL,
    opening_date DATE NOT NULL,
    `contract` BLOB,
    open_close BOOLEAN NOT NULL
);

CREATE TABLE credit_institute.address(
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

CREATE TABLE credit_institute.card(
    pan VARCHAR(16) NOT NULL PRIMARY KEY,
    cvc_cvv VARCHAR(3) NOT NULL,
    expiration_date VARCHAR(5) NOT NULL,
    account_id INT,
    type_id INT
);

CREATE TABLE credit_institute.payment_circuit(
    id INT AUTO_INCREMENT PRIMARY KEY,
    circuit_name VARCHAR(30) NOT NULL
);

CREATE TABLE credit_institute.card_type(
    id INT AUTO_INCREMENT PRIMARY KEY,
    `type` VARCHAR(30) NOT NULL,
    daily_maximum INT NOT NULL,
    monthly_maximum INT NOT NULL,
    `contract` BLOB
);

CREATE TABLE credit_institute.transaction(
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_time DATETIME NOT NULL,
    transaction_type VARCHAR(15) NOT NULL,
    amount INT NOT NULL,
    sender VARCHAR(50) NOT NULL,
    receiver VARCHAR(50) NOT NULL
);

CREATE TABLE credit_institute.external_institute(
    id INT AUTO_INCREMENT PRIMARY KEY,
    institute_name VARCHAR(50) NOT NULL
);

CREATE TABLE credit_institute.customer_account(
    customer_id VARCHAR(16),
    account_id INT
);

CREATE TABLE credit_institute.customer_card(
    customer_id VARCHAR(16),
    card_id VARCHAR(16)
);

CREATE TABLE credit_institute.card_circuit(
    card_id VARCHAR(16),
    circuit_id INT
);

CREATE TABLE credit_institute.account_transaction(
    account_id INT,
    transaction_id INT
);

CREATE TABLE credit_institute.card_institute(
    institute_id INT,
    card_id VARCHAR(16),
    communication_token VARCHAR(30) NOT NULL
);

ALTER TABLE credit_institute.customer
ADD CONSTRAINT fk_customer_residence_id
FOREIGN KEY (residence_id) REFERENCES address(id);

ALTER TABLE credit_institute.customer
ADD CONSTRAINT fk_customer_abode_id
FOREIGN KEY (abode_id) REFERENCES address(id);

ALTER TABLE credit_institute.card
ADD CONSTRAINT fk_card_type
FOREIGN KEY (type_id) REFERENCES card_type(id);

ALTER TABLE credit_institute.customer_account
ADD CONSTRAINT fk_customer_account_customer_id
FOREIGN KEY (customer_id) REFERENCES customer(tax_code);

ALTER TABLE credit_institute.customer_account
ADD CONSTRAINT fk_customer_account_account_id 
FOREIGN KEY (account_id) REFERENCES account(account_number);

ALTER TABLE credit_institute.customer_card
ADD CONSTRAINT fk_customer_card_customer_id
FOREIGN KEY (customer_id) REFERENCES customer(tax_code);

ALTER TABLE credit_institute.customer_card
ADD CONSTRAINT fk_customer_card_card_id
FOREIGN KEY (card_id) REFERENCES card(pan);

ALTER TABLE credit_institute.card_circuit
ADD CONSTRAINT fk_card_circuit_card_id
FOREIGN KEY (card_id) REFERENCES card(pan);

ALTER TABLE credit_institute.card_circuit
ADD CONSTRAINT fk_card_circuit_circuit_id
FOREIGN KEY (circuit_id) REFERENCES payment_circuit(id);

ALTER TABLE credit_institute.account_transaction
ADD CONSTRAINT fk_account_transaction_account_id
FOREIGN KEY (account_id) REFERENCES account(account_number);

ALTER TABLE credit_institute.account_transaction
ADD CONSTRAINT fk_account_transaction_transaction_id
FOREIGN KEY (transaction_id) REFERENCES transaction(id);

ALTER TABLE credit_institute.card_institute
ADD CONSTRAINT fk_card_institute_institute_id
FOREIGN KEY (institute_id) REFERENCES external_institute(id);

ALTER TABLE credit_institute.card_institute
ADD CONSTRAINT fk_card_institute_card_id
FOREIGN KEY (card_id) REFERENCES card(pan);