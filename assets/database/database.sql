CREATE DATABASE udemy_mvc_store;

use udemy_mvc_store;


-- CREACION DE TABLAS
create table usuarios(
    id int(255) AUTO_INCREMENT,
    nombre varchar(100) not null,
    apellidos varchar(100) not null,
    email varchar(255) not null,
    pass varchar(255) not null,
    rol varchar(20),
    imagen varchar(255),
    CONSTRAINT pk_usuario PRIMARY  KEY (id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;



create table categorias(
    id int(255) AUTO_INCREMENT not null,
    nombre  varchar(100) not null,
    CONSTRAINT pk_categorias PRIMARY KEY (id)
)ENGINE=InnoDb;


create table productos(
    id int(255) AUTO_INCREMENT,
    nombre varchar(100) not null,
    descripcion TEXT  not null,
    precio float(100,2) not null,
    stock int (255) not null, 
    oferta varchar(2),
    fecha date not null,
    imagen varchar(255),
    id_categoria int(255) not null,

    CONSTRAINT pk_productos PRIMARY  KEY (id),
    CONSTRAINT fk_product_categoria FOREIGN key (id_categoria) REFERENCES categorias(id) on delete cascade on update cascade
)ENGINE=InnoDb;


create table pedidos(
    id int(255) AUTO_INCREMENT,
    provincia varchar(100) not null,
    localidad varchar(100) not null,
    direccion varchar(255) not null,
    coste float(250,2) not null,
    estado varchar(200) not null,
    fecha date,
    hora time,
    id_usuario int(255) not null,

    CONSTRAINT pk_pedidos PRIMARY  KEY (id),
    CONSTRAINT fk_pedidos_usuario FOREIGN key (id_usuario) REFERENCES usuarios(id) on delete cascade on update cascade
)ENGINE=InnoDb;



create table lineasPedidos(
    id int(255) AUTO_INCREMENT not null,
    id_pedido int(255) not null,
    id_producto int(255) not null,
    unidades int(255) not null,

    CONSTRAINT pk_pedidos PRIMARY  KEY (id),
    CONSTRAINT fk_linPedidos_pedido FOREIGN key (id_pedido) REFERENCES pedidos(id) on delete cascade on update cascade,
    CONSTRAINT fk_linPedidos_producto FOREIGN key (id_producto) REFERENCES productos(id) on delete cascade on update cascade
)ENGINE=InnoDb;




-- INSERTS

insert into usuarios (nombre, apellidos, email, pass, rol)
    values ('admin','admin', 'admin@admin.com', 'admin','administrador');


insert into categorias (nombre) values ('Manga corta');
insert into categorias (nombre) values ('Manga larga');
insert into categorias (nombre) values ('Tirantes');