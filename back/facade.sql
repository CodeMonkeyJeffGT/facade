# 将所有创建表/修改表结构的 sql 语句放在这

# 例：
# # 2018-07-18 05:38
# CREATE TABLE `user` (
#     `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
#     `account` VARCHAR(32) NOT NULL,
# );
#
# # 2018-07-18 05:40
# ALTER TABLE `user` ADD `password` VARCHAR(64) NOT NULL;

/*权限表 权限号，权限名*/
drop table if exists type;
create table type (
  type_no int(11) not null primary key,
  role_name varchar(30) not null,
) 

/*职位表 职位号，职位名*/
drop table if exists job_info;
create table job_info (
  id int(11) not null primary key,
  job_name varchar(20) not null,
)

/*用户表 用户信息*/
drop table if exists user;
create table user(
  type_no int(11) not null,
  work_id int(18) not null primary key,
  job_id  int(11)  not null,
  name varchar(20) not null,
  telphone varchar(11) not null,
  email varchar(30) not null,
  password varchar(255) not null
) 

insert into type  values (0, 'normal_user');
insert into type  values (1, 'admin');

insert into job_info values ('1', '后台开发工程师');
insert into job_info values ('2', '产品运维师');
insert into job_info values ('3', '前端开发工程师');

insert into user values('1','2016214356', '1','杜雨霖','15663771301','787999749@qq.com','123456');
insert into user values('1','2016224414','1','赵桐','15663601130','531784003@qq.com','123456');

/*项目表*/
drop table if exists project;
create table project(
project_no int(11) not null primary key,
project_name varchar(20) not null,
project_content varchar(100) not null
)

/*项目成员*/
create table project_member(
project_no int(11) not null,
position int(11) not null,
work_id int(18) not null,
primary key (work_id,project_no),
foreign key (project_no) references project(project_no),
foreign key (position) references job_info(id),
foreign key (work_id) references user(work_id)
)