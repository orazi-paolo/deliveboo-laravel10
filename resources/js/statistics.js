import Chart from 'chart.js/auto';
/* import { Utils } from 'chart.js/helpers'; */
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
                    label: 'Numbers of Orders',
                    data: ordersCount,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Total Sales (€)',
                    data: totalSales,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    type: 'logarithmic',
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return Number(value).toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Numbers of Orders & Total Sales',
                    color: '#00CDBC',
                    font: {
                        size: 18
                    }
                }
            }
        },
    });

    const ctx2 = document.getElementById('totalSalesChart').getContext('2d');
    new Chart(ctx2, {
        type: 'polarArea',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Total Sales (€)',
                    data: totalSales,
                    /* borderColor: 'rgba(255, 99, 132, 1)', */
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    type: 'linear',
                    beginAtZero: true,
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Sales',
                    color: '#00CDBC',
                    font: {
                        size: 18
                    }
                }
            }
        }
    });

    const ctx3 = document.getElementById('ordersCountChart').getContext('2d');
    new Chart(ctx3, {
        type: 'polarArea',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Numbers of Orders',
                    data: ordersCount,
                    /* backgroundColor: Object.values(Utils.CHART_COLORS), */
                    /* borderColor: 'rgba(255, 99, 132, 1)', */
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    type: 'linear',
                    beginAtZero: true,
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Number of Orders',
                    color: '#00CDBC',
                    font: {
                        size: 18
                    }
                },

            }
        }

    });
});


