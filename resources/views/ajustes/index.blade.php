@extends('layouts.sidebar')

@section('title', 'Pedidos')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Configuración Interactiva - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/configuracion.css') }}" />
</head>
<body>
    <div class="config-tabs-container">
        <h1 class="config-title">Configuración del Dashboard</h1>

        <!-- Tabs -->
        <div class="tabs">
            <input type="radio" id="tab1" name="tab-control" checked>
            <input type="radio" id="tab2" name="tab-control">
            <input type="radio" id="tab3" name="tab-control">
            <input type="radio" id="tab4" name="tab-control">

            <ul>
                <li title="Apariencia"><label for="tab1" role="button"><span>Apariencia</span></label></li>
                <li title="Notificaciones"><label for="tab2" role="button"><span>Notificaciones</span></label></li>
                <li title="Seguridad"><label for="tab3" role="button"><span>Seguridad</span></label></li>
                <li title="Preferencias"><label for="tab4" role="button"><span>Preferencias</span></label></li>
            </ul>

            <div class="content">
                <section>
                    <h2>Apariencia</h2>
                    <p>En esta sección puedes personalizar el aspecto visual de tu dashboard. Cambia entre modo claro y oscuro para adaptar la interfaz a tus preferencias o condiciones de iluminación. También puedes seleccionar el color principal que se usará en botones, enlaces y destacados para que coincida con la identidad de tu empresa o gusto personal.</p>
                    <p>Además, puedes ajustar la densidad de la interfaz para que los elementos estén más compactos o más espaciados, facilitando la lectura o permitiendo ver más información en pantalla.</p>
                    <p>Recuerda que una buena apariencia mejora la experiencia de usuario y puede aumentar tu productividad al trabajar con el dashboard.</p>
                    <p>Puedes elegir entre diferentes estilos de tipografía para que la lectura sea más cómoda y se adapte a tus preferencias visuales.</p>
                    <p>Si trabajas en diferentes dispositivos, puedes aplicar configuraciones específicas para móviles, tabletas o pantallas grandes.</p>
                    <p>El sistema también permite guardar varios perfiles de apariencia, de modo que puedas cambiar rápidamente entre configuraciones según el entorno o la tarea que estés realizando.</p>
                    <p>Activar el modo accesibilidad ajusta los contrastes, tamaños de texto y colores para mejorar la visibilidad de personas con dificultades visuales.</p>
                    <p>Recuerda que la apariencia no solo es estética, también influye en la usabilidad y eficiencia en el uso diario del sistema.</p>
                    <p>Personalizar tu dashboard ayuda a que la experiencia sea más cómoda, atractiva y acorde a tu estilo de trabajo.</p>

                </section>

                <section>
                    <h2>Notificaciones</h2>
                    <p>Configura cómo y cuándo quieres recibir alertas importantes del sistema. Puedes activar o desactivar notificaciones por email, push o SMS según tus necesidades.</p>
                    <p>Además, puedes establecer horarios de silencio para no ser molestado fuera de tu jornada laboral, y seleccionar qué tipos de eventos quieres que generen alertas, como nuevos usuarios registrados, reportes generados o errores críticos.</p>
                    <p>Una correcta configuración de notificaciones te ayuda a mantenerte informado sin saturarte con mensajes innecesarios.</p>
                    <p>Recuerda que puedes personalizar las alertas para que solo recibas lo realmente importante, evitando distracciones y manteniendo tu productividad.</p>
                    <p>Si trabajas en equipo, puedes habilitar notificaciones compartidas para que todos los miembros reciban avisos sobre eventos clave.</p>
                    <p>El sistema permite priorizar notificaciones críticas para que nunca se pasen por alto, incluso si tienes el modo silencio activado.</p>
                    <p>También puedes revisar el historial de notificaciones para asegurarte de no haber perdido información relevante.</p>
                    <p>Se recomienda activar al menos un canal de comunicación (email o SMS) como respaldo, en caso de que alguna notificación push no se reciba correctamente.</p>
                    <p>Configurar las notificaciones de manera adecuada mejora la seguridad, la colaboración y la eficiencia en el uso del sistema.</p>

                </section>

                <section>
                    <h2>Seguridad</h2>
                     <p>En esta sección puedes gestionar las opciones de seguridad para proteger tu cuenta y la información del sistema.</p>
                     <p>Activa la autenticación de dos factores para añadir una capa extra de protección y evitar accesos no autorizados.</p>
                     <p>También puedes revisar y administrar las sesiones activas, cerrar sesiones remotas y asegurarte de que solo tú tengas acceso a tu cuenta.</p>
                     <p>Es recomendable cambiar tu contraseña periódicamente y no reutilizar contraseñas usadas en otros sistemas.</p>
                     <p>Utiliza contraseñas seguras que incluyan letras mayúsculas, minúsculas, números y caracteres especiales.</p>
                     <p>Habilita alertas de seguridad para recibir notificaciones cuando ocurra un inicio de sesión sospechoso o desde un dispositivo nuevo.</p>
                     <p>Recuerda que mantener buenas prácticas de seguridad es fundamental para evitar accesos no autorizados y proteger los datos sensibles.</p>
                     <p>Si detectas algún comportamiento extraño en tu cuenta, contacta al administrador del sistema inmediatamente.</p>
                     <p>El sistema cuenta con medidas de encriptación y seguridad avanzadas, pero tu participación es clave para mantener la integridad de la información.</p>
                </section>

                <section>
                    <h2>Preferencias</h2>
                    <p>En este apartado puedes administrar tus <strong>preferencias personales</strong> dentro del dashboard, lo cual te permite adaptar la plataforma a tu estilo de trabajo y mejorar la experiencia de usuario de manera individual. Cada ajuste se guarda en tu perfil, garantizando que tus configuraciones permanezcan activas sin importar desde qué dispositivo accedas.</p>
                    <p>Una de las opciones principales es la <strong>configuración regional</strong>, donde podrás seleccionar el idioma de la interfaz, así como el <em>formato de fecha y hora</em> que prefieras (ejemplo: 24h o 12h, DD/MM/AAAA o MM/DD/YYYY). Esto asegura precisión en la interpretación de datos temporales y coherencia al generar reportes.</p>
                    <p>También puedes definir la <strong>densidad de datos</strong> en las tablas, es decir, el número de elementos que se mostrarán por página en las listas de usuarios, productos, pedidos y reportes. Una densidad más alta reduce la navegación, mientras que una menor mejora la velocidad de carga en equipos con recursos limitados.</p>
                    <p>El sistema te ofrece la opción de personalizar la <strong>interfaz visual</strong>. Esto incluye activar o desactivar animaciones y transiciones. Si deseas un rendimiento más eficiente en entornos de bajo consumo de recursos, puedes deshabilitar estas funciones para priorizar la velocidad. En cambio, si prefieres una experiencia más dinámica, puedes mantenerlas habilitadas.</p>
                    <p>Dentro de las preferencias también se encuentran las <strong>notificaciones inteligentes</strong>, que te permiten recibir alertas sobre eventos importantes: pedidos nuevos, cambios en el inventario, movimientos de usuarios o recordatorios de tareas. Estas notificaciones pueden configurarse para mostrarse dentro del dashboard o bien enviarse directamente a tu correo electrónico registrado.</p>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
@endsection