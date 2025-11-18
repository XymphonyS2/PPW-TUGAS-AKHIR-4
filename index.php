<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kontak</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        :root {
            --primary: #2264C0;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

        nav {
            background: var(--white); 
            padding: 1rem 3rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            position: fixed; 
            width: 100%; 
            top: 0; 
            z-index: 50;
            display: flex; 
            align-items: center; 
            gap: 15px;
        }
        
        .nav-brand { 
            font-size: 1.5rem; 
            font-weight: 700; 
            color: var(--primary); 
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-brand">Litz</div>
    </nav>
</body>
</html>
