# database for coinman
create database coinman_db;

	# table for coinmain
	create table watchlist(
		id int(11) auto_increment key,
		coin_type varchar(255) not null,
		old_rate varchar(255) not null,
		current_rate varchar(255) not null,
		status varchar(255) not null,
		date varchar(255) not null
	);