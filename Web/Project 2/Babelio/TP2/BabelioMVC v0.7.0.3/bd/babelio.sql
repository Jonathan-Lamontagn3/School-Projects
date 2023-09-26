-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 14 avr. 2021 à 02:56
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `babelio`
--

-- --------------------------------------------------------

--
-- Structure de la table `critique`
--

CREATE TABLE `critique` (
  `utilisateur_id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `critique`
--

INSERT INTO `critique` (`utilisateur_id`, `livre_id`, `contenu`) VALUES
(2, 2, 'Edie, jeune femme afro américaine, travaille dans l\'édition, mais elle se faire congédier pour avoir eu des relations sexuelles sur son lieu de travail. Elle va finir livreuse à vélo. Elle vit en coloc dans un appartement miteux de Brooklyn. Elle peint à ses heures perdues.\r\nElle a une vie sexuelle plutôt débridée , mais, au niveau coeur, c\'est electro plat . Elle rencontre Éric sur le net, c\'est un homme blanc, plus âgé qu\'elle, marié. Elle va avoir une relation avec lui que je trouve pour le moins étrange. J\'ai eu du mal à décrypter Éric, et du mal à comprendre ce qu\'il cherche dans cette relation.\r\nEdie rencontre la femme d\'Éric, Rebecca, qui lui propose de venir habiter chez eux, pour s\'occuper de leur fille adoptive afro américaine, avec laquelle elle n\'arrive pas à tisser de liens et qui s\'ennuie dans cette banlieue chic\r\nEdie va donc habiter dans la belle maison du New Jersey avec le couple . Il va s\'en suivre une cohabitation chaotique. On assiste à des chassés croisés entre les trois adultes sans qu\'il y ait d\'explications franches. Je n\'ai pas trop compris comment ce couple fonctionnait.et ce que Rebecca cherchait en introduisant le ver dans le fruit, ou la maîtresse dans le foyer. Moi qui aime les situations claires et nettes, je suis restée sur ma faim. On assiste néanmoins à de belles scènes quand Rebecca qui est médecin légiste introduit Edie dans sa salle d\'autopsie, celle ci peint les scènes de dissection.\r\nJ\'ai buté sur le style, j\'ai dû relire certaines phrases pour en comprendre le sens. Je n\'ai pas saisi le message que l\'auteure voulait faire passer dans ce roman, à travers sa galerie de portraits. Ces personnages m\'ont semblaient hermétiques, celui pour lequel j\'ai eu le plus d\'empathie c\'est Rebecca, c\'est elle qui semble la plus droite, la plus sympathique la plus honnête.\r\nJe remercie les éditions du cherche midi et le Picabo River Book Club qui m\'ont permis de découvrir ce roman.'),
(1, 9, 'Un livre au concept plutôt marrant, où le vampire est un peu comme un chien dans un jeu de quilles. Séduisant, certes, mais complètement taré. Rien que pour cette touche de \"folie\" j\'ai aimé le personnage de Lucius. Après le côté sombre, aristocrate, c\'est sur que cela vous plaira. Jessica, en tout cas, n\'a rien d\'une Bella fade et terne : elle a de la volonté, une vraie personnalité, une vraie histoire, avec ses parents végétaliens et son adoption. Elle a du caractère, quoi ! Et si elle a aussi peu d\'expériences avec les hommes qu\'une Bella Swan ou qu\'une Sookie Stackhouse, on en rit avec elle, et avec sa meilleure amie Mindy et ses \"75 trucs pour le rendre fou au lit\" tirés de Cosmo.\r\nEvidemment, elle finit par céder et tomber amoureuse de Lucius, mais bon, elle aura tenu bon (pas comme cette gourde de Swan !).\r\nLe vampirisme est certes plus proche de celui de Stephenie Meyer que de celui d\'Anne Rice : Lucius et Jessica ont une conversation qui rappelle d\'ailleurs celle de Bella et d\'Edward au sujet des attributs vampiriques. Lucius peut sortir au soleil. La différence s\'arrête là : il mange normalement, avec des envies de sang par moment, a été élevé dans un monde où les vampires se reproduisent et où le vampirisme ne se manifeste qu\'à l\'adolescence. Ajoutez à cette histoire de séduction un arrière plan politique, et la question des différences sociales et culturelles, le problème de l\'adoption. On ressent comme Jessica la révolte à l\'idée d\'un mariage arrangé, l\'attirance, puis les affres de la jalousie.\r\nLa fin est, comment dire...étrange. Disons que Lucius hésite à l\'embrocher (de deux façons différences, dira-t-on). Un happy end? ça y ressemble, et pourtant...'),
(3, 11, 'En route pour une chasse dans la forêt amazonienne à la saison des pluies !\r\nLes glissades dans la gadoue, les ouistitis curieux et voleurs, le silure-perroquet pas méchant mais mortellement affectueux, les crotales au venin tueur, puis aussi, dès que la pluie s\'arrête, les nuées de moustiques qui s\'insinuent partout, tous ces plaisirs ne sont annoncés dans aucun prospectus de voyagiste !\r\nPourtant, ceci n\'est que le hors-d\'oeuvre. La pièce principale est une maman jaguar devenue enragée à la découverte de ses petits assassinés et dépiautés par un affreux chasseur blanc. Elle est un danger pour le petit village d\'Antonio José Bolivar, l\'homme qui connaît la forêt et tous ses habitants, hommes et animaux. Il a quitté ses amis Shuars pour vivre en bordure du hameau et son plus grand plaisir est de déchiffrer des romans d\'amour qui font souffrir mais qui finissent bien.\r\nA contre-coeur, il finira par tuer l\'animal, sans aucune fierté. Puis il retournera à son livre dont les mots lui font, parfois, oublier la barbarie des hommes.\r\nCe petit livre est un enchantement, un chant pour la préservation de la plus grande forêt du monde, une réflexion sur l\'arrivée inévitable de la \"civilisation\" et de la cupidité des gringos.\r\nUn petit bonheur qui se déguste lentement comme un bon café très noir.'),
(1, 12, 'L\'hiver vient, vaincre ou périr.\r\nPremier tome d\'une série qui compte à ce jour 15 tomes (5 en version originale ou en version \"intégrale\" française), il a obtenu le prix locus 1997.\r\nJe fais partie de ces gens qui sont venus au livre après avoir vu la série, et je dois avouer qu\'après avoir particulièrement apprécié cette première saison, j\'ai retrouvé dans le livre, l\'ambiance et l\'histoire assez fidèle. Les personnages ont gagné en corps et sont conformes à ce que j\'attendais.\r\nPremière partie : le trône de fer\r\nL\'histoire est à la fois simple et complexe : Sur le continent Westeros, protégé au nord des contrées glacées par le Mur sur lequel veille la garde de nuit et à l\'est du continent Essos des Dothrakis, peuple de cavaliers nomades, par la mer, la maison Baratheon et le roi Robert règne sur les 7 couronnes. Il est marié à Cersei Lannister, une autre puissante maison qui convoite le trône. le roi fait alors appel, pour l\'aider en tant que Main du Roi, à Ned de la maison Stark, fidèle ami et allié depuis toujours, lui-même marié à Catelyn de la maison Tully. Pendant ce temps, La maison Targaryen renversée par Robert et son prince héritier Viserys cherche à reconquérir son trône en s\'alliant avec les Dothrakis en offrant sa soeur Daenerys comme épouse à leur chef Drogo.\r\nVous parlerais-je alors de Tyrion, le fils Lannister, nain et retors, de John Snow le bâtard Stark qui rejoint la garde de nuit et pléthore d\'autres personnages ? Il faut avouer qu\'avoir vu la série avant aide à se retrouver dans cette multitude de personnages.\r\nJ\'ai vraiment trouvé dans la lecture de ce premier opus ce que j\'étais venu chercher. Après l\'époustouflant Gagner la guerre, un peu déçu des Annales de la Compagnie noire, j\'ai retrouvé ici cette atmosphère sombre et réaliste fort bien restituée. Une fantasy médiévale où le \"merveilleux\" et le surnaturel sont presque réduits à l\'état de légende et en tout cas secondaires par rapport à la puissance de l\'intrigue et des personnages. (Peut-être gagneront-ils en puissance dans les prochains tomes).\r\nUne histoire très politique, très réalpolitique où l\'on discute de l\'assassinat de bébés à naître pour le \"bien\" de la couronne. Des personnages fouillés, nuancés, authentiques, pas de héros au grand coeur pur, pas de machiavéliques forces du mal (quoique ?), des hommes et des femmes baignant dans un univers extrêmement riche et crédible.\r\nLe style d\'écriture est soutenu et il réussit à associer la modernité du ton à un langage rétro parfaitement raccord avec le milieu médiéval. Il y a une polémique sur la qualité de la traduction. Je ne peux en juger n\'ayant pas lu la VO (et en n\'en étant bien incapable d\'ailleurs), mais j\'ai en tout cas particulièrement apprécié cette lecture.\r\nComme léger bémol, la mise en place un poil trop lente (mais un poil hein), un peu plus de ferraillage n\'aurait pas nuit...\r\nSuivi du donjon rouge\r\nTyrion est aux mains de Catalyn, Ed Stark est sérieusement blessé et s\'oppose maintenant quasi ouvertement aux Lannister. Les alliances se font et se défont, le jeu du trône commence et toujours, la garde de nuit veille.\r\nUne seconde partie bien plus nerveuse que la première qui apparaît maintenant clairement comme un tome de présentation. le background est bien posé et on se concentre plus sur les personnages. le manque de \"ferraillage\" évoqué comme critique du premier opus est tombé. Une guerre vous aurez et elle donne du corps au roman sans pour autant l\'alourdir de descriptions interminables de combats acharnés (même si j\'adore cela en général, ici que nenni). La politique et les jeux de pouvoir tiennent toujours une part importante, crédibilisant encore plus le récit. L\'horizon s\'assombrit pour toutes les parties en jeu et l\'histoire tient toutes ses promesses.\r\nUne histoire de Fantasy médiévale qui prend ici tous ses titres de noblesse et qui préfigure une grande saga à venir (même si je n\'ai pas de mérite à dire cela puisque cela est :-) )'),
(1, 14, 'Avec ce roman,pas le temps de souffler ni de respirer;on nest directement dans l\'action.On commence par suivre les personnages en parallele,chacun de leur cote,avant de les voir se reunir lentement jusqu\'aux fracassantes révélations finales.Et force est de constater qu\'elles sont explosives.\r\nDu cote historique,Steve Berry a fait un travail de recherche impressionnant sur les Templiers ainsi que sur Béranger Sauniere et Rennes-le château.Les moindres détails reels sont utilises et respectes.Au niveau du recit,c\'est rythme,tendu,pleins de suspens,tous les ingrédients sont réunis pour passer un tres agreable moment de lecture.Steve Berry deploie une intrigue efficace,renvoyant aux fondements meme de l\'eglise avec des idees innovantes,choquantes qui feront polemiques\r\nBonne lecture');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `information` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `nom`, `information`, `date_creation`) VALUES
(1, 'Éditions Emmanuelle Collas', 'Aucune information supplémentaire', '2018-01-01'),
(2, 'Le Cherche midi', 'Maison d`édition française fondée en 1978, les éditions Le Cherche midi publient des ouvrages de littérature française et étrangère, de la poésie, des œuvres dans le domaine de l`humour, des documents, des beaux-livres et livres pratiques. La maison d`édition collabore avec de nombreuses associations comme Amnesty International, la Ligue des droits de l`homme, la Licra ou encore la Fondation Abbé Pierre.', '1978-06-01'),
(3, 'Seuil', 'Créées par Henri Sjöberg en 1935, les Éditions du Seuil font partie des plus grandes maisons d`éditions françaises et sont présentes dans tous les domaines éditoriaux : littératures française et étrangère, thrillers et policiers, sciences humaines, documents, spiritualités, sciences, jeunesse et beaux-livres.', '1935-01-01'),
(4, 'J`ai Lu', 'A la demande d`Henri Flammarion en 1958, Frédéric Ditis créé la maison d`édition française J`ai lu, qui publie principalement en format poche. Sa ligne éditoriale est variée, allant de la littérature générale à la science-fiction, en passant par le roman policier et le roman d`amour. Les éditions J`ai lu publient chaque année plus de 400 nouveautés au format poche.', '1958-04-09'),
(5, 'Le Masque', 'Fondé en 1927 par Albert Pigasse, Le Masque est une maison d’édition française qui se consacre exclusivement à la littérature noire, et est notamment l`éditeur historique d’Agatha Christie. Les éditions du Masque proposent également plusieurs collections : les Grands Formats, pour les auteurs de demain, la collection Labyrinthes, en format poche, et MsK, pour les jeunes lecteurs.', '1925-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Romance'),
(2, 'Fantasy'),
(3, 'Science fiction'),
(4, 'Horreur'),
(5, 'Aventures'),
(6, 'Fiction historique'),
(7, 'Fiction réaliste'),
(8, 'Policier'),
(9, 'Documentaire'),
(10, 'Biographie'),
(11, 'Autobiographie'),
(12, 'Poésie'),
(13, 'Psychologique'),
(14, 'Historique'),
(15, 'Fantastique');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nb_pages` int(11) NOT NULL,
  `rating` double NOT NULL,
  `resumer` text COLLATE utf8mb4_general_ci NOT NULL,
  `editeur_id` int(11) NOT NULL,
  `date_edition` date NOT NULL,
  `courriels_auteur` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `nb_pages`, `rating`, `resumer`, `editeur_id`, `date_edition`, `courriels_auteur`, `genre`) VALUES
(1, 'Les impatient', 240, 4.16, 'Trois femmes, trois histoires, trois destins liés.\r\n\r\nCe roman polyphonique retrace le destin de la jeune Ramla, arrachée à son amour pour être mariée à l\'époux de Safira, tandis que Hindou, sa soeur, est contrainte d\'épouser son cousin.\r\n\r\nPatience ! C\'est le seul et unique conseil qui leur est donné par leur entourage, puisqu\'il est impensable d\'aller contre la volonté d\'Allah. Comme le dit le proverbe peul : « Au bout de la patience, il y a le ciel. » Mais le ciel peut devenir un enfer. Comment ces trois femmes impatientes parviendront-elles à se libérer ?\r\n\r\nMariage forcé, viol conjugal, consensus et polygamie : ce roman de Djaïli Amadou Amal brise les tabous en dénonçant la condition féminine au Sahel et nous livre un roman bouleversant sur la question universelle des violences faites aux femmes.', 1, '2020-09-04', '', ''),
(2, 'Affamée', 320, 3.55, 'Un premier roman aussi sulfureux que dérangeant Edie, jeune Afro-Américaine, a décroché un poste dans l\'édition, mais il semble toujours y avoir quelqu\'un de plus respectable ou de plus \" blanc \" prêt à prendre sa place. Côté sexe, sa vie est assez débridée, mais sentimentalement les résultats ne sont guère satisfaisants. Or voilà qu\'elle rencontre - par Internet - Eric, un homme blanc plus âgé qu\'elle, avec qui elle entame une aventure aussi torride qu\'ambiguë.\r\nElle fait bientôt la connaissance de son épouse, qui lui propose de venir habiter chez eux pour s\'occuper de leur fille adoptive, une adolescente afro-américaine un peu perdue dans ce milieu huppé. La cohabitation - floue, sous tension - va exacerber les conflits latents, et générer des situations pour le moins inhabituelles, sur fond de séduction et d\'incompréhension.\r\n\r\nAvec ce premier roman aussi sulfureux que dérangeant, Raven Leilani dresse un tableau acerbe des liens sociaux et raciaux dans l\'Amérique contemporaine, où tabous et fantasmes mènent la danse.', 2, '2021-02-25', '', ''),
(4, 'L\'aurore', 192, 4.42, 'L\'Aurore de Selahattin Demirtas, c\'est le cri de la part éclairée d\'un pays.\r\nCe livre, écrit en prison, est en train de devenir un cri de ralliement et d\'espoir.\r\nDes histoires turques et kurdes dédiées « à toutes les femmes qui ont été assassinées et qui ont été victimes de la violence », mais qui n\'échappent pas à l\'humour. L\'auteur aurait pu nous livrer un récit pesant sur les crimes d honneur, le travail des enfant, l\'exil ou la guerre, dans la Turquie et la Syrie contemporaines ; bien au contraire : il lui donne un ton drôle et irrésistiblement tendre. Subversif et obsédant aussi.\r\nMalgré les circonstances exceptionnelles liées à l\'emprisonnement de l\'auteur, et malgré la censure, le livre s\'est vendu à 180 000 exemplaires depuis sa parution en septembre 2017. Un des plus grands bestsellers de l\'histoire de l\'édition turque. Il bénéficiera d\'un lancement mondial quasi simultané à partir de mai 2018 : Italie (Feltrinelli), Allemagne (Penguin), France, UK / US (Hogarth), Pays-Bas, Grèce, Égypte, Chine, Japon...\r\nNouvelles traduites du turc par Julien Lapeyre de Cabanes.', 1, '2018-09-14', '', ''),
(5, 'Et boire ma vie jusqu\'à l\'oubli', 240, 4.25, 'Betty s’efforce de vivre mais, à la nuit tombée, elle se cache et boit pour oublier la mort de son mari, Simon, et pour se souvenir de sa mère. Elle s’abrutit et s’effondre. Dans sa quête de la vérité, les images reviennent peu à peu. Des clichés tendres de l’enfance, une mère trop belle pour être vraie, des souliers rouges… et cette question lancinante : « Elle est où, maman ? » Cathy Galliègue aborde dans Et boire ma vie jusqu’à l’oubli un sujet tabou, celui de l’alcoolisme féminin, et nous offre un roman sans filtre sur la mémoire et le deuil, un diamant brut plein d’humanité et d’espoir. Après une carrière dans l’industrie pharmaceutique en France, elle est partie vivre en Guyane, où elle a animé pendant un saison une émission quotidienne littéraire sur la chaîne Guyane1ère et où elle se consacre désormais à l’écriture. Son premier roman, La nuit, je mens (Albin Michel, 2017), a remporté un succès d’estime, il est sélectionné pour le Prix Senghor 2018. Et boire ma vie jusqu’à l’oubli est son deuxième roman.', 1, '2018-10-05', '', ''),
(7, 'La Vengeance des mères', 464, 3.94, 'Dans le but de favoriser l’intégration, un chef cheyenne, Little Wolf, propose au président Grant d’échanger mille chevaux contre mille femmes blanches pour les marier à ses guerriers. Grant accepte et envoie dans les contrées reculées du Nebraska les premières femmes, pour la plupart « recrutées » de force dans les pénitenciers et les asiles du pays. En dépit de tous les traités, la tribu de Little Wolf ne tarde pas à être exterminée par l’armée américaine, et quelques femmes blanches seulement échappent à ce massacre. Parmi elles, deux sœurs, Margaret et Susan Kelly, qui, traumatisées par la perte de leurs enfants et par le comportement sanguinaire de l’armée, refusent de rejoindre la « civilisation ». Après avoir trouvé refuge dans la tribu de Sitting Bull, elles vont prendre le parti du peuple indien et se lancer, avec quelques prisonnières des Sioux, dans une lutte désespérée pour leur survie', 2, '2016-09-22', '', ''),
(8, 'Debout les morts', 282, 3.89, 'Les évangelistes 01\r\nUn hêtre peut-il en une seule nuit sans que personne l’ait planté ?\r\nOui. Chez la cantatrice Sophia Séméonidis; et elle n\'en dort plus.\r\nPuis elle disparaît sans que cela préoccupe son époux.\r\nAprès une série de meurtres sinistres, ses trois voisins \"dans la merde\", aidés par l\'ex-flic pourri Vandoodler, découvriront les racines du hêtre, vieilles de quinze ans, grasses de haines et de jalousie.\r\n\r\nOn retrouve les qualités et l\'humour de l’auteur de Ceux qui vont mourir te saluent (éd.Viviane Hamy, 1994) que la presse a largement salué.\r\nFred Vargas est archéologue. Son roman L\'Homme aux cercles bleus a obtenu les Prix du Festival de Saint-Nazaire en 92.', 4, '2000-03-16', 'deadOrALive@vmail.com', 'Policier'),
(9, 'Comment se débarrasser d\'un vampire amoureux', 412, 3.8, 'Jessica attendait beaucoup de son année de terminale: indépendance, fêtes à n’en plus finir… Elle n’avait certainement pas vu venir Lucius Vladescu ! Soudain, elle découvre que ses parents l’ont adoptée seize ans plus tôt en Roumanie, quand elle s’appelait encore Anastasia. Et, entre sa naissance et son adoption, ses vampires de parents biologiques ont eu l’excellente idée de la fiancer à un prince vampire, qui débarque aujourd’hui aux Etats-Unis pour récupérer sa promise.\r\nLucius est beau, prévenant, élégant: ça ne fait aucun doute, Jessica va lui tomber dans les bras. Malheureusement, la fiancée en question a d’autres projets et pas la moindre envie de suivre un inconnu en Roumanie, tout prince vampire qu’il soit. En nous racontant ses aventures avec un humour décapant, Jessica nous livre un guide pratique pour se débarrasser d’un vampire amoureux. Mais alors qu’elle invente tous les stratagèmes pour dégoûter Lucius, Jessica pourrait bien se retrouver prise à son propre piège. Prudence, les vampires peuvent se montrer très… persuasifs.', 5, '2009-10-14', 'vmpire@live.fr', 'Romance'),
(10, 'Le Crime de l\'Orient-Express', 264, 4.11, 'Par le plus grand des hasards, Hercule Poirot se trouve dans la voiture de l’Orient-Express – ce train de luxe qui traverse l’Europe – où un crime féroce a été commis.\r\nUne des plus difficiles et des plus délicates enquêtes commence pour le fameux détective belge.\r\nAutour de ce cadavre, trop de suspects, trop d’alibis.\r\n\r\nUn train de luxe bloqué par la neige, un cadavre fardé de plusieurs coups de poignards. A Hercule Poirot de démasquer le coupable parmi les douze passagers du wagon.', 5, '2017-11-02', 'ciminal@kmail.com', 'Policier'),
(11, 'Le vieux qui lisait des romans d\'amour', 128, 3.98, 'Antonio José Bolivar connaît les profondeurs de la forêt amazonienne et ses habitants, le noble peuple des Shuars. Lorsque les villageois d\'El Idilio les accusent à tort du meurtre d\'un chasseur blanc, le vieil homme quitte ses romans d\'amour - seule échappatoire à la barbarie des hommes - pour chasser le vrai coupable, une panthère majestueuse...\r\n\r\n« Il possédait l\'antidote contre le redoutable venin de la vieillesse. Il savait lire. »\r\n\r\n« Il ne lui faut pas vingt lignes pour qu\'on tombe sous le charme de cette feinte candeur, de cette fausse légèreté, de cette innocence rusée. Ensuite, on file sans pouvoir s\'arrêter jusqu\'à une fin que notre plaisir juge trop rapide. » Pierre Lepape, Le Monde', 3, '1997-01-01', 'oldman@gmail.fr', 'Romance'),
(12, 'Le Trône de Fer, Intégrale 1 : A Game of Thrones', 790, 4.33, 'Le royaume des sept couronnes est sur le point de connaître son plus terrible hiver : par-delà le mur qui garde sa frontière nord, une armée de ténèbres se lève, menaçant de tout détruire sur son passage. Mais il en faut plus pour refroidir les ardeurs des rois, des reines, des chevaliers et des renégats qui se disputent le trône de fer, tous les coups sont permis, et seuls les plus forts, ou les plus retors s\'en sortiront indemnes...', 4, '2010-01-20', 'drago@hotmail.com', 'Fantasy'),
(13, 'Le dernier testament de Maurice Finkelstein', 192, 2.87, 'Maurice et Gisèle Finkelstein sont très vieux, très riches et ils n’ont pas d’enfant. Toute la famille s’impatiente en attendant la grande kermesse finale chez le notaire. « Ils vont bien finir par mourir », se dit souvent Sophie Delassein, alias Sophinette, journaliste à L’Obs et nièce préférée du couple, en pôle position sur le testament des octogénaires.\r\n\r\nElle fait moins la maligne à l’été 2019, quand elle découvre que son oncle se meurt dans un hôpital de la Côte d’Azur. Elle pourrait laisser filer, elle décide de le sauver en se souvenant du jour où Maurice lui avait fait promettre de s’occuper de lui et de sa femme en cas de problème. Et là, gros problème il y a. En les plaçant dans un EHPAD près de chez elle, la journaliste chanson fait une entrée fracassante dans le monde de la gériatrie qu’elle observe en pissant de rire - sûrement pour ne pas pleurer.\r\n\r\nLe Dernier Testament de Maurice Finkelstein est une tragi-comédie dont les mots-clefs sont : famille, bas de contention, vautour, ta gueule, héritage, jambes entières/maillot/aisselles, aide-soignante, Covid-19, Céline Dion.', 3, '2021-03-04', 'franky@female.ru', 'Science fiction'),
(14, 'L\'Héritage des Templiers', 576, 3.85, 'L’auteur du Troisième Secret nous offre, avec ce thriller ésotérique remarquablement conçu, un roman riche en détails historiques, qui développe une étonnante hypothèse quand à la vraie nature du fameux trésor des Templiers.\r\n\r\n1118, Jérusalem, Terre sainte. Neuf chevaliers créent un ordre militaire, les \"Pauvres Chevaliers du Christ\". Le roi Baudoin II de Jérusalem leur cède pour résidence une partie de son palais, bâti sur les ruines du Temple de Salomon. Ils deviennent les «Chevaliers du Temple,» puis les «Templiers».\r\n\r\n1307 : Jacques de Molay, le grand maître de l’ordre des Templiers, est arrêté sur ordre de Philippe le Bel et livré à l’Inquisition. Il garde le silence sur le déjà célèbre trésor des Templiers.\r\n\r\n2006 : Cotton Malone, ex-agent du département de la Justice américaine, et son amie Stéphanie Nelle entrent en possession de documents troublants relatifs à la nature du trésor des Templiers. Commence alors une quête à la fois historique, érudite et périlleuse, qui les mènera à Rennes-le-Château, cœur du mystère.\r\n\r\nPlus de 2 millions d’amateurs de thrillers et de passionnés d’histoire ont déjà plébiscité à travers le monde ce roman, salué par Dan Brown et Katherine Neville, où ésotérisme, action et suspense se conjuguent à merveille.', 2, '2007-03-01', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `identifiant` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `identifiant`, `mot_de_passe`) VALUES
(1, 'Jonathan Lamontagne', 'joLam', 'jojo1995'),
(2, 'Mohammed Errabie', 'momo212', 'Era123456789'),
(3, 'Koffi Dzakou', 'kofdza', 'latame1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `critique`
--
ALTER TABLE `critique`
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `livre_id` (`livre_id`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_editeur_livre` (`editeur_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `critique`
--
ALTER TABLE `critique`
  ADD CONSTRAINT `fk_livre_critique` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur_critique` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk_editeur_livre` FOREIGN KEY (`editeur_id`) REFERENCES `editeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
