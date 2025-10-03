@extends('layouts.sidebar')

@section('title', 'Reportes')

@section('content')
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Configuración - Dashboard Administrador</title>
    <link rel="stylesheet" href="{{ asset('css/configuracion.css') }}" />
</head>
<body>
    <div class="configuracion-container">
        <!-- Header -->
        <div class="config-header">
            <h1 class="config-title">Configuración del Sistema</h1>
            <p class="config-subtitle">Personaliza y configura tu dashboard de administrador</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="config-tabs">
            <button class="tab-button active" data-tab="apariencia">Apariencia</button>
            <button class="tab-button" data-tab="notificaciones">Notificaciones</button>
            <button class="tab-button" data-tab="seguridad">Seguridad</button>
            <button class="tab-button" data-tab="preferencias">Preferencias</button>
        </div>

        <!-- Content Sections -->
        <div class="config-content">
            <!-- Apariencia Tab -->
            <div class="tab-content active" id="apariencia">
                <div class="config-section">
                    <h3 class="section-title">Tema y Colores</h3>
                    
                    <div class="config-group">
                        <label class="config-label">Modo de Tema</label>
                        <div class="theme-selector">
                            <div class="theme-option" data-theme="light">
                                <div class="theme-preview light-theme">
                                    <div class="preview-header"></div>
                                    <div class="preview-content"></div>
                                </div>
                                <span>Claro</span>
                            </div>
                            <div class="theme-option" data-theme="dark">
                                <div class="theme-preview dark-theme">
                                    <div class="preview-header"></div>
                                    <div class="preview-content"></div>
                                </div>
                                <span>Oscuro</span>
                            </div>
                            <div class="theme-option" data-theme="auto">
                                <div class="theme-preview auto-theme">
                                    <div class="preview-header"></div>
                                    <div class="preview-content"></div>
                                </div>
                                <span>Automático</span>
                            </div>
                        </div>
                    </div>

                    <div class="config-group">
                        <label class="config-label">Color Principal</label>
                        <div class="color-picker">
                            <input type="color" id="primaryColor" value="#3b82f6" class="color-input" />
                            <span class="color-value">#3b82f6</span>
                        </div>
                    </div>

                    <div class="config-group">
                        <label class="config-label">Densidad de Interfaz</label>
                        <select class="config-select" id="densitySelect">
                            <option value="compact">Compacto</option>
                            <option value="comfortable" selected>Confortable</option>
                            <option value="spacious">Espacioso</option>
                        </select>
                    </div>
                </div>

                <div class="config-section">
                    <h3 class="section-title">Dashboard Layout</h3>
                    
                    <div class="config-group">
                        <label class="config-label">Número de Columnas</label>
                        <div class="slider-container">
                            <input type="range" min="1" max="4" value="2" class="config-slider" id="columnsSlider" />
                            <div class="slider-labels">
                                <span>1</span>
                                <span>2</span>
                                <span>3</span>
                                <span>4</span>
                            </div>
                        </div>
                    </div>

                    <div class="config-group">
                        <label class="config-label">Widgets Predeterminados</label>
                        <div class="widgets-grid">
                            <label class="widget-checkbox">
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                                Estadísticas Principales
                            </label>
                            <label class="widget-checkbox">
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                                Actividad Reciente
                            </label>
                            <label class="widget-checkbox">
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                                Gráficos de Rendimiento
                            </label>
                            <label class="widget-checkbox">
                                <input type="checkbox" />
                                <span class="checkmark"></span>
@endsection
