<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="<?php echo site_url()?>">
</head>
<body>
    <h1>当前登录用户为:
        <?php echo $this->session->userdata('userinfo')-> username; ?>

<!--        --><?php //echo get_cookie("userid")  ?>
    </h1>
    <h3>用户列表:</h3>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>密码</td>
            <td>课程名程</td>
            <td>修改</td>
            <td>删除</td>
        </tr>
            <?php
                foreach ($users as $user){

            ?>
                    <tr>
                        <td><?php echo $user -> id?></td>
                        <td><?php echo $user -> username?></td>
                        <td><?php echo $user -> password?></td>
                        <td><?php echo $user -> coursename?></td>
                        <td><a href="user/update_user?user_id=<?php echo $user -> id ?>">修改</a></td>
                        <td><a href="user/delete_user?user_id=<?php echo $user -> id ?>">删除</a></td>
                    </tr>
            <?php
                }

            ?>

    </table>



</body>
</html>