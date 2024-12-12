import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const data = JSON.parse(document.querySelector('meta[name="statistics"]').content);

    const labels = data.map(d => `${d.month}/${d.year}`);
    const ordersCount = data.map(d => d.orders_count);
    const totalSales = data.map(d => d.total_sales);

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
            scales: {
                y: {
                    type: 'logarithmic', // Imposta l'asse logaritmico
                    beginAtZero: true,   // Mostra l'origine
                    ticks: {
                        callback: function(value) {
                            return Number(value).toLocaleString(); // Formattazione dei valori
                }
            }
        }
    }
}
    });
});
