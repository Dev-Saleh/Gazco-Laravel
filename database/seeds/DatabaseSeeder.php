<?php

use App\Models\Agent;
use App\Models\Citizen;
use App\Models\Observer;
use App\Models\Rigon;
use App\Models\Directorate;
use App\Models\gazLogs;
use App\Models\Station;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {


        // $this->call([
            
        //     citizenSeeder::class,
        // ]);

            ################################ ( STATION SEEDER ) ##########################

        $stationArray = array("البريقه","بئر احمد","بئر فضل","العريش");
         for($i = 0 ; $i < count($stationArray) ;$i++)
        {
            Station::create([
                'staName' => $stationArray[$i],
            ]);
        }


        //      ################################ ( DIRECTORATE SEEDER ) ##########################


        $directorateArray = array(
            // "المنصوره","الشيخ عثمان","التواهي",
        "خور مكسر"," عدن ","المعلا");

        for($i = 0 ; $i < count($directorateArray) ;$i++)
        {
            Directorate::create([
                'dirName' => $directorateArray[$i],
            ]);
        }

        //      ################################ ( RIGON SEEDER ) ##########################


            $directorate_Array = array(
            "1","1",
            "2","2",
            "3","3",
            // "4","4",
            // "5","5",
            // "6","6",
        );


            $rigon_Array = array(
                // "ريمي",
                // "الحجاز",
                // "السيله",
                // "القاهره",
                // "الفتح",
                // "بنجسار",
                "اكتوبر",
                "الثقافه",
                "الخساف",
                "الرزووميت",
                "كاسترو",
                "جبل قوارير",

            );

            for($i = 0 ; $i < count($rigon_Array) ;$i++)
            {

                Rigon::create([
                    'rigName' => $rigon_Array[$i],
                    'dirId' => $directorate_Array[$i], 
                ]);
            }


        //  ################################ ( AGENT SEEDER ) ##########################

            $agentArray = array(
                "كريم حسن القعر",
            "معاذ عبدالله يحيى",
            "عبدالناصر اسماعيل علي",
            "عبدالرب احمد سالمين",
            "ياسر احمد محمود",
                " حسن القعر",
            " عبدالله يحيى",
            " اسماعيل علي",
            " احمد سالمين",
            " احمد محمود",
        );


        for($i = 0 ; $i < count($agentArray) ;$i++)
        {
                $aa = Directorate::all()->random()->id;
                $bb = Rigon::select()->where('dirId', $aa)->get();
                $cc = $bb->random()->id;
            Agent::create([
                'agentName' => $agentArray[$i],
                'Photo' => 'sfd.jpg',

                'dirId' =>$aa,
                'rigId' => $cc,
            ]);
        }





        // ################################ ( OBSERVER SEEDER ) ##########################

        $observerArray = array(
            "ماهر عوض الحسيني",
            "يوسف عبدربه الخليفي",
            "محمود ناصر علي",
            "صلاح قاسم العليمي",
            "انور قاسم الطيار",
            "الحسيني عوض ماهر",
            "الخليفي عبدربه يوسف",
            "علي ناصر محمود",
            "العليمي قاسم صلاح",
            "الطيار قاسم انور",
        );
        $observerUsers = array(
            "ماهر  ",
            "يوسف  ",
            "محمود  ",
            "صلاح  ",
            "انور  ",
            "الحسيني  ",
            "الخليفي  ",
            "علي  ",
            "العليمي  ",
            "الطيار  ",
        );
        $agentsId = array(
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
        );


        for ($i = 0; $i < count($observerArray); $i++) {
            // $aa = Directorate::all()->random()->id;
            // $aa = Directorate::select()->inRandomOrder()->get("id");
            // $zz = Rigon::select()->where('directorate_id', $aa)->get();
            // $mm = Agent::select()->where('directorate_id', $aa)->get();

            $aa = Directorate::all()->random()->id;
            $bb = Rigon::select()->where('dirId', $aa)->get();
            $cc = $bb->random()->id;
            // $mm = Agent::select()->where('directorate_id', $aa)->get();
            // $tt= $mm->random()->id;
            
            
            Observer::create([
                'obsName' => $observerArray[$i],
                'obsUserName' =>  $observerUsers[$i],
                'obsPassword' => rand(9999, 999999),
                'dirId' => $aa,
                'rigId' => $cc,
                'agentId' => $agentsId[$i],
                

            ]);
        }






        //      ################################ ( GAZ_LOG SEEDER ) ##########################

        for ($i = 0; $i < 10; $i++) {
            // $aa = Directorate::all()->random()->id;
            // $zz = Rigon::select()->where('directorate_id', $aa)->get();
            // $mm = Agent::select()->where('directorate_id', $aa)->get();
            // $qq =  $zz->random()->id;
            // $tt = $mm->random()->id;

           
            $ss = Station::all()->random()->id;
            $aa = Directorate::all()->random()->id;
            $bb = Rigon::select()->where('dirId', $aa)->get();
            $cc = $bb->random()->id;
            $mm = Agent::select()->where('dirId', $aa)->get();
            $tt= $mm->random()->id;

            gazLogs::create([
                'qty' => rand(90,100),
                'qtyRemaining' => rand(90,100),
                'dirId' => $aa,
                'rigId' => $cc,
                'staId' => $ss,
                'agentId' => $tt,
                'notice' => 'أنت موقف راجع الاداره',
                'validOfSell' => rand(0, 1),
                'allowBooking' => '0',
               
                

            ]);
        }




        // ################################ ( CITIZEN SEEDER ) ##########################

        $citizenArray = array(
            "رامي تركي علي",
            "احمد عبدالفتاح جداوي",
            "معتز قاسم علاء",
            "مصعب ناجي صلاح",
            "ثامر عيسى داوؤد",
            "عبدالله قاسم الزبيدي",
            "عيدروس احمد بانبيله",
            "عزالدين مشعل سامي",
            "حسين فضل فايز",
            "خالد باسل سالم",
        );
        for ($i = 0; $i < count($citizenArray); $i++) {
            // $aa = Directorate::all()->random()->id;
            // $zz = Rigon::select()->where('directorate_id', $aa)->get();
            // $mm = Agent::select()->where('directorate_id', $aa)->get();
            // $qq =  $zz->random()->id;
            // $tt = $mm->random()->id;
            
            $aa = Directorate::all()->random()->id;
            $bb = Rigon::select()->where('dirId', $aa)->get();
            $cc = $bb->random()->id;

            $mm = Agent::select()->where('dirId', $aa)->get();
            $ag = $mm->random()->id;

            $ob = Observer::select()->where('agentId', $ag)->get();
            $obb = $ob->random()->id;




            Citizen::create([
                'citName' => $citizenArray[$i],
                'mobileNum' => +967491917,
                'identityNum' => rand(999999, 9999999),
                'attachment' => Str::random(10),
                'citPassword' => rand(9999, 99999),
                'dirId' => $aa,
                'rigId' => $cc,
                'obsId' =>$obb,

            ]);
        }

    }
}
