import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    // Dati generati dal backend
    const data = JSON.parse(document.querySelector('meta[name="statistics"]').content);

    // Prepara i dati per il grafico
    const labels = data.map(d => `${d.month}/${d.year}`);
    const ordersCount = data.map(d => d.orders_count);
    const totalSales = data.map(d => d.total_sales);

    // Configura il grafico
    const ctx = document.getElementById('ordersChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Numero di Ordini',
                    data: ordersCount,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Vendite Totali (€)',
                    data: totalSales,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
