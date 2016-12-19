<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <base href="<?php echo site_url();?>">
</head>
<body>
    <h1>用户注册</h1>
    <form action="user/regist" method="post">
        用户名: <input type="text" name="username"><span id="tip"></span><br>
        密码: <input type="password" name="password"><br>
        <input type="submit" value="注册">
    </form>

    <script src="js/jquery-1.12.4.min.js"></script>
    <script>
        var $un = $("input[name=username]");
        var $tip = $("#tip");
        var $reg = $("input[type=submit]");
        $un.on("blur", function(){
            $.get("user/check_username", {
                "username" : $un.val().trim()
            }, function(res){
                if(res == "no"){
                    $tip.html("用户名已存在");
                    $reg.attr("disabled", true);
                }else{
                    $tip.html("用户名可以使用");
                    $reg.removeAttr("disabled");
                }
            }, "text");
        });

    </script>
</body>
</html>