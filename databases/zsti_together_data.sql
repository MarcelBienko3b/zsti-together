use zsti_together_database;

insert into classes (class__name) values
    ('-'),
    ('1i21'),
    ('1b21'),
    ('1c21'),
    ('1d21'),
    ('1ei21'),
    ('1pr21'),
    ('2i20'),
    ('2b20'),
    ('2c20'),
    ('2d20'),
    ('2ei20'),
    ('2pr20'),
    ('3i19'),
    ('3b19'),
    ('3c19'),
    ('3d19'),
    ('3ei19'),
    ('3pr19'),
    ('4i18'),
    ('4b18'),
    ('4c18'),
    ('4d18'),
    ('4ei18'),
    ('4pr18');

insert into roles (role__name) values
    ('teacher'),
    ('student');

insert into types (type__name) values
    ('kolko dodatkowe'),
    ('pomoc kolezenska');

insert into subjects(subject__name) values
    ('matematyka'),
    ('polski'),
    ('informatyka'),
    ('sieci'),
    ('bazy danych'),
    ('serwery'),
    ('angielski'),
    ('fizyka'),
    ('biologia'),
    ('aplikacje internetowe - php'),
    ('aplikacje internetowe - js'),
    ('projektowanie stron internetowych');

insert into tutors (tutor__role, tutor__firstName, tutor__lastName, tutor__email, tutor__password, tutor__class) values
    (2, 'Marcel', 'Bienko', 'byenio@gmail.com', '123123', 14),
    (2, 'Marcel', 'Lis', 'lis@gmail.com', '321321', 14);


