-- create table post 
create table post(
    post_id int AUTO_INCREMENT PRIMARY key,
    title varchar(101), 
    author int NOT NULL, 
    status VARCHAR(1) DEFAULT '1',
    thumbnail varchar(255) 
);