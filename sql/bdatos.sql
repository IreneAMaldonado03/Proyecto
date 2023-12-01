drop database if exists `registro_pw`;
create schema  if not exists `registro_pw` default  character set utf8 collate  utf8_spanish2_ci;
USE `registro_pw`; 

CREATE TABLE  `registro`(
`id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,  
`nombre` text not null,
`pass` text not null,
`email` text not null
)engine=Innodb default charset=utf8;

insert into `registro`(`nombre`,`pass`,`email`)values('Aaron Velasco','ICO321','aaron@gmail.com');
insert into `registro`(`nombre`,`pass`,`email`)values('Irene Maldonado','ICO123','irene@gmail.com');
insert into `registro`(`nombre`,`pass`,`email`)values('Juan Pérez','IID123','juan@gmail.com');
insert into `registro`(`nombre`,`pass`,`email`)values('María Hernández','IM980','maria@gmail.com');
insert into `registro`(`nombre`,`pass`,`email`)values('José García','CR7','jose@gmail.com');