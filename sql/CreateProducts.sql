CREATE TABLE Products (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    description varchar(255),
    type ENUM('small', 'medium', 'large')
);