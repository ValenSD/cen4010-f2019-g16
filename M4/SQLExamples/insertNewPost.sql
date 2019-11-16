-- get the next id from table POSTS;

SELECT `auto_increment`
FROM INFORMATION_SCHEMA.TABLES
WHERE table_name = 'POSTS'
LIMIT 0 , 30

-- insert into POSTS to get the last inserted ID;
INSERT INTO `cen4010fal19_g16`.`POSTS` (
`idPOSTS` ,
`POSTScreatedAt` ,
`POSTSupdatedAt` ,
`USERS_idUSERS`
)
VALUES (
NULL , '2019-11-10 00:00:00', NULL , '1'
);

-- GET THE LAST INSERTED ID FROM POSTS
SELECT idPOSTS
FROM `POSTS`
ORDER BY idPOSTS DESC
LIMIT 1

-- insert the message using the POSTS id from the previous query.
INSERT INTO `cen4010fal19_g16`.`POSTMESSAGES` (
`idPOSTMESSAGES` ,
`POSTMESSAGESmsg` ,
`POSTMESSAGEScreatedAt` ,
`POSTMESSAGESupdatedAt` ,
`POSTS_idPOSTS`
)
VALUES (
NULL , 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-11-10 00:00:00', NULL , '1'
);

-- insert the imagem path using the POSTS id from the previous query
INSERT INTO `cen4010fal19_g16`.`POSTSIMGPATH` (
`idPOSTSIMGPATH` ,
`POSTSIMGPATHpath` ,
`POSTSIMGPATHcreatedAt` ,
`POSTSIMGPATHupdatedAt` ,
`POSTS_idPOSTS`
)
VALUES (
NULL , 'file_13413432432.jpg', '2019-11-10 00:00:00', NULL , '1'
);

