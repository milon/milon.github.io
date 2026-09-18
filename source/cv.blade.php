---
title: CV
---

@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._cv_meta', [
        'description' => "Curriculum Vitae of Nuruzzaman Milon — Engineering Tech Lead in Vancouver, BC.",
    ])
    <link rel="stylesheet" href="{{ vite('source/_assets/sass/cv.scss') }}">
    <link rel="alternate" type="text/markdown" title="Markdown CV" href="/cv.md">
@endsection

@section('body')
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Document</p>
            <h1>Curriculum Vitae</h1>
            <p class="sub">Engineering Tech Lead · Vancouver, British Columbia.</p>
            <p class="cv-actions">
                <a class="btn-ghost" href="/assets/pdf/Nuruzzaman_Milon_cv.pdf" download>↓ Download PDF</a>
                <a class="btn-ghost" href="/cv.md">Markdown →</a>
            </p>
        </div>

        <article class="cv">
            <header class="cv-identity">
                <h2 class="cv-name">Nuruzzaman Milon</h2>
                <p class="cv-location">Vancouver, BC, Canada</p>
                <ul class="cv-links">
                    <li><a href="mailto:contact@milon.im">contact@milon.im</a></li>
                    <li><a href="https://milon.im">milon.im</a></li>
                    <li><a href="/linkedin">LinkedIn</a></li>
                    <li><a href="/github">GitHub</a></li>
                    <li><a href="/x">X</a></li>
                </ul>
            </header>

            <section class="section">
                <h2 class="section-label">01 — Summary</h2>
                <div class="section-body">
                    <p>Software engineer with over a decade of experience across healthcare, travel, ecommerce, and gaming. I lead backend teams shipping production systems that have to stay up — architecture, performance, fraud controls, and the operational work after deploy. Strongest in Laravel/PHP, with production experience in Java, TypeScript, React, and AWS.</p>
                </div>
            </section>

            <section class="section">
                <h2 class="section-label">02 — Experience</h2>
                <div class="section-body is-wide">
                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Punt</h3>
                            <span class="cv-org-place">Vancouver, BC, Canada</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Engineering Tech Lead</h4>
                                <span class="cv-role-dates">January 2026 – Present</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Lead the engineering team for the sweepstakes casino: backend API suite and admin panel.</li>
                                <li>Spearheaded platform expansion into new markets, including Canada and Europe.</li>
                                <li>Drive code quality and architectural decisions, establishing technical standards across the organization.</li>
                            </ul>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Senior Software Engineer</h4>
                                <span class="cv-role-dates">January 2025 – January 2026</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Rewrote the legacy admin panel for two sweepstakes casino platforms: chanced.com and punt.com.</li>
                                <li>Optimized the backend API suite to handle 16k concurrent users.</li>
                                <li>Migrated the backend API suite to current Laravel and PHP versions for performance, security, and maintainability.</li>
                                <li>Built fraud detection for the user redemption workflow, cutting fraudulent activity by 38%.</li>
                                <li>Implemented load-testing infrastructure simulating up to 25k concurrent users so new features stayed within performance budgets.</li>
                            </ul>
                            <p class="cv-tech">PHP, Laravel, PostgreSQL, Redis, React, Docker, AWS, k6</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Amazon</h3>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Software Development Engineer II</h4>
                                <span class="cv-role-dates">December 2023 – December 2024 · Vancouver, BC</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Gift Card Fulfillment and Delivery Charter team, focused on Amazon Gift Cards.</li>
                                <li>Migrated the Gift Card Organization’s email suite to Amazon’s new templating system.</li>
                            </ul>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Software Development Engineer II</h4>
                                <span class="cv-role-dates">February 2023 – November 2023 · Toronto, ON</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Amazon Connections, UX Tech team.</li>
                            </ul>
                            <p class="cv-tech">TypeScript, React, AWS</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Flix</h3>
                            <span class="cv-org-place">Berlin, Germany</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Senior Software Engineer</h4>
                                <span class="cv-role-dates">January 2020 – January 2023</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Managed network inventory, ride generation, and vehicle circulation for FlixBus and FlixTrain across 38 countries on 4 continents.</li>
                                <li>Built a proprietary navigation system for bus drivers in the FlixDriver app, removing external dependencies.</li>
                                <li>Shipped lost-and-found reporting in FlixDriver, reducing lost-baggage claims by 44%.</li>
                            </ul>
                            <p class="cv-tech">PHP, Laravel, Symfony, Java, Kotlin, React Native, Kafka, SQS, MySQL, Docker, AWS, Kubernetes, GitLab CI, React, TypeScript</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Urban Sports Club</h3>
                            <span class="cv-org-place">Berlin, Germany</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Senior Software Engineer</h4>
                                <span class="cv-role-dates">July 2019 – December 2019</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Built a multi-currency payment system and integrated new payment gateways to support faster growth.</li>
                                <li>Led work across financing, payments, and GDPR compliance.</li>
                            </ul>
                            <p class="cv-tech">PHP, Laravel, Symfony, Phalcon, MySQL, RabbitMQ, Redis, AWS</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Check24</h3>
                            <span class="cv-org-place">Münster, NRW, Germany</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Senior Software Engineer</h4>
                                <span class="cv-role-dates">May 2018 – June 2019</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Developed and maintained tires, car parts, and insurance portals for the Autoteile team, serving over 10 million customers.</li>
                            </ul>
                            <p class="cv-tech">PHP, Symfony, Laravel, MySQL, Doctrine, React, Elasticsearch</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Telenor Health</h3>
                            <span class="cv-org-place">Dhaka, Bangladesh</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Senior Software Engineer</h4>
                                <span class="cv-role-dates">May 2016 – April 2018</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Built digital healthcare products reaching over 5.5 million people (medications, information, insurance, and related services).</li>
                                <li>Managed a team of 4 developers, 3 interns, 1 QA, and 1 DevOps specialist.</li>
                                <li>Built a high-traffic SMS gateway handling 3k req/s and HTTP-based inter-app communication.</li>
                                <li>Shipped a CMS distributing healthcare information to 10 million people, plus tooling for queue management, monitoring, and reporting.</li>
                            </ul>
                            <p class="cv-tech">PHP, Laravel, Lumen, Node.js, Express.js, PostgreSQL, Jenkins, Docker, AWS, Ansible, Angular, XMPP</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">WeDevs Ltd.</h3>
                            <span class="cv-org-place">Dhaka, Bangladesh</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Software Engineer</h4>
                                <span class="cv-role-dates">February 2015 – April 2016</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Built the Rx71 health service: articles, symptom checker, doctor/hospital directory, booking, and diet plans.</li>
                                <li>Managed 6 developers, 2 SQA, and 1 DevOps; served as interim CTO for 3 months.</li>
                            </ul>
                            <p class="cv-tech">PHP, Laravel, Lumen, WordPress, MySQL, Angular, IonicJS, socket.io</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Brotecs Technologies Ltd.</h3>
                            <span class="cv-org-place">Dhaka, Bangladesh</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Software Engineer</h4>
                                <span class="cv-role-dates">September 2013 – January 2015</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Built VoIP calling apps for native Android and iOS.</li>
                                <li>Developed a web GUI for maintaining the Asterisk PABX server.</li>
                                <li>Created an airplane entertainment module for SAP-212 hardware (call, email, browsing).</li>
                            </ul>
                            <p class="cv-tech">PHP, CodeIgniter, Android SDK, Objective-C, Angular, Asterisk</p>
                        </div>
                    </div>

                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">ITMedicus Bangladesh Ltd.</h3>
                            <span class="cv-org-place">Dhaka, Bangladesh</span>
                        </div>

                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">Programmer and System Analyst</h4>
                                <span class="cv-role-dates">February 2011 – August 2013</span>
                            </div>
                            <ul class="cv-bullets">
                                <li>Owned codebase, database, and product design; handled direct client communication.</li>
                                <li>Built telemedicine software supporting custom hardware for rural healthcare delivery.</li>
                            </ul>
                            <p class="cv-tech">PHP, MySQL, Redis, jQuery, Bootstrap</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-label">03 — Education</h2>
                <div class="section-body is-wide">
                    <div class="cv-org">
                        <div class="cv-org-head">
                            <h3 class="cv-org-name">Mawlana Bhashani Science and Technology University</h3>
                            <span class="cv-org-place">Tangail, Bangladesh</span>
                        </div>
                        <div class="cv-role">
                            <div class="cv-role-head">
                                <h4 class="cv-role-title">B.Sc. Engineering in Information and Communication Technology (ICT)</h4>
                            </div>
                            <ul class="cv-bullets">
                                <li>President, Society of ICT</li>
                                <li>Chief Organizer, 1st MBSTU ICT Fest</li>
                                <li>Member, Rotary Club of MBSTU</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-label">04 — Books</h2>
                <div class="section-body is-wide">
                    <div class="cv-role">
                        <div class="cv-role-head">
                            <h4 class="cv-role-title"><a href="https://laravel-after-deploy.milon.im/">Laravel After Deploy</a></h4>
                            <span class="cv-role-dates">August 2026</span>
                        </div>
                        <p class="cv-meta">Architecture, Performance, and Operations at Scale · ISBN 979-8193747345</p>
                        <ul class="cv-bullets">
                            <li>Production playbook for Laravel engineers: architecture, performance, correctness, observability, deployment, and operations at scale.</li>
                        </ul>
                    </div>
                    <div class="cv-role">
                        <div class="cv-role-head">
                            <h4 class="cv-role-title"><a href="/book/laravel">Laravel PHP Web Framework</a></h4>
                            <span class="cv-role-dates">May 2015</span>
                        </div>
                        <p class="cv-meta">Dimik Prokashoni · ISBN 978-9843391902 · two editions</p>
                        <ul class="cv-bullets">
                            <li>Both editions became bestsellers in Bangladesh and West Bengal, India.</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-label">05 — Skills</h2>
                <div class="section-body is-wide">
                    <dl class="spec-list">
                        <div class="spec-row">
                            <dt class="spec-key">Languages</dt>
                            <dd class="spec-val">PHP, Java, Python, Node</dd>
                        </div>
                        <div class="spec-row">
                            <dt class="spec-key">Frameworks</dt>
                            <dd class="spec-val">Laravel, Symfony, React, Vue</dd>
                        </div>
                        <div class="spec-row">
                            <dt class="spec-key">Data</dt>
                            <dd class="spec-val">PostgreSQL, MySQL, Redis, Elasticsearch, MongoDB, DynamoDB, Kafka, RabbitMQ</dd>
                        </div>
                        <div class="spec-row">
                            <dt class="spec-key">Cloud / Ops</dt>
                            <dd class="spec-val">AWS, Docker, Kubernetes, Jenkins, Ansible, Nginx</dd>
                        </div>
                        <div class="spec-row">
                            <dt class="spec-key">Practices</dt>
                            <dd class="spec-val">Microservices, REST, GraphQL, TDD, DDD, Agile / Scrum / Kanban</dd>
                        </div>
                    </dl>
                </div>
            </section>

            <section class="section">
                <h2 class="section-label">06 — Certifications</h2>
                <div class="section-body is-wide">
                    <ul class="cv-bullets">
                        <li>Certified Laravel Developer — 2018</li>
                        <li>Certified Scrum Professional — Developer — 2018</li>
                        <li>Certified Scrum Professional — ScrumMaster — 2017</li>
                        <li>Advanced Certified Scrum Developer — 2017</li>
                        <li>Certified Scrum Developer — 2017</li>
                        <li>Certified ScrumMaster — 2016</li>
                    </ul>
                </div>
            </section>

            <section class="section">
                <h2 class="section-label">07 — More</h2>
                <div class="section-body is-wide">
                    <dl class="spec-list">
                        <div class="spec-row">
                            <dt class="spec-key">Languages</dt>
                            <dd class="spec-val">English (C1), Bengali (native), German (A2)</dd>
                        </div>
                        <div class="spec-row">
                            <dt class="spec-key">Community</dt>
                            <dd class="spec-val">
                                <span class="spec-line"><a href="/open-source">Open-source packages</a> with over 15 million downloads</span>
                                <span class="spec-line">Manages phpXperts (largest PHP community in Bangladesh) and Talk.js (largest JS community in Bangladesh)</span>
                                <span class="spec-line">Conference speaker</span>
                            </dd>
                        </div>
                    </dl>
                </div>
            </section>
        </article>
    </div>
@endsection
