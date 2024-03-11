<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>The Cocktail</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
  <div class="container mx-auto justify-center items-center p-10">
    <header class="text-center text-red-500 font-bold text-3xl mt-10">The Cocktail</header>
    <main class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-8" id="cocktailList">
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $.get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f=a', function(data) {
        $.each(data.drinks, function(index, cocktail) {
          var $cocktailItem = $(`
            <a href="cocktail-details?id=${cocktail.idDrink}" class="card bg-gray-100 border border-gray-300 rounded-md p-4 cursor-pointer">
              <img src="${cocktail.strDrinkThumb}" class="w-full rounded-md mb-2" alt="${cocktail.strDrink}">
              <h3 class="text-lg font-semibold">${cocktail.strDrink}</h3>
              <p class="text-gray-600">${cocktail.strCategory}</p>
            </a>
          `);
          $('#cocktailList').append($cocktailItem);
        });
      });
    });
  </script>
</body>
</html>