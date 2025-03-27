--5 
CREATE DATABASE `hw8`;
USE `hw8`;

CREATE TABLE `Notes` 
(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(80) NOT NULL,
    `description` text NOT NULL,
    primary key (`id`)
);

--6a
insert into `Notes` (`title`, `description`)
values ('Day 1 notes', 'Notes about html.');

insert into `Notes` (`title`, `description`)
values ('Day 2 notes', 'Notes about CSS.');

insert into `Notes` (`title`, `description`)
values ('Day 3 notes', 'Notes about JavaScript.');

insert into `Notes` (`title`, `description`)
values ('Day 4 notes', 'Notes about PHP.');

insert into `Notes` (`title`, `description`)
values ('Day 5 notes', 'Notes about SQL.');

insert into `Notes` (`title`, `description`)
values ('Day 6 notes', 'sfjsfjiabsjfaa.');

--6b
update Notes SET description = 'Notes about HTML.' where id = 1;

--6c
delete from Notes where id = 6;

--7a
select  * from Notes order by title desc;

--7b
select * from Notes order by id limit 1 offset 1;

--7c
select * from notes where description like '%a%'
    or description like '%e%'
    or description like '%i%'
    or description like '%o%'
    or description like '%u%'
    or description like '%y%'