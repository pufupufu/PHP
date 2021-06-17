/*CREACION TABLA teatro*/
CREATE TABLE teatro(
    id_teatro bigint(11) AUTO_INCREMENT,
    nombre varchar(50),
    direccion varchar(50),
    PRIMARY KEY (id_teatro)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/*CREACION TABLA funcion*/
    CREATE TABLE funcion (
    id_funcion bigint(11) AUTO_INCREMENT,
    nombre varchar(50),
    precio float,
    fecha date,
    hora_inicio varchar(5),
    duracion int(3),
    id_teatro bigint(11),
    PRIMARY KEY (id_funcion),
    FOREIGN KEY (id_teatro) REFERENCES teatro (id_teatro)
    ON UPDATE CASCADE
    ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

/*CREACION TABLA cine*/
CREATE TABLE cine (
    id_funcion bigint(11),
    genero varchar(20),
    pais_origen varchar(50),
    PRIMARY KEY (id_funcion),
    FOREIGN KEY (id_funcion) REFERENCES funcion (id_funcion)
    ON UPDATE CASCADE
    ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*CREACION TABLA musical*/
CREATE TABLE musical (
    id_funcion bigint(11),
    director varchar(50),
    cant_personas_escena int(3),
    PRIMARY KEY (id_funcion),
    FOREIGN KEY (id_funcion) REFERENCES funcion (id_funcion)
    ON UPDATE CASCADE
    ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*CREACION TABLA obra*/
CREATE TABLE obra (
    id_funcion bigint(11),
    PRIMARY KEY (id_funcion),
    FOREIGN KEY (id_funcion) REFERENCES funcion (id_funcion)
    ON UPDATE CASCADE
    ON DELETE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;