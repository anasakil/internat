<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
</head>
<body>
    <h1>Send SMS</h1>

    <form method="post" action="{{ url('http://127.0.0.1:8000/send-sms') }}">
        @csrf
        <label for="to">To:</label>
        <input type="tel" name="to" id="to" required placeholder="Enter recipient's phone number">

        <label for="message">Message:</label>
        <textarea name="message" id="message" required placeholder="Enter your message"></textarea>

        <button type="submit">Send SMS</button>
    </form>
</body>
</html>
