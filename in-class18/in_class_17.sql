CREATE DATABASE `in_class_17`;
USE `in_class_17`;

CREATE TABLE `users` (
    `user_id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`user_id`)
);

CREATE TABLE `userComments` (
    `user_id` INT(11) NOT NULL,
    `comment` TEXT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
);

INSERT INTO `users` (`name`, `email`)
VALUES ('Sean', 'sean@example.com');

INSERT INTO `users` (`name`, `email`)
VALUES ('Bullet', 'bullet@example.com');

INSERT INTO `users` (`name`, `email`)
VALUES ('Billy', 'billy@example.com');

INSERT INTO `userComments` (`user_id`, `comment`)
VALUES (1, 'Sean’s first comment');

INSERT INTO `userComments` (`user_id`, `comment`)
VALUES (1, 'Sean’s second comment');

INSERT INTO `userComments` (`user_id`, `comment`)
VALUES (2, 'Bullet’s only comment');

--a
SELECT
    users.*,
    userComments.comment AS comment
FROM
    users
        LEFT JOIN
    userComments ON users.user_id = userComments.user_id;

--b
SELECT
    users.*,
    userComments.comment AS comment
FROM
    users
        INNER JOIN
    userComments ON users.user_id = userComments.user_id;
  