<?php

namespace Database\Seeders;

use App\Enums\TrainingStatus;
use App\Enums\TrainingType;
use App\Models\Training;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    public function run(): void
    {
        $trainings = [
            [
                'name' => [
                    'id' => 'Pelatihan Audit Investigatif & Penghitungan Kerugian Keuangan Negara (PKKN)',
                    'en' => 'Investigative Audit & State Financial Loss Calculation Training (PKKN)',
                    'ar' => 'التدريب على التدقيق الاستقصائي وحساب الخسائر المالية للدولة',
                    'es' => 'Entrenamiento en Auditoría Investigativa y Cálculo de Pérdidas Financieras del Estado',
                ],
                'type' => TrainingType::TECHNICAL,
                'description' => [
                    'id' => 'Pelatihan teknis pengumpulan bukti digital dan fisik, wawancara investigatif, serta metodologi perhitungan kerugian keuangan negara sesuai standar audit BPKP.',
                    'en' => 'Technical training on collecting digital and physical evidence, investigative interviews, and state financial loss calculation methodologies according to BPKP audit standards.',
                    'ar' => 'تدريب تقني على جمع الأدلة الرقمية والمادية، المقابلات الاستقصائية، ومنهجيات حساب الخسائر المالية للدولة وفقاً لمعايير التدقيق.',
                    'es' => 'Entrenamiento técnico sobre la recopilación de pruebas digitales y físicas, entrevistas de investigación y metodologías de cálculo de pérdidas financieras del Estado.',
                ],
                'duration_days' => 5,
                'requirements' => [
                    'id' => 'Minimal S1/D4 Akuntansi, Hukum, atau Teknik; Berpengalaman di bidang pengawasan minimal 2 tahun.',
                    'en' => 'Minimum Bachelor degree in Accounting, Law, or Engineering; Minimum 2 years of supervisory experience.',
                    'ar' => 'بكالوريوس على الأقل في المحاسبة أو القانون أو الهندسة؛ خبرة إشرافية لا تقل عن سنتين.',
                    'es' => 'Licenciatura mínima en Contabilidad, Derecho o Ingeniería; Mínimo 2 años de experiencia en el ámbito de supervisión.',
                ],
                'start_date' => '2026-09-01',
                'end_date' => '2026-09-05',
                'location' => 'Gedung Diklat BPKP DIY — Ruang Kelas Malioboro',
                'max_quota' => 30,
                'filled_quota' => 3,
                'status' => TrainingStatus::OPEN,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Pelatihan Penilaian Maturitas Penyelenggaraan SPIP Terintegrasi',
                    'en' => 'Integrated SPIP Maturity Assessment Training',
                    'ar' => 'التدريب على تقييم نضج نظام الرقابة الداخلية الحكومية المتكامل',
                    'es' => 'Entrenamiento de Evaluación de Madurez del SPIP Integrado',
                ],
                'type' => TrainingType::FUNCTIONAL,
                'description' => [
                    'id' => 'Bimbingan teknis implementasi Sistem Pengendalian Intern Pemerintah (SPIP) terintegrasi menuju Level 3/4 bagi APIP dan Satgas OPD.',
                    'en' => 'Technical guidance on the implementation of the integrated Government Internal Control System (SPIP) towards Level 3/4 for APIP and OPD Task Forces.',
                    'ar' => 'التوجيه الفني لتنفيذ نظام الرقابة الداخلية الحكومية المتكامل نحو المستوى 3/4 للمدققين الداخليين.',
                    'es' => 'Orientación técnica sobre la implementación del Sistema de Control Interno Gubernamental integrado hacia el Nivel 3/4.',
                ],
                'duration_days' => 4,
                'requirements' => [
                    'id' => 'Anggota Tim Satgas SPIP atau Pejabat Pengawas Urusan Pemerintahan Daerah.',
                    'en' => 'Members of the SPIP Task Force Team or Local Government Affairs Supervisory Officials.',
                    'ar' => 'أعضاء فريق عمل نظام الرقابة الداخلية أو مسؤولي الرقابة الحكومية المحلية.',
                    'es' => 'Miembros del Equipo de Tareas del SPIP o Funcionarios Supervisores de Asuntos del Gobierno Local.',
                ],
                'start_date' => '2026-09-15',
                'end_date' => '2026-09-18',
                'location' => 'Gedung Diklat BPKP DIY — Ruang Kelas Prambanan',
                'max_quota' => 40,
                'filled_quota' => 40,
                'status' => TrainingStatus::FULL,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Pelatihan Manajemen Risiko Sektor Publik & Good Governance (GRC)',
                    'en' => 'Public Sector Risk Management & Good Governance (GRC) Training',
                    'ar' => 'التدريب على إدارة المخاطر في القطاع العام والحوكمة الرشيدة',
                    'es' => 'Entrenamiento en Gestión de Riesgos del Sector Público y Buen Gobierno',
                ],
                'type' => TrainingType::MANAGERIAL,
                'description' => [
                    'id' => 'Penguatan kapabilitas pimpinan dan administrator instansi dalam identifikasi risiko strategis, mitigasi fraud, dan kepatuhan regulasi.',
                    'en' => 'Strengthening the capabilities of agency leaders and administrators in identifying strategic risks, fraud mitigation, and regulatory compliance.',
                    'ar' => 'تعزيز قدرات قادة المؤسسات في تحديد المخاطر الاستراتيجية، التخفيف من الاحتيال، والامتثال التنظيمي.',
                    'es' => 'Fortalecimiento de las capacidades de los líderes de las agencias en la identificación de riesgos estratégicos, mitigación de fraudes y cumplimiento normativo.',
                ],
                'duration_days' => 3,
                'requirements' => [
                    'id' => 'Pejabat Administrator, Pejabat Pengawas, atau Pimpinan Satker/BLU/BUMD.',
                    'en' => 'Administrator Officials, Supervisory Officials, or Heads of Working Units/BLU/BUMD.',
                    'ar' => 'المسؤولون الإداريون أو المشرفون أو رؤساء وحدات العمل.',
                    'es' => 'Funcionarios Administradores, Funcionarios Supervisores o Jefes de Unidades de Trabajo.',
                ],
                'start_date' => '2026-10-06',
                'end_date' => '2026-10-08',
                'location' => 'Auditorium Merapi BPKP DIY',
                'max_quota' => 50,
                'filled_quota' => 12,
                'status' => TrainingStatus::OPEN,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Pelatihan Teknik Audit Berbantuan Komputer (TABK) dengan Data Analytics',
                    'en' => 'Computer-Assisted Audit Techniques (CAATs) with Data Analytics Training',
                    'ar' => 'التدريب على تقنيات التدقيق بمساعدة الكمبيوتر مع تحليل البيانات',
                    'es' => 'Entrenamiento en Técnicas de Auditoría Asistidas por Computadora con Análisis de Datos',
                ],
                'type' => TrainingType::TECHNICAL,
                'description' => [
                    'id' => 'Pelatihan pengolahan data transaksi skala besar, deteksi anomali anggaran, dan analisis forensik digital menggunakan alat bantu audit modern.',
                    'en' => 'Training on processing large-scale transaction data, detecting budget anomalies, and digital forensic analysis using modern audit tools.',
                    'ar' => 'التدريب على معالجة بيانات المعاملات واسعة النطاق، اكتشاف العيوب في الميزانية، والتحليل الجنائي الرقمي.',
                    'es' => 'Entrenamiento sobre el procesamiento de datos de transacciones a gran escala, detección de anomalías presupuestarias y análisis forense digital.',
                ],
                'duration_days' => 5,
                'requirements' => [
                    'id' => 'Auditor APIP / Internal Auditor BUMD; Membawa laptop RAM minimal 8 GB.',
                    'en' => 'APIP Auditors / BUMD Internal Auditors; Bring a laptop with at least 8 GB RAM.',
                    'ar' => 'مدققي الحسابات الداخليين؛ إحضار كمبيوتر محمول بذاكرة وصول عشوائي لا تقل عن 8 جيجابايت.',
                    'es' => 'Auditores Internos; Traer una computadora portátil con al menos 8 GB de RAM.',
                ],
                'start_date' => '2026-07-20',
                'end_date' => '2026-07-24',
                'location' => 'Laboratorium Komputer BPKP DIY',
                'max_quota' => 25,
                'filled_quota' => 25,
                'status' => TrainingStatus::COMPLETED,
                'is_active' => true,
            ],
            [
                'name' => [
                    'id' => 'Pelatihan Pengawasan Pengadaan Barang & Jasa (PBJ) Pemerintah',
                    'en' => 'Government Procurement Supervision Training',
                    'ar' => 'التدريب على الإشراف على المشتريات الحكومية',
                    'es' => 'Entrenamiento en Supervisión de Contratación Pública',
                ],
                'type' => TrainingType::TECHNICAL,
                'description' => [
                    'id' => 'Probity audit PBJ dari tahap perencanaan, pemilihan penyedia, hingga serah terima hasil pekerjaan konstruksi dan non-konstruksi.',
                    'en' => 'Probity audit of procurement from the planning stage, provider selection, up to the handover of construction and non-construction work results.',
                    'ar' => 'تدقيق النزاهة للمشتريات من مرحلة التخطيط واختيار المزود حتى تسليم نتائج الأعمال الإنشائية وغير الإنشائية.',
                    'es' => 'Auditoría de probidad de compras desde la etapa de planificación, selección de proveedores, hasta la entrega de los resultados del trabajo de construcción y no construcción.',
                ],
                'duration_days' => 4,
                'requirements' => [
                    'id' => 'Memiliki sertifikat Tingkat Dasar PBJ dari LKPP.',
                    'en' => 'Holds a Basic Level Procurement Certificate from LKPP.',
                    'ar' => 'حاصل على شهادة مشتريات المستوى الأساسي.',
                    'es' => 'Posee un Certificado de Contratación de Nivel Básico.',
                ],
                'start_date' => '2026-11-10',
                'end_date' => '2026-11-13',
                'location' => 'Gedung Diklat BPKP DIY — Ruang Borobudur',
                'max_quota' => 35,
                'filled_quota' => 0,
                'status' => TrainingStatus::DRAFT,
                'is_active' => true,
            ],
        ];

        foreach ($trainings as $training) {
            Training::updateOrCreate(
                ['name->id' => $training['name']['id']],
                $training
            );
        }
    }
}
