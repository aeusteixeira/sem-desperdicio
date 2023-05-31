// Get the form element
const recipeForm = document.getElementById('recipe-form');

// Check if the API key is provided
const OPENAI_API_KEY = "";

if (OPENAI_API_KEY === "") {
    const errorMessage = document.createElement('span');
    errorMessage.style.color = "#f00";
    errorMessage.textContent = "Por favor, configure a chave da API OpenAI no arquivo js/app.js";
    document.getElementById('recipe-form').appendChild(errorMessage);
}

// Proceed if the recipe form element exists on the page
if (recipeForm) {
    // Wait for the user to submit the recipe
    recipeForm.addEventListener("submit", async (e) => {
        // Prevent page reload
        e.preventDefault();
        
        // Replace the submit button text with "Interpreting..."
        let loadingEmojis = ['🥦', '🥕', '🥬', '🥒', '🌽', '🥑'];
        let intervalId;
        let counter = 0;

        intervalId = setInterval(() => {
            let emoji = loadingEmojis[counter % loadingEmojis.length];
            document.getElementById('recipe-btn').value = emoji + " Gerando a sua receita...";
            counter++;
        }, 500);

        // Get the value of the recipe field
        const recipeInput = document.getElementById('food-input');
        const recipe = recipeInput.value;
        const prompt = `Atue como um chef de cozinha e interprete a receita abaixo:\n\n${recipe}\n\nEu preciso que você interprete a receita de forma detalhada, com base na culinária. Por favor`;

        // Display the entered recipe
        document.getElementById('food-situation').textContent = recipe;

        // Clear the solution
        document.getElementById('food-situation').innerHTML = "<span></span>";

        // Send a request to the recipe solution API
        try {
            const response = await fetch("https://api.openai.com/v1/completions", {
                method: "POST",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + OPENAI_API_KEY,
                },
                body: JSON.stringify({
                    model: "text-davinci-003", // Model
                    prompt: prompt, // Recipe text
                    max_tokens: 2048, // Response length
                    temperature: 0.5 // Creativity of the response
                }),
            });
            clearInterval(intervalId); // Stop the emoji animation
        
            const data = await response.json();
        
            // Handle the API response
            handleApiResponse(data);
        } catch (error) {
            // Display "No response" if there's an error
            document.getElementById('food-situation').innerHTML = "No solution available";
        }

        // Replace the submit button text with "Sugerir Solução"
        document.getElementById('recipe-btn').value = "Sugerir Solução";
    });
}

function saveRecipe(recipe) {
    // Check if there is already an array of recipes in localStorage
    const recipes = JSON.parse(localStorage.getItem('recipes')) || [];
    
    // Add the new recipe to the array
    recipes.push(recipe);
    
    // Save the updated recipes array to localStorage
    localStorage.setItem('recipes', JSON.stringify(recipes));
}

// Update the content of the recipe card
function updateRecipeCard(recipe) {
    const foodSituation = document.getElementById('food-situation');
    foodSituation.textContent = recipe;

    // Save button click event
    const saveRecipeBtn = document.getElementById('save-recipe-btn');
    saveRecipeBtn.addEventListener('click', () => {
        saveRecipe(recipe);
        alert('Receita salva com sucesso!');
    });
}

// Function to handle the API response
function handleApiResponse(data) {
    const recipe = data.choices[0].text;
    updateRecipeCard(recipe);
    showRecipeCard(recipe);
}

// Function to get the saved recipes from Local Storage
function getSavedRecipes() {
    const recipes = JSON.parse(localStorage.getItem('recipes')) || [];

    // Render the recipes in the cards
    const receitasSection = document.querySelector('.revenues');
    receitasSection.innerHTML = '';

    if (recipes.length === 0) {
        const message = document.createElement('p');
        message.textContent = 'Nenhuma receita salva.';
        receitasSection.appendChild(message);
    } else {
        recipes.forEach((recipe, index) => {
            const card = document.createElement('div');
            card.classList.add('recipe-card');

            const recipeContent = document.createElement('div');
            recipeContent.classList.add('recipe-content');

            const recipeTitle = document.createElement('h3');
            recipeTitle.classList.add('recipe-title');
            recipeTitle.textContent = 'Receita';
            recipeContent.appendChild(recipeTitle);

            const recipeText = document.createElement('p');
            recipeText.classList.add('recipe-text');
            recipeText.textContent = recipe;
            recipeContent.appendChild(recipeText);

            const recipeActions = document.createElement('div');
            recipeActions.classList.add('recipe-actions');

            const deleteButton = document.createElement('button');
            deleteButton.classList.add('btn');
            deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
            deleteButton.addEventListener('click', () => {
                deleteRecipe(index);
            });
            recipeActions.appendChild(deleteButton);

            card.appendChild(recipeContent);
            card.appendChild(recipeActions);

            receitasSection.appendChild(card);
        });
    }
}

// Function to delete a recipe from favorites
function deleteRecipe(index) {
    const recipes = JSON.parse(localStorage.getItem('recipes')) || [];

    if (index >= 0 && index < recipes.length) {
        recipes.splice(index, 1);
        localStorage.setItem('recipes', JSON.stringify(recipes));
        getSavedRecipes(); // Update the cards after deletion
    }
}

// Function to show the recipe card when a recipe is suggested
function showRecipeCard(recipe) {
    const recipeCard = document.querySelector('.recipe-card');
    const recipeText = document.getElementById('food-situation');

    recipeText.textContent = recipe;

    recipeCard.classList.remove('d-none');
}

// Function to hide the recipe card
function hideRecipeCard() {
    const recipeCard = document.querySelector('.recipe-card');
    recipeCard.classList.add('d-none');
}

// Load saved recipes when the page loads
window.addEventListener('DOMContentLoaded', () => {
    getSavedRecipes();
});
