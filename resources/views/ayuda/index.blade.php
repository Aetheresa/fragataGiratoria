@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Centro de Ayuda - Dashboard Administrador</title>
    <link rel="stylesheet" href="{{ asset('css/ayuda.css') }}" />
</head>
<body>
    <div class="ayuda-container">
        <!-- Header Section -->
        <div class="ayuda-header">
            <h1 class="ayuda-title">Centro de Ayuda</h1>
            <p class="ayuda-subtitle">Encuentra respuestas rápidas a tus preguntas sobre el dashboard de administrador</p>
            
            <!-- Search Bar -->
            <div class="search-container">
                <spam class="search-icon">🔍</spam>
                <input type="text" class="search-input" placeholder="Buscar en la ayuda..." id="searchHelp" />
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="categories-grid">
            <div class="category-card" onclick="scrollToSection('usuarios')">
                <div class="category-icon">👥</div>
                <h3 class="category-title">Gestión de Usuarios</h3>
                <p class="category-description">Aprende a administrar usuarios, permisos y roles en el sistema.</p>
            </div>

            <div class="category-card" onclick="scrollToSection('reportes')">
                <div class="category-icon">📊</div>
                <h3 class="category-title">Reportes y Analytics</h3>
                <p class="category-description">Genera reportes personalizados y analiza datos del sistema.</p>
            </div>

            <div class="category-card" onclick="scrollToSection('configuracion')">
                <div class="category-icon">⚙️</div>
                <h3 class="category-title">Configuración</h3>
                <p class="category-description">Configura preferencias del sistema y personaliza tu dashboard.</p>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <div class="faq-item" id="usuarios">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    ¿Cómo crear un nuevo usuario?
                    <span class="chevron">▼</span>
                </div>
                <div class="faq-answer">
                    <p>Para crear un nuevo usuario:</p>
                    <ol>
                        <li>Ve a la sección "Usuarios" en el menú lateral</li>
                        <li>Haz clic en "Nuevo Usuario"</li>
                        <li>Completa la información requerida (nombre, email, rol)</li>
                        <li>Asigna los permisos correspondientes</li>
                        <li>Guarda los cambios</li>
                    </ol>
                    <p>El usuario recibirá un email con instrucciones para activar su cuenta.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    ¿Cómo resetear una contraseña?
                    <span class="chevron">▼</span>
                </div>
                <div class="faq-answer">
                    <p>Para resetear una contraseña:</p>
                    <ol>
                        <li>En la lista de usuarios, encuentra el usuario deseado</li>
                        <li>Haz clic en "Resetear Contraseña"</li>
                        <li>Confirma la acción</li>
                        <li>El usuario recibirá un email con un link para crear una nueva contraseña</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item" id="reportes">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    ¿Cómo generar reportes personalizados?
                    <span class="chevron">▼</span>
                </div>
                <div class="faq-answer">
                    <p>Puedes generar reportes personalizados siguiendo estos pasos:</p>
                    <ol>
                        <li>Ve a "Reportes" → "Crear Reporte"</li>
                        <li>Selecciona el tipo de datos que quieres incluir</li>
                        <li>Aplica filtros según tus necesidades</li>
                        <li>Elige el formato de exportación (PDF, Excel, CSV)</li>
                        <li>Genera y descarga el reporte</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    ¿Cómo programar reportes automáticos?
                    <span class="chevron">▼</span>
                </div>
                <div class="faq-answer">
                    <p>Para programar reportes automáticos:</p>
                    <ol>
                        <li>Crea el reporte que deseas automatizar</li>
                        <li>Haz clic en "Programar"</li>
                        <li>Establece la frecuencia (diario, semanal, mensual)</li>
                        <li>Ingresa los emails de destinatarios</li>
                        <li>Guarda la programación</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item" id="configuracion">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    ¿Cómo personalizar el dashboard?
                    <span class="chevron">▼</span>
                </div>
                <div class="faq-answer">
                    <p>Puedes personalizar tu dashboard de varias formas:</p>
                    <ul>
                        <li><strong>Widgets:</strong> Arrastra y suelta widgets para reorganizar</li>
                        <li><strong>Tema:</strong> Cambia entre modo claro y oscuro en Configuración → Apariencia</li>
                        <li><strong>Métricas:</strong> Selecciona qué métricas mostrar en Configuración → Dashboard</li>
                        <li><strong>Layout:</strong> Cambia entre layout de 1, 2 o 3 columnas</li>
                    </ul>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    ¿Cómo configurar notificaciones?
                    <span class="chevron">▼</span>
                </div>
                <div class="faq-answer">
                    <p>Configura tus notificaciones en:</p>
                    <ol>
                        <li>Ve a Configuración → Notificaciones</li>
                        <li>Selecciona los tipos de alertas que quieres recibir</li>
                        <li>Establece los canales (email, push, SMS)</li>
                        <li>Configura las horas de silencio si es necesario</li>
                        <li>Guarda los cambios</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact-section">
            <h3 class="contact-title">¿No encontraste lo que buscabas?</h3>
            <p>Nuestro equipo de soporte está disponible para ayudarte</p>
            <div class="contact-buttons">
                <button class="contact-button" onclick="openChat()">Chat en Vivo</button>
                <button class="contact-button" onclick="openEmail()">Enviar Email</button>
                <button class="contact-button" onclick="openDocs()">Documentación</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle FAQ items
        function toggleFAQ(element) {
            const answer = element.nextElementSibling;
            const chevron = element.querySelector('.chevron');
            
            element.classList.toggle('active');
            answer.classList.toggle('active');
            chevron.classList.toggle('rotated');
        }

        // Scroll to specific section
        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
                const question = element.querySelector('.faq-question');
                if (question && !question.classList.contains('active')) {
                    toggleFAQ(question);
                }
            }
        }

        // Search functionality
        document.getElementById('searchHelp').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                    if (searchTerm && !item.querySelector('.faq-question').classList.contains('active')) {
                        toggleFAQ(item.querySelector('.faq-question'));
                    }
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Contact buttons functionality
        function openChat() {
            alert('Iniciando chat en vivo con soporte...');
        }

        function openEmail() {
            alert('Abriendo cliente de email para contacto...');
        }

        function openDocs() {
            alert('Abriendo documentación completa...');
        }
    </script>
</body>
</html>
@endsection
