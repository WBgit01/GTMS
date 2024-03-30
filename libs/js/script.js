// Note: Gawa ng file name "scripts.js" and paste yung code below ayaw ma-send sa messenger yung .js file hehe. -_-



document.addEventListener("DOMContentLoaded", function() {
    fetchOrders();
});

function fetchOrders() {
    fetch('fetch-orders.php') // Fetch data from the 'fetch-orders.php'
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#ordersTableBody'); // Select the tbody element
            tableBody.innerHTML = ''; // Clear existing content
            data.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.id}</td>
                    <td>${order.firstname}</td>
                    <td>${order.lastname}</td>
                    <td>${order.student_id}</td>
                    <td>${order.access_level}</td>
                    <td>${order.email_address}</td>
                    <td>${order.contact_no}</td>
                    <td>${order.created}</td>
                `;
                tableBody.appendChild(row); // Append row to tbody
            });
        })
        .catch(error => console.error('Error fetching orders:', error));
}

