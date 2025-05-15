create table usuarios(
    us_id serial primary key,
    us_nombre varchar(255),
    us_apellidos varchar(255),
    us_nit integer,
    us_telefono integer,
    us_correo varchar(100),
    us_estado char(1),
    us_situacion smallint default 1
)