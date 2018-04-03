DROP TABLE IF EXISTS shifts;
CREATE TABLE shifts (
	managerID int PRIMARY KEY,
    startTime datetime,
    endTime datetime,
    active boolean,
    maxBid int,
    positionOpen varchar(140)
);
DROP TABLE IF EXISTS organizations;
create table organizations(
	name varchar(140),
    orgID int,
    locationCity varchar(140),
    locationState char(2),
    storeNumber int,
    PRIMARY KEY (orgID, storeNumber)
);
DROP TABLE IF EXISTS users;
create table users(
	name varchar(140) NOT NULL,
    userID int PRIMARY KEY,
    ssn char(9) NOT NULL,
    birthday date,
    address varchar(140),
    phone varchar(20)
);
DROP TABLE IF EXISTS managers;
CREATE TABLE managers(
	managerID int,
	orgID int NOT NULL,
	CreationDate date,
    userName varchar(128) NOT NULL,
	pass char(128) NOT NULL,	#SHA-512
    PRIMARY KEY (managerID),
    FOREIGN KEY (orgID) REFERENCES organizations (orgID)
);
DROP TABLE IF EXISTS employed;
CREATE TABLE employed(
	userID int,
    managerID int,
    active boolean NOT NULL,
    staffPosition varchar(140),
    PRIMARY KEY (userID, managerID),
    FOREIGN KEY (userID) REFERENCES users (userID),
    FOREIGN KEY (managerID) REFERENCES managers (managerID)
);
DROP TABLE IF EXISTS shiftsArchive;
CREATE TABLE shiftsArchive (
	managerID int NOT NULL,
    calenderDate date,
    startTime datetime,
    endTime datetime,
    active boolean,
    maxBid int,
    positionOpen varchar(140)
);
DROP TABLE IF EXISTS managersArchive;
CREATE TABLE managersArchive(
	managerID int NOT NULL,
	orgID int NOT NULL,
	CreationDate date,
	pass char(128) NOT NULL	#SHA-512
);
DROP TABLE IF EXISTS employedArchive;
CREATE TABLE employedArchive(
	userId int NOT NULL,
    managerID int NOT NULL,
    current boolean NOT NULL,
    staffPosition varchar(140)
);
DROP TABLE IF EXISTS usersArchive;
create table usersArchive(
	name varchar(140),
    userID int NOT NULL,
    ssn char(9) NOT NULL,
    birthday date,
    address varchar(140),
    phone varchar(20)
);
DROP TABLE IF EXISTS organizationsArchive;
create table organizationsArchive(
	name varchar(140),
    orgID int NOT NULL,
    locationCity varchar(140),
    locationState char(2),
    storeNumber int NOT NULL
);

#///////////Data Insertion/////////////
INSERT INTO organizations VALUES 
('testOrganization',1,'Columbia','MO',1),
('testOrganization2',2,'Columbia','MO',2);
INSERT INTO users VALUES
('testUser',1,'111223344','2000-01-01','SomeAddress','999-888-7777');
INSERT INTO shifts VALUES
('1','2018-03-28 11:30:00','2018-03-28 12:30:00',true,3,'any');
INSERT INTO managers VALUES
(1,1,NOW(),'pass');
INSERT INTO employed VALUES
(1,1,true,'any');
