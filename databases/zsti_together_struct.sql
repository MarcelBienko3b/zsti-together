drop database if exists zsti_together_database;
create database zsti_together_database character set utf8 COLLATE utf8_general_ci;
use zsti_together_database;

create table classes (

    class__id int not null auto_increment primary key,
    class__name varchar(5) not null /*should look like this: 3b19 -> name of class 3b + year of beginning 2019*/

);

create table roles (

    role__id int not null auto_increment primary key,
    role__name varchar(50) not null

);

create table types (

    type__id int not null auto_increment primary key,
    type__name varchar(50) not null

);

create table tutors (

    tutor__id int not null auto_increment primary key,
    tutor__firstName varchar(50) not null,
    tutor__lastName varchar(50) not null,
    tutor__email varchar(50) not null,
    tutor__password varchar(50) not null,
    tutor__class int not null,
    tutor__role int not null,

    constraint fk_tutor__class foreign key (tutor__class) references classes (class__id) on update cascade on delete restrict,
    constraint fk_tutor__role foreign key (tutor__role) references roles (role__id) on update cascade on delete restrict

);

create table tutees (

    tutee__id int not null auto_increment primary key,
    tutee__firstName varchar(50) not null,
    tutee__lastName varchar(50) not null,
    tutee__email varchar(50) not null,
    tutee__password varchar(50) not null,
    tutee__class int not null

);

create table subjects (

    subject__id int not null auto_increment primary key,
    subject__name varchar(50) not null

);

create table posts (

    post__id int not null auto_increment primary key,
    post__body varchar(255) not null,
    post__subject int,
    post__user int,
    post__type int,

    constraint fk_post__subject foreign key (post__subject) references subjects (subject__id) on update cascade on delete restrict,
    constraint fk_post__user foreign key (post__user) references tutors (tutor__id) on update restrict on delete cascade,
    constraint fk_post__type foreign key (post__type) references types (type__id) on update restrict on delete restrict

);

create table connections (

    connection__id int not null auto_increment primary key,
    connection__date datetime not null,
    connection__post int,
    connection__tutee int,
    
    constraint fk_connection__post foreign key (connection__post) references posts (post__id) on update restrict on delete restrict,
    constraint fk_connection__tutee foreign key (connection__tutee) references tutees (tutee__id) on update restrict on delete restrict

);