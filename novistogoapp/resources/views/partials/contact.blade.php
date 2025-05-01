<section id="contact" class="contact">
    <div class="container">
        <div class="section-header">
            <h2>Contactez-nous</h2>
            <div class="separator"></div>
        </div>
        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Adresse</h3>
                        <p>Agoè-Dalimé à coté de l'Ecole Privée FABIENNE 3, Lomé, Togo</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h3>Téléphone</h3>
                        <p>+228 (+228) 90 52 62 75 / 70 41 12 55/96 08 89 02</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <p>novistogo1@gmail.com</p>
                    </div>
                </div>
                <div class="social-media">
                    <h3>Suivez-nous</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Votre email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject" name="subject" placeholder="Sujet">
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" placeholder="Votre message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>