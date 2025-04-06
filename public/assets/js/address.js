document.addEventListener("DOMContentLoaded", function () {
    const provinceSelect = document.getElementById("province");
    const citySelect = document.getElementById("city");
    const barangaySelect = document.getElementById("barangay");

    const provinceInput = document.getElementById("province_name");
    const cityInput = document.getElementById("city_name");
    const barangayInput = document.getElementById("barangay_name");

    // Fetch provinces
    fetch("https://psgc.gitlab.io/api/provinces.json")
        .then(response => response.json())
        .then(data => {
            data.sort((a, b) => a.name.localeCompare(b.name)); 
            data.forEach(province => {
                let option = document.createElement("option");
                option.value = province.code;
                option.setAttribute("data-name", province.name);
                option.textContent = province.name;
                provinceSelect.appendChild(option);
            });
        });

    // Handle province selection
    provinceSelect.addEventListener("change", function () {
        let selectedOption = provinceSelect.options[provinceSelect.selectedIndex];
        let provinceCode = selectedOption.value;
        let provinceName = selectedOption.getAttribute("data-name");

        provinceInput.value = provinceName; // Save name

        citySelect.innerHTML = '<option value="" selected disabled>Select City/Municipality</option>';
        barangaySelect.innerHTML = '<option value="" selected disabled>Select Barangay</option>';
        citySelect.disabled = false;
        barangaySelect.disabled = true;

        // Fetch cities
        fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities.json`)
            .then(response => response.json())
            .then(data => {
                data.sort((a, b) => a.name.localeCompare(b.name));
                data.forEach(city => {
                    let option = document.createElement("option");
                    option.value = city.code;
                    option.setAttribute("data-name", city.name);
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
            });
    });

    // Handle city selection
    citySelect.addEventListener("change", function () {
        let selectedOption = citySelect.options[citySelect.selectedIndex];
        let cityCode = selectedOption.value;
        let cityName = selectedOption.getAttribute("data-name");

        cityInput.value = cityName; // Save name

        barangaySelect.innerHTML = '<option value="" selected disabled>Select Barangay</option>';
        barangaySelect.disabled = false;

        // Fetch barangays
        fetch(`https://psgc.gitlab.io/api/cities/${cityCode}/barangays.json`)
            .then(response => response.json())
            .then(data => {
                data.sort((a, b) => a.name.localeCompare(b.name));
                data.forEach(barangay => {
                    let option = document.createElement("option");
                    option.value = barangay.code;
                    option.setAttribute("data-name", barangay.name);
                    option.textContent = barangay.name;
                    barangaySelect.appendChild(option);
                });
            });
    });

    // Handle barangay selection
    barangaySelect.addEventListener("change", function () {
        let selectedOption = barangaySelect.options[barangaySelect.selectedIndex];
        let barangayName = selectedOption.getAttribute("data-name");

        barangayInput.value = barangayName; // Save name
    });
});
