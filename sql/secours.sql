DM : maison en groupe 

Gestion des projets humanitaires du secours populaire 

Le secours populaire a besoin d'un site internet qui permet de collecter des fonds pour des projets 
humanitaires dans le monde. Pour cela, il souhaite disposer d'un outil lui permettant deux types de connexion   

USER : sinscrire, voir les projets et faire des dons, commenter les projets  
ADMIN : gérer les users, les projets, les dons, les commentaires. 
		avec ajout, suppresion, consulter, mise à jour des quatre tables. 

					
La base de données est la suivante : 

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
	primary key(idmembre)
);

insert into membre values (null, "ASSUNCAO","Hugo", "15 rue jean moulin - Paris", "0633825296", "hugo@3dsoft.fr", "A4C4CBGFDA"),
						(null, "BEN AMHED","BEN", "5 rue de clery - Paris", "0755859625", "benamhed@gmail.fr", "484DE484");

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

INSERT INTO projet VALUES (NULL, "lutte contre la faim", "2020-11-12", "Afrique du Sud", "Cape Town", 15000.50, 2307.89),
(NULL, "fournir des vetements pour l'hiver", "2020-11-13", "Senegal", "Dakar", 3500.68, 666.66);

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

insert into don values (null, "2020-11-01", 4000, "Merci",1,2), (null, "2020-12-01", 5000, "Bravo", 1,1);

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

insert into commentaire values (null, "2020-12-02", "Je suis satisfait", 18, 1,1), (null, "2020-10-5", "Tres content",16, 1,2);




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

create table user (
	iduser int(3) not null auto_increment, 
	nom varchar(50),
	prenom varchar(50), 
	email varchar(100), 
	mdp varchar(255), 
	droits enum ("admin", "user"), 
	primary key(iduser)
);

insert into user values (NULL, NULL, NULL, "hgogog@gmail.com", "454545", "user");


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