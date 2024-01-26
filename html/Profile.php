<?php
session_start();
    if (!isset($_SESSION["username"])) {
        header('Location: ' . "./login.php");
    }

    require_once "../php/connect_db.php";

    $username = $_SESSION["username"];

    $userDataSTMT = pg_prepare($conn, "user_data", "SELECT * FROM accounts where username = $1");
    $userDataRESULT = pg_execute($conn, "user_data", array($username));
    $name = pg_fetch_result($userDataRESULT, 0, "name");
?>
<!DOCTYPE html>
<html class="dimmed">

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/StyleSheet.css">
    <link rel="stylesheet" href="../css/Profile.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="../js/main.js"></script>
</head>


<body class="dimmed">


    <!-- Start of SubNav -->
    <subnav>
        <ul>
            <li>
                <a href="Profile.php">
                    <img src="../images/cat.jpg" class="nav-profile">
                </a>
            </li>

            <li>
                <div class="dropdown">
                    <button class="dropButton">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.44784 7.96942C6.76219 5.14032 9.15349 3 12 3V3C14.8465 3 17.2378 5.14032 17.5522 7.96942L17.804 10.2356C17.8072 10.2645 17.8088 10.279 17.8104 10.2933C17.9394 11.4169 18.3051 12.5005 18.8836 13.4725C18.8909 13.4849 18.8984 13.4973 18.9133 13.5222L19.4914 14.4856C20.0159 15.3599 20.2782 15.797 20.2216 16.1559C20.1839 16.3946 20.061 16.6117 19.8757 16.7668C19.5971 17 19.0873 17 18.0678 17H5.93223C4.91268 17 4.40291 17 4.12434 16.7668C3.93897 16.6117 3.81609 16.3946 3.77841 16.1559C3.72179 15.797 3.98407 15.3599 4.50862 14.4856L5.08665 13.5222C5.10161 13.4973 5.10909 13.4849 5.11644 13.4725C5.69488 12.5005 6.06064 11.4169 6.18959 10.2933C6.19123 10.279 6.19283 10.2645 6.19604 10.2356L6.44784 7.96942Z"
                                stroke="black" stroke-width="2" />
                            <path
                                d="M8 17C8 17.5253 8.10346 18.0454 8.30448 18.5307C8.5055 19.016 8.80014 19.457 9.17157 19.8284C9.54301 20.1999 9.98396 20.4945 10.4693 20.6955C10.9546 20.8965 11.4747 21 12 21C12.5253 21 13.0454 20.8965 13.5307 20.6955C14.016 20.4945 14.457 20.1999 14.8284 19.8284C15.1999 19.457 15.4945 19.016 15.6955 18.5307C15.8965 18.0454 16 17.5253 16 17"
                                stroke="black" stroke-width="2" stroke-linecap="round" />
                        </svg>

                    </button>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
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
                <li>
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
                        <img src="../images/icons/nav-icons/magnifer-svgrepo-com.svg">
                    </a>
                </li>
                <li>
                    <a>
                        <img src="../images/icons/nav-icons/add-square-svgrepo-com.svg">
                    </a>
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
                        <button class="dropButton" onclick="toggleDropdown()">
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
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                            <a href="../html/Group.php">See More</a>
                        </div>
                    </div>
                    <span>Notifications</span>
                </li>

                <a href="../html/Profile.php">
                    <img class="nav-profile" src="../images/cat.jpg" />
                </a>

            </ul>
        </section>
    </nav>
    <!-- End of SubNav -->

    <main>

        <!-- Start of Post Preview -->
        <prepost>
            <div class="post-column">
                <div class="expanded-post">
                    <img src="../images/Rectangle 4164.png">
                </div>
                <div class="caption">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam laborum obcaecati soluta.
                    Dolore
                    eos iste consequatur dicta aut reprehenderit sed eveniet quibusdam alias a iure maiores
                    illum
                    impedit laboriosam minus, praesentium commodi beatae eius adipisci?
                </div>
            </div>


            <div class="comments-column">
                <!--- Poster Info-->
                <div class="post-info">
                    <div class=" comment-header">
                        <div class="user-container">
                            <a href="Profile.html"><img src="../images/cat.jpg" class="post-avatar" /></a>
                            <div class="user-post-name">
                                <span>Michael Schumacher</span>
                                <span>@MikeS</span>
                            </div>
                        </div>
                        <a href="#" class="close" onclick="exitButton(this)"></a>
                    </div>
                    <div class="choices">
                        <div class="comment-post-options">
                            <!-- Likes -->
                            <button class="like icons" onclick="toggleHeart(this)">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                        fill="red" />
                                </svg>
                                <span>4213</span>
                            </button>
                            <!-- Comment Button -->
                            <button>
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z"
                                        fill="#1C274C" />
                                </svg>
                                <span>Comment</span>
                            </button>
                            <!-- Send  -->
                            <button>
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.6357 15.6701L20.3521 10.5208C21.8516 6.02242 22.6013 3.77322 21.414 2.58595C20.2268 1.39869 17.9776 2.14842 13.4792 3.64788L8.32987 5.36432C4.69923 6.57453 2.88392 7.17964 2.36806 8.06698C1.87731 8.91112 1.87731 9.95369 2.36806 10.7978C2.88392 11.6852 4.69923 12.2903 8.32987 13.5005C8.77981 13.6505 9.28601 13.5434 9.62294 13.2096L15.1286 7.75495C15.4383 7.44808 15.9382 7.45041 16.245 7.76015C16.5519 8.06989 16.5496 8.56975 16.2398 8.87662L10.8231 14.2432C10.4518 14.6111 10.3342 15.1742 10.4995 15.6701C11.7097 19.3007 12.3148 21.1161 13.2022 21.6319C14.0463 22.1227 15.0889 22.1227 15.933 21.6319C16.8204 21.1161 17.4255 19.3008 18.6357 15.6701Z"
                                        fill="#1C274C" />
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                        <!-- Pin -->
                        <button>
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.1835 7.80516L16.2188 4.83755C14.1921 2.8089 13.1788 1.79457 12.0904 2.03468C11.0021 2.2748 10.5086 3.62155 9.5217 6.31506L8.85373 8.1381C8.59063 8.85617 8.45908 9.2152 8.22239 9.49292C8.11619 9.61754 7.99536 9.72887 7.86251 9.82451C7.56644 10.0377 7.19811 10.1392 6.46145 10.3423C4.80107 10.8 3.97088 11.0289 3.65804 11.5721C3.5228 11.8069 3.45242 12.0735 3.45413 12.3446C3.45809 12.9715 4.06698 13.581 5.28476 14.8L6.69935 16.2163L2.22345 20.6964C1.92552 20.9946 1.92552 21.4782 2.22345 21.7764C2.52138 22.0746 3.00443 22.0746 3.30236 21.7764L7.77841 17.2961L9.24441 18.7635C10.4699 19.9902 11.0827 20.6036 11.7134 20.6045C11.9792 20.6049 12.2404 20.5358 12.4713 20.4041C13.0192 20.0914 13.2493 19.2551 13.7095 17.5825C13.9119 16.8472 14.013 16.4795 14.2254 16.1835C14.3184 16.054 14.4262 15.9358 14.5468 15.8314C14.8221 15.593 15.1788 15.459 15.8922 15.191L17.7362 14.4981C20.4 13.4973 21.7319 12.9969 21.9667 11.9115C22.2014 10.826 21.1954 9.81905 19.1835 7.80516Z"
                                    fill="#1C274C" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!--- End of Poster -->

                <div>
                    <h4>Comments</h4>
                    <div class="divider"></div>
                </div>


                <!-- Comment -->
                <div class="comment-container">
                    <div class="comment-user-comment">
                        <div class="comment-user-container">
                            <a href="Profile.html"><img src="../images/cat.jpg" class="post-avatar" /></a>
                            <div class="user-post-name">
                                <span>Michael Schumacher</span>
                                <span>Comment - 22/01/23</span>
                            </div>
                        </div>
                        <div class="comment-like">
                            <!-- Likes -->
                            <button class="like icons" onclick="toggleHeart(this)">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                        fill="red" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="comment-text">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt animi obcaecati
                            quidem
                            nostrum commodi tenetur?
                        </div>
                        <div class="comment-options">
                            <span>1 Like</span>
                            <a>Reply</a>
                        </div>

                    </div>
                    <div class="comment-user-comment">
                        <div class="user-container">
                            <a href="Profile.html"><img src="../images/cat.jpg" class="post-avatar" /></a>
                            <div class="user-post-name">
                                <span>Michael Schumacher</span>
                                <span>Comment - 22/01/23</span>
                            </div>
                        </div>
                        <div class="comment-like">
                            <!-- Likes -->
                            <button class="like icons" onclick="toggleHeart(this)">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                        fill="red" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="comment-text">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt animi obcaecati
                            quidem
                            nostrum commodi tenetur?
                        </div>
                        <div class="comment-options">
                            <span>1 Like</span>
                            <a>Reply</a>
                        </div>

                    </div>
                    <div class="comment-user-comment">
                        <div class="user-container">
                            <a href="Profile.html"><img src="../images/cat.jpg" class="post-avatar" /></a>
                            <div class="user-post-name">
                                <span>Michael Schumacher</span>
                                <span>Comment - 22/01/23</span>
                            </div>
                        </div>
                        <div class="comment-like">
                            <!-- Likes -->
                            <button class="like icons" onclick="toggleHeart(this)">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                        fill="red" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="comment-text">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt animi obcaecati
                            quidem
                            nostrum commodi tenetur?
                        </div>
                        <div class="comment-options">
                            <span>1 Like</span>
                            <a>Reply</a>
                        </div>

                    </div>
                    <div class="comment-user-comment">
                        <div class="user-container">
                            <a href="Profile.html"><img src="../images/cat.jpg" class="post-avatar" /></a>
                            <div class="user-post-name">
                                <span>Michael Schumacher</span>
                                <span>Comment - 22/01/23</span>
                            </div>
                        </div>
                        <div class="comment-like">
                            <!-- Likes -->
                            <button class="like icons" onclick="toggleHeart(this)">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                        fill="red" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="comment-text">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt animi obcaecati
                            quidem
                            nostrum commodi tenetur?
                        </div>
                        <div class="comment-options">
                            <span>1 Like</span>
                            <a>Reply</a>
                        </div>

                    </div>
                    <div class="comment-user-comment">
                        <div class="user-container">
                            <a href="Profile.html"><img src="../images/cat.jpg" class="post-avatar" /></a>
                            <div class="user-post-name">
                                <span>Michael Schumacher</span>
                                <span>Comment - 22/01/23</span>
                            </div>
                        </div>
                        <div class="comment-like">
                            <!-- Likes -->
                            <button class="like icons" onclick="toggleHeart(this)">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                        fill="red" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="comment-text">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt animi obcaecati
                            quidem
                            nostrum commodi tenetur?
                        </div>
                        <div class="comment-options">
                            <span>1 Like</span>
                            <a>Reply</a>
                        </div>

                    </div>
                    <!--- End of Comment -->

                    <!-- Replies -->
                    <div class="comment-replies">
                        <div class="comment-user-comment">
                            <div class="user-container">
                                <a href="Profile.html"><img src="../images/cat.jpg" class="post-avatar" /></a>
                                <div class="user-post-name">
                                    <span>Michael Schumacher</span>
                                    <span>Comment - 22/01/23</span>
                                </div>
                            </div>
                            <div class="comment-like">
                                <!-- Likes -->
                                <button class="like icons" onclick="toggleHeart(this)">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                            fill="red" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="comment-replies-container">
                            <div class="comment-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet,
                                    nulla et dictum interdum, nisi lorem egestas vitae scel<span
                                        id="dots">...</span><span id="more">erisque enim ligula venenatis dolor.
                                        Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce
                                        luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed
                                        ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet
                                        sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer
                                        fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor
                                        porta.</span></p>

                                <button onclick="toggleMore()" id="myBtn">Read more</button>
                            </div>
                            <div class="comment-options">
                                <span>1 Like</span>
                                <a>Reply</a>
                            </div>
                        </div>
                    </div>

                    <!-- End of Replies -->


                </div>
                <!-- Comment Input -->
                <div class="comment-create-container">
                    <form>
                        <input class="comment-create" type="text">
                    </form>
                </div>
            </div>
        </prepost>
        <!-- End of Post Preview -->

        <!-- Banner Profile -->

        <section class="banner-profile">
            <div>
                <button class="banner-profile-edit">
                    edit
                </button>
            </div>
            <div class="banner-profile-info">
                <span class="profilePic"><img src="../images/cat.jpg"></span>
                <div class="profilePicBorder"></div>
                <div class="banner-profile-person">
                  <span class="banner-profile-name"><?php
                        echo "<h3>$name</h3>";
                        echo "<h4 id='occupation'>@$username</h4>";
                        ?></span>
                    <span class="banner-profile-user">@<?php
                        echo "<h3>$name</h3>";
                        echo "<h4 id=''occupation'>@$username</h4>";
                        ?></span>
                </div>
                <div class="divider"></div>
                <div class="banner-profile-options">
                    <div>
                        <button>Posts</button>
                        <button>Groups</button>
                        <button>About</button>
                    </div>
                    <div>
                        <button>Edit</button>
                    </div>

                </div>
            </div>
        </section>
        <!-- End of banner Profile -->

        <!-- Profile Display -->
        <section class="profile-info-display">
            <aside class="profile-bio">
                <h3>Bio</h3>
                <bio>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet cupiditate doloremque illo enim
                    quibusdam totam error excepturi odit pariatur fugiat vero hic, velit fugit tenetur.</bio>
                <div>
                    <span>IMG</span>
                    <span>Studies at Heriot Watt</span>
                </div>
            </aside>
            <div class="profile-changable">

                <!-- Displaying Posts -->
                <bside class="profile-posts">
                    <!-- Post 1 -->
                    <div class="posts" id="1">
                        <div class="feed-post">
                            <div class="user-container">
                                <a href="Profile.php"><img src="../images/cat.jpg" class="post-avatar" /></a>
                                <div class="user-post-name">
                                    <span>Michael Schumacher</span>
                                    <span>@MikeS</span>
                                </div>
                            </div>
                            <button class="post-image" onclick="openPost(this)" data-postid="1">
                                <img class="post-image" src="../images/Rectangle 4164.png" />
                            </button>
                            <div class="choices">
                                <div class="post-options">
                                    <!-- Likes -->
                                    <button class="like icons" onclick="toggleHeart(this)">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z"
                                                fill="red" />
                                        </svg>
                                    </button>
                                    <!-- Comment -->
                                    <button class="post-comment-button">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z"
                                                fill="#1C274C" />
                                        </svg>
                                    </button>
                                    <!-- Send -->
                                    <button>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.6357 15.6701L20.3521 10.5208C21.8516 6.02242 22.6013 3.77322 21.414 2.58595C20.2268 1.39869 17.9776 2.14842 13.4792 3.64788L8.32987 5.36432C4.69923 6.57453 2.88392 7.17964 2.36806 8.06698C1.87731 8.91112 1.87731 9.95369 2.36806 10.7978C2.88392 11.6852 4.69923 12.2903 8.32987 13.5005C8.77981 13.6505 9.28601 13.5434 9.62294 13.2096L15.1286 7.75495C15.4383 7.44808 15.9382 7.45041 16.245 7.76015C16.5519 8.06989 16.5496 8.56975 16.2398 8.87662L10.8231 14.2432C10.4518 14.6111 10.3342 15.1742 10.4995 15.6701C11.7097 19.3007 12.3148 21.1161 13.2022 21.6319C14.0463 22.1227 15.0889 22.1227 15.933 21.6319C16.8204 21.1161 17.4255 19.3008 18.6357 15.6701Z"
                                                fill="#1C274C" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Pin -->
                                <button>
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.1835 7.80516L16.2188 4.83755C14.1921 2.8089 13.1788 1.79457 12.0904 2.03468C11.0021 2.2748 10.5086 3.62155 9.5217 6.31506L8.85373 8.1381C8.59063 8.85617 8.45908 9.2152 8.22239 9.49292C8.11619 9.61754 7.99536 9.72887 7.86251 9.82451C7.56644 10.0377 7.19811 10.1392 6.46145 10.3423C4.80107 10.8 3.97088 11.0289 3.65804 11.5721C3.5228 11.8069 3.45242 12.0735 3.45413 12.3446C3.45809 12.9715 4.06698 13.581 5.28476 14.8L6.69935 16.2163L2.22345 20.6964C1.92552 20.9946 1.92552 21.4782 2.22345 21.7764C2.52138 22.0746 3.00443 22.0746 3.30236 21.7764L7.77841 17.2961L9.24441 18.7635C10.4699 19.9902 11.0827 20.6036 11.7134 20.6045C11.9792 20.6049 12.2404 20.5358 12.4713 20.4041C13.0192 20.0914 13.2493 19.2551 13.7095 17.5825C13.9119 16.8472 14.013 16.4795 14.2254 16.1835C14.3184 16.054 14.4262 15.9358 14.5468 15.8314C14.8221 15.593 15.1788 15.459 15.8922 15.191L17.7362 14.4981C20.4 13.4973 21.7319 12.9969 21.9667 11.9115C22.2014 10.826 21.1954 9.81905 19.1835 7.80516Z"
                                            fill="#1C274C" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End of Post 1 -->
                </bside>
                <!-- End of Displaying Posts -->
            </div>
        </section>
        <!-- Profile Display -->

    </main>


</body>


</html>