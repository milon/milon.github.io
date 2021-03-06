<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Nuruzzaman_Milon_resume</title>
    <link rel="shortcut icon" href="/assets/images/favicon.png"/>
    <link rel="stylesheet" href="{{ mix('css/resume.css', 'assets/build') }}">

    @include('_layouts._partials._cv_meta', [
        'title' => 'milon.im | Resume',
        'description' => "Resume of Nuruzzaman Milon",
    ])
</head>

<body lang="en">
    <section id="main">
        <header id="title">
            <div class="text">
                <h1>
                    <a href="{{ $page->baseUrl }}">Nuruzzaman Milon</a>
                </h1>
                <span class="subtitle">Programmer, Author and Tech Enthusiast</span>
            </div>
            <div class="qr-code">
                <img src="/assets/images/qr-code.png" alt="qr-code">
            </div>
        </header>
        <section class="main-block">
            <h2>
              <i class="fas fa-briefcase"></i> Work Experiences
            </h2>
            <section class="blocks">
                <div class="date">
                    <span>Present</span><span>January, 2020</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Senior Full-Stack Software Engineer</h3>
                        <span class="place">Flixbus (<a href="https://global.flixbus.com">https://global.flixbus.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Berlin, Germany</span>
                    </header>
                    <div>
                        <ul>
                            <li>Working as a full-stack engineer in Team Deathstar on Network Planning domain.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>December, 2019</span><span>July, 2019</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Senior Software Engineer</h3>
                        <span class="place">Urban Sports Club (<a href="https://urbansportsclub.com">https://urbansportsclub.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Berlin, Germany</span>
                    </header>
                    <div>
                        <ul>
                            <li>Working as a senior backend engineer on financing, payment and GDPR compliance.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>June, 2019</span><span>May, 2018</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Senior Software Engineer</h3>
                        <span class="place">Check24 Vergleichsportal Autoteile GmbH (<a href="https://www.check24.de">https://www.check24.de</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Münster, Germany</span>
                    </header>
                    <div>
                        <ul>
                            <li>Working as a full stack engineer to develop new feature and support the legacy codebase.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>April, 2018</span><span>May, 2016</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Senior Software Engineer</h3>
                        <span class="place">Telenor Health A\S (<a href="https://telenorhealth.com">https://telenorhealth.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div>
                        <ul>
                            <li>Created a digital healthcare solution that serves affordable health services (medications, informations, insurance etc.) to more that 5.5 million people.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>April, 2016</span><span>February, 2015</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Software Engineer</h3>
                        <span class="place">WeDevs Ltd. (<a href="https://wedevs.com">https://wedevs.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div>
                        <ul>
                            <li>Requirement analysis, product design, application architecture, coding, testing, code review, manage version control system.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>January, 2015</span><span>September, 2013</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Software Engineer</h3>
                        <span class="place">Brotecs Technologies Ltd. (<a href="https://brotecs.com/">https://brotecs.com/</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div>
                        <ul>
                            <li>Works on web technologies on frontend and backend and business intelligence.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>August, 2013</span><span>February, 2011</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Programmer and System Analyst</h3>
                        <span class="place">ITMedicus Bangladesh Ltd. (<a href="http://itmedicus.com">http://itmedicus.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div>
                        <ul>
                            <li>Write and manage codebase, database and product design, handle clients.</li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>

        <section class="main-block">
            <h2>
          <i class="far fa-folder-open"></i> Skills
        </h2>
            <section class="blocks">
                <div class="date">
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Technical Skill</h3>
                    </header>
                    <div>
                      <ul>
                          <li>PHP, Node.js, Kotlin, Python</li>
                          <li>Laravel, Symfony, ReactJS, VueJS, ReactNative, Ktor</li>
                          <li>HTML5, CSS3, JavaScript, Typescript</li>
                          <li>Apache, Nginx, Microservices, REST, Docker, Kubernetes, Jenkins, Ansible</li>
                          <li>Agile, Scrum, Kanban</li>
                          <li>PostgreSQL, MySQL, SQLite, MongoDB, Redis</li>
                          <li>Beanstalkd, IronMQ, RabbitMQ, Kafka</li>
                          <li>Amazon AWS(EC2, S3, RDS)</li>
                          <li>Git, SVN</li>
                      </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Programming Skill</h3>
                    </header>
                    <div>
                        <ul>
                            <li>Got 600+ accepted solutions at <a href="http://uhunt.felix-halim.net/id/60925">UVa Online Judge</a></li>
                            <li>Winner of National Collegiate Software Contest (NCSC), 2011 held at Shahjalal University of Science and Technology (SUST)</li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>

        <section class="main-block concise">
            <h2>
              <i class="fas fa-graduation-cap"></i> Education
            </h2>
            <section class="blocks">
                <div class="date">
                    <span>2013</span><span>2009</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>B.Sc Engineering in Information and Communication Technology</h3>
                        <span class="place">Mawlana Bhashani Science and Technology University</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Tangail, Bangladesh</span>
                    </header>
                    <div>
                        <ul>
                            <li>President, Society of ICT (Chief Organizer of 1st MBSTU ICT Fest)</li>
                            <li>Member, Rotary Club of MBSTU</li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
        <section class="main-block concise">
            <h2>
              <i class="fas fa-book"></i> Books and Publication
            </h2>
            <section class="blocks">
                <div class="date">
                    <span>2015</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3><a href="http://milon.im/laravel">Laravel PHP Web Framework</a></h3>
                        <span class="place">
                            Dimik Publication <br>
                            ISBN: 978-984-33-9190-2
                        </span>
                    </header>
                </div>
            </section>
        </section>

    </section>
    <aside id="sidebar">
        <div class="side-block">
            <img src="/assets/images/avatar.jpg" alt="avatar" class="avatar">
        </div>
        <div class="side-block" id="personal-info">
            <h1>
                <i class="far fa-user-circle"></i>
                About Me
            </h1>
            <ul>
                <li>Bestseller author</li>
                <li>Opensource evangelist and contributor</li>
                <li>Polyglot programmer</li>
                <li>Algorithm based problem solver</li>
                <li>Scrum and agile enthusiast and practitioner</li>
                <li>Team player, experienced with managing team</li>
                <li>Conference speaker</li>
                <li>Technology community leader</li>
                <li>Technology blogger</li>
            </ul>
        </div>
        <div class="side-block" id="cert-info">
            <h1>
                <i class="fas fa-certificate"></i>
                Certifications
            </h1>
            <ul>
                <li>
                    <i class="fab fa-laravel"></i>
                    <a href="https://exam.laravelcert.com/is/nuruzzaman-milon/certified-since/2018-01-08">Certified Laravel Developer</a>
                </li>
                <li>
                    <i class="icon-scrum"></i>
                    <a href="http://bcert.me/swajseym">Certified Scrum Professional<sup>®</sup></a>
                </li>
                <li>
                    <i class="icon-scrum"></i>
                    <a href="http://bcert.me/snynrkpl">Certified ScrumMaster<sup>®</sup></a>
                </li>
                <li>
                    <i class="icon-scrum"></i>
                    <a href="http://bcert.me/skctlvko">Certified Scrum Developer<sup>®</sup></a>
                </li>
                <li>
                    <i class="icon-scrum"></i>
                    <a href="https://bcert.me/segniwpnm">Advanced Certified Scrum Developer<sup>&#8480;</sup></a>
                </li>
            </ul>
        </div>
        <div class="side-block" id="personal-info">
            <h1>
                <i class="fas fa-language"></i>
                Language
            </h1>
            <ul>
                <li>English</li>
                <li>Bangla</li>
            </ul>
        </div>
        <div class="side-block" id="contact">
            <h1>
                <i class="far fa-address-card"></i>
                Contact Info
            </h1>
            <ul>
                <li><i class="fas fa-globe-americas"></i> <a href="https://milon.im">https://milon.im</a></li>
                <li><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/tomilon">linkedin.com/in/tomilon</a></li>
                <li><i class="far fa-envelope"></i> contact@milon.im</li>
                <li><i class="fab fa-skype"></i> milon521</li>
                <li class="print"><i class="fas fa-phone"></i> +491776974274</li>
                <li class="print"><i class="fas fa-home"></i> Schalkauer Straße 24, <br>13055 Berlin, Germany</li>
            </ul>
        </div>
        <div class="side-block" id="personal-info">
            <h1>
                <i class="far fa-user"></i>
                Personal Info
            </h1>
            <ul>
                <li>Nationality: Bangladeshi</li>
                <li>Marital Status: Married</li>
                <li>DoB: August 1st, 1991</li>
            </ul>
        </div>
        <div class="side-block" id="links">
            <h1>
                <i class="fas fa-link"></i>
                Links
            </h1>
            <ul>
                <li><i class="fab fa-twitter"></i> <a href="https://twitter.com/to_milon">@to_milon</a></li>
                <li><i class="fab fa-github"></i> <a href="https://github.com/milon">github.com/milon</a></li>
                <li><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/tomilon">linkedin.com/in/tomilon</a></li>
                <li><i class="fab fa-speaker-deck"></i> <a href="https://speakerdeck.com/milon">speakerdeck.com/milon</a></li>
                <li><i class="fab fa-slideshare"></i> <a href="http://www.slideshare.net/milon521">slideshare.net/milon521</a></li>
            </ul>
        </div>
        <div class="side-block" id="disclaimer">
            <a href="/assets/pdf/Nuruzzaman_Milon_resume.pdf" download class="btn"><i class="fas fa-download"></i> Download</a>
            <p>This resume is available online at <br> &mdash; <a href="https://milon.im/resume">https://milon.im/resume</a></p>
        </div>
    </aside>

    @if ($page->production)
        @include('_layouts._partials._analytics')
    @endif
</body>

</html>
