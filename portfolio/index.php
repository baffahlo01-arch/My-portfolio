<?php
$status = $_GET['status'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Abdulmumin Bawa Mannir</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="nav-logo">
                <span class="logo-bracket">&lt;</span>Portfolio<span class="logo-bracket">/&gt;</span>
            </a>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link active">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#projects" class="nav-link">Projects</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark/light mode">
                <i class="fas fa-moon" id="themeIcon"></i>
            </button>
            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <p class="hero-greeting">Hello, I'm</p>
                <h1 class="hero-title">
                    <span class="gradient-text">Abdulmumin Bawa Mannir</span>
                </h1>
                <h2 class="hero-subtitle">
                    <span class="typing-text">Creative Developer</span>
                    <span class="cursor">|</span>
                </h2>
                <p class="hero-description">
                    I craft digital experiences that blend creativity with technical excellence. 
                    Specializing in modern web development and interactive design.
                </p>
                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> View Projects
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        <i class="fas fa-envelope"></i> Get In Touch
                    </a>
                </div>
                                <div class="hero-socials">
                    <a href="https://github.com/baffahlo01-arch" target="_blank" class="social-link" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com/in/Abdulmumin Bawa Mannir" target="_blank" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link" aria-label="Dribbble"><i class="fab fa-dribbble"></i></a>
                </div>
            </div>
            <div class="hero-image">
                <div class="image-wrapper">
                    <div class="image-bg"></div>
                    <img src="PHOTO.jpeg" alt="Profile" class="profile-img">
                    <div class="floating-card card-1">
                        <i class="fas fa-code"></i>
                        <span>Clean Code</span>
                    </div>
                    <div class="floating-card card-2">
                        <i class="fas fa-palette"></i>
                        <span>Creative Design</span>
                    </div>
                    <div class="floating-card card-3">
                        <i class="fas fa-bolt"></i>
                        <span>Fast Performance</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <span>Scroll Down</span>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">About Me</span>
                <h2 class="section-title">Passionate About Creating <span class="highlight">Digital Excellence</span></h2>
            </div>
            <div class="about-content">
                <div class="about-image">
                    <div class="about-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=600&h=700&fit=crop" alt="Working">
                        <div class="experience-badge">
                            <span class="exp-number">1+</span>
                            <span class="exp-text">Year of<br>Experience</span>
                        </div>
                    </div>
                </div>
                <div class="about-text">
                    <h3>Building the web, one pixel at a time</h3>
                    <p>
                       I am a backend developer dedicated to building the robust, scalable architectures that power seamless digital experiences. 
                       With a year of industry experience, I have contributed to diverse projects ranging from agile startups to established systems
                    </p>
                    <p>
                        My approach centers on technical precision and creative logic, ensuring that every piece of software 
                        is as reliable as it is efficient.
                    </p>
                    <div class="about-stats">
                        <div class="stat-item">
                            <span class="stat-number">10</span>
                            <span class="stat-label">Projects Completed</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">9</span>
                            <span class="stat-label">Happy Clients</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Client Satisfaction</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-download"></i> Download Resume
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Portfolio</span>
                <h2 class="section-title">Featured <span class="highlight">Projects</span></h2>
            </div>
            <div class="projects-filter">
                <button class="filter-btn active" data-filter="all">All</button>
            </div>
            <div class="projects-grid">
                <div class="project-card" data-category="web">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop" alt="Project 1">
                        <div class="project-overlay">
                            <div class="project-links">
                                <a href="#" class="project-link" aria-label="View Live"><i class="fas fa-external-link-alt"></i></a>
                                <a href="#" class="project-link" aria-label="View Code"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">Web Application</span>
                        <h3 class="project-title">E-Commerce Dashboard</h3>
                        <p class="project-description">A comprehensive analytics dashboard for e-commerce platforms with real-time data visualization.</p>
                        <div class="project-tech">
                            <span>React</span>
                            <span>Node.js</span>
                            <span>MongoDB</span>
                        </div>
                    </div>
                </div>

                <div class="project-card" data-category="design">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&h=400&fit=crop" alt="Project 3">
                        <div class="project-overlay">
                            <div class="project-links">
                                <a href="#" class="project-link" aria-label="View Live"><i class="fas fa-external-link-alt"></i></a>
                                <a href="#" class="project-link" aria-label="View Code"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">UI/UX Design</span>
                        <h3 class="project-title">Brand Identity System</h3>
                        <p class="project-description">Complete brand identity design including logo, color system, and design guidelines.</p>
                        <div class="project-tech">
                            <span>Figma</span>
                            <span>Illustrator</span>
                            <span>After Effects</span>
                        </div>
                    </div>
                </div>

                <div class="project-card" data-category="design">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=600&h=400&fit=crop" alt="Project 6">
                        <div class="project-overlay">
                            <div class="project-links">
                                <a href="#" class="project-link" aria-label="View Live"><i class="fas fa-external-link-alt"></i></a>
                                <a href="#" class="project-link" aria-label="View Code"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-tag">UI/UX Design</span>
                        <h3 class="project-title">Design System</h3>
                        <p class="project-description">Comprehensive component library and design system for enterprise applications.</p>
                        <div class="project-tech">
                            <span>Figma</span>
                            <span>Storybook</span>
                            <span>CSS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="skills">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Expertise</span>
                <h2 class="section-title">Technical <span class="highlight">Skills</span></h2>
            </div>
            <div class="skills-content">
                <div class="skills-category">
                    <h3 class="category-title"><i class="fas fa-code"></i> Frontend Development</h3>
                    <div class="skills-grid">
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-html5"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">HTML5 & CSS3</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 95%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-js"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">JavaScript</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 90%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-react"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">React.js</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 88%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-vuejs"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Vue.js</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 82%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skills-category">
                    <h3 class="category-title"><i class="fas fa-server"></i> Backend Development</h3>
                    <div class="skills-grid">
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-node-js"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Node.js</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 85%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-python"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Python</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 80%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fas fa-database"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">MongoDB</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 78%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fas fa-fire"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Firebase</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 75%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skills-category">
                    <h3 class="category-title"><i class="fas fa-paint-brush"></i> Design & Tools</h3>
                    <div class="skills-grid">
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-figma"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Figma</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 92%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-git-alt"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Git & GitHub</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 88%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fab fa-docker"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Docker</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 70%"></div></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-icon"><i class="fas fa-mobile-alt"></i></div>
                            <div class="skill-info">
                                <span class="skill-name">Responsive Design</span>
                                <div class="skill-bar"><div class="skill-progress" style="width: 95%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Contact</span>
                <h2 class="section-title">Let's Work <span class="highlight">Together</span></h2>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Get in touch</h3>
                    <p>Have a project in mind? Let's create something amazing together. I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <span class="label">Email</span>
                                <span class="value">baffahlo01@gmail.com</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <span class="label">Phone</span>
                                <span class="value">+90(531)6927327</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <span class="label">Location</span>
                                <span class="value">istanbul</span>
                            </div>
                        </div>
                    </div>
                                        <div class="contact-socials">
                        <a href="https://github.com/baffahlo01-arch" target="_blank" class="social-link" aria-label="GitHub"><i class="fab fa-github"></i></a>
                        <a href="https://linkedin.com/in/Abdulmumin Bawa Mannir" target="_blank" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="contact-form-wrapper">
                    <form class="contact-form" id="contactForm" action="save_contact.php" method="POST">
                        <div class="form-group">
                            <input type="text" id="name" name="name" required placeholder=" " minlength="2" maxlength="50" pattern="[A-Za-z\s]{2,50}">
                            <label for="name">Your Name</label>
                            <i class="fas fa-user"></i>
                            <span class="error-message" id="nameError">Please enter a valid name (2-50 letters only)</span>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" required placeholder=" ">
                            <label for="email">Your Email</label>
                            <i class="fas fa-envelope"></i>
                            <span class="error-message" id="emailError">Please enter a valid email address</span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="subject" name="subject" required placeholder=" " minlength="3" maxlength="100">
                            <label for="subject">Subject</label>
                            <i class="fas fa-tag"></i>
                            <span class="error-message" id="subjectError">Subject must be 3-100 characters</span>
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" rows="5" required placeholder=" " minlength="10" maxlength="1000"></textarea>
                            <label for="message">Your Message</label>
                            <i class="fas fa-comment"></i>
                            <span class="error-message" id="messageError">Message must be 10-1000 characters</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                        <?php if ($status === 'success'): ?>
                            <div class="form-status success" style="display: block;">
                                <i class="fas fa-check-circle"></i> Message sent successfully!
                            </div>
                        <?php elseif ($status === 'error'): ?>
                            <div class="form-status error" style="display: block;">
                                <i class="fas fa-exclamation-circle"></i> Something went wrong. Please try again.
                            </div>
                        <?php else: ?>
                            <div class="form-status" id="formStatus"></div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="#" class="footer-logo">
                        <span class="logo-bracket">&lt;</span>Portfolio<span class="logo-bracket">/&gt;</span>
                    </a>
                    <p>Creating digital experiences that inspire and engage.</p>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Mobile Apps</a></li>
                        <li><a href="#">UI/UX Design</a></li>
                        <li><a href="#">Consulting</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Abdulmumin Bawa Mannir. All rights reserved.</p>
                <p>Built with <i class="fas fa-heart"></i> and lots of <i class="fas fa-coffee"></i></p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>