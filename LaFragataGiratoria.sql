create database if not exists BD_fragata;
use BD_fragata;

/*Tabla de usuarios del sistema*/
CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    nombre_usuario VARCHAR(100) NOT NULL,
    fecha_creacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ultimo_acceso DATETIME NULL,
    nombre_rol INT NOT NULL,
    estado_usuario INT NOT NULL
) ENGINE=InnoDB;

-- Insertar usuarios que usan las contraseñas previamente definidas
INSERT INTO usuario (id_usuario, usuario, password, email, nombre_usuario, fecha_creacion, ultimo_acceso, nombre_rol, estado_usuario) VALUES
(1, 'admin', '12345', 'admin@gmail.com', 'administrador', NOW(), NULL, 'admin', 1),
(2, 'juanperez', 'passwordjuan', 'juanperez@gmail.com', 'juan perez', NOW(), NULL, 'mesero', 1),
(3, 'mariagonzalez', 'mariapass', 'maria@gmail.com', 'maria gonzalez', NOW(), NULL, 'cocinero', 1),
(4, 'pedrolopez', 'pedroclave', 'pedro@gmail.com', 'pedro lopez', NOW(), NULL, 'mesero', 1),
(5, 'luciasanchez', 'lucia2025', 'lucia@gmail.com', 'lucia sanchez', NOW(), NULL, 'cliente', 1),
(6, 'carlamartinez', 'carlamart', 'carla@gmail.com', 'carla martinez', NOW(), NULL, 'cliente', 1),
(7, 'ricardorivas', 'ricardosecret', 'ricardo@gmail.com', 'ricardo rivas', NOW(), NULL, 'cliente', 1),
(8, 'isabelrodriguez', 'isabel1234', 'isabel@gmail.com', 'isabel rodriguez', NOW(), NULL, 'cliente', 1),
(9, 'danielhernandez', 'danielpwd', 'daniel@gmail.com', 'daniel hernandez', NOW(), NULL, 'cliente', 1),
(10, 'carolinamendez', 'carolinapass', 'carolina@gmail.com', 'carolina mendez', NOW(), NULL, 'cliente', 1);


/*Tabla para almacenar password encriptadas*/
CREATE TABLE password (
    id_password INT PRIMARY KEY AUTO_INCREMENT,
    password VARCHAR(255) NOT NULL,
    fecha_creacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion DATETIME NULL
);

-- Insertar contraseñas válidas que se usarán como referencia en usuario
INSERT INTO password (password) VALUES
('12345'),
('passwordjuan'),
('mariapass'),
('pedroclave'),
('lucia2025'),
('carlamart'),
('ricardosecret'),
('isabel1234'),
('danielpwd'),
('carolinapass');

/*Tabla de roles de usuario*/
create table rol (
    id_rol int primary key,
    nombre_rol varchar(50) not null,
    descripcion text null,
    permisos text null
);

insert into rol values (1, 'admin', 'rol de administrador', 'todo');
insert into rol values (2, 'mesero', 'rol de servicio', 'visualizar pedidos y mesas');
insert into rol values (3, 'cocinero', 'rol de cocina', 'ver pedidos para preparación');
insert into rol values (4, 'cliente', 'usuario final', 'hacer pedidos y ver carrito');

/*Estados posibles de un usuario*/
CREATE TABLE estado_usuario (
    id_estado_usuario INT PRIMARY KEY,
    nombre_estado VARCHAR(50) NOT NULL,
    descripcion TEXT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
) ENGINE=InnoDB;


INSERT INTO estado_usuario (id_estado_usuario, nombre_estado, descripcion, id_usuario) VALUES
(1, 'activo', 'usuario con acceso completo', 1),
(2, 'inactivo', 'usuario sin acceso', 2),
(3, 'suspendido', 'acceso temporalmente revocado', 3),
(4, 'pendiente', 'esperando verificación de cuenta', 4),
(5, 'eliminado', 'cuenta borrada por el usuario', 5),
(6, 'bloqueado', 'acceso denegado por administrador', 6),
(7, 'verificado', 'usuario con cuenta confirmada', 7),
(8, 'registrado', 'usuario recién registrado', 8),
(9, 'incompleto', 'registro no finalizado', 9),
(10, 'rechazado', 'solicitud de registro denegada', 10);



/*Registro de las jornadas laborales del personal*/
create table jornada_laboral (
    id_jornada int primary key,
    hora_inicio time not null,
    hora_finalizacion time not null,
    tipo_jornada varchar(50) not null,
    id_rol int not null,
    foreign key (id_rol) references rol(id_rol)
);

