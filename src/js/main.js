const textArea = document.getElementById('textArea');
const ideas = [
    "Tenho uma caixa de morangos que está começando a ficar mole.",
    "Tenho arroz, feijão, carne moída, duas batatas, uma cenoura e um pedaço de abóbora.",
    "Tenho um pacote de pão de forma que está vencendo amanhã.",
    "Tenho macarrão de ontem, mas não tenho mais molho de tomate. Também tenho um pouco de peito de frango, beringela, tomate, cenoura e cebola."
];

let currentIdeaIndex = 0;
let currentIdea = ideas[currentIdeaIndex];
let typingTimer;

function typeAndEraseIdea() {
    if (currentIdea.length > 0) {
        textArea.value += currentIdea.charAt(0);
        currentIdea = currentIdea.slice(1);
        typingTimer = setTimeout(typeAndEraseIdea, 50); // Velocidade da digitação (ajuste conforme desejado)
    } else {
        typingTimer = setTimeout(eraseIdea, 500); // Tempo para apagar (ajuste conforme desejado)
    }
}

function eraseIdea() {
    if (textArea.value.length > 0) {
        textArea.value = textArea.value.slice(0, -1);
        typingTimer = setTimeout(eraseIdea, 25); // Velocidade para apagar (ajuste conforme desejado)
    } else {
        currentIdeaIndex = (currentIdeaIndex + 1) % ideas.length;
        currentIdea = ideas[currentIdeaIndex];
        typingTimer = setTimeout(typeAndEraseIdea, 1000); // Tempo entre ideias (ajuste conforme desejado)
    }
}

typeAndEraseIdea();

textArea.addEventListener('focus', () => {
    clearTimeout(typingTimer);
});

textArea.addEventListener('blur', () => {
    typeAndEraseIdea();
});