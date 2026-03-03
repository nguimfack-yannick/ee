<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Turning Point Cameroon | Génération Verte</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    <!-- Tailwind Config -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#14532D",
              greenTPC: "#1F7A5A",
              yellowTPC: "#F5C400",
              redTPC: "#C4161C",
              darkTPC: "#0F172A",
            },
          },
        },
      };
    </script>

    <!-- CSS Animations -->
    <style>
      .reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s ease;
      }
      .reveal.active {
        opacity: 1;
        transform: translateY(0);
      }

      .zoom {
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.8s ease;
      }
      .zoom.active {
        opacity: 1;
        transform: scale(1);
      }

      /* Typewriter cursor */
      .cursor {
        display: inline-block;
        margin-left: 5px;
        animation: blink 1s infinite;
      }

      @keyframes blink {
        0%,
        50%,
        100% {
          opacity: 1;
        }
        25%,
        75% {
          opacity: 0;
        }
      }
    </style>
  </head>

  <body class="bg-gray-100 text-gray-800 overflow-x-hidden">
    <!-- ================= TOP BAR ================= -->
    <nav class="bg-primary text-white">
      <div
        class="max-w-7xl mx-auto px-4 flex justify-between items-center h-10"
      >
        <!-- Social Icons -->
        <div class="flex gap-4 text-lg">
          <a href="#" class="hover:text-yellowTPC transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="hover:text-yellowTPC transition">
            <i class="fab fa-whatsapp"></i>
          </a>
          <a href="#" class="hover:text-yellowTPC transition">
            <i class="fab fa-instagram"></i>
          </a>
        </div>

        <a
          href="mailto:contact@universalwelfare.org"
          class="hover:text-yellowTPC"
        >
          <i class="fas fa-envelope"></i>
        </a>
      </div>
    </nav>

    <!-- ================= HEADER ================= -->
    <header class="bg-white shadow sticky top-0 z-50">
      <div
      #961e11
      #962233
        class="max-w-7xl mx-auto px-4 flex items-center justify-between h-16"
      >
        <!-- Logo -->
        <img src="img.png" alt="Logo" class="w-16 object-contain" />

        <!-- Desktop Menu -->
        <nav class="hidden md:flex gap-6 font-bold">
          <a href="#" class="hover:text-greenTPC">Accueil</a>
          <a href="#projet" class="hover:text-greenTPC">Projet</a>
          <a href="#contact" class="hover:text-greenTPC">Contact</a>
        </nav>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden text-xl">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div
        id="mobileMenu"
        class="hidden md:hidden bg-white px-4 pb-4 space-y-2"
      >
        <a href="#" class="block font-bold">Accueil</a>
        <a href="#projet" class="block font-bold">Projet</a>
        <a href="#contact" class="block font-bold">Contact</a>
      </div>
    </header>

    <!-- ================= HERO ================= -->
    <section
      class="bg-gradient-to-br from-greenTPC via-primary to-greenTPC text-white"
    >
      <div
        class="max-w-7xl mx-auto px-6 py-28 grid md:grid-cols-2 gap-14 items-center"
      >
        <!-- Text -->
        <div class="reveal text-center md:text-left">
          <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
            <span id="typewriter"></span><span class="cursor">|</span>
          </h1>

          <p class="mt-6 text-xl md:text-2xl text-white/90 max-w-xl">
            Une initiative environnementale citoyenne qui transforme
            <span class="text-yellowTPC font-semibold"
              >l’école camerounaise</span
            >
            en acteur clé de la transition écologique.
          </p>

          <div class="mt-10 flex flex-col sm:flex-row gap-6">
            <a
              href="#projet"
              class="bg-yellowTPC text-primary font-bold px-10 py-4 rounded-xl text-lg hover:scale-105 transition"
            >
              Découvrir Génération Verte
            </a>
            <a
              href="#impact"
              class="border-2 border-white px-10 py-4 rounded-xl text-lg hover:bg-white hover:text-primary transition"
            >
              Notre impact
            </a>
          </div>
        </div>

        <!-- Logo -->
        <div class="zoom flex justify-center relative">
          <div
            class="absolute inset-0 rounded-full bg-yellowTPC blur-3xl opacity-30"
          ></div>
          <img
            src="img.png"
            class="relative w-72 h-72 md:w-96 md:h-96 rounded-full border-[12px] border-yellowTPC bg-white p-3 object-contain shadow-2xl"
          />
        </div>
      </div>
    </section>









