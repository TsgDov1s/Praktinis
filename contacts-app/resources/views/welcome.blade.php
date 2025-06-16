<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money App Welcome</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8fafc;
        }
        
        .welcome-container {
            text-align: center;
            padding: 4rem 2rem;
            width: 100%;
            max-width: 600px;
        }
        
        .money-logo {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #10b981; /* Green color for money */
        }
        
        h2 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #4a5568;
        }
        
        p {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            color: #4a5568;
        }
        
        .button-group {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: #10b981; /* Green color to match money theme */
            color: white;
            border: 1px solid #10b981;
        }
        
        .btn-primary:hover {
            background-color: #0d9f6e;
        }
        
        .btn-outline {
            background-color: transparent;
            color: #10b981;
            border: 1px solid #10b981;
        }
        
        .btn-outline:hover {
            background-color: #ecfdf5;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="money-logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
        </div>
        <h2>Sveiki atvyke</h2>
        <p>Prisijunkite arba susikurkite paskyra</p>
        
        <div class="button-group">
            <a href="/login" class="btn btn-primary">Prisijungti</a>
            <a href="/register" class="btn btn-outline">Registruotis</a>
        </div>
    </div>
</body>
</html>