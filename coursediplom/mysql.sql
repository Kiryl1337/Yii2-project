DROP TABLE `User`
;
DROP TABLE `Group`
;
DROP TABLE Coursework
;
DROP TABLE Diplom
;
DROP TABLE Source
;
DROP TABLE Coursework_Source
;
DROP TABLE Diplom_Source
;
DROP TABLE `Section`
;
CREATE TABLE `User`
(
	id int not null primary key AUTO_INCREMENT,
	FIO varchar(150) ,
	username varchar(255) not null,
	id_group int,
	is_teacher smallint default 0 not null,
	auth_key varchar(32) not null,
    password_hash varchar(255) not null,
    password_reset_token varchar(255),
	email varchar(255) not null,
	email_confirm_token varchar(255) ,
    `status` smallint not null,
    created_at int not null,
    updated_at int not null,
	`role` varchar(50) default 'student' not null
)
;
CREATE TABLE `Group`
(
	id int not null primary key AUTO_INCREMENT,
	name varchar(100) not null unique
)

;
CREATE TABLE Diplom
(
	id int not null primary key AUTO_INCREMENT,
	title varchar(255) not null,
	text text ,
	id_student int,
	id_teacher int not null,
	id_group int
)
;
CREATE TABLE Coursework
(
	id int not null primary key AUTO_INCREMENT,
	title varchar(255) not null,
	text text ,
	id_student int,
	id_teacher int not null,
	id_group int
)
;
CREATE TABLE Source
(
	id int not null primary key AUTO_INCREMENT,
	id_section int,
	source_name varchar(100),
	id_teacher int not null
)
;
CREATE TABLE Coursework_Source
(
	id int not null primary key AUTO_INCREMENT,
	id_coursework int,
	id_source int
)
;
CREATE TABLE Diplom_Source
(
	id int not null primary key AUTO_INCREMENT,
	id_diplom int,
	id_source int
)
;
CREATE TABLE `Section`
(
	id int not null primary key AUTO_INCREMENT,
	section_name varchar(100)
)
;
Insert into `User`(FIO,username,id_group,is_teacher,auth_key,password_hash,password_reset_token,email,email_confirm_token,`status`,created_at,updated_at,`role`) 
Values('Короткевич Владимир Аполлонович','vkorotkevitch',NULL,1,'bOGB4mehZzIEvCvT2nmuR41m6qH9XEt3','$2y$13$rcxmvcAGMkVhnEPcnnA34eTW88F0aEUucX.Xuewsh.xRCREfLXg7e',NULL,'kkorotkevitch@mail.ru',NULL,10,1575484335,1575484335,'teacher'),
	  ('Короткевич Людмила Ивановна','lkorotkevitch',NULL,1,'bOGB4mehZzIEvCvT2nmuR41m6qH9XEt3','$2y$13$rcxmvcAGMkVhnEPcnnA34eTW88F0aEUucX.Xuewsh.xRCREfLXg7e',NULL,'lkorotkevitch@mail.ru',NULL,10,1575484335,1575484335,'teacher'),
	  ('admin','admin',NULL,1,'qyYYRTU6j5SuXZwAnG6zOI8NcpYwzXGY','$2y$13$rcxmvcAGMkVhnEPcnnA34eTW88F0aEUucX.Xuewsh.xRCREfLXg7e',NULL,'admin@mail.ru',NULL,10,1575484344,1575484344,'admin'),
	  ('Курилин Кирилл Сергеевич','kkurilin',1,0,'q-DgYRDMk-rP_mjLQ9-VKLGL4K7r8DFJ','$2y$13$T7h3u5BUVBkb1JpNpvElfuX2sPFxraShTSf6ohOubLcPyrTIbmXJS',NULL,'kkurilin@mail.ru',NULL,10,1575484360,1575484360,'student'),
	  ('Писпанен Александра Валерьевна','apispanen',1,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'apispanen@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Финогенов Константин Валентинович','kfinogenov',1,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'kfinogenov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Князев Кирилл Витальевич','kknyazev',2,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'kknyazev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Моисеев Андрей Владимирович','amoiseev',3,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'amoiseev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Резниченко Алексанр Владимирович','areznichenko',3,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'areznichenkp@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Крицкая Татьяна Николаевна','tkrickaya',4,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'tkrickaya@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Коновалов Дмитрий Александрович','dkonovalov',4,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dkonovalov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Данилков Егор Викторович','edanilkov',4,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'edanilkov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Вегеро Денис Андреевич','dvegero',5,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dvegero@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Хитров Егор Иванович','exitrov',6,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'ehitrov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Котлобай Дмитрий Николаевич','dkotlobay',6,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dkotlobay@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Ковалёв Евгений Игоревич','ekovalev',6,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'ekovalev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Шиленок Дмитрий Михайлович','dshilenok',7,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dsilenok@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Солонина Марина Сергеевна','msolonina',7,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'msolonina@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Зуборев Кирилл Вадимович','kzyborev',8,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'kzyborev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Вечер Максим Владимирович','mvecher',8,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'mvecher@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Мамедов Байрамгельды ХАНГЕЛДЫЕВИЧ','bmamedov',8,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'bmamedov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Садкевич Руслан Романович','rsadkevich',8,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'rsadkevich@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Макаров Степан Андреевич','smakarov',8,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'smakarov@mail.ru',NULL,10,1575484369,1575484369,'student')

