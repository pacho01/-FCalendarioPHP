CREATE TABLE IF NOT EXISTS `calendar_events` (
`id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `cod_equipo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `calendar_events` (`id`, `descripcion`, `fecha_inicio`, `fecha_fin`, `cod_equipo`) VALUES
(1, 'hello world', '2015-02-19 08:00:00', '2015-02-19 23:00:00', 1),
(2, 'lorem ipsum dolor sit amet', '2015-02-25 12:15:00', '2015-02-25 21:30:00', 1),
(3, 'otro evento cualquiera', '2015-02-14 09:00:00', '2015-02-14 12:00:00', 1),
(4, 'nombre evento', '2015-02-19 07:00:00', '2015-02-19 08:00:00', 1);