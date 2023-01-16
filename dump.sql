CREATE DATABASE IF NOT EXISTS salon_db;
USE salon_db;
CREATE TABLE IF NOT EXISTS clients
(
    id_client   INT AUTO_INCREMENT PRIMARY KEY,
    fio         VARCHAR(255) NOT NULL,
    mob_telefon VARCHAR(25)  NOT NULL,
    phonetic    VARCHAR(30)  NOT NULL,
    address     VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS contacts
(
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    e_mail    VARCHAR(100) NOT NULL,
    telegram  VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS group_services
(
    id_group_services INT AUTO_INCREMENT PRIMARY KEY,
    name_of_services  VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS positions
(
    id_positions      INT AUTO_INCREMENT PRIMARY KEY,
    name_of_job_title VARCHAR(255) NOT NULL,
    services_group    INT          NOT NULL,
    `schedule`        VARCHAR(255) NOT NULL,

    CONSTRAINT positions_group_services_id_group_services_fk
        FOREIGN KEY (services_group) REFERENCES group_services (id_group_services)
);

CREATE TABLE IF NOT EXISTS employee
(
    id_employee int auto_increment primary key,
    surname     varchar(255) not null,
    `name`      varchar(255) not null,
    middle_name varchar(255) not null,
    job_title   int          not null,
    address     varchar(255) not null,
    mob_telefon varchar(20)  not null,
    constraint employee_positions_id_positions_fk
        foreign key (job_title) references positions (id_positions)
);



CREATE TABLE IF NOT EXISTS services
(
    id_services     INT AUTO_INCREMENT PRIMARY KEY,
    name_of_service VARCHAR(120) NOT NULL,
    employee        INT          NOT NULL,
    price           VARCHAR(120) NOT NULL,
    group_service   INT          NOT NULL,

    CONSTRAINT services_employee_id_employee_fk
        FOREIGN KEY (employee) REFERENCES employee (id_employee),
    CONSTRAINT services_group_services_id_group_services_fk
        FOREIGN KEY (group_service) REFERENCES group_services (id_group_services)

);

CREATE TABLE IF NOT EXISTS visits
(
    id_visitor       INT AUTO_INCREMENT PRIMARY KEY,
    id_client        INT         NOT NULL,
    id_services      INT         NOT NULL,
    id_employee      INT         NOT NULL,
    `date`           DATE        NOT NULL,
    `time`           VARCHAR(10) NOT NULL,
    service_rendered VARCHAR(20) NOT NULL,
    CONSTRAINT visit_client_id_client_fk
        FOREIGN KEY (id_client) REFERENCES clients (id_client),
    CONSTRAINT visit_services_id_services_fk
        FOREIGN KEY (id_services) REFERENCES services (id_services),
    CONSTRAINT visit_employee_id_employee_fk
        FOREIGN KEY (id_employee) REFERENCES employee (id_employee)
);