insert into jornada_laboral values (1, '08:00:00', '16:00:00', 'diurna', 2); -- mesero
insert into jornada_laboral values (2, '16:00:00', '00:00:00', 'vespertina', 3); -- cocinero
insert into jornada_laboral values (3, '11:00:00', '19:00:00', 'diurna', 1); -- admin
insert into jornada_laboral values (4, '15:00:00', '23:00:00', 'tarde', 4); -- cliente (opcional)

/*Tabla para registrar códigos QR*/
create table codigo_qr (
    id_codigo_qr int primary key,
    url_destino text not null,
    fecha_generacion datetime not null default current_timestamp,
    estado varchar(50) not null default 'activo'
);

insert into codigo_qr values (1, 'http://restaurante.com/menu/1', now(), 'activo');
insert into codigo_qr values (2, 'http://restaurante.com/menu/2', now(), 'activo');
insert into codigo_qr values (3, 'http://restaurante.com/menu/3', now(), 'activo');
insert into codigo_qr values (4, 'http://restaurante.com/menu/4', now(), 'activo');
insert into codigo_qr values (5, 'http://restaurante.com/menu/5', now(), 'activo');
insert into codigo_qr values (6, 'http://restaurante.com/menu/6', now(), 'activo');
insert into codigo_qr values (7, 'http://restaurante.com/menu/7', now(), 'activo');
insert into codigo_qr values (8, 'http://restaurante.com/menu/8', now(), 'activo');
insert into codigo_qr values (9, 'http://restaurante.com/menu/9', now(), 'activo');
insert into codigo_qr values (10, 'http://restaurante.com/menu/10', now(), 'activo');


/*Información de mesas disponibles*/
create table mesa (
    id_mesa int primary key,
    numero_mesa int not null unique,
    ubicacion varchar(100) null,
    capacidad int not null default 4
);

insert into mesa values (1, 1, 'interior', 4);
insert into mesa values (2, 2, 'exterior', 4);
insert into mesa values (3, 3, 'interior', 6);
insert into mesa values (4, 4, 'exterior', 2);
insert into mesa values (5, 5, 'interior', 4);
insert into mesa values (6, 6, 'exterior', 4);
insert into mesa values (7, 7, 'interior', 4);
insert into mesa values (8, 8, 'exterior', 6);
insert into mesa values (9, 9, 'interior', 2);
insert into mesa values (10, 10, 'exterior', 4);


/*Adicionales para platillos*/
create table adicionales (
    id_adicional int primary key,
    nombre_adicional varchar(100) not null,
    precio decimal(10,2) not null default 0.00
);

insert into adicionales values (1, 'queso extra', 10.00);
insert into adicionales values (2, 'tocino', 15.00);
insert into adicionales values (3, 'salsa picante', 5.00);
insert into adicionales values (4, 'aguacate', 20.00);
insert into adicionales values (5, 'cebolla caramelizada', 12.00);
insert into adicionales values (6, 'hongos', 10.00);
insert into adicionales values (7, 'jamón', 15.00);
insert into adicionales values (8, 'extra pan', 8.00);
insert into adicionales values (9, 'guacamole', 18.00);
insert into adicionales values (10, 'huevo extra', 10.00);


/*Bebidas disponibles*/
create table bebidas (
    id_bebidas int primary key,
    nombre_bebida varchar(100) not null,
    tipo_de_bebida varchar(50) not null,
    precio decimal(10,2) not null,
    proveedor varchar(100) null
);

insert into bebidas values (1, 'agua natural', 'sin alcohol', 15.00, 'proveedor a');
insert into bebidas values (2, 'refresco cola', 'sin alcohol', 20.00, 'proveedor b');
insert into bebidas values (3, 'cerveza', 'alcoholica', 30.00, 'proveedor c');
insert into bebidas values (4, 'vino tinto', 'alcoholica', 50.00, 'proveedor d');
insert into bebidas values (5, 'jugo de naranja', 'sin alcohol', 25.00, 'proveedor e');
insert into bebidas values (6, 'café', 'sin alcohol', 18.00, 'proveedor f');
insert into bebidas values (7, 'té helado', 'sin alcohol', 22.00, 'proveedor g');
insert into bebidas values (8, 'whisky', 'alcoholica', 80.00, 'proveedor h');
insert into bebidas values (9, 'agua mineral', 'sin alcohol', 20.00, 'proveedor i');
insert into bebidas values (10, 'limonada', 'sin alcohol', 17.00, 'proveedor j');


