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


##2018-7-21 13:38 sql2.0

#用户信息表
 CREATE TABLE `user` (
  `id` int(10) NOT NULL auto_increment,
  `role_id` int(11) NOT NULL, # 0代表普通用户 1代表管理员
  `account` int(18) NOT NULL,
  `job_id` int(11) NOT NULL,   # 1代表后台工程师 2代表产品经理 3前端开发工程师
  `name` varchar(20) NOT NULL,
  `telphone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8        

insert into user values(null,'1','2016214356', '1','杜雨霖','15663771301','787999749@qq.com','123456');
insert into user values(null,'1','2016224414','1','赵桐','15663601130','531784003@qq.com','123456');                                                                                                       

#项目表                                                                              
 CREATE TABLE `project` (
  `pno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,  #图片路径
  PRIMARY KEY  (`pno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 

INSERT into project VALUES (1,'知派',' ',' ');

#项目成员表
 CREATE TABLE `member` (
  `pno` int(10) NOT NULL,
  `id` int(10) NOT NULL,   #项目成员号
  `duty` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`,`pno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

INSERT into member VALUES (1,20154321,'后台');

#2018年7月25日22:06:36
CREATE TABLE `user` (
  `id` int(10) NOT NULL auto_increment,
  `role` int(11) NOT NULL COMMENT '0代表普通用户，1代表管理员',
  `account` int(18) NOT NULL,
  `job_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `telphone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `index_acc` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `project` (
  `id` int(10) NOT NULL auto_increment,
  `pno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `index_pno` USING BTREE (`pno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `member` (
  `id` int(10) NOT NULL auto_increment,
  `pno` int(10) NOT NULL,
  `u_id` int(10) NOT NULL COMMENT '项目成员号',
  `duty` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `pno_index` USING BTREE (`pno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='职位表；\r\n职位'

CREATE TABLE `file` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL,
  `time` varchar(20) NOT NULL,
  `f_id` int(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `index_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

