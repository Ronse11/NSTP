document.addEventListener("DOMContentLoaded", function () {
    const provinceSelect = document.getElementById("province");
    const citySelect = document.getElementById("city");
    const barangaySelect = document.getElementById("barangay");

    const provinceInput = document.getElementById("province_name");
    const cityInput = document.getElementById("city_name");
    const barangayInput = document.getElementById("barangay_name");

    fetch(`https://psgc.cloud/api/provinces`)
        .then(response => response.json())
        .then(provinces => {
            provinces.sort((a, b) => a.name.localeCompare(b.name));
            
            provinces.forEach(province => {
                let option = document.createElement("option");
                option.value = province.code;
                option.setAttribute("data-name", province.name);
                option.textContent = province.name;
                provinceSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error fetching provinces:", error);
        });

    provinceSelect.addEventListener("change", function () {
        const selectedOption = provinceSelect.options[provinceSelect.selectedIndex];
        const provinceCode = selectedOption.value;
        const provinceName = selectedOption.getAttribute("data-name");

        provinceInput.value = provinceName;

        citySelect.innerHTML = '<option value="" selected disabled>Select City/Municipality</option>';
        barangaySelect.innerHTML = '<option value="" selected disabled>Select Barangay</option>';
        citySelect.disabled = false;
        barangaySelect.disabled = true;

        fetch(`https://psgc.cloud/api/provinces/${provinceCode}/cities-municipalities`)
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

    citySelect.addEventListener("change", function () {
        const selectedOption = citySelect.options[citySelect.selectedIndex];
        const cityCode = selectedOption.value;
        const cityName = selectedOption.getAttribute("data-name");

        cityInput.value = cityName;

        barangaySelect.innerHTML = '<option value="" selected disabled>Select Barangay</option>';
        barangaySelect.disabled = false;

        fetch(`https://psgc.cloud/api/cities-municipalities/${cityCode}/barangays`)
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

    barangaySelect.addEventListener("change", function () {
        const selectedOption = barangaySelect.options[barangaySelect.selectedIndex];
        const barangayName = selectedOption.getAttribute("data-name");

        barangayInput.value = barangayName;
    });
});
