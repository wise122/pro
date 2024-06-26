<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Svg\Tag\Circle;

class ApiController extends Controller
{
    private $_producesType = [];
    private $_producesCategory = [];
    private $_provinces = [];
    private $_cities = [];

    public function __construct()
    {
        $this->_populateLocationsData();

        $this->_producesType = ['TANAMAN PANGAN', 'HORTIKULTURA', 'PERKEBUNAN', 'PETERNAKAN', 'SARANA PRODUKSI'];

        $this->_producesCategory['TANAMAN PANGAN'] = ['SEGAR', 'OLAHAN', 'LAINNYA'];
        $this->_producesCategory['HORTIKULTURA'] = ['SEGAR', 'OLAHAN', 'LAINNYA'];
        $this->_producesCategory['PERKEBUNAN'] = ['SEGAR', 'OLAHAN', 'LAINNYA'];
        $this->_producesCategory['PETERNAKAN'] = ['SEGAR', 'OLAHAN', 'LAINNYA'];
        $this->_producesCategory['SARANA PRODUKSI'] = ['BIBIT', 'BENIH', 'PUPUK', 'PESTISIDA', 'MESIN PRA PANEN', 'MESIN PASKA PANEN'];
    }

    public function get_jenis_komoditas()
    {
        return json_encode($this->_producesType);
    }

    public function get_kategori_komoditas_by_jenis_komoditas()
    {
        return json_encode($this->_producesCategory[request()->input('key')]);
    }

    public function get_provinces()
    {
        return json_encode($this->_provinces);
    }

    public function get_cities($province = '')
    {
        if ($province == '') {
            return json_encode($this->_cities[request()->input('province')]);
        } else {
            return json_encode($this->_cities[$province]);
        }
    }

