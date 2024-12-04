const deleteButtons = document.querySelectorAll(".permanently-delete");

deleteButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
        const plateName = event.target.getAttribute("delete-data-name");
        const userConfirmed = confirm(
            `Are you sure you want to PERMANENTLY delete ${plateName} ?`
        );

        if (!userConfirmed) {
            event.preventDefault();
        }
    });
});
