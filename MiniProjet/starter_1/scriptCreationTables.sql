CREATE TABLE IF NOT EXISTS "persons" (
    "lastname" varchar(255) , 
    "firstname" varchar(255),
    "address" varchar(255),
    "passwd" varchar(255),
    "id" serial primary key,
    "verify" boolean
);

CREATE TABLE IF NOT EXISTS "info_complementaires_clients" (
    "numeroTelephone" int default 0, 
	"numeroFixe"	int default 0,
	"profession"	varchar(150) default '...',
    "adresse" varchar(150) default '...',
    "nomSiteWeb" varchar(500) default '...',
    "Github" varchar(100) default '...',
    "Twitter" varchar(50) default '...',
    "Instagram" varchar(50) default '...',
    "Facebook" varchar(50) default '...',
    "id" int,
    FOREIGN KEY("id") REFERENCES "persons"("id"),
    CONSTRAINT info_pk PRIMARY KEY ("id")
);