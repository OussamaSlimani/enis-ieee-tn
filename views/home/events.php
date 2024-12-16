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
          "Tags" => array("#Anniversary", "#Ramadan", "#Stargazing", "#Jupiter", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "Hello World 4.0",
          "date" => "28 April 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE Computer Society Chapter ENIS SB recently hosted HELLO WORLD! 4.0, building on the success of previous editions with an even more impactful event. Over 160 participants, both IEEE members and non-members, gathered to engage in workshops and a competitive programming competition aimed at sharpening problem-solving skills.

The event began with a welcoming ceremony, followed by an inspiring live call with the Ebsilong Team ; top-ranking computer science students from ISI Ariana, including Saif Khelil, Yassine Hajji, Med Aziz Smiri, and Aziz Bel Haj Amor. Known for their impressive achievements, the Ebsilong Team holds Rank 1 in TCPC for two consecutive years, Rank 11 in ACPC 2023, and they made history by winning Tunisia's first-ever medal in the ACPC. They shared insights into their journey, inspiring participants with their dedication and problem-solving strategies.

The technical aspect kicked off with a session led by the scientific team (professors) to introduce Codeforces as the competition platform, ensuring all participants could access and navigate it effectively. This familiarization session allowed everyone to feel confident using the platform and helped create a smooth and focused competition environment.

Following a lunch break, the competition commenced on Codeforces and lasted for three hours. Participants enjoyed a dynamic and motivating setting where every solved problem was celebrated with balloons, adding to the excitement and fostering a spirit of achievement.

In the end, three winners were awarded prizes of 600 D, 400 D, and 300 D, with an additional prize for the Best Ambassador for exceptional contributions.

HELLO WORLD! 4.0 had a meaningful impact. It encouraged participants to develop essential problem-solving skills that are invaluable in today’s tech industry. Non-IEEE members, including those from competitive programming clubs, were impressed by the technical and supportive environment and expressed interest in joining the IEEE community to further enhance their skills. This event not only celebrated success but also ignited a passion for competitive programming and technical growth within our community.
",
          "image" => "assets/img/events/event-02.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/409093",
          "linkModel" => "model2",
          "organized_by" => "IEEE Computer Society ENIS SB",
          "Tags" => array("#Programming", "#Workshops", "#Coding", "#ieee", "#enis", "#ieee_cs"),
     ),
     array(
          "title" => "ENIS NextGen",
          "date" => "21 July 2024",
          "location" => "Discord, Online",
          "description" => "The IEEE ENIS SB recently organized an event titled 'ENIS NextGen', conducted on Discord. This event was designed to welcome students who have successfully completed their preparatory cycle and are about to enter the engineering cycle. During the event, we presented reels highlighting the seven departments available at ENIS, providing attendees with an overview of their future academic options.

We were honored to have the Director of ENIS deliver a keynote address, introducing the institution and outlining the opportunities it offers. Following this, the event featured parallel breakout rooms dedicated to each department.

In these rooms, we invited ENIS graduates to share their professional experiences and insights with the students. This format allowed attendees to gain firsthand knowledge and engage directly with experienced professionals, enhancing their understanding of their chosen fields.
",
          "image" => "assets/img/events/event-03.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/428866",
          "linkModel" => "model3",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#NextGen", "#Transition", "#Engineering", "#ieee", "#enis"),
     ),
     array(
          "title" => "IEEE TALKS | Chapters' Fest and Pathways to Success 7.0",
          "date" => "8 September 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "An engaging event introducing IEEE and the ENIS Student Branch to new attendees. Keynotes and a panel discussion featuring IEEE ENIS alumni highlighted professional growth and leadership journeys. The day also included a special performance, chapter showcases, and networking activities to inspire the next generation of innovators.",
          "image" => "assets/img/events/event-04.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/446009",
          "linkModel" => "model4",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#Leadership", "#ChaptersFest", "#Pathways", "#ProfessionalGrowth", "#ieee", "#enis"),
     ),
     array(
          "title" => "Tunisian Engineering Congress Week TEC.Week 1.0",
          "date" => "21-22 September 2024",
          "location" => "Mouradi Skanes, Monastir, Tunisia",
          "description" => "The Tunisian Engineering Congress Week 1.0 (TecWeek 1.0), a groundbreaking event, was held on September 21st and 22nd at Mouradi Skanes in Monastir, Tunisia, gathering 125 participants, including 116 students, 6 professionals, and 4 guests . Organized by IEEE ENIS and its SSCS, PES, AESS, and CASS Student Branch Chapters, the event spotlighted Electronics, Energy, and Aerospace Engineering. Key highlights included workshops led by industry experts like aerospace engineer Rania Toukebri, who shared insights on satellite communications, propulsion systems, and data analysis, and Sedki Amor, who explored the role of ICs and CMOS technology in space electronics. The second day featured Matthew Johnston, who delivered a session on self-powered circuits and innovative energy technologies. A 12-hour hackathon focused on detecting and avoiding space debris, attracting seven teams who presented creative solutions to a jury comprising Rania Toukebri, Mohamed Ali Zormati, and Madiha Neifar. TecWeek 1.0 offered educational sessions, networking opportunities, and hands-on challenges, establishing itself as a milestone event for IEEE Tunisia.
",
          "image" => "assets/img/events/event-05.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/415827",
          "linkModel" => "model5",
          "organized_by" => "IEEE ENIS AESS, SSCS, CASS, PES SBCs",
          "Tags" => array("#TecWeek", "#Hackathon", "#Aerospace", "#Energy", "#Innovation", "#ieee"),
     ),
     array(
          "title" => "IEEE CS TechX National Engineering School of Sfax",
          "date" => "28 September 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE Computer Society Chapter of the National Engineering School of Sfax, in collaboration with IEEE ENIS SB, organized 'TechX AI Nexus,' an event initiated by IEEE CS SYP, and  focused on ethics in artificial intelligence. The event featured a variety of workshops, ranging from technical to non-technical, as well as a hackathon and team-building activities.

The first workshop, titled 'CS Membership Benefits,' was presented by Mohamed Mahdi Bradai, Chairman of IEEE ENIS SB, former Chairman of IEEE CS ENIS SBC, and a member of CS SYP. It provided new members of IEEE ENIS SB with an in-depth understanding of the IEEE Computer Society and its benefits. The second workshop, 'AI and Social Media Parallels,' was led by Mr. Taha Laabidi, CEO and Founder of Tunimind, an AI consultant for enterprises, and a digital activist. This session focused on the ethical implications of AI, particularly in social media, offering participants insights into responsible AI practices.

The third workshop, 'Responsible AI Development,' was delivered by Mr. Hassen Amri, an AI engineer at Quicktext and AI trainer, as well as a data science instructor. This technical session enriched participants' knowledge of AI and supported the development of their hackathon prototypes. Following this, participants engaged in fun team-building activities, enjoying new game concepts from event sponsors.

After dinner, the hackathon theme, 'AI for Good,' was unveiled, and participants began their projects while team-building activities continued. The following day, the fourth workshop, 'Transition from Student to Young Professional Life,' was led by Kayoum Djedidi, CEO of OORB and an engineer at Ubotica Technologies. This workshop gave attendees valuable insights into career development and IEEE volunteer opportunities.

The final workshop, 'Time and Priority Management in the Life of Students,' was conducted by Mohamed Hedi Allouche, Founder and Director of 4ST, and a university expert in soft skills. He motivated students to engage in IEEE activities. The event concluded with the announcement of the hackathon winners, who received prizes of 600DT, 400DT, and vouchers from Orange Digital Center. Additionally, the two best ambassadors were recognized with IEEE Computer Society mini packs, including a CS T-shirt,CS keychain, and CS bag holder.

The event significantly advanced participants' technical expertise by offering hands-on workshops and practical insights into AI development, particularly around ethics and responsible innovation. Furthermore, it strengthened the IEEE community by fostering collaboration and engagement, empowering students and professionals to contribute meaningfully to both local and global technological advancements.

",
          "image" => "assets/img/events/event-06.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/429174",
          "linkModel" => "model6",
          "organized_by" => "IEEE CS ENIS SBC",
          "Tags" => array("#AI", "#Ethics", "#TechX", "#Hackathon", "#ResponsibleAI", "#ieee"),
     ),
     array(
          "title" => "IEEE DAY CELEBRATION",
          "date" => "5 October 2024",
          "location" => "Home Young, Sakiet Ezzit",
          "description" => "The event was a memorable celebration of innovation and technology, bringing together students from diverse fields. The day featured engaging workshops, insightful talks, and collaborative activities that fostered a strong sense of community among attendees. It also strengthened collaboration and deepened relationships between the participating branches, all in alignment with IEEE's mission to advance technology for humanity.
",
          "image" => "assets/img/events/event-07.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/439638",
          "linkModel" => "model7",
          "organized_by" => "IEEE ENIS SB, IIT SB, SGIS SB",
          "Tags" => array("#IEEEday", "#Innovation", "#Collaboration", "#ieee"),
     ),
     array(
          "title" => "IEEEXtreme 18.0",
          "date" => "25 October 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "The IEEE CS ENIS SBC hosted IEEEXtreme 18.0, the international 24-hour programming competition that not only challenged participants' coding skills but also created a unique sense of community and excitement. This year’s event kicked off in the evening with a variety of engaging activities, setting the stage for a memorable experience. Students gathered for dinner, enjoyed games of cards, painted, watched movies, and shared coffee breaks, all while music and laughter filled the space, creating an inviting atmosphere.
As the night wore on, participants prepared for the intense coding session ahead, diving into complex problems with their friends and teammates by their side. The next morning, everyone shared breakfast together, recharging after hours of problem-solving and enjoying a moment of camaraderie before the final push. By the end of the marathon, many participants ranked impressively on a international scale, highlighting the high level of skill and teamwork fostered during the event.
IEEEXtreme 18.0 was more than a competition—it was a platform where students worked, interacted, and communicated in a supportive, warm environment. The event helped students sharpen their problem-solving skills and deepen their enthusiasm for competitive programming, all while forming lasting connections. The positive energy and collaborative spirit left a lasting impact, strengthening both their technical abilities and their bonds within the IEEE community.
",
          "image" => "assets/img/events/event-08.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/444541",
          "linkModel" => "model8",
          "organized_by" => "IEEE CS ENIS SBC",
          "Tags" => array("#IEEEXtreme", "#CodingCompetition", "#Teamwork", "#ieee"),
     ),
     array(
          "title" => "I-PROTECT V6 Junior",
          "date" => "28-29 September 2024",
          "location" => "Digital Research Center of Sfax",
          "description" => "On Saturday, September 28, 2024, the I-Protect Junior Program launched its inaugural workshop at the Digital Research Center of Sfax. The session was guided by the esteemed speaker, Ahmed Bouaziz, who shared his expertise in a welcoming and friendly ambiance, setting the tone for an inspiring journey.
The momentum continued on Sunday, September 29, 2024, with day two of the program. Ahmed Bouaziz once again took the lead, hosting a dynamic and interactive workshop that sparked creativity and meaningful discussions. Participants delved into innovative ideas and engaged in collaborative activities, all within an atmosphere that encouraged connection and shared learning.
The first two days of the I-Protect Junior Program have set a strong foundation, leaving participants motivated and excited for the journey ahead.

",
          "image" => "assets/img/events/event-09.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/450001",
          "linkModel" => "model9",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#IProtect", "#Innovation", "#Workshops", "#ieee"),
     ),
     array(
          "title" => "ENIS Industrial Forum - ENIF 5.0",
          "date" => "30 November - 1 December 2024",
          "location" => "National Engineering School of Sfax",
          "description" => "ENIF 5.0, the IEEE ENIS Industrial Forum, is the annual event organized by IEEE IAS ENIS SBC and reached new heights in its 5th edition, titled 'Advanced Technologies for a Sustainable Future'. This edition was a two-day hackathon held on November 30 and December 1, 2024 and focused on exploring the principles of Industry 5.0 and their application in creating innovative, sustainable solutions across diverse sectors by fostering collaboration between humans and technology. In preparation for the hackathon, three insightful online sessions were conducted to equip participants with essential skills and knowledge: 'Demand Forecasting for a Smart Industry', 'Introduction to Blockchain and Introduction to Docker'.
On the first day of ENIF 5.0, the event kicked off with a session titled 'Opportunities with IEEE IAS Tunisia Section', delivered by MR. Achref Selmi, Chair of IEEE IAS Tunisia Section Chapter. This was followed by an engaging talk on the Impact and Evolution of IoT in Industry 5.0 by Mr. Walid Labidi, a seasoned IoT Project Manager and Technology Leader. After that, LEONI, the event's sponsor, shared insights about their innovative work in the industry.
The evening brought an exciting team-building session where participants bonded over fun activities, followed by a movie screening. At midnight, the hackathon theme was revealed, and challengers dived into brainstorming and developing solutions while visitors enjoyed social games like card games and other group activities. Coffee breaks throughout the event offered a variety of refreshments, including coffee, juice, cakes, and savory treats, ensuring everyone stayed energized and focused.
On the second day, after an intense night of innovation, the hackathon concluded at 8 AM, and participants attended a training session on Impactful Communication and the Art of Professional Pitching, led by Mrs. Hela Aidi, a certified trainer and strategic development facilitator. This session provided participants with valuable tips to effectively present their ideas.
Teams then pitched their solutions to an expert jury, showcasing their innovative approaches to addressing sustainability challenges in alignment with Industry 5.0 principles. The event culminated in the announcement of the winning teams and a vibrant closing ceremony, celebrating the success and creativity of all participants.
ENIF 5.0 was a testament to the power of technology and collaboration in shaping a sustainable future. It brought together participants, experts, and industry leaders to share knowledge, foster innovation, and create lasting memories.
",
          "image" => "assets/img/events/event-10.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/449923",
          "linkModel" => "model10",
          "organized_by" => "IEEE IAS ENIS SBC",
          "Tags" => array("#ENIF", "#Industry5.0", "#Sustainability", "#Hackathon", "#ieee"),
     ),
);

