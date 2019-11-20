
-- Insert a new user
INSERT INTO `cen4010fal19_g16`.`USERS` (
`idUSERS` ,
`USERSfirstname` ,
`USERSlastname` ,
`USERSemail` ,
`USERSpassword` ,
`USERSremember_token` ,
`USERScreatedAt` ,
`USERSupdatedAt`
)
VALUES (
NULL , 'LUIS GUSTAVO', 'GRUBERT VALENSUELA', 'VALENSUELA@GMAIL.COM', '123456', NULL , '2019-11-10 00:00:00', NULL
);


-- Get the last insert id from new user. 
SELECT idUSERS FROM `USERS` ORDER BY idUSERS DESC LIMIT 1;
