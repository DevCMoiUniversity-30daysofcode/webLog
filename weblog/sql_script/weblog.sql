SELECT * FROM weblog.categories;
INSERT INTO categories(category) VALUE('Life');
SELECT * FROM categories;
INSERT INTO categories(category) VALUE('Work');
INSERT INTO categories(category) VALUE('Music');
INSERT INTO categories(category) VALUE('Food');


DESCRIBE entries;
SHOW TABLES;
SELECT * FROM entries;

INSERT INTO entries(cat_id, date_posted, subject, body)
VALUES('1',NOW(), 'welcome to my blog', 'This is my forst entry in my brand new blog.');
SELECT * FROM entries;

INSERT INTO entries(cat_id, date_posted, subject, body)
	VALUES('1', NOW(), 'great blog','keep in touch this is all going to be cool');
SELECT * FROM entries;

DESCRIBE comments;
INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('1', NOW(), 'Bob', 'Welcome!');
INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('1', NOW(), 'Jim', 'Hope you have a lot of fun!');
SELECT * FROM comments;
SELECT * FROM comments;

SHOW TABLES;
INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('2', NOW(), 'Washingtone','Nice blog you got ther');
INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('2', NOW(), 'Ohuru','write anything!');
INSERT INTO entries(cat_id, date_posted, subject, body)
	VALUES('1', NOW(), 'How i plan to host it', 'i will ensure this blog is hosted 
    on a production server');
INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('3', NOW(), 'washingtone','great idea soso!!');
INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('3', NOW(), 'Jeff Mbai','i think its going to be great!');
INSERT INTO entries(cat_id, date_posted, subject, body)
	VALUES('1', NOW(), 'Class attendance', 'many people did not come to class today, why?');
INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('4', NOW(), 'Jeff Mbai','i think its going to be great!');
    
INSERT INTO entries(cat_id, date_posted, subject, body)
	VALUES('2', NOW(), 'Lavin', 'my full name is Lavin Avinj');

INSERT INTO comments(entry_id, date_posted, name, comment)
	VALUES('5', NOW(), 'Jeff Mbai', 'Are you sure');
	CREATE TABLE admin(
		id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        first_name VARCHAR(45) NOT NULL,
        surname VARCHAR(45) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE,
        username VARCHAR(45) NOT NULL UNIQUE,
        password VARCHAR (20) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8;
        
    
    
INSERT INTO entries(cat_id, date_posted, subject, body)
	VALUES('2', NOW(), 'MOI UNIVERSITY', 'The foundation of knowledge');