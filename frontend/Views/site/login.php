<?php
    include_once __DIR__ . "/../header.php";
?>

    <section class="detailsOFProduct">
        <div class="wrapper">
            <form action="/?model=auth&action=check" method="POST">
                <div>
                    <label>Login:</label>
                    <input type="text" name="login">
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input type="submit" value="login">
                </div>
            </form>
        </div>
    </section>




<?php
    include_once __DIR__ . "/../footer.php";
?>