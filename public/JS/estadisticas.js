// public/js/charts.js

/**
 * Inicializa los tres gráficos en un dashboard de estadísticas.
 * @param {string[]} topAltoLabels
 * @param {number[]} topAltoData
 * @param {string[]} topBajoLabels
 * @param {number[]} topBajoData
 * @param {string[]} catLabels
 * @param {number[]} catData
 */
function initStatisticsCharts(
    topAltoLabels,
    topAltoData,
    topBajoLabels,
    topBajoData,
    catLabels,
    catData
) {
    // Gráfico Top Alto
    new Chart(document.getElementById("chartTopAlto"), {
        type: "bar",
        data: {
            labels: topAltoLabels,
            datasets: [{ label: "Stock Actual", data: topAltoData }],
        },
        options: { responsive: true },
    });

    // Gráfico Top Bajo
    new Chart(document.getElementById("chartTopBajo"), {
        type: "bar",
        data: {
            labels: topBajoLabels,
            datasets: [{ label: "Stock Actual", data: topBajoData }],
        },
        options: { responsive: true },
    });

    // Gráfico Categorías
    new Chart(document.getElementById("chartCategorias"), {
        type: "pie",
        data: {
            labels: catLabels,
            datasets: [{ label: "Total Productos", data: catData }],
        },
        options: { responsive: true },
    });
}