?>

<section id="more" class="more wow fadeInUp" data-wow-delay="0.1s">
     <div class="container" data-aos="fade-up">
          <div class="row gy-4 container-more">
               <?php foreach ($events as $index => $event) : ?>
                    <!-- Event Card -->
                    <div class="col-lg-4 col-md-6">
                         <div class="event-container bg-light-mode">
                              <img class="img-fluid" src="<?php echo htmlspecialchars($event['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Event Image" />
                              <div class="p-3">
                                   <h4 class="text-dark text-center">
                                        <?php echo htmlspecialchars($event['title'], ENT_QUOTES, 'UTF-8'); ?>
                                   </h4>
                                   <p class="text-dark text-justify">
                                        <?php echo htmlspecialchars(substr($event['description'], 0, 130), ENT_QUOTES, 'UTF-8'); ?>...
                                   </p>
                                   <div class="d-flex justify-content-between">
                                        <p class="text-dark">
                                             <i class="fa fa-calendar me-2"></i>Date
                                        </p>
                                        <p class="text-dark"><?php echo htmlspecialchars($event['date'], ENT_QUOTES, 'UTF-8'); ?></p>
                                   </div>
                                   <div class="d-flex justify-content-between mb-2">
                                        <p class="text-dark">
                                             <i class="fa fa-map-marker-alt me-2"></i>Location
                                        </p>
                                        <p class="text-dark"><?php echo htmlspecialchars($event['location'], ENT_QUOTES, 'UTF-8'); ?></p>
                                   </div>
                                   <div class="d-flex justify-content-center">
                                        <a href="#event<?php echo $index; ?>" class="btn btn-primary rounded-pill py-2 px-3 mb-1" data-bs-toggle="modal" data-bs-target="#event<?php echo $index; ?>">
                                             <i class="fa fa-arrow-right"></i> Read more
                                        </a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- End Event Card -->
               <?php endforeach; ?>
          </div>
     </div>
