use zsti_emergency_database;

select * from zsti_classes;
select * from zsti_roles;
select * from zsti_types;
select * from zsti_subjects;
select * from zsti_users;

select
zsti_roles.role__name as 'Rola',
concat(zsti_users.user__firstName, ' ', zsti_users.user__lastName) as 'Imie i nazwisko',
zsti_users.user__email as 'Email',
zsti_classes.class__name as 'Klasa'
from zsti_users
inner join zsti_roles on zsti_roles.role__id = zsti_users.user__role
inner join zsti_classes on zsti_classes.class__id = zsti_users.user__class;