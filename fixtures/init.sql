DROP
    DATABASE IF EXISTS testtask;
CREATE
    DATABASE testtask CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE
    testtask;

CREATE TABLE cities (
    id   INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
)
    ENGINE = InnoDB;

CREATE TABLE users (
    id      INT PRIMARY KEY AUTO_INCREMENT,
    name    VARCHAR(255) NOT NULL,
    gender  VARCHAR(1)   NOT NULL,
    phone   VARCHAR(255) NOT NULL,
    email   VARCHAR(255) NOT NULL,
    created DATETIME     NOT NULL
)
    ENGINE = InnoDB;

CREATE TABLE orders (
    id       INT PRIMARY KEY AUTO_INCREMENT,
    subtotal DECIMAL(14, 2) NOT NULL,
    created  DATETIME       NOT NULL,
    city_id  INT            NOT NULL,
    user_id  INT            NOT NULL,
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)
    ENGINE = InnoDB;

CREATE TABLE catalogs (
    id   INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
)
    ENGINE = InnoDB;

CREATE TABLE questions (
    id         INT PRIMARY KEY AUTO_INCREMENT,
    question   TEXT NOT NULL,
    catalog_id INT  NOT NULL,
    user_id    INT  NOT NULL,
    FOREIGN KEY (catalog_id) REFERENCES catalogs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)
    ENGINE = InnoDB;

INSERT INTO cities (id, name)
VALUES (1, 'moscow'),
    (2, 'spb');

INSERT INTO catalogs (id, name)
VALUES (1, 'section1'),
    (2, 'section2');

INSERT INTO users (id, name, gender, phone, email, created)
VALUES (1, 'User 1', 'm', '89830000101', 'user1@example.com', now()),
    (2, 'User 2', 'f', '89830000202', 'user2@example.com', now());

INSERT INTO orders (id, subtotal, created, city_id, user_id)
VALUES (1, 100.10, '2023-01-15 10:00:00', 1, 1),
    (2, 200.20, '2023-01-01 10:00:00', 1, 1),
    (3, 300.30, '2023-01-21 10:00:00', 1, 1),
    (4, 102.20, '2021-01-15 10:00:00', 2, 2),
    (5, 202.20, '2021-10-15 10:00:00', 2, 2);

INSERT INTO questions (id, question, catalog_id, user_id)
VALUES (1, 'question 1', 1, 1),
    (2, 'question 2', 1, 1),
    (3, 'question 3', 2, 1);

