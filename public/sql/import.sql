DROP DATABASE IF EXISTS LuckyFluxx;

CREATE DATABASE LuckyFluxx;

USE LuckyFluxx;

CREATE TABLE flight ( 
    `id` INT NOT NULL AUTO_INCREMENT ,
    `from` VARCHAR(255) NOT NULL ,
    `to` VARCHAR(255) NOT NULL ,
    `date` DATE NOT NULL , 
    `time` TIME NOT NULL ,
    `adults` INT(30) NULL , 
    `kids` INT(30) NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE info (
    `id` INT NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `house_num` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `country` VARCHAR(255) NOT NULL,
    `birthday` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE schedule (
    id INT NOT NULL AUTO_INCREMENT,
    departure_location VARCHAR(255) NOT NULL,
    arrival_location VARCHAR(255) NOT NULL,
    departure_time VARCHAR(255) NOT NULL,
    arrival_time VARCHAR(255) NOT NULL,
    duration VARCHAR(255) NOT NULL,
    available_seats INT NOT NULL,
    total_seats INT NOT NULL,
    maintenance_time VARCHAR(255) NOT NULL,
    departure_type VARCHAR(255) NOT NULL,
    transit_options VARCHAR(255) NOT NULL,
    day INT NOT NULL,
    month INT NOT NULL,
    year INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `starport` (
    id INT NOT NULL AUTO_INCREMENT,
    location_starport VARCHAR(255) NOT NULL,
    type_starport VARCHAR(255) NOT NULL,
    coordinates_starport VARCHAR(255) NOT NULL,
    arrcoordinates_starport_transit_hub VARCHAR(255) NOT NULL,
    distance VARCHAR(255) NOT NULL,
    destination_city VARCHAR(255) NOT NULL,
    estimated_starport_cost VARCHAR(255) NOT NULL,
    available_transit_options VARCHAR(225) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO schedule (
    departure_location,
    arrival_location,
    departure_time,
    arrival_time,
    duration,
    available_seats,
    total_seats,
    maintenance_time,
    departure_type,
    transit_options,
    day,
    month,
    year
) VALUES (
    'Amsterdam',
    'Beijing',
    '2024-12-01 12:30:00 CET',
    '2024-12-02 14:15:00 CST',
    '1 hour 45 minutes',
    0,
    20,
    '15 - 20 minutes',
    'At sea',
    'Tesla Model B boat, VIP helicopter',
    1,
    12,
    2024
);

INSERT INTO starport (
    location_starport,
    type_starport,
    coordinates_starport,
    arrcoordinates_starport_transit_hub,
    distance,
    destination_city,
    estimated_starport_cost,
    available_transit_options
) VALUES (
    'Amsterdam',
    'At sea',
    '52.3782, 4.8975',
    '52.376388, 4.894742',
    '4', 
    'Amsterdam', 
    '$1,500,000,000', 
    'Tesla Model B, boat, VIP helicopter'
),
(
    'New York',
    'At sea',
    '40.712775, -74.006000',
    '40.711000, -74.008783',
    '5',
    'New York',
    '$1,800,000,000',
    'Tesla Model B, boat, VIP helicopter'
),
(
    'Sydney',
    'Off-grid',
    '-33.868820, 151.209296',
    '-33.866111, 151.207014',
    '3.5',
    'Sydney',
    '$1,600,000,000',
    'VIP helicopter, Model X'
),
(
    'Tokyo',
    'Large Lake',
    '35.689486, 139.691706',
    '35.686756, 139.694393',
    '4',
    'Tokyo',
    '$1,700,000,000',
    'Tesla Model B, boat, VIP helicopter, Model X'
),
(
    'Dubai',
    'Off-grid',
    '25.276987, 55.296249',
    '25.274210, 55.298928',
    '3.5',
    'Dubai',
    '$1,400,000,000',
    'VIP helicopter, Model X'
),
(
    'Singapore',
    'At sea',
    '1.352083, 103.819836',
    '1.349413, 103.822533',
    '4',
    'Singapore',
    '$1,500,000,000',
    'Tesla Model B, boat, VIP helicopter'
),
(
    'Hong Kong',
    'At sea',
    '22.319304, 114.169361',
    '22.316620, 114.171983',
    '4',
    'Hong Kong',
    '$1,500,000,000',
    'Tesla Model B, boat, VIP helicopter'
),
(
    'Los Angeles',
    'At sea',
    '34.052235, -118.243683',
    '34.049526, -118.246293',
    '5',
    'Los Angeles',
    '$1,800,000,000',
    'Tesla Model B, boat, VIP helicopter'
),
(
    'Rio de Janeiro',
    'At sea',
    '-22.908333, -43.196388',
    '-22.911018, -43.193731',
    '4.5',
    'Rio de Janeiro',
    '$1,600,000,000',
    'Tesla Model B, boat, VIP helicopter'
),
(
    'Cape Town',
    'At sea',
    '-33.924868, 18.424055',
    '-33.927245, 18.421404',
    '4',
    'Cape Town',
    '$1,500,000,000',
    'Tesla Model B, boat, VIP helicopter'
),
(
    'Barcelona',
    'At sea',
    '41.385064, 2.173404',
    '41.382303, 2.170146',
    '3.8',
    'Barcelona',
    '$1,450,000,000',
    'Tesla Model B, boat, VIP helicopter'
),
(
    'Rome',
    'At sea',
    '41.902782, 12.496366',
    '41.900013, 12.493110',
    '4',
    'Rome',
    '$1,500,000,000',
    'Tesla Model B, boat, VIP helicopter'
);