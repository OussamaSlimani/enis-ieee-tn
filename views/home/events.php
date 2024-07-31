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
          "title" => "14TH ANNIVERSARY OF IEEE ENIS SB",
          "date" => "15th April 2023",
          "location" => "ENIS",
          "description" => "On the 15th of April, the IEEE ENIS Student Branch joyously marked its 14th anniversary, bringing together dedicated members for a day of celebration. This special occasion provided a wonderful opportunity to gather all officers and active members in a festive atmosphere, fostering camaraderie and the exchange of valuable experiences. The festivities included a myriad of entertaining activities and impromptu dances, creating an atmosphere of joy that resonated with everyone present. This celebration not only served as a moment of revelry but also as a platform for building lasting connections and strengthening the sense of community within the IEEE ENIS Student Branch.",
          "image" => "assets/img/events/event1.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/387012",
          "linkModel" => "model1",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#Anniversary", "#Team_Building", "#14th", "#Legacy", "#ieee", "#enis", "#ieee_enis_sb"),
     ),
     array(
          "title" => "HELLO WORLD! 3.0",
          "date" => "29th April 2023",
          "location" => "Digital Research Centre of Sfax",
          "description" => "Hello World is a Problem Solving event organized by the IEEE ENIS Computer Society Student Chapter. In its third edition, Hello World has been a major success. Having almost doubled the number of participants from the past 2 editions, our event has hosted 131 competitors divided to 52 teams from all parts of Tunisia. On that fateful Saturday, the 29th of April, The participants were welcomed to the Digital Research Centre of Sfax, introduced to the PC^2 Competitive Programming Platform they were to use and then began the three-hour-long Competition. A set of ten problems were hand-crafted by six well-established professors with our Problem-Solving Coach Doctor Atef Masmoudi as their head. After a grueling and highly competitive race to win it all, the top three teams were announced and claimed their prizes. The event received wide praise and is one of the ENIS SB's proudest achievements.",
          "image" => "assets/img/events/event2.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/365269",
          "linkModel" => "model2",
          "organized_by" => "IEEE ENIS Computer Society Student Chapter",
          "Tags" => array("#computer", "#society", "#code", "#problem", "#solving", "#enis", "#student", "#Hello", "#World", "#Competition", "#Coaching", "#Programming", "#Competitive", "#Event", "#Sfax"),
     ),
     array(
          "title" => "WIE ACT 2.0",
          "date" => "30th September 2023",
          "location" => "Amir Palace Hotel in Monastir",
          "description" => "The IEEE Women In Engineering Annual Congress of Tunisia, organized by IEEE WIE ENIS SAG & IEEE WIE ENETCOM SAG, and IEEE Women in Engineering Tunisia Section & IEEE ENIS SB & IEEE ENETCOM SB, took place on September 30th and October 1st at the Amir Palace Hotel in Monastir. The event successfully brought together a diverse community of students and professionals, providing a platform to exchange knowledge, build networks, and explore groundbreaking ideas in both women's empowerment and the field of Artificial Intelligence. Throughout the congress, attendees had the opportunity to expand their professional networks and deepen connections through team-building activities. The BLACK and White themed evening added a touch of lively celebration, providing everyone with a chance to unwind and enjoy the joyful atmosphere. It was a delightful respite, allowing participants to recharge and create lasting memories.",
          "image" => "assets/img/events/event6.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/381118",
          "linkModel" => "model3",
          "organized_by" => "IEEE WIE ENIS SAG & IEEE WIE ENETCOM SAG",
          "Tags" => array("#WIE", "#ieee_wie_enis_sag", "#ieee_wie_enetcom_sag", "#ieee_wie_tunisia_section", "#ieee_enis_sb", "#ieee_enetcom_sb", "#networking"),
     ),
     array(
          "title" => "IEEE TALKS",
          "date" => "16th September 2023",
          "location" => "ENIS",
          "description" => "IEEE TALKS: Chapters’ Fest and Pathways to Success is an event organized by IEEE ENIS SB that aims to present the student branch and its units by giving insights about every unit's field of interest as well as every unit's upcoming events. IEEE TALKS: Chapters’ Fest and Pathways to Success is also an opportunity for the attendees to get to know more about this community by meeting former officers and young professionals who will share their experience as part of the IEEE family and tips to lead your way as an engineering student and a future leader.",
          "image" => "assets/img/events/event7.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/373768",
          "linkModel" => "model4",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#ieee_enis_sb", "#enis", "#sb", "#recruiting", "#IEEETalks", "#chapterfest"),
     ),
     array(
          "title" => "PES WEEK 2.0",
          "date" => "22th November 2019",
          "location" => "Sfax",
          "description" => "It sounds like PES WEEK 2.0 was an exciting event held in Sfax from November 22 to 24, 2019. The event featured workshops and conferences led by experts in various technological fields. Additionally, there was a new addition to the event a 24-hour humanitarian challenge focusing on renewable energies. Trainers were available throughout the day to assist participants during the competition. The winner of the competition received a prize and was honored at the closing ceremony. Overall, it seems like PES WEEK 2.0 provided a platform for learning, innovation, and collaboration in the realm of technology and renewable energy.",
          "image" => "assets/img/events/event3.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/211065",
          "linkModel" => "model5",
          "organized_by" => "IEEE PES ENIS SBC",
          "Tags" => array("#ieee_enis_sb", "#enis", "#entrepreneurship", "#energy", "#Renewable"),
     ),
     array(
          "title" => "IEEE DAY",
          "date" => "15th October 2023",
          "location" => "Sfax",
          "description" => "In celebration of IEEE Day, a collaborative effort between IEEE ENETCOM SB, IEEE Polytech SB, IEEE ISGI SB, IEEE ENIS SB, IEEE ENIS SB, and IEEE FSS SB was organized in Sfax. The day kicked off with check-in, followed by an engaging opening ceremony where esteemed speakers congratulated us on IEEE Day and expressed their gratitude for joining this significant event. As the sun began to set and the day transitioned into evening, the atmosphere became increasingly festive. The culmination of the IEEE Day Regional Sfax was a lively and vibrant party that brought together all attendees. Laughter and music filled the air as everyone let their hair down, celebrating not only the accomplishments of the day but also the enduring spirit of innovation and collaboration that defines IEEE.",
          "image" => "assets/img/events/event8.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/379116",
          "linkModel" => "model6",
          "organized_by" => "IEEE ENIS SB",
          "Tags" => array("#IEEEDay", "#training", "#fun", "#workshop", "#activities", "#fss", "#enis", "#enetcom", "#espin", "#ipsas", "#tunisia_section", "#IEEE_ENETCOM_SB", "#teams_build_dreams", "#IEEEDay2023", "#CelebrateIEEEDay")
     ),
     array(
          "title" => "IEEEXTREME 17.0 FSS X ENIS",
          "date" => "17th October 2019",
          "location" => "ENIS",
          "description" => "In a remarkable display of synergy and teamwork, IEEE CS ENIS SBC and IEEE CS FSS SBC recently united for the IEEEXTREME 17.0 programming competition. With the two respective universities of both SBCs, it seemed like a natural step to consider a collaborative effort in order to improve the prospects of the event. The collaboration between students from the two universities resulted in a dynamic exchange of diverse talents and innovative ideas. This allowed for cross-pollination of ideas, which fueled creative problem-solving and broadened their network.",
          "image" => "assets/img/events/event9.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/380318",
          "linkModel" => "model7",
          "organized_by" => "IEEE CS ENIS SBC",
          "Tags" => array("#ieeextreme", "#fss", "#enis", "#sb", "#ieeecs", "#xtreme", "#problem", "#solving", "#computer", "#society", "#collab", "#cs")
     ),
     array(
          "title" => "AIDOLS 1.0",
          "date" => "04th November 2023",
          "location" => "ENIS",
          "description" => "AIDOLS is an AI competition dedicated to the theme of individuals with specific needs. The event features a series of artificial intelligence training sessions led by renowned experts in the field and soft skills training sessions. To conclude, teams of engineering students, under the supervision of experienced PhD candidates and researchers, will have the opportunity to present their projects focused on harnessing artificial intelligence to address the needs of this particular group and get interesting prizes.",
          "image" => "assets/img/events/event10.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/381265",
          "linkModel" => "model8",
          "organized_by" => "IEEE CIS ENIS SBC",
          "Tags" => array("#enis", "#sb", "#cis", "#ai", "#ieee_enis_cis_sbc")
     ),
     array(
          "title" => "EMB FORUM 4.0",
          "date" => "18th November 2023",
          "location" => "ENIS",
          "description" => "The 4th edition of the Engineering in Medicine and Biology Society Forum, founded at the National School of Engineers in Sfax, is an opportunity to promote the knowledge and skills of engineering students in various fields of medicine and biology. It also aims to ensure the development of a motivated generation with a strong foundation in human and social skills.The combination of innovation and technology shared between the guests and engineering students formed the basis of the Forum, ensuring a true exchange of information on various discussion topics. This year, we organized a competition that served as an excellent way to stimulate competitiveness, creativity, and innovation.The theme of the competition focused on the valorization of waste from the food and pharmaceutical industries in the Sfax region, with the aim of promoting sustainable development.",
          "image" => "assets/img/events/event11.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/387791",
          "linkModel" => "model9",
          "organized_by" => "IEEE EMBS ENIS SBC",
          "Tags" => array("#EMB_Forum_4.0", "#Biology", "#EMBS_ENIS", "#Skills", "#Training")
     ),
     array(
          "title" => "ENIS Industrial Form (ENIF4.0)",
          "date" => "18th November 2023",
          "location" => "ENIS",
          "description" => "ENIF 4.0 : Enis Industrial Forum  is an annual forum organized by the IEEE IAS ENIS SBC which has been held three times so far. The event gathers students from various regions of Tunisia and serves as a platform to bridge the gap between them and new technologies prevalent in the industry. Through a combination of workshops and competitions, participants are offered an immersive experience in the industrial landscape. This year's edition contained a competition which was problematic about air pollution and its impact on people’s health. Participants ought to find a solution that merges different technologies. The event also contained a series of workshops about IoT, AI and their applications to health care. These workshops were held by industrialists. Industrials are also part of the evaluation jury in the competition held on the 3rd of December.",
          "image" => "assets/img/events/event12.jpg",
          "linkVtools" => "",
          "linkModel" => "model10",
          "organized_by" => "IEEE IAS ENIS SBC",
          "Tags" => array("#IAS", "#ENIF", "#pollution", "#industry", "#competition")
     ),
     array(
          "title" => "IEEE CS TECHX TUNISIA SECTION",
          "date" => "09th December 2023",
          "location" => "ENIS",
          "description" => "TechX is an IEEE CS event designed for students and young professionals. It focuses on new technologies and offers various sessions, including technical demonstrations, talks on emerging technologies, and interactions with industry experts. TechX also emphasizes leadership development and soft skills, providing sessions to help students become effective leaders and prepare for interviews. The IEEE ENIS CS SBC has applied for the TechX initiative and has been accepted to organize the event under the name of IEEE CS TechX Tunisia Section. The event includes various workshops with the crown jewel of the event being a hackathon to be discovered the day of the event. This event is a pride to the ENIS SB and is a great last event for this year's ExCom. Only time will tell on what experiences await you during TechX!",
          "image" => "assets/img/events/event13.jpg",
          "linkVtools" => "https://events.vtools.ieee.org/m/387746",
          "linkModel" => "model11",
          "organized_by" => "IEEE CS ENIS SBC",
          "Tags" => array("#computer", "#enis", "#society", "#student", "#ExCom", "#Meeting", "#CS", "#bureau", "#TechX", "#Event", "#Hackathon", "#Application", "#Funding", "#Workshops", "#Tunisia", "#SYP")
     ),
     array(
          "title" => "I-PROTECT V6",
          "date" => "22th December 2023",
          "location" => "Digital Research Centre of Sfax",
          "description" => "I-PROTECT is an annual workshop that unites students, researchers, and academics from Tunisian public and private universities, as well as industrials. This event allows attendees to learn about the most recent advancements in Cybersecurity. I-PROTECT v6 is organized by IEEE Tunisia Section, University of Sfax, Digital Research Center of Sfax, National Agency of Cybersecurity-TunCERT, TEEE SPS Tunisia Chapter, TEBE CIS Tunisia Chapter, ENIS IEEE Cybersecurity Unit, REsearch Groups in Intelligent Machines, ENIS IEEE CS Student Chapter, IEEE RAS Tunisia Chapter and Djagora Foundation, from December 22 to 24, 2023 at the Digital Research Center of Sfax, Tunisia. Cyberdefense is A global challenge, A national priority The objective of the 6th I-PROTECT edition is to acquire several skills in Cyberdefense to guard against computer attacks and guarantee data security in Cyberspace. The program will include technical, professional and educational activities presented by highly qualified speakers.",
          "image" => "assets/img/events/event14.jpg",
          "linkVtools" => "",
          "linkModel" => "model13",
          "organized_by" => "IEEE CS ENIS SBC",
          "Tags" => array("#computer", "#enis", "#society", "#student", "#ExCom", "#Meeting", "#CS", "#bureau", "#TechX", "#Event", "#Hackathon", "#Application", "#Funding", "#Workshops", "#Tunisia", "#SYP")
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