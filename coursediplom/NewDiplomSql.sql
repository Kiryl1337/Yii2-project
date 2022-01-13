use CourseDiplom
go
Alter table [User]
    drop constraint FK_User_Group,
    constraint FK_User_Department
GO
Alter table Diplom
    drop constraint FK_Diplom_Group,
    constraint FK_Diplom_Teacher,
	constraint FK_Diplom_Student
GO
Alter table Coursework
    drop constraint FK_Coursework_Group,
    constraint FK_Coursework_Teacher,
	constraint FK_Coursework_Student
GO
Alter table Source
    drop constraint FK_Source_Section,
    constraint FK_Source_Teacher
GO
Alter table Coursework_Source
    drop constraint FK_CourseworkSource_Source,
    constraint FK_CourseworkSource_Coursework
GO
Alter table Diplom_Source
    drop constraint FK_DiplomSource_Source,
    constraint FK_DiplomSource_Diplom
GO
Alter table Department
    drop constraint FK_Department_Faculty
GO
DROP TABLE [User]
GO
DROP TABLE [Group]
GO
DROP TABLE Coursework
GO
DROP TABLE Diplom
GO
DROP TABLE Source
GO
DROP TABLE Coursework_Source
GO
DROP TABLE Diplom_Source
GO
DROP TABLE [Section]
GO
DROP TABLE Department
GO
DROP TABLE Faculty
GO
CREATE TABLE [User]
(
	id int identity primary key,
	FIO varchar(150) ,
	username varchar(255) not null,
	id_group int,
	id_department int ,
	is_teacher smallint default 0 not null,
	auth_key varchar(32) not null,
    password_hash varchar(255) not null,
    password_reset_token varchar(255),
	email varchar(255) not null,
	email_confirm_token varchar(255) ,
    [status] smallint not null,
    created_at int not null,
    updated_at int not null,
	[role] varchar(50) default 'student' not null
)


GO
CREATE TABLE [Group]
(
	id int identity primary key,
	name varchar(100) not null unique,
	full_name varchar(100),
	cipher varchar(100),
)

GO
CREATE TABLE Diplom
(
	id int identity primary key,
	title varchar(255) not null,
	text text ,
	id_student int,
	id_teacher int not null,
	id_group int
)
GO
CREATE TABLE Coursework
(
	id int identity primary key,
	title varchar(255) not null,
	text text ,
	id_student int,
	id_teacher int not null,
	id_group int
)
GO
CREATE TABLE Source
(
	id int identity primary key,
	id_section int,
	source_name varchar(100),
	id_teacher int not null,
)
GO
CREATE TABLE Coursework_Source
(
	id int identity primary key,
	id_coursework int,
	id_source int,
)
GO
CREATE TABLE Diplom_Source
(
	id int identity primary key,
	id_diplom int,
	id_source int,
)
GO
CREATE TABLE [Section]
(
	id int identity primary key,
	section_name varchar(200),
)
GO
CREATE TABLE Faculty
(
	id int identity primary key,
	faculty_name varchar(100),
)
GO
CREATE TABLE Department
(
	id int identity primary key,
	department_name varchar(100),
	id_faculty int not null,
)
GO
ALTER TABLE [User]
	add constraint FK_User_Group FOREIGN KEY(id_group) references [Group],
	constraint FK_User_Department FOREIGN KEY(id_department) references [Department]
GO
ALTER TABLE Diplom
	add constraint FK_Diplom_Group FOREIGN KEY(id_group) references [Group],
	constraint FK_Diplom_Teacher FOREIGN KEY(id_teacher) references [User],
	constraint FK_Diplom_Student FOREIGN KEY(id_student) references [User]
GO
ALTER TABLE Coursework
	add constraint FK_Coursework_Group FOREIGN KEY(id_group) references [Group],
	constraint FK_Coursework_Teacher FOREIGN KEY(id_teacher) references [User],
	constraint FK_Coursework_Student FOREIGN KEY(id_student) references [User]
