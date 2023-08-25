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

const placeholderTexts = [
    "Adicione os ingredientes que você tem em casa separados por vírgula",
    "Arroz, feijão, frango, cenoura",
    "Macarrão, tomate, queijo, presunto",
    "Batata, cebola, alho, carne moída",
    "Ovos, leite, farinha, açúcar",
    "Peito de frango, abobrinha, pimentão, cebola",
    "Peixe, limão, alho, azeite",
    "Espinafre, queijo feta, massa folhada, pinhões",
    "Pão, ovo, salsicha, queijo",
    "Ervilha, milho, pimenta, cebola",
    "Iogurte, morangos, granola, mel",
];

let currentPlaceholderIndex = 0;
let currentPlaceholder = placeholderTexts[currentPlaceholderIndex];
let typingTimer;

function typePlaceholder() {
    if (currentPlaceholder.length > 0) {
        ingredients.placeholder += currentPlaceholder.charAt(0);
        currentPlaceholder = currentPlaceholder.slice(1);
        typingTimer = setTimeout(typePlaceholder, 50); // Velocidade da digitação (ajuste conforme desejado)
    } else {
        typingTimer = setTimeout(erasePlaceholder, 500); // Tempo para apagar (ajuste conforme desejado)
    }
}

function erasePlaceholder() {
    if (ingredients.placeholder.length > 0) {
        ingredients.placeholder = ingredients.placeholder.slice(0, -1);
        typingTimer = setTimeout(erasePlaceholder, 25); // Velocidade para apagar (ajuste conforme desejado)
    } else {
        currentPlaceholderIndex = (currentPlaceholderIndex + 1) % placeholderTexts.length;
        currentPlaceholder = placeholderTexts[currentPlaceholderIndex];
        typingTimer = setTimeout(typePlaceholder, 1000); // Tempo entre placeholders (ajuste conforme desejado)
    }
}

typePlaceholder();

ingredients.addEventListener('focus', () => {
    clearTimeout(typingTimer);
});

ingredients.addEventListener('blur', () => {
    typePlaceholder();
});
