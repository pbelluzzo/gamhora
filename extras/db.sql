USE gamhora;

CREATE TABLE TBL_USERS (
  usr_id INT(6) AUTO_INCREMENT PRIMARY KEY,
  usr_name VARCHAR(100) NOT NULL,
  usr_password VARCHAR(100) NOT NULL,
  usr_email VARCHAR(50) UNIQUE NOT NULL,
  usr_isAdmin TINYINT(1) NOT NULL DEFAULT 0
);

CREATE TABLE TBL_ROLE (
  rle_id INT (6) AUTO_INCREMENT PRIMARY KEY,
  rle_description VARCHAR (36) NOT NULL  
);

CREATE TABLE TBL_USER_ROLE (
  url_id INT(6) AUTO_INCREMENT PRIMARY KEY,
  url_user_id INT (6) NOT NULL,
  url_role_id INT (6) NOT NULL,
  FOREIGN KEY (url_user_id) REFERENCES TBL_USERS (usr_id),
  FOREIGN KEY (url_role_id) REFERENCES TBL_ROLE (rle_id)
);

CREATE TABLE TBL_PROJECT (
  prj_id INT(6) AUTO_INCREMENT PRIMARY KEY,
  prj_title VARCHAR(100) NOT NULL,
  prj_description VARCHAR(240) NOT NULL,
  prj_genre VARCHAR(100) NOT NULL,
  prj_author_id INT(6) NOT NULL,
  prj_budget DECIMAL(10,2),
  prj_start_date DATE NOT NULL,
  prj_expected_end_date DATE,
  prj_hours INT(8),
  prj_hours_done INT(8),
  prj_situation TINYINT(1) NOT NULL DEFAULT 0,
  FOREIGN KEY (prj_author_id) REFERENCES TBL_USERS(usr_id)
);

CREATE TABLE TBL_TASKS (
  tsk_id INT(6) AUTO_INCREMENT PRIMARY KEY,
  tsk_project_id INT(6) NOT NULL,
  tsk_user_id INT(6),
  tsk_role_id INT (6),
  tsk_title VARCHAR(100) NOT NULL,
  tsk_description VARCHAR(240) NOT NULL,
  tsk_hours INT(6) NOT NULL,
  tsk_hours_done INT(6) NOT NULL,
  tsk_creator INT (6) NOT NULL,
  tsk_situation TINYINT(1) NOT NULL DEFAULT 0,
  tsk_end_date DATE,

  FOREIGN KEY (tsk_project_id) REFERENCES TBL_PROJECT(prj_id),
  FOREIGN KEY (tsk_user_id) REFERENCES TBL_USERS(usr_id),
  FOREIGN KEY (tsk_role_id) REFERENCES TBL_ROLE(rle_id),
  FOREIGN KEY (tsk_creator) REFERENCES TBL_USERS(usr_id)
)