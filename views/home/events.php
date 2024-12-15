<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
     <div class="d-flex justify-content-between align-items-center pt-5 px-2 wow bounceInDown">
          <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
               <h1 class="display-5 m-2 text-white">OUR EVENTS</h1>
               <h4 class="text-white m-2 pt-2">
                    ENIS SB's proudest achievements!
               </h4>
          </div>
          <div class="headerIcon">
               <img src="assets/img/icons/a-01.png" style="height: 250px; padding: 12px" alt="image" />
          </div>
     </div>
</div>
<!-- ==========  banner End ========== -->


<!-- ==========  Events section Start ========== -->
<?php
$events = array(
     array(
          "title" => "15TH ANNIVERSARY OF IEEE ENIS SB",
          "date" => "31 March 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE ENIS Student Branch has collaborated with the IEEE WIE ENIS Student Affinity Group and the IEEE AESS ENIS Student Branch Chapter to organize the IEEE Star Fest. This event has been an initiative to bring students together in the glorious month of Ramadan to enjoy each other's company in this religious month. This occasion has helped merge the usually annual Iftar coinciding with Jupiter sighting and the IEEE ENIS Student Branch 15th founding day. This in turn allowed for many students to attend both from the ENIS Student Branch and other Student Branches. The event has had great success, including a shared dinner, team-building activities, a stargazing/aerospace session, networking, and finally the blowing of the candles, marking another year of excellence for the IEEE ENIS Student Branch.",
          "image" => "assets/img/events/event-01.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/409093",
          "linkModel" => "model1",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#Anniversary", "#Team_Building", "#StarFest", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "HELLO WORLD 4.0",
          "date" => "28 April 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE Computer Society Chapter ENIS SB recently hosted HELLO WORLD! 4.0, building on the success of previous editions with an even more impactful event. Over 160 participants, both IEEE members and non-members, gathered to engage in workshops and a competitive programming competition aimed at sharpening problem-solving skills.\n\nThe event began with a welcoming ceremony, followed by an inspiring live call with the Ebsilong Team; top-ranking computer science students from ISI Ariana, including Saif Khelil, Yassine Hajji, Med Aziz Smiri, and Aziz Bel Haj Amor. Known for their impressive achievements, the Ebsilong Team holds Rank 1 in TCPC for two consecutive years, Rank 11 in ACPC 2023, and they made history by winning Tunisia's first-ever medal in the ACPC. They shared insights into their journey, inspiring participants with their dedication and problem-solving strategies.\n\nThe technical aspect kicked off with a session led by the scientific team (professors) to introduce Codeforces as the competition platform, ensuring all participants could access and navigate it effectively. This familiarization session allowed everyone to feel confident using the platform and helped create a smooth and focused competition environment.\n\nFollowing a lunch break, the competition commenced on Codeforces and lasted for three hours. Participants enjoyed a dynamic and motivating setting where every solved problem was celebrated with balloons, adding to the excitement and fostering a spirit of achievement.\n\nIn the end, three winners were awarded prizes of 600 D, 400 D, and 300 D, with an additional prize for the Best Ambassador for exceptional contributions.\n\nHELLO WORLD! 4.0 had a meaningful impact. It encouraged participants to develop essential problem-solving skills that are invaluable in today’s tech industry. Non-IEEE members, including those from competitive programming clubs, were impressed by the technical and supportive environment and expressed interest in joining the IEEE community to further enhance their skills. This event not only celebrated success but also ignited a passion for competitive programming and technical growth within our community.",
          "image" => "assets/img/events/event-02.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/409093",
          "linkModel" => "model2",
          "organized_by" => "IEEE Computer Society Chapter ENIS SB",
          "Tags" => array("#HelloWorld", "#Programming", "#Competition", "#ieee", "#enis", "#ieee_enis_cs"),
     ),
     array(
          "title" => "ENIS NextGen",
          "date" => "21 July 2024",
          "location" => "Discord, online",
          "description" => "The IEEE ENIS SB recently organized an event titled \"ENIS NextGen\", conducted on Discord. This event was designed to welcome students who have successfully completed their preparatory cycle and are about to enter the engineering cycle. During the event, we presented reels highlighting the seven departments available at ENIS, providing attendees with an overview of their future academic options.\n\nWe were honored to have the Director of ENIS deliver a keynote address, introducing the institution and outlining the opportunities it offers. Following this, the event featured parallel breakout rooms dedicated to each department.\n\nIn these rooms, we invited ENIS graduates to share their professional experiences and insights with the students. This format allowed attendees to gain firsthand knowledge and engage directly with experienced professionals, enhancing their understanding of their chosen fields.",
          "image" => "assets/img/events/event-03.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/428866",
          "linkModel" => "model3",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#NextGen", "#PreparatoryCycle", "#FutureEngineers", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "IEEE TALKS | Chapters' Fest and Pathways to Success 7.0",
          "date" => "8 September 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE ENIS Student Branch proudly hosted the IEEE TALKS: Chapters’ Fest and Pathways to Success event, a successful gathering aimed at introducing IEEE and our Student Branch to a new generation of attendees. Held at the National Engineering School of Sfax (ENIS), the event offered insightful presentations and discussions that left participants inspired and motivated to explore the numerous opportunities that IEEE offers.\n\nThe event commenced with a comprehensive presentation by Madiha Naifar, who shared valuable insights into the extensive benefits that IEEE provides to students and professionals alike. She illustrated how involvement in IEEE can be a gateway to a successful and impactful career, highlighting pathways for both professional and personal development.\n\nOne of the event’s highlights was an engaging panel discussion featuring former Chairs and Vice Chairs of the IEEE ENIS Student Branch. The esteemed panelists reflected on their experiences, leadership journeys, and the significant role IEEE played in shaping their professional trajectories. Their stories underscored the values of leadership, perseverance, and teamwork as essential qualities that can open doors to remarkable opportunities.\n\nAdding a unique touch to the gathering, a musical interlude was performed by our talented member, Amer Gargouri, bringing a moment of enjoyment and connection among attendees.\n\nThe event also showcased the achievements of the IEEE ENIS Student Branch and its diverse chapters. Through this presentation, participants were introduced to our vibrant community, the impactful projects we pursue, and the role each chapter plays in fostering innovation and leadership. From technical advancements to humanitarian initiatives, our chapters continue to lead in advancing technology for humanity, supporting both personal and professional growth for all members.",
          "image" => "assets/img/events/event-04.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/446009",
          "linkModel" => "model4",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#ChaptersFest", "#PathwaysToSuccess", "#Leadership", "#Innovation", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "Tunisian Engineering Congress Week TEC.Week1.0",
          "date" => "21-22 September 2024",
          "location" => "Mouradi Skanes in Monastir, Tunisia",
          "description" => "The Tunisian Engineering Congress Week 1.0 (TecWeek 1.0), a groundbreaking event, was held on September 21st and 22nd at Mouradi Skanes in Monastir, Tunisia, gathering 125 participants, including 116 students, 6 professionals, and 4 guests. Organized by IEEE ENIS and its SSCS, PES, AESS, and CASS Student Branch Chapters, the event spotlighted Electronics, Energy, and Aerospace Engineering. Key highlights included workshops led by industry experts like aerospace engineer Rania Toukebri, who shared insights on satellite communications, propulsion systems, and data analysis, and Sedki Amor, who explored the role of ICs and CMOS technology in space electronics. The second day featured Matthew Johnston, who delivered a session on self-powered circuits and innovative energy technologies. A 12-hour hackathon focused on detecting and avoiding space debris, attracting seven teams who presented creative solutions to a jury comprising Rania Toukebri, Mohamed Ali Zormati, and Madiha Neifar. TecWeek 1.0 offered educational sessions, networking opportunities, and hands-on challenges, establishing itself as a milestone event for IEEE Tunisia.",
          "image" => "assets/img/events/event-05.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/415827",
          "linkModel" => "model5",
          "organized_by" => "IEEE ENIS SSCS, PES, AESS, and CASS SBCs",
          "Tags" => array("#TecWeek", "#Engineering", "#Electronics", "#Energy", "#Aerospace", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "IEEE CS TechX AI Nexus",
          "date" => "28 September 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE Computer Society Chapter of the National Engineering School of Sfax, in collaboration with IEEE ENIS SB, organized \"TechX AI Nexus,\" an event initiated by IEEE CS SYP, and focused on ethics in artificial intelligence. The event featured a variety of workshops, ranging from technical to non-technical, as well as a hackathon and team-building activities.\n\nThe first workshop, titled \"CS Membership Benefits,\" was presented by Mohamed Mahdi Bradai, Chairman of IEEE ENIS SB, former Chairman of IEEE CS ENIS SBC, and a member of CS SYP. It provided new members of IEEE ENIS SB with an in-depth understanding of the IEEE Computer Society and its benefits. The second workshop, \"AI and Social Media Parallels,\" was led by Mr. Taha Laabidi, CEO and Founder of Tunimind, an AI consultant for enterprises, and a digital activist. This session focused on the ethical implications of AI, particularly in social media, offering participants insights into responsible AI practices.\n\nThe third workshop, \"Responsible AI Development,\" was delivered by Mr. Hassen Amri, an AI engineer at Quicktext and AI trainer, as well as a data science instructor. This technical session enriched participants' knowledge of AI and supported the development of their hackathon prototypes. Following this, participants engaged in fun team-building activities, enjoying new game concepts from event sponsors.\n\nAfter dinner, the hackathon theme, \"AI for Good,\" was unveiled, and participants began their projects while team-building activities continued. The following day, the fourth workshop, \"Transition from Student to Young Professional Life,\" was led by Kayoum Djedidi, CEO of OORB and an engineer at Ubotica Technologies. This workshop gave attendees valuable insights into career development and IEEE volunteer opportunities.\n\nThe final workshop, \"Time and Priority Management in the Life of Students,\" was conducted by Mohamed Hedi Allouche, Founder and Director of 4ST, and a university expert in soft skills. He motivated students to engage in IEEE activities. The event concluded with the announcement of
 winners of the hackathon, where teams presented their innovative solutions to a panel of expert judges. The winning projects exemplified the theme of \"AI for Good\" by proposing creative, impactful, and technically sound applications of artificial intelligence to solve real-world problems. Participants left the event inspired and better equipped to navigate the rapidly evolving landscape of AI, with a deeper understanding of ethical practices, technical skills, and the importance of community engagement.",
          "image" => "assets/img/events/event-06.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/456892",
          "linkModel" => "model6",
          "organized_by" => "IEEE CS ENIS SBC",
          "Tags" => array("#TechX", "#AI_Nexus", "#Ethics_in_AI", "#Hackathon", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "IEEE ENIS Humanitarian Day",
          "date" => "25 October 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "In honor of IEEE Day, the IEEE ENIS Student Branch organized the \"IEEE ENIS Humanitarian Day,\" a special event aimed at raising awareness about humanitarian challenges and exploring the role of engineering and technology in addressing them. This inspiring day was structured around keynote speeches, panel discussions, and hands-on workshops, all designed to empower attendees to think critically and act compassionately in their professional endeavors.\n\nThe event began with a keynote speech by Dr. Amal Turki, an advocate for leveraging technology to solve global issues. Dr. Turki highlighted the significant role that engineers can play in creating a more equitable and sustainable world. Her address set the tone for the day, emphasizing the importance of aligning technological innovation with humanitarian needs.\n\nFollowing this, a panel discussion featured leaders from various industries and organizations who shared their experiences and insights on integrating humanitarian values into engineering practices. The panelists included representatives from NGOs, tech companies, and academia, fostering a diverse and enriching dialogue.\n\nAttendees also participated in workshops where they collaborated to brainstorm solutions to real-world humanitarian challenges. The hands-on sessions allowed participants to apply their engineering knowledge creatively, fostering both innovation and empathy.\n\nThe \"IEEE ENIS Humanitarian Day\" successfully highlighted the intersection of technology and humanity, inspiring the next generation of engineers to prioritize ethical considerations and societal impact in their careers. This event reaffirmed IEEE ENIS SB's commitment to advancing technology for humanity.",
          "image" => "assets/img/events/event-07.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/472018",
          "linkModel" => "model7",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#HumanitarianDay", "#TechnologyForHumanity", "#EthicsInEngineering", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "Women in Tech ENIS",
          "date" => "14 November 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "Organized by the IEEE WIE ENIS SAG, the \"Women in Tech ENIS\" event celebrated the contributions of women in technology and aimed to inspire more female students to pursue careers in STEM fields. This vibrant and empowering gathering included guest speeches, panel discussions, and networking sessions.\n\nThe event began with a keynote address by a prominent female engineer, emphasizing the importance of resilience, ambition, and community support in overcoming challenges and succeeding in the tech industry. Attendees were deeply inspired by her journey and insights.\n\nA panel discussion followed, featuring successful women professionals from various technology sectors. The panelists shared their experiences, discussed challenges they faced as women in a traditionally male-dominated field, and offered actionable advice for aspiring female engineers.\n\nThe event also included interactive workshops focused on skill development and career growth, such as coding bootcamps and sessions on soft skills like communication and leadership. Attendees had the opportunity to connect with mentors and peers, building networks that could support them in their educational and professional journeys.\n\n\"Women in Tech ENIS\" was a remarkable event that not only celebrated achievements but also empowered participants with knowledge, inspiration, and connections to excel in the tech world. The IEEE WIE ENIS SAG continues to advocate for gender equality and representation in STEM, creating opportunities for women to thrive.",
          "image" => "assets/img/events/event-08.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/487109",
          "linkModel" => "model8",
          "organized_by" => "IEEE WIE ENIS SAG",
          "Tags" => array("#WomenInTech", "#STEM", "#Empowerment", "#ieee", "#enis", "#ieee_enis_wie"),
     ),
     array(
          "title" => "CyberSecurity ENIS | Breaking Boundaries",
          "date" => "2 December 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE Computer Society Chapter ENIS SB successfully hosted \"CyberSecurity ENIS | Breaking Boundaries,\" a significant event that addressed emerging cybersecurity threats and best practices for securing digital assets. This event brought together students, professionals, and experts for a day of learning, collaboration, and innovation.\n\nThe day began with an opening keynote by Dr. Nouha Hadj Said, a cybersecurity specialist, who provided an overview of the current cybersecurity landscape, emphasizing the importance of proactive measures and continuous learning in this rapidly evolving field.\n\nAttendees then participated in specialized workshops led by cybersecurity experts. These sessions covered topics such as ethical hacking, network security, and incident response. Participants gained hands-on experience, learning how to identify vulnerabilities, implement security measures, and respond effectively to potential breaches.\n\nA highlight of the event was the \"Cyber Escape Room,\" an interactive challenge that required participants to solve puzzles and security challenges within a simulated environment. This activity tested their problem-solving skills and reinforced key cybersecurity concepts in a fun and engaging way.\n\nThe event concluded with a panel discussion featuring industry leaders, who shared their perspectives on the future of cybersecurity and the role of young professionals in shaping a secure digital world. The panel also provided career advice and insights into opportunities in the field of cybersecurity.\n\n\"CyberSecurity ENIS | Breaking Boundaries\" successfully equipped attendees with valuable knowledge and skills, fostering a culture of cybersecurity awareness and innovation. It reinforced IEEE ENIS SB’s commitment to staying at the forefront of technological advancements and empowering its community to tackle real-world challenges.",
          "image" => "assets/img/events/event-09.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/501234",
          "linkModel" => "model9",
          "organized_by" => "IEEE Computer Society Chapter ENIS SB",
          "Tags" => array("#CyberSecurity", "#EthicalHacking", "#Innovation", "#ieee", "#enis", "#ieee_enis_cs"),
     ),
     array(
          "title" => "Innovatech Day",
          "date" => "15 December 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The \"Innovatech Day\" event, organized by the IEEE ENIS SB in collaboration with its PES and RAS chapters, brought together technology enthusiasts and innovators for a day filled with exploration, creativity, and networking. The event showcased cutting-edge technologies, inspiring participants to think boldly and creatively.\n\nHighlights included an exhibition of innovative projects developed by IEEE members and a series of technical workshops focusing on emerging technologies such as robotics, IoT, and renewable energy systems. These sessions provided hands-on learning opportunities, allowing attendees to delve into the intricacies of these technologies and their practical applications.\n\nThe event also featured a pitch competition, where participants presented their innovative ideas to a panel of judges composed of industry professionals and academics. This competition encouraged creativity, critical thinking, and entrepreneurial spirit, rewarding the best projects with prizes and mentorship opportunities.\n\nA keynote speech by Dr. Karim Ammar, a pioneer in sustainable technology, inspired attendees to pursue their passion for innovation while addressing global challenges. His talk emphasized the importance of sustainable practices in technology development and the role engineers play in shaping a better future.\n\n\"Innovatech Day\" concluded with a networking session, fostering collaboration among participants, organizers, and industry representatives. This event highlighted IEEE ENIS SB's dedication to nurturing innovation and empowering its members to contribute meaningfully to the tech community.",
          "image" => "assets/img/events/event-10.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/515678",
          "linkModel" => "model10",
          "organized_by" => "IEEE ENIS SB, PES, and RAS SBCs",
          "Tags" => array("#Innovatech", "#Technology", "#Innovation", "#Networking", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
);
?>

<section id="more" class="more wow fadeInUp" data-wow-delay="0.1s">
     <div class="container" data-aos="fade-up">
          <div class="row gy-4 container-more">
               <?php foreach ($events as $index => $event) : ?>
                    <!-- ========== -->
                    <div class="col-lg-4 col-md-6">
                         <div class="event-container bg-light-mode">
                              <img class="img-fluid" src="<?php echo $event['image']; ?>" alt="image" />
                              <div class="p-3">
                                   <h4 class="text-dark text-center">
                                        <?php echo $event['title']; ?>
                                   </h4>
                                   <p class="text-dark text-justify">
                                        <?php echo substr($event['description'], 0, 130); ?>...
                                   </p>
                                   <div class="d-flex justify-content-between">
                                        <p class="text-dark">
                                             <i class="fa fa-calendar me-2"></i>Date
                                        </p>
                                        <p class="text-dark"><?php echo $event['date']; ?></p>
                                   </div>
                                   <div class="d-flex justify-content-between mb-2">
                                        <p class="text-dark">
                                             <i class="fa fa-map-marker-alt me-2"></i>Location
                                        </p>
                                        <p class="text-dark"><?php echo $event['location']; ?></p>
                                   </div>
                                   <div class="d-flex justify-content-center">
                                        <a href="#event<?php echo $index; ?>" class="btn btn-primary rounded-pill py-2 px-3 mb-1" data-bs-toggle="modal" data-bs-target="#event<?php echo $index; ?>">
                                             <i class="fa fa-arrow-right"></i> Read more
                                        </a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- ========== -->
               <?php endforeach; ?>
          </div>
     </div>
</section>

<?php foreach ($events as $index => $event) : ?>
     <!-- ========== Event Details ========== -->
     <div class="modal fade" id="event<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="event<?php echo $index; ?>Label" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen" role="document">
               <div class="modal-content">
                    <div class="modal-header bg-light-mode">
                         <h4 class="modal-title text-dark"><?php echo $event['title']; ?></h4>
                         <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                              <i class="fa fa-times fa-lg text-dark"></i>
                         </button>
                    </div>
                    <div class="modal-body bg-light-mode">
                         <!-- ========== Gallery Start  ==========-->
                         <!-- Blog Start -->
                         <div class="container-fluid py-5">
                              <div class="container">
                                   <div class="row g-5">
                                        <div class="col-lg-8">
                                             <!-- Blog Detail Start -->
                                             <div class="mb-5">
                                                  <img class="img-fluid w-100 rounded mb-3" src="<?php echo $event['image']; ?>" alt="image" />
                                                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                       <h3 class="mb-0 text-dark">Description</h3>
                                                  </div>
                                                  <p class="text-dark"><?php echo $event['description']; ?></p>
                                             </div>
                                             <!-- Blog Detail End -->
                                        </div>

                                        <!-- Sidebar Start -->
                                        <div class="col-lg-4">
                                             <!-- Plain Text Start -->
                                             <div>
                                                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                       <h3 class="mb-0 text-dark">Details</h3>
                                                  </div>
                                                  <p class="mb-2 text-dark"><i class="fas fa-map-marker-alt"></i> <?php echo $event['location']; ?></p>
                                                  <p class="mb-2 text-dark"><i class="fas fa-calendar-alt"></i> <?php echo date('d F Y', strtotime($event['date'])); ?></p>
                                                  <p class="mb-4 text-dark"><i class="fas fa-user"></i> <?php echo $event['organized_by']; ?></p>
                                             </div>
                                             <!-- Plain Text End -->

                                             <!-- Tags Start -->
                                             <div class="mb-5">
                                                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                       <h3 class="mb-0 text-dark">Tag</h3>
                                                  </div>
                                                  <div class="d-flex flex-wrap m-n1">
                                                       <?php foreach ($event['Tags'] as $tag) : ?>
                                                            <div class="d-flex align-items-center rounded py-2 px-3 m-1 border">
                                                                 <p class="mb-0 text-dark"><?php echo $tag; ?></p>
                                                            </div>
                                                       <?php endforeach; ?>
                                                  </div>
                                             </div>
                                             <!-- Tags End -->

                                             <!-- Plain Text Start -->
                                             <div>
                                                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                       <h3 class="mb-0 text-dark">Vtools Link</h3>
                                                  </div>
                                                  <a href="<?php echo $event['linkVtools']; ?>" target="_blank" class="btn btn-primary py-2 px-4">Read More</a>
                                             </div>
                                             <!-- Plain Text End -->
                                        </div>
                                        <!-- Sidebar End -->
                                   </div>
                              </div>
                         </div>
                         <!-- Blog End -->
                         <!-- ========== Gallery End ========== -->
                    </div>
               </div>
          </div>
     </div>
<?php endforeach; ?>
<!-- ==========  Events section End ========== -->


<?php
require "views/home/components/footer.php";
?>