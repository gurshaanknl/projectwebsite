<?php
/**
 * Admin Dashboard - View Enquiries
 */

// Configure session to expire when browser closes
ini_set('session.cookie_lifetime', 0); // Session cookie (expires when browser closes)
ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to cookie
ini_set('session.use_only_cookies', 1); // Only use cookies for session
session_start();

// Handle logout and redirect to website (must be checked FIRST, before session validation)
if (isset($_GET['logout_to_website'])) {
    session_destroy();
    // Clear session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-3600, '/');
    }
    // Clear all session variables
    $_SESSION = array();
    // Redirect to homepage
    header('Location: index.html');
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    // Clear session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-3600, '/');
    }
    $_SESSION = array();
    header('Location: admin-login.php');
    exit;
}

// Check if logged in (after handling logout requests)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin-login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries Dashboard - Veer Dreams</title>
    <link href="vendor/css/bundle.min.css" rel="stylesheet">
    <link href="furniture/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f5;
        }
        .dashboard-header {
            background: linear-gradient(135deg, #2b2b2b 0%, #1a1a1a 100%);
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-content h1 {
            color: #D4AF37;
            font-size: 24px;
        }
        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-primary {
            background: #D4AF37;
            color: #fff;
        }
        .btn-primary:hover {
            background: #b8941f;
        }
        .btn-secondary {
            background: #666;
            color: #fff;
        }
        .btn-secondary:hover {
            background: #555;
        }
        .btn-danger {
            background: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background: #c82333;
        }
        .dashboard-container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stat-card h3 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .stat-card .number {
            color: #D4AF37;
            font-size: 32px;
            font-weight: bold;
        }
        .filters {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: end;
        }
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        .filter-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-size: 14px;
        }
        .filter-group input,
        .filter-group select {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .filter-group input:focus,
        .filter-group select:focus {
            outline: none;
            border-color: #D4AF37;
        }
        .enquiries-table {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .table-header {
            background: #2b2b2b;
            color: #fff;
            padding: 15px 20px;
            display: grid;
            grid-template-columns: 60px 1fr 1.5fr 1fr 1.5fr 150px 120px;
            gap: 15px;
            font-weight: 600;
            font-size: 14px;
        }
        .table-row {
            padding: 15px 20px;
            display: grid;
            grid-template-columns: 60px 1fr 1.5fr 1fr 1.5fr 150px 120px;
            gap: 15px;
            border-bottom: 1px solid #eee;
            align-items: center;
            transition: background 0.2s;
        }
        .table-row:hover {
            background: #f9f9f9;
        }
        .table-row:last-child {
            border-bottom: none;
        }
        .table-cell {
            font-size: 14px;
            color: #333;
        }
        .table-cell.email {
            color: #D4AF37;
            text-decoration: none;
        }
        .table-cell.email:hover {
            text-decoration: underline;
        }
        .table-cell.message {
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .table-cell.date {
            color: #666;
            font-size: 12px;
        }
        .actions {
            display: flex;
            gap: 5px;
        }
        .btn-small {
            padding: 5px 10px;
            font-size: 12px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        .modal-header h2 {
            color: #D4AF37;
        }
        .close-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }
        .modal-body .detail-row {
            margin-bottom: 15px;
        }
        .modal-body .detail-label {
            font-weight: 600;
            color: #666;
            margin-bottom: 5px;
        }
        .modal-body .detail-value {
            color: #333;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            color: #ddd;
        }
        @media (max-width: 768px) {
            .table-header,
            .table-row {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .table-cell {
                padding: 5px 0;
            }
            .filters {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <div class="header-content">
            <h1><i class="fas fa-envelope"></i> Enquiries Dashboard</h1>
            <div class="header-actions">
                <?php if (isset($_SESSION['admin_email'])): ?>
                    <span style="color: #D4AF37; margin-right: 15px; font-size: 14px;">
                        <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION['admin_name'] ?? $_SESSION['admin_email']); ?>
                    </span>
                <?php endif; ?>
                <a href="?logout_to_website=1" class="btn btn-secondary">
                    <i class="fas fa-home"></i> View Website
                </a>
                <a href="?logout=1" class="btn btn-secondary">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-stats">
            <div class="stat-card">
                <h3>Total Enquiries</h3>
                <div class="number" id="total-count">0</div>
            </div>
            <div class="stat-card">
                <h3>Today</h3>
                <div class="number" id="today-count">0</div>
            </div>
            <div class="stat-card">
                <h3>This Week</h3>
                <div class="number" id="week-count">0</div>
            </div>
        </div>

        <div class="filters">
            <div class="filter-group">
                <label>Search</label>
                <input type="text" id="search-input" placeholder="Search by name or email...">
            </div>
            <div class="filter-group">
                <label>Sort By</label>
                <select id="sort-select">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="name">Name (A-Z)</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="btn btn-primary" onclick="loadEnquiries()">
                    <i class="fas fa-refresh"></i> Refresh
                </button>
            </div>
        </div>

        <div class="enquiries-table">
            <div class="table-header">
                <div>ID</div>
                <div>Name</div>
                <div>Email</div>
                <div>Phone</div>
                <div>Product</div>
                <div>Message</div>
                <div>Date</div>
                <div>Actions</div>
            </div>
            <div id="enquiries-container">
                <div class="empty-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading enquiries...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for viewing full enquiry -->
    <div class="modal" id="enquiry-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Enquiry Details</h2>
                <button class="close-modal" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body" id="modal-body">
                <!-- Content loaded dynamically -->
            </div>
        </div>
    </div>

    <script src="vendor/js/bundle.min.js"></script>
    <script>
        let allEnquiries = [];

        // Load enquiries on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadEnquiries();
            
            // Search functionality
            document.getElementById('search-input').addEventListener('input', filterEnquiries);
            document.getElementById('sort-select').addEventListener('change', filterEnquiries);
        });

        function loadEnquiries() {
            fetch('get-enquiries.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        allEnquiries = data.enquiries;
                        updateStats();
                        displayEnquiries(allEnquiries);
                    } else {
                        document.getElementById('enquiries-container').innerHTML = 
                            '<div class="empty-state"><i class="fas fa-exclamation-triangle"></i><p>Error loading enquiries</p></div>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('enquiries-container').innerHTML = 
                        '<div class="empty-state"><i class="fas fa-exclamation-triangle"></i><p>Error loading enquiries</p></div>';
                });
        }

        function updateStats() {
            const total = allEnquiries.length;
            const today = new Date().toDateString();
            const todayCount = allEnquiries.filter(e => new Date(e.created_at).toDateString() === today).length;
            
            const weekAgo = new Date();
            weekAgo.setDate(weekAgo.getDate() - 7);
            const weekCount = allEnquiries.filter(e => new Date(e.created_at) >= weekAgo).length;

            document.getElementById('total-count').textContent = total;
            document.getElementById('today-count').textContent = todayCount;
            document.getElementById('week-count').textContent = weekCount;
        }

        function filterEnquiries() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const sortBy = document.getElementById('sort-select').value;

            let filtered = allEnquiries.filter(enquiry => {
                const name = (enquiry.name || '').toLowerCase();
                const email = (enquiry.email || '').toLowerCase();
                return name.includes(searchTerm) || email.includes(searchTerm);
            });

            // Sort
            filtered.sort((a, b) => {
                if (sortBy === 'newest') {
                    return new Date(b.created_at) - new Date(a.created_at);
                } else if (sortBy === 'oldest') {
                    return new Date(a.created_at) - new Date(b.created_at);
                } else if (sortBy === 'name') {
                    return (a.name || '').localeCompare(b.name || '');
                }
                return 0;
            });

            displayEnquiries(filtered);
        }

        function displayEnquiries(enquiries) {
            const container = document.getElementById('enquiries-container');
            
            if (enquiries.length === 0) {
                container.innerHTML = '<div class="empty-state"><i class="fas fa-inbox"></i><p>No enquiries found</p></div>';
                return;
            }

            container.innerHTML = enquiries.map(enquiry => {
                const productInfo = enquiry.product_name 
                    ? `${escapeHtml(enquiry.product_name)}${enquiry.product_category ? ' (' + escapeHtml(enquiry.product_category) + ')' : ''}`
                    : 'N/A';
                return `
                <div class="table-row">
                    <div class="table-cell">#${enquiry.id}</div>
                    <div class="table-cell">${escapeHtml(enquiry.name || 'N/A')}</div>
                    <div class="table-cell">
                        <a href="mailto:${enquiry.email}" class="email">${escapeHtml(enquiry.email || 'N/A')}</a>
                    </div>
                    <div class="table-cell">${escapeHtml(enquiry.phone || 'N/A')}</div>
                    <div class="table-cell" style="color: #D4AF37; font-weight: 500;">${productInfo}</div>
                    <div class="table-cell message" title="${escapeHtml(enquiry.message || '')}">
                        ${escapeHtml((enquiry.message || '').substring(0, 50))}${(enquiry.message || '').length > 50 ? '...' : ''}
                    </div>
                    <div class="table-cell date">${formatDate(enquiry.created_at)}</div>
                    <div class="table-cell actions">
                        <button class="btn btn-primary btn-small" onclick="viewEnquiry(${enquiry.id})">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-danger btn-small" onclick="deleteEnquiry(${enquiry.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            }).join('');
        }

        function viewEnquiry(id) {
            const enquiry = allEnquiries.find(e => e.id == id);
            if (!enquiry) return;

            const modal = document.getElementById('enquiry-modal');
            const modalBody = document.getElementById('modal-body');
            
            modalBody.innerHTML = `
                <div class="detail-row">
                    <div class="detail-label">ID</div>
                    <div class="detail-value">#${enquiry.id}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Name</div>
                    <div class="detail-value">${escapeHtml(enquiry.name || 'N/A')}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">
                        <a href="mailto:${enquiry.email}" class="email">${escapeHtml(enquiry.email || 'N/A')}</a>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Phone</div>
                    <div class="detail-value">${escapeHtml(enquiry.phone || 'Not provided')}</div>
                </div>
                ${enquiry.product_name ? `
                <div class="detail-row">
                    <div class="detail-label">Product</div>
                    <div class="detail-value" style="color: #D4AF37; font-weight: 600;">
                        ${escapeHtml(enquiry.product_name)}${enquiry.product_category ? ' <span style="color: #666; font-weight: 400;">(' + escapeHtml(enquiry.product_category) + ')</span>' : ''}
                    </div>
                </div>
                ` : ''}
                <div class="detail-row">
                    <div class="detail-label">Message</div>
                    <div class="detail-value" style="white-space: pre-wrap;">${escapeHtml(enquiry.message || 'N/A')}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Submitted At</div>
                    <div class="detail-value">${formatDate(enquiry.created_at)}</div>
                </div>
            `;
            
            modal.classList.add('active');
        }

        function closeModal() {
            document.getElementById('enquiry-modal').classList.remove('active');
        }

        function deleteEnquiry(id) {
            if (!confirm('Are you sure you want to delete this enquiry?')) {
                return;
            }

            fetch('delete-enquiry.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    loadEnquiries();
                } else {
                    alert('Error deleting enquiry: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting enquiry');
            });
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diff = now - date;
            const minutes = Math.floor(diff / 60000);
            const hours = Math.floor(diff / 3600000);
            const days = Math.floor(diff / 86400000);

            if (minutes < 1) return 'Just now';
            if (minutes < 60) return `${minutes}m ago`;
            if (hours < 24) return `${hours}h ago`;
            if (days < 7) return `${days}d ago`;
            
            return date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Close modal on outside click
        document.getElementById('enquiry-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Auto-logout when browser/tab is closed
        // This attempts to logout when the user closes the browser or tab
        window.addEventListener('beforeunload', function() {
            // Try to send logout request (may not always complete, but session cookie will expire anyway)
            navigator.sendBeacon('?logout=1');
        });

        // Also handle page visibility change (when tab becomes hidden)
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                // Tab is now hidden - could be minimized or switched away
                // We don't logout here, but we could add activity timeout if needed
            }
        });

        // Optional: Logout after inactivity (30 minutes)
        let inactivityTimer;
        function resetInactivityTimer() {
            clearTimeout(inactivityTimer);
            inactivityTimer = setTimeout(function() {
                // Logout after 30 minutes of inactivity
                window.location.href = '?logout=1';
            }, 30 * 60 * 1000); // 30 minutes
        }

        // Reset timer on user activity
        ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart'].forEach(function(event) {
            document.addEventListener(event, resetInactivityTimer, true);
        });

        // Start the inactivity timer
        resetInactivityTimer();
    </script>
</body>
</html>
