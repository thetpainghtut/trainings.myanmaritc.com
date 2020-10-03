<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupLists = [
        	array(1, '2amCoders', 1, NULL, '2020-10-03 14:26:31', '2020-10-03 14:26:31'),
			array(2, 'Game Lords', 1, NULL, '2020-10-03 14:27:51', '2020-10-03 14:27:51'),
			array(3, 'Big Drop Studio', 1, NULL, '2020-10-03 14:28:32', '2020-10-03 14:28:32'),
			array(4, 'Epic coder', 1, NULL, '2020-10-03 14:29:21', '2020-10-03 14:29:21'),
			array(5, 'Legent coder', 1, NULL, '2020-10-03 14:29:48', '2020-10-03 14:29:48'),
			array(6, 'CodeCats', 1, NULL, '2020-10-03 14:30:15', '2020-10-03 14:30:15'),
			array(7, 'Unity of Coding Ranger', 1, NULL, '2020-10-03 14:30:52', '2020-10-03 14:30:52')
        ];

        foreach ($groupLists as $groupList) 
        {
            $group = new Group;
            $group->name = $groupList[1];
	        $group->batch_id = $groupList[2];
	        $group->save();
        }

        $groupstudentLists = [
        	array(1, 1, 3),
			array(2, 1, 15),
			array(3, 1, 20),
			array(4, 1, 21),
			array(5, 1, 30),
			array(6, 1, 38),
			array(7, 2, 12),
			array(8, 2, 13),
			array(9, 2, 25),
			array(10, 2, 33),
			array(11, 2, 34),
			array(12, 2, 36),
			array(13, 3, 7),
			array(14, 3, 9),
			array(15, 3, 11),
			array(16, 3, 14),
			array(17, 3, 31),
			array(18, 3, 39),
			array(19, 4, 1),
			array(20, 4, 2),
			array(21, 4, 4),
			array(22, 4, 23),
			array(23, 4, 29),
			array(24, 4, 35),
			array(25, 5, 16),
			array(26, 5, 17),
			array(27, 5, 19),
			array(28, 5, 24),
			array(29, 5, 32),
			array(30, 6, 6),
			array(31, 6, 8),
			array(32, 6, 18),
			array(33, 6, 22),
			array(34, 6, 37),
			array(35, 7, 5),
			array(36, 7, 10),
			array(37, 7, 26),
			array(38, 7, 27),
			array(39, 7, 28)
        ];

        foreach ($groupstudentLists as $groupstudentList) {
        	DB::table('group_student')->insert([
	            'group_id'      => $groupstudentList[1],
	            'student_id' => $groupstudentList[2],
	        ]);
        }
    }
}
