<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pets - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-paw"></i> Manage Pets</h1>
            <div class="header-actions">
                <button class="btn btn-primary" id="addPetBtn">
                    <i class="fas fa-plus-circle"></i> Add New Pet
                </button>
                <button class="btn btn-outline" id="exportBtn">
                    <i class="fas fa-download"></i> Export
                </button>
            </div>
        </div>

        <!-- Stats Summary -->
        <div class="stats-summary">
            <div class="stat-box total">
                <div class="stat-icon total">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="stat-info">
                    <h3>42</h3>
                    <p>Total Pets</p>
                </div>
            </div>

            <div class="stat-box available">
                <div class="stat-icon available">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="stat-info">
                    <h3>14</h3>
                    <p>Available</p>
                </div>
            </div>

            <div class="stat-box adopted">
                <div class="stat-icon adopted">
                    <i class="fas fa-home"></i>
                </div>
                <div class="stat-info">
                    <h3>28</h3>
                    <p>Adopted</p>
                </div>
            </div>

            <div class="stat-box pending">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>5</h3>
                    <p>Pending</p>
                </div>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class="filter-bar">
            <div class="filter-header">
                <h3>Filter Pets</h3>
                <button class="btn btn-outline" id="clearFiltersBtn">
                    <i class="fas fa-times"></i> Clear Filters
                </button>
            </div>

            <div class="filter-controls">
                <div class="filter-group">
                    <label for="statusFilter">Status</label>
                    <select id="statusFilter">
                        <option value="all">All Statuses</option>
                        <option value="available">Available</option>
                        <option value="adopted">Adopted</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="typeFilter">Pet Type</label>
                    <select id="typeFilter">
                        <option value="all">All Types</option>
                        <option value="dog">Dog</option>
                        <option value="cat">Cat</option>
                        <option value="rabbit">Rabbit</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="filter-group search-box">
                    <label for="searchInput">Search Pets</label>
                    <div style="position: relative;">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Search by name, breed, or description">
                    </div>
                </div>
            </div>

            <div class="filter-actions">
                <button class="btn btn-primary" id="applyFiltersBtn">
                    <i class="fas fa-filter"></i> Apply Filters
                </button>
            </div>
        </div>

        <!-- Pets Table -->
        <div class="table-container">
            <div class="table-header">
                <h3>All Pets (42 Total)</h3>
                <div class="table-actions">
                    <button class="btn btn-outline" id="bulkEditBtn">
                        <i class="fas fa-edit"></i> Bulk Edit
                    </button>
                    <button class="btn btn-outline" id="refreshBtn">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Pet</th>
                            <th>Type</th>
                            <th>Age</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Delete Confirmation Modal -->
    <div class="modal-overlay" id="deleteModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
                <button class="close-modal" id="closeDeleteModal">&times;</button>
            </div>
            <div style="padding: 20px 0;">
                <p>Are you sure you want to delete <strong id="deletePetName">this pet</strong>? This action cannot be undone.</p>
                <div style="display: flex; gap: 15px; margin-top: 30px;">
                    <button class="btn btn-outline" id="cancelDeleteBtn" style="flex: 1;">Cancel</button>
                    <button class="btn" id="confirmDeleteBtn" style="flex: 1; background-color: #ef4444; color: white;">Delete Pet</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Static functionality for demonstration
        document.addEventListener('DOMContentLoaded', function() {
            // Add Pet Button
            const addPetBtn = document.getElementById('addPetBtn');
            addPetBtn.addEventListener('click', function() {
                alert('"Add New Pet" form would open here.\n\nThis would include:\n• Pet name, type, breed, age\n• Gender, description, medical info\n• Upload photos\n• Set initial adoption status');
            });

            // Export Button
            const exportBtn = document.getElementById('exportBtn');
            exportBtn.addEventListener('click', function() {
                alert('Exporting pet data...\n\nAvailable export formats:\n• CSV (Excel compatible)\n• PDF Report\n• JSON data\n\nExport would include all filtered pet records.');
            });

            // Clear Filters Button
            const clearFiltersBtn = document.getElementById('clearFiltersBtn');
            clearFiltersBtn.addEventListener('click', function() {
                document.getElementById('statusFilter').value = 'all';
                document.getElementById('typeFilter').value = 'all';
                document.getElementById('searchInput').value = '';
                alert('All filters have been cleared.');
            });

            // Apply Filters Button
            const applyFiltersBtn = document.getElementById('applyFiltersBtn');
            applyFiltersBtn.addEventListener('click', function() {
                const status = document.getElementById('statusFilter').value;
                const type = document.getElementById('typeFilter').value;
                const search = document.getElementById('searchInput').value;

                let filterMessage = 'Applying filters:\n';
                filterMessage += `• Status: ${status === 'all' ? 'All' : status}\n`;
                filterMessage += `• Type: ${type === 'all' ? 'All' : type}\n`;
                filterMessage += `• Search: ${search || 'None'}`;

                alert(filterMessage + '\n\nIn a real system, this would filter the table results.');
            });

            // Bulk Edit Button
            const bulkEditBtn = document.getElementById('bulkEditBtn');
            bulkEditBtn.addEventListener('click', function() {
                alert('Bulk edit mode activated.\n\nIn this mode you could:\n• Select multiple pets\n• Update status for all selected\n• Add/remove tags\n• Assign to specific caregivers');
            });

            // Refresh Button
            const refreshBtn = document.getElementById('refreshBtn');
            refreshBtn.addEventListener('click', function() {
                alert('Refreshing pet data...\n\nIn a real system, this would reload data from the server.');
            });

            // Edit Pet Buttons
            const editButtons = document.querySelectorAll('.btn-edit');
            editButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const petName = this.getAttribute('data-pet');
                    alert(`Editing ${petName}...\n\nEdit form would include:\n• Basic pet information\n• Photos gallery\n• Medical records\n• Adoption status\n• Notes and history`);
                });
            });

            // Change Status Buttons
            const statusButtons = document.querySelectorAll('.btn-status');
            statusButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const petName = this.getAttribute('data-pet');
                    alert(`Changing status for ${petName}...\n\nAvailable status options:\n• Available for adoption\n• Adoption Pending\n• Adopted\n• Not Available (medical hold)\n• Fostered`);
                });
            });

            // Delete Pet Buttons
            const deleteButtons = document.querySelectorAll('.btn-delete');
            const deleteModal = document.getElementById('deleteModal');
            const closeDeleteModal = document.getElementById('closeDeleteModal');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            const deletePetName = document.getElementById('deletePetName');
            let currentPetToDelete = '';

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    currentPetToDelete = this.getAttribute('data-pet');
                    deletePetName.textContent = currentPetToDelete;
                    deleteModal.classList.add('active');
                });
            });

            // Close delete modal
            closeDeleteModal.addEventListener('click', function() {
                deleteModal.classList.remove('active');
            });

            cancelDeleteBtn.addEventListener('click', function() {
                deleteModal.classList.remove('active');
            });

            confirmDeleteBtn.addEventListener('click', function() {
                alert(`Pet "${currentPetToDelete}" has been deleted.\n\nIn a real system, this would:\n• Remove the pet from the database\n• Update statistics\n• Send notification to admin\n• Archive pet records`);
                deleteModal.classList.remove('active');
            });

            // Close modal when clicking outside
            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    deleteModal.classList.remove('active');
                }
            });

            // Table row click functionality
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('click', function() {
                    const petName = this.querySelector('.pet-info h4').textContent;
                    alert(`Viewing details for ${petName}.\n\nThis would open a detailed view with:\n• Full pet information\n• Adoption history\n• Medical records\n• Photos gallery\n• Activity log`);
                });
            });

            // Pagination buttons
            const paginationButtons = document.querySelectorAll('.pagination-btn:not(:first-child):not(:last-child)');
            paginationButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all pagination buttons
                    paginationButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });
                    // Add active class to clicked button
                    this.classList.add('active');

                    const pageNum = this.textContent;
                    alert(`Loading page ${pageNum}...\n\nIn a real system, this would load the next set of pet records.`);
                });
            });

            // Search input with debounce simulation
            const searchInput = document.getElementById('searchInput');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(function() {
                    const searchTerm = searchInput.value;
                    if (searchTerm.length > 2) {
                        console.log(`Searching for: ${searchTerm}`);
                        // In a real system, this would trigger a search request
                    }
                }, 500); // Simulated debounce delay
            });
        });
    </script>
</body>

</html>