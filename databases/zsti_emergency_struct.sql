drop database if exists zsti_emergency_database;
create database zsti_emergency_database character set utf8 COLLATE utf8_general_ci;
use zsti_emergency_database;

create table zsti_classes (

    class__id int not null auto_increment primary key,
    class__name varchar(5) not null /*should look like this: 3b19 -> name of class 3b + year of beginning 2019*/

);

create table zsti_roles (

    role__id int not null auto_increment primary key,
    role__name varchar(50) not null

);

create table zsti_types (

    type__id int not null auto_increment primary key,
    type__name varchar(50) not null

);

create table zsti_users (

    user__id int not null auto_increment primary key,
    user__role int not null,
    user__firstName varchar(50) not null,
    user__lastName varchar(50) not null,
    user__email varchar(50) not null,
    user__password varchar(50) not null,
    user__class int not null,

    constraint fk_user__class foreign key (user__class) references zsti_classes (class__id) on update cascade on delete restrict

);

create table zsti_subjects (

    subject__id int not null auto_increment primary key,
    subject__name varchar(50) not null

);

create table zsti_posts (

    post__id int not null auto_increment primary key,
    post__body varchar(255) not null,
    post__subject int,
    post__user int,
    post__type int,
    post__date datetime not null,

    constraint fk_post__subject foreign key (post__subject) references zsti_subjects (subject__id) on update cascade on delete restrict,
    constraint fk_post__user foreign key (post__user) references zsti_users (user__id) on update restrict on delete cascade,
    constraint fk_post__type foreign key (post__type) references zsti_types (type__id) on update restrict on delete restrict

);