<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
</head>
<body>
    <h1>{{ $data['subject'] }}</h1>
    <p>Olá!</p>
    <p>Você recebeu uma mensagem de <strong>{{ $data['adminName'] }}</strong> ({{ $data['adminEmail'] }}):</p>
    <p>{{ $data['message'] }}</p>
    <p>Atenciosamente,<br>Equipe TechMarket</p>
</body>
</html>