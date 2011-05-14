CREATE TABLE gbook (
  id int(10) DEFAULT '0' NOT NULL auto_increment,
  sub_id int(10) DEFAULT '0' NOT NULL,
  image varchar(50),
  name varchar(50) NOT NULL,
  comefrom varchar(50),
  email varchar(50),
  homepage varchar(100),
  icq varchar(15),
  oicq varchar(15),
  add_time datetime,
  comment text NOT NULL,
  password varchar(10),
  PRIMARY KEY (id)
);
