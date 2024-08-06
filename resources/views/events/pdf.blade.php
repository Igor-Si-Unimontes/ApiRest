
<!DOCTYPE html>
<html>
<head>
    <title>Event PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            line-height: 1.6;
        }
        .content h2 {
            margin: 0 0 10px 0;
            padding: 0;
            border-bottom: 1px solid #333;
        }
        .content p {
            margin: 0 0 10px 0;
            padding: 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Ficha do Evento</h1>
        </div>
        <div class="content">
            <h2>Título do Evento</h2>
            <p>{{ $event->title }}</p>
            
            <h2>Descrição</h2>
            <p>{{ $event->description }}</p>
            
            <h2>Data</h2>
            <p>{{ $event->date }}</p>
            
            <h2>Localização</h2>
            <p>{{ $event->location }}</p>
        </div>
        <div class="footer">
            <p>Pdf gerado por Igor Vitorio</p>
        </div>
    </div>
</body>
</html>
