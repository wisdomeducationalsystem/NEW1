<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramom School Management System</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @auth
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <i class="fa-solid fa-graduation-cap"></i>
                RamomSchool
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="active"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fa-solid fa-box"></i> Inventory</a></li>
                    <li><a href="#"><i class="fa-solid fa-code-branch"></i> Branch</a></li>
                    <li><a href="{{ route('attendance.scanner') }}"><i class="fa-solid fa-calendar-check"></i> Attendance Scanner</a></li>
                    <li><a href="#"><i class="fa-solid fa-user-shield"></i> 2 FA Security</a></li>
                    <li><a href="#"><i class="fa-solid fa-desktop"></i> Frontend</a></li>
                    <li><a href="#"><i class="fa-solid fa-bell"></i> Reception</a></li>
                    <li><a href="#"><i class="fa-solid fa-user-plus"></i> Admission</a></li>
                    <li><a href="#"><i class="fa-solid fa-users"></i> Student Details</a></li>
                    <li><a href="#"><i class="fa-solid fa-users-line"></i> Parents</a></li>
                    <li><a href="#"><i class="fa-solid fa-user-tie"></i> Employee</a></li>
                    <li><a href="#"><i class="fa-solid fa-id-card"></i> Card Management</a></li>
                </ul>
            </div>
        </nav>

        <!-- Main Panel -->
        <div class="main-panel">
            <header class="topbar">
                <div class="topbar-left">
                    <i class="fa-solid fa-bars" style="cursor: pointer;"></i>
                    <i class="fa-solid fa-expand" style="cursor: pointer;"></i>
                    <i class="fa-solid fa-calculator" style="cursor: pointer;"></i>
                    <div class="search-bar">
                        <input type="text" placeholder="Search">
                        <i class="fa-solid fa-search text-secondary"></i>
                    </div>
                </div>
                <div class="topbar-right">
                    <i class="fa-solid fa-globe"></i>
                    <i class="fa-solid fa-calendar"></i>
                    <i class="fa-solid fa-flag"></i>
                    <i class="fa-regular fa-bell"></i>
                    <div style="display:flex; align-items:center; gap:10px;">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=random" alt="User" style="width: 30px; border-radius: 50%;">
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; color:white; cursor:pointer;"><i class="fa-solid fa-sign-out"></i></button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>
    @else
        @yield('content')
    @endauth

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    @yield('scripts')
</body>
</html>
