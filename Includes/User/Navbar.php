<style>
    /* Header & Navigation */
    header {
        background-color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.2rem 0;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: #2c3e50;
    }

    .logo i {
        font-size: 2rem;
        color: #4a90e2;
    }

    .logo h1 {
        font-size: 1.8rem;
        font-weight: 700;
    }

    .logo span {
        font-size: 0.9rem;
        opacity: 0.8;
        display: block;
        margin-top: 3px;
    }

    nav ul {
        display: flex;
        list-style: none;
        gap: 30px;
    }

    nav a {
        color: #4a5568;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.05rem;
        padding: 5px 10px;
        border-radius: 4px;
        transition: all 0.3s;
    }

    nav a:hover,
    nav a.active {
        color: #4a90e2;
    }

    .cta-button {
        background-color: #4a90e2;
        color: white;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .cta-button:hover {
        background-color: #3a7bc8;
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
    }

    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #4a5568;
        cursor: pointer;
    }
</style>

<header>
    <div class="container">
        <div class="header-container">
            <a href="#" class="logo">
                <i class="fas fa-paw"></i>
                <div>
                    <h1>Happy Paws</h1>
                    <span>Adoption Center</span>
                </div>
            </a>

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>

            <nav>
                <ul id="mainNav">
                    <li><a href="/pet-adoption/" class="active">Home</a></li>
                    <li><a href="/Pet-Adoption/View/AvailablePets.php" class="cta-button">Adopt Now</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>