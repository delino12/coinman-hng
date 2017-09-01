# trade history table for all pairs
create table watchdog(
    id int(11) auto_increment key,
    type varchar(255) not null,
    rate varchar(255) not null,
    status varchar(255) not null,
    date varchar(255) not null,
    time varchar(255) not null,
    expire varchar(255) not null
);

create table compare(
	id int(11) auto_increment key,
    pair varchar(255) not null,
    buy_value int(255) not null,
    sell_value int(255) not null, 
    time varchar(255) not null
);

# return order book API data
create table orderbook(
	id int(11) auto_increment key,
    pair varchar(255) not null,
    ask varchar(255) not null,
    frozen varchar(255) not null,
    date varchar(255) not null,
    time varchar(255) not null,
    expire varchar(255) not null
);