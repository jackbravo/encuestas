CREATE TABLE encuesta_horario (encuesta_id INT, horario_id INT, PRIMARY KEY(encuesta_id, horario_id)) ENGINE = INNODB;
CREATE TABLE area_interes (id INT AUTO_INCREMENT, descripcion VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE producto_interes (id INT AUTO_INCREMENT, descripcion VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE encuesta_area_interes (encuesta_id INT, area_interes_id INT, PRIMARY KEY(encuesta_id, area_interes_id)) ENGINE = INNODB;
CREATE TABLE medio_contacto (id INT AUTO_INCREMENT, descripcion VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE encuesta_medio_contacto (encuesta_id INT, medio_contacto_id INT, PRIMARY KEY(encuesta_id, medio_contacto_id)) ENGINE = INNODB;
CREATE TABLE distribuidor (id INT, name VARCHAR(255), level VARCHAR(50), city VARCHAR(100), state VARCHAR(100), contact1 VARCHAR(100), contact2 VARCHAR(100), contact3 VARCHAR(100), tally INT DEFAULT 0 NOT NULL, performance INT, m1_vp INT, m1_ro INT, m2_vp INT, m2_ro INT, m3_vp INT, m3_ro INT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE encuesta (id INT AUTO_INCREMENT, encuestador_id INT, viewer_id INT, last_dist_id INT, nombre VARCHAR(255) NOT NULL, apellido_p VARCHAR(255) NOT NULL, apellido_m VARCHAR(255) NOT NULL, rfc VARCHAR(50), edad INT NOT NULL, genero VARCHAR(1) NOT NULL, telefono VARCHAR(50) NOT NULL, celular VARCHAR(50), email VARCHAR(255), estado_id INT NOT NULL, ciudad VARCHAR(50) NOT NULL, municipio VARCHAR(50) NOT NULL, colonia VARCHAR(50) NOT NULL, calle VARCHAR(50) NOT NULL, numero VARCHAR(50) NOT NULL, cp INT NOT NULL, created_at DATETIME, updated_at DATETIME, INDEX encuestador_id_idx (encuestador_id), INDEX viewer_id_idx (viewer_id), INDEX last_dist_id_idx (last_dist_id), INDEX estado_id_idx (estado_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE encuesta_producto_interes (encuesta_id INT, producto_interes_id INT, PRIMARY KEY(encuesta_id, producto_interes_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME, updated_at DATETIME, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME, updated_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME, updated_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME, updated_at DATETIME, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME, updated_at DATETIME, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME, updated_at DATETIME, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME, updated_at DATETIME, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE estado (id INT AUTO_INCREMENT, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE horario (id INT AUTO_INCREMENT, descripcion VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE encuesta_horario ADD FOREIGN KEY (horario_id) REFERENCES horario(id) ON DELETE CASCADE;
ALTER TABLE encuesta_horario ADD FOREIGN KEY (encuesta_id) REFERENCES encuesta(id) ON DELETE CASCADE;
ALTER TABLE encuesta_area_interes ADD FOREIGN KEY (encuesta_id) REFERENCES encuesta(id) ON DELETE CASCADE;
ALTER TABLE encuesta_area_interes ADD FOREIGN KEY (area_interes_id) REFERENCES area_interes(id) ON DELETE CASCADE;
ALTER TABLE encuesta_medio_contacto ADD FOREIGN KEY (medio_contacto_id) REFERENCES medio_contacto(id) ON DELETE CASCADE;
ALTER TABLE encuesta_medio_contacto ADD FOREIGN KEY (encuesta_id) REFERENCES encuesta(id) ON DELETE CASCADE;
ALTER TABLE encuesta ADD FOREIGN KEY (viewer_id) REFERENCES sf_guard_user(id);
ALTER TABLE encuesta ADD FOREIGN KEY (last_dist_id) REFERENCES distribuidor(id);
ALTER TABLE encuesta ADD FOREIGN KEY (estado_id) REFERENCES estado(id);
ALTER TABLE encuesta ADD FOREIGN KEY (encuestador_id) REFERENCES sf_guard_user(id);
ALTER TABLE encuesta_producto_interes ADD FOREIGN KEY (producto_interes_id) REFERENCES producto_interes(id) ON DELETE CASCADE;
ALTER TABLE encuesta_producto_interes ADD FOREIGN KEY (encuesta_id) REFERENCES encuesta(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
