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
                <h1><a class="title-name" href="{{ $page->baseUrl }}">Nuruzzaman Milon</a></h1>
                <span class="subtitle">Programmer, Author, and Tech Enthusiast</span>
            </div>
            <div class="qr-code"><img src="/assets/images/qr-code.png" alt="qr-code"></div>
        </header>

        {{-- Experience --}}
        <section class="main-block">
            <h2>
                <i class="fas fa-briefcase"></i> Work Experiences
            </h2>
            <section class="blocks">
                <div class="date">
                    <span>Present</span><span>January, 2020</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Senior Full-Stack Software Engineer</h3>
                        <span class="place">
                            <span class="company-name">Flixbus</span>
                            (<a href="https://global.flixbus.com">https://global.flixbus.com</a>)</span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Berlin, Germany</span>
                    </header>
                    <div class="content">
                        <ul>
                            <li>
                                Managing network inventory, generating rides, and managing vehicle circulations for 
                                Flixbus and Flixtrain network in 27 countries on 3 continents.
                            </li>
                            <li>Creating own navigation system for the bus drivers in the FlixDriver app.</li>
                            <li>Build lost and found reporting system right in the FlixDriver app.</li>
                            <li>
                                Used: PHP, Symfony, Java, React Native, Kafka, SQS, MySQL, Docker, AWS, Kubernetes, 
                                Gitlab CI, React, TypeScript, etc.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>December, 2019</span><span>July, 2019</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Senior Software Engineer</h3>
                        <span class="place">
                            <span class="company-name">Urban Sports Club</span> 
                            (<a href="https://urbansportsclub.com">https://urbansportsclub.com</a>)
                        </span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Berlin, Germany</span>
                    </header>
                    <div class="content">
                        <ul>
                            <li>
                                Create a multi-currency payment system to adopt new payment gateways for faster growth 
                                in multiple countries.
                            </li>
                            <li>Leading the team, responsible for financing, payment and GDPR compliance.</li>
                            <li>Used: PHP, Phalcon, MySQL, RabbitMQ, Redis, AWS, etc.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>June, 2019</span><span>May, 2018</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Senior Software Engineer</h3>
                        <span class="place">
                            <span class="company-name">Check24</span>
                            (<a href="https://check24.de">http://check24.de</a>)
                        </span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Münster, Germany</span>
                    </header>
                    <div class="content">
                        <ul>
                            <li>
                                Working on the Autoteile team to develop and maintain tires, car parts, and insurance 
                                portal for more than 10 million customers.
                            </li>
                            <li>Used: PHP, Symfony, MySQL, Doctrine, React, Elasticsearch, etc.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>April, 2018</span><span>May, 2016</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Senior Software Engineer</h3>
                        <span class="place">
                            <span class="company-name">Telenor Health</span> 
                            (<a href="https://telenorhealth.com">https://telenorhealth.com</a>)
                        </span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div class="content">
                        <ul>
                            <li>
                                Created a digital healthcare solution that serves affordable health services
                                (medications, information, insurance, etc.) to more than 5.5 million people.
                            </li>
                            <li>Managed a team of 4 developers, 3 interns, 1 QA, and 1 DevOps.</li>
                            <li>Created high traffic system to serve 3000 req/s.</li>
                            <li>
                                Used: PHP, Laravel, Lumen, Node.js, Express.js, PostgreSQL, Docker, AWS, Ansible, 
                                Angular, XMPP, etc.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>April, 2016</span><span>February, 2015</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Software Engineer</h3>
                        <span class="place">
                            <span class="company-name">WeDevs Ltd.</span> 
                            (<a href="https://wedevs.com">https://wedevs.com</a>)
                        </span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div class="content">
                        <ul>
                            <li>
                                Creating the Rx71 health service, which includes Health articles, symptom checker, 
                                doctor and hospital directory with booking, diet plan services, etc.
                            </li>
                            <li>
                                Manage a team of 6 developers, 2 SQA and, 1 DevOps, play the role of interim CTO for 
                                3 months.
                            </li>
                            <li>Used: PHP, Laravel, Lumen, WordPress, MySQL, Angular, IonicJS, socket.io, etc.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>January, 2015</span><span>September, 2013</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Software Engineer</h3>
                        <span class="place">
                            <span class="company-name">Brotecs Technologies Ltd.</span> 
                            (<a href="https://brotecs.com">https://brotecs.com</a>)
                        </span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div class="content">
                        <ul>
                            <li>Building VoIP calling app for both native Android and iOS operating systems.</li>
                            <li>Creating web GUI for maintaining Asterisk PABX server.</li>
                            <li>
                                Creating airplane entertainment module for SAP-212 hardware device to enable call, 
                                email, and web browsing.
                            </li>
                            <li>Used: PHP, CodeIgniter, Android SDK, Objective C, Angular, Asterisk, etc.</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>August, 2013</span><span>February, 2011</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Programmer and System Analyst</h3>
                        <span class="place">
                            <span class="company-name">ITMedicus Bangladesh Ltd.</span>
                            (<a href="http://itmedicus.com">http://itmedicus.com</a>)
                        </span>
                        <span class="location"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</span>
                    </header>
                    <div class="content">
                        <ul>
                            <li>Write and manage codebase, database, product design, and handle clients.</li>
                            <li>
                                Creating full-fledged telemedicine software for supporting custom hardware to provide 
                                quality health care in rural areas.
                            </li>
                            <li>Used: PHP, MySQL, Redis, jQuery, bootstrap, etc.</li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>

        <div class="print">
            <br/><br/>
        </div>

        {{-- Skills --}}
        <section class="main-block">
            <h2>
          <i class="far fa-folder-open"></i> Skills
        </h2>
            <section class="blocks">
                <div class="date">
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Technical Skill</h3>
                    </header>
                    <div>
                        <ul>
                            <li>PHP, Python, Node.js, Java</li>
                            <li>Laravel, Symfony, ReactJS, VueJS</li>
                            <li>HTML5, CSS3, JavaScript, Typescript</li>
                            <li>Microservices, REST</li>
                            <li>Agile, Scrum, Kanban</li>
                            <li>PostgreSQL, MySQL, SQLite, MongoDB, Redis, Elasticsearch</li>
                            <li>Kafka, Beanstalkd, IronMQ, RabbitMQ</li>
                            <li>PHPUnit, Pest, PHPSpec, Codeception, Behat, Jest</li>
                            <li>Nginx, Apache</li>
                            <li>Amazon AWS(EC2, S3, RDS, SQS), Google Cloud Services</li>
                            <li>Git, SVN</li>
                            <li>DDD, TDD</li>
                            <li>Docker, Kubernetes, Jenkins, Ansible</li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>

        {{-- Certifications --}}
        <section class="main-block concise">
            <h2>
              <i class="fas fa-certificate"></i> Certifications
            </h2>
            <section class="blocks">
                <div class="date">
                    <span>2018</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>
                            <a href="https://exam.laravelcert.com/is/nuruzzaman-milon/certified-since/2018-01-08">
                                Certified Laravel Developer
                            </a>
                        </h3>
                    </header>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>2017</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>
                            <a href="https://bcert.me/swoqnnlks">Certified Scrum Professional - Developer<sup>®</sup></a>
                        </h3>
                    </header>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>2017</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>
                            <a href="https://bcert.me/swajseym">Certified Scrum Professional - ScrumMaster<sup>®</sup></a>
                        </h3>
                    </header>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>2017</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>
                            <a href="https://bcert.me/segniwpnm">Advanced Certified Scrum Developer<sup>&#8480;</sup></a>
                        </h3>
                    </header>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>2017</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>
                            <a href="https://bcert.me/skctlvko">Certified Scrum Developer<sup>®</sup></a>
                        </h3>
                    </header>
                </div>
            </section>
            <section class="blocks">
                <div class="date">
                    <span>2016</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>
                            <a href="https://bcert.me/snynrkpl">Certified ScrumMaster<sup>®</sup></a>
                        </h3>
                    </header>
                </div>
            </section>
        </section>

        {{-- Education --}}
        <section class="main-block concise">
            <h2>
              <i class="fas fa-graduation-cap"></i> Education
            </h2>
            <section class="blocks">
                <div class="date">
                    <span>2013</span><span>2009</span>
                </div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>B.Sc Engineering in Information and Communication Technology</h3>
                        <span class="place">
                            <a href="https://mbstu.ac.bd">Mawlana Bhashani Science and Technology University</a>
                        </span>
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

        {{-- Books and Publications --}}
        <section class="main-block concise">
            <h2>
              <i class="fas fa-book"></i> Books and Publications
            </h2>
            <section class="blocks">
                <div class="date">
                    <span>2015</span>
                </div>
                <div class="decorator"></div>
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
                <div class="decorator"></div>
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

        {{-- Language --}}
        <section class="main-block concise">
            <h2>
              <i class="fas fa-language"></i> Language
            </h2>
            <section class="blocks">
                <div class="date"></div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>English</h3>
                        <span class="place">
                            C1 level proficient
                        </span>
                    </header>
                </div>
            </section>
            <section class="blocks">
                <div class="date"></div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>Bengali</h3>
                        <span class="place">
                            Mother tongue
                        </span>
                    </header>
                </div>
            </section>
            <section class="blocks">
                <div class="date"></div>
                <div class="decorator"></div>
                <div class="details">
                    <header>
                        <h3>German</h3>
                        <span class="place">
                            A2 level proficient
                        </span>
                    </header>
                </div>
            </section>
        </section>
    </section>

    {{-- Sidebar --}}
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
                <li>Algorithm-based problem solver</li>
                <li>Scrum and agile enthusiast and practitioner</li>
                <li>Team player, experienced with managing team</li>
                <li>Conference speaker</li>
                <li>Technology community leader</li>
                <li>Technology blogger</li>
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

        <div class="side-block" id="personal-info">
            <h1>Personality</h1>
            <p><a href="https://www.16personalities.com/profiles/3db6b8e4630d9">ESTJ-A (Assertive Executive)</a></p>
        </div>
        
        <div class="side-block" id="contact">
            <h1>Contact Info</h1>
            <ul>
                <li><i class="fas fa-globe-americas"></i> <a href="https://milon.im">https://milon.im</a></li>
                <li><i class="far fa-envelope"></i> contact@milon.im</li>
                <li><i class="fab fa-skype"></i> milon521</li>
                <li class="print"><i class="fas fa-phone"></i> +491776974274</li>
                <li class="print"><i class="fas fa-home"></i> Schalkauer Str. 24, <br>13055 Berlin, Germany.</li>
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
            <br/><br/><br/><br/><br/>
        </div>

        <div class="side-block" id="personal-info">
            <h1>Extra Curricular</h1>
            <ul>
                <li>Managing the largest PHP community of Bangladesh- <a href="https://web.facebook.com/groups/pxperts">phpXperts</a></li>
                <li>Managing the largest JavaScript community of Bangladesh- <a href="https://www.facebook.com/groups/talkjs.net">Talk.js</a></li>
                <li>Organizer of Meetups and Conferences</li>
                <li>Blood Donor</li>
            </ul>
        </div>

        <div class="side-block" id="personal-info">
            <h1>Interests</h1>
            <ul>
                <li><a href="https://one-problem-a-day.netlify.app/">One problem a day</a></li>
                <li><a href="https://easy-recipes.netlify.app">Easy recipes</a></li>
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
