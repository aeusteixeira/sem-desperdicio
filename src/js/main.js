const form = document.getElementById('form');
const ingredients = document.getElementById('ingredients');
const result = document.getElementById('result');
const generateRevenue = document.getElementById('generateRevenue');
const myRecipes = document.getElementById('myRecipes');
const savedRecipesCount = document.getElementById('savedRecipesCount');

const renderRecipeCard = (formattedData, options = {
    remove: false,
    save: false
}) => `
<div class="card rounded shadow mb-2">
    <div class="card-body">
        <p class="card-text">
            ${formattedData}
        </p>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                ${options.remove ? `<button class="btn btn-danger btn-sm" id="removeRecipe" onclick="removeRecipeFromLocalStorage('${formattedData}')">Remover</button>` : ''}

                ${options.save ? `<button class="btn btn-success btn-sm" id="saveRecipe">Salvar</button>` : ''}
                </div>
            <div>
    </div>
</div>
`;

const saveRecipe = document.getElementById('saveRecipe');

const saveRecipeToLocalStorage = (formattedData) => {
    const recipes = JSON.parse(localStorage.getItem('recipes')) || [];
    recipes.push(formattedData);
    localStorage.setItem('recipes', JSON.stringify(recipes));
    alert('Receita salva com sucesso!');
};

result.addEventListener('click', (e) => {
    if (e.target.id === 'saveRecipe') {
        const formattedData = e.target.parentElement.previousElementSibling.children[0].innerText;
        saveRecipeToLocalStorage(formattedData);
    }
});

const setLoadingState = (button) => {
    button.setAttribute('disabled', 'disabled');
    button.innerHTML = `
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Carregando...
    `;
};

const resetLoadingState = (button, text) => {
    button.removeAttribute('disabled');
    button.innerHTML = text;
};

const fetchRecipe = async (ingredientsVal) => {
    setLoadingState(generateRevenue);

    try {
        const response = await fetch(`request.php?ingredients=${encodeURIComponent(ingredientsVal)}`);
        const data = await response.json();

        const formattedData = data.recipe;
        result.innerHTML = renderRecipeCard(formattedData, {
            save: true
        });
    } catch (error) {
        console.log(error);
    }

    resetLoadingState(generateRevenue, 'Gerar receita');
};

form.addEventListener('submit', (e) => {
    e.preventDefault();
    result.innerHTML = '';
    const ingredientsVal = ingredients.value.trim();
    if (ingredientsVal) {
        fetchRecipe(ingredientsVal);
        ingredients.value = '';
    }
});

// Função para pegar as receitas salvas no Local Storage
function getSavedRecipes() {
    const recipes = JSON.parse(localStorage.getItem('recipes')) || [];
    return recipes;
}

// Função para renderizar as receitas salvas no Local Storage
function renderSavedRecipes() {
    const recipes = getSavedRecipes();
    recipes.forEach((recipe) => {
        myRecipes.innerHTML += renderRecipeCard(recipe, {
            remove: true,
        });
    });
}

// Função para remover uma receita do Local Storage
function removeRecipeFromLocalStorage(recipe) {
    const recipes = getSavedRecipes();
    const recipeIndex = recipes.indexOf(recipe);
    recipes.splice(recipeIndex, 1);
    localStorage.setItem('recipes', JSON.stringify(recipes));
    alert('Receita removida com sucesso!');
    location.reload();
}