GO
ALTER TABLE Source
	add constraint FK_Source_Section FOREIGN KEY(id_section) references [Section],
	constraint FK_Source_Teacher FOREIGN KEY(id_teacher) references [User]
GO
ALTER TABLE Coursework_Source
	add constraint FK_CourseworkSource_Source FOREIGN KEY(id_source) references Source,
	constraint FK_CourseworkSource_Coursework FOREIGN KEY(id_coursework) references Coursework
GO
ALTER TABLE Diplom_Source
	add constraint FK_DiplomSource_Source FOREIGN KEY(id_source) references Source,
	constraint FK_DiplomSource_Diplom FOREIGN KEY(id_diplom) references Diplom
GO
ALTER TABLE Department
	add constraint FK_Department_Faculty FOREIGN KEY(id_faculty) references Faculty
GO
Insert into [Group] (name, full_name, cipher) values('ПМ-41','Прикладная математика','1-40 01 01'),
													('ПОИТ-41','Программное обеспечение игформационных технологий','1-40 01 01'),
													('ИТП-41','Информатика и технологии программирования','1-40 01 01'),
													('ПМ-31','Прикладная математика','1-40 01 01'),
													('ПОИТ-31','Программное обеспечение игформационных технологий','1-40 01 01'),
													('ПОИТ-2','Программное обеспечение игформационных технологий','1-40 01 01'),
													('ИТП-31','Информатика и технологии программирования','1-40 01 01'),
													('ИТП-21','Информатика и технологии программирования','1-40 01 01')
GO
Insert into Faculty(faculty_name) values ('Математики и технологий программирования'),
										 ('Физический'),
										 ('Филологический')
GO
Insert into Department(department_name, id_faculty) values ('Математических проблем управления и информатики',1),
										   ('Вычислительных методов и программирования',1),
										   ('Автоматизированных систем обработки информации',2)

