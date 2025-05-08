<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
<link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <form>
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" placeholder="Enter your name" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label for="message">Message:</label>
                <textarea id="message" placeholder="Enter your message" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>