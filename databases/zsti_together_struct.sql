create database if not exists zsti_together_database character set utf8 COLLATE utf8_general_ci;
use zsti_together_database;

create table if not exists classes (

    class__id int not null auto_increment primary key,
    class__name varchar(5) not null /*should look like this: 3b19 -> name of class 3b + year of beginning 2019*/

);

create table if not exists roles (

    role__id int not null auto_increment primary key,
    role__name varchar(50) not null

);

create table if not exists types (

    type__id int not null auto_increment primary key,
    type__name varchar(50) not null

);

create table if not exists tutors (

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

create table if not exists tutees (

    tutee__id int not null auto_increment primary key,
    tutee__firstName varchar(50) not null,
    tutee__lastName varchar(50) not null,
    tutee__email varchar(50) not null,
    tutee__password varchar(50) not null,
    tutee__class varchar(4) not null

);

create table if not exists subjects (

    subject__id int not null auto_increment primary key,
    subject__name varchar(50) not null

);

create table if not exists posts (

    post__id int not null auto_increment primary key,
    post__body varchar(255) not null,
    post__subject int,
    post__user int,
    post__type int,

    constraint fk_post__subject foreign key (post__subject) references subjects (subject__id) on update cascade on delete restrict,
    constraint fk_post__user foreign key (post__user) references tutors (tutor__id) on update restrict on delete cascade,
    constraint fk_post__type foreign key (post__type) references types (type__id) on update restrict on delete restrict

);

create table if not exists requests (

    request__id int not null auto_increment primary key,
    request__date datetime not null,
    request__post int,
    request__tutee int,
    
    constraint fk_request__post foreign key (request__post) references posts (post__id) on update restrict on delete restrict,
    constraint fk_request__tutee foreign key (request__tutee) references tutees (tutee__id) on update restrict on delete restrict

);