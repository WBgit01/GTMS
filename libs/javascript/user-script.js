document.getElementById('editButton').addEventListener('click', changePicture);

    function changePicture() {
        var newPicture = prompt("Enter the URL of the new picture:");
        if (newPicture !== null && newPicture.trim() !== "") {
            document.getElementById('userImage').src = newPicture;
        }
    }