/*Estados de los pedidos*/
create table estado_pedido (
    id_estado_pedido int primary key,
    nombre_estado varchar(50) not null,
    descripcion text null
);

insert into estado_pedido values (1, 'pendiente', 'pedido pendiente de preparación');
insert into estado_pedido values (2, 'en preparación', 'pedido en cocina');
insert into estado_pedido values (3, 'listo', 'pedido listo para servir');
insert into estado_pedido values (4, 'entregado', 'pedido entregado al cliente');
insert into estado_pedido values (5, 'cancelado', 'pedido cancelado');
insert into estado_pedido values (6, 'pagado', 'pedido pagado');
insert into estado_pedido values (7, 'esperando pago', 'espera de pago');
insert into estado_pedido values (8, 'en espera', 'pedido en espera');
insert into estado_pedido values (9, 'confirmado', 'pedido confirmado');
insert into estado_pedido values (10, 'devuelto', 'pedido devuelto');


/*Productos: combinación de inventario e insumos*/
create table producto (
    id_producto int primary key,
    nombre_producto varchar(100) not null,
    tipo_producto varchar(50) not null, -- 'insumo' o 'inventario'
    unidad_medida varchar(50) null,
    cantidad_disponible decimal(10,2) not null default 0.00,
    stock_inicial decimal(10,2) not null default 0.00,
    stock_final decimal(10,2) not null default 0.00,
    stock_minimo decimal(10,2) not null default 0.00,
    proveedor varchar(100) null,
    ultima_actualizacion datetime not null default current_timestamp
);

insert into producto values (1, 'harina', 'insumo', 'kg', 100.00, 150.00, 90.00, 20.00, 'proveedor a', now());
insert into producto values (2, 'azucar', 'insumo', 'kg', 80.00, 100.00, 70.00, 15.00, 'proveedor b', now());
insert into producto values (3, 'carne de res', 'insumo', 'kg', 50.00, 60.00, 40.00, 10.00, 'proveedor c', now());
insert into producto values (4, 'lechuga', 'insumo', 'kg', 30.00, 40.00, 25.00, 5.00, 'proveedor d', now());
insert into producto values (5, 'tomate', 'insumo', 'kg', 40.00, 50.00, 35.00, 7.00, 'proveedor e', now());
insert into producto values (6, 'pollo', 'insumo', 'kg', 60.00, 70.00, 55.00, 10.00, 'proveedor f', now());
insert into producto values (7, 'queso', 'insumo', 'kg', 20.00, 25.00, 18.00, 5.00, 'proveedor g', now());
insert into producto values (8, 'pan', 'insumo', 'pieza', 100.00, 120.00, 90.00, 30.00, 'proveedor h', now());
insert into producto values (9, 'aceite', 'insumo', 'litro', 25.00, 30.00, 20.00, 5.00, 'proveedor i', now());
insert into producto values (10, 'sal', 'insumo', 'kg', 50.00, 60.00, 45.00, 10.00, 'proveedor j', now());


/*Platillos ofrecidos por el restaurante*/
create table platillo (
    id_platillo int primary key,
    nombre_platillo varchar(100) not null,
    precio decimal(10,2) not null,
    descripcion text null,
    id_adicional int null,
    foreign key (id_adicional) references adicionales(id_adicional)
);

insert into platillo values (1, 'hamburguesa clasica', 120.00, 'hamburguesa con carne, queso y lechuga', 1);
insert into platillo values (2, 'pizza margarita', 150.00, 'pizza con salsa de tomate y queso', 1);
insert into platillo values (3, 'ensalada cesar', 90.00, 'ensalada con lechuga, pollo y aderezo cesar', 1);
insert into platillo values (4, 'tacos de carne', 100.00, 'tacos con carne, cebolla y cilantro', 1);
insert into platillo values (5, 'sopa de verduras', 80.00, 'sopa con mezcla de verduras frescas', 1);
insert into platillo values (6, 'pollo frito', 110.00, 'pollo frito crujiente', 1);
insert into platillo values (7, 'spaghetti bolognesa', 130.00, 'pasta con salsa boloñesa', 1);
insert into platillo values (8, 'fish and chips', 140.00, 'pescado empanizado con papas fritas', 1);
insert into platillo values (9, 'quesadillas', 90.00, 'tortilla con queso y pollo', 1);
insert into platillo values (10, 'chiles rellenos', 150.00, 'chiles rellenos de queso', 1);


