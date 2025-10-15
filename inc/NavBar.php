<style>
    .container-fluid {
        position: relative;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1030; 
        background-color: #f8f9fa; 
        border-bottom: 2px solid #0088FF; 
    }

   
    body {
        padding-top: 70px; 
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
        color: #343a40;
    }

    .navbar-brand span {
        color: #0088FF;
    }

    .navbar-nav .nav-link {
        color: #343a40;
        font-weight: 500;
    }

    .navbar-nav .nav-link.active {
        color: #0088FF;
    }

    .navbar-nav .nav-item .dropdown-menu {
        background-color: #f8f9fa;
        border: 1px solid #0088FF; 
    }

    .navbar-nav .nav-item .dropdown-item {
        color: #343a40;
    }

    .navbar-nav .nav-item .dropdown-item:hover {
        background-color: #e2e6ea;
    }

    .navbar-toggler {
        border-color: #0088FF; 
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%288, 136, 255, 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E"); /* Change the color of the icon */
    }

    .form-control {
        border-radius: 0;
        border: 1px solid #0088FF; 
    }

    .btn-outline-success {
        color: #0088FF;
        border-color: #0088FF;
    }

    .btn-outline-success:hover {
        background-color: #0088FF;
        color: #fff;
    }
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="blog.php"><b>Tech<span style="color: #0088FF;">Blog</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="category.php">Category</a>
                    </li>
                    <?php 
                      if($logged) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle"
                          href="profile.php"
                          role="button"
                          data-bs-toggle="dropdown" 
                          aria-expanded="false">
                          <i class="fa fa-user" aria-hidden="true"></i>
                         @<?=$_SESSION['username']?>
                        </a>
                        <ul class="dropdown-menu">
                            
                            <li><a class="dropdown-item" 
                                     href="logout.php">
                                     Logout</a></li>
                        </ul>
                    </li>

                    <?php 
                      } else{
                    ?>
                     
                    <li class="nav-item">
                        <a class="nav-link" href="loginfo.php">Login | Signup</a>
                    </li>
                    <?php 
                      } 
                    ?>
                </ul>
                <form class="d-flex" 
                      role="search"
                      method="GET"
                      action="blog.php">
                    <input class="form-control me-2" 
                            type="search" 
                            name="search"
                            placeholder="Search" 
                            aria-label="Search">
                    <button class="btn btn-outline-success" 
                            type="submit">
                            Search</button>
                </form>
            </div>
        </div>
    </nav>