<section id="impact" class="bg-gray-100 py-20 reveal">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl font-extrabold text-center text-greenTPC mb-12">
      Notre Impact
    </h2>

    <div class="grid md:grid-cols-4 gap-8 text-center">
      <div class="bg-white p-8 rounded-2xl shadow-lg">
        <h3 class="text-5xl font-extrabold text-greenTPC">+50</h3>
        <p class="mt-3 font-semibold">Écoles sensibilisées</p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-lg">
        <h3 class="text-5xl font-extrabold text-yellowTPC">+3 000</h3>
        <p class="mt-3 font-semibold">Élèves formés</p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-lg">
        <h3 class="text-5xl font-extrabold text-redTPC">+10 000</h3>
        <p class="mt-3 font-semibold">Arbres plantés</p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-lg">
        <h3 class="text-5xl font-extrabold text-primary">+20</h3>
        <p class="mt-3 font-semibold">Communautés engagées</p>
      </div>
    </div>
  </div>
</section>













    <section class="bg-white py-20 reveal">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl font-extrabold text-greenTPC mb-6">
      Pourquoi Turning Point Cameroon ?
    </h2>

    <p class="text-xl max-w-4xl leading-relaxed mb-10">
      Le Cameroun fait face à une dégradation accélérée de son environnement :
      déforestation, pollution, changements climatiques.
      Turning Point Cameroon agit à la racine du problème en
      <strong>éduquant les jeunes dès l’école</strong> et en les impliquant dans
      des actions écologiques concrètes.
    </p>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="p-8 rounded-2xl bg-green-50 shadow">
        <h3 class="text-xl font-bold text-greenTPC mb-3">🌍 Environnement</h3>
        <p>
          Protection de la biodiversité et lutte contre la déforestation
          à travers le reboisement scolaire.
        </p>
      </div>

      <div class="p-8 rounded-2xl bg-yellow-50 shadow">
        <h3 class="text-xl font-bold text-yellowTPC mb-3">🎓 Éducation</h3>
        <p>
          Formation des élèves aux valeurs du développement durable
          et de l’écocitoyenneté.
        </p>
      </div>

      <div class="p-8 rounded-2xl bg-red-50 shadow">
        <h3 class="text-xl font-bold text-redTPC mb-3">🤝 Communauté</h3>
        <p>
          Implication des enseignants, parents et communautés locales
          pour un impact durable.
        </p>
      </div>
    </div>
  </div>
</section>


    <!-- ================= ABOUT ================= -->
    <section class="max-w-7xl mx-auto px-6 py-16 reveal">
      <h2 class="text-3xl font-bold text-greenTPC mb-6">Qui sommes-nous ?</h2>
      <p class="max-w-4xl text-lg">
        Turning Point Cameroon est la branche environnementale de
        <strong>l’Association du Bien-être Communautaire (ABEC)</strong>.
      </p>
    </section>

    <!-- ================= CONTACT ================= -->
    <section id="contact" class="bg-primary text-white py-16">
      <div class="max-w-7xl mx-auto px-6 text-center reveal">
        <h2 class="text-3xl font-bold mb-4">Rejoignez le mouvement</h2>
        <p class="mb-6 text-white/90">
          Ensemble, protégeons l’environnement camerounais.
        </p>
        <p class="font-bold">
          <i class="fas fa-phone"></i> (+237) 690 40 38 57 <br />
          <i class="fas fa-envelope"></i> contact@universalwelfare.org
        </p>
      </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-darkTPC text-gray-400 text-center py-6">
      © 2026 ABEC – Turning Point Cameroon
    </footer>

    <!-- ================= JS ================= -->
    <script>
      // Mobile menu
      const btn = document.getElementById("menuBtn");
      const menu = document.getElementById("mobileMenu");
      btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
      });

      // Scroll animations
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("active");
            }
          });
        },
        { threshold: 0.15 }
      );

      document
        .querySelectorAll(".reveal, .zoom")
        .forEach((el) => observer.observe(el));

      // TYPEWRITER EFFECT
      const text = "Turning Point Cameroon";
      let index = 0;
      const speed = 90;
      const target = document.getElementById("typewriter");

      function typeWriter() {
        if (index < text.length) {
          target.innerHTML += text.charAt(index);
          index++;
          setTimeout(typeWriter, speed);
        }
      }

      typeWriter();
    </script>
  </body>
</html>