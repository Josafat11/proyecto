<div>
    <link rel="stylesheet" href="App/Css/InicioSesion.css">
    <div class="container">
        <form action="?C=UserController&M=Login" method="post" class="login-form">
            <h2>Iniciar sesión</h2>
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Iniciar sesión">
            </div>
        </form>
</div>