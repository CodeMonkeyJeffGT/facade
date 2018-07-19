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
DROP TABLE IF EXISTS user;
CREATE TABLE user(
  type_no int(11) not null,
  work_id int(18) NOT NULL PRIMARY KEY,
  job_id  int(11)  NOT NULL,
  name   varchar(20) NOT NULL,
  telphone varchar(11) NOT NULL,
  email varchar(30) NOT NULL,
  password varchar(255) NOT NULL,
 FOREIGN KEY (job_id) REFERENCES job_info(id),
 FOREIGN KEY (type_no) REFERENCES type(no)
) 
INSERT INTO `user` VALUES ('1','2016214356', '1','杜雨霖','15663771301', '787999749@qq.com', '123456');

DROP TABLE IF EXISTS job_info;
CREATE TABLE job_info (
  id int(11) NOT NULL AUTO_INCREMENT,
  job_name varchar(20) NOT NULL,
  PRIMARY KEY (id)
) 

INSERT INTO `job_info` VALUES ('1', '后台开发工程师');
INSERT INTO `job_info` VALUES ('2', '产品运维师');
INSERT INTO `job_info` VALUES ('3', '前端开发工程师');

DROP TABLE IF EXISTS type;
CREATE TABLE type (
  no int(11) NOT NULL AUTO_INCREMENT,
  role_name varchar(30) NOT NULL,
  PRIMARY KEY (no)
) 
INSERT INTO type  VALUES (0, 'normal_user');
INSERT INTO type  VALUES (1, 'admin');
