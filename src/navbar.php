<div class="navbar-container close">
    <i class='bx bx-menu-alt-left'></i><br>
    <i class='bx bx-bell' id="bell"></i>
    <div class="profile">

            <div class="profile-hello">Bienvenue</div>
            <div class="profile-nom"><?php echo $_SESSION['name'];?></div>
    </div>
    <ul class="links">
        <li>
            <a href="http://localhost:8080/request-intership-docs/generate-file.php">
                <div class="link">
                    <i class='bx bx-download' ></i>
                    <div class="link-name">Generer</div>
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost:8080/request-intership-docs/Depot.php">
                <div class="link">
                    <i class='bx bx-box' ></i>
                    <div class="link-name">Depot</div>
                </div>
            </a>
        </li>
        <li>
            <a href="http://localhost:8080/request-intership-docs/settings.php">
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
<div id="notifs-container" class="hide">
    
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
const bell = document.getElementById("bell");
const notifBar = document.getElementById("notifs-container");

menu.addEventListener("click", ()=>{
    navbar.classList.toggle("close");
  });
bell.addEventListener("click", ()=>{
    ShowNotifs();
  });
function getNotifs() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("notifs-container").innerHTML = this.responseText;
    }
    xhttp.open("GET", "src/notifs.php");
    xhttp.send();
}
function ShowNotifs(){
    getNotifs();
    notifBar.classList.toggle("hide");
}
</script>
