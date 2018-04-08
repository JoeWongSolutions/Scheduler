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
    shiftID bigint PRIMARY KEY AUTO_INCREMENT,
	managerID varchar(128) NOT NULL,
    startTime datetime,
    endTime datetime,
    active boolean,
    maxBid int,
    bids int,
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
('testUser',1,'9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684','111223344','2000-01-01','SomeAddress','999-888-7777','test@user.com');
INSERT INTO managers VALUES
(1,1,NOW(),'9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');
INSERT INTO employed VALUES
(1,1,true,'any');
INSERT INTO shifts (managerID, startTime, endTime, active, maxBid, bids, staffPosition) VALUES
('1','2018-04-09 11:30:00','2018-04-09 12:30:00',true,3,0,'any'),
('1','2018-04-11 13:30:00','2018-04-11 14:30:00',true,3,0,'any'),
('1','2018-04-11 11:30:00','2018-04-11 12:30:00',true,3,0,'any');


#Test Queries
SELECT staffPosition, TIME(startTime) AS startTime, TIME(endTime) AS endTime, active, maxBid, bids FROM shifts WHERE managerID = 1 AND DATE(startTime) = '2018-04-09' AND (staffPosition = 'cashier' OR staffPosition = 'any') AND bids < maxBids ORDER BY startTime;
