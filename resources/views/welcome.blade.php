    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zafiro - Perfumes</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Añadir manejadores de evento a los enlaces de filtro
                const filterOptions = document.querySelectorAll('.filter-option');
                filterOptions.forEach(option => {
                    option.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Quitar la clase 'active' de todos los enlaces
                        filterOptions.forEach(opt => opt.classList.remove('active'));

                        // Añadir la clase 'active' al enlace seleccionado
                        this.classList.add('active');

                        // Obtener el valor de la marca seleccionada
                        const brand = this.getAttribute('data-brand');

                        // Redirigir a la página con el filtro aplicado
                        window.location.href = '{{ route("welcome") }}' + (brand === 'All' ? '' : '?brand=' + brand);
                    });
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const filterSidebar = document.querySelector('.filter-sidebar');
                const carouselArrow = document.querySelector('.carousel-arrow');

                // Mostrar más marcas al hacer clic en la flecha
                carouselArrow.addEventListener('click', function() {
                    filterSidebar.classList.toggle('expanded');
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
                const arrowUp = document.getElementById('arrow-up');
                const arrowDown = document.getElementById('arrow-down');
                const brands = document.querySelectorAll('.filter-option');
                const brandsPerPage = 3; // Cantidad de marcas por grupo
                let currentStartIndex = 0;

                const updateBrandsDisplay = () => {
                    // Ocultar todas las marcas
                    brands.forEach((brand) => {
                        brand.style.display = 'none';
                    });

                    // Mostrar el grupo actual
                    for (let i = currentStartIndex; i < currentStartIndex + brandsPerPage; i++) {
                        if (brands[i]) {
                            brands[i].style.display = 'block';
                        }
                    }

                    // Controlar visibilidad de las flechas
                    if (currentStartIndex === 0) {
                        // Primer grupo: solo flecha hacia abajo
                        arrowUp.style.display = 'none';
                        arrowDown.style.display = 'inline';
                    } else if (currentStartIndex + brandsPerPage >= brands.length) {
                        // Último grupo: solo flecha hacia arriba
                        arrowUp.style.display = 'inline';
                        arrowDown.style.display = 'none';
                    } else {
                        // Grupos intermedios: ambas flechas
                        arrowUp.style.display = 'inline';
                        arrowDown.style.display = 'inline';
                    }
                };

                // Evento para la flecha hacia abajo
                if (arrowDown) {
                    arrowDown.addEventListener('click', () => {
                        currentStartIndex += brandsPerPage;
                        updateBrandsDisplay();
                    });
                }

                // Evento para la flecha hacia arriba
                if (arrowUp) {
                    arrowUp.addEventListener('click', () => {
                        currentStartIndex -= brandsPerPage;
                        updateBrandsDisplay();
                    });
                }

                // Mostrar las primeras marcas al cargar
                updateBrandsDisplay();
            });
        </script>
    </head>
    <body>
        <div class="container welcome-container">
            <div class="nav-container">
                <div class="navbar">
                    <a href="productos.html">Productos</a>
                    <a href="nosotros.html">Nosotros</a>
                    <a href="contacto.html">Contacto</a>
                    <a href="{{ route('login') }}">Log-in</a>
                </div>
            </div>
            <div class="content container">
                <div class="text-content">
                    <h1 class="brand-name">Zafiro</h1>
                    <p class="tagline">Luce, brilla y deja tu huella</p>
                </div>
                <div class="perfume-images">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/WhatsApp%20Image%202025-03-03%20at%2017.04.15_45b25949.jpg-vmWy07PpwTpSh5BycUX3vk6bDrpkWs.jpeg" alt="Perfumes de lujo" style="display: none;">
                    <img class="perfume-1" src="/placeholder.svg?height=350&width=150" alt="Perfume Sauvage">
                    <img class="perfume-2" src="/placeholder.svg?height=350&width=150" alt="Perfume Amber Rouge">
                </div>
            </div>

            <div class="products-container">
                <div class="filter-sidebar">
                    @if (count($brands) > 3)
                        <!-- Flecha hacia arriba -->
                        <div class="arrow-container">
                            <span class="arrow-up" id="arrow-up" style="display: none;">&uarr;</span>
                        </div>
                    @endif

                    <!-- Contenedor de marcas -->
                    <div class="brands-container" id="brands-container">
                        @foreach ($brands as $index => $brand)
                            <div class="brand-button-wrapper" title="{{ $brand }}">
                                <a href="#"
                                class="filter-option {{ request('brand') == $brand ? 'active' : '' }}"
                                data-brand="{{ $brand }}"
                                data-index="{{ $index }}">
                                <span class="brand-text">{{ $brand }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    @if (count($brands) > 3)
                        <!-- Flecha hacia abajo -->
                        <div class="arrow-container">
                            <span class="arrow-down" id="arrow-down">&darr;</span>
                        </div>
                    @endif
                </div>

                <div class="products-grid">
                    @foreach ($perfumes as $perfume)
                        <div class="product-card">
                            @if ($perfume->image_url)
                                <img src="{{ $perfume->image_url }}" alt="{{ $perfume->name }}">
                            @else
                                <img src="/placeholder.svg?height=150&width=150" alt="{{ $perfume->name }}">
                            @endif
                            <div class="truncate-wrapper" title="{{ $perfume->name }}">
                                <h3 class="truncate">{{ $perfume->name }}</h3>
                            </div>
                            <p><strong>Marca:</strong> {{ $perfume->brand }}</p>
                            <p>{{ $perfume->description }}</p>
                            <a
                                href="https://api.whatsapp.com/send?phone=+573162352634&text=Hola,%20quisiera%20saber%20si%20el%20perfume%20'{{ urlencode($perfume->name) }}'%20está%20disponible."
                                class="buy-button"
                                target="_blank"
                                rel="noopener noreferrer">
                                Comprar
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    {{ $perfumes->appends(request()->query())->links('vendor.pagination.simple-default') }}
                </div>
            </div>

            <div class="about-container container">
                <div class="about-profile">
                    <div class="profile-image">
                        <img src="/placeholder.svg?height=100&width=100" alt="Perfil">
                    </div>
                    <div class="profile-text">
                        <p>Lorem ipsum dolor sit amet, consectetur. Imperdiet posuere quam quis urna adipiscing leo eget suspendisse varius. Dictum adipiscing nisi et neque. Sem tincidunt aliquet cursus enim. Sit dolor pharetra in tortor integer diam accumsan in ipsum.</p>
                    </div>
                </div>
                <div class="about-description">
                    <p>En Zafiro, nos apasiona el mundo de las fragancias y la exclusividad. Nos especializamos en la venta de perfumes originales de las marcas más reconocidas a nivel mundial, como Versace, Carolina Herrera, Dior y muchas más.</p>
                    <p>Creemos que un perfume es más que un aroma; es una expresión de identidad, un sello personal que deja huella. Por eso, seleccionamos cuidadosamente cada fragancia para ofrecerte lo mejor en elegancia, sofisticación y frescura.</p>
                    <p>Nuestro compromiso es brindarte calidad, autenticidad y una experiencia de compra única. Descubre en Zafiro el perfume ideal para cada momento y deja que tu esencia hable por ti.</p>
                </div>
            </div>

            <div class="contact-container container">
                <div class="contact-form-container">
                    <!-- Aquí puedes agregar un formulario de contacto si lo deseas -->
                </div>
                <div class="social-media">
                    <div class="social-item">
                        <img src="/placeholder.svg?height=40&width=40" alt="WhatsApp" class="social-icon whatsapp">
                        <span>+57 1234567890</span>
                    </div>
                    <div class="social-item">
                        <img src="/placeholder.svg?height=40&width=40" alt="Instagram" class="social-icon instagram">
                        <span>@ZafiroFragance</span>
                    </div>
                    <div class="social-item">
                        <img src="/placeholder.svg?height=40&width=40" alt="Facebook" class="social-icon facebook">
                        <span>@ZafiroFragance</span>
                    </div>
                </div>
            </div>
        </div>


        <style>
            .welcome-container {
                background-color: #f4f4f4;
            }

            .container {
                height: 90vh;
                margin: 0 auto;
                padding: 0 20px;
            }

            .products-container {
                padding: 20px 0;
                margin-bottom: 50px;
            }

            .pagination {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 15px;
                margin-top: 20px;
            }

            .pagination .page-link {
                font-size: 5.5rem; /* Tamaño de la fuente de las flechas */
                padding: 10px 15px; /* Espaciado dentro del botón */
                color: white; /* Color de las flechas */
                border-radius: 5px;
                text-decoration: none; /* Sin subrayado */
                transition: all 0.3s ease;
            }

            .pagination .page-link:hover {
                color:rgb(180, 180, 180); /* Color del texto al pasar el cursor */
            }

            .large-arrow {
                font-size: 4rem; /* Agranda las flechas */
                font-weight: bold;
            }
            .filter-sidebar {
                height: 350px;
                overflow: hidden;
                position: relative;
            }
            .filter-sidebar.expanded {
                max-height: none;
            }
            .filter-option {
                display: block;
                padding: 10px;
                background-color: #f4f4f4;
                margin: 5px 0;
                text-decoration: none;
                color: #333;
                border-radius: 4px;
                text-align: center;
                position: relative;
                width: 100%;
            }
            .filter-option.active {
                background-color:rgb(109, 109, 109);
                color: white;
            }
            .filter-sidebar.expanded + .carousel-arrow {
                display: none;
            }
            .products-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }

            .product-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
                padding: 10px;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                min-height: 300px;
                max-height: 250px;
                min-height: unset;
            }

            .product-card img {
                max-width: 40%;
                height: auto;
                border-radius: 4px;
            }

            .product-card h3 {
                margin: 10px 0;
                font-size: 1.2rem;
            }

            .product-card p {
                margin: 5px 0;
                color: #555;
            }

            /* Truncamiento de texto */
            .truncate-wrapper {
                position: relative;
            }

            .truncate {
                max-width: 200px; /* Ajusta el ancho según sea necesario */
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                cursor: default; /* Deshabilita el cursor de puntero */
            }

            .brands-container {
                display: flex;
                flex-direction: column;
                gap: 10px;
                position: relative;
            }

            .arrow-container {
                text-align: center;
                cursor: pointer;
                margin-top: 10px;
            }

            .arrow-up, .arrow-down {
                font-size: 1.5em;
                color: #007bff;
                transition: transform 0.3s ease;
            }

            /* Nuevos estilos para el truncamiento de texto en los botones de marca */
            .brand-button-wrapper {
                position: relative;
                width: 100%;
            }

            .brand-text {
                display: block;
                max-width: 100%;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            /* Estilo para el tooltip */
            .brand-button-wrapper:hover::after {
                content: attr(title);
                position: absolute;
                left: 105%;
                top: 50%;
                transform: translateY(-50%);
                background-color: rgba(211, 27, 27, 0.8);
                color: white;
                padding: 5px 10px;
                border-radius: 4px;
                z-index: 10000;
                white-space: nowrap;
                font-size: 0.9em;
                pointer-events: none;
            }


            @media (max-width: 768px) {
                .brand-button-wrapper:hover::after {
                    left: auto;
                    right: 105%;
                }
            }
        </style>

    </body>
    </html>
