<!DOCTYPE html>
<html>
<head>
<title>ユーザー登録フォーム</title>
</head>
<body>
<h1>ユーザー登録フォーム</h1>
<form action="/user_account/register/post" method="post">
    <div>
        <label for="login_id">ログインID</label>
        <input type="text" id="login_id" name="login_id">
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <button type="submit">登録</button>
    </div>
</form>
</body>
</html>
