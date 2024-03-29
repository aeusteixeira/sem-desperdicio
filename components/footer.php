<footer class="bg-color-2 text-center text-color-6 py-4">
    <style>
        .emoji-container span {
            display: inline-block;
            animation: bounceEmoji 0.5s ease-in-out;
        }

        @keyframes bounceEmoji {
            0%, 100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-8px) scale(1);
            }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="emoji-container" id="emojiContainer">
                    <a href="https://matheusteixeira.com.br" target="_blank" title="Matheus Teixeira" class="text-decoration-none text-color-6">
                        Feito com <span id="emoji" style="animation-name: bounceEmoji; animation-duration: 0.5s; animation-timing-function: ease-in-out; animation-iteration-count: 2;">❤️</span> por Matheus Teixeira
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="terms_of_use.php" title="Termos de Uso" class="text-color-6
                        <? if ($currentPage === 'terms_of_use') { echo 'font-weight-bold'; } ?>
                    ">Termos de Uso</a>
                    <span class="mx-2">|</span>
                    <a href="privacy_policy.php" title="Política de Privacidade" class="text-color-6
                        <? if ($currentPage === 'privacy_policy') { echo 'font-weight-bold'; } ?>
                    ">Política de Privacidade</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const emoji = document.getElementById('emoji');
        const emojis = ["❤️", "🥑", "🥕", "🥝"];
        let currentEmojiIndex = 0;

        function animateEmojiChange() {
            emoji.style.animation = 'none';
            void emoji.offsetWidth; // Reiniciar a animação ao remover e reatribuir a classe
            emoji.style.animation = null;

            emoji.style.animationName = 'bounceEmoji';
            emoji.style.animationDuration = '0.5s';
            emoji.style.animationTimingFunction = 'ease-in-out';
            emoji.style.animationIterationCount = '2';

            setTimeout(() => {
                currentEmojiIndex = (currentEmojiIndex + 1) % emojis.length;
                emoji.innerText = emojis[currentEmojiIndex];
            }, 500);
        }

        setInterval(animateEmojiChange, 2000); // Altera o emoji a cada 2 segundos (2000 milissegundos)
    </script>
</footer>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("form").submit();
   }
 </script>
<script src="src/js/jquery.min.js"></script>
<script src="src/js/popper.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/main.js"></script>
</body>
</html>
