<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="<?php echo site_url(); ?>">
</head>
<body>
    <h1>用户登录</h1>
    <form action="user/login" method="post">
    
    用户名: <input type="text" name="username"><br>
    密码: <input type="password" name="password"><br>
        <input type="submit" value="登录">
        <input type="button" value="注册" onclick="window.location.href='user/regist_page'">
    </form>

    
</body>
</html>