drop database if exists zsti_emergency_database;
create database zsti_emergency_database character set utf8 COLLATE utf8_general_ci;
use zsti_emergency_database;

create table zsti_classes (

    class__id int not null auto_increment primary key,
    class__name varchar(4) not null /*class__name should look like this: 3b19 -> name of class 3b + year of beginning 2019*/

);

create table zsti_students (

    student__id int not null auto_increment primary key,
    student__firstName varchar(50) not null,
    student__lastName varchar(50) not null,
    student__email varchar(50) not null,
    student__password varchar(50) not null,
    student__class int,
    constraint fk_student__class foreign key (student__class) references zsti_classes (class__id) on update cascade on delete restrict

);

create table zsti_teachers (

    teacher__id int not null auto_increment primary key,
    teacher__firstName varchar(50) not null,
    teacher__lastName varchar(50) not null,
    teacher__email varchar(50) not null,
    teacher__password varchar(50) not null,
    teacher__class int,
    constraint fk_teacher__class foreign key (teacher__class) references zsti_classes (class__id) on update cascade on delete restrict

);


select * from zsti_classes;
select * from zsti_students;
select * from zsti_teachers;