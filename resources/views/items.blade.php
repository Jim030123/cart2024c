<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Items List</h1>
        <table class="table table-bordered" id="itemsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>                    
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated here by JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        function fetchItems(){
        $(document).ready(function() {
            // Fetch data from the /items endpoint
            $.ajax({
                url: '/items', // URL to fetch data
                method: 'GET', // HTTP Method
                success: function(data) {
                    let tableBody = $('#itemsTable tbody');
                    tableBody.empty(); // Clear the table body
                    // Loop through the JSON data and append rows to the table
                    data.forEach(item => {
                        tableBody.append(`
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>${item.description}</td>
                                <td>${item.price}</td>                                
                                <td>${item.quantity}</td>
                            </tr>
                        `);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching items:', error);
                }
            });
        });
    }
        // Fetch items every 5 seconds
        setInterval(fetchItems, 5000);
        fetchItems(); // Initial fetch
    </script>
</body>
</html>
