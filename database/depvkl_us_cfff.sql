-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2018 at 08:40 PM
-- Server version: 10.0.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depvkl_us_cfff`
--

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE `cates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `name`, `slug`) VALUES
(1, 'Teen', 'teen'),
(2, 'Blowjob', 'blowjob'),
(3, 'Anal', 'anal'),
(4, 'Bikini', 'bikini');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cate_id` tinyint(4) NOT NULL,
  `thumbnailUrl` varchar(255) NOT NULL,
  `videoUrl` varchar(255) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `slug`, `cate_id`, `thumbnailUrl`, `videoUrl`, `duration`, `status`, `created_at`) VALUES
(1, 'Blond breasts big black cock 1', 'blond-breasts-big-black-cock-1', 4, 'http://img-l3.xvideos.com/videos/thumbsll/42/e5/d4/42e5d4c8ec9f6871082dfe982e9e6dcb/42e5d4c8ec9f6871082dfe982e9e6dcb.12.jpg', 'http://www.xvideos.com/video768844/blond_breasts_big_black_cock_1', '43 min', 1, 1531897705),
(2, 'euro lesbian teen girls licking and finge ', 'euro-lesbian-teen-girls-licking-and-finge', 4, 'http://img-l3.xvideos.com/videos/thumbsll/60/d3/ef/60d3eff7462c5edaf277b2430c18c440/60d3eff7462c5edaf277b2430c18c440.4.jpg', 'http://www.xvideos.com/video10212265/euro_lesbian_teen_girls_licking_and_fingering_pussy_and_tits', '20 min', 1, 1531897705),
(3, 'korean breeze sweet', 'korean-breeze-sweet', 4, 'http://img100-467.xvideos.com/videos/thumbsll/7d/3e/43/7d3e437f1770687d533a5e3ef44bee76/7d3e437f1770687d533a5e3ef44bee76.20.jpg', 'http://www.xvideos.com/video10101467/korean_breeze_sweet', '7 min', 1, 1531897705),
(4, 'Creamy black pussy fucked by big black dick', 'creamy-black-pussy-fucked-by-big-black-dick', 4, 'http://img-l3.xvideos.com/videos/thumbsll/ea/07/7b/ea077b3938ecb0c62a0927b0b50bcf66/ea077b3938ecb0c62a0927b0b50bcf66.11.jpg', 'http://www.xvideos.com/video8792881/creamy_black_pussy_fucked_by_big_black_dick', '48 sec', 1, 1531897705),
(5, 'This party gets insanely fucking wild', 'this-party-gets-insanely-fucking-wild', 4, 'http://img-l3.xvideos.com/videos/thumbsll/57/ae/0e/57ae0eac2e1d7d15c1d6a57ffb55b0ec/57ae0eac2e1d7d15c1d6a57ffb55b0ec.25.jpg', 'http://www.xvideos.com/video7796000/this_party_gets_insanely_fucking_wild', '5 min', 1, 1531897705),
(6, 'CC Postmans Pleasure', 'cc-postmans-pleasure', 4, 'http://img100-025.xvideos.com/videos/thumbsll/3c/98/27/3c9827bfc7afc78b74480594cee4e012/3c9827bfc7afc78b74480594cee4e012.26.jpg', 'http://www.xvideos.com/video7282025/cc_postmans_pleasure', '6 min', 1, 1531897705),
(7, 'babe bunni buns masturbating on live webc ', 'babe-bunni-buns-masturbating-on-live-webc', 4, 'http://img-l3.xvideos.com/videos/thumbsll/51/d9/86/51d986f37cfd4ff9210f3b71bb4ec1db/51d986f37cfd4ff9210f3b71bb4ec1db.28.jpg', 'http://www.xvideos.com/video15156307/babe_bunni_buns_masturbating_on_live_webcam_-_6cam.biz', '6 min', 1, 1531897705),
(8, 'xvideos.com bcbb28b424d9b8933249', 'xvideoscom-bcbb28b424d9b8933249', 4, 'http://img-l3.xvideos.com/videos/thumbsll/57/6b/e0/576be09478bd680d642e761267e9eae1/576be09478bd680d642e761267e9eae1.25.jpg', 'http://www.xvideos.com/video11299037/xvideos.com_bcbb28b424d9b8933249145786d4725e', '8 min', 1, 1531897705),
(9, 'Wet Sexxx With Capri', 'wet-sexxx-with-capri', 3, 'http://img-l3.xvideos.com/videos/thumbsll/23/d2/0a/23d20a10f4f3b1e7316dab87abb774d6/23d20a10f4f3b1e7316dab87abb774d6.30.jpg', 'http://www.xvideos.com/video3299996/wet_sexxx_with_capri', '9 min', 1, 1531897705),
(10, 'Homemade Vine Gay Compilation # 2', 'homemade-vine-gay-compilation-#-2', 3, 'http://img-l3.xvideos.com/videos/thumbsll/3e/2e/c2/3e2ec2fffcac74c99cb294e2dab3a1c2/3e2ec2fffcac74c99cb294e2dab3a1c2.11.jpg', 'http://www.xvideos.com/video16613619/homemade_vine_gay_compilation_2', '21 min', 1, 1531897705),
(11, 'Hot India Perez fucks and sucks - Xniki', 'hot-india-perez-fucks-and-sucks-xniki', 3, 'http://img-l3.xvideos.com/videos/thumbsll/24/f9/d3/24f9d3c9c18da9c2265e0bb060facf57/24f9d3c9c18da9c2265e0bb060facf57.4.jpg', 'http://www.xvideos.com/video1341374/hot_india_perez_fucks_and_sucks_-_xniki', '15 min', 1, 1531897705),
(12, '6cam.biz teen tiaserenity flashing pussy  ', '6cambiz-teen-tiaserenity-flashing-pussy', 3, 'http://img-l3.xvideos.com/videos/thumbsll/ea/64/3e/ea643ebbaec4f3cf15e9e119627fcea0/ea643ebbaec4f3cf15e9e119627fcea0.12.jpg', 'http://www.xvideos.com/video15247823/6cam.biz_teen_tiaserenity_flashing_pussy_on_live_webcam', '6 min', 1, 1531897705),
(13, '052602', '052602', 3, 'http://img-l3.xvideos.com/videos/thumbsll/ee/b3/79/eeb379cb347be28ecea0fa7fe0725446/eeb379cb347be28ecea0fa7fe0725446.1.jpg', 'http://www.xvideos.com/video3910497/052602', '1h 15 min', 1, 1531897705),
(14, 'RealityJunkies Tight Teen Ivy Winters Tak ', 'realityjunkies-tight-teen-ivy-winters-tak', 3, 'http://img-l3.xvideos.com/videos/thumbsll/dd/e9/e2/dde9e26cfd6976ebcdd50a66a7132f68/dde9e26cfd6976ebcdd50a66a7132f68.6.jpg', 'http://www.xvideos.com/video4324548/realityjunkies_tight_teen_ivy_winters_takes_a_big_cock', '10 min', 1, 1531897705),
(15, 'Creamed ass slut sucks cock', 'creamed-ass-slut-sucks-cock', 3, 'http://img-l3.xvideos.com/videos/thumbsll/90/c6/e1/90c6e18e29358bb046eaf1c22b528652/90c6e18e29358bb046eaf1c22b528652.6.jpg', 'http://www.xvideos.com/video6064927/creamed_ass_slut_sucks_cock', '5 min', 1, 1531897705),
(16, 'my indian wife sneha 04', 'my-indian-wife-sneha-04', 3, 'http://img100-329.xvideos.com/videos/thumbsll/d2/77/92/d277921a81b6aea6acf68f6304be230d/d277921a81b6aea6acf68f6304be230d.4.jpg', 'http://www.xvideos.com/video14992329/my_indian_wife_sneha_04', '1 min 8 sec', 1, 1531897705),
(17, 'gr-13a-300', 'gr-13a-300', 2, 'http://img-l3.xvideos.com/videos/thumbsll/86/77/ac/8677acb1fb6eab91004fb2e3d8b2bb87/8677acb1fb6eab91004fb2e3d8b2bb87.5.jpg', 'http://www.xvideos.com/video11226450/gr-13a-300', '25 min', 1, 1531897705),
(18, 'Asians Girls With Big Tits Get Banged vid-05', 'asians-girls-with-big-tits-get-banged-vid-05', 2, 'http://img100-707.xvideos.com/videos/thumbsll/ec/5f/f4/ec5ff46b87d7c599e82713bfa497f803/ec5ff46b87d7c599e82713bfa497f803.5.jpg', 'http://www.xvideos.com/video2296707/asians_girls_with_big_tits_get_banged_vid-05', '5 min', 1, 1531897705),
(19, 'Fucking My Amateur Asian Wife', 'fucking-my-amateur-asian-wife', 2, 'http://img100-777.xvideos.com/videos/thumbsll/7a/11/b0/7a11b04a4ae636fbd8a39b03fa346b4d/7a11b04a4ae636fbd8a39b03fa346b4d.11.jpg', 'http://www.xvideos.com/video108777/fucking_my_amateur_asian_wife', '5 min', 1, 1531897705),
(20, 'Juicy booty asian Sharon Lee outdoors ana ', 'juicy-booty-asian-sharon-lee-outdoors-ana', 2, 'http://img-l3.xvideos.com/videos/thumbsll/58/5a/1a/585a1acb9cb81db4d2325e062de46d45/585a1acb9cb81db4d2325e062de46d45.25.jpg', 'http://www.xvideos.com/video10725101/juicy_booty_asian_sharon_lee_outdoors_anal_banging', '5 min', 1, 1531897705),
(21, 'Jada Fire &amp; India vs Byron Long', 'jada-fire-amp;-india-vs-byron-long', 2, 'http://img100-849.xvideos.com/videos/thumbsll/d2/7d/60/d27d60ea524779c1337e47ea4e6f01f0/d27d60ea524779c1337e47ea4e6f01f0.30.jpg', 'http://www.xvideos.com/video3343849/jada_fire_and_india_vs_byron_long', '15 min', 1, 1531897705),
(22, 'Worthwhile asian group sex', 'worthwhile-asian-group-sex', 2, 'http://img-l3.xvideos.com/videos/thumbsll/ff/cb/56/ffcb563af3e7eafd79de9e5c9b230124/ffcb563af3e7eafd79de9e5c9b230124.27.jpg', 'http://www.xvideos.com/video8968937/worthwhile_asian_group_sex', '5 min', 1, 1531897705),
(23, 'Amateur Creampies Dillion Haper', 'amateur-creampies-dillion-haper', 2, 'http://img-l3.xvideos.com/videos/thumbsll/a4/61/5e/a4615e8df2c6247372f0894ecacab4a9/a4615e8df2c6247372f0894ecacab4a9.3.jpg', 'http://www.xvideos.com/video6177674/amateur_creampies_dillion_haper', '17 min', 1, 1531897705),
(24, 'Girl couldn&#039;t hold in her urges', 'girl-couldn#039;t-hold-in-her-urges', 2, 'http://img100-037.xvideos.com/videos/thumbsll/f8/f3/e3/f8f3e3f16c8a4bb34029fcf2ed067509/f8f3e3f16c8a4bb34029fcf2ed067509.9.jpg', 'http://www.xvideos.com/video8988037/girl_couldn_t_hold_in_her_urges', '5 min', 1, 1531897705),
(25, 'Hot Ebony Vida Valentine Fucked Hard And  ', 'hot-ebony-vida-valentine-fucked-hard-and', 1, 'http://img-l3.xvideos.com/videos/thumbsll/b8/ba/cb/b8bacbf2e9fe0f70d6aa17b5cafaf3c1/b8bacbf2e9fe0f70d6aa17b5cafaf3c1.10.jpg', 'http://www.xvideos.com/video9617258/hot_ebony_vida_valentine_fucked_hard_and_got_a_creampie', '18 min', 1, 1531897705),
(26, 'Paul - First Contact', 'paul-first-contact', 1, 'http://img100-937.xvideos.com/videos/thumbsll/f4/ae/db/f4aedb4f94ee9b156403d60a576b94db/f4aedb4f94ee9b156403d60a576b94db.2.jpg', 'http://www.xvideos.com/video1136937/paul_-_first_contact', '5 min', 1, 1531897705),
(27, 'Old Mans Birthday Present', 'old-mans-birthday-present', 1, 'http://img100-765.xvideos.com/videos/thumbsll/57/fc/a0/57fca0068b526b0bde3c4072523336f9/57fca0068b526b0bde3c4072523336f9.2.jpg', 'http://www.xvideos.com/video1865765/old_mans_birthday_present', '3 min', 1, 1531897705),
(28, 'Chinese amateur', 'chinese-amateur', 1, 'http://img-l3.xvideos.com/videos/thumbsll/c3/4f/c4/c34fc42c500cc46bf1d26ef92ffcd240/c34fc42c500cc46bf1d26ef92ffcd240.23.jpg', 'http://www.xvideos.com/video2713598/chinese_amateur', '17 min', 1, 1531897705),
(29, 'Granny Jerking An Old Man', 'granny-jerking-an-old-man', 1, 'http://img-l3.xvideos.com/videos/thumbsll/35/83/53/358353b010cbc6df8b3e36ba9f302d94/358353b010cbc6df8b3e36ba9f302d94.12.jpg', 'http://www.xvideos.com/video8526917/granny_jerking_an_old_man', '5 min', 1, 1531897705),
(30, 'Her-nunu-is-dripping', 'her-nunu-is-dripping', 1, 'http://img-l3.xvideos.com/videos/thumbsll/94/12/c8/9412c834a60ed8c96c4d8fbe06b69250/9412c834a60ed8c96c4d8fbe06b69250.9.jpg', 'http://www.xvideos.com/video6227601/her-nunu-is-dripping-wet', '45 sec', 1, 1531897705),
(31, 'cute Blonde lesbians satisfying pussies', 'cute-blonde-lesbians-satisfying-pussies', 1, 'http://img-l3.xvideos.com/videos/thumbsll/f9/23/12/f92312f904bc94ac71fe75de2ff3c4f6/f92312f904bc94ac71fe75de2ff3c4f6.7.jpg', 'http://www.xvideos.com/video7440682/cute_blonde_lesbians_satisfying_pussies', '8 min', 1, 1531897705),
(32, 'Very wet little pussy before clit orgasm', 'very-wet-little-pussy-before-clit-orgasm', 1, 'http://img-l3.xvideos.com/videos/thumbsll/2f/a7/0c/2fa70c737d92c98ef321d3508642b6a5/2fa70c737d92c98ef321d3508642b6a5.27.jpg', 'http://www.xvideos.com/video2271285/very_wet_little_pussy_before_clit_orgasm', '15 min', 1, 1531897705);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `content`, `value`) VALUES
(1, 'Post per cate / day', '2'),
(2, 'Background header', '#10151D'),
(3, 'Color text header', '#A2A2A2'),
(4, 'Background footer color', '#2b2b2b'),
(5, 'Text color footer', '#FFF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
