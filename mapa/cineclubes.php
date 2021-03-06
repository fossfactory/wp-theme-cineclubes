<script src='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.css' rel='stylesheet' />

<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:960px;margin-top:200px }
</style>

<div id='map' style=""></div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoicXVpamF1YSIsImEiOiJFZl9JMS00In0.ofdwBdKx6vgBYoSfJOo9Wg';
var map = L.mapbox.map('map', 'quijaua.k3bopad9')
    .setView([-14.84,-52.47], 4);

var myLayer = L.mapbox.featureLayer().addTo(map);

var geoJson = [{

  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {
        "name": "Cineclube CEU Nossa Senhora do Socorro - SE",
        "styleHash": "2ddf501d",
        "description": "<p>Rua A nove, s/n conjunto Marcos Freire I, \nbairro Taicoca, Nossa Senhora do Socorro - Sergipe</p>",
        "title": "CEU NOSSA SENHORA DO SOCORRO",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }
      },
      "geometry": {
        "coordinates": [
          -37.007446,
          -10.558022,
          0
        ],
        "type": "Point"
      },
      "id": "3ce461cd183838ffc681decb88cfd438"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "Cineclube CEU Abaetetuba - PA",
        "styleUrl": "#EditableMarkerStyle1",
        "styleHash": "72bd96df",
        "description": "<p>AV. HILDO CARVALHO S/N\nBAIRRO: SÃO SEBASTIÃO\nCIDADE: ABAETETUBA\nCEP: 68.440-000\nESTADO: PARÁ\n</p>",
        "title": "CEU ABAETETUBA",
        "marker-color": "008800",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }
      },
      "geometry": {
        "coordinates": [
          -47.982788,
          -1.664194,
          0
        ],
        "type": "Point"
      },
      "id": "5300db99b3bff0e5bcd76b6a57cdbb03"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "Cineclube CEU Barbalha - CE",
        "styleUrl": "#EditableMarkerStyle9",
        "styleHash": "5f447bd7",
        "description": "<p>CENTRO DE ARTES E ESPORTES UNIFICADOS MESTRE JOAQUIM MULATO\nPARQUE DA CIDADE\nAV. PAULO MAURÍCIO SAMPAIO, S/N\nVILA SANTO ANTONIO\n63180-000 - BARBALHA - CEARÁ</p>",
        "title": "CEU Barbalha",
        "marker-color": "1087bf",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }

      },
      "geometry": {
        "coordinates": [
          -38.36975,
          -4.045097,
          0
        ],
        "type": "Point"
      },
      "id": "61132efdac66ba4fd0375e9216259d65"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "​Cineclube CEU São Bento do Sul - SC",
        "styleUrl": "#EditableMarkerStyle7",
        "styleHash": "-5bdd3d67",
        "description": "<p>RUA OTTO EDUARDO LEPPER, 180​\nBAIRRO SERRA ALTA\n​CEP 89291 670\nCidade: Santa Catarina</p>",
        "title": "​CEU São Bento",
        "marker-color": "1087bf",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }

      },
      "geometry": {
        "coordinates": [
          -48.828735,
          -27.259512,
          0
        ],
        "type": "Point"
      },
      "id": "66ff75b1a77c9a27b019089055ac2ac0"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "Cineclube CEU Mauá - SP",
        "styleUrl": "#EditableMarkerStyle5",
        "styleHash": "-16fef6a5",
        "description": "<p>R. Assunção - Parque das Americas, Mauá - SP, 09350-655\n(11) 4544-2133</p>",
        "title": "CEU Mauá",
        "marker-color": "1087bf",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }

      },
      "geometry": {
        "coordinates": [
          -46.785278,
          -23.407806,
          0
        ],
        "type": "Point"
      },
      "id": "6f02230f1050d1b6b86d98ace09ed007"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "CEU Maricá",
        "styleUrl": "#EditableMarkerStyle8",
        "styleHash": "1b39f38",
        "description": "<p>Rodovia Hernani do Amaral peixoto, km 27,5\nMaricá - RJ Bairro Itapeba​</p>",
        "title": "CEU Maricá",
        "marker-color": "1087bf",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }

      },
      "geometry": {
        "coordinates": [
          -43.423461,
          -22.902743,
          0
        ],
        "type": "Point"
      },
      "id": "8a64c747f9609210fdb4d66aeaa6944e"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "CEU de Formosa",
        "styleUrl": "#EditableMarkerStyle2",
        "styleHash": "-2fb18c82",
        "description": "<p>Rua 65 s/n° - Setor Parque Lago CEP:73813-812\nCidade: Formosa\nEstado: Goiás</p>",
        "title": "CEU de Formosa",
        "marker-color": "1087bf",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }

      },
      "geometry": {
        "coordinates": [
          -49.20227,
          -16.914939,
          0
        ],
        "type": "Point"
      },
      "id": "c33adcb50552bdf1d3c67e5abc808e1b"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "CEU RIO BRANCO",
        "styleUrl": "#EditableMarkerStyle0",
        "styleHash": "1cc146c4",
        "description": "<P>Rua UIRAPURU S/N, Bairro: Cidade Nova. Ponto de referência: Praça da Juventude, Antiga Rodoviária.</P>",
        "title": "CEU RIO BRANCO",
        "marker-color": "1087bf",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }

      },
      "geometry": {
        "coordinates": [
          -69.483032,
          -9.541166,
          0
        ],
        "type": "Point"
      },
      "id": "d4937eb32cc68bc3d3f5f60850e0a1ae"
    },
    {
      "type": "Feature",
      "properties": {
        "name": "CEU Ceará Mirim",
        "styleUrl": "#EditableMarkerStyle6",
        "styleHash": "4691e5fa",
        "description": "<p>Rua Touros, 100\nCeará Mirim CEP 59570-000</p>",
        "title": "CEU Ceará Mirim",
        "marker-color": "1087bf",
         "icon": {
            "iconUrl": "/wp-content/themes/cineclubes/mapa/pin0.png",
            "iconSize": [48, 48],
        }

      },
      "geometry": {
        "coordinates": [
          -35.447387,
          -5.708913,
          0
        ],
        "type": "Point"
      },
      "id": "d69c78cf8596999d62cedb4e4fb9237d"
    }
  ]
}


];

// Set a custom icon on each marker based on feature properties.
myLayer.on('layeradd', function(e) {
    var marker = e.layer,
        feature = marker.feature;

    marker.setIcon(L.icon(feature.properties.icon));
});

// Add features to the map.
myLayer.setGeoJSON(geoJson);
</script>