Insert into [User](FIO,username,id_group,id_department,is_teacher,auth_key,password_hash,password_reset_token,email,email_confirm_token,[status],created_at,updated_at,[role]) 
Values('Короткевич Владимир Аполлонович','vkorotkevitch',NULL,1,1,'bOGB4mehZzIEvCvT2nmuR41m6qH9XEt3','$2y$13$rcxmvcAGMkVhnEPcnnA34eTW88F0aEUucX.Xuewsh.xRCREfLXg7e',NULL,'kkorotkevitch@mail.ru',NULL,10,1575484335,1575484335,'teacher'),
	  ('Короткевич Людмила Ивановна','lkorotkevitch',NULL,1,1,'bOGB4mehZzIEvCvT2nmuR41m6qH9XEt3','$2y$13$rcxmvcAGMkVhnEPcnnA34eTW88F0aEUucX.Xuewsh.xRCREfLXg7e',NULL,'lkorotkevitch@mail.ru',NULL,10,1575484335,1575484335,'teacher'),
	  ('admin','admin',NULL,NULL,1,'qyYYRTU6j5SuXZwAnG6zOI8NcpYwzXGY','$2y$13$rcxmvcAGMkVhnEPcnnA34eTW88F0aEUucX.Xuewsh.xRCREfLXg7e',NULL,'admin@mail.ru',NULL,10,1575484344,1575484344,'admin'),
	  ('Курилин Кирилл Сергеевич','kkurilin',1,NULL,0,'q-DgYRDMk-rP_mjLQ9-VKLGL4K7r8DFJ','$2y$13$T7h3u5BUVBkb1JpNpvElfuX2sPFxraShTSf6ohOubLcPyrTIbmXJS',NULL,'kkurilin@mail.ru',NULL,10,1575484360,1575484360,'student'),
	  ('Писпанен Александра Валерьевна','apispanen',1,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'apispanen@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Финогенов Константин Валентинович','kfinogenov',1,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'kfinogenov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Князев Кирилл Витальевич','kknyazev',2,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'kknyazev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Моисеев Андрей Владимирович','amoiseev',3,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'amoiseev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Резниченко Алексанр Владимирович','areznichenko',3,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'areznichenkp@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Крицкая Татьяна Николаевна','tkrickaya',4,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'tkrickaya@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Коновалов Дмитрий Александрович','dkonovalov',4,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dkonovalov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Данилков Егор Викторович','edanilkov',4,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'edanilkov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Вегеро Денис Андреевич','dvegero',5,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dvegero@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Хитров Егор Иванович','exitrov',6,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'ehitrov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Котлобай Дмитрий Николаевич','dkotlobay',6,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dkotlobay@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Ковалёв Евгений Игоревич','ekovalev',6,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'ekovalev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Шиленок Дмитрий Михайлович','dshilenok',7,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'dsilenok@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Солонина Марина Сергеевна','msolonina',7,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'msolonina@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Зуборев Кирилл Вадимович','kzyborev',8,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'kzyborev@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Вечер Максим Владимирович','mvecher',8,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'mvecher@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Мамедов Байрамгельды ХАНГЕЛДЫЕВИЧ','bmamedov',8,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'bmamedov@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Садкевич Руслан Романович','rsadkevich',8,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'rsadkevich@mail.ru',NULL,10,1575484369,1575484369,'student'),
	  ('Макаров Степан Андреевич','smakarov',8,NULL,0,'g92VhU40x6f_AYBbe6SVuPyG-P7waQE7','$2y$13$N5oWddx1/QRuuKSonjnTsetuxLQxDF6jx3qj73VE3dmBwEbZDuWGG',NULL,'smakarov@mail.ru',NULL,10,1575484369,1575484369,'student')

GO
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


GO
Insert into Diplom(title,text,id_student,id_teacher,id_group) values('Речевой ввод текста программ на языке C++','Tema1Tema1Tema1Tema',4,1,1),
																		('Мобильгое приложение "Личные финансы"','Tema2Tema2Tema2Tema2',6,2,1),
																		('Автоматизация записи студентов на курсовые и дипломные работы','Tema3Tema3Tema3Tema3',7,1,2),
																		('Мобильное приложение "Программа-органайзер"','Tema4Tema4Tema4Tema4',NULL,1,2),
																		('Средства визуализации текущего конкурса для абитуриентов ГГУ','Tema5Tema5Tema5Tema5',8,1,3),
																		('Средства ввода и визуализации графиков присутствия преподавателей','Tema6Tema6Tema6Tema6',9,2,3)
GO
Insert into [Section](section_name) values ('Java'),
										   ('C++'),
										   ('SQL')
GO
Insert into Source(id_section, source_name, id_teacher) values(3,'Виейра Р. Программирование баз данных Microsoft SQL Server 2008. Базовый курс.', 1 ),
																(2,'Дунаев В.   Базы данных.  Язык SQL для студента.  – СПб.: БХВ-Петер-бург, 2012. – 428 с', 1 ),
																(3,'Фленов М. Transact-SQL – СПб.: БХВ-Петербург, 2006. – 576 с.', 1 ),
																(1,'Грабер М. Java – М.: Лори, 2015. – 680 с', 2 ),
																(3,'Кренке Д.  Теория и практика построения баз данных.  9-е изд. –  СПб.: Питер, 2005. – 864 с', 2 ),
																(3,'Ульман Д.  Реляционные базы данных – М.: Лори, 2014. – 384 с.', 1 )
GO
Insert into Coursework_Source(id_coursework, id_source) values  (1, 1),
																(1, 2),
																(2, 3),
																(3, 4),
																(3, 5),
																(4, 3)
GO
Insert into Diplom_Source(id_diplom, id_source) values  (1, 1),
														(1, 2),
														(2, 3),
														(3, 4),
														(3, 5),
														(4, 3)


								