document.addEventListener("DOMContentLoaded", () => {
    // Graphique des transactions par mois
    Highcharts.chart('graph-transactions', {
        chart: { type: 'column' },
        title: { text: 'Transactions mensuelles' },
        xAxis: {
            categories: dataTransactions.map(item => item.mois),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: { text: 'Nombre de transactions' }
        },
        series: [{
            name: 'Transactions',
            data: dataTransactions.map(item => parseInt(item.total))
        }]
    });

    // Graphique clients vs propriétés par adresse
    Highcharts.chart('graph-adresse', {
        chart: { type: 'bar' },
        title: { text: 'Clients vs Propriétés par Adresse' },
        xAxis: {
            categories: dataAdresses.map(a => a.adresse),
            title: { text: 'Adresse' }
        },
        yAxis: {
            min: 0,
            title: { text: 'Quantité' }
        },
        series: [
            {
                name: 'Clients',
                data: dataAdresses.map(a => parseInt(a.total_clients))
            },
            {
                name: 'Propriétés',
                data: dataAdresses.map(a => parseInt(a.total_proprietes))
            }
        ]
    });
});
