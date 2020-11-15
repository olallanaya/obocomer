CREATE DATABASE IF NOT EXISTS obocomer;
USE obocomer;
CREATE TABLE  IF NOT EXISTS users(
    id  int(255) auto_increment not null,
    name    varchar(100),
    nick    varchar(100),
    email   varchar(255),
    password    varchar(255)
    image   varchar(255),
    direccion   varchar(255),
    localidad   varchar(255),
    provincia   varchar(255),
    created_at  datetime,
    updated_at  datetime,
    remenber_token varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
) ENGINE=InnoDb;
INSERT INTO users VALUES (NULL,'Maria','mpensando','maria@maria.com','123',NULL,'calle la piensa','piensa','caceres',CURTIME(),CURTIME(),NULL);
INSERT INTO users VALUES (NULL,'Juan','juan','juan@juan.com','123',NULL,'calle la seca','artes','caceres',CURTIME(),CURTIME(),NULL);
INSERT INTO users VALUES (NULL,'Ana','liala','lia@la.com','123',NULL,'calle','esces','caceres',CURTIME(),CURTIME(),NULL);
CREATE TABLE  IF NOT EXISTS restaurantes(
    id  int(255) auto_increment not null,
    nombre    varchar(100),
    email   varchar(255),
    password    varchar(255),
    image   varchar(255),
    direccion   varchar(255),
    localidad   varchar(255),
     provincia   varchar(255),
    descripcion text,
    telefono int(255),
    created_at  datetime,
    updated_at  datetime,
    remenber_token varchar(255),
CONSTRAINT pk_restaurantes PRIMARY KEY(id)
) ENGINE=InnoDb;
INSERT INTO restaurantes VALUES (NULL,'Casa Manuel','manuel@casa.com','123',NULL,'lugar de abaixo','artes','a coruna','para ter un bo momento ca familia e disfrutar da boa mesa','981141314',CURTIME(),CURTIME(),NULL);
INSERT INTO restaurantes VALUES (NULL,'O xardin','xardin@caxar.com','123',NULL,'lugar de arriba','Cerceda','a coruna','onde o ambiente se vive no prato','981181314',CURTIME(),CURTIME(),NULL);
INSERT INTO restaurantes VALUES (NULL,'Casa Pilar','pili@casa.com','123',NULL,'iglesario de montello','Betanzos','a coruna','especialidade en callos','984141314',CURTIME(),CURTIME(),NULL);
INSERT INTO restaurantes VALUES (NULL,'Meson Manola','manola@meson.com','123',NULL,'lugar de queo','Carballo','a coruna','especialidade en arroz con choupas','981541314',CURTIME(),CURTIME(),NULL);
INSERT INTO restaurantes VALUES (NULL,'A Pachona','bar@pachona.com','123',NULL,'Iglesario de Loureda','Loureda','a coruna','especialidad en cocido','971141314',CURTIME(),CURTIME(),NULL);
INSERT INTO restaurantes VALUES (NULL,'Xannaia','xan@naia.com','123',NULL,'a eira','Loureda','a coruna','especialidad en cocido','971141314',CURTIME(),CURTIME(),NULL);

CREATE TABLE IF NOT EXISTS imagenes(
id  int(255) auto_increment not null,
user_id int(255),
rest_id int(255),
image_path varchar(255),
descripcion text,
created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_imagenes PRIMARY KEY(id),
CONSTRAINT fk_imagenes_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_imagenes_restaurantes FOREIGN KEY(rest_id) REFERENCES restaurantes(id)
) ENGINE=InnoDb;

