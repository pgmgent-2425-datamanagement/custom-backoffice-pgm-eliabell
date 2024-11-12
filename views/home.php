<h1 class="text-2xl font-bold mb-4"><?php echo $title; ?></h1>

<!-- Chart for Total Books -->
<canvas id="totalBooksChart" width="400" height="200"></canvas>
<canvas id="totalAuthorsChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for Total Books Chart
    const totalBooksData = <?php echo json_encode([$totalBooks]); ?>;
    const totalAuthorsData =  <?php echo json_encode([$totalAuthors]); ?>;

    // Total Books Chart
    const booksCtx = document.getElementById('totalBooksChart').getContext('2d');
    const authorsCtx = document.getElementById('totalAuthorsChart').getContext('2d');

    const totalBooksChart = new Chart(booksCtx, {
        type: 'bar',
        data: {
            labels: ['Total Books'],
            datasets: [{
                label: 'Total Books',
                data: totalBooksData,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: { title: { display: true, text: 'Category' }},
                y: { beginAtZero: true, title: { display: true, text: 'Number of Books' }}
            },
            plugins: {
                legend: { display: true, position: 'top' }
            }
        }
    });

    const totalAuthorsChart = new Chart(authorsCtx, {
        type: 'bar',
        data: {
            labels: ['Total Authors'],
            datasets: [{
                label: 'Total Authors',
                data: totalAuthorsData,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: { title: { display: true, text: 'Category' }},
                y: { beginAtZero: true, title: { display: true, text: 'Number of Authors' }}
            },
            plugins: {
                legend: { display: true, position: 'top' }
            }
        }
    });
</script>