    private function _populateLocationsData()
    {
        $this->_provinces = [
            'Nanggroe Aceh Darussalam',
            'Sumatera Utara',
            'Sumatera Selatan',
            'Sumatera Barat',
            'Bengkulu',
            'Riau',
            'Kepulauan Riau',
            'Jambi',
            'Lampung',
            'Bangka Belitung',
            'Kalimantan Barat',
            'Kalimantan Timur',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Utara',
            'Banten',
            'DKI Jakarta',
            'Jawa Barat',
            'Jawa Tengah',
            'Daerah Istimewa Yogyakarta',
            'Jawa Timur',
            'Bali',
            'Nusa Tenggara Timur',
            'Nusa Tenggara Barat',
            'Gorontalo',
            'Sulawesi Barat',
            'Sulawesi Tengah',
            'Sulawesi Utara',
            'Sulawesi Tenggara',
            'Sulawesi Selatan',
            'Maluku Utara',
            'Maluku',
            'Papua Barat',
            'Papua',
            'Papua Tengah',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Barat Daya',
        ];

        $this->_cities['Nanggroe Aceh Darussalam'] = [
            'Kabupaten Aceh Barat',
            'Kabupaten Aceh Barat Daya',
            'Kabupaten Aceh Besar',
            'Kabupaten Aceh Jaya',
            'Kabupaten Aceh Selatan',
            'Kabupaten Aceh Singkil',
            'Kabupaten Aceh Tamiang',
            'Kabupaten Aceh Tengah',
            'Kabupaten Aceh Tenggara',
            'Kabupaten Aceh Timur',
            'Kabupaten Aceh Utara',
            'Kabupaten Bener Meriah',
            'Kabupaten Bireuen',
            'Kabupaten Gayo Lues',
            'Kabupaten Nagan Raya',
            'Kabupaten Pidie',
            'Kabupaten Pidie Jaya',
            'Kabupaten Simeulue',
            'Kota Banda Aceh',
            'Kota Langsa',
            'Kota Lhokseumawe',
            'Kota Sabang',
            'Kota Subulussalam',
        ];

        $this->_cities['Sumatera Utara'] = [
            'Kabupaten Asahan',
            'Kabupaten Batu Bara',
            'Kabupaten Dairi',
            'Kabupaten Deli Serdang',
            'Kabupaten Humbang Hasundutan',
            'Kabupaten Karo',
            'Kabupaten Labuhanbatu',
            'Kabupaten Labuhanbatu Selatan',
            'Kabupaten Labuhanbatu Utara',
            'Kabupaten Langkat',
            'Kabupaten Mandailing Natal',
            'Kabupaten Nias',
            'Kabupaten Nias Barat',
            'Kabupaten Nias Selatan',
            'Kabupaten Nias Utara',
            'Kabupaten Padang Lawas',
            'Kabupaten Padang Lawas Utara',
            'Kabupaten Pakpak Bharat',
            'Kabupaten Samosir',
            'Kabupaten Serdang Bedagai',
            'Kabupaten Simalungun',
            'Kabupaten Tapanuli Selatan',
            'Kabupaten Tapanuli Tengah',
            'Kabupaten Tapanuli Utara',
            'Kabupaten Toba Samosir',
            'Kota Binjai',
            'Kota Gunungsitoli',
            'Kota Medan',
            'Kota Padang Sidimpuan',
            'Kota Pematang Siantar',
            'Kota Sibolga',
            'Kota Tanjung Balai',
            'Kota Tebing Tinggi',
        ];

        $this->_cities['Sumatera Selatan'] = [
            'Ogan Komering Ulu',
            'Ogan Komering Ilir',
            'Muara Enim',
            'Lahat',
            'Musi Rawas',
            'Musi Banyuasin',
            'Banyuasin',
            'OKU Selatan',
            'OKU Timur',
            'Ogan Ilir',
            'Empat Lawang',
            'Pali',
            'Musi Rawas Utara',
            'Palembang',
            'Prabumulih',
            'Pagar Alam',
            'Lubuk Linggau',
        ];

        $this->_cities['Sumatera Barat'] = [
            'Kabupaten Pesisir Selatan',
            'Kabupaten Solok',
            'Kabupaten Sijunjung',
            'Kabupaten Tanah Datar',
            'Kabupaten Padang Pariaman',
            'Kabupaten Agam',
            'Kabupaten Lima Puluh Kota',
            'Kabupaten Pasaman',
            'Kabupaten Kepulauan Mentawai',
            'Kabupaten Dharmasraya',
            'Kabupaten Solok Selatan',
            'Kabupaten Pasaman Barat',
            'Kota Padang',
            'Kota Solok',
            'Kota Sawahlunto',
            'Kota Padangpanjang',
            'Kota Bukittinggi',
            'Kota Payakumbuh',
            'Kota Pariaman',
        ];

        $this->_cities['Bengkulu'] = [
            'Bengkulu Selatan',
            'Rejang Lebong',
            'Bengkulu Utara',
            'Kaur',
            'Seluma',
            'Mukomuko',
            'Lebong',
            'Kepahiang',
            'Bengkulu Tengah',
            'Kota Bengkulu',
        ];

        $this->_cities['Riau'] = [
            'Kuantan Singingi',
            'Indragiri Hulu',
            'Indragiri Hilir',
            'Pelalawan',
            'Siak',
            'Kampar',
            'Rokan Hulu',
            'Bengkalis',
            'Rokan Hilir',
            'Kepulauan Meranti',
            'Pekanbaru',
            'Dumai',
        ];

        $this->_cities['Kepulauan Riau'] = [
            'Karimun',
            'Bintan',
            'Natuna',
            'Lingga',
            'Kepulauan Anambas',
            'Batam',
            'Tanjungpinang',
        ];

        $this->_cities['Jambi'] = [
            'Kabupaten Kerinci',
            'Kabupaten Merangin',
            'Kabupaten Sarolangun',
            'Kabupaten Batanghari',
            'Kabupaten Muaro Jambi',
            'Kabupaten Tanjung Jabung Timur',
            'Kabupaten Tanjung Jabung Barat',
            'Kabupaten Tebo',
            'Kabupaten Bungo',
            'Kota Jambi',
            'Kota Sungai Penuh',
        ];

        $this->_cities['Lampung'] = [
            'Lampung Barat',
            'Tanggamus',
            'Lampung Selatan',
            'Lampung Timur',
            'Lampung Tengah',
            'Lampung Utara',
            'Way Kanan',
            'Tulang Bawang',
            'Pesawaran',
            'Pringsewu',
            'Mesuji',
            'Tulang Bawang Barat',
            'Pesisir Barat',
            'Bandar Lampung',
            'Metro',
        ];

        $this->_cities['Bangka Belitung'] = [
            'Kepulauan Bangka Belitung',
            'Bangka',
            'Belitung',
            'Bangka Barat',
            'Bangka Tengah',
            'Bangka Selatan',
            'Belitung Timur',
            'Pangkalpinang',
        ];

        $this->_cities['Kalimantan Barat'] = [
            'Kab. Sambas',
            'Kab. Bengkayang',
            'Kab. Landak',
            'Kab. Pontianak',
            'Kab. Sanggau',
            'Kab. Ketapang',
            'Kab. Sintang',
            'Kab. Kapuas Hulu',
            'Kab. Sekadau',
            'Kab. Melawi',
            'Kab. Kayong Utara',
            'Kab. Kubu Raya',
            'Kota Pontianak',
            'Kota Singkawang',
        ];

        $this->_cities['Kalimantan Timur'] = [
            'Paser',
            'Kutai Barat',
            'Kutai Kertanegara',
            'Kutai Timur',
            'Berau',
            'Penajam Paser Utama',
            'Mahakam Ulu',
            'Balik Papan',
            'Samarinda',
            'Bontang',
        ];

        $this->_cities['Kalimantan Selatan'] = [
            'Kabupaten Balangan',
            'Kabupaten Banjar',
            'Kabupaten Barito Kuala',
            'Kabupaten Hulu Sungai Selatan',
            'Kabupaten Hulu Sungai Tengah',
            'Kabupaten Hulu Sungai Utara',
            'Kabupaten Kotabaru',
            'Kabupaten Tabalong',
            'Kabupaten Tanah Bumbu',
            'Kabupaten Tanah Laut',
            'Kabupaten Tapin',
            'Kota Banjarbaru',
            'Kota Banjarmasin',
        ];

        $this->_cities['Kalimantan Tengah'] = [
            'Kabupaten Barito Selatan',
            'Kabupaten Barito Timur',
            'Kabupaten Barito Utara',
            'Kabupaten Gunung Mas',
            'Kabupaten Kapuas',
            'Kabupaten Katingan',
            'Kabupaten Kotawaringin Barat',
            'Kabupaten Kotawaringin Timur',
            'Kabupaten Lamandau',
            'Kabupaten Murung Raya',
            'Kabupaten Pulang Pisang',
            'Kabupaten Sukamara',
            'Kabupaten Seruyan',
            'Kota Palangkaraya',
        ];

        $this->_cities['Kalimatan Utara'] = [
            'Kabupaten Bulungan',
            'Kabupaten Malinau',
            'Kabupaten Nunukan',
            'Kabupaten Tana Tidung',
            'Kota Tarakan',
        ];

        $this->_cities['Banten'] = [
            'Kabupaten Pandeglang',
            'Kabupaten Lebak',
            'Kabupaten Tangerang',
            'Kabupaten Serang',
            'Kota Tangerang',
            'Kota Cilegon',
            'Kota Serang',
            'Kota Tangerang Selatan',
        ];

        $this->_cities['DKI Jakarta'] = [
            'Kepulauan Seribu',
            'Kota Jakarta Selatan',
            'Kota Jakarta Timur',
            'Kota Jakarta Pusat',
            'Kota Jakarta Barat',
            'Kota Jakarta Utara',
        ];

        $this->_cities['Jawa Barat'] = [
            'Kabupaten Bogor',
            'Kabupaten Sukabumi',
            'Kabupaten Cianjur',
            'Kabupaten Bandung',
            'Kabupaten Garut',
            'Kabupaten Tasikmalaya',
            'Kabupaten Ciamis',
            'Kabupaten Kuningan',
            'Kabupaten Cirebon',
            'Kabupaten Majalengka',
            'Kabupaten Sumedang',
            'Kabupaten Indramayu',
            'Kabupaten Subang',
            'Kabupaten Purwakarta',
            'Kabupaten Karawang',
            'Kabupaten Bekasi',
            'Kabupaten Bandung Barat',
            'Kabupaten Pangandaran',
            'Kota Bogor',
            'Kota Sukabumi',
            'Kota Bandung',
            'Kota Cirebon',
            'Kota Bekasi',
            'Kota Depok',
            'Kota Cimahi',
            'Kota Tasikmalaya',
            'Kota BanjarBogor',
            'Kota Sukabumi',
            'Kota Bandung',
            'Kota Cirebon',
            'Kota Bekasi',
            'Kota Depok',
            'Kota Cimahi',
            'Kota Tasikmalaya',
            'Kota Banjar',
        ];

        $this->_cities['Jawa Tengah'] = [
            'Kabupaten Cilacap',
            'Kabupaten Banyumas',
            'Kabupaten Purbalingga',
            'Kabupaten Banjarnegara',
            'Kabupaten Kebumen',
            'Kabupaten Purworejo',
            'Kabupaten Wonosobo',
            'Kabupaten Magelang',
            'Kabupaten Boyolali',
            'Kabupaten Klaten',
            'Kabupaten Sukoharjo',
            'Kabupaten Wonogiri',
            'Kabupaten Karanganyar',
            'Kabupaten Sragen',
            'Kabupaten Grobogan',
            'Kabupaten Blora',
            'Kabupaten Rembang',
            'Kabupaten Pati',
            'Kabupaten Kudus',
            'Kabupaten Jepara',
            'Kabupaten Demak',
            'Kabupaten Semarang',
            'Kabupaten Temanggung',
            'Kabupaten Kendal',
            'Kabupaten Batang',
            'Kabupaten Pekalongan',
            'Kabupaten Pemalang',
            'Kabupaten Tegal',
            'Kabupaten Brebes',
            'Kota Magelang',
            'Kota Surakarta',
            'Kota Salatiga',
            'Kota Semarang',
            'Kota Pekalongan',
            'Kota Tegal',
        ];

        $this->_cities['Daerah Istimewa Yogyakarta'] = [
            'Kota Yogyakarta',
            'Kab. Sleman',
            'Kab. Bantul',
            'Kab. Kulon Progo',
            'Kab. Gunungkidul',
        ];

        $this->_cities['Jawa Timur'] = [
            'Kabupaten Pacitan',
            'Kabupaten Ponorogo',
            'Kabupaten Trenggalek',
            'Kabupaten Tulungagung',
            'Kabupaten Blitar',
            'Kabupaten Kediri',
            'Kabupaten Malang',
            'Kabupaten Lumajang',
            'Kabupaten Jember',
            'Kabupaten Banyuwangi',
            'Kabupaten Bondowoso',
            'Kabupaten Situbondo',
            'Kabupaten Probolinggo',
            'Kabupaten Pasuruan',
            'Kabupaten Sidoarjo',
            'Kabupaten Mojokerto',
            'Kabupaten Jombang',
            'Kabupaten Nganjuk',
            'Kabupaten Madiun',
            'Kabupaten Magetan',
            'Kabupaten Ngawi',
            'Kabupaten Bojonegoro',
            'Kabupaten Tuban',
            'Kabupaten Lamongan',
            'Kabupaten Gresik',
            'Kabupaten Bangkalan',
            'Kabupaten Sampang',
            'Kabupaten Pamekasan',
            'Kabupaten Sumenep',
            'Kota Kediri',
            'Kota Blitar',
            'Kota Malang',
            'Kota Probolinggo',
            'Kota Pasuruan',
            'Kota Mojokerto',
            'Kota Madiun',
            'Kota Surabaya',
            'Kota Batu',
        ];

        $this->_cities['Bali'] = [
            'Kabupaten Buleleng',
            'Kabupaten Jembrana',
            'Kabupaten Karangasem',
            'Kabupaten Tabanan',
            'Kabupaten Bangli',
            'Kabupaten Badung',
            'Kabupaten Gianyar',
            'Kabupaten Klunglung',
            'Kota Denpasar',
        ];

        $this->_cities['Nusa Tenggara Timur'] = [
            'Sumba Barat',
            'Sumba Timur',
            'Kupang',
            'Timor Tengah Selatan',
            'Timor Tengah Utara',
            'Belu',
            'Alor',
            'Lembata',
            'Flores Timur',
            'Sikka',
            'Ende',
            'Ngada',
            'Manggarai',
            'Rote Ndao',
            'Manggarai Barat',
            'Sumba Tengah',
            'Sumba Barat Daya',
            'Nagekeo',
            'Manggarai Timur',
            'Sabu Raijua',
            'Malaka',
            'Kota Kupang',
        ];

        $this->_cities['Nusa Tenggara Barat'] = [
            'Kabupaten Lombok Barat',
            'Kabupaten Lombok Tengah',
            'Kabupaten Lombok Timur',
            'Kabupaten Sumbawa',
            'Kabupaten Dompu',
            'Kabupaten Bima',
            'Kabupaten Sumbawa Barat',
            'Kabupaten Lombok Utara',
            'Kota Mataram',
            'Kota Bima',
        ];

        $this->_cities['Gorontalo'] = [
            'Kabupaten Boalemo',
            'Kabupaten Gorontalo',
            'Kabupaten Pohuwato',
            'Kabupaten Bone Bolango',
            'Kabupaten Gorontalo Utara',
            'Kota Gorontalo',
        ];

        $this->_cities['Sulawesi Barat'] = [
            'Majene',
            'Polewali Mandar',
            'Mamasa',
            'Mamuju',
            'Pasangkayu',
            'Mamuju Tengah',
        ];

        $this->_cities['Sulawesi Tengah'] = [
            'Banggai Kepulauan',
            'Banggai',
            'Morowali',
            'Poso',
            'Donggala',
            'Tolitoli',
            'Buol',
            'Parigi Moutong',
            'Tojo Una-Una',
            'Sigi',
            'Banggai Laut',
            'Morowali Utara',
            'Palu',
        ];

        $this->_cities['Sulawesi Utara'] = [
            'Bolaang Mongondow',
            'Minahasa',
            'Kepulauan Sangihe',
            'Kepulauan Talaud',
            'Minahasa Selatan',
            'Minahasa Utara',
            'Bolaang Mongondow Utara',
            'Siau Tagulandang Biaro',
            'Minahasa Tenggara',
            'Bolaang Mongondow Selatan',
            'Boolaang Mongondow Timur',
            'Manado',
            'Bitung',
            'Tomohon',
            'Kotamobagu',
        ];

        $this->_cities['Sulawesi Tenggara'] = [
            'Kabupaten Buton',
            'Kabupaten Muna',
            'Kabupaten Konawe',
            'Kabupaten Kolaka',
            'Kabupaten Konawe Selatan',
            'Kabupaten Bombana',
            'Kabupaten Wakatobi',
            'Kabupaten Kolaka Utara',
            'Kabupaten Buton Utara',
            'Kabupaten Konawe Utara',
            'Kabupaten Kolaka Timur',
            'Kabupaten Konawe Kepulauan',
            'Kabupaten Muna Barat',
            'Kabupaten Buton Tengah',
            'Kabupaten Buton Selatan',
            'Kota Kendari',
            'Kota Baubau',
        ];

        $this->_cities['Sulawesi Selatan'] = [
            'Kepulauan Selayar',
            'Bulukumba',
            'Bantaeng',
            'Jeneponto',
            'Takalar',
            'Gowa',
            'Sinjai',
            'Maros',
            'Pangkep',
            'Barru',
            'Bone',
            'Soppeng',
            'Wajo',
            'Sidrap',
            'Pinrang',
            'Enrekang',
            'Luwu',
            'Tana Toraja',
            'Luwu Utara',
            'Luwu Timur',
            'Toraja Utara',
            'Kota Makassar',
            'Kota Pare Pare',
            'Kota Palopo',
        ];

        $this->_cities['Maluku Utara'] = [
            'Halmahera Barat',
            'Halmahera Tengah',
            'Kepulauan Sula',
            'Halmahera Selatan',
            'Halmahera Utara',
            'Halmahera Timur',
            'Pulau Morotai',
            'Pulau Taliabu',
            'Ternate',
            'Tidore Kepulauan',
        ];

        $this->_cities['Maluku'] = [
            'Maluku Tenggara Barat',
            'Maluku Tenggara',
            'Maluku Tengah',
            'Buru',
            'Kepulauan Aru',
            'Seram Bagian Barat',
            'Seram Bagian Timur',
            'Maluku Barat Daya',
            'Buru Selatan',
            'Ambon',
            'Tual',
        ];

        $this->_cities['Papua Barat'] = [
            'Fakfak',
            'Kaimana',
            'Teluk Wondama',
            'Teluk Bintuni',
            'Manokwari',
            'Sorong Selatan',
            'Sorong',
            'Raja Ampat',
            'Tambrauw',
            'Maybrat',
            'Manokwari Selatan',
            'Pegunungan Arfak',
            'Kota Sorong',
        ];

        $this->_cities['Papua'] = [
            'Merauke',
            'Jayawijaya',
            'Jayapura',
            'Nabire',
            'Kepulauan Yapen',
            'Biak Numfor',
            'Paniai',
            'Puncak Jaya',
            'Mimika',
            'Boven Digoel',
            'Mappi',
            'Asmat',
            'Yahukimo',
            'Pegunungan Bintang',
            'Tolikara',
            'Sarmi',
            'Keerom',
            'Waropen',
            'Supiori',
            'Mamberamo Raya',
            'Nduga',
            'Lanny Jaya',
            'Mamberamo Tengah',
            'Yalimo',
            'Puncak',
            'Dogiyai',
            'Intan Jaya',
            'Deiyai',
            'Kota Jayapura',
        ];

        $this->_cities['Papua Tengah'] = [
            'Kabupaten Deiyai',
            'Kabupaten Dogiyai',
            'Kabupaten Intan Jaya',
            'Kabupaten Mimika',
            'Kabupaten Nabire',
            'Kabupaten Paniai',
            'Kabupaten Puncak',
            'Kabupaten Puncak Jaya',
        ];

        $this->_cities['Papua Pegunungan'] = [
            'Kabupaten Jayawijaya',
            'Kabupaten Yahukimo',
            'Kabupaten Pegunungan Bintang',
            'Kabupaten Tolikara',
            'Kabupaten Nduga',
            'Kabupaten Kabupaten Lanny Jaya',
            'Kabupaten Mamberamo Tengah',
            'Kabupaten Yalimo',
        ];

        $this->_cities['Papua Selatan'] = [
            'Kabupaten Merauke',
            'Kabupaten Mappi',
            'Kabupaten Asmat',
            'Kabupaten Boven Digoel',
        ];

        $this->_cities['Papua Barat Daya'] = [
            'Kabupaten Sorong',
            'Kabupaten Sorong Selatan',
            'Kabupaten Raja Ampat',
            'Kabupaten Tambrauw',
            'Kabupaten Maybrat',
            'Kota Sorong',
        ];

    }
}
