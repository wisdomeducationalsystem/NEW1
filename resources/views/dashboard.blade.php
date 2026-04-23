@extends('layouts.app')

@section('content')
<div class="page-title">
    <i class="fa-solid fa-house"></i> All Branch Dashboard
</div>

<div class="row" style="margin-bottom: 20px;">
    <!-- Income Vs Expense Chart -->
    <div class="col col-6">
        <div class="card">
            <h3 class="card-title">Income Vs Expense Of April</h3>
            <div class="chart-container">
                <canvas id="incomeExpenseChart"></canvas>
            </div>
            <div style="text-align: center; margin-top: 15px; display: flex; justify-content: center; gap: 20px;">
                <span style="font-size: 12px;"><i class="fa-solid fa-circle" style="color: #1d8cf8;"></i> Income</span>
                <span style="font-size: 12px;"><i class="fa-solid fa-circle" style="color: #fd5d93;"></i> Expense</span>
            </div>
        </div>
    </div>

    <!-- Annual Fee Summary Chart -->
    <div class="col col-6">
        <div class="card">
            <h3 class="card-title">Annual Fee Summary</h3>
            <div class="chart-container">
                <canvas id="annualFeeChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row">
    <div class="col col-3">
        <div class="stat-card bg-blue">
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div>
                    <i class="fa-solid fa-users icon"></i>
                    <div class="label">Employee</div>
                </div>
                <div class="value">6</div>
            </div>
            <div class="progress-container">
                <div class="progress-label">TOTAL STRENGTH</div>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col col-3">
        <div class="stat-card bg-blue">
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div>
                    <i class="fa-solid fa-graduation-cap icon"></i>
                    <div class="label">Students</div>
                </div>
                <div class="value">11</div>
            </div>
            <div class="progress-container">
                <div class="progress-label">TOTAL STRENGTH</div>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-3">
        <div class="stat-card bg-blue">
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div>
                    <i class="fa-solid fa-user-group icon"></i>
                    <div class="label">Parents</div>
                </div>
                <div class="value">5</div>
            </div>
            <div class="progress-container">
                <div class="progress-label">TOTAL STRENGTH</div>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-3">
        <div class="stat-card bg-blue">
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div>
                    <i class="fa-solid fa-chalkboard-user icon"></i>
                    <div class="label">Teachers</div>
                </div>
                <div class="value">8</div>
            </div>
            <div class="progress-container">
                <div class="progress-label">TOTAL STRENGTH</div>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Income Vs Expense Doughnut Chart
        const ctxIncome = document.getElementById('incomeExpenseChart').getContext('2d');
        new Chart(ctxIncome, {
            type: 'doughnut',
            data: {
                labels: ['Income', 'Expense'],
                datasets: [{
                    data: [45, 55],
                    backgroundColor: ['#1d8cf8', '#fd5d93'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // Annual Fee Summary Line Chart
        const ctxFee = document.getElementById('annualFeeChart').getContext('2d');
        
        let gradientBlue = ctxFee.createLinearGradient(0, 0, 0, 300);
        gradientBlue.addColorStop(0, 'rgba(29, 140, 248, 0.4)');
        gradientBlue.addColorStop(1, 'rgba(29, 140, 248, 0)');

        let gradientPurple = ctxFee.createLinearGradient(0, 0, 0, 300);
        gradientPurple.addColorStop(0, 'rgba(225, 78, 202, 0.4)');
        gradientPurple.addColorStop(1, 'rgba(225, 78, 202, 0)');

        new Chart(ctxFee, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Total',
                        data: [1500, 2800, 6500, 4000, 2000, 5000, 500, 0, 0, 0, 0, 0],
                        borderColor: '#e14eca',
                        backgroundColor: gradientPurple,
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#e14eca'
                    },
                    {
                        label: 'Collected',
                        data: [800, 1200, 3800, 2500, 1000, 2800, 200, 0, 0, 0, 0, 0],
                        borderColor: '#1d8cf8',
                        backgroundColor: gradientBlue,
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#1d8cf8'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { color: '#9a9a9a' }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: '#9a9a9a' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#9a9a9a' }
                    }
                }
            }
        });
    });
</script>
@endsection
