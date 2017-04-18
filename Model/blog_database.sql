-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 12:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(25) NOT NULL,
  `comment_content` varchar(300) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(25) NOT NULL COMMENT 'FOREIGN KEY',
  `post_id` int(25) NOT NULL COMMENT 'FOREIGN KEY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `date`, `user_id`, `post_id`) VALUES
(10, 'Sick review, mate. Gonna check these out!', '2017-04-18 18:36:50', 14, 56),
(11, 'Thanks! Let me know what you think of them!', '2017-04-18 18:37:31', 12, 56),
(14, 'Great set last night, cannot wait for next weekend.', '2017-04-18 18:39:22', 15, 36),
(15, 'Gotta love them monkeys, these lyrics are gonna be a hit.', '2017-04-18 18:40:17', 13, 29);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(25) NOT NULL,
  `post_title` varchar(150) DEFAULT NULL,
  `post_content` varchar(5000) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(100) NOT NULL COMMENT 'FOREIGN KEY',
  `tags` varchar(100) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `date`, `user_id`, `tags`, `image`) VALUES
(1, 'Test', 'Testing', '2017-04-08 16:44:27', '', NULL, NULL),
(2, 'Test', 'Testing', '2017-04-08 16:44:58', '', NULL, NULL),
(5, 'test', 'Test post by Leonie.', '2017-04-09 13:20:57', '5', '', NULL),
(7, 'Yo', 'BFace checking in', '2017-04-12 19:59:14', '6', NULL, NULL),
(29, 'This is a Monkey', 'Monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey', '2017-04-15 21:39:57', '4', 'Monkey, Banana, Yum', '14922995971825058f2af4decc9e.jpg'),
(30, 'Tigger''s first post', 'Whohohoooo', '2017-04-16 00:43:04', '3', NULL, NULL),
(31, 'Tigger''s second post', 'Lalallala', '2017-04-16 00:45:54', '3', NULL, ''),
(32, 'Tigger''s picture', 'This is me.', '2017-04-16 00:46:34', '3', 'bouncy', '14923107941060658f2db0ac9959.jpg'),
(35, 'Sick Club in South London', 'Going to a gig tonight, review to follow!', '2017-04-16 16:13:19', '4', 'Concerts, Review, London', ''),
(36, 'We''re in a monster''s belly!', 'You haven''t been partying. You move to music, but that''s not dancing. You chew pancakes, but you''re not tasting. To truly party, one must leave behind the problems that are troubling and open one''s mind eye.\r\n\r\nTo survive, my people need a phat party-club to grind in. That monster''s gut was totally excellent.\r\n\r\nHear me, monster. My people and I wish to party inside you once more. Prithee take us upon thine gut, and we shall party no more with fireworks, but instead... with gentle lasers.', '2017-04-17 23:38:40', '10', 'Party Pat, Adventure Time, Rave, Monster', '1492475920311158f56010ee8e7.jpg'),
(52, 'London Techno Scene', 'From warehouse rave spaces to sweaty basements, clubber and blogger Wil Troup selects the cream of London&#39;s club scene \r\nCable\r\nThe pick of the SE1 spread, Cable is located in a train arch underneath London Bridge station. A two-room affair, complete with slick production and a generous outdoor smoking terrace. If you want warehouse vibes and a flushing toilet this is your place. The excellent We Fear Silence promote some amazing line-ups on a Saturday, with Metalheadz, Sunday Best, Deviation and Buzzin&#39; Fly all holding regular parties showcasing everyone from Goldie to Ramadanman, and Fake Blood to Photek. Their shambolic Sunday morning after-hours club, Jaded, is definitely not for the faint-hearted. Crowd: serious clubbers, students.\r\nâ€¢ 33a Bermondsey Street Tunnel SE1, cable-london.com\r\n\r\nGreat Suffolk Street Warehouse\r\nThe mother of all London warehouse rave spaces. This cavernous car park on Great Suffolk Street has become something of a trusty staple of late, where you can get lost among its many massive arches. Great Suffolk Street embodies the pop-up/warehouse vibe on the grandest of scales with makeshift bars and portable toilets a plenty. Recently it has played host to the likes of Carl Craig&#39;s 20 Years of Planet E, Mulletover with Seth Troxler, Eastern Electrics with Claude Vonstroke, Joy Orbison and Michael Mayer, Shake It! with Layo & Bushwacka, Cocoon parties and a host of others. Your trainers may look like they&#39;re ready for a museum when morning comes, but you&#39;re guaranteed a massive night out in exchange. Crowd: Mixed, Techno, House, Warehouse ravers, and out-of-towners due to proximity to London Bridge and advance group tickets sales.\r\nâ€¢ Great Suffolk Street SE1, see Eastern Electrics&#39; Facebook page\r\n\r\nDalston Superstore\r\nThe guiding light for &#34;raving homos&#34; (their words) in uber-hip Dalston. Dan Beaumont (Jam Factory/ex-Disco Bloodbath) and the lads from Trailer Trash have seen their baby grow into a bastion for gay nocturnal life in E8 in just two short years. A Berlin-style, open-plan upstairs bar gives way to the rave cave down below. Despite accommodating just 120 people, the basement has seen the likes of Erol Alkan, Optimo, Prosumer, Horse Meat Disco and the soon to be huge Azari & III grace its tiny booth. Impeccable music policy, day and night, and real gays to boot. Crowd: gay, hip, musically informed, locals\r\nâ€¢ 177 Kingsland High Street E8, Facebook page, blog', '2017-04-18 18:22:40', '13', 'London, Techno, Clubs', '14925433602442258f667800385f.jpg'),
(53, 'Stutter Edit Review', 'Electronica legend Brian Transeau - better known as BT - has used and abused the &#39;stutter edit&#39; technique on a decade&#39;s worth of albums, and for some time his secret weapon has been a plug-in of the same name. \r\nStutter Edit is easy to get going, although you do need to route MIDI into it to make it work. Anyone with a basic grip of their DAW&#39;s routing will have no problems, and iZotope provides a DAW-specific guide within the comprehensive help documentation for those who need it.\r\nThere are hundreds of presets from the likes of Richard Devine and BT himself, so it really is a case of plug and play.\r\nWe had a couple of hours of self-indulgent fun running tracks through the plug-in and messing with the pitch and mod wheels. By default, these control the global filter (a DJ-style combined low-pass/high-pass affair) and starting point in the gesture. This was all without touching a single control on the front panel.\r\nUsing even the simplest loops as a starting point, it&#39;s possible to go wild with the gestures, and the results are instantly musical. Once you get into editing the gestures, the software becomes more than just a novel curiosity.\r\nEach module has &#39;split&#39; sliders for its available parameters (eg, delay time for delays, bit depth for the bitcrusher), and while these can be set at fixed positions, the real fun is had by setting a start and end point.\r\nWhen you hit a MIDI note, the parameter glides smoothly from beginning to end, then starts over. It needn&#39;t be a plain linear transition from minimum to maximum, as there&#39;s a setting for curve shape. Each effect can work in a stereo linked manner or with separate settings per channel.\r\nWe couldn&#39;t resist running three instances of Stutter Edit in series to see how it would hold up - this resulted in a complex sound with smooth transitions.\r\nMuch of what Stutter Edit does could be done manually in any DAW with some extensive audio chopping and effects routing, but that&#39;s nowhere near as simple and fun.', '2017-04-18 18:24:29', '15', 'Review, BT, DJ Tools, Electronica', '14925434692525558f667ed555fa.jpg'),
(54, 'Intro to Controllers', 'The best DJ controller depends on quite a few factors regarding not only the DJ but the setup youâ€™re envisioning in front of you. DJ controllers come in many different shapes and sizes. I remember back in the day in the early 2000â€™s on Christmas getting my first Stanton mixer, turntables and some random records my dad had laying around in our garage. It was a pretty defining moment in my music making endeavors; however, I quickly realized scratching a record wasnâ€™t as easy as my 15-year-old self thought it was. Being like DJ Abilities or Cut Chemist wasnâ€™t as simple as moving my hand to what I thought the scratch would sound like. Nowadays, thereâ€™s a lot more to being a disc jockey than getting a pair of DJ headphones, DJ turntables and a traditional DJ mixer. The digital era is in full effect and there are numerous routes to take when it comes to DJ controllers. \r\n\r\nWhat is a DJ controller?\r\n\r\nController is a pretty common word if youâ€™re engulfed in the music equipment industry like we are. Weâ€™ve seen MIDI keyboard controllers dominate the market in terms of being some one of the most popular pieces of equipment available today; however, what about those who arenâ€™t just piano players? A DJ controller works like this, but allows you to control your DJ software externally.\r\n\r\nDepending on which controller you grab, you get a myriad of choices in terms of external control. Geared towards those who specifically use DJ software, some of the models weâ€™ve chosen give you an all-in-one controller with JOG wheels (turntable emulation), a mixer, some drum pads and other FX controls in one piece of machinery. Others only give you a mixer, while some are specifically for just FX, such as sliders, rotary controls or kill switches.\r\n\r\nHow to choose your DJ controller\r\n\r\nYour budget? This before all is always our most important factor to take into consideration. Since DJ controllers come in all different shapes, sizes and packed full of specific features, this is quite arbitrary and will depend on the few more factors we have listed below.\r\n\r\nWhat software will you be using? Our best DJ software and DJ apps guides will help here. Some of these even come with their own, often tailored specifically to the controller itself. We have the popular Serato DJ which works with most controllers, Traktor which is only compatible with Native Instruments pieces of gear (some features that is, otherwise you can still use it with other controllers minimally), and many more out there. Keep in mind that some of the DJ controllers can only work for certain software, although there are others that are completely universal. If you havenâ€™t chosen your DJ software yet, some even come with the trial or even full versions of them if you need a bundle.\r\n\r\nWhat kind of controls do you need? DJ controllers vary widely in terms of what kind of controls you get â€” some just deck, mixer, external functions, MIDI, drum pads, or some all-in-one. Be sure to keep in mind which controls youâ€™re actually looking for and which you are not â€” itâ€™ll save you some dough and you wonâ€™t get a piece of gear thatâ€™s half useless.\r\n\r\nDo you perform live, record in the studio, or both? We love performing as well as staying in the lab all night until the sun rises making some tunes. Keep this into consideration for the portability and size option of controllers, the aesthetics they offer (some RGB backlit for cool looks as well as easy remembering of controls), etc.\r\n\r\nDigital DJ Tipsâ€™ DJ controller guide is extremely informative if you need some more help.', '2017-04-18 18:26:06', '14', 'DJ Tools, Hardware, Controllers', '14925435662516458f6684e43052.jpg'),
(55, 'The rise of Midi fighters', 'What is a Midi fighter?\r\nOne of the most popular finger drumming and performance controllers around. Built like a tank to survive a beating on stage and in the studio. The grid is equipped with world class arcade buttons that perform better than anything around. \r\n\r\nThe idea of having a custom controller for your DJing is great, but you&#39;d expect to pay a lot for the privilege. But with the Midi Fighter, you can have a &#34;semi-custom&#34; controller for a great price. If you get one of these, you&#39;re going to really &#34;own&#34; it - once you&#39;ve chosen the configuration of the buttons and panel colour, maybe even assembled it yourself, and mapped it to your requirements, you&#39;ve invested part of yourself into using it as the heart of your own unique DJing set-up, and are thus more likely to put the effort in to do something out of the ordinary with it. \r\n\r\nThe Midi Fighter 3D is a unique midi controller which gives an extra dimension on live performances as well as in the studio or dj booth. It stimulates expressiveness and creativity, especially with the motion controls.', '2017-04-18 18:27:19', '12', 'DJ Tools, Hardware', '1492543639494858f6689757c4a.jpg'),
(56, 'Top 3 DJ head phones', 'Whether youâ€™re a staunch vinyl advocate, a dab hand with a pair of CDJs, or one of the ever-growing number of digital DJs, a decent pair of headphones is vital to ensure your mixes are cued up on time and at the right volume. However, with a bewildering number of brands and models, making the right decision for your particular DJ needs can be a tricky process. In this round-up, Juno Plus has picked out what we consider to be the best sets of DJ headphones money can buy; from the flashy to the understated, each model offers the best sound quality and functionality for their price points.\r\n\r\nSennheiser - HD25 1 II\r\nArguably the worldâ€™s most loved headphone, the HD25 from Sennheiser has been standard issue for busy DJs since they were unveiled in 1988. Originally billed for the film and TV broadcast world, these delicate looking cans are surprisingly durable, as many touring DJs will attest, and their closed back are designed to rest on the ears, not over them, to offer high sound pressure levels. High grade isolation makes them ideal for working in noisy environments, like the club booth and festival stage, whilst being equally at home in the studio, however they can become a little uncomfortable after extended wearing.\r\n\r\nAlmost every component of the HD 25 1 II is detachable and fully replaceable. The headphoneâ€™s lead cable is situated on the right-hand-side to minimise tangle and comes with a 3.5mm jack with an additional three-quarter-inch jack adapter. The jack is now at a right angle meaning there is less chance for the cable to be damaged or ripped out of a DJ mixer socket. The HD 25 1 II combines crystal clear sound at high volume with a durable design and ships with replaceable velour ear pads and a smart pouch.\r\n\r\n\r\nAKG - K81\r\nThe K81 features a closed cup design with excellent isolation with an adjustable head band to fit your domepiece securely. The medium-sized drivers in each cone produce a punchy sound with a healthy dose of bass reproduction and smooth mids, as to be expected from a world class brand such as AKG. A quick look at the frequency response of these headphones confirms they reproduce frequencies all the way down to 16Hz (thatâ€™s Mika Vainio territory) and reach all the way up to 24 kHz (Raster-Noton range).\r\n\r\nAKG have designed these headphones with an exceptionally lengthy two and a half metre cable that is more than long enough to have you move about the place freely. In addition, these cans feature a three dimensional folding mechanism that allows you to neatly tuck them into the drawstring bag theyâ€™re shipped with. The K81â€™s feature fully reversible ear cups that accommodate single ear monitoring and although these headphones might not have as clearly defined high frequency reproduction as some higher end models, you will be hard pressed to find a better pair of affordable DJ cans that are value for money.\r\n\r\n\r\nShure - SRH750DJ\r\nSpecifically designed for cueing, mixing and general listening, the SRH750DJ from Shure are aimed at providing active DJs with something durable. Without squashing or distorting the sound, large 50mm drivers offer detailed bass and rich, high-end frequency response levels when played at loud volumes, making them suitable for use in a DJ booth. The closed cup earphones can be swivelled (with comfort in mind) for DJs who favour single ear monitoring, and Shure have furnished the SRH750DJ with a thick, adjustable head band. Itâ€™s also possible to fully fold the drivers under the headband so they can fit into the provided carrier bag too.\r\n\r\nThe SRH750DJâ€™s 50mm drivers fit over the ears in a design that provides sufficient isolation from exterior sound. Those who have used the SRH750DJ in the pass report this modelâ€™s bass response provide a solid oomph while the bright highs are enough to cut through fog of excessive outside noise. Their larger size means theyâ€™ll standout when worn, but this is duly offset by how snug they fit around your head. A pouch and quarter-inch adapter are included.', '2017-04-18 18:28:34', '12', 'DJ Tools, Head phones', '149254371476558f668e25deac.jpg'),
(57, 'Women in Techno  - Pt. 1: Introducing', 'Dance music has no excuse for being a boys club. Though they dont always get their due in a patriarchal industry, there is no shortage of talented women who can hold their own behind the turntables. From seasoned veterans to rising stars, this series of blogs covers the best of Women In Techno. \r\n\r\nPart 2 of the series coming up...', '2017-04-18 21:38:47', '11', 'women, represent', '14925515271087358f6876717640.jpg'),
(58, 'Women in Techno - Pt. 2: Alison Wonderland', 'Alison in Wonderland has come a long way from her start as a classically-trained cellist: in 2015, she hit the top of the Dance/Electronic Albums chart with Run. The full-length showed her versatility - she writes, produces, and sings - and her eclectic taste in collaborators: Lido, The Flaming Lips Wayne Coyne, and AWE all contributed. The lead single from the album, -I Want U- has amassed nearly three million plays on SoundCloud and another six million on Spotify.\r\n\r\nSick.', '2017-04-18 21:43:47', '11', 'women, represent', '1492551827915058f6889311d3b.jpg'),
(59, 'Women in Techno - Pt. 3: Anja Schneider', 'Anja Schneider has engaged with multiple facets of the electronic music scene. She learned to DJ while working in radio, and eventually her long-running &#34;Dance Under The Blue Moon&#34; show spawned Mobilee Records. The imprint has gone on to release important records from Maya Jane Coles, Pan-Pot, and others, while Scheider has pursued her own career simultaneously, putting out her debut album in 2008 and turning in a stellar entry the Essential Mix series.', '2017-04-18 21:47:55', '11', 'women, represent', '14925520751948758f6898b0656a.jpg'),
(60, 'The Only Cure for Techno Leg...', 'It is all fun and games until you get techno leg..\r\n\r\nHere at Get Into Techno we are responsible ravers, so weve gone to the trouble of making a step by step guide to curing yourself of this terrible condition (at least until next weekend). \r\n\r\nYou are welcome.\r\n\r\n1. Turn the techno off and throw the plug out the fucking window. You are never gonna get that leg to stop if the beats are still strong. Only problem with this is with Techno Leg, the techno in your head, so...\r\n\r\n2. Make yourself a cuppa tea and stick on Bargain Hunt. One of our team will be wearing one of those stunning blue fleeces weve all always wanted soon, so you dont wanna miss out on that. Plus tea is the response to all lifes problems. Drink the tea. Tea is good.\r\n\r\n3. Go to bed and lie on the leg - that should stop it. \r\n\r\nGood luck friend. x', '2017-04-18 22:05:02', '11', 'disclaimer, health, self-help', '1492553102863558f68d8ea0132.jpg'),
(61, 'Top Techno Venue (imo)', 'London is internationally renowned for its nightlife but it can sometimes be hard to know where to go. For every memorable night of euphoria there are three more with overpriced drinks, muddy speakers and aggressive punters. The city can also be an inhospitable environment for nightclubs, with local councils recently forcing the likes of Plastic People, Madame Jojos and Dance Tunnel to close. Even Fabric has been threatened. Yet a few venues brave the storms and continue turning out some of Europeâ€™s best club nights. So forget the champagne clubs of central London - lets get South of the river.\r\n\r\nJust round the corner from Ministry at Elephant & Castle is the current king of Londons underground club circuit, Corsica Studios. Opened in 2006, the medium-sized club consists of two black rooms, minimal decoration and a formidable Funktion 1 soundsystem. Corsica puts emphasis and funding into superb lineups rather than extravagant designs, and their reward is the loyal following that the club has gathered over the last ten years. A hotbed of creativity in the electronic music scene, there are far too many superb nights at Corsica for us to hit up every one. But we can try.', '2017-04-18 22:25:28', '16', 'London, dancing, venues', '1492554328292458f69258313f3.jpeg'),
(62, 'Some lyrics to a song I would have liked to have written', 'Clock strikes upon the hour\r\nAnd the sun begins to fade\r\nStill enough time to figure out\r\nHow to chase my blues away\r\nIve done alright up to now\r\nIt&#39;s the light of day that shows me how\r\nAnd when the night falls, loneliness calls\r\nOh, I wanna dance with somebody\r\nI wanna feel the heat with somebody\r\nYeah, I wanna dance with somebody\r\nWith somebody who loves me\r\nOh, I wanna dance with somebody\r\nI wanna feel the heat with somebody\r\nYeah, I wanna dance with somebody\r\nWith somebody who loves me', '2017-04-18 22:29:48', '16', 'lyrics, wishfulthinking', '14925545883000558f6935c5ed16.jpg'),
(63, 'Just one more dancing song (if only it were techno)', 'Mister\r\nYour eyes are full of hesitation\r\nSure makes me wonder\r\nIf you know what youre looking for\r\nBaby\r\nI wanna keep my reputation\r\nI&#39;m a sensation\r\nYou try me once, you&#39;ll beg for more\r\nYes Sir, I can boogie\r\nBut I need a certain song\r\nI can boogie, boogie boogie\r\nAll night long\r\nYes Sir, I can boogie\r\nIf you stay, you can&#39;t go wrong\r\nI can boogie, boogie boogie, all night long\r\nNo Sir\r\nI don&#39;t feel very much like talking\r\nNo, neither walking\r\nYou wanna know if I can dance\r\nYes Sir, already told you in the first verse\r\nAnd in the chorus\r\nBut I will give you one more chance\r\nYes Sir, I can boogie\r\nBut I need a certain song\r\nI can boogie, boogie boogie\r\nAll night long\r\nYes Sir, I can boogie\r\nIf you stay, you can&#39;t go wrong\r\nI can boogie, boogie boogie, all night long', '2017-04-18 22:35:08', '16', 'lyrics, dancing', '1492554908175258f6949c23564.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'Primary key',
  `user_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `password`, `bio`, `admin`) VALUES
(4, 'Linda', 'Linda', 'Eriksson', 'linda.nibelheim@gmail.com', '$2y$10$58Vm8xupmCMfOEeEa1bGJ.B1X3/c3g.h7Hk1hQmreYEtxdZIQ.54i', 'One of the Get into Techno Crew Members, following the beat to the coolest scenes. Stay tuned for some top reviews!', 2),
(5, 'lejohnson', 'Lee', 'Johnson', 'lejohnson@tom.com', '$2y$10$aL1M6oBbEhXeB9XPSEOeRuV.1W31tAu6nV0.RoMWvzZna9kZ4HPpW', NULL, NULL),
(7, 'Admin', 'Admin', 'Account', 'admin@getintotechno.com', '$2y$10$ElSMtcEmRQXAuVrHyEglP.nVa9LjCkdeJd0goWZw7.w/f5QKvhBxW', '', 3),
(10, 'PartyPat', 'Pat', 'the Bear', 'partypat@adventuretime.com', '$2y$10$7W9XzxC0IuOCGP8Ix/OClu4UOjoJOowZwD8uQJJAaqkp92EdE1eWm', 'Before you talk to the chief, you must party with the chief.', NULL),
(11, 'BrianTranseau', 'Brian', 'Transeau', 'brian@mail.com', '$2y$10$e3i19E8YLfQFCimBmbX10u7Jv1/220ksSLGsSLl40slP9UDqh16vq', 'An early adopter and widely accredited as a maven of modern sound techniques. My music is an expression of that awe and admiration of the natural world.', NULL),
(12, 'Deadmau5', 'Joel', 'Zimmerman', 'Joel@mail.com', '$2y$10$1fR2s9z2tLjCTsxsYGQ0LuHTx/jvvhVuTUclE09tY5NguB37DCgqi', 'Better known by my stage name deadmau5 (pronounced "dead mouse").  Canadian record producer and DJ from Toronto, Ontario.', NULL),
(13, 'Prodigy', 'Liam', 'Howlett', 'howlett@mail.com', '$2y$10$iBvpCO6z7tgcdoKXAp/jeu6EXXrdbcaO7N949eYAfJTLyBk/7rHd.', 'Songwriter, record producer, co-founder and leader of the British electronic band The Prodigy, and an occasional DJ.', NULL),
(14, 'Aphex', 'Richard', 'James', 'Richard@mail.com', '$2y$10$OX.unEwAwPk.rumjxAxCiObsmLszpFUe7eNnYjdEcYnYnF7z482lW', 'Electronic musician and composer. Working in IDM and acid techno. Best known as recording alias Aphex Twin.', NULL),
(15, 'Tiesto', 'Tijs', 'Verwest', 'Verwest@mail.com', '$2y$10$oWi.mRP83ZQLsvb83jfUSe61CEpy1nogPS7kjFAaShXiVqEAvQKvO', 'Dutch DJ and record producer. Co-founder of Black Hole Recordings. Voted World No. 1 DJ by DJ Magazine in its annual Top 100 DJs readership poll consecutively for three years from 2002â€“04', NULL),
(16, 'Carry', 'Carryon', 'Dancen', 'carryon@mail.com', '$2y$10$61VmEiCWfYxkQFGmc6dTleHmKpHWpc1oJfrp5jtjiehH6KjyFXGJC', 'All I want to do is dance. Carry on dancing, techno techno, alllll night long.', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
