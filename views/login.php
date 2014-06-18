<html>

    <div class="container">

        <h1>Kirjaudu sisään</h1>

        <?php if (!empty($data->virhe)): ?>
            <div class="alert alert-danger">Virhe! <?php echo $data->virhe; ?></div>
        <?php endif; ?>

        <form action="doLogin.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Kirjaudu sisään</button>
        </form>
            <p>
                <a href="rekisteroityminen.php">Rekisteröidy</a>
            </p>
            
    </div>
</body>
</html>
