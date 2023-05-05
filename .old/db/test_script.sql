use vise_db;

INSERT INTO `account` (`account_number`, `balacing_item`, `current_balance`, `opening_date`, `contract`, `open_close`)
VALUES ('1', '1', '1', '2023-05-01', NULL, '1'), ('2', '1', '1', '2023-04-01', null, '1');

INSERT INTO `user` (`user_name`, `password`, `gender`, `name`, `surname`, `email`, `birth_date`, `birth_place`, `telephone_number`, `mobile_number`, `registration_date`, `account_id`)
VALUES ('mariorossi', 'test', 'male', 'Mario', 'Rossi', 'mariorossi@gmail.com', '2003-05-01', 'Rovigo', '333333333', '444444444', '2023-05-01', '1'), ('cesareverdi', 'verdi', 'male', 'Cesare', 'Verdi', 'cesareverdi@gmail.com', '2001-11-01', 'Roma', '555555555', '666666666', '2023-04-01', '2'); 

INSERT INTO `billing_address` (`id`, `street_type`, `street_name`, `civic_number`, `city`, `postal_code`, `province`, `region`, `country`)
VALUES ('1', 'Via', 'Roma', '1', 'Rovigo', '45100', 'Rovigo', 'Veneto', 'Italy'), ('2', 'Via', 'Bianchi', '7', 'Rovigo', '45100', 'Rovigo', 'Veneto', 'Italy');

INSERT INTO `card` (`id`, `card_name`, `institute_communication_token`, `expiration_date`, `billing_address_id`)
VALUES ('1', 'Intesa Debit', 'notoken', '06/23', '1'), ('2', 'Posteitaliane', 'notken2', '09/24', '2');

INSERT INTO `payment_circuit` (`id`, `circuit_name`) VALUES ('1', 'Mastercard'), ('2', 'Visa');

INSERT INTO `card_circuit` (`card_id`, `circuit_id`) VALUES ('1', '1'), ('2', '2');

use intesa_san_paolo_db;

INSERT INTO `address` (`id`, `street_type`, `street_name`, `civic_number`, `city`, `postal_code`, `province`, `region`, `country`)
VALUES ('1', 'Via', 'Roma', '9', 'Firenze', '50100', 'Firenze', 'Toscana', 'Italia');

INSERT INTO `account` (`account_number`, `balacing_item`, `current_balance`, `opening_date`, `contract`, `open_close`)
VALUES ('1', '1', '1', '2023-05-04', NULL, '1');

INSERT INTO `customer` (`tax_code`, `name`, `surname`, `gender`, `email`, `birth_date`, `birth_place`, `telephone_number`, `mobile_number`, `registration_date`, `residence_id`, `abode_id`, `abled`)
VALUES ('lvzndr04s09h620s', 'Andrea', 'Lavezzi', 'Male', 'andrealavezzi@yahoo.com', '2004-11-09', 'Granzette', '3333333333', '4444444444', '2023-05-03', '1', NULL, '1');

INSERT INTO `payment_circuit` (`id`, `circuit_name`) VALUES ('1', 'Mastercard');

INSERT INTO `card` (`pan`, `cvc_cvv`, `expiration_date`, `account_id`, `type_id`) VALUES ('1234567890123456', '123', '06/23', '1', NULL);

INSERT INTO `customer_card` (`customer_id`, `card_id`) VALUES ('lvzndr04s09h620s', '1234567890123456');

INSERT INTO `external_institute` (`id`, `institute_name`) VALUES ('1', 'Intesa San Paolo');
