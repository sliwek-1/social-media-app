<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/show-passwd.js" defer></script>
    <script src="./js/send-register-data.js" defer></script>
    <title>Mateusz Śliwinski</title>
</head>
<body>
    <div class="cover"></div>
    <div class="main">
        <header class="login-header">
            Zarejestruj się
        </header>
        <div class="error">
            
        </div>
        <div class="form">
            <form action="#" class="login-form">
                <div class="login">
                    <input type="text" name="nickname" id="nickname" placeholder="Pseudonim" required>
                </div>
                <div class="name-container container">
                    <input type="text" name="firstname" class="input" placeholder="Imię" required>
                    <input type="text" name="lastname" class="input" placeholder="Nazwisko" required>
                </div>
                <div class="passwd-container container">
                    <input type="password" name="passwd" class="input-pass input" placeholder="Hasło" required>
                    <input type="password" name="confirm-passwd" class="input-pass input" placeholder="Potwierdzi hasło" required>
                    <div class="show-pass">
                        Pokaż hasło: <input type="checkbox" name="show-passwd" id="show-passwd">
                    </div>
                </div>
                <div class="email">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="submit">
                    <button type="submit" class="login-btn">Zarejestruj się</button>
                </div>
                <span class="register-question">Masz już konto?<a href="login.html">Zaloguj się!</a></span>
            </form>
        </div>
    </div>
</body>
</html>