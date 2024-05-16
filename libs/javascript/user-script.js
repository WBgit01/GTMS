// document.getElementById('editButton').addEventListener('click', changePicture);

//     function changePicture() {
//         var newPicture = prompt("Enter the URL of the new picture:");
//         if (newPicture !== null && newPicture.trim() !== "") {
//             document.getElementById('userImage').src = newPicture;
//         }
//     }

document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll('.menu li a');

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            // Prevent the default action of the link
            event.preventDefault();

            // Toggle the active class of the clicked link's parent li
            link.parentNode.classList.toggle('active');

            // Store the active link's href in local storage
            if (link.parentNode.classList.contains('active')) {
                localStorage.setItem('activeLink', link.getAttribute('href'));
            } else {
                localStorage.removeItem('activeLink');
            }

            // Navigate to the clicked link's href
            window.location.href = link.getAttribute('href');
        });
    });


    // Check if there is an active link stored in local storage
    var activeLink = localStorage.getItem('activeLink');
    if (activeLink) {
        var activeElement = document.querySelector('.menu li a[href="' + activeLink + '"]');
        if (activeElement) {
            activeElement.parentNode.classList.add('active');
        }
    }
});




