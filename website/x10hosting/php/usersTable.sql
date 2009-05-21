  drop table if exists Users;

 create table Users (
	FirstName varchar(25) not null,
	LastName varchar(25) not null,
	Password varchar(32) not null,
	UserName varchar(25) not null unique,
	UserType Enum('User', 'Admin') not null,
 )