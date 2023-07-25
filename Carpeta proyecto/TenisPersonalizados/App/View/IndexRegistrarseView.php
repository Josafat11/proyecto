<div>
<body>
  <h1>Registro</h1>
  <form class="registration-form" action="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=UserController&M=Add" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre..." required pattern="^[a-zA-Z\s]+$" />
    <br />

    <label for="apaterno">Apellido Paterno:</label>
    <input type="text" name="apaterno" id="apaterno" placeholder="Apellido Paterno..." required pattern="^[a-zA-Z\s]+$" />
    <br />

    <label for="amaterno">Apellido Materno:</label>
    <input type="text" name="amaterno" id="amaterno" placeholder="Apellido Materno..." required pattern="^[a-zA-Z\s]+$" />
    <br />

    <label for="email">Correo:</label>
    <input type="email" name="email" id="email" placeholder="Correo..." required />
    <br />

    <label for="tel">Teléfono:</label>
    <input type="tel" name="tel" id="tel" placeholder="Teléfono..." required pattern="^\d{10}$" />
    <br />

    <label for="user">Usuario:</label>
    <input type="text" name="user" id="user" placeholder="Usuario..." required />
    <br />

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" placeholder="Contraseña..." required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$" />
    <br />

    <input type="submit" value="Registrarse" />
  </form>
</body>
</div>