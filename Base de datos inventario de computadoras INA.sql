CREATE TABLE TBL_EQUIPOS (
ID_EQUIPO BIGINT PRIMARY KEY auto_increment,
TIPO_EQUIPO VARCHAR (30) NOT NULL,
MARCA_MODELO VARCHAR(30) NOT NULL,
FICHA VARCHAR(10),
INVENTARIO VARCHAR (20),
OFICINA VARCHAR (50),
ESTADO VARCHAR (15),
DISCO_DURO VARCHAR (10),
RAM VARCHAR (10),
OBSERVACIONES VARCHAR (100),
SERVICE_TAG VARCHAR (30)
);
---------------------------------------------------------------------------------------------------------------------
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','4577','4-004998','CENTRAL',
'MAL ESTADO','500 GB','N/T', 'FUENTE DE PODER DEFECTUOSA', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 760','2181','4-001461','CENTRAL',
'BUEN ESTADO','250 GB','4 GB', 'PARA DESCARGAR', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 330','341','4-003650','CENTRAL',
'BUEN ESTADO','160 GB','1 GB', 'PARA DESCARGAR', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 380','N/T_1','4-001142','CENTRAL',
'MAL ESTADO',' ','2 GB', 'PARA DESCARGAR', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 320','5432','4-003529','CENTRAL',
'BUEN ESTADO','80 GB','2 GB', 'PARA DESCARGAR', ' ');
---------------------------------------------------------------------------------------------------------------
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','N/T_2','4-004884','CENTRAL',
'MAL ESTADO','500 GB','2 GB', 'FUENTE DE PODER DEFECTUOSA', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','4762','4-000232','CENTRAL',
'BUEN ESTADO','500 GB','2 GB', ' ', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','4760','4-000238','CENTRAL',
'MAL ESTADO','500 GB','2 GB', 'TARJETA MADRE DEFECTUOSA', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 380','5514','4-000227','CENTRAL',
'BUENO','250 GB','2 GB', 'PARA DESCARGO MEMORIA RAM NO DETECTADA', ' ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','6314','4-0001561','CENTRAL',
'BUENO','500 GB','4 GB', 'MEMORIA RAM NO DETECTADA', ' ');
-----------------------------------------------------------------------------------------------------------------
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','6310','4-001564','CENTRAL',
'MAL ESTADO',' ','3 GB', 'DISCO DURO MALO CODIGO ERROR 2000-142', '52F15V1');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/GENERICO','5586','4-004856',' ',
'DESCARGADO',' ',' ', 'MAL ESTADO/INSERVIBLE', 'N/T');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 760','4761','4-004856',' ',
'DESCARGADO',' ',' ', 'MAL ESTADO/INSERVIBLE', 'DMYW0L1');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 380','3095','4-001133','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIBLE', '4ZP4KM1(10865649241)');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','6390','4-0001561','CENTRAL',
'DESCARGADO','','', 'MAL ESTADO/INSERVIBLE', '52DD65V1');
--------------------------------------------------------------------------------------------------------------------
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX','6290','','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIBLE', '52D65V1 ');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 3780','893','4-000315','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIBLE', 'FV9ZDP1');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 380','5630','4-000349','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', '10855524889(4ZJ3KM1)');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 790','5002','4-004412','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', '8PNJMM1');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 330','1735','4-000346','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', '4Z62KMI');
-------------------------------------------------------------------------------------------------------------------------
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 380','1552','4-000370','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', '7596612325');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/OPTIPLEX 380','6577','4-000314','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', '3HNRRL17598198629');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','HP/TPC-Q969-24','8518','','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', 'CA-IM1207P');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','SIN MARCA/SIN MODELO','6894','4-006350','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', 'SIN SERIE');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','SIN MARCA/SIN MODELO0','6893','4-006350','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', 'DQSY7AL0026F6B01');
------------------------------------------------------------------------------------------------------------------------------
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','ACER/ASPIRE ZC-605','6773','','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', 'DQSY7AL0026F6B01');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/380','6667','4-001124','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', '4ZN3KM1');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','HP/500 BMT','6638','N/T','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', 'MY80450D3P');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','HP PAVILION P6000/500 BMT','6635','4-005133','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', 'MX80441H78');
INSERT INTO TBL_EQUIPOS (TIPO_EQUIPO , MARCA_MODELO,FICHA, INVENTARIO, OFICINA, ESTADO,
DISCO_DURO,RAM, OBSERVACIONES,SERVICE_TAG) values('CPU','DELL/755','4811','','',
'DESCARGADO','','', 'MAL ESTADO/INSERVIVLE', '93WH1GI');
---------------------------------------------------------------------------------------------------------------------------------

---------------------------------------------------------------------------------------------------------------------------------
