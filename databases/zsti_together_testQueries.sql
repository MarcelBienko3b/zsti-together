/*
use zsti_together_database;

select * from classes;
select * from roles;
select * from types;
select * from subjects;
select * from tutors;

select
roles.role__name as 'Rola',
concat(tutors.tutor__firstName, ' ', tutors.tutor__lastName) as 'Imie i nazwisko',
tutors.tutor__email as 'Email',
classes.class__name as 'Klasa'
from tutors
inner join roles on roles.role__id = tutors.tutor__role
inner join classes on classes.class__id = tutors.tutor__class;
*/

select
    posts.post__body,
    subjects.subject__name,
    students.student__firstName,
    students.student__lastName,
    teachers.teacher__firstName,
    teachers.teacher__lastName,
    types.type__name,
    posts.post__id
from posts
left join students on posts.post__tutor = students.student__id
inner join subjects on subjects.subject__id = posts.post__subject
left join teachers on teachers.teacher__id = posts.post__teacher
inner join types on types.type__id = posts.post__type;

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