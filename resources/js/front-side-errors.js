// Email
document.getElementById("email").addEventListener("blur", function () {
    const emailInput = this;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Valid email pattern

    if (!emailPattern.test(emailInput.value)) {
        emailInput.classList.add("is-invalid");
    } else {
        emailInput.classList.remove("is-invalid");
    }
});

// Password
document.getElementById("password").addEventListener("blur", function () {
    const passwordInput = this;
    const passwordPattern =
        /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}/; // Valid password pattern

    if (!passwordPattern.test(passwordInput.value)) {
        passwordInput.classList.add("is-invalid");
    } else {
        passwordInput.classList.remove("is-invalid");
    }
});

// Bussines Name
document.getElementById("name").addEventListener("blur", function () {
    const nameInput = this;
    const namePattern = /^[A-Za-z]{2,}([ ]?[A-Za-z]{2,})*$/; // Valid name pattern
    if (!namePattern.test(nameInput.value)) {
        nameInput.classList.add("is-invalid");
    } else {
        nameInput.classList.remove("is-invalid");
    }
});

// Address
document.getElementById("address").addEventListener("blur", function () {
    const addressInput = this;
    const addressPattern =
        /^(V|v)(ia|iale|iazza|orso|argo|trada)\s+[A-Za-zÀ-ÿ'\s]+,\s*\d+[A-Za-z]?\s+[A-Za-zÀ-ÿ'\s]+(?:\s*\(?[A-Z]{2}\)?)?$/; // Valid address pattern
    if (!addressPattern.test(addressInput.value)) {
        addressInput.classList.add("is-invalid");
    } else {
        addressInput.classList.remove("is-invalid");
    }
});

// City
document.getElementById("city").addEventListener("blur", function () {
    const cityInput = this;
    const cityPattern = /^[A-Za-zà-ÿÀ-Ÿ\s]{2,}$/; // Valid city pattern
    if (!cityPattern.test(cityInput.value)) {
        cityInput.classList.add("is-invalid");
    } else {
        cityInput.classList.remove("is-invalid");
    }
});

// VAT nr
document.getElementById("VAT").addEventListener("blur", function () {
    const vatInput = this;
    const vatPattern = /^IT\d{11}$/; // Valid VAT nr pattern
    if (!vatPattern.test(vatInput.value)) {
        vatInput.classList.add("is-invalid");
    } else {
        vatInput.classList.remove("is-invalid");
    }
});

// Description
document.getElementById("description").addEventListener("blur", function () {
    const descriptionInput = this;
    const descriptionPattern = /^.{5,255}$/; // Valid description pattern
    if (!descriptionPattern.test(descriptionInput.value)) {
        descriptionInput.classList.add("is-invalid");
    } else {
        descriptionInput.classList.remove("is-invalid");
    }
});
