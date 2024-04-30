-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2024 at 06:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icsbinco_vowscape_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceremonies`
--

CREATE TABLE `ceremonies` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `tradition` text NOT NULL,
  `country` text NOT NULL,
  `media1` text DEFAULT NULL,
  `media2` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ceremonies`
--

INSERT INTO `ceremonies` (`id`, `name`, `description`, `tradition`, `country`, `media1`, `media2`, `notes`, `status`) VALUES
(1, 'Tree Watering Unity Ceremony', 'Plant parents, take note. If you and your S.O. are aspiring horticulturists, consider having a tree-watering ceremony at your wedding. This alternative for a unity candle is especially appropriate for nature lovers or those looking to brighten up their home with a new plant. After watering the tree during your ceremony, it\'ll grow and flourish in your newlywed nest alongside your marriage.', '', '', '', '', '', '1'),
(2, 'Tree Planting Ceremony', 'For a more hands-on option than watering a plant, you and your partner could consider actually planting some greenery. Have a container with some trowels and dirt to sprinkle atop the plant as a symbol of your relationship and the tending you\'ll give to it to help your love grow. Of course, this option has the potential to be slightly messier than just watering a botanical so make sure to partake carefully to avoid ruining a wedding dress or tuxedo.', '', '', '', '', '', '1'),
(3, 'Log-Cutting Unity Ceremony', 'How about cutting a log at your wedding? This unique unity ceremony idea is an old German wedding tradition that serves as the first obstacle for newlyweds to tackle together. In front of family and friends, couples must rely on teamwork and determination to cut through a log together. While it may not be the most subdued wedding unity idea, it\'s a fun alternative for couples looking to shake up their ceremony with something memorable.', '', '', '', '', '', '1'),
(4, 'Guacamole Unity Ceremony', 'Guac, anyone? There are no rules that say your wedding unity ceremony has to be tied to religion. If you\'re looking for unique unity ceremony ideas, consider whipping up your favorite snack in front of your guests. As you and your S.O. mix the ingredients, ask your officiant to share why this food is special to you. Perhaps you enjoyed chips and guac on your first date, or maybe every Tuesday is taco night at your place. Regardless of the reason, guests will enjoy seeing you do something that\'s special to your relationship. (Psst: Don\'t forget to have a bag of tortilla chips nearby to enjoy your first dip as newlyweds.)', 'Catholic', 'Mexico', '', '', '', '1'),
(5, 'Succulent-Planting Unity Ceremony', 'Not everyone is born with a green thumb. If a tree-planting ceremony feels like too big of a commitment, opt for a more manageable plant instead, like a succulent. Task your wedding planner or a family member with setting up planting tools, dirt and a pot before the ceremony. Then, after sharing your wedding vows, mark your new beginning by planting a shrub together.', '', '', '', '', '', '1'),
(6, 'Bonfire Unity Ceremony', 'Perhaps a unity candle ceremony isn\'t bold enough for you. If you really want to wow your crowd, start a bonfire instead. Perfect for an outdoor wedding, this unique alternative to a unity candle will certainly make your nuptials stand out. Create a designated fire pit before the ceremony and signify your love by sparking a bonfire. This is an exceptionally great idea if you dream of serving s\'mores at your wedding reception.', '', '', '', '', '', '1'),
(7, 'Knot-Tying Unity Ceremony', 'Getting married is called \"tying the knot\" for a reason. If you\'re looking for a symbolic wedding unity idea, literally tie a knot with your spouse to signify your bond. We recommend using a fisherman\'s knot to tie a piece of rope not only is it the strongest knot, it gets tighter with pressure, making it a beautiful representation of your relationship. Spend a few days practicing your knot-tying skills before the ceremony to impress your loved ones.', 'Celtic', 'Scotland', '', '', '', '1'),
(8, 'Handfasting Ceremony', 'Handfasting unity ceremonies are rooted in Celtic tradition. In this ancient ritual, a couple\'s hands are tied together to symbolize the binding of two lives. While it\'s commonly seen in Pagan or Wiccan ceremonies, handfasting can be included in any religious or secular wedding.', '', '', '', '', '', '1'),
(9, 'Stefana Crown Unity Ceremony', 'If you or your partner are Greek, you might want to participate in a Stefana crown ceremony. This religious practice is often included in Greek Orthodox weddings. After a marriage service, the officiant (or a family member) places joint Stefana crowns on the couple. Both headpieces are tied together with a ribbon, which is blessed during the ceremony. The crowns represent the couple\'s welcome into God\'s kingdom.', '', '', '', '', '', '1'),
(10, 'Lasso Ceremony', 'Common in Hispanic, Filipino and Latin cultures, the Catholic lasso ceremony involves a cord, flower garland or oversized rosary that\'s draped over the couple\'s shoulders. The lasso can be placed by the officiant, or the couple can choose lasso godparents\" (another married couple they respect) to lay the cord. While you can buy a new lasso for your wedding date, some are passed down through families to serve as \"something borrowed.\" It\'s encouraged to use a special draping technique that begins on one person\'s shoulder and crosses over to the other\'s, creating a figure-eight shape. This symbolizes the couple\'s commitment to each other in front of their family, friends and God. \"It\'s originally a Catholic tradition, but some non-religious couples still incorporate it because of its deep symbolism, explains Lisette Gatliff of Lisette OC Photography. \"Many couples choose not to do any kind of unity ceremony, but it should be something to consider. It provides a symbolic ritual to the ceremony that can be personalized, which ends up being a unique and special moment that the couple will always remember.\"', '', '', '', '', '', '1'),
(11, 'Hasta Milap Ceremony', 'If you\'re planning a Hindu wedding ceremony, consider including a traditional Hasta Milap fastening. In this Indian wedding tradition, the couple\'s wedding clothes (like a scarf or a sari) are tied together over their hands. This signifies the meeting of two hearts and souls. Afterwards, family members scatter rose petals or rice grains over the newlyweds.', '', '', '', '', '', '1'),
(12, 'Tea Unity Ceremony', 'A unity tea ceremony is a frequent tradition in Chinese weddings, and there are a few ways to modify it for your big day. Traditionally, the couple serves tea to their parents and in-laws in a separate room before the ceremony to symbolize the union of two families. This is a great option if you\'re looking for something a bit more private. Or, if you want to include this wedding unity idea in your ceremony, pour two cups of tea to sip after your vows.', '', '', '', '', '', '1'),
(13, 'Wine Ceremony', 'Mixing two different wines symbolizes the hard work and nurturing your new marriage will need, just like how good wine needs years of hard work before producing a finished bottle. After making your custom blend, take a sip and toast to your future as a married couple. You can also buy your favorite bottle and seal it in a wine box to be opened (and enjoyed) on a future wedding anniversary.', '', '', '', '', '', '1'),
(14, 'Sealing Love Letters', 'Write love letters to each other before your wedding day, then craft a unity ceremony that gives you a few minutes to seal them in a special box that can be opened during a milestone anniversary. Not only is this an intimate moment for your friends and family to witness, but it\'s also an activity you can look forward to further down the road in your marriage.', '', '', '', '', '', '1'),
(15, 'Liquor Box Unity Ceremony', 'Instead of doing an anniversary wine box, consider storing a different spirit during the ceremony. It is your wedding, after all, so you get to call the shots. Whether you and your partner love gin, whiskey, rum or tequila, invest in a nice bottle to drink on a special anniversary.', '', '', '', '', '', '1'),
(16, 'Hand-Washing Unity Ceremony', 'Yes, washing your hands during your wedding ceremony is a thingand it\'s rooted in symbolism. A hand-washing unity ceremony signifies a clean beginning to married life. Buy a basin and a pitcher, and pour water over your S.O.\'s hands and have them repeat for you. You can also ask your officiant to pour water over your hands to wash them at the same time.', '', '', '', '', '', '1'),
(17, 'Ribbon Binding Ceremony', 'Consider this a modern take on the traditional handfasting ritual. Instead of tying your hands together with rope, use colorful ribbons instead. Not only is this a great way to work in your color palette, but it\'s also a modern approach to a traditional wedding practice.', '', '', '', '', '', '1'),
(18, 'Unity Sand Ceremony', 'You\'ve probably heard of a unity sand-pouring ceremony before, as it\'s one of the most popular ideas out there. After exchanging vows, partners will pour two separate containers of colored sand into one, symbolizing the blending of two lives. If you\'re looking for unity wedding ideas to complete with your children, pouring sand is a safe activity for them to participate in too. Since each member of your family will have their own color, the result will be a heartfelt representation of each person. Display it in your home after the wedding day to look back on this sentimental unity ceremony.', '', '', '', '', '', '1'),
(19, 'Candle Unity Ceremony', 'Perhaps one of the most common unity ceremony ideas is lighting the unity candle. This usually involves both partners lighting one large candle from two smaller taper candles, but if you have children, you can include them in the lighting ceremony too. To make this unity ceremony even more special, ask your family members to light the smaller candlesticks before passing them to you and your S.O.', '', '', '', '', '', '1'),
(20, 'Ring Warming', 'As a way of involving your guests in the commitment you\'re making, pass around the rings prior to exchanging them. Guests can warm them with their hands while offering silent blessings and well wishes for the marriage they signify.', '', '', '', '', '', '1'),
(21, 'Tequila Shot Unity Ritual', 'Get the party started early with a shot of your favorite alcohol. If you\'re hosting a destination wedding known for a certain type of liquor, you could toast with a local brew.', '', '', '', '', '', '1'),
(22, 'Painting Unity Ritual', 'This option is great for crafty to-be-weds who want a piece of art by which to remember their big day. Gathering different colors of paint and create a masterpiece as your paint colors meld with the color your partner chose.', '', '', '', '', '', '1'),
(23, 'Breaking the Glass', 'If you and your partner are hosting a Jewish wedding, a breaking the glass ritual is a great way to end the ceremony. The breaking of the glass is a reminder of your commitment to each other despite your marriage not being perfect since something, in this case the glass, has already been broken during your time together.', '', '', '', '', '', '1'),
(24, 'Jumping the Broom', 'Many Black and African-American couples choose to include the tradition of jumping the broom at the very end of their wedding ceremony. This ritual symbolizes a few things for the newlyweds: it\'s said to \'sweep\' away evil and the couple\'s old selves, while also celebrating their jump into a new life together. As with many cultural traditions, it is best to speak with your officiant and only include traditions of cultures you\'re personally connected to.', '', '', '', '', '', '1'),
(25, 'Noodle Eating Ritual', 'Instead of partaking in their ritual during the wedding ceremony, this couple chose to enjoy a traditional Chinese noodle eating ritual, as a symbol of longevity, during their first look. If your chosen unity ceremony involves a lot of materials to set up, the first look might be a simpler time to partake since you have more flexibility without all the wedding guests looking on.', '', 'China', '', '', '', '1'),
(26, 'Native American Wedding Vase', 'This special Native American wedding ritual is an important part of the ceremony for many different tribes. On the wedding day, the vase, which has two spouts, is filled with blessed water. Depending on the customs of their tribe, the couple either takes turns drinking the water or they both try to drink the water at the same time without spilling. After the wedding, the vase is cherished as a keepsake and can be passed down through generations.', '', '', '', '', '', '1'),
(27, 'Foot Washing', 'This unity ceremony idea is usually performed by Christian couples. Each person takes turns washing their partner\'s feet during the ceremony to symbolize humility, respect and dedication.', '', '', '', '', '', '1'),
(28, 'Blessing Stones', 'For a non-traditional unity ceremony idea, set a basket of stones at the entrance of your ceremony venue and ask each guest to take a stone before they sit down. During the ceremony, you can ask guests to hold their stones in their hand as your officiant reads a marriage blessing, or reserve a moment for guests to silently say their own blessings for you while holding the stones. Afterwards, you can return the stones to nature (like tossing them into the ocean or placing them around the base of the tree) or showcase them at home in a glass vase or bowl.', '', '', '', '', '', '1'),
(29, 'Arras Coins', 'Exchanging arras coins is common during Catholic ceremonies in Latin America, Spain and the Philippines. For this wedding unity idea, you\'ll need 13 coinsusually made of gold or platinum and a basket or pouch. Once the coins are presented (usually by a coin bearer nominated by the couple), the priest blesses the coins and passes them to the couple. The coins are exchanged back and forth between the couple to symbolize the sharing of their riches and a commitment to always provide for each other in their marriage.', '', '', '', '', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ceremonies`
--
ALTER TABLE `ceremonies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ceremonies`
--
ALTER TABLE `ceremonies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
