use zsti_emergency_database;

insert into zsti_classes (class__name) values
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

insert into zsti_roles (role__name) values
    ('administrator'),
    ('moderator'),
    ('teacher'),
    ('student');

insert into zsti_types (type__name) values
    ('kolko dodatkowe'),
    ('pomoc kolezenska');

insert into zsti_subjects(subject__name) values
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

insert into zsti_users (user__role, user__firstName, user__lastName, user__email, user__password, user__class) values
    (4, 'Marcel', 'Bienko', 'byenio@gmail.com', '123123', 14),
    (4, 'Marcel', 'Lis', 'lis@gmail.com', '321321', 14),
    (1, 'Admin', 'Bienko', 'admin@gmail.com', '123321', 1);
