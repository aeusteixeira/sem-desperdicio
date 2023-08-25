const form = document.getElementById('form');
const ingredients = document.getElementById('ingredients');
const result = document.getElementById('result');
const generateRevenue = document.getElementById('generateRevenue');

const renderRecipeCard = (formattedData) => `
<hr>
<div class="card rounded shadow">
    <div class="card-body">
        <p class="card-text">
            ${formattedData}
        </p>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" id="saveRecipe">Salvar</button>
    </div>
</div>
<hr>
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
        result.innerHTML = renderRecipeCard(formattedData);
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