;
Insert into `Group` (name) values('ПМ-41'),('ПОИТ-41'),('ИТП-41'),('ПМ-31'),('ПОИТ-31'),('ПОИТ-2'),('ИТП-31'),('ИТП-21')
;
Insert into Coursework(title,text,id_student,id_teacher,id_group) values('Использование нейросетей для речевого ввода текстов','Tema1Tema1Tema1Tema1',4,1,1),
																			('Разработка мобильного приложения "Личные финансы"','Tema2Tema2Tema2Tema2',6,2,1),
																			('Разработка средств обмена сообщениями между сотрудниками приемной комиссии ГГУ','Tema3Tema3Tema3Tema3',10,1,4),
																			('Разработка средств автоматизации взаимодействия технических сотрудников приемной комиссии ГГУ','Tema4Tema4Tema4Tema4',10,1,4),
																			('Визуализация текущего конкурса в ГГУ по имеющимся сертификатам','Tema5Tema5Tema5Tema5',11,1,4),
																			('Разработка средств автоматизации создания графиков консультация для студентов и магистрантов','Tema6Tema6Tema6Tema6',12,2,4),
																			('Визуализация статистики поступлений в ГГУ по учебным зав','Tema7Tema7Tema7Tema7',13,2,5),
																			('Подготовка документов в личном кабинете абитуриента ГГУ','Tema8Tema8Tema8Tema8',14,1,6),
																			('Создание базы данных для предварительной записи абитуриентов на подачу документов','Tema9Tema9Tema9Tema9',15,1,6),
																			('Предварительная запись абитуриентов для подачи документов в приёмную комиссию вуза','Tema10Tema10Tema10Tema10',15,1,6),
																			('Разработка средств сбора информации по прогнозам погоды','Tema11Tema11Tema11Tema11',16,2,6),
																			('Средства обработки фотографий для изготовления студенческих билетов','Tema12Tema12Tema12Tema12',17,1,7),
																			('Визуализация графика внутривузовских испытаний для абитуриентов ГГУ','Tema13Tema13Tema13Tema13',18,1,7),
																			('Контроль за созданием файлов браузерами в среде Windows','Tema14Tema14Tema14Tema14',23,2,8)


;
Insert into Diplom(title,text,id_student,id_teacher,id_group) values('Речевой ввод текста программ на языке C++','Tema1Tema1Tema1Tema',4,1,1),
																		('Мобильгое приложение "Личные финансы"','Tema2Tema2Tema2Tema2',6,2,1),
																		('Автоматизация записи студентов на курсовые и дипломные работы','Tema3Tema3Tema3Tema3',7,1,2),
																		('Мобильное приложение "Программа-органайзер"','Tema4Tema4Tema4Tema4',NULL,1,2),
																		('Средства визуализации текущего конкурса для абитуриентов ГГУ','Tema5Tema5Tema5Tema5',8,1,3),
																		('Средства ввода и визуализации графиков присутствия преподавателей','Tema6Tema6Tema6Tema6',9,2,3)
;
Insert into Source(id_section, source_name, id_teacher) values(1,'Источник 1', 1 ),
																(2,'Источник 2', 1 ),
																(3,'Источник 3', 1 ),
																(2,'Источник 4', 2 ),
																(1,'Источник 5', 2 )
;
Insert into Coursework_Source(id_coursework, id_source) values  (1, 1),
																(2, 2)
;
Insert into Diplom_Source(id_diplom, id_source) values  (1, 1),
														(2, 2)
;
Insert into `Section`(section_name) values ('Java'),
										   ('C++'),
										   ('SQL')
								
