<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>{{ Session::get('email') }}</p>
    <a href="/logout">Logout</a>
</body>
</html>
