SELECT USERS.USERSfirstname, USERS.USERSlastname, POSTS.POSTScreatedAt, POSTMESSAGES.POSTMESSAGESmsg, POSTSIMGPATH.POSTSIMGPATHpath
FROM USERS, POSTS, POSTMESSAGES, POSTSIMGPATH
WHERE POSTS.IDPOSTS = POSTMESSAGES.POSTS_IDPOSTS
AND POSTS.idPOSTS = POSTSIMGPATH.POSTS_idPOSTS
AND POSTS.USERS_idUSERS = USERS.idUSERS
LIMIT 0 , 30