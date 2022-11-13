-- create database name data_db 
-- import data_db.sql

CREATE TABLE users (
    id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fullname varchar(255) NOT NULL,
    phone varchar(255) NOT NULL,
    address varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (fullname,phone,address) VALUES
    ('John Doe','+254712345678','Kampala'),
    ('Jane Doe','+254712345679','Kampala'),
    ('Sam Doe','+254712345670','Kampala'),
    ('Saman Doe','+254712345671','Kampala'),
    ('John Doe','+254712345678','Kampala'),
    ('Jane Doe','+254712345679','Kampala'),
    ('Sam Doe','+254712345670','Kampala'),
    ('Saman Doe','+254712345671','Kampala'),
    ('John Doe','+254712345678','Kampala'),
    ('Jane Doe','+254712345679','Kampala'),
    ('Sam Doe','+254712345670','Kampala'),
    ('Saman Doe','+254712345671','Kampala'),
    ('John Doe','+254712345678','Kampala'),
    ('Jane Doe','+254712345679','Kampala'),
    ('Sam Doe','+254712345670','Kampala'),
    ('Saman Doe','+254712345671','Kampala'),
    ('John Doe','+254712345678','Kampala'),
    ('Jane Doe','+254712345679','Kampala'),
    ('Sam Doe','+254712345670','Kampala'),
    ('Saman Doe','+254712345671','Kampala'),
    ('Derp Doe','+254712345678','Kampala'),
    ('Jane Doe','+254712345679','Kampala'),
    ('Sam Doe','+254712345670','Kampala'),
    ('Saman Doe','+254712345671','Kampala');




