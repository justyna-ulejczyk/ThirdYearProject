<?php
//session_id("userSession");
session_start();
if (!isset ($_SESSION["username"])) {
    header('Location: ' . "./login.php");
}
 
require_once "../php/connect_db.php";

$username = $_SESSION["username"];
session_write_close();

$userDataSTMT = pg_prepare($conn, "user_data", "SELECT * FROM accounts where username = $1");
$userDataRESULT = pg_execute($conn, "user_data", array($username));
$name = pg_fetch_result($userDataRESULT, 0, "name");
?>

<!DOCTYPE html>
<html class="dimmed">

<head>
    <title> ShareSync Home</title>
    <link rel="icon" href="../images/logos/LogoBlack.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/StyleSheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="../js/Home.js"></script>
    <script src="../js/darkmode.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/main.js"></script>
</head>

<!-- test commit -->

<!-- test commit - branch demo -->

<body id="theme-switcher">

    <!-- Start of SubNav -->
    <subnav>
        <ul>
            <li>
                <a href="Profile.php">
                    <img src="<?php echo "../profile_pic/profile_pic_$username.png"; ?>" alt="" class="nav-profile">
                </a>
            </li>

            <li>
                <a href="../html/Notifications.php">
                    <div class="dropdown">
                        <button class="dropButton">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.44784 7.96942C6.76219 5.14032 9.15349 3 12 3V3C14.8465 3 17.2378 5.14032 17.5522 7.96942L17.804 10.2356C17.8072 10.2645 17.8088 10.279 17.8104 10.2933C17.9394 11.4169 18.3051 12.5005 18.8836 13.4725C18.8909 13.4849 18.8984 13.4973 18.9133 13.5222L19.4914 14.4856C20.0159 15.3599 20.2782 15.797 20.2216 16.1559C20.1839 16.3946 20.061 16.6117 19.8757 16.7668C19.5971 17 19.0873 17 18.0678 17H5.93223C4.91268 17 4.40291 17 4.12434 16.7668C3.93897 16.6117 3.81609 16.3946 3.77841 16.1559C3.72179 15.797 3.98407 15.3599 4.50862 14.4856L5.08665 13.5222C5.10161 13.4973 5.10909 13.4849 5.11644 13.4725C5.69488 12.5005 6.06064 11.4169 6.18959 10.2933C6.19123 10.279 6.19283 10.2645 6.19604 10.2356L6.44784 7.96942Z"
                                    stroke="black" stroke-width="2" />
                                <path
                                    d="M8 17C8 17.5253 8.10346 18.0454 8.30448 18.5307C8.5055 19.016 8.80014 19.457 9.17157 19.8284C9.54301 20.1999 9.98396 20.4945 10.4693 20.6955C10.9546 20.8965 11.4747 21 12 21C12.5253 21 13.0454 20.8965 13.5307 20.6955C14.016 20.4945 14.457 20.1999 14.8284 19.8284C15.1999 19.457 15.4945 19.016 15.6955 18.5307C15.8965 18.0454 16 17.5253 16 17"
                                    stroke="black" stroke-width="2" stroke-linecap="round" />
                            </svg>

                        </button>
                    </div>
                </a>
            </li>
        </ul>
    </subnav>
    <!-- End of SubNav -->

    <!-- Start of Nav -->
    <nav>
        <section>
            <form id="searchForm" action="">
                <input id="searchInput" type="search" required>
                <i class="fa fa-search"></i>
            </form>

        </section>
        <section>
            <ul class="linksBar">
                <li class="active">
                    <a href="../html/Home.php">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.5192 7.82274C2 8.77128 2 9.91549 2 12.2039V13.725C2 17.6258 2 19.5763 3.17157 20.7881C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.7881C22 19.5763 22 17.6258 22 13.725V12.2039C22 9.91549 22 8.77128 21.4808 7.82274C20.9616 6.87421 20.0131 6.28551 18.116 5.10812L16.116 3.86687C14.1106 2.62229 13.1079 2 12 2C10.8921 2 9.88939 2.62229 7.88403 3.86687L5.88403 5.10813C3.98695 6.28551 3.0384 6.87421 2.5192 7.82274ZM9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                fill="#1C274C" />
                        </svg>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a>
                        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.7883 21.7883C22.0706 21.506 22.0706 21.0483 21.7883 20.7659L18.1224 17.1002C19.4884 15.5007 20.3133 13.425 20.3133 11.1566C20.3133 6.09956 16.2137 2 11.1566 2C6.09956 2 2 6.09956 2 11.1566C2 16.2137 6.09956 20.3133 11.1566 20.3133C13.4249 20.3133 15.5006 19.4885 17.1 18.1225L20.7659 21.7883C21.0483 22.0706 21.506 22.0706 21.7883 21.7883Z"
                                fill="#1C274C" />
                        </svg>
                    </a>
                </li>
                <li>

                    <button onclick="createPost()">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22ZM12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V11.25H15C15.4142 11.25 15.75 11.5858 15.75 12C15.75 12.4142 15.4142 12.75 15 12.75H12.75L12.75 15C12.75 15.4142 12.4142 15.75 12 15.75C11.5858 15.75 11.25 15.4142 11.25 15V12.75H9C8.58579 12.75 8.25 12.4142 8.25 12C8.25 11.5858 8.58579 11.25 9 11.25H11.25L11.25 9C11.25 8.58579 11.5858 8.25 12 8.25Z"
                                fill="#1C274C" />
                        </svg>
                    </button>
                </li>
                <li>
                    <a href="../html/Group.php">
                        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z"
                                fill="#1C274C" />
                            <path
                                d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z"
                                fill="#1C274C" />
                            <path
                                d="M7.12205 5C7.29951 5 7.47276 5.01741 7.64005 5.05056C7.23249 5.77446 7 6.61008 7 7.5C7 8.36825 7.22131 9.18482 7.61059 9.89636C7.45245 9.92583 7.28912 9.94126 7.12205 9.94126C5.70763 9.94126 4.56102 8.83512 4.56102 7.47063C4.56102 6.10614 5.70763 5 7.12205 5Z"
                                fill="#1C274C" />
                            <path
                                d="M5.44734 18.986C4.87942 18.3071 4.5 17.474 4.5 16.5C4.5 15.5558 4.85657 14.744 5.39578 14.0767C3.4911 14.2245 2 15.2662 2 16.5294C2 17.8044 3.5173 18.8538 5.44734 18.986Z"
                                fill="#1C274C" />
                            <path
                                d="M16.9999 7.5C16.9999 8.36825 16.7786 9.18482 16.3893 9.89636C16.5475 9.92583 16.7108 9.94126 16.8779 9.94126C18.2923 9.94126 19.4389 8.83512 19.4389 7.47063C19.4389 6.10614 18.2923 5 16.8779 5C16.7004 5 16.5272 5.01741 16.3599 5.05056C16.7674 5.77446 16.9999 6.61008 16.9999 7.5Z"
                                fill="#1C274C" />
                            <path
                                d="M18.5526 18.986C20.4826 18.8538 21.9999 17.8044 21.9999 16.5294C21.9999 15.2662 20.5088 14.2245 18.6041 14.0767C19.1433 14.744 19.4999 15.5558 19.4999 16.5C19.4999 17.474 19.1205 18.3071 18.5526 18.986Z"
                                fill="#1C274C" />
                        </svg>
                        <span>Collabs</span>
                    </a>
                </li>
                <li>
                    <a href="../html/Messages.php">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z"
                                fill="#1C274C" />
                        </svg>
                        <span>Messages</span>
                    </a>
                </li>

                <li>
                    <div class="dropdown">
                        <button class="dropButton" onclick="toggleDropdownNav()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.44784 7.96942C6.76219 5.14032 9.15349 3 12 3V3C14.8465 3 17.2378 5.14032 17.5522 7.96942L17.804 10.2356C17.8072 10.2645 17.8088 10.279 17.8104 10.2933C17.9394 11.4169 18.3051 12.5005 18.8836 13.4725C18.8909 13.4849 18.8984 13.4973 18.9133 13.5222L19.4914 14.4856C20.0159 15.3599 20.2782 15.797 20.2216 16.1559C20.1839 16.3946 20.061 16.6117 19.8757 16.7668C19.5971 17 19.0873 17 18.0678 17H5.93223C4.91268 17 4.40291 17 4.12434 16.7668C3.93897 16.6117 3.81609 16.3946 3.77841 16.1559C3.72179 15.797 3.98407 15.3599 4.50862 14.4856L5.08665 13.5222C5.10161 13.4973 5.10909 13.4849 5.11644 13.4725C5.69488 12.5005 6.06064 11.4169 6.18959 10.2933C6.19123 10.279 6.19283 10.2645 6.19604 10.2356L6.44784 7.96942Z"
                                    stroke="black" stroke-width="2" />
                                <path
                                    d="M8 17C8 17.5253 8.10346 18.0454 8.30448 18.5307C8.5055 19.016 8.80014 19.457 9.17157 19.8284C9.54301 20.1999 9.98396 20.4945 10.4693 20.6955C10.9546 20.8965 11.4747 21 12 21C12.5253 21 13.0454 20.8965 13.5307 20.6955C14.016 20.4945 14.457 20.1999 14.8284 19.8284C15.1999 19.457 15.4945 19.016 15.6955 18.5307C15.8965 18.0454 16 17.5253 16 17"
                                    stroke="black" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </button>
                        <div class="dropdown-content" id="dropdownContent">
                            <?php
                            // Load initial notifications
                            include_once "../php/load_notifications.php";
                            ?>
                            <a href="../html/Notifications.php">See More</a>
                        </div>

                        <script>
                            // Function to load more notifications
                            function loadMoreNotifications() {
                                // Make an AJAX request
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "load_notifications.php", true);
                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        // Update the content of the dropdownContent div
                                        document.getElementById("dropdownContent").innerHTML = xhr.responseText;
                                    }
                                };
                                xhr.send();
                            }

                            // Attach click event listener to the "See More" link
                            document.getElementById("seeMoreLink").addEventListener("click", function (event) {
                                event.preventDefault(); // Prevent default link behavior
                                loadMoreNotifications(); // Call the function to load more notifications
                            });
                        </script>
                    </div>
                    </div>
                    <span>Notifications</span>
                </li>

                <li>
                    <div class="dropdown">
                        <img class="nav-profile" onclick="toggleDropdownProfile()"
                            src="<?php echo "../profile_pic/profile_pic_$username.png"; ?>">
                        </img>
                        <div class="dropdown-content-profile" id="dropdownContentProfile">
                            <div class="dropdown-profile-icon">
                                <a href="">
                                    <img src="<?php echo "../profile_pic/profile_pic_$username.png"; ?>" alt="">
                                    <p>
                                        <?php echo "$username" ?>
                                    </p>
                                </a>
                            </div>
                            <a href="../html/Profile.php">
                                <button class="view-profile">
                                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="6" r="4" fill="#1C274C" />
                                        <path
                                            d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                            fill="#1C274C" />
                                    </svg>
                                    <span>My Profile</span>
                                </button>
                            </a>
                            <a href="Settings.php">
                                <button class="settings">
                                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.2788 2.15224C13.9085 2 13.439 2 12.5 2C11.561 2 11.0915 2 10.7212 2.15224C10.2274 2.35523 9.83509 2.74458 9.63056 3.23463C9.53719 3.45834 9.50065 3.7185 9.48635 4.09799C9.46534 4.65568 9.17716 5.17189 8.69017 5.45093C8.20318 5.72996 7.60864 5.71954 7.11149 5.45876C6.77318 5.2813 6.52789 5.18262 6.28599 5.15102C5.75609 5.08178 5.22018 5.22429 4.79616 5.5472C4.47814 5.78938 4.24339 6.1929 3.7739 6.99993C3.30441 7.80697 3.06967 8.21048 3.01735 8.60491C2.94758 9.1308 3.09118 9.66266 3.41655 10.0835C3.56506 10.2756 3.77377 10.437 4.0977 10.639C4.57391 10.936 4.88032 11.4419 4.88029 12C4.88026 12.5581 4.57386 13.0639 4.0977 13.3608C3.77372 13.5629 3.56497 13.7244 3.41645 13.9165C3.09108 14.3373 2.94749 14.8691 3.01725 15.395C3.06957 15.7894 3.30432 16.193 3.7738 17C4.24329 17.807 4.47804 18.2106 4.79606 18.4527C5.22008 18.7756 5.75599 18.9181 6.28589 18.8489C6.52778 18.8173 6.77305 18.7186 7.11133 18.5412C7.60852 18.2804 8.2031 18.27 8.69012 18.549C9.17714 18.8281 9.46533 19.3443 9.48635 19.9021C9.50065 20.2815 9.53719 20.5417 9.63056 20.7654C9.83509 21.2554 10.2274 21.6448 10.7212 21.8478C11.0915 22 11.561 22 12.5 22C13.439 22 13.9085 22 14.2788 21.8478C14.7726 21.6448 15.1649 21.2554 15.3694 20.7654C15.4628 20.5417 15.4994 20.2815 15.5137 19.902C15.5347 19.3443 15.8228 18.8281 16.3098 18.549C16.7968 18.2699 17.3914 18.2804 17.8886 18.5412C18.2269 18.7186 18.4721 18.8172 18.714 18.8488C19.2439 18.9181 19.7798 18.7756 20.2038 18.4527C20.5219 18.2105 20.7566 17.807 21.2261 16.9999C21.6956 16.1929 21.9303 15.7894 21.9827 15.395C22.0524 14.8691 21.9088 14.3372 21.5835 13.9164C21.4349 13.7243 21.2262 13.5628 20.9022 13.3608C20.4261 13.0639 20.1197 12.558 20.1197 11.9999C20.1197 11.4418 20.4261 10.9361 20.9022 10.6392C21.2263 10.4371 21.435 10.2757 21.5836 10.0835C21.9089 9.66273 22.0525 9.13087 21.9828 8.60497C21.9304 8.21055 21.6957 7.80703 21.2262 7C20.7567 6.19297 20.522 5.78945 20.2039 5.54727C19.7799 5.22436 19.244 5.08185 18.7141 5.15109C18.4722 5.18269 18.2269 5.28136 17.8887 5.4588C17.3915 5.71959 16.7969 5.73002 16.3099 5.45096C15.8229 5.17191 15.5347 4.65566 15.5136 4.09794C15.4993 3.71848 15.4628 3.45833 15.3694 3.23463C15.1649 2.74458 14.7726 2.35523 14.2788 2.15224ZM12.5 15C14.1695 15 15.5228 13.6569 15.5228 12C15.5228 10.3431 14.1695 9 12.5 9C10.8305 9 9.47716 10.3431 9.47716 12C9.47716 13.6569 10.8305 15 12.5 15Z"
                                            fill="#1C274C" />
                                    </svg>
                                    <span>Settings</span>
                                </button>
                            </a>
                            <a>
                                <div class="display">
                                    <div>
                                        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 22C17.5228 22 22 17.5228 22 12C22 11.5373 21.3065 11.4608 21.0672 11.8568C19.9289 13.7406 17.8615 15 15.5 15C11.9101 15 9 12.0899 9 8.5C9 6.13845 10.2594 4.07105 12.1432 2.93276C12.5392 2.69347 12.4627 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                fill="#1C274C" />
                                        </svg>
                                        <span>Switch to Dark</span>
                                    </div>
                                    <input type="checkbox" onclick="toggleDarkMode(this)">
                                </div>
                            </a>
                            <a href="../php/logout_php.php">
                                <button class="logout">
                                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.5 9.56757V14.4324C3.5 16.7258 3.5 17.8724 4.22161 18.5849C4.87719 19.2321 5.89578 19.2913 7.81846 19.2968C7.71686 18.6224 7.69563 17.8168 7.69029 16.8689C7.68802 16.4659 8.01709 16.1374 8.42529 16.1351C8.83348 16.1329 9.16624 16.4578 9.16851 16.8608C9.17451 17.9247 9.20249 18.6789 9.30898 19.2512C9.41158 19.8027 9.57634 20.1219 9.81626 20.3588C10.089 20.6281 10.4719 20.8037 11.1951 20.8996C11.9395 20.9985 12.9261 21 14.3407 21H15.3262C16.7407 21 17.7273 20.9985 18.4717 20.8996C19.1949 20.8037 19.5778 20.6281 19.8505 20.3588C20.1233 20.0895 20.3011 19.7114 20.3983 18.9975C20.4984 18.2626 20.5 17.2885 20.5 15.8919V8.10811C20.5 6.71149 20.4984 5.73743 20.3983 5.0025C20.3011 4.28855 20.1233 3.91048 19.8505 3.6412C19.5778 3.37192 19.1949 3.19635 18.4717 3.10036C17.7273 3.00155 16.7407 3 15.3262 3H14.3407C12.9261 3 11.9395 3.00155 11.1951 3.10036C10.4719 3.19635 10.089 3.37192 9.81626 3.6412C9.57634 3.87807 9.41158 4.19728 9.30898 4.74877C9.20249 5.32112 9.17451 6.07525 9.16851 7.1392C9.16624 7.54221 8.83348 7.8671 8.42529 7.86485C8.01709 7.86261 7.68802 7.53409 7.69029 7.13107C7.69563 6.18322 7.71686 5.37758 7.81846 4.70325C5.89578 4.70867 4.87719 4.76789 4.22161 5.41515C3.5 6.12759 3.5 7.27425 3.5 9.56757ZM5.93385 12.516C5.6452 12.231 5.6452 11.769 5.93385 11.484L7.90484 9.53806C8.19348 9.25308 8.66147 9.25308 8.95011 9.53806C9.23876 9.82304 9.23876 10.2851 8.95011 10.5701L8.24088 11.2703L15.3259 11.2703C15.7341 11.2703 16.0651 11.597 16.0651 12C16.0651 12.403 15.7341 12.7297 15.3259 12.7297L8.24088 12.7297L8.95011 13.4299C9.23876 13.7149 9.23876 14.177 8.95011 14.4619C8.66147 14.7469 8.19348 14.7469 7.90484 14.4619L5.93385 12.516Z"
                                            fill="#1C274C" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>

            </ul>
        </section>
    </nav>
    <!-- End of Nav -->




    <main>
        <!-- Start of Profile -->
        <profile class="tile ">
            <div>
                <div>
                    <div id="Banner"></div>
                    <a href="Profile.php"><img class="pfp"
                            src="<?php echo "../profile_pic/profile_pic_$username.png"; ?>" alt="pfp" width="100"
                            height="100" /></a>
                    <div id="pfp-outline"></div>
                </div>

                <div>
                    <div>
                        <?php
                        echo "<h3>$name</h3>";
                        echo "<h4 id='occupation'>@$username</h4>";
                        ?>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>

            <div>
                <a href="../html/Group.php"> Collabs</a>
                <a href="../html/Messages.php"> Messages</a>
                <a href="../html/Notifications.php"> Notifications</a>
            </div>
        </profile>
        <!-- End of Profile -->

        <!-- Start of Feed -->
        <feed class="feed">
            <!-- Start of Create Post Button-->
            <div>
                <button class="feed-create-post-button" onclick="createPost()">
                    Create Post
                </button>
            </div>
            <div class='fyp-filter'>
                <a href='Home.php?id=all'><button>All Users</button></a>
                <span> - </span>
                <a href='Home.php?id=following'><button>Following</button></a>
            </div>
            <!-- End of Create Post Button-->


            <!-- Start of Create Post Options -->
            <div>
                <div class="feed-create-post-container">

                    <form action="../php/create_post.php" method="post" enctype="multipart/form-data">
                        <label for="photoInput" class="file-upload">
                            <span class="icon"><i class="fas fa-upload"></i></span>
                            <span class="text">Choose a file</span>
                        </label>
                        <input type="file" id="photoInput" class="feed-create-post-img" name="post_image"
                            accept=".png, .jpg, .jpeg, image/*;" capture required style="display: none;">


                        <div class="caption-container">
                            <h3>Caption</h3>
                            <textarea id="text" name="text" rows="4" cols="50" maxlength="3000"
                                class="feed-create-post-captions"></textarea>
                        </div>
                        <div class="tags-container">
                            <h3>Tags (please seperate with commas)</h3>
                            <input type="text" id="tags" name="tags">
                        </div>
                        <div class='final-decision'>
                            <button onclick="exitButton(this)">Cancel</button>
                            <input value="Post" type="submit" name="submit_post" class="feed-create-post-submit"
                                onclick="finishPost()">

                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Create Post Options -->



            <!-- Start Post -->
            <!-- Start Post 1 -->
            <?php
            $postsListQuery = "SELECT postid, text, post.username, name  FROM post INNER JOIN accounts ON accounts.username = post.username WHERE accountvisibility=0 ORDER BY postid DESC";
            if (isset ($_GET["id"])) {
                if ($_GET["id"] == "following") {
                    $postsListQuery = "SELECT postid, text, post.username, name FROM post INNER JOIN accounts ON accounts.username = post.username INNER JOIN follows ON accounts.username = follows.followee WHERE follows.username = '$username' ORDER BY postid DESC";
                }
            }
            $postsListRESULT = pg_query($conn, $postsListQuery);
            $postLikesSTMT = pg_prepare($conn, "postLikes", "SELECT * FROM usertolikes where postid = $1");
            $postTagsSTMT = pg_prepare($conn, "postTags", "SELECT tagname FROM tags where postid= $1");
            $postLikedByUserSTMT = pg_prepare($conn, "postLikedByUser", "SELECT * FROM usertolikes where postid = $1 AND username = $2");
            $commentQuery = pg_prepare($conn, "comment", "SELECT* FROM comments Where postid = $1");


            if ($postsListRESULT) {
                // Output data of each row
                while ($row = pg_fetch_assoc($postsListRESULT)) {
                    $text = $row["text"];
                    $poster_username = $row["username"];
                    $name = $row["name"];
                    $postid = $row["postid"];
                    $post_image_path = "../post_images/post_image" . $postid . ".png";
                    $postLikesRESULT = pg_execute($conn, "postLikes", array($postid));
                    $likesCount = pg_num_rows($postLikesRESULT);

                    $postTagsRESULT = pg_execute($conn, "postTags", array($postid));

                    $postLikedByUserRESULT = pg_execute($conn, "postLikedByUser", array($postid, $username));
                    $postLikedByUser = pg_num_rows($postLikedByUserRESULT) != 0;
                    $commentResult = pg_execute($conn, "comment", array($postid));
                    $commentNumb = pg_num_rows($commentResult);

                    echo "<post class='posts' id=$postid>";
                    echo " <prepost>
            <div class='post-column'>
                <div class='expanded-post'>
                    <img src=$post_image_path>
                </div>
            </div>


            <div class='comments-column'>
                <div class='post-info'>
                    <div class=' comment-header'>
                        <div class='user-container'>
                            <a href='Profile.php?id=$poster_username'><img src='../profile_pic/profile_pic_$poster_username.png' class='post-avatar' /></a>
                            <div class='user-post-name'>
                                <span>$name</span>
                                <span>@$poster_username</span>
                            </div>
                        </div>
                        <a href='#' class='close' onclick='exitButton(this)'></a>
                    </div>
                    <div class='choices'>
                        <div class='comment-post-options'>
                            <!-- Likes -->";
                    if ($postLikedByUser) {
                        echo "<button id='likePostButton' class='like icons post-$postid active' onclick='toggleHeart($postid);handleLikeButtonClick($postid);' >";
                    } else {
                        echo "<button id='likePostButton' class='like icons post-$postid' onclick='toggleHeart($postid);handleLikeButtonClick($postid);' >";
                    }
                    echo "<svg width='24px' height='24px' viewBox='0 0 24 24' fill='none'
                                    xmlns='http://www.w3.org/2000/svg'>
                                    <path
                                        d='M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z'
                                        fill='red' />
                                </svg>
                                <span class='likeCounter $postid'>$likesCount</span>
                            </button>

                        </div>

                    </div>
                    <p class='caption'>
                    $text
                    </p>
                </div>
                <div>
                    <h4>Comments</h4>
                    <div class='divider'></div>
                </div>


                <div class='comment-container id-$postid'>";
                    if ($commentNumb > 0) {
                        while ($row = pg_fetch_assoc($commentResult)) {
                            $commenting_user = $row['username'];
                            $comment = $row['text'];
                            $date = $row['timestamp'];
                            $comment_id = $row['commentid'];

                            echo "
                            <div class='comment-user-comment'>
                                <div class='user-container'>
                                    <a href='Profile.php?id=$username'>
                                    
                                    <img src='../profile_pic/profile_pic_$username.png' class='post-avatar' />
                                    </a>
                                    <div class='user-post-name'>
                                        <span>$commenting_user</span>
                                        <span>Comment - $date</span>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div class='comment-text'>$comment</div>
                                <div class='comment-options'>";

                            if ($commenting_user == $username) {
                                echo "<form action='../php/deleteComments.php' method='post'>";
                                echo "<input type='hidden' name='comment_id' value='$comment_id'>";
                                echo "<button type='submit' name='delete_comment'>Delete</button>";
                                echo "</form>";
                            }

                            echo "</div>
                            </div>
                        </form>";
                        }
                    } else {
                        echo "No comments";
                    }

                    ?>
                    </div>
                    <div class='comment-create-container'>
                        <input class='comment-create' id='comment-create-text-<?php echo "$postid" ?>' name="text" type="text"
                            required>
                        <input type="hidden" id='comment-create-postid-<?php echo "$postid" ?>' name="postid"
                            value="<?php echo $postid; ?>">
                        <button name="commentSubmit"
                            onclick='postComment(<?php echo "$postid, \"$username\"" ?>);'>Comment</button>
                    </div>

                    <?php echo "
            </div>
        </prepost>";
                    echo "<div class='feed-post'>";
                    echo "<div class='user-container'>";
                    echo "<a href='Profile.php?id=$poster_username'><img src='../profile_pic/profile_pic_$poster_username.png' class='post-avatar' /></a>";
                    echo "<div class='user-post-name'>";
                    echo "<span>$name</span>";
                    echo "<span>@$poster_username</span>";
                    echo "</div>";
                    echo "</div>";
                    echo "<button class='post-image' onclick='openPost(this)' data-postid=$postid>";
                    echo "<img class='post-image' src=$post_image_path />";
                    echo "</button>";
                    echo "<div class='choices'>";
                    echo "<div class='post-options'>";



                    echo "<!-- Likes -->";
                    if ($postLikedByUser) {
                        echo "<button class='like icons active post-$postid' onclick='toggleHeart($postid);handleLikeButtonClick($postid);'>";
                    } else {
                        echo "<button class='like icons post-$postid' onclick='toggleHeart($postid);handleLikeButtonClick($postid);'>";
                    }
                    echo "<svg width='24px' height='24px' viewBox='0 0 24 24' fill='none'";
                    echo "xmlns='http://www.w3.org/2000/svg'>";
                    echo "<path";
                    echo ' d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"';
                    echo "fill='red' />";
                    echo "</svg>";
                    echo "</button>";
                    echo "<p class='likeCounter $postid'>$likesCount</p>";

                    echo "</div>";
                    if ($poster_username == $username) {
                        echo "<form action='../php/delete_post.php' method='post'>";
                        echo "<input type='hidden' name='post_id' value='$postid'>";
                        echo "<button type='submit' name='delete_post'>Delete</button>";
                        echo "</form>";
                    }
                    echo "</div>";
                    echo "</div>";

                    echo "</post>";

                }
            } else {
                echo "No posts found.";
            }

            // Close the database connection
            
            ?>
            <!-- End of Post 1 -->
            <!-- End of Posts -->
        </feed>
        <!-- End of Feed -->

    </main>


</body>
<?php pg_close($conn); ?>

</html>