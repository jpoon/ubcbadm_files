
drop table if exists Year09;

create table Year09 (
    RegisterNo int(6) not null auto_increment,
    Name varchar(30) not null,
    Email varchar(30) not null unique,
    Phone varchar(20) not null,
    Gender Enum('Male', 'Female'),
    MembershipNo int,
    Singles Enum('Null', 'Intermediate', 'Advanced'),
    Mixed Enum('Null', 'Intermediate', 'Advanced'),
    MixedPartner varchar(30),
    Doubles Enum('Null', 'Intermediate', 'Abvanced'),
    DoublePartner varchar(30),
    primary key (RegisterNo),
    unique id (RegisterNo)
);

alter table Year09 auto_increment = 100;

