<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Contactbericht</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { width: 90%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { font-size: 24px; color: #333; }
        .content { margin-top: 20px; }
        .field { margin-bottom: 10px; }
        .field strong { color: #555; }
        .message { margin-top: 20px; padding: 15px; background-color: #f9f9f9; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Nieuw contactbericht ontvangen</div>
        <div class="content">
            <p>Je hebt een nieuw bericht ontvangen via het contactformulier op de website.</p>
            
            <div class="field">
                <strong>Naam:</strong> {{ $name }}
            </div>
            <div class="field">
                <strong>E-mailadres (voor antwoord):</strong> {{ $email }}
            </div>
            
            <div class="message">
                <strong>Bericht:</strong>
                <p style="white-space: pre-wrap;">{{ $messageContent }}</p>
            </div>
        </div>
    </div>
</body>
</html>