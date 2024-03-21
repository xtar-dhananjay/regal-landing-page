document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.querySelector('tbody');
    const loadMoreButton = document.getElementById('loadmore');
    let currentPage = 1;
    let countno = 1;

    // Function to fetch data from the API
    function fetchData(page, perPage) {
        fetch(`http://localhost/regal/Admin/php/getData.php?page=${page}&per_page=${perPage}`)
            .then(response => response.json())
            .then(data => {
                // Clear existing table rows
                // tableBody.innerHTML = '';

                // Loop through the data and create table rows
                data.forEach(item => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${countno++}</td>
                        <td>${item.name}</td>
                        <td>${item.phoneNo}</td>
                        <td>${item.dateTime}</td>
                        <td><button class="deleteBtn" deleteid="${item.id}"><i class="fa-solid fa-trash"></i></button></td>
                    `;
                    tableBody.appendChild(row);
                });

                // Show or hide load more button based on data length
                if (data.length < perPage) {
                    loadMoreButton.style.display = 'none';
                } else {
                    loadMoreButton.style.display = 'block';
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Initial data load
    fetchData(currentPage, 10);

    // Event listener for load more button
    loadMoreButton.addEventListener('click', function () {
        currentPage++;
        fetchData(currentPage, 10);
    });
});


// for delete action
// Add an event listener to the table body
document.getElementById('tableBody').addEventListener('click', function(event) {
    if (event.target.tagName === 'BUTTON') {
        // If the clicked element is a button
        const row = event.target.closest('tr'); // Find the closest table row
        const id = row.querySelector('td .deleteBtn').getAttribute('deleteid'); // Assuming the first cell contains the ID
        console.log(id);
        // Send a DELETE request to your PHP API
        fetch(`http://localhost/regal/Admin/php/delete.php?id=${id}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (response.ok) {
                // If the response is successful, remove the table row
                row.remove();
            } else {
                // If there is an error, log it
                console.error('Error deleting record:', response.statusText);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
