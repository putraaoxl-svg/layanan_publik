<?php

namespace Database\Seeders;

use App\Enums\FacilityType;
use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            [
                'name' => [
                    'id' => 'Ruang Kelas Malioboro',
                    'en' => 'Malioboro Classroom',
                    'ar' => 'فصل ماليوبورو',
                    'es' => 'Aula Malioboro',
                ],
                'type' => FacilityType::CLASSROOM,
                'description' => [
                    'id' => 'Ruang kelas ber-AC lengkap dengan smart display 75 inch, sound system nirkabel, mic podium, meja formasi U-shape/Classroom, dan akses WiFi berkecepatan tinggi.',
                    'en' => 'Air-conditioned classroom complete with a 75-inch smart display, wireless sound system, podium mic, U-shape/Classroom table formation, and high-speed WiFi access.',
                    'ar' => 'فصل دراسي مكيف الهواء مزود بشاشة ذكية مقاس 75 بوصة ونظام صوت لاسلكي وميكروفون منبر وتشكيل طاولات على شكل حرف U ووصول إلى شبكة WiFi عالية السرعة.',
                    'es' => 'Aula con aire acondicionado equipada con pantalla inteligente de 75 pulgadas, sistema de sonido inalámbrico, micrófono de podio, formación de mesas en U y acceso a WiFi de alta velocidad.',
                ],
                'capacity' => 35,
                'price_per_day' => 1500000.00,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Ruang Kelas Prambanan',
                    'en' => 'Prambanan Classroom',
                    'ar' => 'فصل برامبانان',
                    'es' => 'Aula Prambanan',
                ],
                'type' => FacilityType::CLASSROOM,
                'description' => [
                    'id' => 'Ruang kelas representatif dengan kapasitas hingga 45 peserta, dilengkapi dual proyektor laser HD, acoustic wall panel, podium digital, dan tata suara surround.',
                    'en' => 'Representative classroom with a capacity of up to 45 participants, equipped with dual HD laser projectors, acoustic wall panels, digital podium, and surround sound system.',
                    'ar' => 'فصل دراسي تمثيلي بسعة تصل إلى 45 مشاركًا، مجهز بأجهزة عرض ليزر عالية الدقة المزدوجة ولوحات حائط صوتية ومنبر رقمي ونظام صوت محيطي.',
                    'es' => 'Aula representativa con capacidad para hasta 45 participantes, equipada con proyectores láser HD duales, paneles de pared acústicos, podio digital y sistema de sonido envolvente.',
                ],
                'capacity' => 45,
                'price_per_day' => 2000000.00,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Auditorium Merapi',
                    'en' => 'Merapi Auditorium',
                    'ar' => 'قاعة ميرابي',
                    'es' => 'Auditorio Merapi',
                ],
                'type' => FacilityType::CLASSROOM,
                'description' => [
                    'id' => 'Aula serbaguna untuk seminar, pelantikan, rapat koordinasi pengawasan, dan lokakarya berskala besar hingga 150 tamu dengan panggung VIP dan ruang transit pimpinan.',
                    'en' => 'Multipurpose hall for seminars, inaugurations, supervisory coordination meetings, and large-scale workshops for up to 150 guests with a VIP stage and leadership transit room.',
                    'ar' => 'قاعة متعددة الأغراض للندوات والافتتاحات واجتماعات التنسيق الإشرافي وورش العمل واسعة النطاق لما يصل إلى 150 ضيفًا مع مسرح VIP وغرفة عبور للقيادة.',
                    'es' => 'Salón de usos múltiples para seminarios, inauguraciones, reuniones de coordinación supervisora y talleres a gran escala para hasta 150 invitados con escenario VIP y sala de tránsito de liderazgo.',
                ],
                'capacity' => 150,
                'price_per_day' => 5000000.00,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Laboratorium Komputer & Forensik Digital',
                    'en' => 'Computer & Digital Forensics Laboratory',
                    'ar' => 'مختبر الكمبيوتر والأدلة الجنائية الرقمية',
                    'es' => 'Laboratorio de Computación y Forense Digital',
                ],
                'type' => FacilityType::CLASSROOM,
                'description' => [
                    'id' => 'Laboratorium dengan 30 PC workstation spesifikasi tinggi (Core i7, 32GB RAM, SSD NVMe), jaringan LAN gigabit terisolasi, dan lisensi software analitik audit.',
                    'en' => 'Laboratory with 30 high-specification PC workstations (Core i7, 32GB RAM, NVMe SSD), isolated gigabit LAN network, and audit analytic software licenses.',
                    'ar' => 'مختبر يضم 30 محطة عمل كمبيوتر عالية المواصفات وشبكة LAN معزولة وتراخيص برامج التدقيق التحليلي.',
                    'es' => 'Laboratorio con 30 estaciones de trabajo de PC de altas especificaciones, red LAN aislada y licencias de software de auditoría analítica.',
                ],
                'capacity' => 30,
                'price_per_day' => 3000000.00,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Paket Modul Pembelajaran & Panduan Teknis Audit',
                    'en' => 'Learning Module & Technical Audit Guide Package',
                    'ar' => 'حزمة وحدة التعلم ودليل التدقيق الفني',
                    'es' => 'Paquete de Módulo de Aprendizaje y Guía de Auditoría Técnica',
                ],
                'type' => FacilityType::MODULE,
                'description' => [
                    'id' => 'Buku pedoman cetak hardcopy eksklusif, suplemen studi kasus, template kertas kerja audit Excel terstandar BPKP, dan akses flashdisk materi.',
                    'en' => 'Exclusive hardcopy printed manuals, case study supplements, BPKP standardized Excel audit working paper templates, and flash drive access to materials.',
                    'ar' => 'كتيبات مطبوعة حصرية، وملاحق دراسات حالة، وقوالب أوراق عمل التدقيق، ووصول لمحرك أقراص فلاش للمواد.',
                    'es' => 'Manuales impresos exclusivos, suplementos de estudios de caso, plantillas de papel de trabajo de auditoría estandarizadas y acceso a materiales.',
                ],
                'capacity' => null,
                'price_per_day' => 250000.00,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Layanan Catering Prasmanan & 2x Coffee Break VIP',
                    'en' => 'Buffet Catering Service & 2x VIP Coffee Break',
                    'ar' => 'خدمة تقديم الطعام بوفيه ووجبتي استراحة قهوة VIP',
                    'es' => 'Servicio de Catering Buffet y 2x Coffee Break VIP',
                ],
                'type' => FacilityType::CATERING,
                'description' => [
                    'id' => 'Menu makan siang prasmanan nusantara bergizi seimbang, 2 kali rehat kopi/teh beserta aneka kudapan tradisional Yogyakarta.',
                    'en' => 'Nutritionally balanced Indonesian buffet lunch menu, 2 coffee/tea breaks with various traditional Yogyakarta snacks.',
                    'ar' => 'قائمة غداء بوفيه إندونيسية متوازنة غذائيًا، فترتا استراحة لتناول القهوة / الشاي مع العديد من الوجبات الخفيفة التقليدية.',
                    'es' => 'Menú de almuerzo buffet indonesio nutricionalmente equilibrado, 2 pausas para café/té con varios aperitivos tradicionales.',
                ],
                'capacity' => null,
                'price_per_day' => 110000.00,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Kamar Wisma Tamu / Asrama Diklat BPKP (Twin-Bed)',
                    'en' => 'Guest House Room / BPKP Training Dormitory (Twin-Bed)',
                    'ar' => 'غرفة بيت الضيافة / سكن تدريب BPKP (سرير مزدوج)',
                    'es' => 'Habitación de Casa de Huéspedes / Dormitorio de Entrenamiento BPKP (Cama Doble)',
                ],
                'type' => FacilityType::OTHER,
                'description' => [
                    'id' => 'Akomodasi penginapan nyaman ber-AC, 2 tempat tidur single, kamar mandi dalam dengan water heater, smart TV, dan sarapan pagi.',
                    'en' => 'Comfortable air-conditioned lodging accommodation, 2 single beds, en-suite bathroom with water heater, smart TV, and breakfast.',
                    'ar' => 'أماكن إقامة مريحة مكيفة، سريران مفردان، حمام داخلي مع سخان مياه، تلفزيون ذكي، ووجبة إفطار.',
                    'es' => 'Alojamiento cómodo con aire acondicionado, 2 camas individuales, baño privado con calentador de agua, televisión inteligente y desayuno.',
                ],
                'capacity' => 2,
                'price_per_day' => 350000.00,
                'is_active' => true,
            ],
        ];

        foreach ($facilities as $index => $facilityData) {
            $facility = Facility::updateOrCreate(
                ['name->id' => $facilityData['name']['id']],
                $facilityData
            );

            // Seed some dummy photos
            if ($facility->photos()->count() === 0) {
                $facility->photos()->createMany([
                    [
                        'description' => [
                            'id' => 'Tampak Depan',
                            'en' => 'Front View',
                            'ar' => 'منظر أمامي',
                            'es' => 'Vista Frontal',
                        ],
                        'path' => 'facilities/dummy' . ($index + 1) . '_1.jpg',
                        'sort' => 1,
                    ],
                    [
                        'description' => [
                            'id' => 'Tampak Dalam',
                            'en' => 'Inside View',
                            'ar' => 'منظر داخلي',
                            'es' => 'Vista Interior',
                        ],
                        'path' => 'facilities/dummy' . ($index + 1) . '_2.jpg',
                        'sort' => 2,
                    ]
                ]);
            }
        }
    }
}