/*Relación N:N entre platillos y productos*/
create table platillo_producto (
    id_platillo int not null,
    id_producto int not null,
    cantidad decimal(10,2) not null default 1.00,
    primary key (id_platillo, id_producto),
    foreign key (id_platillo) references platillo(id_platillo),
    foreign key (id_producto) references producto(id_producto)
);

insert into platillo_producto (id_platillo, id_producto, cantidad) values (1, 1, 2.00);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (1, 2, 1.50);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (2, 3, 1.00);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (2, 4, 0.75);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (3, 5, 2.00);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (4, 6, 1.00);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (5, 7, 1.25);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (6, 8, 0.50);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (7, 9, 1.00);
insert into platillo_producto (id_platillo, id_producto, cantidad) values (8, 10, 1.75);

/*Pedido - Tabla de costos y datos generales*/
create table pedido (
    id_pedido int primary key,
    fecha_hora datetime not null default current_timestamp,
    tiempo_estimado time null,
    total_a_pagar decimal(10,2) not null default 0.00,
    nombre_platillo varchar(100) null, -- Agregado
    id_mesa int not null,
    id_estado_pedido int not null,
    foreign key (id_mesa) references mesa(id_mesa),
    foreign key (id_estado_pedido) references estado_pedido(id_estado_pedido)
);

insert into pedido values (1, now(), '00:30:00', 120.00, 'tacos', 1, 1);
insert into pedido values (2, now(), '00:25:00', 150.00, 'enchiladas', 2, 2);
insert into pedido values (3, now(), '00:20:00', 90.00, 'quesadillas', 3, 3);
insert into pedido values (4, now(), '00:40:00', 100.00, 'burritos', 4, 4);
insert into pedido values (5, now(), '00:15:00', 80.00, 'sopes', 5, 5);
insert into pedido values (6, now(), '00:45:00', 110.00, 'tostadas', 6, 6);
insert into pedido values (7, now(), '00:35:00', 130.00, 'tamales', 7, 7);
insert into pedido values (8, now(), '00:50:00', 140.00, 'pozole', 8, 8);
insert into pedido values (9, now(), '00:55:00', 90.00, 'chiles rellenos', 9, 9);
insert into pedido values (10, now(), '01:00:00', 150.00, 'molletes', 10, 10);



/*Detalles del pedido*/
create table pedido_detalle (
    id_detalle int primary key,
    id_pedido int not null,
    id_platillo int null,
    id_bebida int null,
    id_adicional int null,
    cantidad int not null default 1,
    foreign key (id_pedido) references pedido(id_pedido),
    foreign key (id_platillo) references platillo(id_platillo),
    foreign key (id_bebida) references bebidas(id_bebidas),
    foreign key (id_adicional) references adicionales(id_adicional)
);

insert into pedido_detalle values (1, 1, 1, null, null, 2);
insert into pedido_detalle values (2, 1, null, 2, null, 1);
insert into pedido_detalle values (3, 2, 3, null, 1, 1);
insert into pedido_detalle values (4, 2, null, 4, null, 2);
insert into pedido_detalle values (5, 3, 5, null, null, 1);
insert into pedido_detalle values (6, 3, null, 1, 2, 1);
insert into pedido_detalle values (7, 4, 2, null, null, 3);
insert into pedido_detalle values (8, 5, null, 3, null, 1);
insert into pedido_detalle values (9, 6, 4, null, 3, 2);
insert into pedido_detalle values (10, 7, null, 5, null, 1);


/*Métodos de pago*/
create table metodo_de_pago (
    id_metodo_pago int primary key,
    nombre_metodo varchar(50) not null,
    id_usuario int not null,
    id_pedido int not null,
    foreign key (id_usuario) references usuario(id_usuario),
    foreign key (id_pedido) references pedido(id_pedido)
);

insert into metodo_de_pago values (1, 'tarjeta credito', 1, 1);
insert into metodo_de_pago values (2, 'efectivo', 2, 2);
insert into metodo_de_pago values (3, 'paypal', 3, 3);
insert into metodo_de_pago values (4, 'transferencia bancaria', 4, 4);
insert into metodo_de_pago values (5, 'tarjeta debito', 5, 5);
insert into metodo_de_pago values (6, 'efectivo', 6, 6);
insert into metodo_de_pago values (7, 'paypal', 7, 7);
insert into metodo_de_pago values (8, 'tarjeta credito', 8, 8);
insert into metodo_de_pago values (9, 'transferencia bancaria', 9, 9);
insert into metodo_de_pago values (10, 'efectivo', 10, 10);


