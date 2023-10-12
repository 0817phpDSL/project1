CREATE table challenge_information (
c_id INT AUTO_INCREMENT,
l_id INT,
c_name VARCHAR(30) NOT NULL,
l_name VARCHAR(100) NOT NULL,

PRIMARY KEY (c_id, l_id));