<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cocktail Details</title>
</head>
<body>
  <div class="container mx-auto justify-center items-center p-10">
    <header class="text-center text-red-500 font-bold text-3xl mt-10">Cocktail Details</header>
    <div class="mt-8" id="cocktailDetails">
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var urlParams = new URLSearchParams(window.location.search);
      var cocktailId = urlParams.get('id');

      $.get(`https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=${cocktailId}`, function(data) {
        var cocktail = data.drinks[0];
        $('#cocktailDetails').html(`
          <div class="card bg-gray-100 border border-gray-300 rounded-md p-4">
            <img src="${cocktail.strDrinkThumb}" class="w-full rounded-md mb-2" alt="${cocktail.strDrink}">
            <h3 class="text-lg font-semibold">${cocktail.strDrink}</h3>
            <p class="text-gray-600">${cocktail.strCategory}</p>
            <p class="text-gray-600">${cocktail.strInstructions}</p>
            <!-- Add more details as needed -->
          </div>
        `);
      });
    });
  </script>
</body>
</html>
