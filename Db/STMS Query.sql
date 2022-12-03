create table tbl_User(
	UserID int(11) auto_increment primary key,
	FName varchar(50) not null,
	LName varchar(100),
	Gender varchar(100),
	Address varchar(100),
	Email varchar(100),
	Phone varchar(50) not null,
	UserName varchar(50) not null,
	Password varchar(100) not null,
	Privilage varchar(50) not null,
	Status varchar(30) not null);

create table tbl_School(
	SchlID int(11) auto_increment primary key,
	SchlCode varchar(50) unique,
	SchlName varchar(100) not null,
	Region varchar(50) not null,
	District varchar(50) not null,
	CtgName varchar(20) not null,
	CtgState varchar(20),
	SchlUserID int(11),
	UserID int(11) not null,
	constraint fk2 foreign key(UserID) references tbl_User(UserID) on delete cascade on update cascade);

create table tbl_Subject(
	SubjectID int(11) auto_increment primary key,
	SubjectName varchar(50) not null);

create table tbl_Teacher(
	TchID int(11) auto_increment primary key,
	EmpNo varchar(50) unique not null,
	FName varchar(50) not null,
	LName varchar(100),
	Gender varchar(7),
	Address varchar(50),
	Dob date,
	Image varchar(100),
	Phone varchar(50) not null,
	Email varchar(100));

create table tbl_Tch_Education(
	EduID int(11) auto_increment primary key,
	EduLevel varchar(20) not null,
	EduTitle varchar(100) not null,
	EduYear int(7),
	Certificate varchar(100),
	EduCategory varchar(15),
	TchID int(11) not null,
	constraint fk3 foreign key(TchID) references tbl_Teacher(TchID) on delete cascade on update cascade);

create table tbl_Sch_Tch(
	SchTchID int(11) auto_increment primary key,
	TchID int(11) not null,
	SchlID int(11) not null,
	ReportDate date,
	Status varchar(20),
	Coment varchar(100),
	SubjectID int(11) not null,
	constraint fk9 foreign key(SubjectID) references tbl_Subject(SubjectID) on delete cascade on update cascade,
	constraint fk4 foreign key(TchID) references tbl_Teacher(TchID) on delete cascade on update cascade,
	constraint fk5 foreign key(SchlID) references tbl_School(SchlID) on delete cascade on update cascade);

create table tbl_Sch_Year(
	SchYrID int(11) auto_increment primary key,
	SchYear int(7) not null,
	Coment varchar(100),
	SchlID int(11) not null,
	constraint fk6 foreign key(SchlID) references tbl_School(SchlID) on delete cascade on update cascade);

create table tbl_Class(
	ClassID int(11) auto_increment primary key,
	ClassName varchar(10) not null);

create table tbl_YearClass(
	YryClassID int(11) auto_increment primary key,
	TotalStudent int(7) not null,
	SchYrID int(11) not null,
	ClassID int(11) not null,
	constraint fk7 foreign key(SchYrID) references tbl_Sch_Year(SchYrID) on delete cascade on update cascade,
	constraint fk8 foreign key(ClassID) references tbl_Class(ClassID) on delete cascade on update cascade);

/*First User*/
INSERT INTO tbl_User VALUES('','Khamis','Mohd','Male','Mwera','khasamoh.12@gmail.com','0773274743','Admin',MD5('123'),'Administrator','Active');
INSERT INTO tbl_User VALUES('','Haroun','Manzi','Male','Mwera','Haroun.10@gmail.com','0773274743','sadmin',MD5('123'),'School','Active');
INSERT INTO tbl_Class VALUES('','FI'),
							('','FII'),
							('','FIII'),
							('','FIV'),
							('','STD I'),
							('','STD II'),
							('','STD III'),
							('','STD IV'),
							('','STD V'),
							('','STD VI');

INSERT INTO tbl_Subject VALUES('','None','None')