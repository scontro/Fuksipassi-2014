<!DOCTYPE html>
<html>

    <div class="container">

        <h1>Kirjaudu sisään</h1>

        <form action="login.php" method="POST">
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
    </div>
</body>
</html>
