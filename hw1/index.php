<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التكليف الأول - PHP</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }
        .php-badge {
            background-color: #777bb4;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>التكليف الأول (PHP)</h1>
        
        <p>حالة السيرفر: 
            <span class="php-badge">
                <?php echo "PHP يعمل بنجاح ✅"; ?>
            </span>
        </p>

        <p>الوقت الحالي في السيرفر هو: <?php echo date("h:i:sa"); ?></p>

        <hr>
        
        <button id="btn">اضغط للتفاعل (JS)</button>
        <p id="msg"></p>
    </div>

    <script>
        document.getElementById('btn').onclick = function() {
            document.getElementById('msg').innerText = "تم تشغيل JavaScript بنجاح! 🚀";
            this.style.display = 'none';
        };
    </script>

</body>
</html>