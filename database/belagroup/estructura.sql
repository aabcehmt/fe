DROP TABLE IF EXISTS `audits`;
CREATE TABLE IF NOT EXISTS `audits` (
	`audit_id` int(16) unsigned NOT NULL,
	`change_type` varchar(16) NOT NULL DEFAULT '' COMMENT 'INSERT,UPDATE,DISABLE,DELETE',
	`db_table` varchar(256) NOT NULL DEFAULT '',
	`db_table_id` int(16) DEFAULT NULL,
	`change_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`change_detail` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	`db_user` varchar(256) NOT NULL DEFAULT '',
	`db_current_user` varchar(256) NOT NULL DEFAULT ''

	creado_por int(11) NOT NULL COMMENT 'fk.usuaros.id_usuario',
) ENGINE=InnoDB AUTO_INCREMENT=755 DEFAULT CHARSET=utf8;
# ##########################################################
DROP TABLE IF EXISTS `coordenadas`;
CREATE TABLE IF NOT EXISTS `coordenadas` (
	`coordenada_id` int(16) unsigned NOT NULL,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`gps_lat` decimal(10,6) NOT NULL DEFAULT '0.000000' COMMENT 'Latitud',
	`gps_lon` decimal(10,6) NOT NULL DEFAULT '0.000000' COMMENT 'Longitud'
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
	`pais_id` int(8) unsigned NOT NULL,
	`coordenada_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.coordenadas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`nombre_pais` varchar(128) NOT NULL COMMENT 'Nombre del País en Español',
	`nombre_en` varchar(128) NOT NULL DEFAULT '' COMMENT 'Nombre del País en Ingles',
	`iso_alfa2` varchar(2) NOT NULL DEFAULT '' COMMENT 'ISO 3166-1 ALFA 2',
	`iso_alfa3` varchar(4) NOT NULL DEFAULT '' COMMENT 'ISO 3166-1 ALFA 3',
	`iso_num` int(8) unsigned NOT NULL DEFAULT '0' COMMENT 'ISO 3166-1 NUMÉRICO',
	`tel_prefijo` varchar(16) NOT NULL DEFAULT '' COMMENT 'Prefijo Telefónico Internacional',
	`lenguaje` varchar(2) NOT NULL DEFAULT 'EN' COMMENT 'Lengua Oficial'
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `provincias`;
CREATE TABLE IF NOT EXISTS `provincias` (
	`provincia_id` int(16) unsigned NOT NULL,
	`pais_id` int(16) unsigned NOT NULL COMMENT 'fk.paises',
	`coordenada_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.coordenadas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`nombre_provincia` varchar(128) NOT NULL,
	`alias_provincia` varchar(16) NOT NULL DEFAULT '',
	`iso_provincia` varchar(16) NOT NULL DEFAULT '' COMMENT 'ISO 3166-2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
	`departamento_id` int(16) unsigned NOT NULL,
	`provincia_id` int(16) unsigned NOT NULL COMMENT 'fk.provincias',
	`coordenada_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.coordenadas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`nombre_departamento` varchar(128) NOT NULL,
	`alias_departamento` varchar(16) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `localidades`;
CREATE TABLE IF NOT EXISTS `localidades` (
	`localidad_id` int(16) unsigned NOT NULL,
	`departamento_id` int(16) unsigned NOT NULL COMMENT 'fk.departamentos',
	`coordenada_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.coordenadas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`nombre_localidad` varchar(128) NOT NULL,
	`codigo_postal` varchar(16) NOT NULL DEFAULT '',
	`tel_cod_area` varchar(16) NOT NULL DEFAULT '' COMMENT 'Código de Area Telefónico.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `calles`;
CREATE TABLE IF NOT EXISTS `calles` (
	`calle_id` int(16) unsigned NOT NULL,
	`localidad_id` int(16) unsigned NOT NULL COMMENT 'fk.localidades',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`nombre_calle` varchar(128) NOT NULL,
	`tipo_calle` varchar(128) NOT NULL DEFAULT 'calle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `domicilios`;
CREATE TABLE IF NOT EXISTS `domicilios` (
	`domicilio_id` int(16) unsigned NOT NULL,
	`calle_id` int(16) unsigned NOT NULL COMMENT 'fk.calles',
	`coordenada_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.coordenadas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`altura` varchar(128) NOT NULL DEFAULT '',
	`torre` varchar(128) NOT NULL DEFAULT '',
	`acceso` varchar(128) NOT NULL DEFAULT '',
	`piso` varchar(128) NOT NULL DEFAULT '',
	`dpto` varchar(128) NOT NULL DEFAULT '',
	`agregado` varchar(128) NOT NULL DEFAULT '',
	`observaciones` varchar(128) NOT NULL DEFAULT '',
	`principal` tinyint(1) NOT NULL DEFAULT '0',
	`publicidad` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Acepta (1) o No (0) publicidad por este medio.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
# ##########################################################
DROP VIEW IF EXISTS `view_localidades`;
CREATE TABLE IF NOT EXISTS `view_localidades` (
	`pais_id` int(8) unsigned
	,`provincia_id` int(16) unsigned
	,`departamento_id` int(16) unsigned
	,`localidad_id` int(16) unsigned
	,`nombre_pais` varchar(128)
	,`nombre_provincia` varchar(128)
	,`nombre_departamento` varchar(128)
	,`nombre_localidad` varchar(128)
	,`alias_pais` varchar(4)
	,`alias_provincia` varchar(16)
	,`tel_prefijo` varchar(16)
	,`tel_cod_area` varchar(16)
);

DROP TABLE IF EXISTS `view_localidades`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_localidades` AS (
	select `pa`.`pais_id` AS `pais_id`,`pa`.`nombre_pais` AS `nombre_pais`,`pa`.`iso_alfa3` AS `alias_pais`,`pa`.`tel_prefijo` AS `tel_prefijo`,
		`pr`.`provincia_id` AS `provincia_id`,`pr`.`nombre_provincia` AS `nombre_provincia`,`pr`.`alias_provincia` AS `alias_provincia`,
		`d`.`departamento_id` AS `departamento_id`,`d`.`nombre_departamento` AS `nombre_departamento`,
		`l`.`localidad_id` AS `localidad_id`,`l`.`nombre_localidad` AS `nombre_localidad`,`l`.`tel_cod_area` AS `tel_cod_area`
	from (((`localidades` `l` 
			left join `departamentos` `d` on((`l`.`departamento_id` = `d`.`departamento_id`))) 
			left join `provincias` `pr` on((`d`.`provincia_id` = `pr`.`provincia_id`))) 
			left join `paises` `pa` on((`pr`.`pais_id` = `pa`.`pais_id`)))
);

DROP VIEW IF EXISTS `view_domicilios`;
CREATE TABLE IF NOT EXISTS `view_domicilios` (
	`pais_id` int(8) unsigned
	,`provincia_id` int(16) unsigned
	,`departamento_id` int(16) unsigned
	,`localidad_id` int(16) unsigned
	,`calle_id` int(16) unsigned
	,`domicilio_id` int(16) unsigned
	,`pais` varchar(128)
	,`provincia` varchar(128)
	,`departamento` varchar(128)
	,`localidad` varchar(128)
	,`tipo_calle` varchar(128)
	,`calle` varchar(128)
	,`altura` varchar(128)
	,`piso` varchar(128)
	,`dpto` varchar(128)
	,`alias_pais` varchar(4)
	,`alias_provincia` varchar(16)
	,`tel_prefijo` varchar(16)
	,`tel_cod_area` varchar(16)
);

DROP TABLE IF EXISTS `view_domicilios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_domicilios` AS (
	select `vl`.`pais_id` AS `pais_id`,`vl`.`provincia_id` AS `provincia_id`,
		`vl`.`departamento_id` AS `departamento_id`,`vl`.`localidad_id` AS `localidad_id`,
		`c`.`calle_id` AS `calle_id`,`d`.`domicilio_id` AS `domicilio_id`,
		`vl`.`nombre_pais` AS `pais`,`vl`.`nombre_provincia` AS `provincia`,
		`vl`.`nombre_departamento` AS `departamento`,`vl`.`nombre_localidad` AS `localidad`,
		`c`.`tipo_calle` AS `tipo_calle`,`c`.`nombre_calle` AS `calle`,`d`.`altura` AS `altura`,
		`d`.`piso` AS `piso`,`d`.`dpto` AS `dpto`,`vl`.`alias_pais` AS `alias_pais`,
		`vl`.`alias_provincia` AS `alias_provincia`,
		`vl`.`tel_prefijo` AS `tel_prefijo`,`vl`.`tel_cod_area` AS `tel_cod_area` 
	from ((`domicilios` `d` 
		left join `calles` `c` on((`c`.`calle_id` = `d`.`calle_id`))) 
		left join `view_localidades` `vl` on((`vl`.`localidad_id` = `c`.`localidad_id`)))
);
# ##########################################################
DROP TABLE IF EXISTS `doc_tipos`;
CREATE TABLE IF NOT EXISTS `doc_tipos` (
	`doc_tipo_id` int(16) unsigned NOT NULL,
	`pais_id` int(16) unsigned NOT NULL COMMENT 'fk.paises: Nacionalidad del documento.',
	`genero_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.generos: Genero asociado al documento.',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`nombre` varchar(64) NOT NULL COMMENT 'Nombre con el que se identifica el documento',
	`alias` varchar(64) NOT NULL COMMENT 'Nombre abreviado.',
	`identidad` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Documento de identidad.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
	`documento_id` int(16) unsigned NOT NULL,
	`doc_tipo_id` int(16) unsigned NOT NULL COMMENT 'fk.doc_tipos',
	`persona_id` int(16) unsigned NOT NULL COMMENT 'fk.personas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`numero` int(16) unsigned DEFAULT '0' COMMENT '0:Persona Fisica - 1:Persona Juridica',
	`vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `estados_civiles`;
CREATE TABLE IF NOT EXISTS `estados_civiles` (
	`estado_civil_id` int(16) unsigned NOT NULL,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`nombre` varchar(64) NOT NULL COMMENT 'Nombre con el que se identifica el genero',
	`alias` varchar(64) NOT NULL COMMENT 'Nombre abreviado'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
# ##########################################################
DROP TABLE IF EXISTS `telefonos`;
CREATE TABLE IF NOT EXISTS `telefonos` (
	`telefono_id` int(16) unsigned NOT NULL,
	`persona_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.personas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`codigo_pais` varchar(16) NOT NULL DEFAULT '' COMMENT 'Prefijo Telefónico Internacional',
	`codigo_area` varchar(16) NOT NULL DEFAULT '' COMMENT 'Prefijo Telefónico Zonal',
	`tipo` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:telefono fijo - 1:celular',
	`numero` varchar(32) NOT NULL DEFAULT '',
	`empresa` varchar(128) NOT NULL DEFAULT '',
	`principal` tinyint(1) NOT NULL DEFAULT '0',
	`publicidad` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Acepta(1) o No(0) publicidad por este medio.',
	`about` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
	`email_id` int(16) unsigned NOT NULL,
	`persona_id` int(16) unsigned NOT NULL COMMENT 'fk.personas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`email` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	`principal` tinyint(1) NOT NULL DEFAULT '0',
	`publicidad` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Acepta(1) o No(0) publicidad por este medio.',
	`about` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `webs`;
CREATE TABLE IF NOT EXISTS `webs` (
	`web_id` int(16) unsigned NOT NULL,
	`persona_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.personas',
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`url_web` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	`about` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
# ##########################################################
DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
	`persona_id` int(16) unsigned NOT NULL,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	
	`personeria` int(16) unsigned DEFAULT '0' COMMENT '0:Persona Fisica - 1:Persona Juridica',
	`genero` int(16) unsigned NOT NULL COMMENT '0:Mujer - 1:Hombre',
	`estado_civil_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.domicilios',
	`domicilio_id` int(16) unsigned DEFAULT NULL COMMENT 'fk.estados_civiles',
	
	`nombre` varchar(128) NOT NULL COMMENT 'Nombre o Razon Social',
	`apellido` varchar(128) NOT NULL COMMENT 'Apellido',
	`apellido_materno` varchar(128) NOT NULL COMMENT 'Apellido Materno',
	`nacimiento` date DEFAULT NULL,
	`about` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
# ####################################################################################################################
CREATE TABLE IF NOT EXISTS esteticas (
	id_estetica int(10) unsigned NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`info_obsoleto` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Tenido o no en cuenta',
	
	`persona_id` int(16) unsigned NOT NULL,
	`audit_id` int(16) unsigned NOT NULL,
	
	comision int(11) NOT NULL DEFAULT '10',
	plus_sueldo int(11) NOT NULL DEFAULT '0',
	color_asociado varchar(7) COLLATE utf8_bin NOT NULL COMMENT 'Color en hexa',

	PRIMARY KEY (id_estetica)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=42 ;

CREATE TABLE IF NOT EXISTS empleados (
	id_empleado int(10) unsigned NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`info_obsoleto` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Tenido o no en cuenta',
	
	`persona_id` int(16) unsigned NOT NULL,
	`audit_id` int(16) unsigned NOT NULL,
	
	comision int(11) unsigned NOT NULL DEFAULT '10',
	plus_sueldo int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Sueldo fijo por dia trabajado.',
	
	# carnet_vencimiento 	date DEFAULT NULL, --> es un fk a docu

	PRIMARY KEY (id_empleado)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

CREATE TABLE IF NOT EXISTS pacientes (
	id_paciente int(10) unsigned NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`info_obsoleto` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Tenido o no en cuenta',
	
	`persona_id` int(16) unsigned NOT NULL,
	`audit_id` int(16) unsigned NOT NULL,
	
	detalles varchar(512) COLLATE utf8_bin NOT NULL,
	
	PRIMARY KEY (id_paciente)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1385 ;

CREATE TABLE IF NOT EXISTS contactos (
	id_contacto 	int(10) unsigned NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`info_obsoleto` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Tenido o no en cuenta',
	
	`persona_id` int(16) unsigned NOT NULL,
	`audit_id` int(16) unsigned NOT NULL,

	id_estetica int(10) unsigned NOT NULL COMMENT 'fk.esteticas.id_esteticas',
	detalles varchar(512) COLLATE utf8_bin NOT NULL,
	
	PRIMARY KEY (id_contacto)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;
# ####################################################################################################################
CREATE TABLE IF NOT EXISTS `reservas` ( # ex calendario
	id_reserva int(11) NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`info_obsoleto` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Tenido o no en cuenta',
	`audit_id` int(16) unsigned NOT NULL,
	estado tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:cancelada - 1:activa - 2:finalizada',
	reactivada int(11) NOT NULL DEFAULT '0',
	
	fecha date NOT NULL,
	hr_inicio time NOT NULL,
	hr_fin time NOT NULL,
	
	id_estetica int(11) NOT NULL COMMENT 'fk.esteticas.id_estetica',
	# comision_estetica int(11) NOT NULL, # si se quiere variar la comision por turno, esto va en el turno y no aca
	plus_estetica int(11) NOT NULL, #

	PRIMARY KEY (id_reserva),
	KEY id_estetica (id_estetica),
	KEY fecha (fecha)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=342;

CREATE TABLE IF NOT EXISTS reserva_responsables (
	id_reserva_responsables int(11) NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`audit_id` int(16) unsigned NOT NULL,

	id_reserva int(11) NOT NULL COMMENT 'fk.calendario.id_reserva',
	id_empleado	int(11) NOT NULL COMMENT 'fk.empleados.id_empleado',
	# comision int(11) NOT NULL DEFAULT '0',
	plus int(11) NOT NULL DEFAULT '0',
	
	KEY id_reserva (id_reserva),
	KEY id_empleado (id_empleado)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS egresos (
	id_gasto	int(11) NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`audit_id` int(16) unsigned NOT NULL,

	id_reserva int(11) NOT NULL COMMENT 'fk.calendario',
	id_empleado	int(11) NOT NULL COMMENT 'fk.empleados',

	importe decimal(7,2) NOT NULL,
	descripcion text COLLATE utf8_bin NOT NULL,
	
	PRIMARY KEY (id_gasto),
	KEY id_empleado (id_empleado),
	KEY id_reserva (id_reserva)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=162 ;

CREATE TABLE IF NOT EXISTS turnos (
	id_turno int(10) unsigned NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`audit_id` int(16) unsigned NOT NULL,
	estado_turno int(10) unsigned NOT NULL DEFAULT '1' COMMENT '0:cancelado - 1:otorgado - 2:finalizado - 3:suspendido',
	
	id_reserva int(11) NOT NULL COMMENT 'calendario.fk.id_reserva',
	id_paciente int(11) NOT NULL COMMENT 'pacientes.fk.id_paciente',
	
	hr_inicio time NOT NULL,
	hr_fin time NOT NULL,
	detalles text COLLATE utf8_bin NOT NULL,
	costo int(11) NOT NULL COMMENT 'Costo mencionado al paciente la momento de otorgrar el turno',
	
	PRIMARY KEY (id_turno),
	KEY id_turno (id_turno)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2306;

CREATE TABLE IF NOT EXISTS turnos_pagos (
	id_turno int(11) NOT NULL,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`audit_id` int(16) unsigned NOT NULL,
	
	metodo_de_pago int(11) NOT NULL COMMENT 'metodos_de_pago.fk.id_metodo',
	aumento int(11) NOT NULL,
	importe int(11) NOT NULL,
	
	KEY id_turno (id_turno)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS tratamientos_por_turno (
	id_txt int(11) NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`audit_id` int(16) unsigned NOT NULL,
	
	id_turno int(11) NOT NULL COMMENT 'turnos.fk.id_turno',
	id_tratamiento int(11) NOT NULL COMMENT 'tratamientos.fk.id_tratamiento',
	costo int(11) NOT NULL DEFAULT '0',
	
	comision_estetica int(11) NOT NULL DEFAULT '0',
	
	PRIMARY KEY (id_txt),
	KEY id_turno_indice (id_turno)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3628;

CREATE TABLE IF NOT EXISTS tratamientos_responsables (
	id_txt_resp int(11) NOT NULL AUTO_INCREMENT,
	`info_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado Habilitado',
	`audit_id` int(16) unsigned NOT NULL,
	estado int(11) NOT NULL DEFAULT '1',
	
	id_txt int(11) NOT NULL COMMENT 'tratamientos_por_turno.fk.id_txt',
	id_empleado int(11) NOT NULL COMMENT 'empleados.fk.id_empleado',
	comision int(11) NOT NULL,
	# plus int(11) NOT NULL,
	
	PRIMARY KEY (id_txt,id_empleado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
# ####################################################################################################################


ALTER TABLE `audits` ADD PRIMARY KEY (`audit_id`);
ALTER TABLE `audits`
	MODIFY `audit_id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=755;

ALTER TABLE `coordenadas` 
	ADD PRIMARY KEY (`coordenada_id`);
ALTER TABLE `paises`
	ADD PRIMARY KEY (`pais_id`), 
	ADD KEY `FK_pais` (`coordenada_id`);
ALTER TABLE `provincias`
	ADD PRIMARY KEY (`provincia_id`), 
	ADD KEY `FK_provincia` (`pais_id`), 
	ADD KEY `FK_provincia_1` (`coordenada_id`);
ALTER TABLE `departamentos` 
	ADD PRIMARY KEY (`departamento_id`), 
	ADD KEY `FK_departamento` (`provincia_id`), 
	ADD KEY `FK_departamento_1` (`coordenada_id`);
ALTER TABLE `localidades`
	ADD PRIMARY KEY (`localidad_id`), 
	ADD KEY `FK_localidad` (`departamento_id`), 
	ADD KEY `FK_localidad_1` (`coordenada_id`);
ALTER TABLE `calles` 
	ADD PRIMARY KEY (`calle_id`), 
	ADD KEY `FK_calle` (`localidad_id`);
ALTER TABLE `calles`
	MODIFY `calle_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `domicilios`
	ADD PRIMARY KEY (`domicilio_id`), 
	ADD KEY `FK_domicilio` (`calle_id`), 
	ADD KEY `FK_domicilio_01` (`coordenada_id`);

ALTER TABLE `doc_tipos`
	ADD PRIMARY KEY (`doc_tipo_id`), 
	ADD KEY `FK_doc_tipo_1` (`pais_id`), 
	ADD KEY `FK_doc_tipo_2` (`genero_id`);
ALTER TABLE `documentos`
	ADD PRIMARY KEY (`documento_id`), 
	ADD KEY `FK_documento_1` (`doc_tipo_id`), 
	ADD KEY `FK_documento_2` (`persona_id`);
ALTER TABLE `estados_civiles`
	ADD PRIMARY KEY (`estado_civil_id`);
ALTER TABLE `generos`
	ADD PRIMARY KEY (`genero_id`);

ALTER TABLE `telefonos`
	ADD PRIMARY KEY (`telefono_id`), 
	ADD KEY `FK_telefono` (`persona_id`);
ALTER TABLE `emails`
	ADD PRIMARY KEY (`email_id`), 
	ADD KEY `FK_email` (`persona_id`);
ALTER TABLE `webs`
	ADD PRIMARY KEY (`web_id`), 
	ADD KEY `FK_web` (`persona_id`);

ALTER TABLE `personas`
	ADD PRIMARY KEY (`persona_id`), 
	ADD KEY `FK_persona` (`genero_id`), 
	ADD KEY `FK_persona_1` (`estado_civil_id`), 
	ADD KEY `FK_persona_2` (`domicilio_id`);



ALTER TABLE `coordenadas`
MODIFY `coordenada_id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT de la tabla `coordenadas_audits`
--
ALTER TABLE `coordenadas_audits`
MODIFY `audit_coordenada_id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
MODIFY `departamento_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamentos_audits`
--
ALTER TABLE `departamentos_audits`
MODIFY `audit_departamento_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
MODIFY `documento_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentos_audits`
--
ALTER TABLE `documentos_audits`
MODIFY `audit_documento_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `doc_tipos`
--
ALTER TABLE `doc_tipos`
MODIFY `doc_tipo_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `doc_tipos_audits`
--
ALTER TABLE `doc_tipos_audits`
MODIFY `audit_doc_tipo_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
MODIFY `domicilio_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `domicilios_audits`
--
ALTER TABLE `domicilios_audits`
MODIFY `audit_domicilio_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
MODIFY `email_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `emails_audits`
--
ALTER TABLE `emails_audits`
MODIFY `audit_email_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados_civiles`
--
ALTER TABLE `estados_civiles`
MODIFY `estado_civil_id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estados_civiles_audits`
--
ALTER TABLE `estados_civiles_audits`
MODIFY `audit_estado_civil_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
MODIFY `genero_id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `generos_audits`
--
ALTER TABLE `generos_audits`
MODIFY `audit_genero_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
MODIFY `localidad_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidades_audits`
--
ALTER TABLE `localidades_audits`
MODIFY `audit_localidad_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
MODIFY `pais_id` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT de la tabla `paises_audits`
--
ALTER TABLE `paises_audits`
MODIFY `audit_pais_id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
MODIFY `persona_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas_audits`
--
ALTER TABLE `personas_audits`
MODIFY `audit_persona_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
MODIFY `provincia_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provincias_audits`
--
ALTER TABLE `provincias_audits`
MODIFY `audit_provincia_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
MODIFY `telefono_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `telefonos_audits`
--
ALTER TABLE `telefonos_audits`
MODIFY `audit_telefono_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `webs`
--
ALTER TABLE `webs`
MODIFY `web_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `webs_audits`
--
ALTER TABLE `webs_audits`
MODIFY `audit_web_id` int(16) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calles`
--
ALTER TABLE `calles`
ADD CONSTRAINT `FK_calle` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`localidad_id`);

--
-- Filtros para la tabla `calles_audits`
--
ALTER TABLE `calles_audits`
ADD CONSTRAINT `FK_calles_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `coordenadas_audits`
--
ALTER TABLE `coordenadas_audits`
ADD CONSTRAINT `FK_coordenadas_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
ADD CONSTRAINT `FK_departamento` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`provincia_id`),
ADD CONSTRAINT `FK_departamento_1` FOREIGN KEY (`coordenada_id`) REFERENCES `coordenadas` (`coordenada_id`);

--
-- Filtros para la tabla `departamentos_audits`
--
ALTER TABLE `departamentos_audits`
ADD CONSTRAINT `FK_departamentos_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
ADD CONSTRAINT `FK_documento_1` FOREIGN KEY (`doc_tipo_id`) REFERENCES `doc_tipos` (`doc_tipo_id`),
ADD CONSTRAINT `FK_documento_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`persona_id`);

--
-- Filtros para la tabla `documentos_audits`
--
ALTER TABLE `documentos_audits`
ADD CONSTRAINT `FK_documentos_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `doc_tipos`
--
ALTER TABLE `doc_tipos`
ADD CONSTRAINT `FK_doc_tipo_1` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`pais_id`),
ADD CONSTRAINT `FK_doc_tipo_2` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`genero_id`);

--
-- Filtros para la tabla `doc_tipos_audits`
--
ALTER TABLE `doc_tipos_audits`
ADD CONSTRAINT `FK_doc_tipos_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
ADD CONSTRAINT `FK_domicilio` FOREIGN KEY (`calle_id`) REFERENCES `calles` (`calle_id`),
ADD CONSTRAINT `FK_domicilio_01` FOREIGN KEY (`coordenada_id`) REFERENCES `coordenadas` (`coordenada_id`);

--
-- Filtros para la tabla `domicilios_audits`
--
ALTER TABLE `domicilios_audits`
ADD CONSTRAINT `FK_domicilios_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
ADD CONSTRAINT `FK_email` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`persona_id`);

--
-- Filtros para la tabla `emails_audits`
--
ALTER TABLE `emails_audits`
ADD CONSTRAINT `FK_emails_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `estados_civiles_audits`
--
ALTER TABLE `estados_civiles_audits`
ADD CONSTRAINT `FK_estados_civiles_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `generos_audits`
--
ALTER TABLE `generos_audits`
ADD CONSTRAINT `FK_generos_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
ADD CONSTRAINT `FK_localidad` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`departamento_id`),
ADD CONSTRAINT `FK_localidad_1` FOREIGN KEY (`coordenada_id`) REFERENCES `coordenadas` (`coordenada_id`);

--
-- Filtros para la tabla `localidades_audits`
--
ALTER TABLE `localidades_audits`
ADD CONSTRAINT `FK_localidades_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
ADD CONSTRAINT `FK_pais` FOREIGN KEY (`coordenada_id`) REFERENCES `coordenadas` (`coordenada_id`);

--
-- Filtros para la tabla `paises_audits`
--
ALTER TABLE `paises_audits`
ADD CONSTRAINT `FK_paises_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
ADD CONSTRAINT `FK_persona` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`genero_id`),
ADD CONSTRAINT `FK_persona_1` FOREIGN KEY (`estado_civil_id`) REFERENCES `estados_civiles` (`estado_civil_id`),
ADD CONSTRAINT `FK_persona_2` FOREIGN KEY (`domicilio_id`) REFERENCES `domicilios` (`domicilio_id`);

--
-- Filtros para la tabla `personas_audits`
--
ALTER TABLE `personas_audits`
ADD CONSTRAINT `FK_personas_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
ADD CONSTRAINT `FK_provincia` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`pais_id`),
ADD CONSTRAINT `FK_provincia_1` FOREIGN KEY (`coordenada_id`) REFERENCES `coordenadas` (`coordenada_id`);

--
-- Filtros para la tabla `provincias_audits`
--
ALTER TABLE `provincias_audits`
ADD CONSTRAINT `FK_provincias_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
ADD CONSTRAINT `FK_telefono` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`persona_id`);

--
-- Filtros para la tabla `telefonos_audits`
--
ALTER TABLE `telefonos_audits`
ADD CONSTRAINT `FK_telefonos_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);

--
-- Filtros para la tabla `webs`
--
ALTER TABLE `webs`
ADD CONSTRAINT `FK_web` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`persona_id`);

--
-- Filtros para la tabla `webs_audits`
--
ALTER TABLE `webs_audits`
ADD CONSTRAINT `FK_webs_audits` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`audit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;