/*Referencias de pagos*/
create table numero_referencia (
    numero_referencia int primary key,
    id_pedido int not null,
    foreign key (id_pedido) references pedido(id_pedido)
);

insert into numero_referencia values (1001, 1);
insert into numero_referencia values (1002, 2);
insert into numero_referencia values (1003, 3);
insert into numero_referencia values (1004, 4);
insert into numero_referencia values (1005, 5);
insert into numero_referencia values (1006, 6);
insert into numero_referencia values (1007, 7);
insert into numero_referencia values (1008, 8);
insert into numero_referencia values (1009, 9);
insert into numero_referencia values (1010, 10);


/*TABLAS DE COMPRAS*/

create table proveedor (
    id_proveedor int primary key,
    nombre_proveedor varchar(100) not null,
    contacto varchar(100) null
);

insert into proveedor values (1, 'proveedor a', 'contacto a');
insert into proveedor values (2, 'proveedor b', 'contacto b');
insert into proveedor values (3, 'proveedor c', 'contacto c');
insert into proveedor values (4, 'proveedor d', 'contacto d');
insert into proveedor values (5, 'proveedor e', 'contacto e');
insert into proveedor values (6, 'proveedor f', 'contacto f');
insert into proveedor values (7, 'proveedor g', 'contacto g');
insert into proveedor values (8, 'proveedor h', 'contacto h');
insert into proveedor values (9, 'proveedor i', 'contacto i');
insert into proveedor values (10, 'proveedor j', 'contacto j');


create table compra (
    id_compra int primary key,
    id_proveedor int not null,
    fecha_compra datetime not null default current_timestamp,
    total_compra decimal(10,2) not null,
    foreign key (id_proveedor) references proveedor(id_proveedor)
);

insert into compra values (1, 1, now(), 500.00);
insert into compra values (2, 2, now(), 750.00);
insert into compra values (3, 3, now(), 300.00);
insert into compra values (4, 4, now(), 450.00);
insert into compra values (5, 5, now(), 600.00);
insert into compra values (6, 6, now(), 550.00);
insert into compra values (7, 7, now(), 700.00);
insert into compra values (8, 8, now(), 400.00);
insert into compra values (9, 9, now(), 650.00);
insert into compra values (10, 10, now(), 350.00);


create table detalle_compra (
    id_detalle_compra int primary key,
    id_compra int not null,
    id_producto int not null,
    cantidad decimal(10,2) not null,
    precio_unitario decimal(10,2) not null,
    foreign key (id_compra) references compra(id_compra),
    foreign key (id_producto) references producto(id_producto)
);

insert into detalle_compra values (1, 1, 1, 20.00, 25.00);
insert into detalle_compra values (2, 1, 2, 10.00, 30.00);
insert into detalle_compra values (3, 2, 3, 15.00, 40.00);
insert into detalle_compra values (4, 2, 4, 5.00, 35.00);
insert into detalle_compra values (5, 3, 5, 25.00, 22.00);
insert into detalle_compra values (6, 3, 6, 12.00, 28.00);
insert into detalle_compra values (7, 4, 7, 8.00, 20.00);
insert into detalle_compra values (8, 4, 8, 30.00, 18.00);
insert into detalle_compra values (9, 5, 9, 10.00, 27.00);
insert into detalle_compra values (10, 5, 10, 20.00, 15.00);


CREATE TABLE usuario_login (
    id_usuario INT PRIMARY KEY,
    nombre_usuario VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nombre_rol VARCHAR(50) NOT NULL
);

INSERT INTO usuario_login (nombre_usuario, password, nombre_rol, id_usuario)
SELECT 
    u.nombre_usuario,
    u.password,
    r.nombre_rol,
    u.id_usuario
FROM usuario u
INNER JOIN rol r ON u.nombre_rol = r.nombre_rol;



CREATE TABLE sessions (
  id VARCHAR(255) NOT NULL PRIMARY KEY,
  user_id BIGINT UNSIGNED NULL,
  ip_address VARCHAR(45) NULL,
  user_agent TEXT NULL,
  payload LONGTEXT NOT NULL,
  last_activity INT NOT NULL,
  KEY sessions_user_id_index (user_id),
  KEY sessions_last_activity_index (last_activity)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE cache (
  `key` VARCHAR(255) NOT NULL PRIMARY KEY,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


