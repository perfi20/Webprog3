<div class="container">
    <!-- navigáció -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Kezdőlap</a>
            <a class="navbar-brand" href="newPost.php">Új hír létrehozása</a>
            <a class="navbar-brand" href="myPosts.php">Híreim</a>
            <a class="navbar-brand" href="logout.php">Kijelentkezés</a>
            <a class="navbar-brand" href="<?php echo ROOT_URL; ?>archivum.php">archívum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>show.php?show=gasztronomia">gasztronómia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>show.php?show=Nincs">Nincs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>show.php?show=sport">sport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>show.php?show=politika">politika</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>show.php?show=gazdasag">gazdaság</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>show.php?show=tech">tech</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT_URL; ?>show.php?show=egyeb">egyéb</a>
                    </li>
                </ul>       
            </div>
        </div>
    </nav>
</div>