create table utilisateurs(
    nom VARCHAR(32) primary key,
    mdp VARCHAR(256)
);

create table messages(
    nom VARCHAR(32),
    texte VARCHAR(1024),
    envoi DATE,

    constraint foreign key nom references utilisateurs(nom)
);