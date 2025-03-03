<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zafiro - Perfumes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="nav-container">
            <div class="navbar">
                <a href="productos.html">Productos</a>
                <a href="nosotros.html">Nosotros</a>
                <a href="contacto.html">Contacto</a>
            </div>
        </div>

        <div class="content">
            <div class="text-content">
                <h1 class="brand-name">Zafiro</h1>
                <p class="tagline">Luce, brilla y deja tu huella</p>
            </div>

            <div class="perfume-images">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/WhatsApp%20Image%202025-03-03%20at%2017.04.15_45b25949.jpg-vmWy07PpwTpSh5BycUX3vk6bDrpkWs.jpeg" alt="Perfumes de lujo" style="display: none;">
                <!-- Reemplaza estas URLs con imágenes reales de perfumes -->
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
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
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

<style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; } body { width: 100%; height: 100vh; overflow: auto; background-color: #1a1a1a; color: white; } .container { width: 100%; min-height: 100vh; padding: 20px; position: relative; } /* Navegación */ .nav-container { display: flex; justify-content: center; width: 100%; padding: 15px 0; } .navbar { background-color: white; border-radius: 30px; padding: 10px 40px; display: flex; justify-content: space-between; width: 60%; max-width: 700px; } .navbar a { text-decoration: none; color: black; font-size: 18px; font-weight: 500; padding: 5px 15px; position: relative; } .navbar a.active::after { content: ''; position: absolute; bottom: -5px; left: 15px; right: 15px; height: 2px; background-color: black; } /* Página de inicio */ .content { display: flex; align-items: center; justify-content: space-between; height: calc(100% - 100px); padding: 0 50px; } .text-content { color: #cccccc; z-index: 2; } .brand-name { font-size: 150px; font-weight: 300; line-height: 1; margin-bottom: 20px; } .tagline { font-size: 32px; font-weight: 300; } .perfume-images { position: relative; height: 400px; width: 500px; z-index: 1; } .perfume-1 { position: absolute; height: 350px; transform: rotate(15deg); left: 0; bottom: 0; z-index: 2; } .perfume-2 { position: absolute; height: 350px; right: 0; bottom: 0; z-index: 1; } /* Página de productos */ .products-container { display: flex; margin-top: 50px; position: relative; } .filter-sidebar { width: 200px; background-color: rgba(50, 50, 50, 0.5); border-radius: 15px; padding: 20px; display: flex; flex-direction: column; align-items: center; } .filter-option { color: white; text-decoration: none; margin: 15px 0; font-size: 18px; position: relative; } .filter-option.active::after { content: ''; position: absolute; bottom: -5px; left: 0; right: 0; height: 2px; background-color: white; } .products-grid { display: grid; grid-template-columns: repeat(3, 1fr); grid-gap: 20px; flex-grow: 1; padding: 0 20px; } .product-card { background-color: white; border-radius: 10px; height: 150px; } .carousel-arrow { display: flex; align-items: center; justify-content: center; font-size: 40px; color: white; padding: 0 20px; } /* Página de nosotros */ .about-container { display: flex; margin-top: 50px; gap: 50px; } .about-profile { flex: 1; background-color: rgba(50, 50, 50, 0.5); border-radius: 15px; padding: 30px; display: flex; flex-direction: column; align-items: center; text-align: center; } .profile-image { width: 100px; height: 100px; border-radius: 50%; overflow: hidden; background-color: #8888aa; margin-bottom: 20px; } .profile-image img { width: 100%; height: 100%; object-fit: cover; } .profile-text { line-height: 1.6; } .about-description { flex: 1; text-align: right; display: flex; flex-direction: column; justify-content: center; line-height: 1.8; } .about-description p { margin-bottom: 20px; } /* Página de contacto */ .contact-container { display: flex; flex-direction: column; justify-content: space-between; height: calc(100vh - 150px); } .contact-form-container { flex-grow: 1; background-color: rgba(50, 50, 50, 0.5); border-radius: 15px; margin: 50px 0; padding: 30px; } .social-media { display: flex; justify-content: space-around; padding: 20px 0; } .social-item { display: flex; align-items: center; gap: 10px; } .social-icon { width: 40px; height: 40px; border-radius: 50%; } .whatsapp { background-color: #25D366; } .instagram { background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D); } .facebook { background-color: #1877F2; } /* Responsive */ @media (max-width: 1200px) { .brand-name { font-size: 120px; } .perfume-images { width: 400px; } .perfume-1, .perfume-2 { height: 300px; } .about-container { flex-direction: column; } .about-description { text-align: center; } } @media (max-width: 900px) { .navbar { width: 80%; } .content { flex-direction: column; text-align: center; padding-top: 50px; } .brand-name { font-size: 100px; } .perfume-images { margin-top: 50px; } .products-container { flex-direction: column; } .filter-sidebar { width: 100%; flex-direction: row; justify-content: space-around; margin-bottom: 20px; } .products-grid { grid-template-columns: repeat(2, 1fr); } .social-media { flex-direction: column; gap: 20px; } } @media (max-width: 600px) { .navbar { width: 95%; padding: 10px 20px; } .navbar a { font-size: 16px; padding: 5px 10px; } .brand-name { font-size: 70px; } .tagline { font-size: 24px; } .perfume-images { width: 300px; } .perfume-1, .perfume-2 { height: 250px; } .products-grid { grid-template-columns: 1fr; } }
</style>
</html>