</section>

<?php foreach ($events as $index => $event) : ?>
     <!-- Event Modal -->
     <div class="modal fade" id="event<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="event<?php echo $index; ?>Label" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen" role="document">
               <div class="modal-content">
                    <div class="modal-header bg-light-mode">
                         <h4 class="modal-title text-dark"><?php echo htmlspecialchars($event['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                         <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                              <i class="fa fa-times fa-lg text-dark"></i>
                         </button>
                    </div>
                    <div class="modal-body bg-light-mode">
                         <div class="container-fluid py-5">
                              <div class="container">
                                   <div class="row g-5">
                                        <div class="col-lg-8">
                                             <!-- Blog Detail -->
                                             <div class="mb-5">
                                                  <img class="img-fluid w-100 rounded mb-3" src="<?php echo htmlspecialchars($event['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Event Image" />
                                                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                       <h3 class="mb-0 text-dark text-justify">Description</h3>
                                                  </div>
                                                  <p class="text-dark"><?php echo nl2br(htmlspecialchars($event['description'], ENT_QUOTES, 'UTF-8')); ?></p>
                                             </div>
                                        </div>

                                        <!-- Sidebar -->
                                        <div class="col-lg-4">
                                             <!-- Event Details -->
                                             <div>
                                                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                       <h3 class="mb-0 text-dark">Details</h3>
                                                  </div>
                                                  <p class="mb-2 text-dark"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($event['location'], ENT_QUOTES, 'UTF-8'); ?></p>
                                                  <p class="mb-2 text-dark"><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars(date('d F Y', strtotime($event['date'])), ENT_QUOTES, 'UTF-8'); ?></p>
                                                  <p class="mb-4 text-dark"><i class="fas fa-user"></i> <?php echo htmlspecialchars($event['organized_by'], ENT_QUOTES, 'UTF-8'); ?></p>
                                             </div>

                                             <!-- Event Tags -->
                                             <?php if (!empty($event['Tags'])) : ?>
                                                  <div class="mb-5">
                                                       <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                            <h3 class="mb-0 text-dark">Tags</h3>
                                                       </div>
                                                       <div class="d-flex flex-wrap m-n1">
                                                            <?php foreach ($event['Tags'] as $tag) : ?>
                                                                 <div class="d-flex align-items-center rounded py-2 px-3 m-1 border">
                                                                      <p class="mb-0 text-dark"><?php echo htmlspecialchars($tag, ENT_QUOTES, 'UTF-8'); ?></p>
                                                                 </div>
                                                            <?php endforeach; ?>
                                                       </div>
                                                  </div>
                                             <?php endif; ?>

                                             <!-- External Link -->
                                             <div>
                                                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                                       <h3 class="mb-0 text-dark">Vtools Link</h3>
                                                  </div>
                                                  <a href="<?php echo htmlspecialchars($event['linkVtools'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" class="btn btn-primary py-2 px-4">Read More</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
<?php endforeach; ?>



<?php
require "views/home/components/footer.php";
?>