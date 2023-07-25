<div>
<div id="container7">
        <h1 id="titulo">Contacto</h1>
        <p id="descripcion">¡Estamos aquí para ayudarte! Si tienes alguna pregunta o consulta, no dudes en ponerte en contacto con nosotros. Puedes utilizar el formulario de contacto a continuación o encontrarnos en nuestras redes sociales.</p>
        
        <form action="enviar.php" method="POST" class="contact-form" id="formulario">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar mensaje">
            </div>
        </form>
        
        <div class="social-media" id="redes-sociales">
            <h3>Síguenos en redes sociales:</h3>
            <ul>
                <li><a href="https://www.facebook.com/empresa" target="_blank">Facebook</a></li>
                <li><a href="https://www.instagram.com/empresa" target="_blank">Instagram</a></li>
                <li><a href="https://www.twitter.com/empresa" target="_blank">Twitter</a></li>
            </ul>
        </div>
    </div>
    
    <footer id="footer">
        <p>&copy; 2023 Empresa de Tenis Personalizados. Todos los derechos reservados.</p>
    </footer>
</div>