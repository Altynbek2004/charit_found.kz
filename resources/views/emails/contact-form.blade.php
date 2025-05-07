<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новое сообщение с контактной формы</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4a90e2;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .info-row {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
        }
        .message-box {
            background-color: white;
            border: 1px solid #ddd;
            padding: 15px;
            margin-top: 15px;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>Новое сообщение с контактной формы</h2>
</div>

<div class="content">
    <div class="info-row">
        <span class="label">Имя:</span> {{ $name }}
    </div>

    <div class="info-row">
        <span class="label">Email:</span> {{ $email }}
    </div>

    @if(!empty($phone))
        <div class="info-row">
            <span class="label">Телефон:</span> {{ $phone }}
        </div>
    @endif

    <div class="info-row">
        <span class="label">Тема:</span> {{ $subjectType }}
    </div>

    <div class="info-row">
        <span class="label">Сообщение:</span>
        <div class="message-box">
            {!! nl2br(e($userMessage )) !!}
        </div>
    </div>
</div>

<div class="footer">
    <p>Это сообщение было отправлено с контактной формы вашего сайта.</p>
</div>
</body>
</html>
