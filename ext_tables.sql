#
# Table structure for table 'tx_stafflist_domain_model_persons'
#
CREATE TABLE tx_stafflist_domain_model_persons (

	lastname varchar(255) DEFAULT '' NOT NULL,
	firstname varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	salutation int(11) DEFAULT '0' NOT NULL,
	avatar int(11) unsigned NOT NULL default '0',
	function varchar(255) DEFAULT '' NOT NULL,
	tasks text,
	incompany int(11) DEFAULT '0' NOT NULL,
	building varchar(255) DEFAULT '' NOT NULL,
	room varchar(255) DEFAULT '' NOT NULL,
	phone varchar(255) DEFAULT '' NOT NULL,
	mobile varchar(255) DEFAULT '' NOT NULL,
	fax varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	officehours text,
	bio text,
	twitter varchar(255) DEFAULT '' NOT NULL,
	facebook varchar(255) DEFAULT '' NOT NULL,
	instagram varchar(255) DEFAULT '' NOT NULL,
	xing varchar(255) DEFAULT '' NOT NULL,
	github varchar(255) DEFAULT '' NOT NULL,
	gitlab varchar(255) DEFAULT '' NOT NULL,
	teams int(11) unsigned DEFAULT '0' NOT NULL,
	functions int(11) unsigned DEFAULT '0' NOT NULL,
	locations int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_stafflist_domain_model_teams'
#
CREATE TABLE tx_stafflist_domain_model_teams (

	teamname varchar(255) DEFAULT '' NOT NULL,
	teampage varchar(255) DEFAULT '' NOT NULL,
	persons int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_stafflist_domain_model_functions'
#
CREATE TABLE tx_stafflist_domain_model_functions (

	title varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_stafflist_domain_model_locations'
#
CREATE TABLE tx_stafflist_domain_model_locations (

	title varchar(255) DEFAULT '' NOT NULL,
	street varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	state varchar(255) DEFAULT '' NOT NULL,
	country varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_stafflist_persons_teams_mm'
#
CREATE TABLE tx_stafflist_persons_teams_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_stafflist_persons_functions_mm'
#
CREATE TABLE tx_stafflist_persons_functions_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_stafflist_persons_locations_mm'
#
CREATE TABLE tx_stafflist_persons_locations_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
