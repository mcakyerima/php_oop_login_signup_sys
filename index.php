<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="nav">
        <ul>
            <li>home</li>
            <li>about us</li>
            <li>contact</li>
            <li>sign in</li>
        </ul>
    </nav>
    <div class="container">
        <div class="register">
            <h4>sign up</h4>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" class="name"  placeholder="user_name" name="uid">
                <input type="email" class="password" placeholder="email" name="email">
                <input type="password" placeholder="password" class="password" name="pwd">
                <input type="password" placeholder="Repeat password" name="pwdRepeat" class="password">
                <br>
                <button type="submit" name="submit" >sign up</button>
            </form>
        </div>
        <div class="login">
            <h4>login</h4>
            <form action="includes/login.inc.php" method="post">
                <input type="text" class="name"  placeholder="username" name="uid">
                <input type="email" class="password" placeholder="email" name="pwd">
                <br>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
