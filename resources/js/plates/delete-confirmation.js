const deleteButtons = document.querySelectorAll(".delete-btn");

deleteButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
        const plateName = event.target.getAttribute("delete-data-name");
        const userConfirmed = confirm(
            `Are you sure you want to delete ${plateName} ?`
        );

        if (!userConfirmed) {
            event.preventDefault();
        }
    });
});
