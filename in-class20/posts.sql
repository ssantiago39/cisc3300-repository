CREATE DATABASEinClass20;
USE inClass20;

CREATE TABLE `posts` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(20) NOT NULL,
    `description` TEXT NOT NULL,
    primary key (`id`)
);

insert into `posts` (`name`, `description`) 
values ('Hello', 'fjenjnfjns');
 