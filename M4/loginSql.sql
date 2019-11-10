-- sql used to validate the user login. It returns the userId that will be used in the other sql statements
SELECT USERS.idUSERS
FROM USERS
WHERE USERS.USERSemail LIKE 'valensuela@gmail.com'
AND USERS.USERSpassword = '123456'
LIMIT 0 , 30