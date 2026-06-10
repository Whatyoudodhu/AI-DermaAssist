<div class="ml-64 p-8 bg-gray-100 min-h-screen">

<h1 class="text-2xl font-semibold mb-6">Dashboard</h1>

<!-- TOP CARDS -->
<div class="grid grid-cols-3 gap-6 mb-8">

<div class="bg-white p-6 rounded-2xl shadow-sm">
    <p class="text-gray-500 text-sm">Total Users</p>
    <h2 class="text-2xl font-bold mt-2"><?= $totalUsers ?></h2>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm">
    <p class="text-gray-500 text-sm">Total Products</p>
    <h2 class="text-2xl font-bold mt-2"><?= $totalProducts ?></h2>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm">
    <p class="text-gray-500 text-sm">Total Analysis</p>
    <h2 class="text-2xl font-bold mt-2"><?= $totalAnalysis ?></h2>
</div>

</div>

<!-- CHART + CARD -->
<div class="grid grid-cols-3 gap-6">

<!-- CHART -->
<div class="col-span-2 bg-white p-6 rounded-2xl shadow-sm">
    <h2 class="text-lg font-semibold mb-4">Skin Problem Trend</h2>
    <canvas id="chart"></canvas>
</div>

<!-- SIDE CARD -->
<div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-6 rounded-2xl shadow-sm">

    <h3 class="text-lg font-semibold mb-2">Insights</h3>

    <p class="text-sm opacity-90 mb-4">
        Monitor user skin trends and product performance.
    </p>

    <button class="bg-white text-blue-600 px-4 py-2 rounded-lg text-sm font-medium">
        View Details
    </button>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const data = <?= json_encode($trend) ?>;

const labels = data.map(d => d.problem);
const values = data.map(d => d.total);

new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Trend',
            data: values
        }]
    }
});
</script>