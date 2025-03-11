<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение электронной почты</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .button {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Подтвердите свою электронную почту</h1>
        <p>Здравствуйте, {{ $user->name }}</p>
        <p>Спасибо за регистрацию на нашем сайте аренды домиков! Чтобы завершить процесс, пожалуйста, подтвердите свой адрес электронной почты, нажав на кнопку ниже.</p>
        <a href="{{ $confirmationUrl }}" class="button">Подтвердить электронную почту</a>
        <p>Если кнопка не работает, вы можете скопировать и вставить следующий URL в браузер:</p>
        <p><a href="{{ $confirmationUrl }}">{{ $confirmationUrl }}</a></p>
        <div class="footer">
            <p>Если вы не регистрировались на нашем сайте, просто игнорируйте это письмо.</p>
            <p>С уважением,<br>Команда аренды домиков</p>
        </div>
    </div>
</body>
</html>
