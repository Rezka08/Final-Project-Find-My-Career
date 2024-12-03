@extends('admin.layouts.main', ['title' => 'Admin Dashboard'])

@section('content')
    <!-- Header Section -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center mb-4">
                <div class="col-sm-6">
                    <h1 class="dashboard-title">Welcome Back, Admin!</h1>
                    <p class="dashboard-subtitle">Here's your administration control panel</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="dashboard-content">
                <!-- Welcome Message -->
                <div class="welcome-section">
                    <h2>Control Panel Overview</h2>
                    <p class="lead">From this dashboard, you can manage and monitor all aspects of your job portal platform.</p>
                </div>

                <!-- Key Areas -->
                <div class="key-areas mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-card">
                                <h3>User Management</h3>
                                <p>Manage registered users, review applications, and oversee user activities across the platform.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-card">
                                <h3>Job Listings</h3>
                                <p>Monitor job postings, verify company information, and ensure quality content for job seekers.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-card">
                                <h3>Platform Settings</h3>
                                <p>Configure system settings, manage permissions, and maintain platform functionality.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Responsibilities -->
                <div class="responsibilities mt-4">
                    <h3>Your Administrative Duties</h3>
                    <ul class="duty-list">
                        <li>Monitor and manage user registrations and profiles</li>
                        <li>Review and approve job postings from companies</li>
                        <li>Ensure platform security and data integrity</li>
                        <li>Respond to user inquiries and support requests</li>
                        <li>Maintain and update platform content</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<style>
.dashboard-title {
    font-size: 2rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.dashboard-subtitle {
    color: #6c757d;
    font-size: 1.1rem;
    margin: 0;
}

.welcome-section {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    margin-bottom: 2rem;
}

.welcome-section h2 {
    color: #2c3e50;
    font-size: 1.75rem;
    margin-bottom: 1rem;
}

.welcome-section .lead {
    color: #6c757d;
    font-size: 1.1rem;
    margin-bottom: 0;
}

.info-card {
    background: white;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    height: 100%;
}

.info-card h3 {
    color: #3498db;
    font-size: 1.35rem;
    margin-bottom: 1rem;
}

.info-card p {
    color: #6c757d;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 0;
}

.responsibilities {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
}

.responsibilities h3 {
    color: #2c3e50;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
}

.duty-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.duty-list li {
    padding: 0.75rem 0;
    border-bottom: 1px solid #eee;
    color: #6c757d;
    position: relative;
    padding-left: 1.5rem;
}

.duty-list li:before {
    content: "•";
    color: #3498db;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.duty-list li:last-child {
    border-bottom: none;
}

@media (max-width: 768px) {
    .dashboard-title {
        font-size: 1.75rem;
    }

    .info-card {
        margin-bottom: 1rem;
    }
}
</style>
@endsection