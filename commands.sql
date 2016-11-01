CREATE table donor_info(
	donor_id varchar(7) NOT NULL,
	name varchar(20) NOT NULL,
	reg_no varchar(10) NOT NULL,
	phone_no bigint(10),
	gender varchar(10) NOT NULL,
	blood_group varchar(10) NOT NULL,
	PRIMARY KEY(donor_id)
);