INSERT INTO imagenes VALUES(NULL,2,1,'tortilla.jpg','a mellor do mundo',CURTIME(),CURTIME());
INSERT INTO imagenes VALUES(NULL,2,3,'famili.jpg','na mellor compañia',CURTIME(),CURTIME());
INSERT INTO imagenes VALUES(NULL,3,6,'placer.jpg','chupando os dedos',CURTIME(),CURTIME());
INSERT INTO imagenes VALUES(NULL,3,2,'oxantar.jpg','un placer',CURTIME(),CURTIME());
INSERT INTO imagenes VALUES(NULL,5,5,'tortilla.jpg','a mellor do mundo',CURTIME(),CURTIME());
INSERT INTO imagenes VALUES(NULL,5,4,'tortilla.jpg','a mellor do mundo',CURTIME(),CURTIME());
CREATE TABLE IF NOT EXISTS comentarios(
id  int(255) auto_increment not null,
user_id int(255),
rest_id int(255),
imagen_id int(255),
contenido text,
 created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_comentarios PRIMARY KEY(id),
CONSTRAINT fk_comentarios_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_comentarios_restaurantes FOREIGN KEY(rest_id) REFERENCES restaurantes(id),
CONSTRAINT fk_comentarios_imagenes FOREIGN KEY(imagen_id) REFERENCES imagenes(id)
)ENGINE=InnoDb;
INSERT INTO comentarios VALUES(NULL,5,1,1,'que pintaza',CURTIME(),CURTIME());
INSERT INTO comentarios VALUES(NULL,2,3,6,'que pintaza',CURTIME(),CURTIME());
INSERT INTO comentarios VALUES(NULL,3,1,5,'que pintaza',CURTIME(),CURTIME());
INSERT INTO comentarios VALUES(NULL,5,2,5,'que pintaza',CURTIME(),CURTIME());
INSERT INTO comentarios VALUES(NULL,2,3,2,'que pintaza',CURTIME(),CURTIME());
INSERT INTO comentarios VALUES(NULL,3,5,4,'que pintaza',CURTIME(),CURTIME());
INSERT INTO comentarios VALUES(NULL,5,4,3,'que pintaza',CURTIME(),CURTIME());

CREATE TABLE IF NOT EXISTS likes(
id  int(255) auto_increment not null,
user_id int(255),
rest_id int(255),
imagen_id int(255),
created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_likes PRIMARY KEY(id),
CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_likes_restaurantes FOREIGN KEY(rest_id) REFERENCES restaurantes(id),
CONSTRAINT fk_likes_imagenes FOREIGN KEY(imagen_id) REFERENCES imagenes(id)
)ENGINE=InnoDb;
INSERT INTO likes VALUES(NULL,5,1,1,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,2,3,6,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,3,1,5,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,5,2,5,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,2,3,2,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,3,5,4,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,5,4,3,CURTIME(),CURTIME());

CREATE TABLE IF NOT EXISTS reservas(
id  int(255) auto_increment not null,
user_id int(255),
rest_id int(255),
fecha datetime,
comentarios text,
 created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_reservas PRIMARY KEY(id),
CONSTRAINT fk_reservas_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_reservas_restaurantes FOREIGN KEY(rest_id) REFERENCES restaurantes(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS menus(
id  int(255) auto_increment not null,
rest_id int(255),
nombre varchar(255),
created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_menus PRIMARY KEY(id),
CONSTRAINT fk_menus_restaurantes FOREIGN KEY(rest_id) REFERENCES restaurantes(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS menuopciones(
id  int(255) auto_increment not null,
menu_id int(255),
descripcion text,
precio int(255),
created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_menuopciones PRIMARY KEY(id),
CONSTRAINT fk_menuopciones_menus FOREIGN KEY(menu_id) REFERENCES menus(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS pedidos(
id  int(255) auto_increment not null,
rest_id int(255),
user_id int(255),
comentarios text,
created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_restaurantes FOREIGN KEY(rest_id) REFERENCES restaurantes(id),
CONSTRAINT fk_pedidos_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS pedidoopciones(
id  int(255) auto_increment not null,
pedido_id int(255),
menuopciones_id int(255),
created_at  datetime,
updated_at  datetime,
CONSTRAINT pk_pedidoopciones PRIMARY KEY(id),
CONSTRAINT fk_pedidoopciones_menuopciones FOREIGN KEY(menuopciones_id) REFERENCES menuopciones(id)
)ENGINE=InnoDb;




