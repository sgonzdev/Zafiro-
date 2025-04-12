    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zafiro - Perfumes</title>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body>
        <div class="container welcome-container">
            <div class="nav-container">
                <div class="navbar">
                    <a href="productos.html">Productos</a>
                    <a href="nosotros.html">Nosotros</a>
                    <a href="#contacto">Contacto</a>
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
                    <img class="perfume-1" src="https://peacearchdutyfree.com/media/catalog/product/cache/eda70f405f0e744d807f92913507b2ef/5/0/504715-1.png" alt="Perfume Sauvage">
                    <img class="perfume-2" src="https://www.orienticaperfumes.com/cdn/shop/files/royal-amber_19b23aeb-c29e-4786-b35c-49a4b42972ce_grande.png?v=1709181889" alt="Perfume Amber Rouge">
                    <img class="perfume-3" src="https://www.perfumeriajulia.es/47973-medium_default/sauvage-after-shave-100-ml.jpg" alt="Perfume Amber Rouge">
                </div>
            </div>

            <div  id="products" class="products-container container">
                <aside class="brands-sidebar">
                    <h3 class="sidebar-title">Filtrar por Marca</h3>
                    <ul class="brands-list">
                        <li>
                            <a href="{{ route('welcome', ['brand' => 'All']) }}#products" class="brand-link {{ request('brand') == 'All' ? 'active' : '' }}">
                                Todas
                            </a>
                        </li>
                        @foreach ($brands as $brand)
                            <li>
                                <a href="{{ route('welcome', ['brand' => $brand]) }}#products" class="brand-link {{ request('brand') == $brand ? 'active' : '' }}">
                                    {{ $brand }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>

                <!-- Grid de productos -->
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
                                <h3 class="product-name">{{ $perfume->name }}</h3>
                                <p class="product-description">{{ $perfume->description }}</p>
                                <a href="https://api.whatsapp.com/send?phone=+573162352634&text=Hola,%20quisiera%20saber%20si%20el%20perfume%20'{{ urlencode($perfume->name) }}'%20está%20disponible." class="buy-button" target="_blank" rel="noopener noreferrer">Comprar</a>
                            </div>
                        </div>
                    @endforeach

                    <div class="pagination container">
                        {{ $perfumes->appends(request()->query())->links('vendor.pagination.simple-default') }}
                    </div>
                </div>
            </div>

            <div class="about-container container">
                <div class="about-profile">
                    <div class="profile-image">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Perfil">
                    </div>
                    <div class="profile-text">
                        <p>En Zafiro, nos apasiona ofrecerte las mejores lociones y fragancias para cada ocasión. Nos caracteriza la elegancia, calidad y exclusividad, brindándote una amplia selección de perfumes que reflejan tu estilo y personalidad.</p>
                        <p>Descubre nuestra colección y déjate envolver por aromas irresistibles. Porque en Zafiro, cada esencia cuenta una historia.</p>
                    </div>
                </div>
                <div class="about-description" style="text-align: center;">
                    <p>En Zafiro, nos apasiona el mundo de las fragancias y la exclusividad. Nos especializamos en la venta de perfumes originales de las marcas más reconocidas a nivel mundial, como Versace, Carolina Herrera, Dior y muchas más.</p>
                    <p>Creemos que un perfume es más que un aroma; es una expresión de identidad, un sello personal que deja huella. Por eso, seleccionamos cuidadosamente cada fragancia para ofrecerte lo mejor en elegancia, sofisticación y frescura.</p>
                    <p>Nuestro compromiso es brindarte calidad, autenticidad y una experiencia de compra única. Descubre en Zafiro el perfume ideal para cada momento y deja que tu esencia hable por ti.</p>
                </div>
            </div>

            <div class="contact-container">
                <div class="social-media">
                    <div class="social-item">
                        <a href="https://wa.me/571234567890" target="_blank">
                            <box-icon name="whatsapp" type="logo" color="#01ff00" size="45px"></box-icon>
                        </a>
                        <span style="font-size: 15px">+57 3202477687</span>
                    </div>
                    <div class="social-item">
                        <box-icon type="logo" name="instagram" size="40px" style="background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%); border-radius: 10px;" color="white"></box-icon>
                        <span style="font-size: 15px">@Zafiro_eternalessence</span>
                    </div>
                    <div class="social-item">
                        <box-icon name="facebook-square" type="logo" size="45px" color="#0081ff"></box-icon>
                        <span style="font-size: 15px">@ZafiroFragance</span>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/welcome.js') }}"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <script>
           document.addEventListener('DOMContentLoaded', () => {
        // Verifica si el hash es #products
        if (window.location.hash === '#products') {
            const productsContainer = document.getElementById('products');
            if (productsContainer) {
                // Hacer scroll al contenedor
                productsContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
            }
        }
    });
        </script>
    </body>
    </html>
