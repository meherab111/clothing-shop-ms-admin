        function updateDateTime() {
            // Make an AJAX request to get the current date and time from the server
            const xhttp = new XMLHttpRequest();
           xhttp.onload = function() {
                if (xhttp.status == 200) {
                    // Update the content of the element with the received data
                    document.getElementById("datetime").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "get_time.php");
            xhttp.send();
        }

        // Update the date and time every second
        setInterval(updateDateTime, 1000);

        // Trigger the updateDateTime function when the page loads
        window.onload = function() {
            updateDateTime();
        };

