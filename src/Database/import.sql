-- Gruppo Di Lena, Ferrari, Lavezzi, Marchetto G., Pavan
-- Classe 5F A.S. 2022-2023
-- Query per la popolazione del database di VISE
-- N.B. : lo script è valido SOLO per MySQL



INSERT INTO user(username, name, last_name, email, password, tax_code, mobile_number, birth_date, registration_date, status)
VALUES ('francescodl04', 'Francesco', 'Di Lena', 'francescodl727@gmail.com', 'DLNFNC04A28H620N', '3937130567', '2004-01-28', '2023-05-01 12:55:09', 'true');

INSERT INTO account(user_id, balance)
VALUES ('francescodl04', '1400.5' );

INSERT INTO user(username, name, last_name, email, password, tax_code, mobile_number, birth_date, registration_date, status)
VALUES ('mariorossi04', 'Mario', 'Rossi', 'mario.rossi76@gmail.com', 'RSSMAR76A11H620N', '3476181014', '1976-01-11', '2021-06-30 11:11:09', 'true');

INSERT INTO account(user_id, balance)
VALUES ('francescodl04', '0' );

