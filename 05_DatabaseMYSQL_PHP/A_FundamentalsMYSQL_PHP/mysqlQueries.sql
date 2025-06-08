

INSERT INTO users(username,pwd, email) VALUES('cyberaditya', 'cyberaditya@123', 'adityadubey793@gmail.com');
INSERT INTO users(username,pwd, email) VALUES('aditya', 'dcadityadubey107139@jaimatadi', 'adityadubey@gmail.com');

INSERT INTO comments(username, comment_text,users_id) VALUES('cyberaditya', 'Hello World!', 1);
INSERT INTO comments(username, comment_text,users_id) VALUES('aditya', 'Thank you Universe!', 2);


-- Select query that will provide username, email, comment_text and comment time by particular user (say 1)
SELECT users.username, users.email, comments.comment_text FROM users INNER JOIN comments ON users.id = comments.users_id;