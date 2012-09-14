<?php
/**
*	mysql2model
**/

$sql = "
  `id` int(11) DEFAULT NULL,
  `benutzer_id` int(11) NOT NULL,
  `filiale_id` int(11) NOT NULL,
  `anrede` varchar(45) DEFAULT NULL COMMENT 'Anrede',
  `vorname` varchar(45) DEFAULT NULL COMMENT 'Vorname',
  `nachname` varchar(100) NOT NULL COMMENT 'Nachname',
  `geburtstag` date DEFAULT NULL,
  `geschlecht` varchar(10) DEFAULT NULL COMMENT 'Geschlecht m w',
  `hno` varchar(100) DEFAULT NULL COMMENT 'Hals-Nasen-Ohren-Arzt',
  `info_hno` tinyint(4) DEFAULT NULL COMMENT 'aufmerksam geworden durch HNO',
  `info_werbung` tinyint(4) DEFAULT NULL COMMENT 'aufmerksam gworden durch Werbung',
  `info_empfehlung` tinyint(4) DEFAULT NULL COMMENT 'aufmerksam geworden durch Empfehlung',
  `info_andere` tinyint(4) DEFAULT NULL COMMENT 'aufmerksam geworden durch Andere',
  `motivation_eigen` tinyint(4) DEFAULT NULL COMMENT 'Eigenmotivation',
  `motivation_fremd` tinyint(4) DEFAULT NULL COMMENT 'Motivation durch Fremde',
  `motivation_tinnitus` tinyint(4) DEFAULT NULL COMMENT 'Motivation durch tinnitus',
  `hoerbiografie` text COMMENT 'Hörbiografie',
  `situation_privat` text COMMENT 'Lebenssituation privat',
  `situation_beruflich` text COMMENT 'Lebenssituation öffentlich oder beruflich',
  `vorerfahrungen` text COMMENT 'Vorerfahrungen mit Hörsystemen',
  `erwartungen` text COMMENT 'Erwartungen',
  `grad_einsicht` tinyint(4) DEFAULT NULL COMMENT 'Grad der Einsicht 0-4',
  `grad_erwartung` tinyint(4) DEFAULT NULL COMMENT 'Grad der Erwartungshaltung 0-4',
  `verschmutzung` varchar(200) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Feuchtigkeit oder Verschmutzung',
  `verschmutzung_c` tinyint(4) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Feuchtigkeit oder Verschmutzung checkbox',
  `gehoergang` varchar(200) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Besondere Gehörgangsgröße',
  `gehoergang_c` tinyint(4) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Besondere Gehörgangsgröße checkbox',
  `feinmotorik` varchar(200) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Feinmotorik',
  `feinmotorik_c` tinyint(4) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Feinmotorik checkbox',
  `gehoerschwankung` varchar(200) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Gehörschwankung',
  `gehoerschwankung_c` tinyint(4) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Gehörschwankung checkbox',
  `unversorgbar` varchar(200) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände einseitig unversorgbar',
  `unversorgbar_c` tinyint(4) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände einseitig unversorgbar checkbox',
  `tinnitus` varchar(200) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Tinnitus',
  `tinnitus_c` tinyint(4) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände Tinnitus checkbox',
  `ueberempfindlichkeit` varchar(200) DEFAULT NULL COMMENT 'Besondere Versorgungsumstände überempfindlichkeit',
  `ueberempfindlichkeit_c` tinyint(4) DEFAULT NULL,
  `allergie` varchar(200) DEFAULT NULL,
  `allergie_c` tinyint(4) DEFAULT NULL,
  `z_hoeranlage` tinyint(4) DEFAULT NULL,
  `z_streamer` tinyint(4) DEFAULT NULL,
  `z_induktionsspule` tinyint(4) DEFAULT NULL,
  `z_induktionsanlage` tinyint(4) DEFAULT NULL,
  `z_fernbedienung` tinyint(4) DEFAULT NULL,
  `z_lichtsignalanlage` tinyint(4) DEFAULT NULL,
  `z_telefon` tinyint(4) DEFAULT NULL,
  `z_tv` tinyint(4) DEFAULT NULL,
  `sonstiges` text,
  `geaendert_von` int(11) NOT NULL COMMENT 'geändert von',
  `geaendert_am` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'geändert am',
";

$arrData = explode(',', $sql);

$arrColumn = array();

foreach ($arrData as $key => $value) {
	$column = str_replace('`', '', substr($value, 1, strripos($value, '`')));
	array_push($arrColumn, $column);
}

//print_r($arrColumn);
//exit();

foreach ($arrColumn as $key => $value) {
	echo "protected \$_".$value.";<br>";
}


foreach ($arrColumn as $key => $value) {
	$name = explode("_", $value);
	// new Function Name
	 $newName = "";
	for ($i=0; $i<count($name); $i++) {
		$newName .= ucfirst($name[$i]);
	}
	
	echo 'public function get'.$newName.'() {<br>';
	echo 'return $this->_'.$value.';<br>';
	echo '}<br>';

	echo 'public function set'.$newName.'($value) {<br>';
	echo 'return $this->_'.$value.'=$value;<br>';
	echo '}<br><br>';

}

?>