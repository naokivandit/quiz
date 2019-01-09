drop database if exists mzsoft;
create database mzsoft default character set utf8 collate utf8_general_ci;
grant all on mzsoft.* to 'testuser'@'localhost' identified by 'testpass';
use mzsoft;

create table t_mzsoft_score (
i_mzsoft_id int auto_increment primary key,
v_mzsoft_name varchar(255) not null,
i_correct_anser_number int not null,
dt_created datetime default current_timestamp
);

insert into t_mzsoft_score (v_mzsoft_name, i_correct_anser_number) values('testuer', 25);
insert into t_mzsoft_score (v_mzsoft_name, i_correct_anser_number) values('testuer', 24);
insert into t_mzsoft_score (v_mzsoft_name, i_correct_anser_number) values('testuer', 20);