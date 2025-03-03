<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosecaen S.L. - Innovación en Mantenimiento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-900 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">Nosecaen S.L.</h1>
            <nav>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ route('tareas.index') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Tareas
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </a>
                            <a
                                href="{{ route('tasks.create') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Crear Tarea
                            </a>
                        @endauth
                    </nav>
                @endif
            </nav>
        </div>
    </header>

    <section class="text-center py-20 bg-blue-700 text-white">
        <h2 class="text-4xl font-bold">SiempreColgados confía en Nosecaen S.L.</h2>
        <p class="mt-4 text-lg">Innovando en el mantenimiento de ascensores con sistemas digitales avanzados.</p>
    </section>

    <section id="servicios" class="container mx-auto py-12 px-6">
        <h3 class="text-3xl font-bold text-center mb-6">Nuestros Servicios</h3>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-white shadow-lg rounded-lg text-center">
                <h4 class="text-xl font-semibold">Mantenimiento Preventivo</h4>
                <p class="mt-2">Garantizamos el funcionamiento óptimo de sus ascensores.</p>
            </div>
            <div class="p-6 bg-white shadow-lg rounded-lg text-center">
                <h4 class="text-xl font-semibold">Atención 24/7</h4>
                <p class="mt-2">Respondemos a emergencias en cualquier momento.</p>
            </div>
            <div class="p-6 bg-white shadow-lg rounded-lg text-center">
                <h4 class="text-xl font-semibold">Digitalización y Reportes</h4>
                <p class="mt-2">Plataforma moderna para gestionar incidencias y mantenimiento.</p>
            </div>
        </div>
    </section>

    <section id="contacto" class="bg-gray-200 py-12 text-center">
        <h3 class="text-3xl font-bold">Contacto</h3>
        <p class="mt-4">Email: contacto@nosecaensl.com | Tel: +34 900 123 456</p>
    </section>

    <footer class="bg-blue-900 text-white text-center py-4 mt-6">
        <p>&copy; 2025 Nosecaen S.L. - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
