drop database if exists zsti_together_database;
create database if not exists zsti_together_database character set utf8mb4 COLLATE utf8mb4_unicode_ci;
use zsti_together_database;

create table if not exists subjects (

    subject__id int not null auto_increment primary key,
    subject__name varchar(50) not null

);

create table if not exists teachers (

    teacher__id int not null auto_increment primary key,
    teacher__firstName varchar(50) not null,
    teacher__lastName varchar(50) not null,
    teacher__email varchar(50) not null,
    teacher__password varchar(50) not null,
    teacher__subject int not null,

    constraint fk_teacher__subject foreign key (teacher__subject) references subjects (subject__id) on update cascade on delete restrict

);

create table if not exists classes (

    class__id int not null auto_increment primary key,
    class__name varchar(5) not null, /* 3b19 -> name of class 3b + year of beginning 2019 */
    class__teacher int not null,

    constraint fk_class__teacher foreign key (class__teacher) references teachers (teacher__id) on update cascade on delete cascade 

);

create table if not exists students (

    student__id int not null auto_increment primary key,
    student__firstName varchar(50) not null,
    student__lastName varchar(50) not null,
    student__email varchar(50) not null,
    student__password varchar(50) not null,
    student__class int not null,
    student__isTutor bool not null default false,

    constraint fk_student__class foreign key (student__class) references classes (class__id) on update cascade on delete restrict

);

create table if not exists types (

    type__id int not null auto_increment primary key,
    type__name varchar(50) not null

);

create table if not exists posts (

    post__id int not null auto_increment primary key,
    post__body varchar(255) not null,
    post__subject int,
    post__tutor int,
    post__teacher int,
    post__type int,

    constraint fk_post__subject foreign key (post__subject) references subjects (subject__id) on update cascade on delete restrict,
    constraint fk_post__tutor foreign key (post__tutor) references students (student__id) on update restrict on delete cascade,
    constraint fk_post__teacher foreign key (post__teacher) references teachers (teacher__id) on update restrict on delete cascade,
    constraint fk_post__type foreign key (post__type) references types (type__id) on update restrict on delete restrict

);

create table if not exists requests (

    request__id int not null auto_increment primary key,
    request__post int,
    request__student int,
    
    constraint fk_request__post foreign key (request__post) references posts (post__id) on update restrict on delete restrict,
    constraint fk_request__student foreign key (request__student) references students (student__id) on update restrict on delete restrict

);

CREATE PROCEDURE getPostsForTeacher
(IN curr_Id int)
select 
    posts.post__body,
    subjects.subject__name,
    teachers.teacher__firstName,
    teachers.teacher__lastName,
    types.type__name
        from posts 
        inner join subjects on subjects.subject__id = posts.post__subject
        left join teachers on teachers.teacher__id = posts.post__teacher
        inner join types on types.type__id = posts.post__type
        where posts.post__teacher=curr_Id;

CREATE PROCEDURE getPostsForStudent
(IN curr_Id int)
select 
    posts.post__body,
    subjects.subject__name,
    students.student__firstName,
    students.student__lastName,
    types.type__name,
    classes.class__name
        from posts 
        inner join subjects on subjects.subject__id = posts.post__subject
        left join students on students.student__id = posts.post__tutor
        inner join types on types.type__id = posts.post__type
        left join classes on classes.class__id = students.student__class
        where posts.post__tutor=curr_Id;


CREATE PROCEDURE notUserPosts
(IN curr_Id int)
select distinct
    posts.post__body,
    subjects.subject__name,
    students.student__firstName,
    students.student__lastName,
    teachers.teacher__firstName,
    teachers.teacher__lastName,
    types.type__name,
    classes.class__name,
    posts.post__id
from posts
left join students on posts.post__tutor = students.student__id
inner join subjects on subjects.subject__id = posts.post__subject
left join teachers on teachers.teacher__id = posts.post__teacher
inner join types on types.type__id = posts.post__type
left join classes on classes.class__id = students.student__class
    
except

select distinct
    posts.post__body,
    subjects.subject__name,
    students.student__firstName,
    students.student__lastName,
    teachers.teacher__firstName,
    teachers.teacher__lastName,
    types.type__name,
    classes.class__name,
    posts.post__id
from requests
inner join posts on requests.request__post = posts.post__id
left join students on posts.post__tutor = students.student__id
inner join subjects on subjects.subject__id = posts.post__subject
left join teachers on teachers.teacher__id = posts.post__teacher
inner join types on types.type__id = posts.post__type
left join classes on classes.class__id = students.student__class
where requests.request__student=curr_Id;

CREATE PROCEDURE userPosts
(IN curr_Id int)
select distinct
    posts.post__body,
    subjects.subject__name,
    students.student__firstName,
    students.student__lastName,
    teachers.teacher__firstName,
    teachers.teacher__lastName,
    types.type__name,
    classes.class__name,
    posts.post__id
from requests
inner join posts on requests.request__post = posts.post__id
left join students on posts.post__tutor = students.student__id
inner join subjects on subjects.subject__id = posts.post__subject
left join teachers on teachers.teacher__id = posts.post__teacher
inner join types on types.type__id = posts.post__type
left join classes on classes.class__id = students.student__class
where requests.request__student=curr_Id;

