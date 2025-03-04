<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zafiro - Perfumes</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="nav-container">
            <div class="navbar">
                <a href="productos.html">Productos</a>
                <a href="nosotros.html">Nosotros</a>
                <a href="contacto.html">Contacto</a>
                <a href="{{ route('login') }}">Log-in</a>
            </div>
        </div>

        <div class="content">
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
                <a href="#" class="filter-option active">All</a>
                <a href="#" class="filter-option">Men</a>
                <a href="#" class="filter-option">Women</a>
            </div>

            <div class="products-grid">
                @foreach ($perfumes as $perfume)
                <div class="product-card">
                    <h3>{{ $perfume->name }}</h3>
                    <p><strong>Marca:</strong> {{ $perfume->brand }}</p>
                    <p>{{ $perfume->description }}</p>
                </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="pagination">
                {{ $perfumes->links() }}
            </div>

            <div class="carousel-arrow">
                <span>&gt;</span>
            </div>
        </div>

        <div class="about-container">
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
        <div class="contact-container">
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
</body>
</html>
