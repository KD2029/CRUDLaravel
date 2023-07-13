<!DOCTYPE html>
<html>
<head>
  <title>Meal Input Form</title>
  <link rel="stylesheet" type="text/css" href="{{ url('css/register-5.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function showFields() {
      var mealType = document.getElementById('meal_type').value;
      var mainSection = document.getElementById('main_section');
      var sauceSection = document.getElementById('sauce_section');
      var sideSection = document.getElementById('side_section');


       // Clear the LastMealInput field
      document.getElementById('last_meal').value = '';

      // Hide all sections
      mainSection.style.display = 'none';
      sauceSection.style.display = 'none';
      sideSection.style.display = 'none';

      // Show the section based on the meal type
      if (mealType === 'breakfast') {
        mainSection.style.display = 'block';
        sauceSection.style.display = 'block';
        sideSection.style.display = 'block';
        // Call the getFoodsByMealType function
        getFoodsByMealType('breakfast');
      } else if (mealType === 'lunch') {
        mainSection.style.display = 'block';
        sauceSection.style.display = 'block';
        sideSection.style.display = 'block';
        // Call the getFoodsByMealType function
        getFoodsByMealType('lunch');
      } else if (mealType === 'dinner') {
        mainSection.style.display = 'block';
        sauceSection.style.display = 'block';
        sideSection.style.display = 'block';
        // Call the getFoodsByMealType function
        getFoodsByMealType('dinner');
      }
    }

    function getFoodsByMealType(mealType) {
      // Make an AJAX request to retrieve the foods based on the meal type
      // Update the select fields with the retrieved foods
      // AJAX request to update select fields
      


      $.ajax({
        url: '/get-foods/' + mealType,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          // Handle the response and update the select fields
          console.log(response.mainFoods);
         
          var mainFoods = response.mainFoods;
          var sauceFoods = response.sauceFoods;
          var sideFoods = response.sideFoods;

          // Update the select fields
          updateOptions(mainFoods, 'main_food');
          updateOptions(sauceFoods, 'sauce_food');
          updateOptions(sideFoods, 'side_food');

          // Show the select fields
          // showFields();
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    }
       // Function to update select options
    function updateOptions(options, selectId) {
      var selectField = document.getElementById(selectId);
      selectField.innerHTML = '';

      // Add the default option only if it doesn't already exist
    if (selectField.options.length === 0) {
      var defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.text = 'Select a ' + selectId;
      selectField.appendChild(defaultOption);
    }

      // Add the options
      // Convert object to an array of key-value pairs
      var optionsArray = Object.entries(options);
          console.log(optionsArray);
     
      optionsArray.forEach(function(pair) {
      var value = pair[0];
      var text = pair[1];
      var optionElement = document.createElement('option');
      optionElement.value = value;
      optionElement.text = text;
      selectField.appendChild(optionElement);
    });


    }

    
   

   // Update last_meal input with selected values
   function updateLastMealInput() {
  var mainFoodSelect = document.getElementById('main_food');
  var sauceFoodSelect = document.getElementById('sauce_food');
  var sideFoodSelect = document.getElementById('side_food');
  var lastMealInput = document.getElementById('last_meal');

  var selectedMainFood = mainFoodSelect.options[mainFoodSelect.selectedIndex].text;
  var selectedSauceFood = sauceFoodSelect.options[sauceFoodSelect.selectedIndex].text;
  var selectedSideFood = sideFoodSelect.options[sideFoodSelect.selectedIndex].text;
 
  console.log(selectedMainFood);

  lastMealInput.value = '';

  if (selectedMainFood !== '') {
    lastMealInput.value += selectedMainFood + ', ';
  }
  if (selectedSauceFood !== '') {
    lastMealInput.value += selectedSauceFood + ', ';
  }
  if (selectedSideFood !== '') {
    lastMealInput.value += selectedSideFood;
  }
}




    // Attach the function to the change event of the select fields
    // $('#main_food, #sauce_food, #side_food').change(updateLastMealInput(this.value));
  

    
  </script>
</head>
<body>
  <div class="container">
    <h2>Meal Input Form</h2>
    <form action="route{{url('api_call') }}" method="post">
      @csrf
      <div class="form-section">
        <label for="last_meal">Last Meal:</label>
        <input type="text" id="last_meal" name="last_meal" required>
      </div>

      <div class="form-section">
        <label for="meal_type">Meal Type:</label>
        <select id="meal_type" name="meal_type" onchange="showFields();" required>
          <option value="" selected>Select Meal Type</option>
          <option value="breakfast">Breakfast</option>
          <option value="lunch">Lunch</option>
          <option value="dinner">Dinner</option>
        </select>
      </div>

      <div class="form-section" id="main_section" style="display: none;">
        <h3>Main Food</h3>
        <label for="main_food">Main:</label>
        <select id="main_food" name="main_food" onchange="updateLastMealInput(this.value)" required>
          <option value="">Select Main Food</option>
        </select>
      </div>

      <div class="form-section" id="sauce_section" style="display: none;">
        <h3>Sauce Food</h3>
        <label for="sauce_food">Sauce:</label>
        <select id="sauce_food" name="sauce_food"  onchange="updateLastMealInput(this.value)" required>
          <option value="">Select Sauce Food</option>
        </select>
      </div>

      <div class="form-section" id="side_section" style="display: none;">
        <h3>Side Food</h3>
        <label for="side_food">Side:</label>
        <select id="side_food" name="side_food"  onchange="updateLastMealInput(this.value)" required>
          <option value="">Select Side Food</option>
        </select>
      </div>

      <div class="form-section">
        <input type="submit" value= "submit" >  
      </div>
    </form>
  </div>
  <script>
    // Update the last meal input when the page is loaded
    $(document).ready(function() {
      updateLastMealInput();
    });
  </script>

  
</body>
</html>
