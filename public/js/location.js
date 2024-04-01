document.addEventListener("DOMContentLoaded", function () {
  const countrySelect = document.querySelector("#country");
  const citySelect = document.querySelector("#city");

  // Initially hide all cities
  const cities = citySelect.querySelectorAll("option");
  for (let i = 1; i < cities.length; i++) {
    cities[i].style.display = "none";
  }

  // Show cities corresponding to the selected country
  countrySelect.addEventListener("change", function () {
    const selectedCountryId = countrySelect.selectedOptions[0].id; // Get the id attribute of the selected option
    cities.forEach(function (city) {
      if (city.getAttribute("id") === selectedCountryId) {
        city.style.display = "";
      } else {
        city.style.display = "none";
      }
    });
  });
});
