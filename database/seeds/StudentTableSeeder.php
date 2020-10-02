<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Student;


class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentLists = [
        	array(1, NULL, 'Thiri Myo Paing', 'သီရိမျိုးပိုင်', 'thirimyopainng01@gmail.com', '09964550997', 'H-19 upper paday thar pin road, fmi city, hlaing thar yar', 'Student', 'Yangon', '2020', '2001-12-05', 'female', 'Nang myo min nu', '09421171699', 'Mother', '-', '-', '-', '-', NULL, 21, 29, NULL, '2020-10-01 09:06:55', '2020-10-01 09:06:55'),
			array(2, NULL, 'Thoon Phyu Soe', 'သွန်းဖြူစိုး', 'pearlphyusoe@gmail.com', '09972278304', '139/aungmingalar street/north okkalapa', 'Strategy first university (BIT)', 'Yangon', '2020', '2002-02-08', 'female', 'Daw San San Myint', '09950490656', 'Parent', 'U Than Soe Aung', '+6591052260', 'Parent', 'I really like their teaching method', NULL, 35, 30, NULL, '2020-10-01 09:08:54', '2020-10-01 09:08:54'),
			array(3, NULL, 'Thura Sitt Naing', 'သူရစစ်နိုင်', 'thurasittnaing.ggwpwew@gmail.com', '09789302539', '\"Nay Pyi Taw. Zabuthiri.\r\nAung Zabu Quarter.\r\nMyat Lay Street. No.4/70\"', 'Diploma in Computing lvl 4, 5', 'Nay Pyi Taw', '2020', '0001-01-01', 'male', 'Daw Thein Than Soe', '09448535240', '-', 'U Naing Naing Htun', '09420711508', '-', 'for job and need experience in real time project', NULL, 295, 31, NULL, '2020-10-01 09:12:32', '2020-10-01 09:12:32'),
			array(4, NULL, 'May see sar', 'မေဆည်းဆာ', 'mayseesar979@gmail.com', '09764674688', 'Hlaing, ba yint naung lan ma', 'Final yrs', 'Yangon', '2020', '2001-11-22', 'male', 'Daw hla hla myint', '09782896280', 'Aunty', 'Daw tin tin sein', '09795571758', 'Mother', 'Ko tai project loke chin lox', NULL, 1, 32, NULL, '2020-10-01 09:14:09', '2020-10-01 09:14:09'),
			array(5, NULL, 'Youn Thiri Naing', 'ယွန်းသီရိနိုင်', 'yunthiri1998@gmail.com', '09971657898', 'Myitkyina', 'Student', 'Kachin', '2020', '1998-10-30', 'female', 'Daw Thida Lwin', '09785775567', 'Mother', '-', '-', '-', 'Bootcamp မလို့ပါ', NULL, 140, 33, NULL, '2020-10-01 09:15:50', '2020-10-01 09:15:50'),
			array(6, NULL, 'Thet Zin Nyein', 'သက်ဇင်ညိမ်း', 'maotsemarx1993@gmail.com', '09895754136', '20 Street Bet 63 and 64 Thamasateta Street Mandalay', 'Diploma in Web Development', 'Mandalay', '2020', '1993-05-14', 'male', 'ဟန်နီစုနိုင်', '09975755526', 'Wife', '-', '-', '-', '\"BootCamp ရဲ့ impact ကိုသဘောကျ\r\nselfstudy လုပ်ရင်လိုရင်းမရောက် bootcamp မှာဆို ပိုပီးထိရောက်တယ်လို့ ထင်မိ\"', NULL, 53, 34, NULL, '2020-10-01 09:34:35', '2020-10-01 09:34:35'),
			array(7, NULL, 'Mi Mi Ko', 'မီမီကို', 'mimikoit.11@gmail.com', '09787788471', 'Hpakant, Kachin State', 'BE.IT', 'Kachin', '2020', '1996-11-16', 'female', 'Daw Cho Cho Thin', '09784405865', 'Mother', '-', '-', '-', 'Myanmar IT နဲ့အတူတူ ညီမရဲ့ skill တွေကို မြှင့်တင်နိုင်မယ်ထင်လို့ပါရှင်', NULL, 144, 35, NULL, '2020-10-01 09:36:50', '2020-10-01 09:36:50'),
			array(8, NULL, 'Kyaw Zaw Thu', 'ကျော်ဇော်သူ', 'kyawzawthu00@gmail.com', '0976510386', 'No 21 Mingalar St Sanchaung Tsp', 'BSc Business IT (University of Greenwich) KMD', 'Yangon', '2016', '1996-05-30', 'male', 'U Thet Oo', '09420030298', 'Father', 'kyawt kyawt han', '095193940', 'Mother', 'found on FB', NULL, 18, 36, NULL, '2020-10-01 09:39:12', '2020-10-01 09:39:12'),
			array(9, NULL, 'Htet Zayar', 'ထက်ဇေယျာ', 'kmonkey824@gmail.com', '09776095077', 'No.(357),Thamadi Street,8 wards,Mayangone,Yangone', '3rd year at University of Computer Studies,Yangon', 'Yangon', '2020', '2001-03-31', 'male', 'Oo Khin Maung Kyaw', '09423754920', 'Father', 'Daw Aye Aye Khine', '09453279476', 'Mother', 'I want to experience bootcamp experience.Unfortunately I can’t.But I think this might be my first step for becoming web developer....', NULL, 4, 37, NULL, '2020-10-01 09:40:47', '2020-10-01 09:40:47'),
			array(10, NULL, 'Khin Linn Thu', 'ခင်လင်းသူ', 'khinlinthu007@gmail.com', '09422213057', 'No(156), Padamyar Street,  Baho Road, Kamaryut.', 'BE(EC) Myeik', 'Yangon', '2019', '1996-06-21', 'female', 'U Kyu Shein', '09422217026', 'Father', 'Daw Nwe Nwe Aye', 'Daw Nwe Nwe Aye', 'Mother', '-', NULL, 12, 38, NULL, '2020-10-01 09:47:26', '2020-10-01 09:47:26'),
			array(11, NULL, 'Zaw Zaw Win', 'ဇော် ဇော် ၀င်း', 'zawzawwinucsl@gmail.com', '09951613400', 'Phyu township,Bago Division', 'University of Computer Studies,Loikaw', 'Bago', '2020', '2020-09-06', 'male', 'Thein Sein', '097669328', 'Parent', '-', '-', '-', '-', NULL, 113, 39, NULL, '2020-10-01 09:49:15', '2020-10-01 09:49:15'),
			array(12, NULL, 'Myat Noe Thu', 'မြတ်နိုးသူ', 'myatnoethu2801@gmail.com', '09454821554', 'Pinlaung, Shan State', 'Level 5 Diaploma in Computing', 'Shan', '2019', '2001-08-02', 'female', 'Daw Nilar', '09262695369', 'Mother', 'U Myo Min Oo', '09448540899', 'Father', 'သင်တန်းသင်တဲ့ အချိန်လည်း တစ်ရက်ကို အချိန်အများကြီးသင်ပြီး သင်တန်းကာလလည်း သိပ်မကြာပဲတဲ့ သင်တန်းဖြစ်ပြီး သင်တန်းပြီးတာနဲ့ အလုပ်ရှာပေးတယ်ဆိုလို့ပါ', NULL, 295, 40, NULL, '2020-10-01 09:52:55', '2020-10-01 09:52:55'),
			array(13, NULL, 'Thu Zar Aung', 'သူဇာအောင်', 'thuzar351996@gmail.com', '09250772846', 'No.156, Padamyar Street, Kamaryut Township, Yangon', 'BE(Electronic) Myeik', 'Yangon', '2019', '1996-05-03', 'female', 'U Aye Myint', '09777093377', 'Uncle', 'Daw Shin Yee', '09422193109', 'Aunt', 'Bootcampသင်တန်းဖြစ်တာကြောင့်စာတွေဖိဖိစီးစီးသင်ရမှာရယ် projectတွေရေးရမှာကြောင့်ကိုယ့်ကိုကိုယ်ယုံကြည်မှုရှိလာမှာရယ် အလုပ်ရှာပေးမှာရယ်ကြောင့်ပါ', NULL, 12, 41, NULL, '2020-10-01 09:55:00', '2020-10-01 09:55:00'),
			array(14, NULL, 'Kyaw Zin Win', 'ကျော်ဇင်၀င်း', 'kyawzinwin.beec@gmail.com', '09252676345', '82 Street Between 29x30', 'BE EC (Technological Universiyt)', 'Mandalay', '2015', '1995-03-28', 'male', 'U Aung Win', '0969-956677', '-', '-', '-', '-', 'အတွေ့အကြုံတွေအများကြီးရပြီး။ အလုပ်ရအောင် ကူညီပေးမယ်တင်လို့ပါဗျ', NULL, 49, 42, NULL, '2020-10-01 09:58:07', '2020-10-01 09:58:07'),
			array(15, NULL, 'Hein Htet Zaw', 'ဟိန်းထက်ဇော်', 'name.nm663@gmail.com', '09698006087', 'No(5),Aung ThaPyay Street,Warso,Dawbon Township.', 'KMD Diploma', 'Yangon', '2020', '1997-10-27', 'male', 'Daw Thin Thin Shwe', '09954377614', '-', '-', '-', '-', '-', NULL, 33, 43, NULL, '2020-10-01 09:59:38', '2020-10-01 09:59:38'),
			array(16, NULL, 'Kyi Kyi Swe', 'ကြည်ကြည်ဆွေ', 'kyikyiswe688@gmail.com', '09769506744', 'Mandalay', 'B.C.Sc (Computer University,Banmaw)', 'Mandalay', '2016', '1995-11-13', 'female', 'U San Lwin', '09951099650', 'Father', 'Daw Wine Kyi', '09951099650', 'Mother', 'I love it', NULL, 47, 44, NULL, '2020-10-01 10:04:01', '2020-10-01 10:04:01'),
			array(17, NULL, 'Khin Sandar Soe', 'မခင်စန္ဒာစိုး', 'khinsandarsoe04@gmail.com', '09253237634', 'No.12,4A,ကျောက်မြောင်းလမ်း,တာမွေမြို့နယ်။', 'TTU-IT (final year) Thanlyin', 'Yangon', '2020', '1998-03-17', 'female', 'U Aung Mya Thar', '09445151431', 'Father', 'Daw Mya Mya Than', '09250001579', 'Mother', 'သင်တန်းပီးရင် job or internship program ရှာပေးတာကို သဘောကျလို့ပါ', NULL, 3, 45, NULL, '2020-10-01 10:05:41', '2020-10-01 10:05:41'),
			array(18, NULL, 'Thant Mon Naing', 'သန့်မွန်နိုင်', 'thantmonnaing@gmail.com', '09793449588', 'No 8,  1st floor , MeYaHtar Building 2, Front of Ahlone Market , NguWar Street , Ahlone Township,Yangon.', 'B.C.Sc Thaton', 'Yangon', '2015', '1995-08-11', 'female', 'Saw Kyi Aye', '09255915166', 'Mother', 'Saw Ri Mon Naing', '09255798365', 'Sister', '\"လုပ်ငန်းခွင်နဲ့ သင့်လျော်တဲ့ အရာတွေကို\r\nသင်ကြားပေးနိုင်တယ်ထင်လို့\"', NULL, 9, 46, NULL, '2020-10-01 10:07:00', '2020-10-01 10:07:00'),
			array(19, NULL, 'Poe Thiri Htun', 'ပိုးသီရိထွန်း', 'poethiri1112@gmail.com', '09789802133', 'HlaingTownship, Yangon', 'B. C. Sc', 'Yangon', '2020', '1997-11-12', 'female', 'U Than Tun Gyi', '09 788038566', 'Father', 'Saw Po Po San', '09 788038566', 'Mother', 'I believe that this course improve my life and career.', NULL, 1, 47, NULL, '2020-10-01 10:08:30', '2020-10-01 10:08:30'),
			array(20, NULL, 'Aung Khant Kyaw', 'အောင်ခန့်ကျော်', 'mr.aungkhantkyaw2001@gmail.com', '09976505982', 'No(18).TAMWE ,mahla gone street,kyauk myoung', 'KMD diploma', 'Yangon', '2020', '2001-08-19', 'male', 'U Kyaw Kyaw Naing', '09956760091', 'Father', 'Daw Thida Aye', '09779255322', 'Mother', 'အသင်အပြကောင်းမွန်ခြင်းနှင့်သင်တန်းကာလပီးဆုံးပါကအလုပ်အကိုင်အခွင့်လမ်းများရှာပေးမည်ဆိုသောကြောင့်', NULL, 3, 48, NULL, '2020-10-01 10:10:23', '2020-10-01 10:10:23'),
			array(21, NULL, 'Hein Min Htet', 'ဟိန်းမင်းထက်', 'bolheinmin@gmail.com', '09761867358', 'Naypyitaw, Lewe, Ela', 'BSc (Hons) Computing (University of Greenwich)', 'Nay Pyi Taw', '2020', '2020-04-28', 'male', 'U Khin Maung Lwin', '0943019360', '-', '-', '-', '-', 'To get junior web developer experience.', NULL, 293, 49, NULL, '2020-10-01 10:11:42', '2020-10-01 10:11:42'),
			array(22, NULL, 'Rumar Dawi', 'ရူမားဒေဝီ', 'rumardawi1@gmail.com', '09259173954', 'Mogok', 'Bachelor of Engineering (EC) Sagaing', 'Mandalay', '2015', '1992-04-17', 'female', 'Ko Kyaw Thein', '09780005407', 'Uncel', 'Daw Isha', '09754591265', 'Elder Sister', 'သင်တန်းကောင်းတာလေး ရှာဖွေရင်း Bootcamp အစီအစဉ်ကိုစိတ်၀င်စား သဘောကျခဲ့လို့ပါ။ Mentors တွေ ဆွေးနွေးဖို့ရှိ‌ေနတာကိုလဲ သဘောကျ ပါတယ်။', NULL, 55, 50, NULL, '2020-10-01 10:13:26', '2020-10-01 10:13:26')
        ];

        foreach($studentLists as $studentList){

        	$user = new User;
		    $user->name = $studentList[2];
		    $user->email= $studentList[4];
		    $user->password=Hash::make("123456789");
		    $user->save();

		    $user->assignRole('Student');
		    $id = $user->id;

		    $student = new Student;
		    $student->namee = $studentList[2];
		    $student->namem = $studentList[3];
		    $student->email = $studentList[4];
		    $student->phone = $studentList[5];
		    $student->address = $studentList[6];
		    $student->degree = $studentList[7];
		    $student->city = $studentList[8];
		    $student->accepted_year = $studentList[9];
		    $student->dob = $studentList[10];
		    $student->gender = $studentList[11];
		    $student->p1 = $studentList[12];
		    $student->p1_phone = $studentList[13];
		    $student->p1_relationship = $studentList[14];
		    $student->p2 = $studentList[15];
		    $student->p2_phone = $studentList[16];
		    $student->p2_relationship = $studentList[17];
		    $student->because = $studentList[18];
		    $student->township_id = $studentList[20];
		    $student->user_id = $id;
		    $student->save();
        }

        $studentsubjectLists = [
        	array(1, 2, 2),
			array(2, 3, 2),
			array(3, 4, 2),
			array(4, 6, 2),
			array(5, 2, 3),
			array(6, 3, 3),
			array(7, 4, 3),
			array(8, 5, 3),
			array(9, 6, 3),
			array(10, 10, 3),
			array(11, 24, 3),
			array(12, 2, 5),
			array(13, 3, 5),
			array(14, 6, 5),
			array(15, 2, 6),
			array(16, 3, 6),
			array(17, 6, 6),
			array(18, 18, 6),
			array(19, 2, 7),
			array(20, 3, 7),
			array(21, 4, 7),
			array(22, 5, 7),
			array(23, 6, 7),
			array(24, 18, 7),
			array(25, 24, 7),
			array(26, 2, 8),
			array(27, 3, 8),
			array(28, 4, 8),
			array(29, 6, 8),
			array(30, 2, 9),
			array(31, 3, 9),
			array(32, 4, 9),
			array(33, 18, 9),
			array(34, 18, 9),
			array(35, 2, 10),
			array(36, 3, 10),
			array(37, 4, 10),
			array(38, 5, 10),
			array(39, 18, 10),
			array(40, 2, 11),
			array(41, 3, 11),
			array(42, 4, 11),
			array(43, 5, 11),
			array(44, 6, 11),
			array(45, 18, 11),
			array(46, 2, 12),
			array(47, 3, 12),
			array(48, 4, 12),
			array(49, 5, 12),
			array(50, 6, 12),
			array(51, 10, 12),
			array(52, 18, 12),
			array(53, 2, 13),
			array(54, 3, 13),
			array(55, 4, 13),
			array(56, 5, 13),
			array(57, 18, 13),
			array(58, 2, 14),
			array(59, 3, 14),
			array(60, 4, 14),
			array(61, 5, 14),
			array(62, 6, 14),
			array(63, 24, 14),
			array(64, 2, 15),
			array(65, 3, 15),
			array(66, 4, 15),
			array(67, 5, 15),
			array(68, 2, 16),
			array(69, 3, 16),
			array(70, 4, 16),
			array(71, 18, 16),
			array(72, 18, 16),
			array(73, 2, 17),
			array(74, 3, 17),
			array(75, 4, 17),
			array(76, 5, 17),
			array(77, 6, 17),
			array(78, 10, 17),
			array(79, 18, 17),
			array(80, 19, 17),
			array(81, 2, 18),
			array(82, 3, 18),
			array(83, 2, 19),
			array(84, 3, 19),
			array(85, 4, 19),
			array(86, 5, 19),
			array(87, 6, 19),
			array(88, 19, 19),
			array(89, 2, 20),
			array(90, 2, 21),
			array(91, 3, 21),
			array(92, 6, 21),
			array(93, 2, 22),
			array(94, 3, 22)
        ];

        foreach ($studentsubjectLists as $studentsubjectList) {
	        DB::table('student_subject')->insert([
	            'subject_id' => $studentsubjectList[1],
	            'student_id' => $studentsubjectList[2]
	        ]);
        }

        $batchstudentLists = [
        	array(1, '2909200002111001', 'Active', 1, 1, '2020-10-01 09:06:55', '2020-10-01 09:06:55'),
			array(2, '2909200002111002', 'Active', 1, 2, '2020-10-01 09:08:54', '2020-10-01 09:08:54'),
			array(3, '2909200002111003', 'Active', 1, 3, '2020-10-01 09:12:32', '2020-10-01 09:12:32'),
			array(4, '2909200002111004', 'Active', 1, 4, '2020-10-01 09:14:09', '2020-10-01 09:14:09'),
			array(5, '2909200002111005', 'Active', 1, 5, '2020-10-01 09:15:50', '2020-10-01 09:15:50'),
			array(6, '2909200002111006', 'Active', 1, 6, '2020-10-01 09:34:35', '2020-10-01 09:34:35'),
			array(7, '2909200002111007', 'Active', 1, 7, '2020-10-01 09:36:50', '2020-10-01 09:36:50'),
			array(8, '2909200002111008', 'Active', 1, 8, '2020-10-01 09:39:12', '2020-10-01 09:39:12'),
			array(9, '2909200002111009', 'Active', 1, 9, '2020-10-01 09:40:47', '2020-10-01 09:40:47'),
			array(10, '2909200002111010', 'Active', 1, 10, '2020-10-01 09:47:26', '2020-10-01 09:47:26'),
			array(11, '2909200002111011', 'Active', 1, 11, '2020-10-01 09:49:15', '2020-10-01 09:49:15'),
			array(12, '2909200002111012', 'Active', 1, 12, '2020-10-01 09:52:55', '2020-10-01 09:52:55'),
			array(13, '2909200002111013', 'Active', 1, 13, '2020-10-01 09:55:00', '2020-10-01 09:55:00'),
			array(14, '2909200002111014', 'Active', 1, 14, '2020-10-01 09:58:07', '2020-10-01 09:58:07'),
			array(15, '2909200002111015', 'Active', 1, 15, '2020-10-01 09:59:38', '2020-10-01 09:59:38'),
			array(16, '2909200002111016', 'Active', 1, 16, '2020-10-01 10:04:01', '2020-10-01 10:04:01'),
			array(17, '2909200002111017', 'Active', 1, 17, '2020-10-01 10:05:41', '2020-10-01 10:05:41'),
			array(18, '2909200002111018', 'Active', 1, 18, '2020-10-01 10:07:00', '2020-10-01 10:07:00'),
			array(19, '2909200002111019', 'Active', 1, 19, '2020-10-01 10:08:30', '2020-10-01 10:08:30'),
			array(20, '2909200002111020', 'Active', 1, 20, '2020-10-01 10:10:23', '2020-10-01 10:10:23'),
			array(21, '2909200002111021', 'Active', 1, 21, '2020-10-01 10:11:42', '2020-10-01 10:11:42'),
			array(22, '2909200002111022', 'Active', 1, 22, '2020-10-01 10:13:26', '2020-10-01 10:13:26')
        ];

        foreach ($batchstudentLists as $batchstudentList) {
	        DB::table('batch_student')->insert([
	            'receiveno' => $batchstudentList[1],
	            'status' => $batchstudentList[2],
	            'batch_id' => $batchstudentList[3],
	            'student_id' => $batchstudentList[4],

	        ]);
        }

    }
}
