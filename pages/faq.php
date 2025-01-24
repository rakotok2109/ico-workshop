<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foire aux questions</title>
    <link rel="stylesheet" href="../ressources/css/feedbacks.css">
    <style>
        .faq-section {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .faq-question {
            cursor: pointer;
            padding: 10px;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            margin-top: 5px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
        }
        .faq-question:hover {
            background-color: #e1e1e1;
        }
        .faq-answer {
            display: none;
            padding: 10px;
            border: 1px solid #ddd;
            border-top: none;
            color: white;
        }
        .faq-icon {
            margin-right: 10px;
            transition: transform 0.3s ease;
        }
        .faq-icon.rotate {
            transform: rotate(90deg);
        }
    </style>
</head>
<body>
<?php
    require_once (__DIR__ . '/components/navbar.php');
?>

<h2 style="text-align: center; margin-top: 20px; color: white;">Foire aux Questions</h2>

<div class="faq-section">
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 1: Comment puis-je m'inscrire ?
        </div>
        <div class="faq-answer">Réponse : Vous pouvez vous inscrire en cliquant sur le bouton "S'inscrire" en haut à droite de la page d'accueil.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 2: Quels sont les modes de paiement acceptés ?
        </div>
        <div class="faq-answer">Réponse : Nous acceptons les cartes de crédit, PayPal et les virements bancaires.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 3: Le jeu est-il disponible en magasin ?
        </div>
        <div class="faq-answer">Réponse : Le jeu de carte est disponible auprès de nos partenaires agréés tels que la FNAC et sur Amazon.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 4: Puis-je modifier mon adresse de livraison?
        </div>
        <div class="faq-answer">Réponse : Vous pouvez modifier votre adresse de livraison depuis votre profil.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 5: Où trouver l'historique de mes commandes?
        </div>
        <div class="faq-answer">Réponse : L'historique de vos commandes s'affiche dans votre profil.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 6: A quoi sert le code QR sur la boîte de carte ?
        </div>
        <div class="faq-answer">Réponse : Vous pouvez scanner ce code QR à l'aide de votre téléphone afin d'accéder aux règles du jeu à n'importe quel moment.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 7: Comment puis-je contacter le support client ?
        </div>
        <div class="faq-answer">Réponse : Vous pouvez contacter notre support client via le formulaire de contact sur notre site.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 8: Puis-je annuler ma commande ?
        </div>
        <div class="faq-answer">Réponse : Vous pouvez annuler votre commande dans les 24 heures suivant l'achat .</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 9: Quels sont les délais de livraison ?
        </div>
        <div class="faq-answer">Réponse : Les délais de livraison varient entre 3 à 5 jours ouvrables selon votre localisation.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question">
            <span class="faq-icon">▶</span> <!-- Flèche -->
            Question 10: Offrez-vous des réductions pour les achats en gros ?
        </div>
        <div class="faq-answer">Réponse : Oui, nous offrons des réductions pour les commandes en gros. Veuillez contacter notre service commercial pour plus de détails.</div>
    </div>
    <!-- Ajoutez plus de questions ici -->
</div>

<script>
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', () => {
            const answer = item.nextElementSibling;
            const icon = item.querySelector('.faq-icon');
            if (answer.style.display === 'block') {
                answer.style.display = 'none';
                icon.classList.remove('rotate');
            } else {
                answer.style.display = 'block';
                icon.classList.add('rotate');
            }
        });
    });
</script>

</body>
</html>