use zsti_together_database;

insert into subjects (subject__name) values
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

insert into teachers (teacher__firstName, teacher__lastName, teacher__email, teacher__password, teacher__subject) values
    ('Jan', 'Kowalski', 'jk@gmail.com', '202cb962ac59075b964b07152d234b70', 4);

insert into classes (class__name, class__teacher) values
    ('-', 1),
    ('1i', 1),
    ('1b', 1),
    ('1c', 1),
    ('1d', 1),
    ('1ei', 1),
    ('1pr', 1),
    ('2i', 1),
    ('2b', 1),
    ('2c', 1),
    ('2d', 1),
    ('2ei', 1),
    ('2pr', 1),
    ('3i', 1),
    ('3b', 1),
    ('3c', 1),
    ('3d', 1),
    ('3ei', 1),
    ('3pr', 1),
    ('4i', 1),
    ('4b', 1),
    ('4c', 1),
    ('4d', 1),
    ('4ei', 1),
    ('4pr', 1);

insert into types (type__name) values
    ('Kółko dodatkowe'),
    ('Pomoc koleżeńska'),
    ('Kółko wyrównawcze');

insert into students (student__firstName, student__lastName, student__email, student__password, student__class, student__isTutor) values 
    ('Jurek', 'Ciurek', 'jo@gmail.com', '202cb962ac59075b964b07152d234b70', 17, 0),
    ('John', 'Kowalski', 'jok@gmail.com', '202cb962ac59075b964b07152d234b70', 17, 1);
