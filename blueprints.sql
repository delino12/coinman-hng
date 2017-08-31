create table watchdog(
    id int(11) auto_increment key,
    type varchar(255) not null,
    rate varchar(255) not null,
    status varchar(255) not null,
    date varchar(255) not null,
    time varchar(255) not null,
    expire varchar(255) not null
);