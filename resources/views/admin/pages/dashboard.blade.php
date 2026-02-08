@extends('admin.layouts.admin-app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-container">

    <h2 class="section-title">Admin Dashboard</h2>

    {{-- STATS --}}
    <div class="stats-grid">

        <div class="stat-card">
            <i class="fa-solid fa-calendar-check"></i>
            <h3>Total Bookings</h3>
            <p>{{ $totalBookings ?? 0 }}</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-clock"></i>
            <h3>Pending Bookings</h3>
            <p>{{ $pendingBookings ?? 0 }}</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-briefcase"></i>
            <h3>Vacancy Applications</h3>
            <p>{{ $vacancies ?? 0 }}</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-envelope"></i>
            <h3>Contact Queries</h3>
            <p>{{ $contactQueries ?? 0 }}</p>
        </div>

    </div>

    {{-- CHARTS --}}
    <div class="charts-wrapper">
        <div class="chart-box">
            <h3 class="chart-title">Bookings Overview</h3>
            <canvas id="barChart"></canvas>
        </div>

        <div class="chart-box">
            <h3 class="chart-title">Data Distribution</h3>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div>

<!-- Dashboard data for JS -->
<div
    id="dashboard-data"
    data-bookings="{{ $totalBookings ?? 0 }}"
    data-pending="{{ $pendingBookings ?? 0 }}"
    data-vacancies="{{ $vacancies ?? 0 }}"
    data-contacts="{{ $contactQueries ?? 0 }}">
</div>


@endsection
