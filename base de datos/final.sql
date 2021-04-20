-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2021 a las 11:33:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210309185251', '2021-03-09 19:53:06', 250),
('DoctrineMigrations\\Version20210309185736', '2021-03-09 19:57:45', 182),
('DoctrineMigrations\\Version20210309185928', '2021-03-09 19:59:40', 181),
('DoctrineMigrations\\Version20210309190243', '2021-03-09 20:02:53', 1706),
('DoctrineMigrations\\Version20210310182712', '2021-03-10 19:27:23', 1717),
('DoctrineMigrations\\Version20210322164243', '2021-03-22 17:42:52', 4111),
('DoctrineMigrations\\Version20210323111940', '2021-03-23 12:19:55', 2536),
('DoctrineMigrations\\Version20210324111821', '2021-03-24 12:18:30', 237),
('DoctrineMigrations\\Version20210329105408', '2021-03-29 12:54:17', 1463),
('DoctrineMigrations\\Version20210329152752', '2021-03-29 17:28:01', 210),
('DoctrineMigrations\\Version20210418150700', '2021-04-18 17:07:13', 3848);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fest_destacado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`id`, `usuario_id`, `fest_destacado_id`) VALUES
(1, 14, 7),
(2, 14, 11),
(5, 14, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `festival_destacado`
--

CREATE TABLE `festival_destacado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frase` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `festival_destacado`
--

INSERT INTO `festival_destacado` (`id`, `nombre`, `descripcion`, `frase`, `foto`, `lugar`, `video`) VALUES
(6, 'Arenal Sound', 'El festival Arenal Sound es un festival de música independiente que se celebra en la playa El Arenal, en la localidad de Burriana (provincia de Castellón, España), durante la primera semana de agosto desde 2010. Se caracteriza por su gran afluencia de jóvenes y se diferencia de otros festivales por su cercanía a la playa al tener uno de sus escenarios sobre la misma arena. Se ha convertido en uno de los referentes de la temporada festival nacional.', 'El Arenal Sound puede ser perfectamente el festival que estás buscando si quieres picar un poco de todo.', '605b1f519ecaf.jpg', 'España', NULL),
(7, 'Medusa Sunbeach Festival', 'es un festival de música electrónica dirigido principalmente hacia un público joven. Se celebra desde 2014 cada año en la playa de Cullera, municipio de Valencia, Comunidad Valenciana. Encontramos diferentes estilos con sus respectivos escenarios: desde e', 's un festival de música dance que se celebra en Cullera.\r\nEn esta playa valenciana unen fuerzas DJs de los mundos mainstream y underground en un cartel repleto de talento musical.', '605b21f8ae1b2.jpg', 'España', NULL),
(11, 'Tomorrowland', 'Tomorrowland es mucho más que una fiesta de electrónica. Por supuesto que es música pero también es diversión, amistad, fuegos artificiales, fiesta, baile, luces y gente de todos los países festejando. Los escenarios y el ambiente se encuentran rodeados de una decoración que simula un mundo de magia y fantasía. El festival en sí, ofrece una variedad de subgéneros dentro de la música electrónica. Es una especie de parque temático para adultos inspirado en el mundo circense con más de 15 escenarios diferentes.\r\nSiempre se realiza a mediados de Julio.', 'festival de música electrónica que se celebra en el municipio de Boom, en Bélgica y es considerado uno de los más importantes del género.', '6061eb725857e.jpg', 'Mundo', NULL),
(14, 'Viña Rock', 'Es un festival musical español organizado anualmente el fin de semana previo al 1 de mayo. Desde sus inicios en 1996 se han celebrado en la ciudad albaceteña de Villarrobledo 24 ediciones consecutivas. En la edición de 2007 la empresa que organizaba el festival decidió trasladarlo a Benicàssim, en la provincia de Castellón, pero la Audiencia Provincial de València ha concedido al Ayuntamiento de Villarrobledo (Albacete) la titularidad de la marca \'Viña Rock\'. En la edición de 2008 se celebró como Viña Rock en Villarrobledo organizado por su ayuntamiento, y El Viña se celebró en Paiporta organizado por la empresa Matarile.\r\n\r\nEs uno de los festivales más importantes de España', 'Festival en Villarrobledo con mucho rock y bastante rap, el que todos disfrutamos saltando y nos hace rejuvenecer un buen puñado de años', '606b29864480c.jpg', 'España', NULL),
(15, 'Primavera Sound', 'es un festival de música que se celebra entre finales de mayo y principios de junio en Barcelona (España). Su primera edición tuvo lugar en el 2001 en el Pueblo Español y desde el 2005 tiene su sede en el Parque del Fórum, un recinto más grande y al lado del mar. La fisonomía del festival (de carácter urbano e integrado en la ciudad) y el amplio abanico de grupos representados ha motivado que Primavera Sound sea punto de encuentro de artistas y espectadores de diferentes generaciones.\r\n\r\nEl festival reúne en sus carteles las últimas propuestas musicales del ámbito independiente junto a artistas de contrastada trayectoria, abarcando cualquier estilo o género, buscando la calidad y apostando esencialmente por el pop, el rock y las tendencias más underground de la música electrónica y de baile.\r\n\r\nEn cada edición el evento ha ido incrementando la asistencia de público y la repercusión en los principales medios de prensa, radio y televisión, tanto a nivel nacional como internacional. ', 'Es uno de los festivales más consolidados de nuestro país, suena a rock, pop y un montón de propuestas más o menos alternativas.', '606b2ae3af6e4.jpg', 'España', NULL),
(16, 'Dreambeach', 'Es todo un referente nacional e internacional entre los festivales de música electrónica. Y no es para menos, porque grupos reconocidos a nivel global como The Prodigy, Pendulum, Feed Me, Laidback Luke, Armin Van Buuren, Carl Cox, Zomboy, Dimitri Vegas, Nervo,Noisia Chase & Status y Knife Party ya han pasado por sus escenarios en muy pocos años, además de importantes productores de la escena andaluza a los que el festival acoge y promociona.\r\n\r\nTechno, Dubstep, Drum\'n\'bass, minimal, hip hop y muchos otros estilos se dan cita durante unos días en los dos escenarios principales del Dreambeach y sus dos inmensas carpas, reclamo inigualable para los amantes de la música electrónica.\r\n\r\nel Dreambeach Festival se celebra en la playa de Villaricos, Cuevas de Almanzora, entorno paradisíaco de la provincia de Almería. Suele celebrarse durante el primer o segundo fin de semana de agosto, habiendo aumentando su duración desde dos hasta cinco días en su quinta edición. Se ha convertido así en uno de los festivales de mayor duración del país.', 'Si buscas un festival en el buen tiempo y el buen rollo estén asegurados, y en el que pueda bailar hasta altas horas de la madrugada sin necesidad de tener que cantar estribillos, ¡el Dreambeach es para ti!', '606b2dd346c75.jpg', 'España', NULL),
(17, 'Bilbao BBK Live', 'Es un festival de música pop y rock que se celebra con carácter anual en el mes de julio en la ciudad de Bilbao, y de los más importantes de España. La primera edición fue promovida por el Ayuntamiento de Bilbao y la promotora musical Last Tour (la cual organiza otros festivales como el Azkena Rock Festival, BIME y Donostia Festibala) en el año 2006 bajo el nombre Bilbao Live Festival. Tras el éxito de esa primera edición, en 2007 se sumó la caja de ahorros vizcaína Bilbao Bizkaia Kutxa, la cual aporta su nombre al festival. La totalidad del evento se desarrolla a lo largo de tres o cuatro días en un recinto especial levantado para la ocasión en las laderas del monte Cobetas, ubicado al suroeste de la capital.', 'Tiene la ubicación perfecta con su paisaje montañoso. Con sede en las laderas de las montañas Arriaz y un ambiente íntimo fuera de la ciudad, con las mejores vistas de Bilbao.', '606b2ee43cf88.jpg', 'España', NULL),
(20, 'Mad Cool Festival', 'Es un festival de música (rock, indie, electrónica, pop... ) que se realiza en Madrid desde el año 2016. El arte, la moda, la gastronomía y el turismo se unen eclécticamente en este festival. Desde 2017 se celebra el fin de semana siguiente a las fiestas del Orgullo de Madrid, dejando entre medias un fin de semana de descanso.', 'En lo más alto del juego de rock, consolidándose como uno de los festivales más importantes del país.', '606c283609164.jpg', 'España', NULL),
(21, 'Azkena Rock Festival', 'Es un festival de rock que se celebra cada año desde 2002 en Vitoria, Álava, España. Es organizado por la promotora de conciertos Last Tour International, la cual organiza otros festivales como el Bilbao BBK Live, BIME y Donostia Festibala.\r\n\r\nCon varias ediciones en su haber se ha convertido en uno de los festivales más importantes de España gracias a su interés por traer bandas de rock alejadas del público mainstream pero conocidas a nivel underground, junto con cabezas de cartel muy conocidos, incluso «legendarios». Existe la posibilidad de asistir a todos los conciertos programados, ya que existen dos escenarios y los conciertos no solapan en el tiempo. En la edición de 2006 se vendieron más de 44.000 entradas, el mayor éxito en la historia del fetival gracias a la presencia de Pearl Jam. Algunas de las bandas que han tocado han sido The Who, John Fogerty, Iggy & The Stooges, Wilco, Alice Cooper, Scorpions, ZZ Top, Social Distortion, Tool, Queens of the Stone Age, Ray Davies, Bad Religion, Sex Pistols, Deep Purple, The Black Crowes, Hanoi Rocks o Fun Lovin\' Criminals.', 'Durante dos días, ofrece música desde el punk al rock clásico, de leyendas a favoritos de culto, todo con una sensación no comercial que solidifica su historia de 15 años sobre una base de amor rock sin adornos.', '606c294614233.jpg', 'España', NULL),
(22, 'Aquasella festival', 'Es un festival de música electrónica que se celebra cada año en Arriondas, Principado de Asturias, España organizado por La Real Producciones. La edición 21 del festival tuvo lugar los días 21, 22 y 23 de julio de 2017. La primera edición del festival fue en el año 1997 con una asistencia aproximada de un millar de personas y en la edición del año 2010 asistieron más de 30.000 espectadores2​3​ y esperan superar el récord de asistencia para el año 2011.2​4​\r\n\r\nAquasella se ha convertido con el paso de los años en un referente internacional dentro de los festivales de música electrónica​ y cuenta con artistas invitados de fama internacional como Carl Cox, Sven Väth, Ben Sims, Óscar Mulero, Technasia, Eric Sneo o Luciano entre otros muchos.\r\n\r\nEl recinto del festival en la edición de 2011 estaba compuesto por 3 escenarios, zona de acampada, aparcamiento, servicios, duchas y puestos de comida y bebida dentro del recinto.6Cada escenario tiene un estilo de música distinto: Barceló Open Air, Zona Carlsberg y El Bosque Encantado.7\r\n\r\nLa fecha del festival casi siempre coincidía con el Descenso Internacional del Sella que se celebra anualmente entre Arriondas y Ribadesella, aunque a partir de la 19 edición de 2015, se celebra una vez pasado este. Aproximadamente en la segunda quincena del mes de agosto.', 'La promotora que ha situado a Asturias en la escena Techno nacional ha sido el artífice de este crecimiento exponencial a base de intenso trabajo, evolución y un afán de constante innovación. Sus primeros años estuvieron enfocados hacia la música techno que se fue complementando después con los estilos alternativos mas pujantes del momento, house, hiphop, electro, dance, disco…', '606c2d127cd8f.jpg', 'España', NULL),
(23, 'A Summer Story', 'El festival suele ser el 19-20 de junio, para unir a todos los amantes de la música electrónica, en la Comunidad de Madrid. Cada año, la Ciudad del Rock, calificada como el mejor recinto para eventos de gran nivel, crece con nosotros guardando momentos e historias. ¡También queremos la tuya!\r\n\r\nA Summer Story nace un 10 de Julio y a día de hoy, sigue revolucionando el país en cada edición. Cientos de artistas, nacionales e internacionales han dado vida a nuestro evento desde el año 2015. Siempre a nuestro lado, el punto más fuerte de nuestro despliegue audiovisual\r\n\r\nAclamado por la crítica, A Summer Story, es conocido por ser el festival nacional más consolidado, con cuatro escenarios, zona de restauración, fuentes de agua gratuita, aparcamiento, zonas VIP… Y el mejor ambiente para disfrutar juntos de la pasión que nos une, la música.\r\n\r\nAño tras año, ampliamos nuestros horizontes, aunando los mejores estilos de la electrónica y las nuevas tendencias, para proporcionar a nuestro público la mejor calidad en todos los aspectos.', 'dedica la mitad del cartel a lo mainstream y la otra mitad a lo underground, consiguiendo cubrir buena parte del panorama musical dance, con cabezas de cartel que van desde grandes del EDM hasta el techno.', '606c2e36ec9d2.jpg', 'España', NULL),
(24, 'Sonar Festival', 'Es un festival de música electrónica y experimental de ámbito internacional con sede en Barcelona. Fue fundado en la ciudad barcelonesa en 1994 por Ricard Robles, Enric Palau y Sergi Caballero.\r\n\r\nEl festival se divide en dos partes desde sus inicios. Sónar de Día se ha celebrado desde el primer año hasta la edición de 2012 en las instalaciones del CCCB, el MACBA y sus aledaños (Plaça dels Àngels, Capella dels Àngels…), en pleno centro de Barcelona. A partir de la edición de 2013 el Festival se trasladó a las instalaciones de Fira Barcelona en Montjuïc, Plaza d’Espanya, manteniendo su centralidad y su condición de festival urbano y ampliando sus aforos. Por su parte, Sónar de Noche ha cambiado varias veces de ubicación, siendo el pabellón de la Mar Bella (1997-2000) y el recinto de Fira Gran Via, en Hospitalet (desde 2001 hasta hoy) sus espacios de referencia.', 'Arte, vanguardia y nuevas corrientes musicales de la electrónica y experimental: eso es lo que lleva proponiendo el Sónar desde hace más de dos décadas. Se define a sí mismo como el Festival Internacional de Música Avanzada y New Media Art', '606c3312b1521.jpg', 'España', NULL),
(26, 'Ultra Miami', 'Es un festival anual de música electrónica, fundado en 1999 por la pareja de negocios Russell Faibisch y Alex Omes. El festival tiene lugar en marzo en la ciudad de Miami, Florida. El primer evento del festival coincidió con el Winter Music Conference en el año 1999, que también se llevó a cabo en Miami. El festival tuvo lugar entre 1999 y 2000 en South Beach (Miami Beach), entre 2001 y 2005 en el Bayfront Park (Downtown Miami), entre 2006 y 2011 en el Bicentennial Park (Downtown Miami), entre 2012 y 2018 se realizó de nuevo en el Bayfront Park y desde 2019 en adelante se realiza en Virgina Key Beach Park', 'El festival dónde la música electrónica se convierte en reina. Es sin duda la destinación perfecta para integrar música y turismo en tus vacaciones', '607c39668877e.jpg', 'Mundo', NULL),
(27, 'Mysteryland', 'Es el festival de música electrónica de baile líder en los Países Bajos, organizado por el promotor ID&T, con sede en los Países Bajos . Siendo el primero de su tipo en el país cuando se estableció, sus organizadores han anunciado el evento como el festival de música dance más antiguo de los Países Bajos. Recientemente se ha celebrado en Haarlemmermeerse Bos en Haarlemmermeer ; un recinto ferial que acogió la edición 2002 del festival holandés de jardinería Floriade. Se lleva a cabo tradicionalmente el último fin de semana de agosto; la próxima fecha es del 27 al 29 de agosto de 2021. Desde 2015, el festival ha cambiado de un evento de un día a un evento de tres días con campamento. Cada año, más de 100.000 visitantes de más de 100 nacionalidades son recibidos en Mysteryland.', 'Se considera uno de los festivales de música electrónica pioneros en Europa. Sus grandes escenarios y su gran espectáculo de lásers y pirotecnia, convierten el festival en un evento único.', '607c3b6a7bfad.jpg', 'Mundo', NULL),
(28, 'ROCK IN RIO', 'Es un evento originario de Brasil que incluye una serie de conciertos de rock y pop organizados por el empresario brasileño Roberto Medina. Es conocido mundialmente como \"El festival más grande del mundo\". Actualmente cuenta con ocho ediciones en Río de Janeiro (1985, 1991, 2001, 2011, 2013, 2015, 2017 y 2019), nueve en Lisboa (2004, 2006, 2008, 2010, 2012, 2014, 2016, 2018 y 2021), tres en Madrid (2008, 2010 y 2012), una en Las Vegas (2015) y se realizara por primera vez en Santiago de Chile (2021).\r\n\r\nLa primera edición del Rock in Rio se realizó entre el 11 y 20 de enero de 1985 en una área de 250.000 m², la cual recibió el nombre de \"Cidade do Rock\" (Ciudad del Rock), localizada en Jacarepaguá, zona oeste de Río de Janeiro, Brasil.', 'Rock in Rio ha llegado a crear su propia historia. Con himno propio, míticos espectáculos, fuegos artificiales y mucho más se sitúa en esta lista de festivales totalmente impresionantes.', '607c3d570c27f.jpg', 'Mundo', NULL),
(29, 'Hot 97 Summer Jam', 'Es un festival de música hip-hop y R&B en East Rutherford, Nueva Jersey. El festival, que se remonta a 1994, es una tradición consagrada en el juego. Que suele celebrar a principio de junio.\r\n\r\nHabiendo albergado algunos de los momentos más importantes en la tradición del hip hop a lo largo de su historia, Hot 97 Summer Jam es una parada que todos los artistas deben hacer si quieren reclamar algún tipo de título.\r\n\r\nCada año, la famosa estación de radio Hot 97 FM de Nueva York selecciona una lista de los más importantes y vibrantes para que disfruten sus legiones de oyentes.', 'El festival que ha seguido más de cerca la evolución del hip hop. A parte de descubrir cada año a nuevas caras del género, Hot 97 Summer Jam ofrece a los fans la oportunidad de ver a las estrellas del rap.', '607c3e6e6d3ea.jpg', 'Mundo', NULL),
(30, 'Lollapallooza', 'Es un festival musical de los Estados Unidos que se celebra a principio de agosto, que originalmente ofrecía bandas de rock alternativo, indie y punk rock; también hay actuaciones cómicas y de danza. Concebido en 1991 por Perry Farrell, cantante de Jane\'s Addiction, Lollapalooza se realizó anualmente hasta 1997 y fue revivido en 2003. El festival encapsula la cultura joven de los años 1990. \"Generación Lollapalooza\" es a veces sinónimo de \"Generación X\". El Lollapalooza inaugural estuvo de gira por Estados Unidos y Canadá desde mediados de julio hasta finales de agosto de 1991. El cartel inaugural del Lollapalooza estaba compuesto por artistas del rock alternativo (como Siouxsie and the Banshees, que fueron los segundos artistas principales detrás de Jane\'s Addiction), música industrial (como Nine Inch Nails) y rap (Ice-T rapeó y usó la plataforma para lanzar Body Count, su banda de heavy metal).', 'Uno de los festivales de música más importantes de Estados Unidos, en Chicago. Lollapallooza representa la esencia de la cultura joven de los años 90 y acoge el rock, la electrónica y la música indie como principales estilos', '607c3f61b4827.jpg', 'Mundo', NULL),
(31, 'Defqon 1', 'Es un festival de música anual que se celebra en los Países Bajos , Chile y Australia . Fue fundada en 2003 por el organizador del festival Q-dance . El festival toca principalmente hardstyle y géneros relacionados como hardcore techno , hard house y hard trance .\r\n\r\nEl festival se celebró anteriormente a mediados de junio en Almeerderstrand en Almere . Desde 2011 está alojado en el sitio del evento junto a Walibi Holland en Biddinghuizen . Desde 2009, el evento también se ha celebrado en Sydney a mediados de septiembre, en el Sydney International Regatta Centre.. Hasta 2011 (2014 para la edición australiana) el festival duró 12 horas, de 11:00 am a 11:00 pm, y finalizó con un castillo de fuegos artificiales. Desde 2012, el festival se amplió a tres días. Desde 2015, la edición australiana se amplió a dos días. Cada edición también tiene un himno, una canción oficial que se toca en conjunto con el festival. El festival también se transmite en vivo con video de los escenarios más grandes y audio para todos los demás escenarios a través de YouTube , y el sitio web Q-Dance para que la gente de todo el mundo lo sintonice.', 'El festival que reúne anualmente a los artistas de hardstyle más importantes a nivel mundial, aunque también destacan en él géneros como la música electrónica, el hard dance, el hardcore o el trance, entre otros.', '607c404e81713.jpg', 'Mundo', NULL),
(32, 'Daydream Festival', 'Daydream es sin duda una experiencia única que despertará todos tus sentidos. Un ambiente completamente de fantasía, mágico. México, Bélgica y Países Bajos son las diferentes ciudades en que se ha celebrado el festival hasta ahora, pero este año se ha estrenado en España. El festival cuenta con varios escenarios, cada uno dedicado a un género musical concreto y a una temática fantástica distinta. Daydream es definitivamente, un festival que te hará soñar con los ojos abiertos.\r\n\r\nEs uno de los eventos de música electrónica mas relevantes y exitosos del mundo. Se originó en Bélgica –celebrando hasta la fecha un total de 8 ediciones– y ya se ha expandido por Países Bajos, México y ahora llega a nuestro territorio. El montaje constará de cinco impresionantes escenarios con una oferta de ocio que, según fuentes de la organización, constará de atracciones y animación variada y que mantendrá abierto el recinto de 12 del mediodía hasta las 6 de la madrugada.', 'Daydream es sin duda una experiencia única que despertará todos tus sentidos. Un ambiente completamente de fantasía, mágico. México, Bélgica y Países Bajos  son las diferentes ciudades en que se ha celebrado el festival hasta ahora.', '607c425b53b55.jpg', 'Mundo', NULL),
(33, 'Creamfields', 'Es un festival de música electrónica celebrado anualmente cada mes de agosto en Liverpool (Reino Unido) desde 1998, organizado por los responsables del club nocturno Cream, club privado del cual se deriva el nombre de su evento musical \"Creamfields\". Cuenta con la participación de varios DJ en vivo.\r\n\r\nFestivales Creamfields se han realizado fuera de Reino Unido en:\r\n\r\nEuropa: Almería, Vigo (España), Lisboa (Portugal), Mangalia (Rumania), Moscú (Rusia), Praga (República Checa), Punchestown (Irlanda), Rabat (Malta), Wrocław (Polonia), Estambul (parte europea perteneciente a Turquía).\r\n\r\nAmérica: Buenos Aires (Argentina), Santiago (Chile), Ciudad de México (México), Punta del Este (Uruguay), Río de Janeiro, Curitiba, Belo Horizonte (Brasil), Lima (Perú), Bogotá (Colombia) y Asunción (Paraguay).', 'Se trata del festival más importante de música dance y electrónica del Reino Unido. Se celebra en la ciudad de Liverpool y se caracteriza por su enorme pista de baile, su propuesta artística, y sus efectos visuales, de luces y pirotecnia', '607c42df2056c.jpg', 'Mundo', NULL),
(34, 'Coachella Festival', 'es un gran festival de música que se desarrolla durante tres días en la última semana del mes de abril y tiene lugar en Indio, California, Estados Unidos en el Valle de Coachella en el desierto de Colorado. Cofundado por Paul Tollett y Rick Van Santen en 1999 y organizada por Goldenvoice, una subsidiaria de AEG Presents, En él se presentan artistas globales establecidos, así como artistas emergentes y grupos reunidos de distintos géneros musicales como el rock alternativo, indie rock, pop, hip hop, electrónica, etc; así como instalaciones artísticas y esculturas entre otros. Es uno de los festivales de música más grandes, famosos y rentables de Estados Unidos y del mundo. Cada Coachella escenificada entre 2013 y 2015 estableció nuevos récords de asistencia al festival e ingresos brutos. El festival de 2017 contó con la asistencia de 250.000 personas y recaudó 114,6 millones de dólares. El éxito de Coachella llevó a Goldenvoice a establecer festivales de música adicionales en el sitio, incluido el festival anual de música country Stagecoach, el festival Big 4 thrash metal y el Desert Trip, orientado al rock.', 'El Coachella tiene un espacio para todos. Rock, rap, electrónica, pop e indie se hacen hueco en los escenarios de este festival.', '607c44691d92b.jpg', 'Mundo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `festival_otro`
--

CREATE TABLE `festival_otro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frase` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `festival_otro`
--

INSERT INTO `festival_otro` (`id`, `nombre`, `descripcion`, `foto1`, `foto2`, `genero`, `frase`) VALUES
(1, 'ejemplo', 'eeeeeeeeeee', '607c4f68b2d1d.jpg', '607c4f68b3318.jpg', 'Electronica', 'eeeeeeeeeeeeeeeeeeee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `titulo`, `contenido`, `imagen`, `usuario_id`, `fecha`) VALUES
(9, 'Medusa Festival', 'yo recomiendo  si te gusta la música electrónica el medusa es tu festival', '60492023ea530.jpg', 2, '2021-03-29 17:37:53'),
(13, 'arenal', 'bastante guay', '604d2e476ab83.jpg', 9, '2021-03-29 17:37:53'),
(16, 'rrrrrrrr', 'rrr', '6061f46b31822.jpg', 14, '2021-03-29 17:38:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `mensajes_id` int(11) DEFAULT NULL,
  `contenido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `usuario_id`, `mensajes_id`, `contenido`, `imagen`) VALUES
(9, 4, 9, 'hola', '604d2c1ca18b6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `roles`, `password`, `nombre`, `apellidos`, `telefono`, `pais`, `sexo`, `imagen`) VALUES
(2, 'juan@jose', '[]', '$argon2id$v=19$m=65536,t=4,p=1$T1JQc1Jqb0pBTFFYTXEvNA$UZOGBZpbhGptlSEF81NwZhPS4YIhgl0whf2MwNrcrc8', 'juan', 'garcia', 635265841, 'españa', 'Masculino', '6048fc2faeb7d.jpg'),
(4, 'adrian@sa', '[]', '$argon2id$v=19$m=65536,t=4,p=1$L2xiYnpua2RhUGsvZ3ZEMA$P5Ar03eWJcB/NjNTaq1Pu94/76MLV1LL7tyip9+w/PA', 'adri', 'rodriguez', 646757, 'españa', 'Masculino', '604d2c550976f.jpg'),
(9, 'elena@aa', '[]', '$argon2id$v=19$m=65536,t=4,p=1$ZzMxMnUyeVNDWHJVbkdkSg$kca0ts66lE3o3eHZ+uMp3pP6RbivGy8Dy1ZvbaLvATU', 'elena', 'gimenez', 6535, 'españa', 'Masculino', '604d2cdda14f7.jpg'),
(10, 'pedro@assaa', '[]', '$2y$10$2FRko/jyaRfMAQ7b2tTtPu9XBKbIBKmqRB7UOQMHXnksfPlgvzNJ6', 'fran', 'rodrigues', 630562057, 'Bahrein', 'masculino', 'saaaa'),
(11, 'eeeeeeeeee@sss', '[]', '$2y$10$Wtxmcz5ZxTFKpAi0VtcSTun98xF7P1mQjieNivttxjOreIMfhs1qm', 'eeeeee', 'eeeeeee', 652123023, 'Bahamas', 'masculino', 'C:\\fakepath\\38498858_10155901697837428_7337696980899987456_o_NoticiaAmpliada.jpg'),
(12, 'vcvc@sss', '[]', '$2y$10$hJzzenn6hq7tn9QD4Zi7terPwTBSU0Wf3DGDA8cLCmqjgELJHcn2K', 'vvvvv', 'vvvvvvvvvvvvvvvv', 630235620, 'Bahamas', 'femenino', 'C:\\fakepath\\38498858_10155901697837428_7337696980899987456_o_NoticiaAmpliada.jpg'),
(13, 'fffff@aaaa', '[]', '$2y$10$J82pKdO7yV5CPAESTly5P.zkQa5l7q90FRKa.JJ.NWpSdDf.LBSP2', 'ddddd', 'dddddddd', 630265892, 'Bahamas', 'masculino', 'C:\\fakepath\\descarga (4).jpg'),
(14, 'david.rodriguez5899@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$cEJ1YWtxdDFRVDRBSk5jVA$NwCWZRP0+b7NZwVPmLSmqGmM+BS1A3nnmGUnnUaUlTk', 'david', 'rodriguez', 2147483647, 'ES', 'Masculino', '605b1a68af7d9.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `festival_destacado_id` int(11) DEFAULT NULL,
  `codigo` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id`, `festival_destacado_id`, `codigo`) VALUES
(1, 6, 'n86tMHCUrbY'),
(2, 7, 'CbRoIUjeNM8'),
(3, 11, 'hvIg3PTJWxs'),
(5, 14, '127yN7yBMEY'),
(6, 15, 'Ovv2tF1Ur1c'),
(7, 16, 'GihuFGxgDTo'),
(8, 17, 'SswWog-ZwsM'),
(11, 20, 'cZOQzGmhNZ8'),
(12, 21, '1f2DXKOrGy8'),
(13, 23, 'W_BKfb9MsF4'),
(14, 22, 'vgkDCE0CehA'),
(15, 24, 'kmwSnf6TMY0'),
(17, 34, '1-02XmLlAoE'),
(18, 26, 'nNe4RUHpLWI'),
(19, 27, 'reR3kZc2AwM'),
(20, 28, 'GI8oop5lWQ8'),
(21, 29, 'VyHtNPdGlC0'),
(22, 30, '0JFWvXJUf1k'),
(23, 31, 'DpxyDPzQZ7E'),
(24, 32, 'cvdzQnZsuXM'),
(25, 33, 'jqsymLe6CJ8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_881067C7DB38439E` (`usuario_id`),
  ADD KEY `IDX_881067C7DD98EEF2` (`fest_destacado_id`);

--
-- Indices de la tabla `festival_destacado`
--
ALTER TABLE `festival_destacado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `festival_otro`
--
ALTER TABLE `festival_otro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6C929C80DB38439E` (`usuario_id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6C6EC5EEDB38439E` (`usuario_id`),
  ADD KEY `IDX_6C6EC5EE4481E9A2` (`mensajes_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2265B05DE7927C74` (`email`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CC7DA2C6DD346C5` (`festival_destacado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `festival_destacado`
--
ALTER TABLE `festival_destacado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `festival_otro`
--
ALTER TABLE `festival_otro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `FK_881067C7DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_881067C7DD98EEF2` FOREIGN KEY (`fest_destacado_id`) REFERENCES `festival_destacado` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `FK_6C929C80DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `FK_6C6EC5EE4481E9A2` FOREIGN KEY (`mensajes_id`) REFERENCES `mensajes` (`id`),
  ADD CONSTRAINT `FK_6C6EC5EEDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2C6DD346C5` FOREIGN KEY (`festival_destacado_id`) REFERENCES `festival_destacado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
