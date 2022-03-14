<html>
<head></head>
<body>
<div style="display: table; width: 100%; text-align: center; height: 40px; background: #f2f2f2; color: #000; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;">Новый отзыв от автомата!</div>
</div>

<div style="display: table; width: 100%; text-align: center; height: 40px; background: #f2f2f2; color: #000; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;">Пользователь: {{ $sender['name'] }}</div>
    <div style="display: table-cell; vertical-align: middle;">Email: {{ $sender['email'] }}</div>
    <div style="display: table-cell; vertical-align: middle;">Сообщение: {{ $sender['message'] }}</div>
    <div style="display: table-cell; vertical-align: middle;">P.S Леха лох</div>
</div>
</body>
</html>
