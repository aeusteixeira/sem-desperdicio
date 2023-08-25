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
        const prompt = `
        Crie uma receita com os seguintes ingredientes: ${input}
        Escreva a receita em português, pois o modelo de linguagem que estamos usando é o português.
        A receita deve conter somente os ingredientes acima.
        `;

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
