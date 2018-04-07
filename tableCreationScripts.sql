DROP TABLE IF EXISTS organizations;
create table organizations(
	name varchar(128),
    orgID int,
    locationCity varchar(128),
    locationState char(2),
    storeNumber int,
    PRIMARY KEY (orgID, storeNumber)
);
DROP TABLE IF EXISTS users;
create table users(
	name varchar(128) NOT NULL,
    userID varchar(128) PRIMARY KEY,
    pass varchar(512),
    ssn char(9) NOT NULL,
    birthday date,
    address varchar(128),
    phone varchar(20),
    email varchar(128)
);
DROP TABLE IF EXISTS managers;
CREATE TABLE managers(
	managerID varchar(128),
	orgID int NOT NULL,
	CreationDate date,
	pass varchar(512) NOT NULL,	#SHA-512
    PRIMARY KEY (managerID),
    FOREIGN KEY (orgID) REFERENCES organizations (orgID)
);
DROP TABLE IF EXISTS shifts;
CREATE TABLE shifts (
	managerID varchar(128) NOT NULL,
    startTime datetime,
    endTime datetime,
    active boolean,
    maxBid int,
    staffPosition varchar(128),
    FOREIGN KEY (managerID) REFERENCES managers (managerID)
);
DROP TABLE IF EXISTS employed;
CREATE TABLE employed(
	userID varchar(128),
    managerID varchar(128),
    active boolean NOT NULL,
    staffPosition varchar(128),
    PRIMARY KEY (userID, managerID),
    FOREIGN KEY (userID) REFERENCES users (userID),
    FOREIGN KEY (managerID) REFERENCES managers (managerID)
);
DROP TABLE IF EXISTS shiftsArchive;
CREATE TABLE shiftsArchive (
	managerID varchar(128) NOT NULL,
    calenderDate date,
    startTime datetime,
    endTime datetime,
    active boolean,
    maxBid int,
    positionOpen varchar(128)
);
DROP TABLE IF EXISTS managersArchive;
CREATE TABLE managersArchive(
	managerID varchar(128) NOT NULL,
	orgID int NOT NULL,
	CreationDate date,
	pass char(128) NOT NULL	#SHA-512
);
DROP TABLE IF EXISTS employedArchive;
CREATE TABLE employedArchive(
	userId varchar(128) NOT NULL,
    managerID varchar(128) NOT NULL,
    current boolean NOT NULL,
    staffPosition varchar(128)
);
DROP TABLE IF EXISTS usersArchive;
create table usersArchive(
	name varchar(128),
    userID varchar(128) NOT NULL,
    ssn char(9) NOT NULL,
    birthday date,
    address varchar(128),
    phone varchar(20)
);
DROP TABLE IF EXISTS organizationsArchive;
create table organizationsArchive(
	name varchar(128),
    orgID int NOT NULL,
    locationCity varchar(128),
    locationState char(2),
    storeNumber int NOT NULL
);

#///////////Data Insertion/////////////
INSERT INTO organizations VALUES 
('testOrganization',1,'Columbia','MO',1),
('testOrganization2',2,'Columbia','MO',2);
INSERT INTO users VALUES
('testUser',1,'pass','111223344','2000-01-01','SomeAddress','999-888-7777','test@user.com');
INSERT INTO managers VALUES
(1,1,NOW(),'pass');
INSERT INTO employed VALUES
(1,1,true,'any');
INSERT INTO shifts VALUES
('1','2018-04-02 11:30:00','2018-04-02 12:30:00',true,3,'cashier'),
('1','2018-04-02 13:30:00','2018-04-02 14:30:00',true,3,'cashier'),
('1','2018-04-04 11:30:00','2018-04-03 12:30:00',true,3,'cashier');
