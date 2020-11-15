/*DM : maison en groupe 

Gestion des projets humanitaires du secours populaire 

Le secours populaire a besoin d'un site internet qui permet de collecter des fonds pour des projets 
humanitaires dans le monde. Pour cela, il souhaite disposer d'un outil lui permettant deux types de connexion   

USER : sinscrire, voir les projets et faire des dons, commenter les projets  
ADMIN : gérer les users, les projets, les dons, les commentaires. 
		avec ajout, suppresion, consulter, mise à jour des quatre tables. */

drop database if exists secours ; 
create database secours; 
use secours; 

create table membre (
	idmembre int(3) not null auto_increment, 
	nom varchar(50),
	prenom varchar(50),
	adresse varchar(50),
	tel varchar(20),
	email varchar(100), 
	mdp varchar(255),
	droits enum("admin", "user"),
	primary key(idmembre)
);

insert into membre values
	(null, "BARTHEZ", "Fabien", "10, rue de Metz 75010 Paris", "0601152595", "a@gmail.com", "123", "admin"),
	(null, "THURAM", "Lilian", "3, avenue de la Défense 75016 Paris", "0603672856", "b@gmail.com", "456", "user"),
	(null, "DESCHAMPS", "Didier", "37, boulevard Saint-Germain Défense 69004 Lyon", "0638181580", "c@gmail.com", "789", "user"),
	(null, "VIERA", "Patrick", "37, avenue des Festivals 06400 Cannes", "0612036794", "d@gmail.com", "101112", "user"),
	(null, "ZINEDINE", "Zidane", "43, rue de Nice 06105 Nice", "0638651525", "e@gmail.com", "131415", "user"),
	(null, "PLATINI", "Michel", "37, avenue des Festivals 06400 Cannes", "0685146958", "f@gmail.com", "161718", "admin")
;

create table projet (
	idprojet int(3) not null auto_increment, 
	description varchar(50),
	datelancement date,
	pays varchar(50),
	ville varchar(50),
	budget float,  
	sommecollectee float, 
	primary key(idprojet)
);

INSERT INTO projet VALUES
	(NULL, "Lutte contre la faim", "2020-11-12", "Afrique du Sud", "Cape Town", 75000, 0),
	(NULL, "Fournir des vetements pour l'hiver", "2020-09-16", "Senegal", "Dakar", 3530.68, 0),
	(NULL, "Aide a l'enfance", "2020-09-05", "Pérou", "Lima", 2700, 0),
	(NULL, "Construction d'écoles", "2020-10-08", "Cambodge", "Phnom Penh", 11380, 0),
	(NULL, "Activités sportives et culturelles", "2020-10-19", "Madagascar", "Tananarive", 9230, 0)
;

create table don (
	iddon int(3) not null auto_increment, 
	datedon date,
	somme float,  
	appreciation varchar(255),
	idprojet int(3) not null, 
	idmembre int(3) not null,
	primary key(iddon), 
	foreign key(idprojet) references projet(idprojet), 
	foreign key(idmembre) references membre(idmembre)
);

insert into don values
	(null, "2020-12-01", 375, "Merci", 1, 1),
	(null, "2020-12-03", 220, "Bravo", 1, 2),
	(null, "2020-12-02", 135, "Bon courage!", 2, 3),
	(null, "2020-12-04", 400, "Excellent travail", 3, 5),
	(null, "2020-12-04", 1230, "Super", 4, 2),
	(null, "2020-12-04", 525, "Super", 4, 3),
	(null, "2020-12-04", 888, "Merci de vos efforts", 5, 5)
;

create table commentaire (
	idcomment int(3) not null auto_increment, 
	datecomment date,
	contenu text, 
	note int(2), 
	idprojet int(3) not null,
	idmembre int(3) not null,
	primary key(idcomment), 
	foreign key(idprojet) references projet(idprojet), 
	foreign key(idmembre) references membre(idmembre)
);

insert into commentaire values
	(null, "2020-12-02", "Ils font preuve d'humanité, ils sont très solidaires et ils nous donnent leur temps pour nous servir. MERCI BEAUCOUP!", 18, 1, 1),
	(null, "2020-12-05", "Leur approche si conviviale auprès des gens démunis. Merci", 14, 1, 2),
	(null, "2020-12-05", "La première fois que j'ai Croisé les Enfants en vacances à la plage tout Heureux. Grâce au Secours Populaire. Bravo", 16, 3, 5),
	(null, "2020-12-05", "Une organisation indispensable dans notre monde où les catastrophes individuelles et collectives sont hélas très nombreuses..", 13, 4, 3)
;

create view don_membre_projet as (
    select d.iddon, d.datedon, d.somme, d.appreciation, p.description, m.nom
    from don d, projet p, membre m
    where d.idprojet = p.idprojet
    and d.idmembre = m.idmembre
);

create view commentaire_membre_projet as (
    select c.idcomment, c.datecomment, c.contenu, c.note, p.description, m.nom
    from commentaire c, projet p, membre m
    where c.idprojet = p.idprojet
    and c.idmembre = m.idmembre
);

/* insert don */
DROP trigger IF EXISTS ajout_don_projet;
DELIMITER $
CREATE TRIGGER ajout_don_projet
AFTER INSERT ON don
FOR EACH ROW
BEGIN
	UPDATE projet SET sommecollectee = sommecollectee + new.somme
	WHERE new.idprojet = idprojet;
END $
DELIMITER ;

/* update don */
DROP trigger IF EXISTS modifie_don_projet;
DELIMITER $
CREATE TRIGGER modifie_don_projet
AFTER UPDATE ON don
FOR EACH ROW
BEGIN
	UPDATE projet SET sommecollectee = sommecollectee - old.somme + new.somme
	WHERE new.idprojet = idprojet;
END $
DELIMITER ;

/* delete don */
DROP trigger IF EXISTS supprime_don_projet;
DELIMITER $
CREATE TRIGGER supprime_don_projet
AFTER DELETE ON don
FOR EACH ROW
BEGIN
	UPDATE projet SET sommecollectee = sommecollectee - old.somme
	WHERE old.idprojet = idprojet;
END $
DELIMITER ;
