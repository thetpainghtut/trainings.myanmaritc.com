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
        	array(1, NULL, 'Thiri Myo Paing', 'သီရိမျိုးပိုင်', 'thirimyopainng01@gmail.com', '09964550997', 'H-19 upper paday thar pin road, fmi city, hlaing thar yar', 'Student', 'Yangon', '2020', '2001-12-05', 'female', 'Nang myo min nu', '09421171699', 'Mother', '-', '-', '-', '-', NULL, 21, 29, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(2, NULL, 'Thoon Phyu Soe', 'သွန်းဖြူစိုး', 'pearlphyusoe@gmail.com', '09972278304', '139/aungmingalar street/north okkalapa', 'Strategy first university (BIT)', 'Yangon', '2020', '2002-02-08', 'female', 'Daw San San Myint', '09950490656', 'Parent', 'U Than Soe Aung', '+6591052260', 'Parent', 'I really like their teaching method', NULL, 35, 30, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(3, NULL, 'Thura Sitt Naing', 'သူရစစ်နိုင်', 'thurasittnaing.ggwpwew@gmail.com', '09789302539', '\\\"Nay Pyi Taw. Zabuthiri.\\r\\nAung Zabu Quarter.\\r\\nMyat Lay Street. No.4/70\\\"', 'Diploma in Computing lvl 4, 5', 'Nay Pyi Taw', '2020', '0001-01-01', 'male', 'Daw Thein Than Soe', '09448535240', '-', 'U Naing Naing Htun', '09420711508', '-', 'for job and need experience in real time project', NULL, 295, 31, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(4, NULL, 'May see sar', 'မေဆည်းဆာ', 'mayseesar979@gmail.com', '09764674688', 'Hlaing, ba yint naung lan ma', 'Final yrs', 'Yangon', '2020', '2001-11-22', 'male', 'Daw hla hla myint', '09782896280', 'Aunty', 'Daw tin tin sein', '09795571758', 'Mother', 'Ko tai project loke chin lox', NULL, 1, 32, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(5, NULL, 'Youn Thiri Naing', 'ယွန်းသီရိနိုင်', 'yunthiri1998@gmail.com', '09971657898', 'Myitkyina', 'Student', 'Kachin', '2020', '1998-10-30', 'female', 'Daw Thida Lwin', '09785775567', 'Mother', '-', '-', '-', 'Bootcamp မလို့ပါ', NULL, 140, 33, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(6, NULL, 'Thet Zin Nyein', 'သက်ဇင်ညိမ်း', 'maotsemarx1993@gmail.com', '09895754136', '20 Street Bet 63 and 64 Thamasateta Street Mandalay', 'Diploma in Web Development', 'Mandalay', '2020', '1993-05-14', 'male', 'ဟန်နီစုနိုင်', '09975755526', 'Wife', '-', '-', '-', '\\\"BootCamp ရဲ့ impact ကိုသဘောကျ\\r\\nselfstudy လုပ်ရင်လိုရင်းမရောက် bootcamp မှာဆို ပိုပီးထိရောက်တယ်လို့ ထင်မိ\\\"', NULL, 53, 34, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(7, NULL, 'Mi Mi Ko', 'မီမီကို', 'mimikoit.11@gmail.com', '09787788471', 'Hpakant, Kachin State', 'BE.IT', 'Kachin', '2020', '1996-11-16', 'female', 'Daw Cho Cho Thin', '09784405865', 'Mother', '-', '-', '-', 'Myanmar IT နဲ့အတူတူ ညီမရဲ့ skill တွေကို မြှင့်တင်နိုင်မယ်ထင်လို့ပါရှင်', NULL, 144, 35, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(8, NULL, 'Kyaw Zaw Thu', 'ကျော်ဇော်သူ', 'kyawzawthu00@gmail.com', '0976510386', 'No 21 Mingalar St Sanchaung Tsp', 'BSc Business IT (University of Greenwich) KMD', 'Yangon', '2016', '1996-05-30', 'male', 'U Thet Oo', '09420030298', 'Father', 'kyawt kyawt han', '095193940', 'Mother', 'found on FB', NULL, 18, 36, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(9, NULL, 'Htet Zayar', 'ထက်ဇေယျာ', 'kmonkey824@gmail.com', '09776095077', 'No.(357),Thamadi Street,8 wards,Mayangone,Yangone', '3rd year at University of Computer Studies,Yangon', 'Yangon', '2020', '2001-03-31', 'male', 'Oo Khin Maung Kyaw', '09423754920', 'Father', 'Daw Aye Aye Khine', '09453279476', 'Mother', 'I want to experience bootcamp experience.Unfortunately I can’t.But I think this might be my first step for becoming web developer....', NULL, 4, 37, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(10, NULL, 'Khin Linn Thu', 'ခင်လင်းသူ', 'khinlinthu007@gmail.com', '09422213057', 'No(156), Padamyar Street,  Baho Road, Kamaryut.', 'BE(EC) Myeik', 'Yangon', '2019', '1996-06-21', 'female', 'U Kyu Shein', '09422217026', 'Father', 'Daw Nwe Nwe Aye', 'Daw Nwe Nwe Aye', 'Mother', '-', NULL, 12, 38, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(11, NULL, 'Zaw Zaw Win', 'ဇော် ဇော် ၀င်း', 'zawzawwinucsl@gmail.com', '09951613400', 'Phyu township,Bago Division', 'University of Computer Studies,Loikaw', 'Bago', '2020', '2020-09-06', 'male', 'Thein Sein', '097669328', 'Parent', '-', '-', '-', '-', NULL, 113, 39, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(12, NULL, 'Myat Noe Thu', 'မြတ်နိုးသူ', 'myatnoethu2801@gmail.com', '09454821554', 'Pinlaung, Shan State', 'Level 5 Diaploma in Computing', 'Shan', '2019', '2001-08-02', 'female', 'Daw Nilar', '09262695369', 'Mother', 'U Myo Min Oo', '09448540899', 'Father', 'သင်တန်းသင်တဲ့ အချိန်လည်း တစ်ရက်ကို အချိန်အများကြီးသင်ပြီး သင်တန်းကာလလည်း သိပ်မကြာပဲတဲ့ သင်တန်းဖြစ်ပြီး သင်တန်းပြီးတာနဲ့ အလုပ်ရှာပေးတယ်ဆိုလို့ပါ', NULL, 295, 40, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(13, NULL, 'Thu Zar Aung', 'သူဇာအောင်', 'thuzar351996@gmail.com', '09250772846', 'No.156, Padamyar Street, Kamaryut Township, Yangon', 'BE(Electronic) Myeik', 'Yangon', '2019', '1996-05-03', 'female', 'U Aye Myint', '09777093377', 'Uncle', 'Daw Shin Yee', '09422193109', 'Aunt', 'Bootcampသင်တန်းဖြစ်တာကြောင့်စာတွေဖိဖိစီးစီးသင်ရမှာရယ် projectတွေရေးရမှာကြောင့်ကိုယ့်ကိုကိုယ်ယုံကြည်မှုရှိလာမှာရယ် အလုပ်ရှာပေးမှာရယ်ကြောင့်ပါ', NULL, 12, 41, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(14, NULL, 'Kyaw Zin Win', 'ကျော်ဇင်၀င်း', 'kyawzinwin.beec@gmail.com', '09252676345', '82 Street Between 29x30', 'BE EC (Technological Universiyt)', 'Mandalay', '2015', '1995-03-28', 'male', 'U Aung Win', '0969-956677', '-', '-', '-', '-', 'အတွေ့အကြုံတွေအများကြီးရပြီး။ အလုပ်ရအောင် ကူညီပေးမယ်တင်လို့ပါဗျ', NULL, 49, 42, NULL, '2020-10-02 18:54:35', '2020-10-02 18:54:35'),
			array(15, NULL, 'Hein Htet Zaw', 'ဟိန်းထက်ဇော်', 'name.nm663@gmail.com', '09698006087', 'No(5),Aung ThaPyay Street,Warso,Dawbon Township.', 'KMD Diploma', 'Yangon', '2020', '1997-10-27', 'male', 'Daw Thin Thin Shwe', '09954377614', '-', '-', '-', '-', '-', NULL, 33, 43, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(16, NULL, 'Kyi Kyi Swe', 'ကြည်ကြည်ဆွေ', 'kyikyiswe688@gmail.com', '09769506744', 'Mandalay', 'B.C.Sc (Computer University,Banmaw)', 'Mandalay', '2016', '1995-11-13', 'female', 'U San Lwin', '09951099650', 'Father', 'Daw Wine Kyi', '09951099650', 'Mother', 'I love it', NULL, 47, 44, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(17, NULL, 'Khin Sandar Soe', 'မခင်စန္ဒာစိုး', 'khinsandarsoe04@gmail.com', '09253237634', 'No.12,4A,ကျောက်မြောင်းလမ်း,တာမွေမြို့နယ်။', 'TTU-IT (final year) Thanlyin', 'Yangon', '2020', '1998-03-17', 'female', 'U Aung Mya Thar', '09445151431', 'Father', 'Daw Mya Mya Than', '09250001579', 'Mother', 'သင်တန်းပီးရင် job or internship program ရှာပေးတာကို သဘောကျလို့ပါ', NULL, 3, 45, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(18, NULL, 'Thant Mon Naing', 'သန့်မွန်နိုင်', 'thantmonnaing@gmail.com', '09793449588', 'No 8,  1st floor , MeYaHtar Building 2, Front of Ahlone Market , NguWar Street , Ahlone Township,Yangon.', 'B.C.Sc Thaton', 'Yangon', '2015', '1995-08-11', 'female', 'Saw Kyi Aye', '09255915166', 'Mother', 'Saw Ri Mon Naing', '09255798365', 'Sister', '\\\"လုပ်ငန်းခွင်နဲ့ သင့်လျော်တဲ့ အရာတွေကို\\r\\nသင်ကြားပေးနိုင်တယ်ထင်လို့\\\"', NULL, 9, 46, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(19, NULL, 'Poe Thiri Htun', 'ပိုးသီရိထွန်း', 'poethiri1112@gmail.com', '09789802133', 'HlaingTownship, Yangon', 'B. C. Sc', 'Yangon', '2020', '1997-11-12', 'female', 'U Than Tun Gyi', '09 788038566', 'Father', 'Saw Po Po San', '09 788038566', 'Mother', 'I believe that this course improve my life and career.', NULL, 1, 47, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(20, NULL, 'Aung Khant Kyaw', 'အောင်ခန့်ကျော်', 'mr.aungkhantkyaw2001@gmail.com', '09976505982', 'No(18).TAMWE ,mahla gone street,kyauk myoung', 'KMD diploma', 'Yangon', '2020', '2001-08-19', 'male', 'U Kyaw Kyaw Naing', '09956760091', 'Father', 'Daw Thida Aye', '09779255322', 'Mother', 'အသင်အပြကောင်းမွန်ခြင်းနှင့်သင်တန်းကာလပီးဆုံးပါကအလုပ်အကိုင်အခွင့်လမ်းများရှာပေးမည်ဆိုသောကြောင့်', NULL, 3, 48, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(21, NULL, 'Hein Min Htet', 'ဟိန်းမင်းထက်', 'bolheinmin@gmail.com', '09761867358', 'Naypyitaw, Lewe, Ela', 'BSc (Hons) Computing (University of Greenwich)', 'Nay Pyi Taw', '2020', '2020-04-28', 'male', 'U Khin Maung Lwin', '0943019360', '-', '-', '-', '-', 'To get junior web developer experience.', NULL, 293, 49, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(22, NULL, 'Rumar Dawi', 'ရူမားဒေဝီ', 'rumardawi1@gmail.com', '09259173954', 'Mogok', 'Bachelor of Engineering (EC) Sagaing', 'Mandalay', '2015', '1992-04-17', 'female', 'Ko Kyaw Thein', '09780005407', 'Uncel', 'Daw Isha', '09754591265', 'Elder Sister', 'သင်တန်းကောင်းတာလေး ရှာဖွေရင်း Bootcamp အစီအစဉ်ကိုစိတ်၀င်စား သဘောကျခဲ့လို့ပါ။ Mentors တွေ ဆွေးနွေးဖို့ရှိ‌ေနတာကိုလဲ သဘောကျ ပါတယ်။', NULL, 55, 50, NULL, '2020-10-02 18:54:36', '2020-10-02 18:54:36'),
			array(23, NULL, 'Phone Myint Thaw', 'ဖုန်းမြင့်သော်', 'phonemyintthaw17@gmail.com', '09796907817', '10th street, 13 quarter, Thiri Mying, Hlaing', 'BE(Mechatronic)', 'Yangon', '2019', '1995-08-31', 'male', 'U Khin Maung Myint', '09401633875', 'Father', 'Daw Aye Than', '09401633875', 'Mother', 'မြန်မြန်ဆန်ဆန် နဲ့ IT field ထဲဝင်နိုင်မယ်ထင်လို့ပါ.', NULL, 1, 51, NULL, '2020-10-02 19:00:42', '2020-10-02 19:00:42'),
			array(24, NULL, 'Cho Mi Mi Tun', 'ချိုမီမီထွန်း', 'chomimi.16@gmail.com', '09262077380', 'Shwe Laung Street, San Chaung Township, Yangon.', 'Diploma in IT, B.A (English)', 'Yangon', '2015', '1994-05-18', 'female', 'U Nay Tun', '09441269279', 'Father', 'Cho Thandar Tun', '09459831687', 'Sister', 'Project များလုပ်ရခြင်းနှင့် အလုပ်ရှာပေးခြင်း', NULL, 18, 52, NULL, '2020-10-02 19:05:43', '2020-10-02 19:05:43'),
			array(25, NULL, 'Moe Thazin Aung', 'မိုးသဇင်အောင်', 'moethazinaung4368@gmail.com', '09250464368', 'No(621),Kayutpyin Ta,Str 4,Dawei', 'B.C.Sc  MCSC (physis )', 'Tanintharyi', '2018', '1997-05-08', 'female', 'U Thein Win', '09429851677', 'Father', 'Daw San San Aye', '09250612546', 'Mother', 'အချိန်တိုအတွင်း ထိရောက်မှုရှိပီး လုပ်ငန်းခွင်ဝင်ဖို့ ယုံကြည်မှုတစ်ခု ရချင်လို့ ရွေးချယ်ဖြစ်တာပါ', NULL, 277, 53, NULL, '2020-10-02 19:08:58', '2020-10-02 19:08:58'),
			array(26, NULL, 'May Thazin', 'မေသဇင်', 'maythazin25july@gmail.com', '09786161601', 'Ya/609, Kyan Khaing Yae St, Yadanar Thiri Qt, Taunggyi', 'B.E(EC)', 'Shan', '2018', '1996-05-25', 'female', 'U Maung Myint', '09789772891', 'Father', 'Daw Aye Aye Mon', '09459973090', 'Mother', 'We can study in a short time and can get job opportunity.', NULL, 225, 54, NULL, '2020-10-02 19:10:47', '2020-10-02 19:10:47'),
			array(27, NULL, 'Wanna Min Paing', 'ဝဏ္ဏမင်းပိုင်', 'paingwanna@gmail.com', '09799703132', 'No 467(B) Aung thu ka Street. 8 group Hlaing that Yar. Yangon', 'UCSH (Fourth year)', 'Yangon', '2020', '1999-04-21', 'male', 'Daw Thida', '09450998014', 'Mother', 'U Zaw Htet Aung', '09444773205', 'Father', 'တစ်ရက်မှာ ငါးရက်သင်ပီး တစ်ရက်မှာလဲ အခြား သင်တန်းတွေလို နှစ်နာရီ သုံးနာရီ လောက် မသင်ဘဲ အချိန်ပြည့်သင်တာ ကြိုက်လို့  အလုပ်လဲ ရှာပေးတော့ ပို အဆင်ပြေတာပေါ့', NULL, 20, 55, NULL, '2020-10-02 19:12:32', '2020-10-02 19:12:32'),
			array(28, NULL, 'Aung Khant Kyaw', 'အောင်ခန့်ကျော်', '1122aungkhant@gmail.com', '09251569702', 'Yangon', 'KMD(Diploma in Web Development)', 'Yangon', '2020', '2002-12-01', 'male', 'Kyaw Thura', '09675848600', 'son', 'Ei Pa Pa Soe', '09425012832', 'son', '-', NULL, 1, 56, NULL, '2020-10-02 19:15:29', '2020-10-02 19:15:29'),
			array(29, NULL, 'Myo Htet', 'မျိုးထက်', 'myohtetizeverking@gmail.com', '095051302', '2/32(A) Mayangone Township, Kyite Wine Pagoda Road, Thar Yar Aye Road (2).', 'Diploma in Computer Science (Gusto University 2nd Year)', 'Yangon', '2020', '2000-03-21', 'male', 'Daw Tin Thet Oo', '095015845', 'Mother', '-', '-', '-', 'I choose Myanmar IT Consulting because I know that they are not only teaching PHP programming language well for web developer course but also searching the jobs for their students.', NULL, 4, 57, NULL, '2020-10-02 19:17:23', '2020-10-02 19:17:23'),
			array(30, NULL, 'Yadanar Hlaing', 'ရတနာလှိုင်', 'yadanarhlaing2932000@gmail.com', '09968670885', 'mama -16, CHAUNG Oo township,  Monywa District,  Sagaing Division', 'MIIT,  4th years', 'Sagaing', '2020', '2000-03-29', 'female', 'Daw Aye Aye Hlaing', '9963130002', 'Mother', 'U Kyaw Sein', '09963130001', 'Father', 'Because of good reviews', NULL, 258, 58, NULL, '2020-10-02 19:18:54', '2020-10-02 19:18:54'),
			array(31, NULL, 'Aung Htun Win', 'အောင်ထွန်း၀င်း', 'aungtunwin538@gmail.com', '09772320874', 'No.332/402, Near Ywama Bustop,Bayint Naung Street,Hlaing Township,Yangon', 'BE-EC(University of Technology Yatanarpon Cyber City)', 'Yangon', '2020', '1997-04-05', 'male', 'U Aung Hla Win', '09456575185', 'Father', 'Daw Paung Yin', '09760535006', 'Mother', 'Boot camp....I love it..', NULL, 1, 59, NULL, '2020-10-02 19:20:23', '2020-10-02 19:20:23'),
			array(32, NULL, 'Min Hein Khant', 'မင်းဟိန်းခန့်', 'mgminheinkhant113@gmail.com', '09690807688', '\"၂၉၄/ခ Tadarphyu /Hlaing Thar Yar/\r\nYangon \"', 'University of computer studies Hinthada', 'Yangon', '2020', '2002-06-30', 'male', 'Daw Tin Sein', '09778003027', 'Grandson', 'U Tin Myint', '09778003027', 'Grandson', '\"1 week 3 days 1 day 2hours 3 monthsမသင်ပဲ\r\n1 day 9hours to 3 hoursသင်ပြီးထိထိရောက်ရောက်ပိုလေ့လာနိုင်လို့ွေရွးချယ်ခဲ့တာပါ🥰\"', NULL, 20, 60, NULL, '2020-10-02 19:23:30', '2020-10-02 19:23:30'),
			array(33, NULL, 'Kaung Kyaw Htin', 'ကောင်းကျော်ထင်', 'kgkyawhtin539@gmail.com', '09764778927', 'Bago Division,Yedashe Township,Yeni.', 'Medicine ( third year )', 'Bago', '2020', '1999-06-07', 'male', 'U Khin Mg Htwe', '09787026397', 'Father', 'Daw Nilar Khaing', '09799165613', 'Mother', 'ယုံကြည်စိတ်ချရတယ်ထင်လို့ပါ', NULL, 114, 61, NULL, '2020-10-02 19:25:08', '2020-10-02 19:25:08'),
			array(34, NULL, 'Nay Aung Win', 'နေအောင်ဝင်း', 'bangbangizreal@gmail.com', '09976902969', 'No. 684 , Wayuna 4 th Street,Yangon', 'Emajor 3rd year distance', 'Yangon', '2020', '1997-09-23', 'male', 'Daw Nwe Nwe Kyaw', '09799868370', 'Mother', 'U Khin Maung Htay', 'Daw Nwe Nwe Kyaw', '-', 'Imagination လိုလို့ပါ', NULL, 35, 62, NULL, '2020-10-02 19:28:45', '2020-10-02 19:28:45'),
			array(35, NULL, 'Nyi Nyi', 'ညီညီ', 'warhaha450@gmail.com', '09455205805', 'NO.32, 134 STREET , 5 FLOOR , MAUGONE STATE TAMWE.', 'HND Computing Diploma', 'Yangon', '2020', '2001-01-30', 'male', 'U HLA HTAY', '09420017166', 'Father', 'DAW KHIN LAY KHINE', '09260201136', 'Mother', 'WEB DEVELOPER ကိုစိတ်ဝင်စားလို့ရွေးချယ်ဖြစ်တာပါ။', NULL, 3, 63, NULL, '2020-10-02 19:30:15', '2020-10-02 19:30:15'),
			array(36, NULL, 'Htike Min Swan', 'ထိုက်မင်းစွမ်', 'htikeminswan2467@gmail.com', '09773245631', 'Thingyangyun Township,Nga Moe Yeik(2) street,part(2) No.776', 'B.C.Sc /M.C.Sc(coursework)', 'Yangon', '2020', '1997-04-26', 'male', 'U Than Shein', '09252085767', 'Father', 'Daw Win Sein', '09252085767', 'Mother', '-', NULL, 6, 65, NULL, '2020-10-02 19:35:14', '2020-10-02 19:35:14'),
			array(37, NULL, 'Ma Thaw Zin Wai', 'မ​သော်ဇင်​ဝေ', 'thawzinwai.ww31@gmail.com', '09250529546', 'Sagaing Division, Shwebo Township, Seik Kun village', 'Technological University Mandalay (EC)', 'Sagaing', '2020', '1996-05-31', 'female', 'Daw Nan Nwe', '09254085991', 'Mother', 'Mg Myo Min Htet', '09400443232', 'Brother', 'သင်ကြားမူ ​ကောင်းမွန်ခြင်းနှင့် အလုပ်ရှာ​ပေး​သော​ကြောင့်', NULL, 250, 66, NULL, '2020-10-02 19:36:29', '2020-10-02 19:36:29'),
			array(38, NULL, 'Shwe  Yee Eain', 'ရွှေရည်အိမ်', 'shwe.yee.eain07@gmail.com', '09761154661', 'Yamethin', 'UCSMTLA (third yr)', 'Mandalay', '2020', '2000-11-29', 'female', 'Daw Soe Soe', '09696251049', 'Mother', 'U Aung Moe', '09797860973', 'Father', 'seniorအမကြီးတွေရဲ့လမ်းပြမှုကြောင့်ပါရှင့်', NULL, 69, 67, NULL, '2020-10-02 19:38:53', '2020-10-02 19:38:53'),
			array(39, NULL, 'Thinzar Nwe', 'သင်ဇာနွယ်', 'thinzarnwe167496@gmail.com', '09958603192', 'No112.malarmyaing 6st.Hlaing Tsp', 'HND Diploma in Computing(KMD)', 'Yangon', '2020', '1998-08-22', 'female', 'U Chit Yee', '09791921811', 'Father', 'Daw Ohn shwin', '09770616790', 'Mother', 'Like it', NULL, 1, 68, NULL, '2020-10-02 19:40:40', '2020-10-02 19:40:40')
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
			array(94, 3, 22),
			array(95, 2, 23),
			array(96, 3, 23),
			array(97, 19, 23),
			array(98, 2, 24),
			array(99, 3, 24),
			array(100, 4, 24),
			array(101, 5, 24),
			array(102, 6, 24),
			array(103, 10, 24),
			array(104, 24, 24),
			array(105, 2, 25),
			array(106, 3, 25),
			array(107, 4, 25),
			array(108, 6, 25),
			array(109, 18, 25),
			array(110, 2, 26),
			array(111, 3, 26),
			array(112, 4, 26),
			array(113, 5, 26),
			array(114, 6, 26),
			array(115, 2, 27),
			array(116, 3, 27),
			array(117, 4, 27),
			array(118, 5, 27),
			array(119, 6, 27),
			array(120, 18, 27),
			array(121, 20, 27),
			array(122, 2, 28),
			array(123, 3, 28),
			array(124, 4, 28),
			array(125, 5, 28),
			array(126, 6, 28),
			array(127, 2, 29),
			array(128, 3, 29),
			array(129, 6, 29),
			array(130, 18, 29),
			array(131, 2, 30),
			array(132, 3, 30),
			array(133, 2, 31),
			array(134, 3, 31),
			array(135, 4, 31),
			array(136, 2, 32),
			array(137, 3, 32),
			array(138, 4, 32),
			array(139, 18, 32),
			array(140, 2, 33),
			array(141, 3, 33),
			array(142, 2, 34),
			array(143, 3, 34),
			array(144, 4, 34),
			array(145, 5, 34),
			array(146, 6, 34),
			array(147, 24, 34),
			array(148, 2, 35),
			array(149, 3, 35),
			array(150, 6, 35),
			array(151, 18, 35),
			array(152, 19, 35),
			array(153, 2, 36),
			array(154, 3, 36),
			array(155, 4, 36),
			array(156, 5, 36),
			array(157, 6, 36),
			array(158, 10, 36),
			array(159, 19, 36),
			array(160, 24, 36),
			array(161, 2, 38),
			array(162, 2, 39),
			array(163, 3, 39),
			array(164, 4, 39)
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
			array(22, '2909200002111022', 'Active', 1, 22, '2020-10-01 10:13:26', '2020-10-01 10:13:26'),
			array(23, '2909200002111023', 'Active', 1, 23, '2020-10-02 19:00:42', '2020-10-02 19:00:42'),
			array(24, '2909200002111024', 'Active', 1, 24, '2020-10-02 19:05:43', '2020-10-02 19:05:43'),
			array(25, '2909200002111025', 'Active', 1, 25, '2020-10-02 19:08:58', '2020-10-02 19:08:58'),
			array(26, '2909200002111026', 'Active', 1, 26, '2020-10-02 19:10:47', '2020-10-02 19:10:47'),
			array(27, '2909200002111027', 'Active', 1, 27, '2020-10-02 19:12:32', '2020-10-02 19:12:32'),
			array(28, '2909200002111028', 'Active', 1, 28, '2020-10-02 19:15:29', '2020-10-02 19:15:29'),
			array(29, '2909200002111029', 'Active', 1, 29, '2020-10-02 19:17:23', '2020-10-02 19:17:23'),
			array(30, '2909200002111030', 'Active', 1, 30, '2020-10-02 19:18:54', '2020-10-02 19:18:54'),
			array(31, '2909200002111031', 'Active', 1, 31, '2020-10-02 19:20:23', '2020-10-02 19:20:23'),
			array(32, '2909200002111032', 'Active', 1, 32, '2020-10-02 19:23:30', '2020-10-02 19:23:30'),
			array(33, '2909200002111033', 'Active', 1, 33, '2020-10-02 19:25:08', '2020-10-02 19:25:08'),
			array(34, '2909200002111034', 'Active', 1, 34, '2020-10-02 19:28:45', '2020-10-02 19:28:45'),
			array(35, '2909200002111035', 'Active', 1, 35, '2020-10-02 19:30:15', '2020-10-02 19:30:15'),
			array(36, '2909200002111037', 'Active', 1, 36, '2020-10-02 19:35:14', '2020-10-02 19:35:14'),
			array(37, '2909200002111038', 'Active', 1, 37, '2020-10-02 19:36:29', '2020-10-02 19:36:29'),
			array(38, '2909200002111039', 'Active', 1, 38, '2020-10-02 19:38:53', '2020-10-02 19:38:53'),
			array(39, '2909200002111040', 'Active', 1, 39, '2020-10-02 19:40:40', '2020-10-02 19:40:40')

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
