@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/insumos.css') }}">

<div class="dashboard-box">
    <h1>📊 Estadísticas De Insumos</h1>

    <div class="dashboard-grid">
        <!-- Donut -->
        <div class="chart-box">
            <h3>Insumos</h3>
            <canvas id="donutChart"></canvas>
            <ul class="legend">
                <li><span style="color:#2563eb;">●</span> Predicciones: 30%</li>
                <li><span style="color:#000000;">●</span> Actuales: 50%</li>
                <li><span style="color:#ea580c;">●</span> Pasadas: 20%</li>
            </ul>
        </div>

        <!-- Barras -->
        <div class="chart-box">
            <h3>Ventas Mensuales</h3>
            <canvas id="barChart"></canvas>
        </div>

        <!-- Tarjetas -->
        <div class="summary-cards">
            <div class="card">
                <div>
                    <div class="title">Productos</div>
                    <div class="value">48.2K</div>
                </div>
                <div class="percent blue">3.1% ↑</div>
            </div>
            <div class="card">
                <div>
                    <div class="title">Stock</div>
                    <div class="value">33.6K</div>
                </div>
                <div class="percent red">12.6% ↓</div>
            </div>
            <div class="card">
                <div>
                    <div class="title">Ventas</div>
                    <div class="value">24.6K</div>
                </div>
                <div class="percent blue">26.3% ↑</div>
            </div>
            <div class="card">
                <div>
                    <div class="title">Precios</div>
                    <div class="value">15.3K</div>
                </div>
                <div class="percent orange">14.8% ↑</div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Donut Chart
    const ctx1 = document.getElementById('donutChart');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Predicciones', 'Actuales', 'Pasadas'],
            datasets: [{
                data: [30, 50, 20],
                backgroundColor: ['#2563eb', '#000000', '#ea580c'],
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });

    // Bar Chart
    const ctx2 = document.getElementById('barChart');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
            datasets: [{
                label: 'Ventas',
                data: [20,40,60,80,60,40,50,90,70,60,80,100],
                backgroundColor: '#6366F1',
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });
</script>
@endsection
