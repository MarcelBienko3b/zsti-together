use zsti_togethery_database;

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