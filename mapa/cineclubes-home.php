<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.css' rel='stylesheet' />
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%; }
</style>

<div id='map'></div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoicXVpamF1YSIsImEiOiJFZl9JMS00In0.ofdwBdKx6vgBYoSfJOo9Wg';
var map = L.mapbox.map('map', 'quijaua.k3bopad9')
    .setView([-14.84,-52.47], 4);

var myLayer = L.mapbox.featureLayer().addTo(map);

var geoJson = [{
  "type": "FeatureCollection",
  "features": [

<?php
	//Endereços
	$cineclubes = array(
		[
			'id'			=> '3ce461cd183838ffc681decb88cfd438',			
			'name'			=> 'Cineclube Siri',
			'ceu'			=> 'CEU Nossa Senhora do Socorro - SE',
			'desc' 			=> 'Rua A nove, s/n conjunto Marcos Freire I, \nbairro Taicoca, Nossa Senhora do Socorro - Sergipe',
			'lat' 			=> '-37.007446',
			'long'			=> '-10.558022',
			'link'			=> 'cineclebe-siri'
		],
		[
			'id'			=> '5300db99b3bff0e5bcd76b6a57cdbb03',
			'name'			=> 'pacoca',
			'ceu'			=> 'CEU Abaetetuba - PA',
			'desc' 			=> 'AV. HILDO CARVALHO S/N\nBAIRRO: SÃO SEBASTIÃO\nCIDADE: ABAETETUBA\nCEP: 68.440-000\nESTADO: PARÁ\n',
			'lat' 			=> '-47.982788',
			'long'			=> '-1.664194',
			'link'			=> 'pacoca'
		],
		[
			'id'			=> '61132efdac66ba4fd0375e9216259d65',
			'name'			=> 'Terreirada Cultural',
			'ceu'			=> 'CEU Barbalha - CE',
			'desc' 			=> 'CENTRO DE ARTES E ESPORTES UNIFICADOS MESTRE JOAQUIM MULATO\nPARQUE DA CIDADE\nAV. PAULO MAURÍCIO SAMPAIO, S/N\nVILA SANTO ANTONIO\n63180-000 - BARBALHA - CEARÁ',
			'lat' 			=> '-38.36975',
			'long'			=> '-4.045097',
			'link'			=> 'terreirada-cultural'
		],
		[
			'id'			=> '66ff75b1a77c9a27b019089055ac2ac0',
			'name'			=> 'Cineclube Locomokinos',
			'ceu'			=> 'CEU São Bento do Sul - SC',
			'desc' 			=> 'RUA OTTO EDUARDO LEPPER, 180​\nBAIRRO SERRA ALTA\n​CEP 89291 670\nCidade: Santa Catarina',
			'lat' 			=> '-48.828735',
			'long'			=> '-27.259512',
			'link'			=> 'cineclube-locomokinos'
		],
		[
			'id'			=> '6f02230f1050d1b6b86d98ace09ed007',
			'name'			=> 'Metamorfose',
			'ceu'			=> 'Cineclube CEU Mauá - SP',
			'desc' 			=> 'R. Assunção - Parque das Americas, Mauá - SP, 09350-655\n(11) 4544-2133',
			'lat' 			=> '-46.785278',
			'long'			=> '-23.407806',
			'link'			=> 'metamorfose'
		],
		[
			'id'			=> '8a64c747f9609210fdb4d66aeaa6944e',
			'name'			=> 'Cineclube Vagalume',
			'ceu'			=> 'CEU Maricá - RJ',
			'desc' 			=> 'Rodovia Hernani do Amaral peixoto, km 27,5\nMaricá - RJ Bairro Itapeba​',
			'lat' 			=> '-43.423461',
			'long'			=> '-22.902743',
			'link'			=> 'cineclube-vagalume'
		],
		[
			'id'			=> 'c33adcb50552bdf1d3c67e5abc808e1b',
			'name'			=> 'Itiquira',
			'ceu'			=> 'CEU Formosa - DF',
			'desc' 			=> 'Rua 65 s/n° - Setor Parque Lago CEP:73813-812\nCidade: Formosa\nEstado: Goiás',
			'lat' 			=> '-49.20227',
			'long'			=> '-16.914939',
			'link'			=> 'itiquira'
		],
		[
			'id'			=> 'd4937eb32cc68bc3d3f5f60850e0a1ae',
			'name'			=> 'Cineclube Carapanã',
			'ceu'			=> 'CEU Rio Branco - AC',
			'desc' 			=> 'Rua UIRAPURU S/N, Bairro: Cidade Nova. Ponto de referência: Praça da Juventude, Antiga Rodoviária.',
			'lat' 			=> '-69.483032',
			'long'			=> '-9.541166',
			'link'			=> 'cineclube-carapana'
		],
		[
			'id'			=> 'd69c78cf8596999d62cedb4e4fb9237d',
			'name'			=> 'Cine Clube Vale verde',
			'ceu'			=> 'CEU Ceará Mirim - RN',
			'desc' 			=> 'Rua Touros, 100\nCeará Mirim CEP 59570-000',
			'lat' 			=> '-35.447387',
			'long'			=> '-5.708913',
			'link'			=> 'cine-clube-vale-verde'
		],
	);
	
	foreach ($cineclubes as $cineclube) {
		echo '{
				"type": "Feature",
				"properties": 
				{
				  	"name": "'.$cineclube['name'].'",
				    "styleUrl": "#EditableMarkerStyle6",'
				    .'"styleHash": "4691e5fa",'
				    .'"description": "<p>'.$cineclube['ceu'].'<br/>'.$cineclube['desc'].'</p>",
				    "title": "'.$cineclube['name'].'",
				    "url": "'.$cineclube['link'] .'",
				    "marker-color": "1087bf",
				    "icon": {
				    	"iconUrl": "'.get_template_directory_uri().'/mapa/pin0.png",
				        "iconSize": [48, 48],
				    }				    
				},
				"geometry": 
				{
				    "coordinates": ['
				    	.$cineclube['lat'].','
				    	.$cineclube['long']
				    	.',0 
				    ],
				    "type": "Point"
				},
				"id": "'.$cineclube['id'].'"
			},' ;
	 }
?>
 
]
}];


// Set a custom icon on each marker based on feature properties.
myLayer.on('layeradd', function(e) {
    var marker = e.layer,
        feature = marker.feature;

    marker.setIcon(L.icon(feature.properties.icon));
});

// Disable drag and zoom handlers.
map.dragging.disable();
map.touchZoom.disable();
map.doubleClickZoom.disable();
map.scrollWheelZoom.disable();

// Disable tap handler, if present.
if (map.tap) map.tap.disable();

// Add features to the map.
myLayer.setGeoJSON(geoJson);

myLayer.on('click', function(e) {
    window.open(e.layer.feature.properties.url, '_self');
});

myLayer.on('mouseover', function(e) {
    e.layer.openPopup();
});
myLayer.on('mouseout', function(e) {
    e.layer.closePopup();
});

</script>


