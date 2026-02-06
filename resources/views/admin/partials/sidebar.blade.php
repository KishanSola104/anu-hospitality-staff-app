<aside class="admin-sidebar">
    <div class="sidebar-brand">
        <h2>ANU Admin</h2>
    </div>

    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>

        <a href="{{ route('admin.bookings') }}">
            <i class="fa-solid fa-calendar-check"></i> Bookings
        </a>

        <a href="{{ route('admin.vacancies') }}">
            <i class="fa-solid fa-briefcase"></i> Vacancy Applications
        </a>

        <a href="{{ route('admin.contacts') }}">
            <i class="fa-solid fa-envelope"></i> Contact Queries
        </a>
    </nav>
</aside>
