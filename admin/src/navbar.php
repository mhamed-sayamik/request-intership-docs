<div class="navbar-container close">
    <i class='bx bx-menu-alt-left'></i>
    <div class="profile">

            <div class="profile-hello">Bienvenue</div>
            <div class="profile-nom"><?php echo $_SESSION['name'];?></div>
    </div>
    <ul class="links">
    <li>
            <a href="http://localhost:8080/request-intership-docs/admin/depot.php">
                <div class="link">
                    <i class='bx bx-box' ></i>
                    <div class="link-name">Depot</div>
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost:8080/request-intership-docs/admin/etudiants.php">
                <div class="link">
                    <i class='bx bx-user'></i>
                    <div class="link-name">etudiants</div>
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost:8080/request-intership-docs/admin/settings.php">
                <div class="link">
                    <i class='bx bx-cog' ></i>
                    <div class="link-name">Settings</div>
                </div>
            </a>
        </li>
        <li>
            <a style="cursor: pointer;" href="?action=LogOut" id="logout">
                <div class="link">
                    <i class='bx bx-log-out' ></i>
                    <div class="link-name">Se Deconnecter</div>
                </div>
            </a>
        </li>
    </ul>
</div>
<script>
//style clicked-link
const activePage = window.location.pathname;
const navLinks = document.querySelectorAll((".links li a:not(#logout)")).forEach(link => {
    if(link.href.includes(`${activePage}`)){
    link.querySelector(".link").classList.add('clicked-link');
    }
    })
//swipe link on click
const menu = document.querySelector(".bx-menu-alt-left");
const navbar = document.querySelector(".navbar-container");
menu.addEventListener("click", ()=>{
    navbar.classList.toggle("close");
  });
</script>
