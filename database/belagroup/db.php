-- ------------------------------------------------------------------
-- Base de datos: belagroup
DROP DATABASE IF EXISTS belagroup;
CREATE DATABASE belagroup;
USE belagroup;

/*CREATE USER 'belag'@'localhost' IDENTIFIED BY 'l@$pr0v1denc1@###';
GRANT ALL PRIVILEGES ON * . * TO 'belag'@'localhost';*/
-- ------------------------------------------------------------------

-- ******************************************************************
-- provincias, departamentos, localidades
-- ------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS provincias (
	id_provincia 		int(2) NOT NULL,
	nombre_provincia 	varchar(50) NOT NULL,
	
	PRIMARY KEY (id_provincia)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS departamentos (
	id_departamento 	int(3) NOT NULL,
	nombre_departamento	varchar(100) NOT NULL,
	
	id_provincia 		int(2) NOT NULL,
	PRIMARY KEY (id_departamento)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS localidades (
	id_localidad 	int(4) NOT NULL,
	nombre_ciudad 	varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	tiene_estetica 	tinyint(1) NOT NULL DEFAULT '0',
	
	id_departamento int(3) NOT NULL,
	PRIMARY KEY (id_localidad)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ******************************************************************

-- ******************************************************************
-- usuarios, esteticas, empleados, pacientes, contactos
-- ******************************************************************
CREATE TABLE IF NOT EXISTS usuarios (
	id_usuario 		int(11) NOT NULL AUTO_INCREMENT,
	estado_usuario	tinyint(1) NOT NULL,
	
	usuario 		varchar(255) COLLATE utf8_bin NOT NULL,
	password 		varchar(255) COLLATE utf8_bin NOT NULL,
	
	tipo_usuario 	int(11) NOT NULL DEFAULT '0' COMMENT 'empleados o esteticas',
	id_asociada		int(11) NOT NULL DEFAULT '0' COMMENT 'fk.empleados.id_empleado o fk.esteticas.id_estetica, segun el tipo indique',
	
	PRIMARY KEY (id_usuario)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Usuarios del sistmea' AUTO_INCREMENT=82 ;

CREATE TABLE IF NOT EXISTS esteticas (
	id_estetica 	int(10) unsigned NOT NULL AUTO_INCREMENT,
	
	fecha_altaCentro date NOT NULL COMMENT 'YYYY-MM-DD',
	fecha_bajaCentro date DEFAULT NULL COMMENT 'YYYY-MM-DD',
	estado_estetica int(11) NOT NULL DEFAULT '1',
	
	plus_sueldo 	int(11) NOT NULL DEFAULT '0',
	comision 		int(11) NOT NULL DEFAULT '10',
	color_asociado 	varchar(7) COLLATE utf8_bin NOT NULL COMMENT 'Color en hexa',
	
	cuit 			int(10) unsigned NOT NULL COMMENT 'Documento Fiscal',
	nombre 			varchar(128) COLLATE utf8_bin NOT NULL,
	
	direccion		varchar(128) COLLATE utf8_bin NOT NULL,
	altura			varchar(128) COLLATE utf8_bin NOT NULL,
	piso			varchar(128) COLLATE utf8_bin NOT NULL,
	dpto			varchar(128) COLLATE utf8_bin NOT NULL,
	barrio			varchar(128) COLLATE utf8_bin NOT NULL,
	id_localidad	int(4) NOT NULL COMMENT 'fk.localidades.id_localidad',
	
	telefono		varchar(128) COLLATE utf8_bin NOT NULL,
	celular			varchar(128) COLLATE utf8_bin NOT NULL,
	email			varchar(128) COLLATE utf8_bin NOT NULL,
	facebook		varchar(128) COLLATE utf8_bin NOT NULL,
	webpage			varchar(128) COLLATE utf8_bin NOT NULL,
	
	creado_por 		int(11) NOT NULL COMMENT 'fk.usuaros.id_usuario',
	
	PRIMARY KEY (id_estetica)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=42 ;

CREATE TABLE IF NOT EXISTS empleados (
	id_empleado 		int(10) unsigned NOT NULL AUTO_INCREMENT,
	fecha_altaEmpleado 	date NOT NULL COMMENT 'YYYY-MM-DD',
	fecha_bajaEmpleado 	date DEFAULT NULL COMMENT 'YYYY-MM-DD',
	
	plus_sueldo 		int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Sueldo fijo por dia trabajado.',
	comision 			int(11) unsigned NOT NULL DEFAULT '10',
	carnet_vencimiento 	date DEFAULT NULL,
	
	dni 				int(10) unsigned NOT NULL COMMENT 'Documento',
	tipo 				varchar(8) COLLATE utf8_bin NOT NULL COMMENT 'Tipo DNI',
	fecha_nacimiento 	date DEFAULT NULL COMMENT 'YYYY-MM-DD',
	nombre 				varchar(128) COLLATE utf8_bin NOT NULL,
	apellido 			varchar(128) COLLATE utf8_bin NOT NULL,
	
	direccion			varchar(128) COLLATE utf8_bin NOT NULL,
	altura				varchar(128) COLLATE utf8_bin NOT NULL,
	piso				varchar(128) COLLATE utf8_bin NOT NULL,
	dpto				varchar(128) COLLATE utf8_bin NOT NULL,
	barrio				varchar(128) COLLATE utf8_bin NOT NULL,
	id_localidad		int(4) NOT NULL COMMENT 'fk.localidades.id_localidad',
	
	telefono			varchar(128) COLLATE utf8_bin NOT NULL,
	celular				varchar(128) COLLATE utf8_bin NOT NULL,
	email				varchar(128) COLLATE utf8_bin NOT NULL,
	facebook			varchar(128) COLLATE utf8_bin NOT NULL,
	
	creado_por 			int(11) NOT NULL COMMENT 'fk.usuaros.id_usuario',
	
	PRIMARY KEY (id_empleado)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

CREATE TABLE IF NOT EXISTS pacientes (
	id_paciente 		int(10) unsigned NOT NULL AUTO_INCREMENT,
	
	fecha_altaPaciente 	date DEFAULT NULL COMMENT 'YYYY-MM-DD',
	fecha_bajaPaciente  date DEFAULT NULL COMMENT 'YYYY-MM-DD',
	estado_paciente 	tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Habilitado. Deshabilitado',
	detalles varchar(512) COLLATE utf8_bin NOT NULL,
	
	dni 				int(10) unsigned NOT NULL COMMENT 'Documento',
	tipo 				varchar(8) COLLATE utf8_bin NOT NULL COMMENT 'Tipo DNI',
	fecha_nacimiento 	date DEFAULT NULL COMMENT 'YYYY-MM-DD',
	nombre 				varchar(128) COLLATE utf8_bin NOT NULL,
	apellido 			varchar(128) COLLATE utf8_bin NOT NULL,
	
	direccion			varchar(128) COLLATE utf8_bin NOT NULL,
	altura				varchar(128) COLLATE utf8_bin NOT NULL,
	piso				varchar(128) COLLATE utf8_bin NOT NULL,
	dpto				varchar(128) COLLATE utf8_bin NOT NULL,
	barrio				varchar(128) COLLATE utf8_bin NOT NULL,
	id_localidad		int(4) NOT NULL COMMENT 'fk.localidades.id_localidad',
	
	telefono			varchar(128) COLLATE utf8_bin NOT NULL,
	celular				varchar(128) COLLATE utf8_bin NOT NULL,
	email				varchar(128) COLLATE utf8_bin NOT NULL,
	facebook			varchar(128) COLLATE utf8_bin NOT NULL,
	
	creado_por 			int(11) NOT NULL COMMENT 'fk.usuaros.id_usuario',
	
	PRIMARY KEY (id_paciente)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1385 ;

CREATE TABLE IF NOT EXISTS contactos (
	id_contacto 	int(10) unsigned NOT NULL AUTO_INCREMENT,
	estado_contacto int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Habilitado. Deshabilitado',
	fecha_altaContacto date NOT NULL,
	
	fecha_nacimiento date DEFAULT NULL COMMENT 'YYYY-MM-DD',
	nombre 			varchar(128) COLLATE utf8_bin NOT NULL,
	apellido 		varchar(128) COLLATE utf8_bin NOT NULL,
	detalles 		varchar(512) COLLATE utf8_bin NOT NULL,
	
	direccion 		varchar(128) COLLATE utf8_bin NOT NULL,
	altura 			varchar(128) COLLATE utf8_bin NOT NULL,
	piso 			varchar(128) COLLATE utf8_bin NOT NULL,
	dpto 			varchar(128) COLLATE utf8_bin NOT NULL,
	barrio 			varchar(128) COLLATE utf8_bin NOT NULL,
	id_localidad 	int(4) NOT NULL COMMENT 'fk.localidades.id_localidad',
	
	telefono		varchar(128) COLLATE utf8_bin NOT NULL,
	celular			varchar(128) COLLATE utf8_bin NOT NULL,
	email			varchar(128) COLLATE utf8_bin NOT NULL,
	facebook		varchar(128) COLLATE utf8_bin NOT NULL,
	webpage			varchar(128) COLLATE utf8_bin NOT NULL,
	
	id_estetica 	int(10) unsigned NOT NULL COMMENT 'fk.esteticas.id_esteticas',
	creado_por 		int(11) NOT NULL COMMENT 'fk.usuaros.id_usuario',
	
	PRIMARY KEY (id_contacto)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;
-- ******************************************************************

-- ******************************************************************
-- metodos_de_pago, tratamientos
-- ------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS metodos_de_pago (
	id_metodo	int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identificaci',
	metodo		varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'Forma de pago.',
	aumento		int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Porcentaje de Aumento.',
	
	PRIMARY KEY (id_metodo)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4;

CREATE TABLE IF NOT EXISTS tratamientos (
	id_tratamiento int(10) unsigned NOT NULL AUTO_INCREMENT,
	estado_tratamiento int(11) NOT NULL DEFAULT '1',
	
	zona varchar(128) COLLATE utf8_bin NOT NULL COMMENT 'Nombre',
	medio varchar(128) COLLATE utf8_bin NOT NULL DEFAULT 'Soprano XL',
	duracion int(10) unsigned DEFAULT NULL COMMENT 'Duración estimada',
	precio int(10) unsigned DEFAULT NULL COMMENT 'Precio aproximado',
	detalles varchar(512) COLLATE utf8_bin NOT NULL,
	
	PRIMARY KEY (id_tratamiento)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=50;
-- ******************************************************************

-- ******************************************************************
-- calendario, reserva_responsables, egresos
-- ------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS calendario (
	id_reserva 			int(11) NOT NULL AUTO_INCREMENT,

	fecha				date NOT NULL,
	hr_inicio 			time NOT NULL,
	hr_fin 				time NOT NULL,
	estado 				tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:cancelada - 1:activa - 2:finalizada',
	reactivada 			int(11) NOT NULL DEFAULT '0',
	
	id_estetica 		int(11) NOT NULL COMMENT 'fk.esteticas.id_estetica',
	comision_estetica	int(11) NOT NULL,
	plus_estetica 		int(11) NOT NULL,
	
	creado_por 			int(11) NOT NULL COMMENT 'fk.usuaros.id_usuario',
	
	PRIMARY KEY (id_reserva),
	KEY id_estetica (id_estetica),
	KEY fecha (fecha)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=342;

CREATE TABLE IF NOT EXISTS reserva_responsables (
	estado 		int(11) NOT NULL DEFAULT '1',
	
	id_reserva	int(11) NOT NULL COMMENT 'fk.calendario.id_reserva',
	id_empleado	int(11) NOT NULL COMMENT 'fk.empleados.id_empleado',
	comision 	int(11) NOT NULL DEFAULT '0',
	plus 		int(11) NOT NULL DEFAULT '0',
	
	KEY id_reserva (id_reserva),
	KEY id_empleado (id_empleado)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS egresos (
	id_gasto	int(11) NOT NULL AUTO_INCREMENT,
	
	anulado 	tinyint(1) NOT NULL DEFAULT '0',
	importe 	decimal(7,2) NOT NULL,
	descripcion text COLLATE utf8_bin NOT NULL,
	
	id_reserva 	int(11) NOT NULL COMMENT 'fk.calendario',
	id_empleado	int(11) NOT NULL COMMENT 'fk.empleados',
	
	PRIMARY KEY (id_gasto),
	KEY id_empleado (id_empleado),
	KEY id_reserva (id_reserva)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=162 ;
-- ******************************************************************

-- ******************************************************************
-- turnos, turnos_pagos, tratamientos_por_turno, tratamientos_responsables
-- ------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS turnos (
	id_turno 		int(10) unsigned NOT NULL AUTO_INCREMENT,
	estado_turno	int(10) unsigned NOT NULL DEFAULT '1' COMMENT '0:cancelado - 1:otorgado - 2:finalizado - 3:suspendido',
	
	fecha_turno 	date NOT NULL,
	hr_inicio 		time NOT NULL,
	hr_fin 			time NOT NULL,
	detalles 		text COLLATE utf8_bin NOT NULL,
	costo 			int(11) NOT NULL COMMENT 'Costo mencionado al paciente la momento de otorgrar el turno',
	
	id_reserva		int(11) NOT NULL COMMENT 'calendario.fk.id_reserva',
	id_estetica 	int(10) unsigned NOT NULL COMMENT 'esteticas.fk.id_estetica - Obsoleto, pertenece a calendario',
	id_paciente 	int(11) NOT NULL COMMENT 'pacientes.fk.id_paciente',
	creado_por 		int(10) NOT NULL COMMENT 'usuarios.fk.id_usuario',
	
	PRIMARY KEY (id_turno),
	KEY id_turno (id_turno)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2306;

CREATE TABLE IF NOT EXISTS turnos_pagos (
	id_turno int(11) NOT NULL,
	
	metodo_de_pago int(11) NOT NULL COMMENT 'metodos_de_pago.fk.id_metodo',
	aumento int(11) NOT NULL,
	importe int(11) NOT NULL,
	
	KEY id_turno (id_turno)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS tratamientos_por_turno (
	id_txt				int(11) NOT NULL AUTO_INCREMENT,
	estado_txt			int(11) NOT NULL DEFAULT '1' COMMENT '0: cancelado - 1:activo',
	
	id_turno 			int(11) NOT NULL COMMENT 'turnos.fk.id_turno',
	id_tratamiento 		int(11) NOT NULL COMMENT 'tratamientos.fk.id_tratamiento',
	costo 				int(11) NOT NULL DEFAULT '0',
	
	comision_estetica 	int(11) NOT NULL DEFAULT '0',
	
	PRIMARY KEY (id_txt),
	KEY id_turno_indice (id_turno)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3628;

CREATE TABLE IF NOT EXISTS tratamientos_responsables (
	estado int(11) NOT NULL DEFAULT '1',
	
	id_txt int(11) NOT NULL COMMENT 'tratamientos_por_turno.fk.id_txt',
	id_empleado int(11) NOT NULL COMMENT 'empleados.fk.id_empleado',
	comision int(11) NOT NULL,
	plus int(11) NOT NULL,
	
	PRIMARY KEY (id_txt,id_empleado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ******************************************************************

	-- ------------------------------------------------------------------
	-- Estructura para la vista gastosxr
	-- ------------------------------------------------------------------
	CREATE VIEW gastosxr AS (
		SELECT egresos.id_reserva AS id_reserva,
			SUM(egresos.importe) AS total_gastos
		FROM egresos
		WHERE egresos.anulado=0
		GROUP BY egresos.id_reserva
	);
	-- ------------------------------------------------------------------
	
	-- ------------------------------------------------------------------
	-- view_esteticas, vista_esteticas, vista_empleados
	-- TABLAS: esteticas, localidades, departamentos, provincias, usuarios, empleados
	-- ------------------------------------------------------------------
	CREATE VIEW view_esteticas AS (
		SELECT usuarios.id_usuario AS id_usuario,
			usuarios.usuario AS usuario,
			usuarios.password AS password,
			usuarios.estado_usuario AS estado_usuario,
			localidades.id_localidad AS id_localidad,
			localidades.nombre_ciudad AS nombre_ciudad,
			departamentos.nombre_departamento AS nombre_departamento,
			provincias.nombre_provincia AS nombre_provincia,
			esteticas.id_estetica AS id_estetica,
			esteticas.cuit AS cuit,
			esteticas.nombre AS nombre,
			esteticas.comision AS comision,
			esteticas.plus_sueldo AS plus_sueldo,
			esteticas.color_asociado AS color_asociado,
			esteticas.direccion AS direccion,
			esteticas.altura AS altura,
			esteticas.piso AS piso,
			esteticas.dpto AS dpto,
			esteticas.barrio AS barrio,
			esteticas.telefono AS telefono,
			esteticas.celular AS celular,
			esteticas.email AS email,
			esteticas.facebook AS facebook,
			esteticas.webpage AS webpage,
			esteticas.fecha_altaCentro AS fecha_altaCentro,
			esteticas.fecha_bajaCentro AS fecha_bajaCentro,
			esteticas.estado_estetica AS estado_estetica,
			esteticas.creado_por AS creado_por 
		FROM esteticas 
			JOIN localidades ON esteticas.id_localidad = localidades.id_localidad 
			JOIN departamentos ON localidades.id_departamento = departamentos.id_departamento
			JOIN provincias ON departamentos.id_provincia = provincias.id_provincia
			JOIN usuarios ON esteticas.id_estetica = usuarios.id_asociada
		WHERE usuarios.tipo_usuario=3
	);
	
	CREATE VIEW vista_esteticas AS ( 
		SELECT usuarios.id_usuario AS id_usuario,
			usuarios.usuario AS usuario,
			usuarios.estado_usuario AS estado_usuario,
			localidades.nombre_ciudad AS nombre_ciudad,
			esteticas.id_estetica AS id_estetica,
			esteticas.cuit AS cuit,
			esteticas.color_asociado AS color_asociado,
			esteticas.nombre AS nombre,
			esteticas.direccion AS direccion,
			esteticas.telefono AS telefono,
			esteticas.email AS email,
			esteticas.facebook AS facebook,
			esteticas.webpage AS webpage,
			esteticas.fecha_altaCentro AS fecha_altaCentro,
			esteticas.fecha_bajaCentro AS fecha_bajaCentro,
			esteticas.celular AS celular,
			esteticas.comision AS comision,
			esteticas.plus_sueldo AS plus_sueldo 
		FROM usuarios 
			JOIN esteticas ON usuarios.id_asociada = esteticas.id_estetica
			JOIN localidades ON localidades.id_localidad = esteticas.id_localidad 
		WHERE usuarios.tipo_usuario = 3
	);
	
	CREATE VIEW vista_empleados AS (
		SELECT usuarios.id_usuario AS id_usuario, 
			usuarios.usuario AS usuario,
			usuarios.password AS password,
			usuarios.id_asociada AS id_asociada,
			usuarios.tipo_usuario AS tipo_usuario,
			usuarios.estado_usuario AS estado_usuario,
			empleados.id_empleado AS id_empleado,
			empleados.dni AS dni,
			empleados.tipo AS tipo,
			empleados.fecha_nacimiento AS fecha_nacimiento,
			empleados.nombre AS nombre,
			empleados.apellido AS apellido,
			empleados.direccion AS direccion,
			empleados.altura AS altura,
			empleados.piso AS piso,
			empleados.dpto AS dpto,
			empleados.barrio AS barrio,
			empleados.id_localidad AS id_localidad,
			empleados.telefono AS telefono,
			empleados.email AS email,
			empleados.facebook AS facebook,
			empleados.fecha_altaEmpleado AS fecha_altaEmpleado,
			empleados.fecha_bajaEmpleado AS fecha_bajaEmpleado,
			empleados.plus_sueldo AS plus_sueldo,
			empleados.celular AS celular,
			empleados.comision AS comision,
			empleados.carnet_vencimiento AS carnet_vencimiento,
			empleados.creado_por AS creado_por 
		FROM usuarios 
			JOIN empleados ON usuarios.id_asociada = empleados.id_empleado
		WHERE usuarios.tipo_usuario!=3
	);
	-- ------------------------------------------------------------------


	-- ------------------------------------------------------------------
	-- turno_ingresos: inigresos brutos por turno
	-- TABLAS: calendario, turnos, turnos_pagos, tratamientos_por_turno, tratamientos_responsables
	-- ------------------------------------------------------------------
	CREATE VIEW turno_ingresos AS (
		SELECT r.id_reserva AS id_reserva,
			r.id_estetica AS id_estetica,
			t.id_turno AS id_turno,
			t.id_paciente AS id_paciente,
			IF ( ISNULL(tp.importe),0,ROUND(SUM(tp.importe),2) ) AS importe_parcial,
			IF ( ISNULL(tp.importe),0,ROUND(SUM(tp.importe+tp.importe*tp.aumento/100),2) ) AS ingresos_brutos 
		FROM calendario r 
			JOIN turnos t ON r.id_reserva = t.id_reserva
			LEFT JOIN turnos_pagos tp ON t.id_turno = tp.id_turno
		WHERE r.estado!=0
			AND t.estado_turno = 2
		GROUP BY t.id_turno
	);
	
	CREATE VIEW turno_tratamientos AS (
		SELECT r.id_reserva AS id_reserva,
			r.id_estetica AS id_estetica,
			t.id_turno AS id_turno,
			t.estado_turno AS estado_turno,
			t.id_paciente AS id_paciente,
			IF ( ISNULL(COUNT(txt.id_txt)),0,COUNT(txt.id_txt) ) AS cant_tratamientos 
		FROM calendario r 
			JOIN turnos t ON r.id_reserva = t.id_reserva
			LEFT JOIN tratamientos_por_turno txt ON t.id_turno = txt.id_turno
		WHERE r.estado!=0 
			AND t.estado_turno!=0
			AND txt.estado_txt=1
		GROUP BY t.id_turno
	);
	
	CREATE VIEW txt_resp_cant AS (
		select txt.id_txt AS id_txt,
			count(tr.id_empleado) AS cant_responsables 
		from calendario r 
			join turnos t on r.id_reserva = t.id_reserva 
			join tratamientos_por_turno txt on t.id_turno = txt.id_turno 
			Join tratamientos_responsables tr on txt.id_txt = tr.id_txt 
		where r.estado!=0 
			and t.estado_turno = 2
			and txt.estado_txt = 1
			and tr.estado = 1 
		group by txt.id_txt 
		order by txt.id_txt
	);
	
		CREATE VIEW txt_resp_dividendos AS (
			select r.id_reserva AS id_reserva,
				r.fecha AS fecha,
				r.id_estetica AS id_estetica,
				t.id_turno AS id_turno,
				txt.id_txt AS id_txt,
				txt.id_tratamiento AS id_tratamiento,
				txt.costo AS costo,
				tr.id_empleado AS id_empleado,
				tr.comision AS comision,
				round(((tr.comision * (txt.costo / trc.cant_responsables)) / 100),2) AS sueldo 
			from calendario r 
				join turnos t on r.id_reserva = t.id_reserva 
				join tratamientos_por_turno txt on t.id_turno = txt.id_turno
				join txt_resp_cant trc on txt.id_txt = trc.id_txt 
				join tratamientos_responsables tr on txt.id_txt = tr.id_txt
			where r.estado!=0
				and t.estado_turno = 2
				and txt.estado_txt = 1
				and tr.estado = 1
			order by r.id_reserva,t.id_turno,txt.id_txt
		);
	
	CREATE VIEW txt_dividendos AS (
		SELECT r.id_reserva AS id_reserva,
			r.id_estetica AS id_estetica,
			t.id_turno AS id_turno,
			txt.id_txt AS id_txt,
			txt.id_tratamiento AS id_tratamiento,
			txt.costo AS costo,
			COUNT(tr.id_empleado) AS cant_responsables,
			IF ( ISNULL(txt.costo),0,ROUND(SUM(tr.comision/100)*(txt.costo/COUNT(tr.id_empleado)),2) ) AS dividendo_empleados,
			IF ( ISNULL(txt.costo),0,ROUND(txt.comision_estetica/100*txt.costo,2) ) AS dividendo_estetica
		FROM calendario r
			JOIN turnos t ON t.id_reserva = r.id_reserva
			JOIN tratamientos_por_turno txt ON txt.id_turno = t.id_turno
			JOIN tratamientos_responsables tr ON tr.id_txt = txt.id_txt
		WHERE r.estado!=0
			AND t.estado_turno=2
			AND txt.estado_txt=1
			AND tr.estado=1
		GROUP BY txt.id_txt
	);
	
		CREATE VIEW turno_dividendos AS (
			SELECT txt_dividendos.id_turno AS id_turno,
				COUNT(txt_dividendos.id_txt) AS cant_tratamientos,
				SUM(txt_dividendos.dividendo_empleados) AS dividendo_empleados,
				SUM(txt_dividendos.dividendo_estetica) AS dividendo_estetica 
			FROM txt_dividendos 
			GROUP BY txt_dividendos.id_turno
		);
	-- ------------------------------------------------------------------
	
		-- ------------------------------------------------------------------
	-- Estructura para la vista view_turnos
	-- ------------------------------------------------------------------
	CREATE VIEW view_turnos AS (
		SELECT r.id_reserva AS id_reserva,
			r.estado AS estado_reserva,
			r.id_estetica AS id_estetica,
			t.id_turno AS id_turno,
			t.estado_turno AS estado_turno,
			t.id_paciente AS id_paciente,
			round (((time_to_sec(t.hr_fin) - time_to_sec(t.hr_inicio)) / 60),0) AS min_turno,
			sec_to_time((round(((time_to_sec(t.hr_fin) - time_to_sec(t.hr_inicio)) / 60),0) * 60)) AS hs_turno,
			if(isnull(sum(tt.cant_tratamientos)),0,sum(tt.cant_tratamientos)) AS cant_tratamientos,
			if(isnull(sum(ti.importe_parcial)),0,sum(ti.importe_parcial)) AS importe_parcial,
			if(isnull(sum(ti.ingresos_brutos)),0,sum(ti.ingresos_brutos)) AS ib_turno,
			if(isnull(sum(ti.ingresos_brutos)),0,round((sum(ti.ingresos_brutos) / ((time_to_sec(t.hr_fin) - time_to_sec(t.hr_inicio)) / 60)),2)) AS ibxm_turno,
			if(isnull(sum(td.dividendo_empleados)),0,sum(td.dividendo_empleados)) AS comision_empleados,
			if(isnull(sum(td.dividendo_estetica)),0,sum(td.dividendo_estetica)) AS comision_estetica 
		FROM calendario r 
			JOIN turnos t ON r.id_reserva = t.id_reserva
			LEFT JOIN turno_ingresos ti ON t.id_turno = ti.id_turno
			LEFT JOIN turno_dividendos td ON t.id_turno = td.id_turno
			LEFT JOIN turno_tratamientos tt ON t.id_turno = tt.id_turno
		WHERE r.estado!=0
			and t.estado_turno!=0
		GROUP BY t.id_turno
	);
	-- ------------------------------------------------------------------
	
	
	-- ------------------------------------------------------------------
	-- Estructura para la vista txr_finalizados
	-- TABLAS: calendario,view_turnos
	-- ------------------------------------------------------------------
	CREATE VIEW txr_finalizados AS (
		select vt.id_reserva AS id_reserva,
			count(distinct vt.id_paciente) AS cant_pacientes,
			count(vt.id_turno) AS cant_turnos,
			if(isnull(sum(vt.cant_tratamientos)),0,sum(vt.cant_tratamientos)) AS cant_tratamientos,
			sum(vt.min_turno) AS min_turnos,sec_to_time((sum(vt.min_turno) * 60)) AS hs_turnos,
			round(((sum(vt.min_turno) * 100) / ((time_to_sec(r.hr_fin) - time_to_sec(r.hr_inicio)) / 60)),2) AS porcentaje,
			if(isnull(sum(vt.importe_parcial)),0,sum(vt.importe_parcial)) AS importe_parcial,
			if(isnull(sum(vt.ib_turno)),0,sum(vt.ib_turno)) AS ib_turno,
			if(isnull((sum(vt.ib_turno) / sum(vt.min_turno))),0,round((sum(vt.ib_turno) / sum(vt.min_turno)),2)) AS ibxm_reserva,
			if(isnull(sum(vt.comision_empleados)),0,sum(vt.comision_empleados)) AS comision_empleados,
			if(isnull(sum(vt.comision_estetica)),0,sum(vt.comision_estetica)) AS comision_estetica 
		from calendario r 
			join view_turnos vt on r.id_reserva = vt.id_reserva
		where vt.estado_turno=2 
		group by vt.id_reserva
	);
	
	CREATE VIEW txr_pendientes AS (
		select vt.id_reserva AS id_reserva,
			count(vt.id_turno) AS cant_turnos,
			sum(vt.min_turno) AS min_turnos,
			sec_to_time((sum(vt.min_turno)*60)) AS hs_turnos,
			round(((sum(vt.min_turno)*100)/((time_to_sec(r.hr_fin)-time_to_sec(r.hr_inicio))/60)),2) AS porcentaje 
		from calendario r
			join view_turnos vt on r.id_reserva = vt.id_reserva
		where vt.estado_turno = 1
		group by vt.id_reserva
	);
	
	CREATE VIEW txr_suspendidos AS (
		select vt.id_reserva AS id_reserva,
			count(vt.id_turno) AS cant_turnos,
			sum(vt.min_turno) AS min_turnos,
			sec_to_time((sum(vt.min_turno) * 60)) AS hs_turnos,
			round(((sum(vt.min_turno) * 100) / ((time_to_sec(r.hr_fin) - time_to_sec(r.hr_inicio)) / 60)),2) AS porcentaje 
		from calendario r 
			join view_turnos vt on r.id_reserva = vt.id_reserva
		Where vt.estado_turno=3
		group by vt.id_reserva
	);
	-- ------------------------------------------------------------------
	
	-- ------------------------------------------------------------------
	-- Estructura para la vista view_reservas
	-- ------------------------------------------------------------------
	CREATE VIEW view_reservas AS (
		select r.id_reserva AS id_reserva,
			r.estado AS estado,
			r.id_estetica AS id_estetica,
			r.fecha AS fecha,
			truncate(((time_to_sec(r.hr_fin) - time_to_sec(r.hr_inicio)) / 60),0) AS min_reserva,
			sec_to_time((time_to_sec(r.hr_fin) - time_to_sec(r.hr_inicio))) AS hs_reserva,
			if(isnull(sum(txr_p.cant_turnos)),0,txr_p.cant_turnos) AS cant_pendientes,
			if(isnull(sum(txr_p.min_turnos)),0,sum(txr_p.min_turnos)) AS min_pendientes,
			if(isnull(sum(txr_p.min_turnos)),sec_to_time(0),sec_to_time((sum(txr_p.min_turnos) * 60))) AS hs_pendientes,
			if(isnull(sum(txr_p.min_turnos)),0,round(((sum(txr_p.min_turnos) * 100) / ((time_to_sec(r.hr_fin) - time_to_sec(r.hr_inicio)) / 60)),2)) AS porcentaje_pendiente,
			if(isnull(sum(txr_f.cant_turnos)),0,txr_f.cant_turnos) AS cant_finalizados,
			if(isnull(sum(txr_f.cant_tratamientos)),0,sum(txr_f.cant_tratamientos)) AS cant_tratamientos,
			if(isnull(sum(txr_f.cant_pacientes)),0,sum(txr_f.cant_pacientes)) AS cant_pacientes,
			if(isnull(sum(txr_f.min_turnos)),0,sum(txr_f.min_turnos)) AS min_finalizados,
			if(isnull(sum(txr_f.min_turnos)),sec_to_time(0),sec_to_time((sum(txr_f.min_turnos) * 60))) AS hs_finalizadas,
			if(isnull(sum(txr_f.min_turnos)),0,round(((sum(txr_f.min_turnos) * 100) / ((time_to_sec(r.hr_fin) - time_to_sec(r.hr_inicio)) / 60)),2)) AS porcentaje_finalizado,
			if(isnull(sum(txr_s.cant_turnos)),0,txr_s.cant_turnos) AS cant_suspendidos,
			if(isnull(sum(txr_s.min_turnos)),0,sum(txr_s.min_turnos)) AS min_suspendidos,
			if(isnull(sum(txr_s.min_turnos)),sec_to_time(0),sec_to_time((sum(txr_s.min_turnos) * 60))) AS hs_suspendidos,
			if(isnull(sum(txr_s.min_turnos)),0,round(((sum(txr_s.min_turnos) * 100) / ((time_to_sec(r.hr_fin) - time_to_sec(r.hr_inicio)) / 60)),2)) AS porcentaje_suspendido,
			if(isnull(sum(txr_f.importe_parcial)),0,sum(txr_f.importe_parcial)) AS importe_parcial,
			if(isnull(sum(txr_f.ib_turno)),0,sum(txr_f.ib_turno)) AS ib_reserva,
			if(isnull((sum(txr_f.ib_turno) / sum(txr_f.min_turnos))),0,round((sum(txr_f.ib_turno) / sum(txr_f.min_turnos)),2)) AS ibxm_reserva,
			if(isnull(sum(txr_f.comision_empleados)),0,sum(txr_f.comision_empleados)) AS comision_empleados,
			if(isnull(sum(txr_f.comision_estetica)),0,sum(txr_f.comision_estetica)) AS comision_estetica,
			if(isnull(gxr.total_gastos),0,gxr.total_gastos) AS total_gastos,
			if(isnull((sum(((txr_f.ib_turno + txr_f.comision_empleados) + txr_f.comision_estetica)) + gxr.total_gastos)),0,(((sum(txr_f.ib_turno) - sum(txr_f.comision_empleados)) - sum(txr_f.comision_estetica)) - gxr.total_gastos)) AS ingreso_neto 
		FROM calendario r 
			LEFT JOIN txr_pendientes txr_p ON r.id_reserva = txr_p.id_reserva
			LEFT JOIN txr_finalizados txr_f ON r.id_reserva = txr_f.id_reserva
			LEFT JOIN txr_suspendidos txr_s ON r.id_reserva = txr_s.id_reserva
			LEFT JOIN gastosxr gxr ON r.id_reserva = gxr.id_reserva
		WHERE r.estado!=0
		GROUP BY r.id_reserva
	);
	-- ------------------------------------------------------------------