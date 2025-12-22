<link rel="stylesheet" href="../Styles/adminSidebar.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</div>

<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../View/login.php');
    exit();
}

require_once '../Model/user.php';
$user = new User();
$user_login = null;
if (isset($_SESSION['user_id'])) {
    $user_login = $user->getUserById($_SESSION['user_id']);
}

?>

<aside class="sidebar">
    <div class="logo">
        <i class="fas fa-paw"></i>
        <div>
            <h1>Happy Paws</h1>
            <span>Admin Dashboard</span>
        </div>
    </div>

    <ul class="nav-links">
        <li><a href="../View/AdminDashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li><a href="../View/AdminPets.php"><i class="fas fa-dog"></i> <span>Manage Pets</span></a></li>
        <li><a href="../View/AdminAdoptionRequests.php"><i class="fas fa-file-alt"></i> <span>Adoption Requests</span></a></li>
        <li><a href="../View/AdminListOfUsers.php"><i class="fas fa-users"></i> <span>List of Admins</span></a></li>
    </ul>

    <div class="sidebar-footer">
        <div class="admin-info">
            <h3>Welcome,</h3>
            <span>Admin <?php echo $user_login['firstName'] ?></span>
        </div>
        <a href="../Controllers/logout.php" class="logout-btn">
            <span><i class="fa-solid fa-right-from-bracket"></i></span>
        </a>
    </div>
</aside>