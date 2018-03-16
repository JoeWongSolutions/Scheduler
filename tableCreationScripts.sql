CREATE TABLE shifts (
	managerID int NOT NULL,
    calenderDate date,
    startTime datetime,
    endTime datetime,
    active boolean,
    maxBid int,
    positionOpen varchar(140)
);
CREATE TABLE managers(
	managerID int NOT NULL,
	orgID int NOT NULL,
	CreationDate date,
	pass char(128) NOT NULL	#SHA-512
);
CREATE TABLE employed(
	userId int NOT NULL,
    managerID int NOT NULL,
    current boolean NOT NULL,
    staffPosition varchar(140)
);
create table users(
	name varchar(140),
    userID int NOT NULL,
    #ssn char(128) NOT NULL, commented out for further examination
    birthday date,
    address varchar(140),
    phone varchar(20)
);
create table organizations(
	name varchar(140),
    orgID int NOT NULL,
    locationCity varchar(140),
    locationState char(2),
    storeNumber int NOT NULL
);
CREATE TABLE shiftsArchive (
	managerID int NOT NULL,
    calenderDate date,
    startTime datetime,
    endTime datetime,
    active boolean,
    maxBid int,
    positionOpen varchar(140)
);
CREATE TABLE managersArchive(
	managerID int NOT NULL,
	orgID int NOT NULL,
	CreationDate date,
	pass char(128) NOT NULL	#SHA-512
);
CREATE TABLE employedArchive(
	userId int NOT NULL,
    managerID int NOT NULL,
    current boolean NOT NULL,
    staffPosition varchar(140)
);
create table usersArchive(
	name varchar(140),
    userID int NOT NULL,
    #ssn char(128) NOT NULL, commented out for further examination
    birthday date,
    address varchar(140),
    phone varchar(20)
);
create table organizationsArchive(
	name varchar(140),
    orgID int NOT NULL,
    locationCity varchar(140),
    locationState char(2),
    storeNumber int NOT NULL
);