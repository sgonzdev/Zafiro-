    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zafiro - Perfumes</title>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

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
                            <div class="product-image">
                                <img src="{{ $perfume->image_url }}" alt="{{ $perfume->name }}">
                            </div>
                            @else
                            <div class="product-image">
                                <img src="/placeholder.svg?height=150&width=150" alt="{{ $perfume->name }}">
                            </div>
                            @endif
                            <div class="product-info">
                                <div class="tooltip-container name-container">
                                    <h3 class="product-name">{{ $perfume->name }}</h3>
                                    <div class="tooltip name-tooltip">{{ $perfume->name }}</div>
                                </div>
                                <div class="tooltip-container desc-container">
                                    <p class="product-description">{{ $perfume->description }}</p>
                                    <div class="tooltip desc-tooltip">{{ $perfume->description }}</div>
                                </div>
                                <a
                                    href="https://api.whatsapp.com/send?phone=+573162352634&text=Hola,%20quisiera%20saber%20si%20el%20perfume%20'{{ urlencode($perfume->name) }}'%20está%20disponible."
                                    class="buy-button"
                                    target="_blank"
                                    rel="noopener noreferrer">
                                    Comprar
                                </a>
                            </div>
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
        <script src="{{ asset('js/welcome.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const filterOptions = document.querySelectorAll('.filter-option');
                filterOptions.forEach(option => {
                    option.addEventListener('click', function(e) {
                        e.preventDefault();
                        filterOptions.forEach(opt => opt.classList.remove('active'));
                        this.classList.add('active');
                        const brand = this.getAttribute('data-brand');
                        window.location.href = '{{ route("welcome") }}' + (brand === 'All' ? '' : '?brand=' + brand);
                    });
                });
            });
            </script>
    </body>
    </html>
