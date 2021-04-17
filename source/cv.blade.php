<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Nuruzzaman_Milon_cv</title>
    <link rel="shortcut icon" href="/assets/images/favicon.png"/>
    <link rel="stylesheet" href="{{ mix('css/cv.css', 'assets/build') }}">

    @include('_layouts._partials._cv_meta', [
            'title' => 'milon.im | CV',
            'description' => "Curriculum Vitae of Nuruzzaman Milon",
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
                            <li>Working as a full-stack engineer on Flix McDriver app team.</li>
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
                        <p>Working as a senior backend engineer to manage and manintain existing codebase as well as build new features. Taking care of financing, payment and GDPR compliance as well.</p>
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
                        <span class="place">Check24 Vergleichsportal Autoteile GmbH (<a href="https://check24.de">http://check24.de</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Münster, Germany</span>
                    </header>
                    <div>
                        <p>Working on the autoteile team as a full stack engineer to develop new feature, help with deployments and support the legacy codebase.</p>
                        <ul>
                            <li class="project-title">Projects
                                <ul>
                                    <li>Autoteile - A price comparison site for all types of car parts with billing.</li>
                                    <li>Reifen - A price comparison site for various types for car tires.</li>
                                </ul>
                            </li>
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
                        <span class="place">Telenor Health (<a href="https://telenorhealth.com">https://telenorhealth.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div>
                        <p>
                            Created a digital healthcare solution that serves affordable health services
                            (medications, informations, insurance etc.) to more that 5.5 million people
                            and managed a team of 4 developers, 3 interns, 1 QA and a DevOps people.
                        </p>
                        <ul>
                            <li class="project-title">Tonic SMSC
                                <ul>
                                    <li>SMS sending and receiving hub for all Telenor Health SMS.</li>
                                    <li>Used Lumen as an application framework, PostgreSQL as database server, Redis as queue server, Supervisor as monitoring tool.</li>
                                </ul>
                            </li>
                            <li class="project-title">Content as a Service (CAAS)
                                <ul>
                                    <li>Full fledged CMS for managing all health related article, health tips, mobile application cards for the website, iOS app and Android app.</li>
                                    <li>Used Laravel as application framework, PostgreSQL as database server, AngularJS as frontend framework.</li>
                                </ul>
                            </li>
                            <li class="project-title">Other Projects
                                <ul>
                                    <li>Tonic App Backend - Supports Tonic Mobile App (Android and iOS) with all the external and internal services as a proxy gateway.</li>
                                    <li>Tonic Doctor Appointment - Provides API for a doctor appointment booking system.</li>
                                    <li>Castro - A campaign management tool for SMS, email and push-notification campaign.</li>
                                    <li>Tonic Admin - BI and reporting tool for generating the various report, manage subscribers etc.</li>
                                    <li>Tonic Core - Provides all necessary logic and business insights through API to all Tonic services.</li>
                                    <li>Tonic Billing - Billing service for Tonic</li>
                                    <li>Tonic Question and Answer - A community engagement platform for doctors and patients</li>
                                    <li>CarrotCake - A clinical information management system</li>
                                    <li>Navigator - A hospital and doctor directory for patients</li>
                                    <li>Tonic CRM - A customer relationship management tool for Tonic call center agents</li>
                                    <li>Configuration Management - Ansible and Jenkins based platform for automatic deployment</li>
                                    <li>Tonic Movers - A tool for sales and marketing team for ease of their job</li>
                                </ul>
                            </li>
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
                        <p>
                            Requirement analysis, product design, application architecture, coding, testing, code
                            review, manage version control system. Manage a team of 6 developers, 2 software
                            quality assurance and, 1 DevOps engineer, play the role as interim Cheif Technology
                            Officer for about a month.
                        </p>
                        <ul>
                            <li class="project-title">Rx71.co
                                <ul>
                                    <li>This is a huge monolithic application for the Rx71 health service, that includes Health article, symptom checker, doctor and hospital directory with booking, diet plan services.</li>
                                    <li>Used Laravel as application framework, MySQL as database server.</li>
                                </ul>
                            </li>
                            <li class="project-title">Rx71 Hospital Management System
                                <ul>
                                    <li>A cloud-based hospital management Software as a Service (SAAS) built with Laravel.</li>
                                </ul>
                            </li>
                            <li class="project-title">Rx71 Mobile App
                                <ul>
                                    <li>An HTML5 based hybrid mobile application for Rx71 services.</li>
                                    <li>Used AngularJS and IonicJS as main web based technology, also used socket.io for real time web chat.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <div class="print">
                <br/><br/><br/>
            </div>

            <section class="blocks">
                <div class="date">
                    <span>January, 2015</span><span>September, 2013</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>Software Engineer</h3>
                        <span class="place">Brotecs Technologies Ltd. (<a href="https://brotecs.com">https://brotecs.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div>
                        <p>Works on web technologies both in frontend and backend web development. Also works as business intelligence for creating various reports.</p>
                        <ul>
                            <li class="project-title">X2Phone VoIP Service
                                <ul>
                                    <li>X2Phone is a VoIP retailer management, billing and reporting tool.</li>
                                </ul>
                            </li>
                            <li class="project-title">AeroV Web GUI
                                <ul>
                                    <li>AeroV web GUI is settings panel for maintaining Asterisk Server and changes its configuration written in Perl, PHP and C. It also has access control, activity log and rollback feature.</li>
                                </ul>
                            </li>
                            <li class="project-title">Captive Portal
                                <ul>
                                    <li>Airplane entertainment module for Clarus LLC. It kept on a device called SAP-212, which is a call and application server that provides call, email and, other web browsing facility to passengers.</li>
                                </ul>
                            </li>
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
                        <p>Write and manage codebase, database and product design, handle clients.</p>
                        <ul>
                            <li class="project-title">Telemedicine Information Management and Education System (TIMES)
                                <ul>
                                    <li>This is a full-fledged telemedicine software, supports custom hardware for provide quality health care in rural areas.</li>
                                </ul>
                            </li>
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
                            <li>Microservices, REST, SOAP, JSON-RPC</li>
                            <li>Agile, Scrum, Kanban</li>
                            <li>PostgreSQL, MySQL, SQLite, MongoDB, Redis</li>
                            <li>Beanstalkd, IronMQ, RabbitMQ, Kafka</li>
                            <li>PHPUnit, PHPSpec, Codeception, Behat</li>
                            <li>Apache, Nginx</li>
                            <li>Amazon AWS(EC2, S3, RDS), Google APIs, Payment Gateway(Stripe, Paypal, Braintree)</li>
                            <li>Git, SVN</li>
                            <li>Docker, Kubernetes, Jenkins, Ansible</li>
                            <li>Configuring VPS with LAMP, LEMP, MEAN</li>
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
                        <h3>Programming Skill and Awards</h3>
                    </header>
                    <div>
                        <ul>
                            <li>Got 600+ accepted solutions at <a href="http://uhunt.felix-halim.net/id/60925">UVa Online Judge</a></li>
                            <li>Winner at National Collegiate Software Contest (NCSC), 2011 held at Shahjalal University of Science and Technology (SUST)</li>
                            <li>Participant of National Collegiate Programming Contest (NCPC), 2010 held at Daffodil International University (DIU) (Rank: 17).</li>
                            <li>Participant of National Collegiate Programming Contest (NCPC), 2010 held at Islamic University of Technology (IUT) (Rank: 11).</li>
                            <li>Participant of National Collegiate Programming Contest (NCSC), 2010 held at Mawlana Bhashani Science University (MBSTU) (Rank: 4)</li>
                            <li>Participated in countless other national and online programming contests.</li>
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
                            <li>President, Society of ICT</li>
                            <li>Chief Organizer of 1st MBSTU ICT Fest</li>
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
            <section class="blocks">
                <div class="date">
                    <span>2012</span>
                </div>
                <div class="decorator">
                </div>
                <div class="details">
                    <header>
                        <h3>
                            <a href="http://www.medetel.eu/index.php?rub=educational_program&page=program_2%20012#Mobile">
                                Roadmap Dermato-ICT Model and Possible Opportunity to Explore in the Field to Establish
                            </a>
                        </h3>
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
            <h1>About Me</h1>
            <ul>
                <li>Bestseller author</li>
                <li>Opensource evangelist and contributor</li>
                <li>Polyglot programmer, experienced working with different technology stack</li>
                <li>Algorithm based problem solver</li>
                <li>Scrum and agile enthusiast and practitioner</li>
                <li>Team player, experienced with managing team</li>
                <li>Conference speaker</li>
                <li>Technology community leader</li>
                <li>Technology blogger</li>
            </ul>
        </div>
        <div class="side-block" id="cert-info">
            <h1>Certifications</h1>
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
            <h1>Language</h1>
            <ul>
                <li>English</li>
                <li>Bangla</li>
            </ul>
        </div>
        <div class="side-block" id="contact">
            <h1>Contact Info</h1>
            <ul>
                <li><i class="fas fa-globe-americas"></i> <a href="https://milon.im">https://milon.im</a></li>
                <li><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/tomilon">linkedin.com/in/tomilon</a></li>
                <li><i class="far fa-envelope"></i> contact@milon.im</li>
                <li><i class="fab fa-skype"></i> milon521</li>
                <li class="print"><i class="fas fa-phone"></i> +491776974274</li>
                <li class="print"><i class="fas fa-home"></i> Schalkauer Straße 24, <br>13055 Berlin, Germany.</li>
            </ul>
        </div>

        <div class="side-block" id="personal-info">
            <h1>Personal Info</h1>
            <ul>
                <li>Nationality: Bangladeshi</li>
                <li>Marital Status: Married</li>
                <li>DoB: August 1st, 1991</li>
            </ul>
        </div>

        <div class="print">
            <br><br><br><br><br><br>
        </div>

        <div class="side-block" id="personal-info">
            <h1>Extra Curricular</h1>
            <ul>
                <li>Managing the largest programming community of the country- <a href="https://web.facebook.com/groups/pxperts">phpXperts</a></li>
                <li>Organizer of Meetups and Conferences</li>
                <li>Blood Donor</li>
            </ul>
        </div>
        <div class="side-block" id="personal-info">
            <h1>Interests</h1>
            <ul>
                <li>Reading books and blogs</li>
                <li><a href="https://easy-recipes.netlify.app">Cooking</a></li>
                <li>Travelling</li>
                <li>Watching movies</li>
                <li>Listening to music and podcasts</li>
            </ul>
        </div>
        <div class="side-block" id="links">
            <h1>Links</h1>
            <ul>
                <li><i class="fab fa-twitter"></i> <a href="https://twitter.com/to_milon">@to_milon</a></li>
                <li><i class="fab fa-github"></i> <a href="https://github.com/milon">github.com/milon</a></li>
                <li><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/tomilon">linkedin.com/in/tomilon</a></li>
                <li><i class="fab fa-speaker-deck"></i> <a href="https://speakerdeck.com/milon">speakerdeck.com/milon</a></li>
                <li><i class="fab fa-slideshare"></i> <a href="http://www.slideshare.net/milon521">slideshare.net/milon521</a></li>
            </ul>
        </div>
        <div class="side-block" id="disclaimer">
            <a href="/assets/pdf/Nuruzzaman_Milon_cv.pdf" download class="btn"><i class="fas fa-download"></i> Download</a>
            <p>This CV is available online at <br><br> &mdash; <a href="https://milon.im/cv/">https://milon.im/cv/</a></p>
        </div>
    </aside>

    @if ($page->production)
        @include('_layouts._partials._analytics')
    @endif
</body>

</html>
