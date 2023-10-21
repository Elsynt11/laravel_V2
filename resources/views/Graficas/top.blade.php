<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Casos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="casosChart" width="400" height="200"></canvas>
    <script>
        // Datos
        var datos = {
            labels: ["Casos Confirmados", "Casos Sospechosos", "Casos Negativos", "Defunciones"],
            datasets: [
                {
                    label: "Total de Casos",
                    data: [
                        {{ $top5CasosConfirmados}}
                       
                    ],
                    backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(255, 99, 132, 0.2)"],
                    borderColor: ["rgba(75, 192, 192, 1)", "rgba(255, 99, 132, 1)"],
                    borderWidth: 1,
                },
            ],
        };

        // Opciones
        var opciones = {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        };

        // Crear el gráfico
        var ctx = document.getElementById("casosChart").getContext("2d");
        var casosChart = new Chart(ctx, {
            type: "bar",
            data: datos,
            options: opciones,
        });
    </script>
</body>
</html>
